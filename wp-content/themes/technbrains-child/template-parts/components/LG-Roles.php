<?php
/**
 * Logistics — "By Operator" role cards (Carriers, Brokers/3PLs, Shippers,
 * Multimodal & marketplaces).
 *
 * Layout : lg_roles (ACF Flexible Content)
 * Fields : lgro_eyebrow, lgro_heading, lgro_sub,
 *          lgro_roles{ lgro_role_title, lgro_role_items{ lgro_item_text } }, lgro_note
 * CSS    : assets/css/logistics.css (.lg-role-*)
 * JS     : none.
 *
 * Role icons are uploaded per-row (lgro_role_icon) — no default, a role with
 * no upload simply has no icon.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgro_eyebrow = (string) get_sub_field( 'lgro_eyebrow' );
$lgro_heading = (string) get_sub_field( 'lgro_heading' );
$lgro_sub     = (string) get_sub_field( 'lgro_sub' );
$lgro_note    = (string) get_sub_field( 'lgro_note' );

$lgro_roles = [];
if ( have_rows( 'lgro_roles' ) ) {
	while ( have_rows( 'lgro_roles' ) ) {
		the_row();
		$lgro_title = trim( (string) get_sub_field( 'lgro_role_title' ) );
		if ( '' === $lgro_title ) {
			continue;
		}

		$lgro_items = [];
		if ( have_rows( 'lgro_role_items' ) ) {
			while ( have_rows( 'lgro_role_items' ) ) {
				the_row();
				$lgro_item_text = trim( (string) get_sub_field( 'lgro_item_text' ) );
				if ( '' !== $lgro_item_text ) {
					$lgro_items[] = $lgro_item_text;
				}
			}
		}

	$lgro_icon    = get_sub_field( 'lgro_role_icon' );
		$lgro_roles[] = [
			'title'    => $lgro_title,
			'items'    => $lgro_items,
			'icon_url' => is_array( $lgro_icon ) && ! empty( $lgro_icon['url'] ) ? (string) $lgro_icon['url'] : '',
			'icon_alt' => is_array( $lgro_icon ) ? (string) ( $lgro_icon['alt'] ?? '' ) : '',
		];
	}
}

if ( empty( $lgro_roles ) ) {
	return;
}
?>
<section class="dt-section lg-roles-section">
	<div class="container">

		<?php if ( '' !== $lgro_eyebrow || '' !== $lgro_heading || '' !== $lgro_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgro_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgro_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgro_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgro_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgro_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgro_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-roles">
			<?php foreach ( $lgro_roles as $lgro_i => $lgro_role ) : ?>
				<div class="lg-role dt-rev" style="transition-delay:<?php echo esc_attr( (string) ( $lgro_i * 70 ) ); ?>ms">
					<?php if ( '' !== $lgro_role['icon_url'] ) : ?>
						<span class="lg-role-ic">
							<img src="<?php echo esc_url( $lgro_role['icon_url'] ); ?>" alt="<?php echo esc_attr( $lgro_role['icon_alt'] ); ?>" width="22" height="22" loading="lazy" decoding="async">
						</span>
					<?php endif; ?>
					<h3><?php echo esc_html( $lgro_role['title'] ); ?></h3>
					<?php if ( ! empty( $lgro_role['items'] ) ) : ?>
						<ul class="lg-role-list">
							<?php foreach ( $lgro_role['items'] as $lgro_item ) : ?>
								<li><?php echo esc_html( $lgro_item ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( '' !== $lgro_note ) : ?>
			<p class="lg-roles-note dt-rev"><?php echo esc_html( $lgro_note ); ?></p>
		<?php endif; ?>

	</div>
</section>
