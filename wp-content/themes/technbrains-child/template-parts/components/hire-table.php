<?php
defined( 'ABSPATH' ) || exit;

static $htbl_printed = false;
if ( ! $htbl_printed ) :
	$htbl_printed = true;
?>
<style>.hireTable{padding:60px 0;text-align:center}.hireTable .content{padding-bottom:60px}.hireTable .content h5{font-size:16px;font-weight:550;color:#ed2a32}.hireTable .content h3{font-size:28px;font-weight:bold;color:#000}.hireTable .content p{font-size:16px;font-weight:500;color:#000}.hireTable .table{width:100%}.hireTable .table thead tr{font-size:20px;border:1px solid #ed2a32}.hireTable .table th{background-color:#ed2a32;color:#fff;padding:20px}.hireTable .table td{border:1px solid #d8d8d8;padding:20px}.hireTable .table td:nth-child(odd){background-color:#f5f5f5}@media(max-width:575px){.hireTable .content h3{font-size:20px}.hireTable .content p{font-size:14px}.hireTable .table th{font-size:16px}.hireTable .table tr{font-size:14px}}</style>
<?php endif; ?>
<?php
$data       = get_query_var( 'component_data' );
$d          = $data['hire_table'] ?? array();
$mod        = get_query_var( 'component_modifier_classes', '' );
$table_list = $d['table_list'] ?? array();
?>
<section class="hireTable<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<h2><?php echo esc_html( $d['sub_head'] ?? '' ); ?></h2>
			<p><?php echo wp_kses( $d['para_text'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
		</div>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Hiring From</th>
						<th>In-House</th>
						<th>TechnBrains</th>
						<th>Freelancer</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $table_list as $row ) : ?>
					<tr>
						<td><?php echo esc_html( $row['hiring'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['in_house'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['technbrains'] ?? '' ); ?></td>
						<td><?php echo esc_html( $row['freelancer'] ?? '' ); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
