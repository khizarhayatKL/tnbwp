<?php
/**
 * Construction Software — The engineer on your project.
 *
 * Layout : cn_engineer (ACF Flexible Content)
 * Fields : cne_heading, cne_desc, cne_head_cta, cne_anchor, cne_photo, cne_quote,
 *          cne_name, cne_role, cne_linkedin
 * CSS    : assets/css/construction.css (.cn-eng-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The copy deck is explicit that this is a profile module and not a footer bio box, which is why it
 * is a <blockquote> with a <cite> rather than a card with a heading: the statement is the content
 * and the person is the attribution.
 *
 * The portrait carries the person's name as alt text rather than an empty alt. Every other image on
 * this page is decorative and passes alt="", but a photograph of a named individual is content —
 * someone who cannot see it still needs to know whose face is attached to the quote.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cne_heading  = tnb_accent_heading( (string) get_sub_field( 'cne_heading' ) );
$cne_desc     = trim( (string) get_sub_field( 'cne_desc' ) );
$cne_head_cta = get_sub_field( 'cne_head_cta' );
$cne_anchor  = sanitize_title( (string) get_sub_field( 'cne_anchor' ) );
$cne_photo   = get_sub_field( 'cne_photo' );
$cne_quote   = trim( (string) get_sub_field( 'cne_quote' ) );
$cne_name    = trim( (string) get_sub_field( 'cne_name' ) );
$cne_role    = trim( (string) get_sub_field( 'cne_role' ) );
$cne_li      = get_sub_field( 'cne_linkedin' );

$cne_kses = tnb_cn_allowed_html();
$cne_svg  = tnb_cn_svg_html();

$cne_li_url = is_array( $cne_li ) ? trim( (string) ( $cne_li['url'] ?? '' ) ) : trim( (string) $cne_li );

// The copy deck ships this field as a placeholder ("INSERT ASAD LINKEDIN URL"), so a bare '#' or an
// unresolved placeholder must not become a dead link.
if ( '#' === $cne_li_url || false !== stripos( $cne_li_url, 'insert' ) ) {
	$cne_li_url = '';
}

if ( '' === $cne_quote ) {
	return;
}

$cne_render_cta = static function ( $cta, $class ) {
	if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
		return;
	}
	if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
		echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
			. esc_html( (string) $cta['title'] ) . '</button>';
		return;
	}
	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
		. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
		. '>' . esc_html( (string) $cta['title'] ) . '</a>';
};
?>
<section class="dt-section cn-eng-sec"<?php echo '' !== $cne_anchor ? ' id="' . esc_attr( $cne_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cne_heading ) :
			$cne_has_extra = '' !== $cne_desc || ( is_array( $cne_head_cta ) && ! empty( $cne_head_cta['url'] ) );
			$cne_head_cl   = 'dt-head dt-rev' . ( $cne_has_extra ? ' cne-head' : ' dt-center' );
			?>
			<div class="<?php echo esc_attr( $cne_head_cl ); ?>">
				<?php if ( $cne_has_extra ) : ?>
					<div class="cne-head-text">
						<h2 class="dt-h2"><?php echo $cne_heading; // Sanitised by tnb_accent_heading(). ?></h2>
						<?php if ( '' !== $cne_desc ) : ?>
							<p class="dt-sub"><?php echo esc_html( $cne_desc ); ?></p>
						<?php endif; ?>
					</div>
					<?php if ( is_array( $cne_head_cta ) && ! empty( $cne_head_cta['url'] ) ) : ?>
						<div class="cne-head-cta">
							<?php $cne_render_cta( $cne_head_cta, 'dt-btn dt-btn-primary' ); ?>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<h2 class="dt-h2"><?php echo $cne_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-eng dt-rev">
			<span class="cn-eng-frame" aria-hidden="true"></span>

			<?php if ( ! empty( $cne_photo['id'] ) ) : ?>
				<div class="cn-eng-photo">
					<?php
					echo wp_get_attachment_image(
						(int) $cne_photo['id'],
						'medium',
						false,
						array(
							'alt'      => '' !== $cne_name ? $cne_name : '',
							'loading'  => 'lazy',
							'decoding' => 'async',
						)
					);
					?>
				</div>
			<?php endif; ?>

			<div class="cn-eng-body">
				<blockquote class="cn-eng-quote">
					<span class="cn-eng-qmark" aria-hidden="true">&ldquo;</span><?php
					echo wp_kses( $cne_quote, $cne_kses );
				?></blockquote>

				<?php if ( '' !== $cne_name || '' !== $cne_li_url ) : ?>
					<div class="cn-eng-foot">
						<cite class="cn-eng-cite">
							<?php if ( '' !== $cne_name ) : ?>
								<span class="cn-eng-n"><?php echo esc_html( $cne_name ); ?></span>
							<?php endif; ?>
							<?php if ( '' !== $cne_role ) : ?>
								<span class="cn-eng-role"><?php echo esc_html( $cne_role ); ?></span>
							<?php endif; ?>
						</cite>

						<?php if ( '' !== $cne_li_url ) : ?>
							<?php
							// Plain container, not a link: "Connect on" is label text only, and the
							// actual <a> wraps just the icon circle, so the link's hit target and its
							// hover colour are both the icon alone rather than the whole pill.
							?>
							<div class="cn-eng-li">
								<span><?php esc_html_e( 'Connect on', 'technbrains-child' ); ?></span>
								<a
									class="cn-eng-li-ic"
									href="<?php echo esc_url( $cne_li_url ); ?>"
									target="_blank"
									rel="noopener noreferrer"
									aria-label="<?php
										echo esc_attr(
											'' !== $cne_name
												/* translators: %s: person's name. */
												? sprintf( __( 'Connect with %s on LinkedIn', 'technbrains-child' ), $cne_name )
												: __( 'Connect on LinkedIn', 'technbrains-child' )
										);
									?>"
								><?php
									echo wp_kses( tnb_cn_icon( 'linkedin' ), $cne_svg );
								?></a>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
