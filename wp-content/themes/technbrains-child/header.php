<?php
/**
 * Site header — child theme override.
 * TNB_USE_NEW_LAYOUT = true  → new header + nav
 * TNB_USE_NEW_LAYOUT = false → original header (old nav)
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

if ( defined( 'TNB_USE_NEW_LAYOUT' ) && TNB_USE_NEW_LAYOUT ) : ?>
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
	<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "TechnBrains",
  "legalName": "KoderLabs LLC",
  "url": "https://www.technbrains.com/",
  "description": "TechnBrains is a software development and IT staff augmentation company that helps businesses build production-ready digital products and scale teams with pre-vetted senior developers. Services include mobile app development, web platforms, AI systems, custom software, dedicated teams, and staff augmentation across healthcare, fintech, logistics, SaaS, and enterprise platforms.",
  "foundingDate": "2013",
  "telephone": "+1-833-888-6032",
  "email": "contact@technbrains.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "15305 Dallas Pkwy, 12th Floor, Suite 1257",
    "addressLocality": "Addison",
    "addressRegion": "TX",
    "postalCode": "75001",
    "addressCountry": "US"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+1-833-888-6032",
    "email": "contact@technbrains.com",
    "contactType": "sales",
    "areaServed": "US",
    "availableLanguage": "English"
  },
  "areaServed": [
    {
      "@type": "Country",
      "name": "United States"
    },
    {
      "@type": "City",
      "name": "Dallas"
    },
    {
      "@type": "City",
      "name": "New York"
    },
    {
      "@type": "City",
      "name": "Houston"
    },
    {
      "@type": "City",
      "name": "Austin"
    },
    {
      "@type": "City",
      "name": "San Antonio"
    }
  ],
  "knowsAbout": [
    "Software Development",
    "Mobile App Development",
    "iOS App Development",
    "Android App Development",
    "Cross-Platform App Development",
    "Web Application Development",
    "Custom Software Development",
    "Enterprise Software",
    "SaaS Development",
    "AI & Machine Learning",
    "Natural Language Processing",
    "Computer Vision",
    "Deep Learning",
    "Data Analytics",
    "Cloud Engineering",
    "System Integrations",
    "API Development",
    "Staff Augmentation",
    "Dedicated Development Teams",
    "Software Outsourcing",
    "Product Engineering",
    "Healthcare Software Development",
    "Fintech App Development",
    "Real Estate App Development",
    "Logistics Software Development"
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Software Development and Engineering Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Mobile App Development",
          "url": "https://www.technbrains.com/mobile-app-development/"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Custom Software Development",
          "url": "https://www.technbrains.com/custom-software-development/"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "AI Development",
          "url": "https://www.technbrains.com/ai-development-services/"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Staff Augmentation",
          "url": "https://www.technbrains.com/staff-augmentation/"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Dedicated Development Teams",
          "url": "https://www.technbrains.com/hire-dedicated-team/"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Web App Development",
          "url": "https://www.technbrains.com/web-app-development/"
        }
      }
    ]
  },
  "founder": {
    "@type": "Person",
    "name": "Kazim Qazi",
    "jobTitle": "CEO",
    "url": "https://www.linkedin.com/in/kazim-qazi/"
  },
  "sameAs": [
    "https://clutch.co/profile/technbrains",
    "https://www.goodfirms.co/company/technbrains",
    "https://www.linkedin.com/company/technbrains",
    "https://www.designrush.com/agency/profile/technbrains",
    "https://www.topdevelopers.co/profile/Technbrains",
    "https://www.facebook.com/technbrains/",
    "https://www.instagram.com/technbrains/",
    "https://www.pinterest.com/technbrains/",
    "https://www.youtube.com/@TechnBrainsofficial",
    "https://x.com/technbrains"
  ]
}
</script>
<!-- Google Tag Manager -->
	<script type="text/javascript">
		window.addEventListener('load', function() {
			setTimeout(function() {
				(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				  })(window,document,'script','dataLayer','GTM-5NGBBHH');
			}, <?php echo ( function_exists( 'tnb_page_has_layout' ) && tnb_page_has_layout( 'lp_hero' ) ) ? '0' : '3500'; ?>);  
		});
	</script>
	<script id="hs-script-loader"
            strategy="lazyOnload"
            src="//js.hs-scripts.com/19591491.js"></script>
<!-- End Google Tag Manager -->
</head>
  <body <?php body_class( is_front_page() ? 'homepage-revamp page-homepage' : 'homepage-revamp' ); ?>><?php wp_body_open(); ?>
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NGBBHH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'technbrains-child' ); ?></a>
<div id="menuoverlay" class="tnb-menu-overlay"></div>
<?php
$tnb_is_lp_hero = function_exists( 'tnb_page_has_layout' ) && tnb_page_has_layout( 'lp_hero' );

if ( ! $tnb_is_lp_hero ) {
	get_template_part( 'template-parts/components/popup-form' );
}

if ( $tnb_is_lp_hero ) {
	get_template_part( 'template-parts/header/nav-header-lp' );
} else {
	get_template_part( 'template-parts/components/Header' );
	get_template_part( 'template-parts/header/nav-mobile' );
}
?>
<?php return; endif; ?>

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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'technbrains-child' ); ?></a>
	<div id="menuoverlay" class="tnb-menu-overlay"></div>
	<?php
	get_template_part( 'template-parts/header/nav-header' );
	get_template_part( 'template-parts/header/nav-mobile' );
	get_template_part( 'template-parts/components/popup-form' );
	?>
