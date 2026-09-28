/* hero-neural.js — TechnBrains homepage hero: neural canvas + role cycle
 *
 * Split out of custom-theme-interactions.js (which still loads site-wide)
 * because #neural-canvas / [data-role-cycle] exist on no other page — see
 * tnb_enqueue_assets() in functions.php for the homepage-only enqueue gate.
 *
 * The canvas plays gather -> hold once, then freezes on the assembled logo
 * instead of looping forever. That change (2026-09-09) is what fixes the
 * ~20s Total CPU Time this script was attributed on production: the old
 * loop never idled for as long as the tab stayed open.
 */
(function() {
  'use strict';

  // ── HERO ROLE CYCLE ────────────────────────────────────────────────────────
  function initRoleCycle() {
    var canvas = document.getElementById('neural-canvas');
    var els = document.querySelectorAll('[data-role-cycle]');
    if (!els.length) return;
    var roles = ['Senior React Engineers','AI / ML Specialists','Cloud Architects (AWS)','iOS & Android Devs','DevOps Engineers','Data Engineers','Product Designers'];
    try {
      var raw = canvas ? canvas.dataset.roles : null;
      if (raw) roles = JSON.parse(raw);
    } catch(e) {}
    var idx = 0;
    els.forEach(function(el) { el.textContent = roles[0]; });

    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    if (reduceMotion) return;

    var timer = null;
    function tick() {
      idx = (idx + 1) % roles.length;
      els.forEach(function(el) { el.textContent = roles[idx]; });
    }
    function start() { if (!timer) timer = setInterval(tick, 1800); }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }

    if (typeof IntersectionObserver !== 'undefined') {
      var io = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) start(); else stop();
      }, { threshold: 0 });
      els.forEach(function(el) { io.observe(el); });
    } else {
      start();
    }
    document.addEventListener('visibilitychange', function() {
      if (document.hidden) stop(); else start();
    });
  }

  // ── NEURAL CANVAS ──────────────────────────────────────────────────────────
  function initNeuralCanvas() {
    var canvas = document.getElementById('neural-canvas');
    if (!canvas) return;
    var wrap = canvas.closest('.neural-canvas-wrap');
    if (!wrap) return;
    // Matches the CSS breakpoint that hides .neural-canvas-wrap (header-footer.css,
    // homepage-nav.css @media max-width:992px) — skip image loads/ctx/IO setup too.
    if (window.matchMedia && window.matchMedia('(max-width: 992px)').matches) return;
    var ctx = canvas.getContext('2d');

    var LOGO_NODES = [
      [23.5,2.5],[9.5,6.0],[18.7,7.7],[30.0,7.0],[9.0,12.0],[35.5,12.5],
      [14.0,16.0],[28.0,17.0],[2.7,20.0],[34.3,20.3],[13.0,27.5],[37.0,27.0],
      [25.0,30.0],[10.0,32.5],[34.0,35.5],[19.0,37.0]
    ];
    var BIG_INDICES = new Set([0,7,12,9,6]);
    var DETACHED_INDEX = 8;
    var LOGO_EDGES = [
      [0,2],[0,3],[0,5],[0,6],[0,7],[0,9],[1,2],[1,3],[1,4],[2,3],[2,5],[2,6],[2,9],
      [3,4],[3,5],[3,9],[3,11],[4,7],[5,7],[5,9],[5,11],[6,7],[6,9],[6,10],[6,13],
      [7,9],[7,11],[7,12],[9,11],[9,14],[10,12],[10,13],[11,12],[11,15],[12,14],[12,15],[14,15]
    ];

    var FACE_URLS = [
      '/wp-content/uploads/2026/06/circle-img-1.webp',
      '/wp-content/uploads/2026/06/circle-img-2.webp',
      '/wp-content/uploads/2026/06/circle-img-3.webp',
      '/wp-content/uploads/2026/06/circle-img-4.webp',
      '/wp-content/uploads/2026/06/circle-img-5.webp',
      '/wp-content/uploads/2026/06/circle-img-6.webp',
      '/wp-content/uploads/2026/06/circle-img-7.webp',
      '/wp-content/uploads/2026/06/circle-img-8.webp',
      '/wp-content/uploads/2026/06/circle-img-9.webp',
      '/wp-content/uploads/2026/06/circle-img-10.webp',
      '/wp-content/uploads/2026/06/circle-img-11.webp',
      '/wp-content/uploads/2026/06/circle-img-12.webp',
      '/wp-content/uploads/2026/06/circle-img-13.webp',
      '/wp-content/uploads/2026/06/circle-img-14.webp',
      '/wp-content/uploads/2026/06/circle-img-15.webp',
      '/wp-content/uploads/2026/06/circle-img-16.webp'
    ];

    var settled = false;
    var raf = 0;
    var state = null;
    var W = 0, H = 0;

    // Faces are served as lossless WebP (pixel-identical to the original PNGs, ~35%
    // smaller). Browsers without WebP support fall back to the PNGs, which remain in
    // place — without this the hero canvas would render with missing portraits.
    // crossOrigin was previously set to 'anonymous' here; nothing in this file ever
    // calls getImageData/toDataURL, these are same-origin uploads paths not a CDN,
    // so it bought nothing and only risked doubling every request if the server
    // didn't answer with Access-Control-Allow-Origin.
    var images = FACE_URLS.map(function(src) {
      var img = new Image();
      img.addEventListener('error', function onErr() {
        img.removeEventListener('error', onErr);
        if (/\.webp$/.test(img.src)) {
          img.src = src.replace(/\.webp$/, '.png');
        }
      });
      img.addEventListener('load', function() {
        // Once settled, the canvas is a static bitmap — a face that finishes
        // loading after the final paint needs one manual repaint or it leaves
        // a permanent placeholder circle.
        if (settled && raf === 0) { raf = requestAnimationFrame(animate); }
      });
      img.src = src;
      return img;
    });

    var SAT_DOT_COUNT = 70;
    var T_GATHER = 2.2, T_HOLD = 2.8, T_SETTLE = T_GATHER + T_HOLD;
    var DPR = Math.min(window.devicePixelRatio || 1, 2);

    // Glow halos are radial gradients whose stop ratio is the same at every
    // radius, so one sprite baked at load time can be drawn scaled per node
    // instead of calling createRadialGradient (and rasterizing shadowBlur)
    // every frame for every portrait/dot — this is the main per-frame CPU cost.
    var SPRITE_SIZE = 256;
    var portraitHaloSprite = null, dotHaloSprite = null;
    function buildPortraitHaloSprite() {
      var c = document.createElement('canvas');
      c.width = c.height = SPRITE_SIZE;
      var sc = c.getContext('2d');
      var cx = SPRITE_SIZE / 2;
      var g = sc.createRadialGradient(cx, cx, SPRITE_SIZE * 0.25, cx, cx, SPRITE_SIZE * 0.5);
      g.addColorStop(0, 'rgba(255,60,80,1)');
      g.addColorStop(1, 'rgba(255,60,80,0)');
      sc.fillStyle = g; sc.fillRect(0, 0, SPRITE_SIZE, SPRITE_SIZE);
      return c;
    }
    function buildDotHaloSprite() {
      var c = document.createElement('canvas');
      c.width = c.height = SPRITE_SIZE;
      var sc = c.getContext('2d');
      var cx = SPRITE_SIZE / 2;
      var g = sc.createRadialGradient(cx, cx, 0, cx, cx, SPRITE_SIZE * 0.5);
      g.addColorStop(0, 'rgba(255,60,80,1)');
      g.addColorStop(1, 'rgba(255,60,80,0)');
      sc.fillStyle = g; sc.fillRect(0, 0, SPRITE_SIZE, SPRITE_SIZE);
      return c;
    }

    function rand(a, b) { return a + Math.random() * (b - a); }
    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    function computeLogoTargets() {
      var srcW = 44, srcH = 40;
      var isNarrow = W < 1100;
      var containerW = Math.min(W - 32, 1280);
      var containerLeft = (W - containerW) / 2;
      var fit = isNarrow ? Math.min(W*0.7, H*0.62) : Math.min(containerW*0.46, H*0.78);
      var scale = fit / Math.max(srcW, srcH);
      var drawW = srcW * scale, drawH = srcH * scale;
      var centerX = isNarrow ? W * 0.5 : containerLeft + containerW * 0.75;
      var ox = centerX - drawW / 2, oy = (H - drawH) / 2;
      return LOGO_NODES.map(function(n) { return { x: ox + n[0]*scale, y: oy + n[1]*scale, scale: scale }; });
    }

    function initState() {
      var targets = computeLogoTargets();
      var scale = targets[0].scale;
      var portraits = LOGO_NODES.map(function(_, i) {
        var angle = Math.random() * Math.PI * 2;
        var dist = Math.max(W, H) * 0.9;
        var big = BIG_INDICES.has(i);
        var baseR = big ? 28 : 22;
        var r = Math.max(14, Math.min(34, baseR * (scale / 11.0)));
        return {
          id: i, face: i % FACE_URLS.length,
          startX: W/2 + Math.cos(angle)*dist, startY: H/2 + Math.sin(angle)*dist,
          tx: targets[i].x, ty: targets[i].y,
          x: W/2 + Math.cos(angle)*dist, y: H/2 + Math.sin(angle)*dist,
          r: r, phase: Math.random() * Math.PI * 2,
          isDetached: i === DETACHED_INDEX,
          arrival: Math.random() * 0.35
        };
      });
      var dots = Array.from({ length: SAT_DOT_COUNT }, function(_, i) {
        var ang = Math.random() * Math.PI * 2;
        var d = Math.max(W, H) * 0.6;
        return {
          id: i, x: W/2 + Math.cos(ang)*d, y: H/2 + Math.sin(ang)*d,
          vx: -Math.cos(ang)*rand(8,18), vy: -Math.sin(ang)*rand(8,18),
          r: rand(1.0, 2.6), phase: Math.random() * Math.PI * 2
        };
      });
      state = { portraits: portraits, dots: dots, targets: targets, pulses: [], elapsed: 0, lastT: performance.now() };
    }

    function resize() {
      var rect = wrap.getBoundingClientRect();
      W = Math.max(320, rect.width);
      H = Math.max(320, rect.height);
      var RENDER_SCALE = 0.75;
      DPR = Math.min(window.devicePixelRatio || 1, 2) * RENDER_SCALE;
      canvas.width = Math.floor(W * DPR);
      canvas.height = Math.floor(H * DPR);
      canvas.style.width = W + 'px';
      canvas.style.height = H + 'px';
      ctx.setTransform(DPR, 0, 0, DPR, 0, 0);
      if (!state) { initState(); return; }

      var t = computeLogoTargets();
      state.targets = t;
      state.portraits.forEach(function(p, i) {
        p.tx = t[i].x; p.ty = t[i].y;
        if (settled) { p.x = p.tx; p.y = p.ty; }
      });

      if (settled) {
        // Reposition ambient dots left outside the new bounds rather than
        // stranding them off-canvas at the old size, clear any frozen
        // half-drawn spark, then request the one repaint this needs — it
        // will hit isFinal immediately and stop again on its own.
        state.dots.forEach(function(n) {
          var m = 60;
          if (n.x < -m || n.x > W + m || n.y < -m || n.y > H + m) {
            var ang = Math.random() * Math.PI * 2, d = Math.max(W, H) * 0.6;
            n.x = W/2 + Math.cos(ang)*d; n.y = H/2 + Math.sin(ang)*d;
          }
        });
        state.pulses = [];
        if (raf === 0) { raf = requestAnimationFrame(animate); }
      }
    }

    function drawBackground(t) {
      ctx.clearRect(0, 0, W, H);
      var isNarrow = W < 1100;
      var containerW = Math.min(W - 32, 1280);
      var containerLeft = (W - containerW) / 2;
      var gx = isNarrow ? W*0.5 : containerLeft + containerW*0.75;
      var gy = H * 0.5;
      var pulse = 0.55 + Math.sin(t*0.0008)*0.12;
      var cg = ctx.createRadialGradient(gx, gy, 10, gx, gy, Math.min(W,H)*0.55);
      cg.addColorStop(0, 'rgba(220,40,60,' + (0.14*pulse) + ')');
      cg.addColorStop(0.6, 'rgba(180,30,50,0.025)');
      cg.addColorStop(1, 'rgba(180,30,50,0)');
      ctx.fillStyle = cg;
      ctx.fillRect(0, 0, W, H);
    }

    function drawArcLine(a, b, alpha, t, progress) {
      var mx=(a.x+b.x)/2, my=(a.y+b.y)/2;
      var dx=b.x-a.x, dy=b.y-a.y;
      var d=Math.hypot(dx,dy)||1;
      var nx=-dy/d, ny=dx/d;
      var bow=(d*0.06)*(1-progress)+(d*0.02)*Math.sin(t*0.0006+a.id+b.id);
      var cx=mx+nx*bow, cy=my+ny*bow;
      var SEG=14;
      var path=[];
      for(var i=0;i<=SEG;i++){var u=i/SEG,omu=1-u;path.push([omu*omu*a.x+2*omu*u*cx+u*u*b.x,omu*omu*a.y+2*omu*u*cy+u*u*b.y]);}
      var drawTo=Math.max(0,Math.min(SEG,Math.floor(SEG*progress)));
      if(drawTo<1)return{cx:cx,cy:cy};
      ctx.beginPath();ctx.moveTo(path[0][0],path[0][1]);
      for(var i=1;i<=drawTo;i++)ctx.lineTo(path[i][0],path[i][1]);
      var grad=ctx.createLinearGradient(a.x,a.y,b.x,b.y);
      grad.addColorStop(0,'rgba(220,40,60,'+alpha+')');
      grad.addColorStop(0.5,'rgba(255,90,110,'+(alpha*1.1)+')');
      grad.addColorStop(1,'rgba(220,40,60,'+alpha+')');
      ctx.strokeStyle=grad;ctx.lineWidth=1.4;
      ctx.stroke();
      return{cx:cx,cy:cy};
    }

    function drawPortrait(n, t, alpha) {
      var img=images[n.face];
      var ready=img&&img.complete&&img.naturalWidth>0;
      var r=n.r;
      ctx.save();ctx.globalAlpha=alpha;
      if(!portraitHaloSprite) portraitHaloSprite = buildPortraitHaloSprite();
      var hd=r*4.8;
      ctx.globalAlpha=alpha*0.32;
      ctx.drawImage(portraitHaloSprite, n.x-hd/2, n.y-hd/2, hd, hd);
      ctx.globalAlpha=alpha;
      ctx.save();ctx.beginPath();ctx.arc(n.x,n.y,r,0,Math.PI*2);ctx.closePath();ctx.clip();
      if(ready){
        var iw=img.naturalWidth,ih=img.naturalHeight;
        var scale=Math.max(r*2/iw,r*2/ih);
        var sw=r*2/scale,sh=r*2/scale;
        var sx=(iw-sw)/2,sy=(ih-sh)/2;
        ctx.drawImage(img,sx,sy,sw,sh,n.x-r,n.y-r,r*2,r*2);
      }
      else{ctx.fillStyle='#1A2A44';ctx.fillRect(n.x-r,n.y-r,r*2,r*2);}
      ctx.fillStyle='rgba(20,40,80,0.18)';ctx.fillRect(n.x-r,n.y-r,r*2,r*2);
      ctx.restore();
      var pulse=0.85+0.15*Math.sin(t*0.003+n.phase);
      ctx.beginPath();ctx.arc(n.x,n.y,r+1.2,0,Math.PI*2);
      ctx.strokeStyle='rgba(230,50,70,'+(0.95*pulse)+')';ctx.lineWidth=1.8;
      ctx.stroke();
      ctx.beginPath();ctx.arc(n.x,n.y,r+5,0,Math.PI*2);
      ctx.strokeStyle='rgba(230,50,70,'+(0.18*pulse)+')';ctx.lineWidth=1;ctx.stroke();
      if(!n.isDetached){
        var sx=n.x+r*0.7,sy=n.y-r*0.7;
        ctx.beginPath();ctx.arc(sx,sy,2.6,0,Math.PI*2);
        ctx.fillStyle='#1FCB85';ctx.fill();
        ctx.beginPath();ctx.arc(sx,sy,2.6,0,Math.PI*2);ctx.strokeStyle='rgba(8,18,40,1)';ctx.lineWidth=1;ctx.stroke();
      }
      ctx.restore();
    }

    function drawAmbientDot(n, t) {
      var pulse=0.7+0.3*Math.sin(t*0.004+n.phase);
      var base=ctx.globalAlpha;
      ctx.save();
      if(!dotHaloSprite) dotHaloSprite = buildDotHaloSprite();
      var hd=n.r*10;
      ctx.globalAlpha=base*0.3*pulse;
      ctx.drawImage(dotHaloSprite, n.x-hd/2, n.y-hd/2, hd, hd);
      ctx.globalAlpha=base;
      ctx.fillStyle='#E8334A';ctx.beginPath();ctx.arc(n.x,n.y,n.r,0,Math.PI*2);ctx.fill();
      ctx.restore();
    }

    var frameCounter = 0;
    function animate(now) {
      if(!state){raf=requestAnimationFrame(animate);return;}
      var s=state;
      var dt=Math.min(0.05,(now-s.lastT)/1000);s.lastT=now;
      s.elapsed += dt;
      var isFinal = s.elapsed >= T_SETTLE;
      var clamped = Math.min(s.elapsed, T_SETTLE);
      var inGather = clamped < T_GATHER;
      var formProg = inGather ? (clamped / T_GATHER) : 1;

      s.portraits.forEach(function(p){
        if (isFinal) { p.x = p.tx; p.y = p.ty; return; }
        var tStart=p.arrival,tEnd=Math.min(1,p.arrival+0.72);
        var localF=Math.max(0,Math.min(1,(formProg-tStart)/(tEnd-tStart)));
        var ef=easeOutCubic(localF);
        var baseX,baseY;
        if(inGather){baseX=p.startX+(p.tx-p.startX)*ef;baseY=p.startY+(p.ty-p.startY)*ef;}
        else{
          baseX=p.tx;baseY=p.ty;
          baseX+=Math.sin(now*0.0011+p.phase)*1.4;baseY+=Math.cos(now*0.0013+p.phase*1.3)*1.4;
        }
        p.x=baseX;p.y=baseY;
      });

      if (!isFinal) {
        s.dots.forEach(function(n){
          n.x+=n.vx*dt;n.y+=n.vy*dt;
          var m=60;
          if(n.x<-m||n.x>W+m||n.y<-m||n.y>H+m){
            var ang=Math.random()*Math.PI*2,d=Math.max(W,H)*0.6;
            n.x=W/2+Math.cos(ang)*d;n.y=H/2+Math.sin(ang)*d;
            n.vx=-Math.cos(ang)*rand(8,18);n.vy=-Math.sin(ang)*rand(8,18);
          }
        });
      }

      if (isFinal) {
        s.pulses = [];
      } else {
        s.pulses.forEach(function(pl){ pl.t += dt/pl.life; });
        s.pulses = s.pulses.filter(function(pl){ return pl.t < 1; });
      }

      // Physics/state above runs every tick so timing stays exact; only the
      // paint work below is throttled to ~30fps (every other tick) since
      // that's where the CPU cost is (canvas draw calls), not the state math.
      frameCounter++;
      var doDraw = isFinal || (frameCounter % 2 === 0);

      if (doDraw) {
        drawBackground(now);

        var edgeAlphaBase, edgeReveal;
        if (inGather) { var startAt=0.55; edgeReveal=Math.max(0,(formProg-startAt)/(1-startAt)); edgeAlphaBase=0.55*edgeReveal; }
        else { edgeReveal=1; edgeAlphaBase=0.7; }

        var E=LOGO_EDGES.length;
        for(var i=0;i<E;i++){
          var edge=LOGO_EDGES[i];
          if(edge[0]===DETACHED_INDEX||edge[1]===DETACHED_INDEX)continue;
          var a=s.portraits[edge[0]],b=s.portraits[edge[1]];
          var slotStart=i/E,slotEnd=(i+1)/E;
          var eProg=Math.max(0,Math.min(1,(edgeReveal-slotStart)/(slotEnd-slotStart)));
          if(eProg<=0)continue;
          var cp=drawArcLine(a,b,edgeAlphaBase,now,eProg);
          if(!inGather && !isFinal && Math.random()<0.0015){
            s.pulses.push({ax:a.x,ay:a.y,bx:b.x,by:b.y,cx:cp.cx,cy:cp.cy,t:0,life:rand(0.7,1.2)});
          }
        }

        s.pulses.forEach(function(pl){
          var u=pl.t,omu=1-u;
          var x=omu*omu*pl.ax+2*omu*u*pl.cx+u*u*pl.bx;
          var y=omu*omu*pl.ay+2*omu*u*pl.cy+u*u*pl.by;
          ctx.save();
          var halo=ctx.createRadialGradient(x,y,0,x,y,14);
          halo.addColorStop(0,'rgba(255,180,200,0.9)');halo.addColorStop(0.4,'rgba(255,80,100,0.6)');halo.addColorStop(1,'rgba(255,80,100,0)');
          ctx.fillStyle=halo;ctx.beginPath();ctx.arc(x,y,14,0,Math.PI*2);ctx.fill();
          ctx.fillStyle='#FFEAEE';ctx.beginPath();ctx.arc(x,y,2.2,0,Math.PI*2);ctx.fill();
          ctx.restore();
        });

        var dotAlpha = inGather ? 1 : 0.55;
        ctx.save();ctx.globalAlpha=dotAlpha;
        s.dots.forEach(function(d){drawAmbientDot(d,now);});
        ctx.restore();

        s.portraits.forEach(function(p){
          var tStart=p.arrival,tEnd=Math.min(1,p.arrival+0.72);
          var localF=Math.max(0,Math.min(1,(formProg-tStart)/(tEnd-tStart)));
          var alpha = inGather ? easeOutCubic(localF) : 1;
          if(alpha>0.01)drawPortrait(p,now,alpha);
        });
      }

      if (isFinal) { settled = true; raf = 0; return; }
      raf = requestAnimationFrame(animate);
    }

    var visible = true;
    function startIfNeeded() {
      if (settled || raf !== 0) return;
      state.lastT = performance.now();
      raf = requestAnimationFrame(animate);
    }

    if (typeof IntersectionObserver !== 'undefined') {
      new IntersectionObserver(function(entries) {
        visible = entries[0].isIntersecting;
        if (visible) startIfNeeded();
      }, { threshold: 0 }).observe(wrap);
    }

    document.addEventListener('visibilitychange', function() {
      if (document.hidden) {
        if (raf) { cancelAnimationFrame(raf); raf = 0; }
      } else if (visible) {
        startIfNeeded();
      }
    });

    resize();

    var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    if (reduceMotion) {
      // isFinal is then true on the very first animate() call below, so it
      // paints the assembled logo once and stops — no separate code path.
      state.elapsed = T_SETTLE;
    }

    window.addEventListener('resize', resize, {passive:true});

    if (typeof IntersectionObserver === 'undefined') {
      // Fallback start for browsers without IntersectionObserver — everywhere
      // else, the observer's own initial callback (fired asynchronously right
      // after observe()) starts the loop as soon as it reports the hero's
      // actual on-screen state.
      raf = requestAnimationFrame(animate);
    }
  }

  // ── INIT ───────────────────────────────────────────────────────────────────
  function boot() {
    initRoleCycle();
    initNeuralCanvas();
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
