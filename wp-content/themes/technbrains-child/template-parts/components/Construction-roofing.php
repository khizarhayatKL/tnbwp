<?php
/**
 * Construction Software — Roofing contractor software (list + pull-quote).
 *
 * Layout : cn_roofing (ACF Flexible Content)
 * Fields : cnr_eyebrow, cnr_heading, cnr_lead, cnr_anchor,
 *          cnr_items{ cnr_item_lead, cnr_item_text },
 *          cnr_quote, cnr_quote_name, cnr_quote_role, cnr_quote_photo
 * CSS    : assets/css/construction.css (.cn-roof-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The quote is a real <blockquote> with a <cite> for the attribution rather than a styled div, so
 * the pull-quote is a quotation in the document outline and not just large text. The decorative
 * opening mark is aria-hidden — a screen reader announcing a stray quote character before the
 * quotation adds nothing.
 *
 * The intro paragraph uses .cn-roof-lead rather than .dt-sub because the approved design sets it
 * narrower than a standard section description. It inherits the same size from the site-wide
 * description rule; only its measure differs.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnr_eyebrow = (string) get_sub_field( 'cnr_eyebrow' );
$cnr_heading = tnb_accent_heading( (string) get_sub_field( 'cnr_heading' ) );
$cnr_lead    = (string) get_sub_field( 'cnr_lead' );
$cnr_anchor  = sanitize_title( (string) get_sub_field( 'cnr_anchor' ) );
$cnr_items   = (array) get_sub_field( 'cnr_items' );

$cnr_quote = trim( (string) get_sub_field( 'cnr_quote' ) );
$cnr_name  = trim( (string) get_sub_field( 'cnr_quote_name' ) );
$cnr_role  = trim( (string) get_sub_field( 'cnr_quote_role' ) );
$cnr_photo = get_sub_field( 'cnr_quote_photo' );

$cnr_kses = tnb_cn_allowed_html();
$cnr_svg  = tnb_cn_svg_html();

if ( ! $cnr_items && '' === $cnr_quote ) {
	return;
}
?>
<section class="dt-section gray cn-roof-sec"<?php echo '' !== $cnr_anchor ? ' id="' . esc_attr( $cnr_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cnr_eyebrow || '' !== $cnr_heading || '' !== $cnr_lead ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnr_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnr_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnr_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnr_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnr_lead ) : ?>
					<p class="cn-roof-lead"><?php echo wp_kses( $cnr_lead, $cnr_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-roof-grid">
			<?php if ( $cnr_items ) : ?>
				<div class="cn-roof-left dt-rev">
					<ul class="cn-roof-list">
						<?php
						foreach ( $cnr_items as $cnr_item ) :
							$cnr_lead_txt = trim( (string) ( $cnr_item['cnr_item_lead'] ?? '' ) );
							$cnr_text     = trim( (string) ( $cnr_item['cnr_item_text'] ?? '' ) );

							if ( '' === $cnr_lead_txt && '' === $cnr_text ) {
								continue;
							}
							?>
							<li>
								<span class="cn-roof-dot"><?php echo wp_kses( tnb_cn_icon( 'check' ), $cnr_svg ); ?></span>
								<span>
									<?php if ( '' !== $cnr_lead_txt ) : ?>
										<b><?php echo esc_html( $cnr_lead_txt ); ?>.</b>
									<?php endif; ?>
									<?php echo '' !== $cnr_text ? ' ' . wp_kses( $cnr_text, $cnr_kses ) : ''; ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( '' !== $cnr_quote ) : ?>
				<aside class="cn-roof-quote dt-rev">
					<div class="cn-roof-quote-mark" aria-hidden="true">&ldquo;</div>
					<blockquote><?php echo wp_kses( $cnr_quote, $cnr_kses ); ?></blockquote>

					<?php if ( '' !== $cnr_name || ! empty( $cnr_photo['id'] ) ) : ?>
						<div class="cn-roof-quote-by">
							<?php if ( ! empty( $cnr_photo['id'] ) ) : ?>
								<?php
								echo wp_get_attachment_image(
									(int) $cnr_photo['id'],
									'thumbnail',
									false,
									array(
										'class'    => 'cn-roof-quote-av',
										'alt'      => $cnr_name,
										'loading'  => 'lazy',
										'decoding' => 'async',
									)
								);
								?>
							<?php endif; ?>
							<cite class="cn-roof-quote-meta">
								<?php if ( '' !== $cnr_name ) : ?>
									<b><?php echo esc_html( $cnr_name ); ?></b>
								<?php endif; ?>
								<?php if ( '' !== $cnr_role ) : ?>
									<span><?php echo esc_html( $cnr_role ); ?></span>
								<?php endif; ?>
							</cite>
						</div>
					<?php endif; ?>
				</aside>
			<?php endif; ?>
		</div>
	</div>
</section>
