<?php
/**
 * Component: Proposal CTA (alternate instance)
 *
 * Identical to proposal.php but reads from component_data['proposal_alt'].
 * Use when a page needs two Proposal blocks with different content.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['proposal_alt'] ?? array();
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
