<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plate_key'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$box_listing = $d['box_listing'] ?? array();
$allowed     = array( 'br' => array() );
?>
<section class="plateKey<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="head">
			<h2>Key Features</h2>
		</div>
		<div class="gridSec">
			<?php foreach ( $box_listing as $item ) : ?>
			<div class="singBox <?php echo esc_attr( $item['class'] ); ?>">
				<img src="<?php echo esc_url( $img . '/case-studies/plate-talk/' . $item['img'] ); ?>" width="<?php echo esc_attr( $item['w'] ); ?>" height="<?php echo esc_attr( $item['h'] ); ?>" alt="<?php echo esc_attr( $item['class'] ); ?>" loading="lazy" decoding="async">
				<h4><?php echo wp_kses( $item['title'], $allowed ); ?></h4>
				<p><?php echo esc_html( $item['content'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
