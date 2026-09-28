<?php
/**
 * Construction Software — How you can work with us.
 *
 * Layout : cn_models (ACF Flexible Content)
 * Fields : cnm_eyebrow, cnm_heading, cnm_anchor, cnm_best_label,
 *          cnm_cards{ cnm_card_title, cnm_card_text, cnm_card_link }
 * CSS    : assets/css/construction.css (.cn-model*, .cn-models-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Three engagement models, each pointing at its own existing page (staff augmentation, dedicated
 * team, software outsourcing). The link is a real anchor on the card rather than the whole card
 * being wrapped: the copy deck gives each card its own CTA, and wrapping the card would make the
 * heading part of the link text a screen reader announces.
 *
 * "Best for" is a field rather than hardcoded, because it is a label on the copy and not structure —
 * and because the same layout is likely to be reused on a page that words it differently.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnm_eyebrow = (string) get_sub_field( 'cnm_eyebrow' );
$cnm_heading = tnb_accent_heading( (string) get_sub_field( 'cnm_heading' ) );
$cnm_anchor  = sanitize_title( (string) get_sub_field( 'cnm_anchor' ) );
$cnm_best    = trim( (string) get_sub_field( 'cnm_best_label' ) );
$cnm_cards   = (array) get_sub_field( 'cnm_cards' );

$cnm_kses = tnb_cn_allowed_html();
$cnm_svg  = tnb_cn_svg_html();

if ( ! $cnm_cards ) {
	return;
}
?>
<section class="dt-section cn-models-sec"<?php echo '' !== $cnm_anchor ? ' id="' . esc_attr( $cnm_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cnm_eyebrow || '' !== $cnm_heading ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnm_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnm_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnm_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnm_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-models-grid">
			<?php
			foreach ( $cnm_cards as $cnm_card ) :
				$cnm_title = trim( (string) ( $cnm_card['cnm_card_title'] ?? '' ) );
				$cnm_text  = trim( (string) ( $cnm_card['cnm_card_text'] ?? '' ) );

				if ( '' === $cnm_title && '' === $cnm_text ) {
					continue;
				}

				$cnm_link  = $cnm_card['cnm_card_link'] ?? null;
				$cnm_url   = is_array( $cnm_link ) ? trim( (string) ( $cnm_link['url'] ?? '' ) ) : '';
				$cnm_label = is_array( $cnm_link ) ? trim( (string) ( $cnm_link['title'] ?? '' ) ) : '';
				$cnm_tgt   = is_array( $cnm_link ) ? (string) ( $cnm_link['target'] ?? '' ) : '';

				if ( '#' === $cnm_url ) {
					$cnm_url = '';
				}
				?>
				<div class="cn-model-card dt-rev">
					<?php if ( '' !== $cnm_title ) : ?>
						<h3><?php echo esc_html( $cnm_title ); ?></h3>
					<?php endif; ?>

					<?php if ( '' !== $cnm_best ) : ?>
						<span class="cn-model-best"><?php echo esc_html( $cnm_best ); ?></span>
					<?php endif; ?>

					<?php if ( '' !== $cnm_text ) : ?>
						<p><?php echo wp_kses( $cnm_text, $cnm_kses ); ?></p>
					<?php endif; ?>

					<?php if ( '' !== $cnm_url && '' !== $cnm_label ) : ?>
						<?php
						// The label alone ("Explore") repeats across all three cards, so the card title
						// is folded into the accessible name to keep the links distinguishable out of
						// context — a screen reader listing links otherwise reads "Explore" three times.
						?>
						<a
							class="cn-model-link"
							href="<?php echo esc_url( $cnm_url ); ?>"
							<?php echo '' !== $cnm_tgt ? ' target="' . esc_attr( $cnm_tgt ) . '" rel="noopener"' : ''; ?>
							<?php if ( '' !== $cnm_title ) : ?>
								aria-label="<?php echo esc_attr( $cnm_label . ' — ' . $cnm_title ); ?>"
							<?php endif; ?>
						><?php echo esc_html( $cnm_label ); ?> <span class="arr"><?php
							echo wp_kses( tnb_cn_icon( 'arrow' ), $cnm_svg );
						?></span></a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
