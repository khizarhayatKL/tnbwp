<?php
/**
 * Site footer — child theme override.
 * TNB_USE_NEW_LAYOUT = true  → new footer (Footer.php component + close HTML)
 * TNB_USE_NEW_LAYOUT = false → original footer (footer-main + footer-menus)
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

if ( defined( 'TNB_USE_NEW_LAYOUT' ) && TNB_USE_NEW_LAYOUT ) {
	// Render new footer component with registry data
	$registry = require get_stylesheet_directory() . '/data-registry/homepage.php';
	set_query_var( 'component_data', $registry['mock_data'] );
	if ( function_exists( 'tnb_page_has_layout' ) && tnb_page_has_layout( 'lp_hero' ) ) {
		get_template_part( 'template-parts/footer/nav-footer-lp' );
	} else {
		get_template_part( 'template-parts/components/Footer' );
	}
	get_template_part( 'template-parts/components/calendar-popup' );
	?>
</div><!-- #page .site -->
<?php wp_footer(); ?>
<script type="text/javascript" id="live-chat-script" strategy="afterInteractive">
	window.addEventListener('load', function() {
		setTimeout(() => {
            window.__lc = window.__lc || {};
            window.__lc.license = 17795127;
            (function (n, t, c) {
              function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n);
              }
              var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function () {
                  i(["on", c.call(arguments)]);
                },
                once: function () {
                  i(["once", c.call(arguments)]);
                },
                off: function () {
                  i(["off", c.call(arguments)]);
                },
                get: function () {
                  if (!e._h)
                    throw new Error(
                      "[LiveChatWidget] You can't use getters before load."
                    );
                  return i(["get", c.call(arguments)]);
                },
                call: function () {
                  i(["call", c.call(arguments)]);
                },
                init: function () {
                  var n = t.createElement("script");
                  (n.async = !0),
                    (n.type = "text/javascript"),
                    (n.src = "https://cdn.livechatinc.com/tracking.js"),
                    t.head.appendChild(n);
                },
              };
              !n.__lc.asyncInit && e.init(),
                (n.LiveChatWidget = n.LiveChatWidget || e);
            })(window, document, [].slice);
          }, 4000);
	});
    </script>
</body>
</html>
	<?php
	return;
}
?>

	<footer class="main-footer" id="footerFrom">
		<?php get_template_part( 'template-parts/footer/footer-main' ); ?>
		<?php get_template_part( 'template-parts/footer/footer-menus' ); ?>
	</footer>

	<?php get_template_part( 'template-parts/components/calendar-popup' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
