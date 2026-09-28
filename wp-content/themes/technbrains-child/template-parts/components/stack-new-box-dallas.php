<?php
/**
 * Component: Stack New Box Dallas
 * Matches: SoftwareDevDallas/SoftwareSolutions/StackNewBox/StackNewBox.jsx
 * Always renders tabFlex with images (no fallback list).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['stack_new_box'] ?? array();
$title   = $d['title']   ?? '';
$para    = $d['para']    ?? '';
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );

static $snbd_instance = 0;
$snbd_instance++;
$uid = 'snbd-' . $snbd_instance;
?>
<section class="stackNewBox<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses( $title, array( 'span' => array() ) ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="MainBox">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div
				class="Tab<?php echo 0 === $i ? ' active' : ''; ?>"
				data-snb-index="<?php echo esc_attr( $i ); ?>"
				data-snb-group="<?php echo esc_attr( $uid ); ?>"
				role="button"
				tabindex="0"
			>
				<h3><?php echo wp_kses( $item['tab_title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="TabBox">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div
				class="tab-content<?php echo 0 === $i ? ' active' : ''; ?>"
				data-snb-index="<?php echo esc_attr( $i ); ?>"
				data-snb-group="<?php echo esc_attr( $uid ); ?>"
			>
				<div class="tabFlex">
					<?php foreach ( $item['data_list'] ?? array() as $li ) : ?>
					<div class="singleBox">
						<img
							src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images' . ( $li['img_src'] ?? '' ) ); ?>"
							width="<?php echo esc_attr( $li['width'] ?? '100' ); ?>"
							height="<?php echo esc_attr( $li['height'] ?? '100' ); ?>"
                            alt="<?php echo esc_attr( wp_strip_all_tags( $li['title'] ?? 'technology' ) ); ?>"
							loading="lazy"
							decoding="async"
						>
						<p><?php echo wp_kses( $li['title'] ?? '', array( 
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
		</div>
		<?php endif; ?>
	</div>
</section>
