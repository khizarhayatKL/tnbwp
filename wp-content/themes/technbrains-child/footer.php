<?php
/**
 * Site footer — child theme override.
 * TNB_USE_NEW_LAYOUT = true  → new footer (Footer.php component + close HTML)
 * TNB_USE_NEW_LAYOUT = false → original footer (footer-main + footer-menus)
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

if ( defined( 'TNB_USE_NEW_LAYOUT' ) && TNB_USE_NEW_LAYOUT ) {
	// Render new footer component with registry data
	$registry = require get_stylesheet_directory() . '/data-registry/homepage.php';
	set_query_var( 'component_data', $registry['mock_data'] );
	if ( function_exists( 'tnb_page_has_layout' ) && tnb_page_has_layout( 'lp_hero' ) ) {
		get_template_part( 'template-parts/footer/nav-footer-lp' );
	} else {
		get_template_part( 'template-parts/components/Footer' );
	}
	get_template_part( 'template-parts/components/calendar-popup' );
	?>
</div><!-- #page .site -->
<?php wp_footer(); ?>
<?php
/**
 * LiveChat widget removed (PERF-5) -- duplicated SwiftSales, which is the
 * active chat/CRM tool going forward. Was loading a full ~44KB widget on
 * every page for a tool no longer the primary one in use.
 */
?>
</body>
</html>
	<?php
	return;
}
?>

	<footer class="main-footer" id="footerFrom">
		<?php get_template_part( 'template-parts/footer/footer-main' ); ?>
		<?php get_template_part( 'template-parts/footer/footer-menus' ); ?>
	</footer>

	<?php get_template_part( 'template-parts/components/calendar-popup' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
