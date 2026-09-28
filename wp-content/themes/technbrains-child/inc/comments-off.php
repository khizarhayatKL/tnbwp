<?php
/**
 * Comments and pingbacks: refuse new ones.
 *
 * No template on this site renders a comment form — the child theme's single.php overrides the
 * parent's and never calls comments_template() — but the posts were still comment_status=open, so
 * wp-comments-post.php accepted direct POSTs from bots that never load a page. Filtering
 * comments_open() is what stops that: wp_handle_comment_submission() backs both
 * wp-comments-post.php and the REST comment endpoint, and checks it. pings_open() does the same
 * for wp-trackback.php.
 *
 * Filters rather than a bulk comment_status update, so nothing has to be re-applied to each new
 * post and the change is undone by deleting this file.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// Front end only. wp-comments-post.php and /wp-json/ are both front-end contexts so they are still
// covered, but wp-admin is left alone on purpose: wp_ajax_replyto_comment() itself calls
// comments_open(), and an unguarded filter would stop an admin replying to the spam already in the
// queue. is_admin() is dependable here because themes load after WP_ADMIN is defined — not the case
// in an mu-plugin, which is what bit the export.php work earlier.
if ( ! is_admin() ) {
	add_filter( 'comments_open', '__return_false', 20 );
	add_filter( 'pings_open', '__return_false', 20 );
	add_filter( 'comments_array', '__return_empty_array', 20 );
	add_filter( 'feed_links_show_comments_feed', '__return_false' );

	/**
	 * Drops core's comment-reply script.
	 *
	 * It is currently enqueued on every post for a reply form that does not exist. Nothing in this
	 * theme or the local plugin tree enqueues it, so its source is a plugin present only on live;
	 * dequeuing is harmless either way.
	 */
	add_action( 'wp_enqueue_scripts', 'tnb_dequeue_comment_reply', 100 );
	function tnb_dequeue_comment_reply(): void {
		wp_dequeue_script( 'comment-reply' );
	}
}
