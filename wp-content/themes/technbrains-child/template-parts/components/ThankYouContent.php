<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data', array() );
$steps    = $data['steps'] ?? array();
$modifier = esc_attr( get_query_var( 'component_modifier_classes', '' ) );
?>
<style>.revamp-ty-wrapper{padding:80px 20px;background-color:#fcfcfc;min-height:100vh;display:flex;justify-content:center;align-items:center}.revamp-ty-wrapper .revamp-ty-container{max-width:800px;width:100%;text-align:center}.revamp-ty-wrapper .revamp-ty-header-text{margin-bottom:40px}.revamp-ty-wrapper .revamp-ty-header-text h1{color:#0d1b3e;font-size:42px;font-weight:800;margin-bottom:15px}.revamp-ty-wrapper .revamp-ty-header-text p{color:#666;font-size:18px;margin-top:0;margin-bottom:1rem}.revamp-ty-wrapper .revamp-ty-process-card{background:#fff;border:1px solid #eee;border-radius:12px;padding:50px;text-align:left;box-shadow:0 4px 20px rgba(0,0,0,.02);margin-bottom:20px}.revamp-ty-wrapper .revamp-ty-process-card h6{font-size:14px;font-weight:700;color:#0d1b3e;margin-bottom:40px;text-transform:capitalize}.revamp-ty-wrapper .revamp-ty-step-item{display:flex;gap:25px;position:relative}.revamp-ty-wrapper .revamp-ty-step-left{display:flex;flex-direction:column;align-items:center}.revamp-ty-wrapper .revamp-ty-circle{width:35px;height:35px;background-color:#eef2ff;color:#3b5998;border-radius:50%;display:flex;justify-content:center;align-items:center;font-weight:700;font-size:14px;z-index:2}.revamp-ty-wrapper .revamp-ty-line{width:1px;height:60px;border-left:1px dashed #ddd;margin:5px 0}.revamp-ty-wrapper .revamp-ty-step-right{padding-bottom:40px}.revamp-ty-wrapper .revamp-ty-step-right h4{font-size:18px;font-weight:700;color:#0d1b3e;margin:0 0 8px}.revamp-ty-wrapper .revamp-ty-step-right p{font-size:15px;color:#777;margin:0;line-height:1.5}.revamp-ty-wrapper .revamp-ty-step-item:last-child .revamp-ty-step-right{padding-bottom:0}.revamp-ty-wrapper .revamp-ty-action-card{background:#fff;border:1px solid #eee;border-radius:12px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,.02)}.revamp-ty-wrapper .revamp-ty-stats-text{font-size:13px;color:#666;margin-bottom:20px;font-weight:500}.revamp-ty-wrapper .revamp-ty-btn-group{display:flex;justify-content:center;gap:15px}.revamp-ty-wrapper .revamp-ty-btn-group a,.revamp-ty-wrapper .revamp-ty-btn-group button{padding:12px 35px;border-radius:6px;font-weight:600;font-size:14px;cursor:pointer;transition:.3s;text-decoration:none;display:inline-block}.revamp-ty-wrapper .revamp-ty-btn-red{background-color:#ed1c24;color:#fff;border:none}.revamp-ty-wrapper .revamp-ty-btn-red:hover{background-color:#c4161b;color:#fff}.revamp-ty-wrapper .revamp-ty-btn-outline{background-color:#fff;color:#666;border:1px solid #ccc}.revamp-ty-wrapper .revamp-ty-btn-outline:hover{border-color:#999;color:#333}@media(max-width:768px){.revamp-ty-wrapper{padding:40px 15px}.revamp-ty-wrapper .revamp-ty-header-text h1{font-size:28px}.revamp-ty-wrapper .revamp-ty-process-card{padding:30px 20px}.revamp-ty-wrapper .revamp-ty-btn-group{flex-direction:column}.revamp-ty-wrapper .revamp-ty-btn-group a,.revamp-ty-wrapper .revamp-ty-btn-group button{width:100%;text-align:center}}</style>
<section class="revamp-ty-wrapper <?php echo $modifier; ?>">
	<div class="revamp-ty-container">

		<div class="revamp-ty-header-text">
			<h1>Thanks, We've Got Your Brief</h1>
			<p>A team member will review it and get back to you within 24 hours.</p>
		</div>

		<div class="revamp-ty-process-card">
			<h6>What happens next</h6>
			<div class="revamp-ty-stepper">
				<?php foreach ( $steps as $i => $step ) : ?>
					<div class="revamp-ty-step-item">
						<div class="revamp-ty-step-left">
							<div class="revamp-ty-circle"><?php echo esc_html( $step['id'] ); ?></div>
							<?php if ( $i < count( $steps ) - 1 ) : ?>
								<div class="revamp-ty-line"></div>
							<?php endif; ?>
						</div>
						<div class="revamp-ty-step-right">
							<h4><?php echo esc_html( $step['title'] ); ?></h4>
							<p><?php echo esc_html( $step['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="revamp-ty-action-card">
			<p class="revamp-ty-stats-text">150+ products shipped for startups and enterprises</p>
			<div class="revamp-ty-btn-group">
				<button type="button" class="revamp-ty-btn-red" onclick="var t=document.getElementById('tnb-calendar-trigger');if(t)t.click();">Book a quick call</button>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="revamp-ty-btn-outline">Back to website</a>
			</div>
		</div>

	</div>
</section>
