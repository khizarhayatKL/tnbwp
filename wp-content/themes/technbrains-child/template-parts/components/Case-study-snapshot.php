<?php
/**
 * Case Study — Snapshot (project highlights and key metrics).
 *
 * Below the fact grid: the team composition block, which is fixed because its items are plain
 * role pills, then the tile blocks — tech stack, integrations, and anything else the editor
 * adds — from the cs_blocks repeater.
 *
 * Both the facts and the tile blocks take their icons by position, the same convention as
 * About-v2-capabilities.php: reordering a repeater keeps the design's icon-per-slot, and an
 * editor cannot leave one of the designed positions without a mark.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_snap_h2 = (string) get_field( 'cs_snap_h2' );
$cs_facts   = (array) get_field( 'cs_facts' );
$cs_allowed = tnb_cs_allowed_html();

$cs_fact_icons = array(
	'fact-industry',
	'fact-platform',
	'fact-region',
	'fact-timeline',
	'fact-engagement',
	'fact-team',
);

$cs_roles_label = (string) get_field( 'cs_roles_label' );
$cs_roles       = (array) get_field( 'cs_roles' );
$cs_blocks      = (array) get_field( 'cs_blocks' );

// The tile blocks take their icon by position, the same convention as the six facts: the first
// row is the tech block and the second the integrations block. A row past those two has no
// built-in mark, so it renders without a badge unless the editor uploads one.
$cs_block_icons = array(
	'block-code',
	'block-integrations',
);
?>
<section class="cs-section cs-snap2" data-screen-label="Snapshot">
	<div class="cs-wrap">
		<?php if ( '' !== $cs_snap_h2 ) : ?>
			<div class="cs-section-head sa-center cs-reveal" style="text-align:center;margin:0 auto 48px;">
				<h2 class="cs-h2"><?php echo wp_kses( $cs_snap_h2, $cs_allowed ); ?></h2>
			</div>
		<?php endif; ?>

		<div class="cs-snap2-panel cs-reveal d1">
			<?php if ( $cs_facts ) : ?>
				<?php
				// A definition list: every row is a label and its value. The row stays a <div> so
				// .cs-snap2-fact:nth-child(1..6), which the design uses to give each icon its own
				// gradient, keeps matching — dl > div > (dt, dd) is valid HTML5.
				?>
				<dl class="cs-snap2-facts">
					<?php foreach ( $cs_facts as $cs_i => $cs_fact ) : ?>
						<div class="cs-snap2-fact">
							<span class="cs-snap2-ic" aria-hidden="true"><?php
								echo tnb_cs_icon_slot( $cs_fact_icons, (int) $cs_i, $cs_fact['cs_fact_icon'] ?? null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme, or an escaped <img>.
							?></span>
							<dt class="cs-snap2-k"><?php echo esc_html( (string) ( $cs_fact['cs_fact_key'] ?? '' ) ); ?></dt>
							<dd class="cs-snap2-v"><?php echo wp_kses( (string) ( $cs_fact['cs_fact_value'] ?? '' ), $cs_allowed ); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			<?php endif; ?>

			<div class="cs-snap2-detail">
				<?php if ( $cs_roles ) : ?>
					<div class="cs-snap2-block">
						<span class="cs-snap2-blabel"><span class="cs-snap2-bic"><?php
							echo tnb_cs_icon( 'block-team' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
						?></span><?php echo esc_html( $cs_roles_label ); ?></span>
						<ul class="cs-snap-roles">
							<?php foreach ( $cs_roles as $cs_role ) : ?>
								<li class="cs-snap-role"><?php echo esc_html( (string) ( $cs_role['cs_role'] ?? '' ) ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php
				foreach ( $cs_blocks as $cs_bi => $cs_block ) :
					$cs_items = (array) ( $cs_block['cs_block_items'] ?? array() );

					// An empty row — the repeater ships two — renders nothing rather than an
					// orphaned label with a divider above it.
					if ( ! $cs_items ) {
						continue;
					}

					$cs_bic = tnb_cs_icon_slot( $cs_block_icons, (int) $cs_bi, $cs_block['cs_block_icon'] ?? null );
					?>
					<div class="cs-snap2-block">
						<span class="cs-snap2-blabel"><?php if ( '' !== $cs_bic ) : ?><span class="cs-snap2-bic" aria-hidden="true"><?php
							echo $cs_bic; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme, or an escaped <img>.
						?></span><?php endif; ?><?php echo esc_html( (string) ( $cs_block['cs_block_label'] ?? '' ) ); ?></span>
						<ul class="cs-snap-tools">
							<?php
							foreach ( $cs_items as $cs_item ) :
								$cs_logo_id = (int) ( $cs_item['cs_block_item_logo']['ID'] ?? 0 );
								?>
								<li class="cs-snap-tool"><?php if ( $cs_logo_id ) : ?><span class="cs-snap-tile" aria-hidden="true"><?php
									echo wp_get_attachment_image( $cs_logo_id, array( 50, 50 ), false, array( 'alt' => '', 'loading' => 'lazy' ) );
								?></span><?php endif; ?><span class="cs-snap-toolname"><?php echo esc_html( (string) ( $cs_item['cs_block_item_name'] ?? '' ) ); ?></span></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
