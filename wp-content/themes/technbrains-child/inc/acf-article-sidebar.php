<?php
/**
 * ACF field group: Article sidebar (Table of Contents) toggle.
 *
 * A `page-templates/page-flexible.php` page has no sidebar by default — this group adds an
 * admin-facing on/off switch plus an editor-curated TOC repeater, placed in the side column next
 * to the native Page Attributes box rather than merged into it (ACF has no supported way to
 * inject fields into that native metabox).
 *
 * The TOC is intentionally NOT auto-built from the page's own headings (that is how the source
 * prototype does it): every `art_*` layout carries its own optional `art_anchor` field, and the
 * editor manually lists which of those anchors should appear in the sidebar, in what order, under
 * what label. An empty repeater with the toggle on renders no `<aside>` at all — see
 * page-templates/page-flexible.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/init', 'tnb_register_article_sidebar_fields' );
function tnb_register_article_sidebar_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_tnb_article_sidebar',
		'title'  => 'Article Sidebar',
		'fields' => array(

			array(
				'key'           => 'field_tnb_show_sidebar',
				'label'         => 'Show Sidebar (Table of Contents)',
				'name'          => 'tnb_show_sidebar',
				'type'          => 'true_false',
				'instructions'  => 'Adds a sticky Table of Contents column next to the page content.',
				'ui'            => 1,
				'default_value' => 0,
			),

			array(
				'key'               => 'field_tnb_toc_items',
				'label'             => 'Table of Contents Items',
				'name'              => 'tnb_toc_items',
				'type'              => 'repeater',
				'instructions'      => 'One row per TOC link. The link text is the label; set the URL to "#" followed by a section\'s own "Anchor id" field exactly (e.g. "#glance").',
				'conditional_logic' => array(
					array(
						array(
							'field'    => 'field_tnb_show_sidebar',
							'operator' => '==',
							'value'    => '1',
						),
					),
				),
				'min'          => 0,
				'max'          => 0,
				'layout'       => 'table',
				'button_label' => '+ Add TOC item',
				'sub_fields'   => array(
					array(
						'key'           => 'field_tnb_toc_link',
						'label'         => 'Label / anchor',
						'name'          => 'toc_link',
						'type'          => 'link',
						'required'      => 1,
						'return_format' => 'array',
						'instructions'  => 'Title = label shown in the TOC. URL = "#" + the target section\'s Anchor id (e.g. "#glance").',
						'wrapper'       => array( 'width' => '100' ),
					),
				),
			),
		),

		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-templates/page-flexible.php',
				),
			),
		),

		'menu_order'            => 1,
		'position'              => 'side',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
}
