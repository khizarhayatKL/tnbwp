<?php
/**
 * Component: Industry Grid
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['industry_grid'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']   ?? '';
$para     = $d['para']    ?? '';
$listing  = $d['listing'] ?? [];
?>
<section class="IndustryGrid">
	<div class="container">
		<div class="main">
			<?php if ( $title ) : ?>
			<h2>
				<?php 
				echo wp_kses( $title, array(
					'br'   => array(),
					'span' => array(
						'class' => array(),
						'style' => array(),
					)
				) ); 
				?>
			</h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<div class="gridList">
			<?php foreach ( $listing as $item ) : ?>
			<div
				class="sliderInfo"
				style="background-image:url('<?php echo esc_url( $img_base . $item['bg_image'] ); ?>')"
			>
				<h4><?php echo esc_html( $item['title'] ); ?></h4>
				<div class="innerCont">
					<p><?php echo esc_html( $item['paragraph'] ); ?></p>
					<?php if ( ! empty( $item['link'] ) ) : ?>
					<a href="<?php echo esc_url( $item['link'] ); ?>">
						Learn More
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.854 10.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/></svg>
					</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
