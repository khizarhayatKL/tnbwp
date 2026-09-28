<?php
/**
 * About Us V2 — 08 Cases (result cards).
 *
 * Port of ABSCase + ABSCaseCard from the QA-approved prototype
 * (about-story-copy.jsx:468-496). A row with a URL renders as <a>, otherwise as
 * <div>, exactly as the source does. Grid positions come from the :nth-child
 * rules in about-v2.css, so card order in the repeater drives the layout.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_h2    = get_sub_field( 'abs_cases_h2' );
$abs_lead  = get_sub_field( 'abs_cases_lead' );
$abs_cases = get_sub_field( 'abs_cases' );

if ( empty( $abs_cases ) ) {
	return;
}
?>
<section class="abs-chapter" data-screen-label="07 Case">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-split-head abs-rev">
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-caselist abs-split-body abs-rev d1">
				<?php
				foreach ( $abs_cases as $abs_case ) {
					$abs_name   = isset( $abs_case['name'] ) ? $abs_case['name'] : '';
					$abs_result = isset( $abs_case['result'] ) ? $abs_case['result'] : '';
					$abs_url    = isset( $abs_case['url'] ) ? $abs_case['url'] : '';
					$abs_logo   = isset( $abs_case['logo'] ) ? $abs_case['logo'] : '';

					if ( '' === trim( (string) $abs_name ) ) {
						continue;
					}

					// Monogram = first character of the client / project name. Used
					// unless the row supplies a logo, so existing rows are unaffected.
					$abs_mono   = function_exists( 'mb_substr' ) ? mb_substr( $abs_name, 0, 1 ) : substr( $abs_name, 0, 1 );
					$abs_logo_id = ( is_array( $abs_logo ) && ! empty( $abs_logo['ID'] ) ) ? (int) $abs_logo['ID'] : 0;

					// A row with a URL becomes a link, otherwise a plain card. Built by
					// concatenation rather than printf() because escaped URLs can contain
					// percent-encoded sequences that printf would read as placeholders.
					$abs_tag = $abs_url ? 'a' : 'div';

					echo '<' . $abs_tag . ' class="abs-casecard"'
						. ( $abs_url ? ' href="' . esc_url( $abs_url ) . '"' : '' )
						. '>';
					?>
						<div class="abs-casecard-top">
							<span class="abs-casecard-logo<?php echo $abs_logo_id ? ' abs-casecard-logo--img' : ''; ?>" aria-hidden="true">
								<?php
								if ( $abs_logo_id ) {
									// alt="" and the wrapper's aria-hidden are deliberate: the
									// client name is announced by the <h3> immediately after, so
									// naming the logo too would just repeat it.
									echo wp_get_attachment_image(
										$abs_logo_id,
										'thumbnail',
										false,
										array(
											'alt'      => '',
											'sizes'    => '46px',
											'loading'  => 'lazy',
											'decoding' => 'async',
										)
									);
								} else {
									echo esc_html( $abs_mono );
								}
								?>
							</span>
							<h3 class="abs-casecard-name"><?php echo esc_html( $abs_name ); ?></h3>
							<span class="abs-casecard-ar" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg></span>
						</div>
						<?php if ( $abs_result ) : ?>
							<p class="abs-casecard-d"><?php echo esc_html( $abs_result ); ?></p>
						<?php endif; ?>
					<?php
					echo '</' . $abs_tag . '>';
				}
				?>
			</div>
		</div>
	</div>
</section>
