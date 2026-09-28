<?php
/**
 * Component: Hire Developer — Industry Experts (HDIndustryExperts)
 * Layout   : hd_industry_experts (ACF Flexible Content)
 *
 * Fields:
 *   hdex_eyebrow            — text
 *   hdex_heading            — text     (plain part)
 *   hdex_heading_accent     — text     (accent span)
 *   hdex_sub                — textarea
 *   hdex_experts            — repeater
 *     hdex_expert_title     — text     (full title, e.g. "Real Estate Engineer")
 *     hdex_expert_short     — text     (short label for collapsed state, e.g. "Real Estate")
 *     hdex_expert_desc      — textarea
 *     hdex_expert_image     — image    (array)
 *     hdex_expert_cta_text  — text     (default "Hire Expert")
 *     hdex_expert_cta_url   — url
 *     hdex_expert_contribs  — repeater
 *       hdex_contrib_item   — text
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'hdex_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdex_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdex_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdex_sub' )            ?: '';

$experts      = [];
$experts_raw  = get_sub_field( 'hdex_experts' );
if ( is_array( $experts_raw ) ) {
	foreach ( $experts_raw as $expert_row ) {
		$contribs     = [];
		$contribs_raw = $expert_row['hdex_expert_contribs'] ?? [];
		if ( is_array( $contribs_raw ) ) {
			foreach ( $contribs_raw as $contrib_row ) {
				$item = $contrib_row['hdex_contrib_item'] ?? '';
				if ( $item ) {
					$contribs[] = $item;
				}
			}
		}
		$experts[] = [
			'title'    => $expert_row['hdex_expert_title']    ?? '',
			'short'    => $expert_row['hdex_expert_short']    ?? '',
			'desc'     => $expert_row['hdex_expert_desc']     ?? '',
			'image'    => $expert_row['hdex_expert_image']    ?? null,
			'cta_text' => $expert_row['hdex_expert_cta_text'] ?? 'Hire Expert',
			'cta_url'  => trim( (string) ( $expert_row['hdex_expert_cta_url'] ?? '' ) ),
			'contribs' => $contribs,
		];
	}
}

if ( empty( $experts ) ) {
	return;
}

/* ── 2. Unique section ID ───────────────────────────────────────────── */
static $hdex_uid = 0;
$hdex_uid++;
$section_id = 'hd-experts-' . $hdex_uid;
?>
<section class="hd-experts" id="<?php echo esc_attr( $section_id ); ?>" data-section="industry-experts">
	<div class="hd-experts-glow" aria-hidden="true"></div>
	<div class="hd-container">

		<div class="hd-section-head center">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="hd-strip">
			<?php foreach ( $experts as $ei => $expert ) :
				$is_first = ( 0 === $ei );
			?>
			<div class="hd-strip-card<?php echo $is_first ? ' is-active' : ''; ?>"
				data-expert-idx="<?php echo esc_attr( $ei ); ?>"
				data-title-full="<?php echo esc_attr( $expert['title'] ); ?>"
				data-title-short="<?php echo esc_attr( $expert['short'] ); ?>">

				<!-- Image -->
				<div class="hd-strip-card-img">
					<?php if ( ! empty( $expert['image'] ) ) :
						echo wp_get_attachment_image(
							(int) $expert['image']['ID'],
							'large',
							false,
							[
								'alt'     => esc_attr( $expert['title'] ),
								'loading' => $is_first ? 'eager' : 'lazy',
							]
						);
					endif; ?>
					<div class="hd-strip-card-img-overlay"></div>
					<div class="hd-strip-card-indicator" aria-hidden="true">
						<span class="hd-strip-indicator-dot"></span>
						<span>Active</span>
					</div>
				</div>

				<!-- Body -->
				<div class="hd-strip-card-body">
					<div class="hd-strip-card-title">
						<?php echo $is_first ? esc_html( $expert['title'] ) : esc_html( $expert['short'] ); ?>
					</div>

					<div class="hd-strip-card-reveal">
						<div class="hd-strip-card-divider"></div>

						<?php if ( $expert['desc'] ) : ?>
						<p class="hd-strip-card-desc"><?php echo esc_html( $expert['desc'] ); ?></p>
						<?php endif; ?>

						<?php if ( ! empty( $expert['contribs'] ) ) : ?>
						<ul class="hd-strip-card-contribs">
							<?php foreach ( $expert['contribs'] as $contrib ) : ?>
							<li>
								<span class="hd-strip-contrib-dot" aria-hidden="true"></span>
								<?php echo esc_html( $contrib ); ?>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>

						<?php if ( ! empty( $expert['cta_url'] ) ) : ?>
						<a href="<?php echo esc_url( $expert['cta_url'] ); ?>"
							class="hd-strip-card-cta">
							<?php echo esc_html( $expert['cta_text'] ); ?>
						</a>
						<?php else : ?>
						<button type="button" class="hd-strip-card-cta tnb-popup-trigger">
							<?php echo esc_html( $expert['cta_text'] ); ?>
						</button>
						<?php endif; ?>
						
					</div>
				</div>

			</div>
			<?php endforeach; ?>
		</div><!-- .hd-strip -->

	</div><!-- .hd-container -->
</section>
