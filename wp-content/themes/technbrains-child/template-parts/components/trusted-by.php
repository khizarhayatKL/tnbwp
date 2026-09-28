<?php
/**
 * Component: Trusted By
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['trusted_by'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$para     = $d['para']    ?? '';
$listing  = $d['listing'] ?? [];
?>
<section class="trustedBy">
	<div class="container">
		<?php if ( $para ) : ?>
		<div class="main">
			<p><?php echo esc_html( $para ); ?></p>
		</div>
		<?php endif; ?>

		<div class="listing">
			<?php foreach ( $listing as $item ) : ?>
			<div class="single">
				<img
					src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
					width="<?php echo (int) $item['width']; ?>"
					height="<?php echo (int) $item['height']; ?>"
					alt="Trusted client logo"
					loading="lazy"
					decoding="async"
				>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
