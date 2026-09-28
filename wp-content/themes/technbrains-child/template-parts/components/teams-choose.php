<?php
/**
 * Component: Teams Choose
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['teams_choose'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$img_src  = $d['img_src']  ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
?>
<section class="teamChoose">
	<div class="container">
		<div class="content">
			<div class="topCont">
				<div class="leftSide">
					<?php if ( $title ) : ?>
					<h2><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
				</div>
				<div class="rightSide">
					<?php if ( $para ) : ?>
					<p><?php echo esc_html( $para ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<div class="BottomCont">
				<div class="leftSide">
					<?php if ( $img_src ) : ?>
					<img
						src="<?php echo esc_url( $img_base . $img_src ); ?>"
						width="600"
						height="480"
						alt="<?php echo esc_attr( $title ); ?>"
						loading="lazy"
						decoding="async"
					>
					<?php endif; ?>
				</div>
				<div class="rightSide">
					<ul>
						<?php foreach ( $listing as $item ) : ?>
						
<li>
    <h3><?php echo esc_html( $item['item'] ); ?></h3>
    <p><?php echo wp_kses( $item['para'], [ 
        'a' => [ 
            'href'   => [], 
            'title'  => [], 
            'target' => [], 
            'rel'    => [] 
        ] 
    ] ); ?></p>
	
</li>
<?php endforeach; ?>
						
					</ul>
					<?php if ( $btn_text ) : ?>
					<div class="btnWrapper">
						<button class="tnb-btn tnb-popup-trigger" type="button">
							<div class="textWrapper">
								<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
								<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
							</div>
						</button>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
