<?php
/**
 * Component: Language Services
 *
 * Data key : language_services
 * Fields   : head_text, para_text, btn_text, anchor (bool), btn_url (when anchor),
 *            listing[{img_src,width,height,alt,list_head,list_para}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['language_services'] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$listing   = $d['listing'] ?? array();
$is_anchor = ! empty( $d['anchor'] );
$btn_text  = $d['btn_text'] ?? '';
$btn_url   = $d['btn_url']  ?? '/contact-us';
?>
<section class="languageServices">
	<div class="container">
		<div class="ls-grid">
			<div class="ls-content">
				<h2><?php echo esc_html( $d['head_text'] ?? '' ); ?></h2>
				<p><?php echo wp_kses( $d['para_text'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
				<?php if ( $is_anchor ) : ?>
					<a href="<?php echo esc_url( home_url( $btn_url ) ); ?>" class="tnb-btn slideHOv"><?php echo esc_html( $btn_text ); ?></a>
				<?php else : ?>
					<button class="tnb-btn slideHOv tnb-popup-trigger" type="button"><?php echo esc_html( $btn_text ); ?></button>
				<?php endif; ?>
				<span>Or Call us at <a href="tel:+18338886032">+1 (833) 888-6032</a></span>
			</div>
			<div class="ls-list">
				<?php foreach ( $listing as $item ) : ?>
				<div class="ls-list-info">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo esc_attr( $item['width'] ?? '80' ); ?>"
						height="<?php echo esc_attr( $item['height'] ?? '80' ); ?>"
						alt="<?php echo esc_attr( $item['alt'] ?? $item['list_head'] ?? 'service image' ); ?>"
						loading="lazy"
					>
					<div>
						<h3><?php echo wp_kses( $item['list_head'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
						<p><?php echo wp_kses( $item['list_para'] ?? '', [ 
    'a' => [ 
        'href'   => [], 
        'title'  => [], 
        'target' => [], 
        'rel'    => [] 
    ] 
] ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
