<?php
/**
 * Component: Tech Stack Tabs
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['tech_stack_tabs'] ?? [];
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
?>
<section class="techStackTabs">
	<div class="container">
		<div class="tst-main">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<div class="tst-listing" id="tnb-stack-listing">
			<ul class="tst-tabs">
				<?php foreach ( $listing as $i => $tab ) : ?>
				<li>
					<span class="<?php echo 0 === $i ? 'active' : ''; ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
						<?php echo esc_html( $tab['tabTitle'] ); ?>
					</span>
					<div class="tst-tabContent<?php echo 0 === $i ? ' active' : ''; ?>">
						<ul>
							<?php foreach ( $tab['dataList'] as $item ) : ?>
								<li><?php if ( ! empty( $item['link'] ) ) : ?><a href="<?php echo esc_url( $item['link'] ); ?>"><?php echo esc_html( $item['stack'] ); ?></a><?php else : echo esc_html( $item['stack'] ); endif; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( $btn_text ) : ?>
			<button class="tnb-btn tnb-popup-trigger" type="button">
				<div class="textWrapper">
					<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
					<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
				</div>
			</button>
			<?php endif; ?>
		</div>

		<div class="tst-mobileTabs" id="tnb-stack-mobile" aria-hidden="true">
			<ul class="tst-tabs">
				<?php foreach ( $listing as $i => $tab ) : ?>
				<li class="<?php echo 0 === $i ? 'active' : ''; ?>"><?php echo esc_html( $tab['tabTitle'] ); ?></li>
				<?php endforeach; ?>
			</ul>
			<?php foreach ( $listing as $i => $tab ) : ?>
			<div class="tst-tabContent<?php echo 0 === $i ? ' active' : ''; ?>">
				<ul>
					<?php foreach ( $tab['dataList'] as $item ) : ?>
					<li><?php if ( ! empty( $item['link'] ) ) : ?><a href="<?php echo esc_url( $item['link'] ); ?>"><?php echo esc_html( $item['stack'] ); ?></a><?php else : echo esc_html( $item['stack'] ); endif; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
