<?php
defined( 'ABSPATH' ) || exit;

static $hb_printed = false;
if ( ! $hb_printed ) :
	$hb_printed = true;
?>
<style>.hireBanner{padding:80px 0;display:flex;align-items:center;position:relative}.hireBanner::after{content:"";position:absolute;height:20%;width:100%;pointer-events:none;bottom:0;background:linear-gradient(180deg,rgba(255,255,255,0) 35%,rgba(244,244,244,1) 100%)}.hireBanner .banner-grid{display:grid;grid-template-columns:1fr 1fr;align-items:start;grid-gap:130px}.hireBanner .banner-grid .content h2{font-size:42px;line-height:50px;font-weight:700;color:#000}.hireBanner .banner-grid .content p{font-size:16px;color:#000;font-weight:400;line-height:28px;margin-bottom:15px}.hireBanner .banner-grid .content > span{font-size:18px;color:#000;font-weight:550;line-height:28px;display:block;margin-top:10px}.hireBanner .banner-grid .content ul{list-style:none;padding:0;margin-top:15px}.hireBanner .banner-grid .content ul li{font-size:16px;color:#000;font-weight:400;line-height:28px;position:relative;padding-left:25px}.hireBanner .banner-grid .content ul li::before{content:"\2713";position:absolute;left:0;top:50%;transform:translateY(-50%);color:#000}.hireBanner .banner-grid .content .btns{margin-top:20px}.hireBanner .banner-grid .content .btns a{margin-right:20px}.hireBanner .banner-grid .content .rewards{margin:50px auto 0}.hireBanner .banner-grid .content .rewards ul{list-style:none;padding:0;display:flex;align-items:center;gap:20px}.hireBanner .banner-grid .content .rewards ul li{padding:0}.hireBanner .banner-grid .content .rewards ul li::before{content:""}.hireBanner .banner-grid .content .rewards ul li img{max-width:111px;height:auto;width:auto}.hireBanner .banner-grid .hire-form{background-color:#f7f7f7;padding:25px;border-radius:6px;box-shadow:3px 3px 10px rgba(0,0,0,0.27)}.hireBanner .banner-grid .hire-form .form-content{background-color:#ec1c24;padding:15px;text-align:center;margin-bottom:30px;box-shadow:3px 3px 10px rgba(0,0,0,0.27)}.hireBanner .banner-grid .hire-form .form-content h4{color:#fff;font-size:28px;font-weight:bold;margin:0}.hireBanner .banner-grid .hire-form .form-content p{color:#fff;font-size:16px;margin:0}.hireBanner .banner-grid .hire-form .bannerForm .inputField{width:88%;margin:auto;position:relative;margin-bottom:0}.hireBanner .banner-grid .hire-form .bannerForm .inputField input:not([type="tel"]){border:1px solid #eeecec!important;border-radius:0!important;padding:15px!important;margin-bottom:25px!important;color:#000!important;height:50px!important;width:100%!important;box-shadow:none!important;outline:none!important;background-color:#fff!important;font-size:15px!important;display:block!important}.hireBanner .banner-grid .hire-form .bannerForm .inputField input:not([type="tel"])::placeholder{color:#000!important}.hireBanner .banner-grid .hire-form .bannerForm .inputField textarea{border:1px solid #eeecec!important;border-radius:0!important;padding:15px!important;margin-bottom:25px!important;color:#000!important;resize:none!important;box-shadow:none!important;outline:none!important;width:100%!important;background-color:#fff!important;font-size:15px!important;display:block!important}.hireBanner .banner-grid .hire-form .bannerForm .inputField textarea::placeholder{color:#000!important}.hireBanner .banner-grid .hire-form .bannerForm .inputField select{border:1px solid #eeecec!important;border-radius:0!important;padding:15px!important;margin-bottom:25px!important;color:#000!important;box-shadow:none!important;outline:none!important;width:100%!important;height:50px!important;background-color:#fff!important;font-size:15px!important;display:block!important}.hireBanner .banner-grid .hire-form .bannerForm .form-submit-wrap{width:88%;margin:auto}.hireBanner .banner-grid .hire-form .bannerForm .form-submit-wrap button{display:block;width:100%}@media(max-width:1400px){.hireBanner .banner-grid{grid-gap:100px}.hireBanner .banner-grid .content h2{font-size:35px}.hireBanner .banner-grid .content p{font-size:15px}.hireBanner .banner-grid .content > span{font-size:16px}}@media(max-width:1200px){.hireBanner .banner-grid{grid-gap:50px}.hireBanner .banner-grid .content h2{font-size:30px}}@media(max-width:1024px){.hireBanner .banner-grid{grid-template-columns:1fr;grid-gap:60px}.hireBanner .banner-grid .content{text-align:center}.hireBanner .banner-grid .content h2{font-size:28px;line-height:1.4}.hireBanner .banner-grid .content ul li{text-align:left}.hireBanner .banner-grid .content .rewards ul{justify-content:center;flex-wrap:wrap}.hireBanner .banner-grid .hire-form{width:80%;margin:auto}}@media(max-width:767px){.hireBanner .banner-grid .content .btns{display:grid;grid-gap:10px}.hireBanner .banner-grid .hire-form{width:100%}}@media(max-width:575px){.hireBanner .banner-grid .hire-form .form-content h4{font-size:20px}.hireBanner .banner-grid .hire-form .form-content p{font-size:14px}}@media(max-width:479px){.hireBanner .banner-grid .content h2{font-size:26px}}@media(max-width:400px){.hireBanner .banner-grid .hire-form{padding:20px}.hireBanner .banner-grid .hire-form .bannerForm .inputField{width:100%}.hireBanner .banner-grid .hire-form .bannerForm .form-submit-wrap{width:100%}}.hireBanner .bannerForm .inputField .intl-tel-input,.hireBanner .bannerForm .inputField .iti{width:100%;display:block;margin-bottom:25px}.hireBanner .bannerForm .inputField input[type="tel"]{border:1px solid #eeecec!important;border-radius:0!important;height:50px!important;width:100%!important;padding:15px 15px 15px 52px!important;box-shadow:none!important;background-color:#fff!important;font-size:15px!important;color:#000!important;outline:none!important}.hireBanner .bannerForm .inputField input[type="tel"]:focus{border-color:#eeecec!important;box-shadow:none!important;outline:none!important}.hireBanner .bannerForm .inputField input[type="tel"]::placeholder{color:#000!important}.hireBanner .bannerForm .inputField .flag-container,.hireBanner .bannerForm .inputField .iti__flag-container{height:50px}.hireBanner .bannerForm .inputField .selected-flag,.hireBanner .bannerForm .inputField .iti__selected-flag{background-color:#fff!important;border-right:1px solid #eeecec;border-radius:0!important}.hireBanner .bannerForm .inputField .selected-flag:hover,.hireBanner .bannerForm .inputField .selected-flag:focus,.hireBanner .bannerForm .inputField .iti__selected-flag:hover,.hireBanner .bannerForm .inputField .iti__selected-flag:focus{background-color:#eeecec!important}.hireBanner .bannerForm .inputField .country-list,.hireBanner .bannerForm .inputField .iti__country-list{border-radius:0;box-shadow:0 3px 10px rgba(0,0,0,.15);z-index:999;margin:0}</style>
<?php endif; ?>
<?php
$data      = get_query_var( 'component_data' );
$d         = $data['banner'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$img_base  = get_stylesheet_directory_uri() . '/assets/images';

static $hb_instance = 0;
$hb_instance++;
$phone_id = 'hb-phone-' . $hb_instance;

$reward_list = array(
	array( 'src' => '/test-1.webp',  'width' => 262, 'height' => 262, 'alt' => 'AppFutura',  'link' => 'https://www.appfutura.com/companies/technbrains/' ),
	array( 'src' => '/f-clutch.png', 'width' => 92,  'height' => 102, 'alt' => 'Clutch',     'link' => 'https://clutch.co/profile/technbrains/' ),
	array( 'src' => '/test-3.webp',  'width' => 262, 'height' => 262, 'alt' => 'GoodFirms',  'link' => 'https://www.goodfirms.co/company/technbrains/' ),
	array( 'src' => '/test-4.webp',  'width' => 200, 'height' => 200, 'alt' => 'UpCity',     'link' => 'https://upcity.com/profiles/technbrains/' ),
	array( 'src' => '/test-5.png',   'width' => 200, 'height' => 200, 'alt' => 'Expertise',  'link' => 'https://www.expertise.com/ny/brooklyn/mobile-app-development#technbrains' ),
);
?>
<section class="hireBanner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="banner-grid">
			<div class="content">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo esc_html( $d['head_text'] ?? '' ); ?></h1>
				<p><?php echo esc_html( $d['para_text'] ?? '' ); ?></p>
				<?php if ( ! empty( $d['span_text'] ) ) : ?>
				<span><?php echo esc_html( $d['span_text'] ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $d['banner_list'] ) ) : ?>
				<ul>
					<?php foreach ( $d['banner_list'] as $item ) : ?>
					<li><?php echo esc_html( $item['li_list'] ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<div class="btns">
					<a href="/contact-us/" class="tnb-btn slideHOv">FULL TIME</a>
					<a href="/contact-us/" class="tnb-btn slideHOv">PART TIME</a>
					<a href="/contact-us/" class="tnb-btn slideHOv">HOURLY</a>
				</div>
				<div class="rewards">
					<ul>
						<?php foreach ( $reward_list as $r ) : ?>
						<li>
							<a href="<?php echo esc_url( $r['link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img
									src="<?php echo esc_url( $img_base . $r['src'] ); ?>"
									width="<?php echo (int) $r['width']; ?>"
									height="<?php echo (int) $r['height']; ?>"
									alt="<?php echo esc_attr( $r['alt'] ); ?>"
									loading="lazy"
									decoding="async"
								>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="hire-form">
				<div class="form-content">
					<h3><?php echo esc_html( $d['form_title'] ?? '' ); ?></h3>
					<p><?php echo esc_html( $d['form_para'] ?? '' ); ?></p>
				</div>
				<form id="tnb-hire-banner-form" class="bannerForm" novalidate>
					<?php wp_nonce_field( 'tnb_hire_banner_form', 'tnb_hire_banner_nonce' ); ?>
					<?php tnb_honeypot_field(); ?>
					<div class="inputField">
						<input type="text" name="firstName" placeholder="Enter Your Name" autocomplete="name">
					</div>
					<div class="inputField">
						<input type="email" name="cemail" placeholder="Email Address" autocomplete="email">
					</div>
					<div class="inputField hb-phone-field">
						<input
							id="<?php echo esc_attr( $phone_id ); ?>"
							type="tel"
							name="cnumber"
							placeholder="Phone Number (optional)"
							autocomplete="tel"
						>
					</div>
					<div class="inputField">
						<select name="projectTimeline" aria-label="Project timeline">
							<option value="full-time">Full Time</option>
							<option value="part-time">Part Time</option>
							<option value="hourly">Hourly</option>
						</select>
					</div>
					<div class="inputField">
						<textarea name="message" rows="4" placeholder="Message"></textarea>
					</div>
					<div id="tnb-hire-banner-msg" class="inner-form-msg"></div>
					<div class="tnb-recaptcha-wrap">
						<?php tnb_recaptcha_field(); ?>
					</div>
					<div class="form-submit-wrap">
						<button type="submit" class="tnb-btn FullBtn">Hire Developers Now</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
