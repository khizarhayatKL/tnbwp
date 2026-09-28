<?php
/**
 * ACF field group: per-page breadcrumb management.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ─── Helper: build breadcrumb items for a specific post ID (admin preview)
function tnb_get_breadcrumbs_for_post( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post || $post->post_status === 'auto-draft' ) {
		return array();
	}

	$items = array(
		array( 'label' => 'Home', 'url' => home_url( '/' ), 'current' => false ),
	);

	// For blog posts: inject blog listing page (mirrors frontend logic)
	if ( 'post' === $post->post_type ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		if ( ! $blog_id ) {
			$blog_page = get_page_by_path( 'blog' );
			if ( $blog_page ) {
				$blog_id = $blog_page->ID;
			}
		}
		if ( $blog_id ) {
			$items[] = array(
				'label'   => get_the_title( $blog_id ),
				'url'     => get_permalink( $blog_id ),
				'current' => false,
			);
		} else {
			$items[] = array(
				'label'   => 'Blog',
				'url'     => home_url( '/blog/' ),
				'current' => false,
			);
		}
	}

	$ancestors = array_reverse( get_post_ancestors( $post_id ) );
	foreach ( $ancestors as $ancestor_id ) {
		$items[] = array(
			'label'   => get_the_title( $ancestor_id ),
			'url'     => get_permalink( $ancestor_id ),
			'current' => false,
		);
	}

	$title = get_the_title( $post );
	$items[] = array(
		'label'   => $title ?: '(no title)',
		'url'     => get_permalink( $post ),
		'current' => true,
	);

	return count( $items ) > 1 ? $items : array();
}

// ─── Register field group after ACF is ready
add_action( 'acf/init', function () {
	acf_add_local_field_group( array(
		'key'    => 'group_tnb_breadcrumb',
		'title'  => 'Breadcrumb',
		'fields' => array(

			// Read-only preview of auto-generated trail
			array(
				'key'       => 'field_tnb_bc_preview',
				'label'     => 'Auto-Generated Breadcrumb (preview)',
				'name'      => 'tnb_bc_preview_msg',
				'type'      => 'message',
				'message'   => '<em style="color:#666">Save the page first to see the preview.</em>',
				'new_lines' => '',
				'esc_html'  => 0,
			),

			// Toggle: use custom instead of auto
			array(
				'key'           => 'field_tnb_bc_override',
				'label'         => 'Override Breadcrumb',
				'name'          => 'tnb_breadcrumb_override',
				'type'          => 'true_false',
				'instructions'  => 'Enable to use custom breadcrumb items below instead of auto-generated.',
				'ui'            => 1,
				'default_value' => 0,
			),

			// Repeater: one row per breadcrumb item
			array(
				'key'               => 'field_tnb_bc_items',
				'label'             => 'Breadcrumb Items',
				'name'              => 'tnb_breadcrumb_items',
				'type'              => 'repeater',
				'instructions'      => 'Add items left to right. Select a page to auto-fill label and URL. Override label/URL manually if needed. Last row = current page (URL not required).',
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_tnb_bc_override',
							'operator' => '==',
							'value'    => '1',
						),
					),
				),
				'min'          => 1,
				'max'          => 0,
				'layout'       => 'table',
				'button_label' => 'Add Item',
				'sub_fields'   => array(

					// Page selector (optional) — auto-fills label + URL
					array(
						'key'          => 'field_tnb_bc_item_page',
						'label'        => 'Page (optional)',
						'name'         => 'page',
						'type'         => 'post_object',
						'instructions' => 'Select a page to auto-fill label & URL.',
						'required'     => 0,
						'post_type'    => array( 'page' ),
						'taxonomy'     => array(),
						'allow_null'   => 1,
						'multiple'     => 0,
						'return_format'=> 'object',
						'ui'           => 1,
						'wrapper'      => array( 'width' => '35' ),
					),

					// Label — shows page title if page selected; override here
					array(
						'key'          => 'field_tnb_bc_item_label',
						'label'        => 'Label Override',
						'name'         => 'label',
						'type'         => 'text',
						'instructions' => 'Leave empty to use page title.',
						'required'     => 0,
						'placeholder'  => 'Auto from page title',
						'wrapper'      => array( 'width' => '35' ),
					),

					// URL — uses page permalink if page selected; override or custom URL here
					array(
						'key'          => 'field_tnb_bc_item_url',
						'label'        => 'URL Override',
						'name'         => 'url',
						'type'         => 'text',
						'instructions' => 'Leave empty to use page URL. Required for custom items with no page.',
						'required'     => 0,
						'placeholder'  => 'Auto from page / custom URL',
						'wrapper'      => array( 'width' => '30' ),
					),
				),
			),
		),

		'location' => array(
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'page' ),
			),
			array(
				array( 'param' => 'post_type', 'operator' => '==', 'value' => 'post' ),
			),
		),

		'menu_order'            => 5,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
} );

// ─── Dynamically populate the preview message field
add_filter( 'acf/load_field/key=field_tnb_bc_preview', function ( $field ) {
	$post_id = 0;
	if ( isset( $_GET['post'] ) ) {
		$post_id = (int) $_GET['post'];
	} elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = (int) $_POST['post_ID'];
	}

	if ( ! $post_id ) {
		$field['message'] = '<em style="color:#666">Save the page first to see the auto-generated preview.</em>';
		return $field;
	}

	$items = tnb_get_breadcrumbs_for_post( $post_id );

	if ( empty( $items ) ) {
		$field['message'] = '<em style="color:#666">No breadcrumb for this page (homepage or no parent set).</em>';
		return $field;
	}

	$parts = array();
	foreach ( $items as $item ) {
		if ( ! empty( $item['url'] ) && ! $item['current'] ) {
			$parts[] = '<a href="' . esc_url( $item['url'] ) . '" style="color:#0073aa;text-decoration:none">'
				. esc_html( $item['label'] ) . '</a>';
		} else {
			$parts[] = '<strong>' . esc_html( $item['label'] ) . '</strong>';
		}
	}

	$field['message'] = '<div style="padding:8px 14px;background:#f9f9f9;border:1px solid #ddd;border-radius:4px;font-size:13px;line-height:2">'
		. implode( ' <span style="color:#aaa;margin:0 3px">&#8250;</span> ', $parts )
		. '</div>';

	return $field;
} );
