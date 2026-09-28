<?php
/**
 * Component: Industry Features — mirrors Industry/Features/Features.jsx
 *
 * Data key : industry_features
 * Fields   : subtitle, title (HTML — span allowed), para,
 *            listing[{img_src, title, content}]                   (simple mode)
 *            listing[{tab_title, tab_content[{img_src,title,content}]}] (tab mode)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['industry_features'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$kses     = array( 'span' => array( 'class' => true ) );

$classes  = $d['classes'] ?? '';
$has_tabs = ! empty( $listing[0]['tab_title'] );

static $if_instance = 0;
$if_instance++;
$uid = 'if-' . $if_instance;

$sec_class = trim( 'mainFeatures' . ( $classes ? ' ' . $classes : '' ) . ( $mod ? ' ' . $mod : '' ) );
?>
<section class="<?php echo esc_attr( $sec_class ); ?>">
	<div class="container">
		<div class="features-info">
			<?php if ( ! empty( $d['subtitle'] ) ) : ?>
			<span class="subheading"><?php echo esc_html( $d['subtitle'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo wp_kses( $d['title'], $kses ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( $has_tabs ) : ?>
		<div class="tabs">
			<ul>
				<?php foreach ( $listing as $i => $item ) : ?>
				<li
					class="if-tab-btn<?php echo 0 === $i ? ' active-tab' : ''; ?>"
					data-if-group="<?php echo esc_attr( $uid ); ?>"
					data-if-index="<?php echo esc_attr( $i ); ?>"
					role="button"
					tabindex="0"
				><?php echo esc_html( $item['tab_title'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<div class="features-list">
			<?php if ( $has_tabs ) : ?>
				<?php foreach ( $listing as $i => $item ) : ?>
				<div
					class="tab-content<?php echo 0 === $i ? ' active-tab-content' : ''; ?>"
					data-if-group="<?php echo esc_attr( $uid ); ?>"
					data-if-index="<?php echo esc_attr( $i ); ?>"
				>
					<div class="content-list-grid">
						<?php foreach ( $item['tab_content'] ?? array() as $list ) : ?>
						<div class="features-box">
							<img
								src="<?php echo esc_url( $img_base . ( $list['img_src'] ?? '' ) ); ?>"
								width="61"
								height="61"
								alt="<?php echo esc_attr( $list['title'] ?? 'icon' ); ?>"
								loading="lazy"
								decoding="async"
							>
							<h3><?php echo esc_html( $list['title'] ?? '' ); ?></h3>
							<p><?php echo wp_kses( $list['content'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ( $listing as $item ) : ?>
				<div class="features-box">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="61"
						height="61"
						alt="<?php echo esc_attr( $item['title'] ?? 'feature icon' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
					<p><?php echo wp_kses( $item['content'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
