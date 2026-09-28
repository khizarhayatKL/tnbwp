<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plate_challenge'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$box_listing = $d['box_listing'] ?? array();
$side_img    = $d['side_img'] ?? '';
$img_w       = $d['img_w'] ?? 588;
$img_h       = $d['img_h'] ?? 819;
$heading     = $d['heading'] ?? '';
$allowed     = array( 'span' => array() );
?>
<section class="plateChallenge<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="gridSec">
			<div class="listingSection">
				<?php foreach ( $box_listing as $item ) : ?>
				<ul>
					<li>
						<h4><?php echo esc_html( $item['heading'] ); ?></h4>
						<p><?php echo esc_html( $item['para'] ); ?></p>
					</li>
				</ul>
				<?php endforeach; ?>
			</div>
			<div class="imageBox">
				<h2><?php echo wp_kses( $heading, $allowed ); ?></h2>
				<img src="<?php echo esc_url( $img . $side_img ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="sideImg" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>
