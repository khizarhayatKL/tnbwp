<?php
defined( 'ABSPATH' ) || exit;

static $skl_printed = false;
if ( ! $skl_printed ) :
	$skl_printed = true;
?>
<style>.hireSkills{padding:60px 0;text-align:center;background-color:#f8f8f8}.hireSkills .content{padding-bottom:60px}.hireSkills .content h5{font-size:16px;font-weight:550;color:#ed2a32}.hireSkills .content h3{font-size:28px;font-weight:bold;color:#000}.hireSkills .content p{font-size:16px;font-weight:500;color:#000}.hireSkills .list{display:grid;grid-template-columns:1fr 1fr;gap:25px}.hireSkills .list .list-item{background-color:#fff;padding:30px 25px;text-align:left;box-shadow:0 3px 6px #0000001c;transition:.3s}.hireSkills .list .list-item:hover{background-color:#f8f8f8}.hireSkills .list .list-item h3{color:#ec1c24;font-size:40px;font-weight:bold;margin-bottom:10px}.hireSkills .list .list-item h4{font-size:25px;font-weight:600;position:relative;margin-bottom:25px}.hireSkills .list .list-item h4::before{content:"";border-bottom:2px solid #ec1c24;width:100px;height:5px;position:absolute;bottom:-10px;left:0}.hireSkills .list .list-item ul{list-style:none;padding-left:0;margin-top:20px;margin-bottom:0}.hireSkills .list .list-item ul li{font-size:16px;line-height:29px;display:flex;gap:10px}.hireSkills .list .list-item ul li::before{content:"✓ ";color:#ed2a32}@media(max-width:991px){.hireSkills .list{grid-template-columns:1fr}}@media(max-width:479px){.hireSkills .list .list-item{padding:30px 19px}.hireSkills .list .list-item h3{font-size:30px}}@media(max-width:280px){.hireSkills .list .list-item h3{font-size:20px}.hireSkills .list .list-item h4{font-size:18px}}</style>
<?php endif; ?>
<?php
$data      = get_query_var( 'component_data' );
$d         = $data['skills'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$skill_box = $d['skill_box'] ?? array();
?>
<section class="hireSkills<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<h3><?php echo esc_html( $d['sub_head'] ); ?></h3>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="list">
			<?php foreach ( $skill_box as $skill ) : ?>
			<div class="list-item">
				<h3><?php echo esc_html( $skill['head'] ?? '' ); ?></h3>
				<h4><?php echo esc_html( $skill['sub_head'] ?? '' ); ?></h4>
				<?php if ( ! empty( $skill['skill_list'] ) ) : ?>
				<ul>
					<?php foreach ( $skill['skill_list'] as $item ) : ?>
					<li><?php echo esc_html( $item['item'] ?? '' ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
