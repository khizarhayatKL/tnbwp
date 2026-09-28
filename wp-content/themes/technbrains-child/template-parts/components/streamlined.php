<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['streamlined'] ?? [];
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="Streamlined<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="headContent">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="listing">
			<?php foreach ( $listing as $index => $list_item ) : ?>
			<div class="listItem">
				<div class="heading heading-<?php echo (int) $index; ?>">
					<?php echo esc_html( $list_item['heading'] ?? '' ); ?>
				</div>
				<ul>
					<?php foreach ( $list_item['item_list'] ?? [] as $item ) : ?>
					<li>
						<p><?php echo esc_html( $item['item'] ?? '' ); ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
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
</section>
