<?php
/**
 * Component: Table Two — mirrors EngagementModel/TableTwo.jsx
 *
 * Data key : table_two
 * Fields   : head_text, sub_head, para_text, classes,
 *            table_list[{ hiring, in_house, technbrains, para }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['table_two'] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$table_list = $d['table_list'] ?? array();
$mod_class = get_query_var( 'component_modifier_classes', '' ) ?: ( $d['classes'] ?? '' );
$mod_class = $mod_class ? ' ' . sanitize_html_class( $mod_class ) : '';
?>
<section class="tableTwo<?php echo esc_attr( $mod_class ); ?>">
	<div class="container">
		<div class="tt-content">
			<?php if ( ! empty( $d['head_text'] ) ) : ?>
			<span><?php echo esc_html( $d['head_text'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<h2><?php echo esc_html( $d['sub_head'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="table-responsive">
			<table class="tt-table">
				<thead>
					<tr>
						<th></th>
						<th>Staff Augmentation</th>
						<th>Software Development Teams</th>
						<th>Software Development Outsourcing</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $table_list as $row ) : ?>
					<tr>
						<td><?php echo esc_html( $row['hiring'] ?? '' ); ?></td>
						<td>
							<?php if ( ! empty( $row['in_house'] ) ) : ?>
							<img src="<?php echo esc_url( $img_base . '/engagement-model/dedicated-team/right.png' ); ?>" width="42" height="42" alt="&#10003;" loading="lazy" decoding="async">
							<?php else : ?>
							<span class="tt-dash">&mdash;</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ( ! empty( $row['technbrains'] ) ) : ?>
							<img src="<?php echo esc_url( $img_base . '/engagement-model/dedicated-team/right.png' ); ?>" width="42" height="42" alt="&#10003;" loading="lazy" decoding="async">
							<?php else : ?>
							<span class="tt-dash">&mdash;</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ( ! empty( $row['para'] ) ) : ?>
							<img src="<?php echo esc_url( $img_base . '/engagement-model/dedicated-team/right.png' ); ?>" width="42" height="42" alt="&#10003;" loading="lazy" decoding="async">
							<?php else : ?>
							<span class="tt-dash">&mdash;</span>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
