<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$listing = $data['case_study_card_list'] ?? array();
$img     = get_stylesheet_directory_uri() . '/assets/images';
$mod     = get_query_var( 'component_modifier_classes', '' );
?>
<section class="CaseStudiesListingSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="pcl-main">
			<div class="caseStudyList">
				<?php foreach ( $listing as $item ) : ?>
				<section class="caseStudiesCardSec">
					<div class="pcl-card-main" style="background-image:url('<?php echo esc_url( $img . ( $item['bg_image'] ?? '' ) ); ?>');">
						<div class="innerCard">
							<div class="logoWrapper">
								<img src="<?php echo esc_url( $img . ( $item['logo'] ?? '' ) ); ?>" width="<?php echo esc_attr( $item['logo_width'] ?? '71' ); ?>" height="<?php echo esc_attr( $item['logo_height'] ?? '71' ); ?>" alt="logo" loading="lazy" decoding="async">
							</div>
							<div class="imgBox">
								<img src="<?php echo esc_url( $img . ( $item['image'] ?? '' ) ); ?>" width="<?php echo esc_attr( $item['width'] ?? '300' ); ?>" height="<?php echo esc_attr( $item['height'] ?? '400' ); ?>" alt="<?php echo esc_attr( $item['heading'] ?? '' ); ?>" loading="lazy" decoding="async">
							</div>
						</div>
					</div>
					<div class="textBox">
						<h3><?php echo esc_html( $item['heading'] ?? '' ); ?></h3>
						<div class="linkBtns">
							<?php if ( ! empty( $item['play_store_link'] ) ) : ?>
							<a href="<?php echo esc_url( $item['play_store_link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img src="<?php echo esc_url( $img . '/case-study-card/play-2.png' ); ?>" width="31" height="31" alt="Google Play" loading="lazy" decoding="async">
							</a>
							<?php endif; ?>
							<?php if ( ! empty( $item['app_store_link'] ) ) : ?>
							<a href="<?php echo esc_url( $item['app_store_link'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img src="<?php echo esc_url( $img . '/case-study-card/play-new.png' ); ?>" width="31" height="31" alt="App Store" loading="lazy" decoding="async">
							</a>
							<?php endif; ?>
						</div>
					</div>
					<div class="bottomSec">
						<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
						<?php if ( ! empty( $item['page_link'] ) ) : ?>
						<a href="<?php echo esc_url( home_url( $item['page_link'] ) ); ?>" class="tnb-btn caseStudyBtn">View Case Study</a>
						<?php endif; ?>
					</div>
				</section>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
