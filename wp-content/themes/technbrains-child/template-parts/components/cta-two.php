<?php
/**
 * Component: CTA Two
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data              = get_query_var( 'component_data' );
$d                 = $data['cta_two'] ?? [];
$img_base          = get_stylesheet_directory_uri() . '/assets/images';
$title             = $d['title']            ?? '';
$sub_title         = $d['sub_title']        ?? '';
$para              = $d['para']             ?? '';
$btn_text          = $d['btn_text']         ?? '';
$btn_link          = $d['btn_link']         ?? '';
$btn_two_text      = $d['btn_two_text']     ?? '';
$btn_two_link      = $d['btn_two_link']     ?? '';
$bg_image          = $d['bg_image']         ?? '';
$img_src           = $d['img_src']          ?? '';
$img_width         = $d['img_width']        ?? 0;
$img_height        = $d['img_height']       ?? 0;
$bottom_btn_text   = $d['bottom_btn_text']  ?? '';
$bottom_btn_link   = $d['bottom_btn_link']  ?? '';
?>
<section class="CtaTwo <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div
			class="mainCta"
			<?php if ( $bg_image ) : ?>
			style="background-image:url('<?php echo esc_url( $img_base . $bg_image ); ?>')"
			<?php endif; ?>
		>
			<div class="info">
				<?php if ( $title ) : ?>
				<h2><?php echo wp_kses_post( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $sub_title ) : ?>
				<h3><?php echo esc_html( $sub_title ); ?></h3>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>

				<div class="btnWrapper">
					<?php if ( $btn_text ) : ?>
						<?php if ( $btn_link ) : ?>
						<a class="tnb-btn btnTransparent" href="<?php echo esc_url( $btn_link ); ?>">
							<div class="textWrapper">
								<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
								<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
							</div>
						</a>
						<?php else : ?>
						<button class="tnb-btn btnTransparent tnb-popup-trigger" type="button">
							<div class="textWrapper">
								<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
								<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
							</div>
						</button>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( $btn_two_text ) : ?>
						<?php if ( $btn_two_link ) : ?>
						<a class="tnb-btn btnWhite" href="<?php echo esc_url( $btn_two_link ); ?>">
							<div class="textWrapper">
								<span class="primaryText"><?php echo esc_html( $btn_two_text ); ?></span>
								<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_two_text ); ?></span>
							</div>
						</a>
						<?php else : ?>
						<button class="tnb-btn btnWhite tnb-popup-trigger" type="button">
							<div class="textWrapper">
								<span class="primaryText"><?php echo esc_html( $btn_two_text ); ?></span>
								<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_two_text ); ?></span>
							</div>
						</button>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<?php if ( $bottom_btn_text && $bottom_btn_link ) : ?>
				<div class="linkWrap">
					<a href="<?php echo esc_url( home_url( $bottom_btn_link ) ); ?>"><?php echo esc_html( $bottom_btn_text ); ?></a>
				</div>
				<?php endif; ?>
			</div>

			<?php if ( $img_src ) : ?>
			<div class="imageWrapper">
				<img
					src="<?php echo esc_url( $img_base . $img_src ); ?>"
					width="<?php echo (int) $img_width; ?>"
					height="<?php echo (int) $img_height; ?>"
					alt=""
					loading="lazy"
					decoding="async"
				>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
