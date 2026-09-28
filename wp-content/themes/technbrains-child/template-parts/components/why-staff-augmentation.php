<?php
defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['why_staff_aug'] ?? [];
$heading    = $d['heading']    ?? '';
$para       = $d['para']       ?? '';
$subheading = $d['subheading'] ?? '';
$btn_text   = $d['btn_text']   ?? '';
$benefits   = $d['benefits']   ?? [];
$challenges = $d['challenges'] ?? [];
$mod        = get_query_var( 'component_modifier_classes', '' );
?>
<section class="WhyStaffAugmentation<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="headContent">
			<?php if ( $heading ) : ?>
			<h2><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
			<?php if ( $subheading ) : ?>
			<h3><?php echo esc_html( $subheading ); ?></h3>
			<?php endif; ?>
		</div>
		<div class="content">
			<div class="tableWrapper">
				<div class="leftSide">
					<div class="tableHead">
						<h3>Benefits</h3>
					</div>
					<div class="tableBody">
						<?php if ( ! empty( $benefits['list_title'] ) ) : ?>
						<h4><?php echo esc_html( $benefits['list_title'] ); ?></h4>
						<?php endif; ?>
						<ul>
							<?php foreach ( $benefits['items'] ?? [] as $item ) : ?>
							<li>
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"/></svg>
									<?php echo esc_html( $item['title'] ?? '' ); ?>
								</span>
								<p><?php echo esc_html( $item['text'] ?? '' ); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="rightSide">
					<div class="tableHead">
						<h3>Challenges</h3>
					</div>
					<div class="tableBody">
						<?php if ( ! empty( $challenges['list_title'] ) ) : ?>
						<h4><?php echo esc_html( $challenges['list_title'] ); ?></h4>
						<?php endif; ?>
						<ul>
							<?php foreach ( $challenges['items'] ?? [] as $item ) : ?>
							<li>
								<span>
									<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
									<?php echo esc_html( $item['title'] ?? '' ); ?>
								</span>
								<p><?php echo esc_html( $item['text'] ?? '' ); ?></p>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php if ( $btn_text ) : ?>
			<div class="buttonWrapper">
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
</section>
