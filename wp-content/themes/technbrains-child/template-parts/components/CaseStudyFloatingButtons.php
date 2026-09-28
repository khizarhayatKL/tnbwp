<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['case_study_floating_buttons'] ?? array();
$img       = get_stylesheet_directory_uri() . '/assets/images';
$mod       = get_query_var( 'component_modifier_classes', '' );
$play_link = $d['play_store_link'] ?? '#';
$app_link  = $d['app_store_link']  ?? '#';
?>
<section class="caseStudyFloatingBtns<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="csf-desktop csf-wrapper">
		<?php if ( $play_link && '#' !== $play_link ) : ?>
		<a href="<?php echo esc_url( $play_link ); ?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo esc_url( $img . '/playstore-full-2.png' ); ?>" width="122" height="37" alt="Google Play Store" loading="lazy" decoding="async">
		</a>
		<?php endif; ?>
		<?php if ( $app_link && '#' !== $app_link ) : ?>
		<a href="<?php echo esc_url( $app_link ); ?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo esc_url( $img . '/app-store-2.png' ); ?>" width="122" height="37" alt="Apple App Store" loading="lazy" decoding="async">
		</a>
		<?php endif; ?>
	</div>
	<div class="csf-mobile csf-wrapper">
		<?php if ( $play_link && '#' !== $play_link ) : ?>
		<a href="<?php echo esc_url( $play_link ); ?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo esc_url( $img . '/play-store-icon.png' ); ?>" width="42" height="42" alt="Google Play Store" loading="lazy" decoding="async">
		</a>
		<?php endif; ?>
		<?php if ( $app_link && '#' !== $app_link ) : ?>
		<a href="<?php echo esc_url( $app_link ); ?>" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo esc_url( $img . '/apple-logo.png' ); ?>" width="42" height="42" alt="Apple App Store" loading="lazy" decoding="async">
		</a>
		<?php endif; ?>
	</div>
</section>
