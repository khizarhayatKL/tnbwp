<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['leading_tech_partner'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']   ?? '';
$para     = $d['para']    ?? '';
$listing  = $d['listing'] ?? [];
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="LeadingTechPartner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="leftSide">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>
			</div>
			<div class="rightSide">
				<ul class="awardList">
					<?php foreach ( $listing as $item ) : ?>
					<li>
						<img
							src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
							width="200"
							height="80"
							alt="Tech Partner"
							loading="lazy"
							decoding="async"
						>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
