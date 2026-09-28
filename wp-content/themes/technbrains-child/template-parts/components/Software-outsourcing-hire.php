<?php
/**
 * Software Outsourcing — Hire an outsourced team (intro + role cards).
 *
 * Layout : so_hire (ACF Flexible Content)
 * Fields : sohr_eyebrow, sohr_heading, sohr_lead, sohr_anchor, sohr_cta,
 *          sohr_roles_label,
 *          sohr_roles{ sohr_role_image, sohr_role_title, sohr_role_desc }
 * CSS    : assets/css/components.css (.so-hire-*)
 * JS     : assets/js/components.js — the shared .dt-rev reveal only.
 *
 * The CSS for this section is authored, not ported. The approved build names these
 * classes in so-2.jsx but defines them in no stylesheet — grep for so-hire across
 * its CSS returns nothing — so the section renders as unstyled divs there and
 * there is no screenshot of it either. Values are taken from the sections already
 * on this page (.dt-tier's card, .dt-devs-grid's breakpoints, .dt-sub's copy size)
 * so it belongs to the same set rather than inventing a look.
 *
 * The CTA carries no trailing arrow: the approved build hides every button arrow
 * globally, so it is left out of the markup rather than shipped and then hidden.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sohr_eyebrow = (string) get_sub_field( 'sohr_eyebrow' );
$sohr_heading = tnb_accent_heading( get_sub_field( 'sohr_heading' ) );
$sohr_lead    = (string) get_sub_field( 'sohr_lead' );
$sohr_anchor  = sanitize_title( (string) get_sub_field( 'sohr_anchor' ) );
$sohr_label   = (string) get_sub_field( 'sohr_roles_label' );
$sohr_cta     = get_sub_field( 'sohr_cta' );
$sohr_roles   = (array) get_sub_field( 'sohr_roles' );

if ( ! $sohr_roles ) {
	return;
}

$sohr_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

// Both halves are needed: a URL with no label would print an empty button.
$sohr_cta_url    = is_array( $sohr_cta ) ? (string) ( $sohr_cta['url'] ?? '' ) : '';
$sohr_cta_text   = is_array( $sohr_cta ) ? (string) ( $sohr_cta['title'] ?? '' ) : '';
$sohr_cta_target = is_array( $sohr_cta ) ? (string) ( $sohr_cta['target'] ?? '' ) : '';
?>
<section class="dt-section"<?php echo '' !== $sohr_anchor ? ' id="' . esc_attr( $sohr_anchor ) . '"' : ''; ?>>
	<div class="container">
		<div class="so-hire-top dt-rev">
			<div class="so-hire-intro">
				<?php if ( '' !== $sohr_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $sohr_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $sohr_heading ) : ?>
					<h2 class="dt-h2"><?php echo $sohr_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $sohr_lead ) : ?>
					<p class="so-hire-lead"><?php echo wp_kses( $sohr_lead, $sohr_kses ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( '' !== $sohr_cta_url && '' !== $sohr_cta_text ) : ?>
				<div class="so-hire-aside">
					<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $sohr_cta_url ); ?>"<?php
						echo '' !== $sohr_cta_target ? ' target="' . esc_attr( $sohr_cta_target ) . '" rel="noopener"' : '';
					?>><?php echo esc_html( $sohr_cta_text ); ?></a>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( '' !== $sohr_label ) : ?>
			<div class="so-hire-h dt-rev"><?php echo esc_html( $sohr_label ); ?></div>
		<?php endif; ?>

		<div class="so-hire-roles dt-rev">
			<?php
			foreach ( $sohr_roles as $sohr_role ) :
				$sohr_img   = (int) ( $sohr_role['sohr_role_image']['ID'] ?? 0 );
				$sohr_title = (string) ( $sohr_role['sohr_role_title'] ?? '' );
				$sohr_desc  = (string) ( $sohr_role['sohr_role_desc'] ?? '' );

				if ( ! $sohr_img && '' === $sohr_title ) {
					continue;
				}
				?>
				<div class="so-hire-role">
					<?php if ( $sohr_img ) : ?>
						<div class="so-hire-img"><?php
							echo wp_get_attachment_image(
								$sohr_img,
								'medium_large',
								false,
								array(
									'loading'  => 'lazy',
									'decoding' => 'async',
								)
							);
						?></div>
					<?php endif; ?>
					<div class="so-hire-body">
						<?php if ( '' !== $sohr_title ) : ?>
							<b><?php echo esc_html( $sohr_title ); ?></b>
						<?php endif; ?>
						<?php if ( '' !== $sohr_desc ) : ?>
							<span class="so-hire-rd"><?php echo esc_html( $sohr_desc ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
