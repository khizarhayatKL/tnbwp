<?php
/**
 * Component: Engagement Table — mirrors EngagementModel/Table/Table.jsx
 *
 * Data key : engagement_table
 * Fields   : sub_head, head_text, para_text,
 *            table_list[{ hiring, in_house, technbrains, para }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['engagement_table'] ?? array();
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$table_list = $d['table_list'] ?? array();
$mod        = get_query_var( 'component_modifier_classes', '' );
?>
<section class="engagementTable<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="et-content">
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<span><?php echo esc_html( $d['sub_head'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['head_text'] ) ) : ?>
			<h2><?php echo esc_html( $d['head_text'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $table_list ) ) : ?>
		<div class="table-responsive">
			<table class="et-table">
				<thead>
					<tr>
						<th></th>
						<th>Inhouse</th>
						<th>Outsourcing</th>
						<th>
							<img
								src="/wp-content/uploads/2026/06/logo.png"
								width="180"
								height="36"
								alt="TechnBrains"
								loading="lazy"
								decoding="async"
							>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $table_list as $row ) : ?>
					<tr>
						<td><?php echo esc_html( $row['hiring'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['in_house'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['technbrains'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['para'] ?? '' ); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php endif; ?>
	</div>
</section>
