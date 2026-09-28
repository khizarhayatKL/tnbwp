<?php
defined( 'ABSPATH' ) || exit;

$_data     = get_query_var( 'component_data' );
$_modifier = get_query_var( 'component_modifier_classes' ) ?: '';
$_key      = $args['data_key'] ?? 'nxt_step';

$nxt = wp_parse_args( $_data[ $_key ] ?? [], [
  'title'       => "Let's Build the Right Foundation for Your Product",
  'sub'         => 'With 150+ products shipped, we help startups and enterprises build and scale with clarity, speed, and predictable execution.',
  'bg_class'    => '',
  'bg_image'    => '',
  'btn_primary' => [ 'label' => 'Get Guidance',        'href' => '' ],
  'btn_ghost'   => [ 'label' => 'Speak With Our Team', 'href' => '/contact-us' ],
] );

$section_class = trim( 'section nxt ' . $nxt['bg_class'] . ' ' . $_modifier );
$bg_style      = $nxt['bg_image'] ? ' style="background-image:url(' . esc_url( $nxt['bg_image'] ) . ')"' : '';
?>
<section class="<?php echo esc_attr( $section_class ); ?>"<?php echo $bg_style; ?> data-screen-label="04b Next Step">
  <div class="container nxt-inner">
    <h2 class="nxt-title"><?php echo esc_html( $nxt['title'] ); ?></h2>
    <?php if ( ! empty( $nxt['sub'] ) ) : ?>
    <p class="nxt-sub"><?php echo esc_html( $nxt['sub'] ); ?></p>
    <?php endif; ?>
    <div class="nxt-actions">
      <?php if ( ! empty( $nxt['btn_primary']['label'] ) ) :
			$primary_href = $nxt['btn_primary']['href'] ?? '';
			$primary_class = 'btn btn-primary';
			if ( empty($primary_href) ) {
				$primary_class .= ' tnb-popup-trigger';
			}
		?>
			<a class="<?php echo esc_attr($primary_class); ?>"
			   <?php if ( ! empty($primary_href) ) : ?>
				   href="<?php echo esc_url($primary_href); ?>"
			   <?php endif; ?>>
				<?php echo esc_html( $nxt['btn_primary']['label'] ); ?>
			</a>
		<?php endif; ?>
		 <?php if ( ! empty( $nxt['btn_ghost']['label'] ) ) :
			$ghost_href = $nxt['btn_ghost']['href'] ?? '';
			$ghost_class = 'btn btn-ghost-light';
			if ( empty($ghost_href) ) {
				$ghost_class .= ' tnb-popup-trigger';
			}
		?>
			<a class="<?php echo esc_attr($ghost_class); ?>"
			   <?php if ( ! empty($ghost_href) ) : ?>
				   href="<?php echo esc_url($ghost_href); ?>"
			   <?php endif; ?>>
				<?php echo esc_html( $nxt['btn_ghost']['label'] ); ?>
			</a>
		<?php endif; ?>
    </div>
  </div>
</section>