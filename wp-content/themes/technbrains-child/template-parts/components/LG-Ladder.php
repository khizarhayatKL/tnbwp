<?php
/**
 * Logistics — Decision ladder (Buy → Integrate → Extend → Build → Replace) accordion.
 *
 * Layout : lg_ladder (ACF Flexible Content)
 * Fields : lgld_eyebrow, lgld_heading, lgld_sub,
 *          lgld_rows{ lgld_row_title, lgld_row_when, lgld_row_example, lgld_row_open }
 * CSS    : assets/css/logistics.css (.lg-lad-*)
 * JS     : assets/js/logistics.js — one-open-at-a-time accordion
 *          ([data-lg-lad] block; no-ops when the markup is absent).
 *
 * The "Choose this when:" bold lead-in is generated here rather than stored, so
 * editors only ever author the sentence that follows it.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgld_eyebrow = (string) get_sub_field( 'lgld_eyebrow' );
$lgld_heading = (string) get_sub_field( 'lgld_heading' );
$lgld_sub     = (string) get_sub_field( 'lgld_sub' );

$lgld_rows = [];
if ( have_rows( 'lgld_rows' ) ) {
	while ( have_rows( 'lgld_rows' ) ) {
		the_row();
		$lgld_title = trim( (string) get_sub_field( 'lgld_row_title' ) );
		if ( '' === $lgld_title ) {
			continue;
		}
		$lgld_rows[] = [
			'title'   => $lgld_title,
			'when'    => trim( (string) get_sub_field( 'lgld_row_when' ) ),
			'example' => trim( (string) get_sub_field( 'lgld_row_example' ) ),
			'open'    => (bool) get_sub_field( 'lgld_row_open' ),
		];
	}
}

if ( empty( $lgld_rows ) ) {
	return;
}

// If no row was marked open, default the first one — the ladder should never render
// fully collapsed.
$lgld_has_open = false;
foreach ( $lgld_rows as $lgld_row ) {
	if ( $lgld_row['open'] ) {
		$lgld_has_open = true;
		break;
	}
}
if ( ! $lgld_has_open ) {
	$lgld_rows[0]['open'] = true;
}
?>
<section class="dt-section lg-ladder-section">
	<div class="container">

		<?php if ( '' !== $lgld_eyebrow || '' !== $lgld_heading || '' !== $lgld_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgld_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgld_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgld_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgld_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgld_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgld_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-lad dt-rev" data-lg-lad>
			<?php foreach ( $lgld_rows as $lgld_i => $lgld_row ) : ?>
				<div class="lg-lad-row<?php echo $lgld_row['open'] ? ' open' : ''; ?>">
					<button type="button" class="lg-lad-head" aria-expanded="<?php echo $lgld_row['open'] ? 'true' : 'false'; ?>" data-lg-lad-head>
						<span class="lg-lad-rank"><?php echo esc_html( (string) ( $lgld_i + 1 ) ); ?></span>
						<span class="lg-lad-title"><?php echo esc_html( $lgld_row['title'] ); ?></span>
						<span class="lg-lad-chev"><?php echo tnb_lg_icon( 'chevron' ); ?></span>
					</button>
					<div class="lg-lad-body">
						<div class="lg-lad-inner">
							<?php if ( '' !== $lgld_row['when'] ) : ?>
								<p class="lg-lad-when"><b>Choose this when:</b> <?php echo esc_html( $lgld_row['when'] ); ?></p>
							<?php endif; ?>
							<?php if ( '' !== $lgld_row['example'] ) : ?>
								<p class="lg-lad-eg"><?php echo esc_html( $lgld_row['example'] ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
