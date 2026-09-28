<?php
/**
 * Homepage footer — closes page HTML, suppresses old theme footer.
 * Loaded via get_footer('homepage') in page-homepage.php.
 * The Footer.php component is already rendered inside <main>.
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;
?>
<?php get_template_part( 'template-parts/components/calendar-popup' ); ?>
</div><!-- #page .site -->
<?php wp_footer(); ?>
</body>
</html>
