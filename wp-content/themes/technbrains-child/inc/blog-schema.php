<?php
/**
 * Blog post structured data — Article, FAQPage.
 *
 * Emitted only on single blog posts (is_singular('post')). Organization
 * schema is site-wide and printed elsewhere; this file must not duplicate it.
 * SEO-G6: the BreadcrumbList is not built here any more — tnb_breadcrumb_schema()
 * (wp_footer) emits it from the same items the visible trail printed
 * (Home > Blog > Category > Post via inc/breadcrumbs.php); the Article only
 * references it by @id.
 *
 * Data sources (all auto-fetched per post):
 *   headline      post title
 *   description   Yoast meta description (fallback: excerpt)
 *   image         featured image (full size)
 *   dates         published / modified, ISO 8601
 *   author        display name + author archive URL
 *   publisher     TechnBrains + theme logo (hardcoded)
 *   category      Yoast primary category (fallback: first assigned)
 *   FAQ           ACF `faqs` repeater (question / answer sub fields)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The post's primary category (Yoast primary term when set, else first).
 *
 * @return WP_Term|null
 */
function tnb_blog_schema_primary_category( $post_id ) {
	$primary_id = (int) get_post_meta( $post_id, '_yoast_wpseo_primary_category', true );
	if ( $primary_id ) {
		$term = get_term( $primary_id, 'category' );
		if ( $term instanceof WP_Term ) {
			return $term;
		}
	}
	$cats = get_the_category( $post_id );
	return ! empty( $cats ) ? $cats[0] : null;
}

add_action( 'wp_head', 'tnb_blog_schema_output', 12 );

function tnb_blog_schema_output() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	$post_id   = get_queried_object_id();
	$permalink = get_permalink( $post_id );

	// ── Article ────────────────────────────────────────────────────────────
	
	$description = get_post_meta( $post_id, '_yoast_wpseo_metadesc', true );
	if ( ! is_string( $description ) || trim( $description ) === '' ) {
		$description = get_the_excerpt( $post_id );
	}

	$article = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Article',
		'headline'      => get_the_title( $post_id ),
		'description'   => wp_strip_all_tags( $description ),
		'url'           => $permalink,
		'datePublished' => get_the_date( 'c', $post_id ),
		'dateModified'  => get_the_modified_date( 'c', $post_id ),
		'author'        => array(
			'@type' => 'Person',
			'name'  => get_the_author_meta( 'display_name', (int) get_post_field( 'post_author', $post_id ) ),
			'url'   => get_author_posts_url( (int) get_post_field( 'post_author', $post_id ) ),
		),
		'publisher'     => array(
			'@type' => 'Organization',
			'name'  => 'TechnBrains',
			'logo'  => array(
				'@type' => 'ImageObject',
				'url'   => get_stylesheet_directory_uri() . '/assets/images/logo.svg',
			),
		),
		'mainEntityOfPage' => array(
			'@type' => 'WebPage',
			'@id'   => $permalink,
		),
		'breadcrumb'    => array( '@id' => $permalink . '#breadcrumb' ),
	);

	$image = get_the_post_thumbnail_url( $post_id, 'full' );
	if ( $image ) {
		$article['image'] = $image;
	}

	// ── FAQPage: ACF `faqs` repeater ───────────────────────────────────────
	
	$faq_entities = array();
	if ( function_exists( 'have_rows' ) && have_rows( 'faqs', $post_id ) ) {
		while ( have_rows( 'faqs', $post_id ) ) {
			the_row();
			$question   = get_sub_field( 'question' );
			$answer     = get_sub_field( 'answer' );
			$additional = get_sub_field( 'additional_content' );
			// answer text mirrors the visible card body: plain answer field
			// plus the wysiwyg additional_content (either may be empty).
			// Rows with no answer at all are skipped — FAQPage requires
			// acceptedAnswer.text; an empty one invalidates the whole block.
			$answer_txt = trim( wp_strip_all_tags( trim( (string) $answer . ' ' . (string) $additional ) ) );
			if ( $question && $answer_txt !== '' ) {
				$faq_entities[] = array(
					'@type'          => 'Question',
					'name'           => wp_strip_all_tags( $question ),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $answer_txt,
					),
				);
			}
		}
	}

	$blocks = array( $article );
	
	if ( $faq_entities ) {
		$blocks[] = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $faq_entities,
		);
	}

	foreach ( $blocks as $block ) {
		echo '<script type="application/ld+json">' .
			wp_json_encode( $block, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) .
			'</script>' . "\n";
	}
}
