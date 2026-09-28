<?php
/**
 * Component: Full CTA
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['full_cta'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$btn_text = $d['btn_text'] ?? '';
$btn_link = $d['btn_link'] ?? '';
$bg_image = $d['bg_image'] ?? '';
$classes  = $d['classes']  ?? '';
?>
<section
	class="fullCta<?php echo $classes ? ' ' . esc_attr( $classes ) : ''; ?>"
	<?php if ( $bg_image ) : ?>
	style="background-image:url('<?php echo esc_url( $img_base . $bg_image ); ?>')"
	<?php endif; ?>
>
	<div class="container">
		<div class="fc-main">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_text ) : ?>
				<?php if ( $btn_link ) : ?>
				<a class="tnb-btn btnWhite" href="<?php echo esc_url( $btn_link ); ?>">
					<div class="textWrapper">
						<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
						<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
					</div>
				</a>
				<?php else : ?>
				<button class="tnb-btn btnWhite tnb-popup-trigger" type="button">
					<div class="textWrapper">
						<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
						<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
					</div>
				</button>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
