<?php
/**
 * Industry Experts — ACF flexible content layout
 *
 * Matches the IHExperts component from the Claude Design exactly.
 * Scroll-driven thumbnail rail + showcase card with swap animation.
 *
 * Layout name : experts_team
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow  = get_sub_field( 'ihe_eyebrow' );
$title    = get_sub_field( 'ihe_title' );
$cta_text = get_sub_field( 'ihe_cta_text' );
$cta_url  = get_sub_field( 'ihe_cta_url' );
$desc     = get_sub_field( 'ihe_description' );
$experts  = get_sub_field( 'ihe_experts' );

if ( empty( $experts ) ) {
	return;
}

$total = count( $experts );
?>
<section class="ih-section ih-experts-section" data-ih-experts-wrap>

	<div class="ih-container">
		<div class="ih-experts-head-row">
			<div class="ih-experts-head-left">

				<?php if ( $eyebrow ) : ?>
					<div class="ih-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>

				<div class="ih-experts-head-title-row">
					<?php if ( $title ) : ?>
						<h2 class="ih-h2"><?php echo wp_kses_post( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $cta_url && $cta_text ) : ?>
						<div class="ih-experts-head-cta">
							<a href="<?php echo esc_url( $cta_url ); ?>" class="ih-btn ih-btn-primary">
								<?php echo esc_html( $cta_text ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
							</a>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( $desc ) : ?>
					<p class="ih-sub"><?php echo esc_html( $desc ); ?></p>
				<?php endif; ?>

			</div>
		</div>
	</div>

	<div class="ih-container">
		<div class="ih-experts-shell">

			<div class="ih-experts-rail" role="tablist" aria-label="Industry engineering leadership">
				<?php foreach ( $experts as $i => $expert ) :
					$img_id = ! empty( $expert['ihe_expert_image']['ID'] ) ? (int) $expert['ihe_expert_image']['ID'] : 0;
					$role   = ! empty( $expert['ihe_expert_role'] )       ? $expert['ihe_expert_role']              : '';

					$distance = ( $i - 0 + $total ) % $total;
					if ( $i === 0 )                   { $order = 2; }
					elseif ( $distance === 1 )         { $order = 3; }
					elseif ( $distance === $total - 1 ){ $order = 1; }
					else                               { $order = 0; }
				?>
				<button
					type="button"
					role="tab"
					aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
					aria-label="<?php echo esc_attr( $role ); ?>"
					class="ih-experts-thumb<?php echo $i === 0 ? ' is-active' : ''; ?>"
					style="order:<?php echo (int) $order; ?>"
					data-ih-experts-thumb="<?php echo (int) $i; ?>">
					<?php if ( $img_id ) : ?>
						<?php echo wp_get_attachment_image( $img_id, 'medium', false, [
							'alt'     => '',
							'loading' => 'lazy',
						] ); ?>
					<?php else : ?>
						<svg viewBox="0 0 48 48" width="48" height="48" fill="none" aria-hidden="true"><circle cx="24" cy="18" r="10" fill="#CBD1DA"/><path d="M4 44c0-11 8.95-20 20-20s20 8.95 20 20" stroke="#CBD1DA" stroke-width="3" fill="none"/></svg>
					<?php endif; ?>
				</button>
				<?php endforeach; ?>
			</div>

			<div class="ih-experts-stage">
				<?php foreach ( $experts as $i => $expert ) :
					$e_role    = ! empty( $expert['ihe_expert_role'] )    ? $expert['ihe_expert_role']    : '';
					$e_title   = ! empty( $expert['ihe_expert_title'] )   ? $expert['ihe_expert_title']   : '';
					$e_desc    = ! empty( $expert['ihe_expert_desc'] )    ? $expert['ihe_expert_desc']     : '';
					$e_bullets = ! empty( $expert['ihe_expert_bullets'] ) ? $expert['ihe_expert_bullets']  : [];
				?>
				<article
					class="ih-experts-card<?php echo $i === 0 ? ' is-active' : ''; ?>"
					data-ih-experts-card="<?php echo (int) $i; ?>">

					<?php if ( $e_role ) : ?>
						<span class="ih-experts-role"><?php echo esc_html( $e_role ); ?></span>
					<?php endif; ?>

					<?php if ( $e_title ) : ?>
						<h3><?php echo esc_html( $e_title ); ?></h3>
					<?php endif; ?>

					<?php if ( $e_desc ) : ?>
						<p class="ih-experts-desc"><?php echo esc_html( $e_desc ); ?></p>
					<?php endif; ?>

					<?php if ( $e_bullets ) : ?>
						<ul class="ih-experts-bullets">
							<?php foreach ( $e_bullets as $bullet ) :
								$bt = ! empty( $bullet['ihe_bullet_text'] ) ? $bullet['ihe_bullet_text'] : '';
								if ( $bt ) :
							?>
								<li><?php echo esc_html( $bt ); ?></li>
							<?php
								endif;
							endforeach; ?>
						</ul>
					<?php endif; ?>

				</article>
				<?php endforeach; ?>
			</div>

		</div>
	</div>

</section>
