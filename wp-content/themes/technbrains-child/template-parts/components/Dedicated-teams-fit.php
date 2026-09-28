<?php
/**
 * Dedicated Teams — When it fits / when it doesn't (two cards).
 *
 * Layout : dt_fit (ACF Flexible Content)
 * Fields : dtf_eyebrow, dtf_heading, dtf_sub,
 *          dtf_yes_title, dtf_yes_sub, dtf_yes_eyebrow, dtf_yes_items{ dtf_item },
 *          dtf_no_title,  dtf_no_sub,  dtf_no_eyebrow,  dtf_no_items{ dtf_item }
 * CSS    : assets/css/components.css (.dt-fit3*)
 * JS     : none.
 *
 * Two fixed groups rather than a repeater of cards: the design gives the positive
 * card a green icon and tick marks and the negative one a grey icon and crosses,
 * and there is never a third. A repeater would let an editor produce two green
 * cards or five, none of which the design has an answer for.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dtf_eyebrow = (string) get_sub_field( 'dtf_eyebrow' );
$dtf_heading = (string) get_sub_field( 'dtf_heading' );
$dtf_sub     = (string) get_sub_field( 'dtf_sub' );

$dtf_groups = array(
	'yes' => array(
		'title'   => (string) get_sub_field( 'dtf_yes_title' ),
		'sub'     => (string) get_sub_field( 'dtf_yes_sub' ),
		'eyebrow' => (string) get_sub_field( 'dtf_yes_eyebrow' ),
		'items'   => (array) get_sub_field( 'dtf_yes_items' ),
	),
	'no'  => array(
		'title'   => (string) get_sub_field( 'dtf_no_title' ),
		'sub'     => (string) get_sub_field( 'dtf_no_sub' ),
		'eyebrow' => (string) get_sub_field( 'dtf_no_eyebrow' ),
		'items'   => (array) get_sub_field( 'dtf_no_items' ),
	),
);

if ( ! $dtf_groups['yes']['items'] && ! $dtf_groups['no']['items'] ) {
	return;
}

$dtf_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dtf_icons = array(
	// The positive card's mark is a tick; the negative card's header mark is a
	// minus and its list marks are crosses, exactly as the design draws them.
	'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>',
	'minus' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/></svg>',
	'cross' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
);

$dtf_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);
?>
<section class="dt-section">
	<div class="container">
		<?php if ( '' !== $dtf_eyebrow || '' !== $dtf_heading || '' !== $dtf_sub ) : ?>
			<div class="dt-head dt-head-left">
				<?php if ( '' !== $dtf_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dtf_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dtf_heading ) : ?>
					<h2 class="dt-h2 dt-h2-2l"><?php echo wp_kses( $dtf_heading, $dtf_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dtf_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dtf_sub, $dtf_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-fit3-grid">
			<?php foreach ( $dtf_groups as $dtf_key => $dtf_group ) : ?>
				<?php if ( ! $dtf_group['items'] && '' === $dtf_group['title'] ) { continue; } ?>
				<div class="dt-fit3-card <?php echo esc_attr( $dtf_key ); ?>">
					<div class="dt-fit3-top">
						<span class="dt-fit3-ic"><?php
							echo wp_kses( 'yes' === $dtf_key ? $dtf_icons['check'] : $dtf_icons['minus'], $dtf_svg_kses );
						?></span>
					</div>
					<?php if ( '' !== $dtf_group['title'] ) : ?>
						<h3 class="dt-fit3-t"><?php echo esc_html( $dtf_group['title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( '' !== $dtf_group['sub'] ) : ?>
						<p class="dt-fit3-sub"><?php echo esc_html( $dtf_group['sub'] ); ?></p>
					<?php endif; ?>
					<div class="dt-fit3-div"></div>
					<?php if ( '' !== $dtf_group['eyebrow'] ) : ?>
						<span class="dt-fit3-eyebrow"><?php echo esc_html( $dtf_group['eyebrow'] ); ?></span>
					<?php endif; ?>
					<?php if ( $dtf_group['items'] ) : ?>
						<div class="dt-fit3-list">
							<?php foreach ( $dtf_group['items'] as $dtf_row ) : ?>
								<?php $dtf_item = (string) ( $dtf_row['dtf_item'] ?? '' ); ?>
								<?php if ( '' === $dtf_item ) { continue; } ?>
								<div class="dt-fit3-item"><span class="mk" aria-hidden="true"><?php
									echo wp_kses( 'yes' === $dtf_key ? $dtf_icons['check'] : $dtf_icons['cross'], $dtf_svg_kses );
								?></span><?php echo esc_html( $dtf_item ); ?></div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
