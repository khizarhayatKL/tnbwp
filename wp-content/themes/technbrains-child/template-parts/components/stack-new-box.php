<?php
/**
 * Component: Stack New Box
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['stack_new_box'] ?? array();
$subtitle = $d['subtitle'] ?? '';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );

static $snb_instance = 0;
$snb_instance++;
$uid = 'snb-' . $snb_instance;
?>
<section class="stackNewBox<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $subtitle ) : ?>
			<span><?php echo esc_html( $subtitle ); ?></span>
			<?php endif; ?>
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses( $title, array( 'span' => array(), 'br' => array(), 'a' => array( 'href' => true, 'class' => true ) ) ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
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
				<span><?php echo esc_html( $item['tab_title'] ?? '' ); ?></span>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="TabBox">
			<?php foreach ( $listing as $i => $item ) : ?>
			<?php $has_images = ! empty( $item['data_list'][0]['img_src'] ); ?>
			<div
				class="tab-content<?php echo 0 === $i ? ' active' : ''; ?>"
				data-snb-index="<?php echo esc_attr( $i ); ?>"
				data-snb-group="<?php echo esc_attr( $uid ); ?>"
			>
				<?php if ( $has_images ) : ?>
				<div class="tabFlex">
					<?php foreach ( $item['data_list'] ?? array() as $li ) : ?>
					<div class="singleBox">
						<img
							src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images' . ( $li['img_src'] ?? '' ) ); ?>"
							width="<?php echo esc_attr( $li['width'] ?? '100' ); ?>"
							height="<?php echo esc_attr( $li['height'] ?? '100' ); ?>"
							alt="<?php echo esc_attr( $li['title'] ?? 'technology' ); ?>"
							loading="lazy"
							decoding="async"
						>
                      <h4>
    <?php
    echo wp_kses(
        $li['title'] ?? '',
        [
            'a' => [
                'href'   => true,
                'title'  => true,
                'target' => true,
                'rel'    => true,
            ],
        ]
    );
    ?>
</h4>
					</div>
					<?php endforeach; ?>
				</div>
				<?php else : ?>
				<ul>
					<?php foreach ( $item['data_list'] ?? array() as $li ) : ?>
					<li><?php echo wp_kses( $li['title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
