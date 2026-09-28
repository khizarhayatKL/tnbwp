<?php
defined( 'ABSPATH' ) || exit;

static $fl_printed = false;
if ( ! $fl_printed ) :
	$fl_printed = true;
?>
<style>.hireFreelance{padding:120px 0}.hireFreelance .freelance{display:grid;grid-template-columns:1fr 1fr}.hireFreelance .freelance .content{padding-bottom:60px}.hireFreelance .freelance .content h5{font-size:35px;font-weight:bold}.hireFreelance .freelance .content h5 span{color:#ed2a32}.hireFreelance .freelance .content p{font-size:16px;font-weight:500}.hireFreelance .freelance .content ul{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;padding:0}.hireFreelance .freelance .content ul li{list-style:none}.hireFreelance .freelance .content ul li h4{font-size:35px;font-weight:bold;color:#ed2a32}.hireFreelance .freelance .content ul li p{font-size:16px;font-weight:500}@media(max-width:1400px){.hireFreelance .freelance .content h5{font-size:32px}}@media(max-width:1199px){.hireFreelance .freelance{grid-gap:30px}.hireFreelance .freelance .content h5{font-size:30px}.hireFreelance .freelance .content p{font-size:18px}.hireFreelance .freelance .content ul li h4{font-size:30px}.hireFreelance .freelance .content ul li p{font-size:18px}}@media(max-width:991px){.hireFreelance .freelance{grid-template-columns:1fr;grid-gap:30px}.hireFreelance .freelance .image{text-align:center}.hireFreelance .freelance .content h5{font-size:22px;text-align:center}.hireFreelance .freelance .content p{font-size:15px;text-align:center}.hireFreelance .freelance .content ul li h4{font-size:22px;text-align:center}.hireFreelance .freelance .content ul li p{font-size:15px;text-align:center}}@media(max-width:767px){.hireFreelance .freelance{grid-gap:20px}}@media(max-width:479px){.hireFreelance{padding:50px 0 0}.hireFreelance .freelance .content h5{font-size:20px}.hireFreelance .freelance .content p{font-size:14px}}@media(max-width:280px){.hireFreelance{padding:50px 10px 0 0}.hireFreelance .freelance .content h5{font-size:18px}.hireFreelance .freelance .content p{font-size:12px}.hireFreelance .freelance .content ul li h4{font-size:18px}.hireFreelance .freelance .content ul li p{font-size:12px}}</style>
<?php endif; ?>
<?php
$data     = get_query_var( 'component_data' );
$d        = $data['freelance'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_span = array( 'span' => array(), 'br' => array() );
?>
<section class="hireFreelance<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="freelance">
			<div class="image">
				<img
					src="<?php echo esc_url( $img_base . ( $d['img_src'] ?? '' ) ); ?>"
					width="<?php echo (int) ( $d['img_width'] ?? 512 ); ?>"
					height="<?php echo (int) ( $d['img_height'] ?? 612 ); ?>"
					alt="<?php echo esc_attr( $d['img_alt'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
			</div>
			<div class="content">
				<?php if ( ! empty( $d['head_text'] ) ) : ?>
				<h2><?php echo wp_kses( $d['head_text'], $kses_span ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para_text'] ) ) : ?>
				<p><?php echo wp_kses( $d['para_text'], $kses_span ); ?></p>
				<?php endif; ?>
				<div class="list">
					<ul>
						<li>
							<span><?php echo esc_html( $d['head1'] ?? '' ); ?></span>
							<p><?php echo esc_html( $d['para1'] ?? '' ); ?></p>
						</li>
						<li>
							<span><?php echo esc_html( $d['head2'] ?? '' ); ?></span>
							<p><?php echo esc_html( $d['para2'] ?? '' ); ?></p>
						</li>
						<li>
							<span><?php echo esc_html( $d['head3'] ?? '' ); ?></span>
							<p><?php echo esc_html( $d['para3'] ?? '' ); ?></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
