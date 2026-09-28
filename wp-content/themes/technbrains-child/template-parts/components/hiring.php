<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['hiring'] ?? array();
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );

static $hr_instance = 0;
$hr_instance++;
$uid = 'hr-' . $hr_instance;

$tab1_items = array_values( array_filter( $listing, function( $item ) { return ( $item['key'] ?? '' ) === 'tab-1'; } ) );
$tab2_items = array_values( array_filter( $listing, function( $item ) { return ( $item['key'] ?? '' ) === 'tab-2'; } ) );
?>
<section class="hiring<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="hiring-content">
			<?php if ( ! empty( $d['lang_title'] ) ) : ?>
			<span><?php echo esc_html( $d['lang_title'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['hire_title'] ) ) : ?>
			<h2><?php echo esc_html( $d['hire_title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="hiring-tabs-list">
			<ul>
				<li
					class="hiring-tab-btn active"
					data-hr-tab="tab-1"
					data-hr-group="<?php echo esc_attr( $uid ); ?>"
					role="button"
					tabindex="0"
				>
					<span>Dedicated Team Hiring Process</span>
				</li>
				<li
					class="hiring-tab-btn"
					data-hr-tab="tab-2"
					data-hr-group="<?php echo esc_attr( $uid ); ?>"
					role="button"
					tabindex="0"
				>
					<span>Fixed Price Model</span>
				</li>
			</ul>
		</div>

		<div class="hiring-tab-box">
			<div
				class="hiring-tab-content active"
				data-hr-panel="tab-1"
				data-hr-group="<?php echo esc_attr( $uid ); ?>"
			>
				<?php foreach ( $tab1_items as $item ) : ?>
				<div class="hiring-box">
					<span><?php echo esc_html( $item['title'] ?? '' ); ?></span>
					<ul>
						<?php foreach ( $item['tab_points'] ?? array() as $point ) : ?>
						<li><?php echo esc_html( $point['text'] ?? '' ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endforeach; ?>
			</div>
			<div
				class="hiring-tab-content"
				data-hr-panel="tab-2"
				data-hr-group="<?php echo esc_attr( $uid ); ?>"
			>
				<?php foreach ( $tab2_items as $item ) : ?>
				<div class="hiring-box">
					<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
					<ul>
						<?php foreach ( $item['tab_points'] ?? array() as $point ) : ?>
						<li><?php echo esc_html( $point['text'] ?? '' ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
