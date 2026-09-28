<?php
/**
 * Homepage header — suppresses old nav, lets Header.php component render the new one.
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php // Fonts are self-hosted (Outfit + Montserrat under assets/fonts/), so
	     // neither Google origin is requested during load and a preconnect to them
	     // would open connections that are never used. fonts.gstatic.com is still
	     // touched late by reCAPTCHA (Roboto), which is delay-loaded — dns-prefetch
	     // is the right weight for that. ?>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'homepage-revamp page-homepage' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'technbrains-child' ); ?></a>
  <div id="menuoverlay" class="tnb-menu-overlay"></div>
<?php
get_template_part( 'template-parts/components/popup-form' );
  get_template_part( 'template-parts/header/nav-mobile' );
?>
