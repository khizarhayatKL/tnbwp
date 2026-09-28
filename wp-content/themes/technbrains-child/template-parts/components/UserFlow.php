<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['user_flow'] ?? array();
$img       = get_stylesheet_directory_uri() . '/assets/images';
$mod       = get_query_var( 'component_modifier_classes', '' );
$heading   = $d['heading'] ?? '';
$thumb_img = $d['thumb_img'] ?? '';
$full_img  = $d['full_img'] ?? '';
$allowed   = array( 'span' => array() );
$full_url  = esc_url( $img . $full_img );
$thumb_url = esc_url( $img . $thumb_img );
?>
<section class="tatt-user-flow<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="head">
			<h3><?php echo wp_kses( $heading, $allowed ); ?></h3>
		</div>
		<div class="content">
			<div class="flow main-fancybox">
				<a href="<?php echo $full_url; ?>" data-fancybox="userflow-thumb">
					<img src="<?php echo $thumb_url; ?>" width="1242" height="559" alt="flow-thumbnail" loading="lazy" decoding="async">
				</a>
			</div>
			<div class="user-flow-btn">
				<div class="button">
					<p class="button__text">
						<span style="--index:0">V</span><span style="--index:1">I</span><span style="--index:2">E</span><span style="--index:3">W</span><span style="--index:4">&nbsp;</span><span style="--index:5">F</span><span style="--index:6">U</span><span style="--index:7">L</span><span style="--index:8">L</span><span style="--index:9">&nbsp;</span><span style="--index:10">U</span><span style="--index:11">S</span><span style="--index:12">E</span><span style="--index:13">R</span><span style="--index:14">F</span><span style="--index:15">L</span><span style="--index:16">O</span><span style="--index:17">W</span>
					</p>
					<div class="main-fancybox">
						<a href="<?php echo $full_url; ?>" data-fancybox="userflow-btn">
							<div class="button__circle">
								<svg viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="button__icon" width="14">
									<path d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" fill="currentColor"></path>
								</svg>
								<svg viewBox="0 0 14 15" fill="none" width="14" xmlns="http://www.w3.org/2000/svg" class="button__icon button__icon--copy">
									<path d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z" fill="currentColor"></path>
								</svg>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
