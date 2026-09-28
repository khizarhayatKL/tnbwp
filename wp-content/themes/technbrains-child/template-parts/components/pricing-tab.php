<?php
/**
 * Component: Pricing Tab
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['pricing_tab'] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$head_text = $d['head_text'] ?? '';
$sub_head  = $d['sub_head']  ?? '';
$para_text = $d['para_text'] ?? '';
$tab_list  = $d['tab_list']  ?? array();

static $pt_instance = 0;
$pt_instance++;
$uid = 'pt-' . $pt_instance;
?>
<section class="pricingTab <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="content">
			<?php if ( $head_text ) : ?>
			<span><?php echo esc_html( $head_text ); ?></span>
			<?php endif; ?>
			<?php if ( $sub_head ) : ?>
			<h2><?php echo esc_html( $sub_head ); ?></h2>
			<?php endif; ?>
			<?php if ( $para_text ) : ?>
			<p><?php echo esc_html( $para_text ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $tab_list ) ) : ?>
		<div class="tab-list">
			<ul>
				<?php foreach ( $tab_list as $i => $tab ) : ?>
				<li
					class="pt-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
					data-pt-key="<?php echo esc_attr( $tab['key'] ?? '' ); ?>"
					data-pt-group="<?php echo esc_attr( $uid ); ?>"
					role="button"
					tabindex="0"
				><?php echo esc_html( $tab['label'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="tab-content">
			<?php foreach ( $tab_list as $i => $tab ) : ?>
			<div
				class="box<?php echo 0 === $i ? ' active' : ''; ?>"
				data-pt-key="<?php echo esc_attr( $tab['key'] ?? '' ); ?>"
				data-pt-group="<?php echo esc_attr( $uid ); ?>"
			>
				<img
					src="<?php echo esc_url( $img_base . ( $tab['src'] ?? '' ) ); ?>"
					width="<?php echo esc_attr( $tab['width'] ?? '227' ); ?>"
					height="<?php echo esc_attr( $tab['height'] ?? '180' ); ?>"
					alt="<?php echo esc_attr( $tab['alt'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<h3><?php echo esc_html( $tab['title'] ?? '' ); ?></h3>
				<div class="box-content">
					<p><?php echo esc_html( $tab['para'] ?? '' ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
