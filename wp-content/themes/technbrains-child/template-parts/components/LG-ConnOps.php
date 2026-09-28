<?php
/**
 * Logistics — Connected Operations: focus-area cards + "systems we connect" pills.
 *
 * Layout : lg_conn_ops (ACF Flexible Content)
 * Fields : lgco_eyebrow, lgco_heading, lgco_sub, lgco_focus_heading,
 *          lgco_focus_items{ lgco_focus_title, lgco_focus_desc },
 *          lgco_systems_heading, lgco_systems{ lgco_system_label, lgco_system_break }
 * CSS    : assets/css/logistics.css (.lg-driver-*, .lg-conn-*)
 * JS     : none.
 *
 * Renamed from the mockup's raw ".cn-driver"/".cn-drivers-grid" (Construction's
 * family prefix) to ".lg-driver"/".lg-drivers-grid" to avoid cross-family collision.
 * Both icon sets (focus items, system pills) are uploaded per-row — no default,
 * a row with no upload simply has no icon.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgco_eyebrow        = (string) get_sub_field( 'lgco_eyebrow' );
$lgco_heading        = (string) get_sub_field( 'lgco_heading' );
$lgco_sub            = (string) get_sub_field( 'lgco_sub' );
$lgco_focus_heading  = (string) get_sub_field( 'lgco_focus_heading' );
$lgco_systems_heading = (string) get_sub_field( 'lgco_systems_heading' );

$lgco_focus_items = [];
if ( have_rows( 'lgco_focus_items' ) ) {
	while ( have_rows( 'lgco_focus_items' ) ) {
		the_row();
		$lgco_title = trim( (string) get_sub_field( 'lgco_focus_title' ) );
		if ( '' === $lgco_title ) {
			continue;
		}
		$lgco_focus_icon    = get_sub_field( 'lgco_focus_icon' );
		$lgco_focus_items[] = [
			'title'    => $lgco_title,
			'desc'     => trim( (string) get_sub_field( 'lgco_focus_desc' ) ),
			'icon_url' => is_array( $lgco_focus_icon ) && ! empty( $lgco_focus_icon['url'] ) ? (string) $lgco_focus_icon['url'] : '',
			'icon_alt' => is_array( $lgco_focus_icon ) ? (string) ( $lgco_focus_icon['alt'] ?? '' ) : '',
		];
	}
}

$lgco_systems = [];
if ( have_rows( 'lgco_systems' ) ) {
	while ( have_rows( 'lgco_systems' ) ) {
		the_row();
		$lgco_label = trim( (string) get_sub_field( 'lgco_system_label' ) );
		if ( '' === $lgco_label ) {
			continue;
		}
		$lgco_system_icon = get_sub_field( 'lgco_system_icon' );
		$lgco_systems[]   = [
			'label'    => $lgco_label,
			'break'    => (bool) get_sub_field( 'lgco_system_break' ),
			'icon_url' => is_array( $lgco_system_icon ) && ! empty( $lgco_system_icon['url'] ) ? (string) $lgco_system_icon['url'] : '',
			'icon_alt' => is_array( $lgco_system_icon ) ? (string) ( $lgco_system_icon['alt'] ?? '' ) : '',
		];
	}
}

if ( empty( $lgco_focus_items ) && empty( $lgco_systems ) ) {
	return;
}
?>
<section class="dt-section lg-conn-section">
	<div class="container">

		<?php if ( '' !== $lgco_eyebrow || '' !== $lgco_heading || '' !== $lgco_sub ) : ?>
			<div class="dt-head dt-head-left dt-rev">
				<?php if ( '' !== $lgco_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgco_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgco_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgco_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgco_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgco_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lgco_focus_items ) ) : ?>
			<?php if ( '' !== $lgco_focus_heading ) : ?>
				<h3 class="lg-inhead dt-rev"><?php echo esc_html( $lgco_focus_heading ); ?></h3>
			<?php endif; ?>
			<div class="lg-drivers-grid">
				<?php foreach ( $lgco_focus_items as $lgco_i => $lgco_item ) : ?>
					<div class="lg-driver dt-rev" style="transition-delay:<?php echo esc_attr( (string) ( ( $lgco_i % 3 ) * 60 ) ); ?>ms">
						<?php if ( '' !== $lgco_item['icon_url'] ) : ?>
							<span class="lg-driver-ic">
								<img src="<?php echo esc_url( $lgco_item['icon_url'] ); ?>" alt="<?php echo esc_attr( $lgco_item['icon_alt'] ); ?>" width="20" height="20" loading="lazy" decoding="async">
							</span>
						<?php endif; ?>
						<b><?php echo esc_html( $lgco_item['title'] ); ?></b>
						<?php if ( '' !== $lgco_item['desc'] ) : ?>
							<p><?php echo esc_html( $lgco_item['desc'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lgco_systems ) ) : ?>
			<?php if ( '' !== $lgco_systems_heading ) : ?>
				<h3 class="lg-inhead dt-rev"><?php echo esc_html( $lgco_systems_heading ); ?></h3>
			<?php endif; ?>
			<div class="lg-conn-pills dt-rev">
				<?php foreach ( $lgco_systems as $lgco_i => $lgco_system ) : ?>
					<span class="lg-conn-pill">
						<?php if ( '' !== $lgco_system['icon_url'] ) : ?>
							<span class="lg-conn-ic" aria-hidden="true">
								<img src="<?php echo esc_url( $lgco_system['icon_url'] ); ?>" alt="" width="17" height="17" loading="lazy" decoding="async">
							</span>
						<?php endif; ?>
						<?php echo esc_html( $lgco_system['label'] ); ?>
					</span>
					<?php if ( $lgco_system['break'] ) : ?>
						<span class="lg-conn-break" aria-hidden="true"></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
