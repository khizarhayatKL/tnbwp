<?php
/**
 * Component: Proposal CTA
 *
 * Data key : proposal
 * Fields   : head_html (HTML — h2/h5/br/span), btn_text, anchor (bool),
 *            btn_url (when anchor), classes (string — section modifier)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['proposal'] ?? array();
$mod_class = get_query_var( 'component_modifier_classes', '' ) ?: ( $d['classes'] ?? '' );
$mod_class = $mod_class ? ' ' . sanitize_html_class( $mod_class ) : '';
$is_anchor = ! empty( $d['anchor'] );
$btn_text  = $d['btn_text'] ?? '';
$btn_url   = $d['btn_url']  ?? '/contact-us';
?>
<section class="proposal<?php echo esc_attr( $mod_class ); ?>">
	<div class="container">
		<?php echo wp_kses_post( $d['head_html'] ?? '' ); ?>
		<?php if ( $is_anchor ) : ?>
			<a href="<?php echo esc_url( home_url( $btn_url ) ); ?>" class="tnb-btn black-red"><?php echo esc_html( $btn_text ); ?></a>
		<?php else : ?>
			<button class="tnb-btn black-red tnb-popup-trigger" type="button"><?php echo esc_html( $btn_text ); ?></button>
		<?php endif; ?>
	</div>
</section>
