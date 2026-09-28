<?php
/**
 * Component: Location Our Clients — mirrors Locations/OurClients/OurClient.jsx
 *
 * Data key : our_clients
 * Fields   : red_text, title
 * Client logos: hardcoded (same as JSX)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['our_clients'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$red_text = $d['red_text'] ?? 'Our';
$title    = $d['title']    ?? 'Clients';

$client_list = array(
	array( 'src' => '/fixcar.png',     'w' => 280, 'h' => 86,  'alt' => 'Cruze 4 Cash' ),
	array( 'src' => '/fitforgolf.png', 'w' => 280, 'h' => 51,  'alt' => 'Fit For Golf' ),
	array( 'src' => '/c4c.png',        'w' => 185, 'h' => 100, 'alt' => 'Soccerfy' ),
	array( 'src' => '/cofit.png',      'w' => 175, 'h' => 140, 'alt' => 'EZ Grocery' ),
	array( 'src' => '/05-fit.png',     'w' => 280, 'h' => 65,  'alt' => 'Momentpin' ),
	array( 'src' => '/live.png',       'w' => 225, 'h' => 97,  'alt' => 'HMP Commerce' ),
	array( 'src' => '/whitetail.png',  'w' => 234, 'h' => 75,  'alt' => 'Thrive Studio' ),
	array( 'src' => '/socc.png',       'w' => 161, 'h' => 129, 'alt' => 'Khoja Leadership Forum' ),
);
?>
<section class="sec-three<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="main">
			<h2>
				<span><?php echo esc_html( $red_text ); ?></span>
				<?php echo esc_html( $title ); ?>
			</h2>
			<div class="img-grid">
				<?php foreach ( $client_list as $item ) : ?>
				<div class="cl-logo">
					<img
						src="<?php echo esc_url( $img_base . $item['src'] ); ?>"
						width="<?php echo (int) $item['w']; ?>"
						height="<?php echo (int) $item['h']; ?>"
						alt="<?php echo esc_attr( $item['alt'] ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
