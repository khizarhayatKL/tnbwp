<?php
/**
 * ACF field group — Case Study.
 *
 * Bound to the case_study post type, not to page_sections: case studies are a fixed
 * structure rendered by single-case_study.php, so there is no flexible content and nothing
 * registered in inc/acf-fields.php.
 *
 * Organised into one tab per section, matching the order single-case_study.php calls the
 * partials in. Tabs keep the edit screen to one short panel at a time — the group carries
 * ~45 fields and eleven repeaters, which as a flat column is unusable.
 *
 * Field keys are prefixed field_cs_* and names cs_*, so nothing can collide with the
 * page_sections layouts (pb_/ps_/hd_/abs_/sa_ prefixes) or the theme's eight existing
 * .cs- CSS classes.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/init', 'tnb_register_case_study_fields' );
function tnb_register_case_study_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_tnb_case_study',
		'title'    => 'Case Study',
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'case_study',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'active'                => true,
		'hide_on_screen'        => array( 'the_content', 'custom_fields', 'discussion', 'comments' ),
		'description'           => 'Content for the case study sections, in render order.',

		'fields' => array(

			// ── Hero ──────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_hero',
				'label'     => 'Hero',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'          => 'field_cs_hero_brand',
				'label'        => 'Client Name',
				'name'         => 'cs_hero_brand',
				'type'         => 'text',
				'instructions' => 'Rendered on its own line above the headline. e.g. "Spruce".',
				'wrapper'      => array( 'width' => '30' ),
			),
			array(
				'key'          => 'field_cs_hero_headline',
				'label'        => 'Headline',
				'name'         => 'cs_hero_headline',
				'type'         => 'textarea',
				'rows'         => 3,
				'instructions' => 'Follows the client name inside the same H1. Limited HTML is allowed: '
					. '&lt;br&gt; for a line break and &lt;span class="hl"&gt;…&lt;/span&gt; to highlight '
					. 'a figure. e.g. Property Services Platform That &lt;br&gt;Improved Operational '
					. 'Efficiency by &lt;span class="hl"&gt;60%&lt;/span&gt;',
				'wrapper'      => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_hero_lede',
				'label'        => 'Lede',
				'name'         => 'cs_hero_lede',
				'type'         => 'textarea',
				'rows'         => 2,
				'instructions' => 'One or two sentences under the headline.',
			),
			array(
				'key'           => 'field_cs_hero_brand_logo',
				'label'         => 'Client Logo',
				'name'          => 'cs_hero_brand_logo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Optional. Replaces the client name on the first line of the '
					. 'headline with a logo. The name above is still used as the logo\'s alt text, so '
					. 'fill it in either way. The hero is dark — upload a white or light version, SVG '
					. 'or transparent PNG.',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_cs_hero_brand_logo_scale',
				'label'         => 'Logo Height',
				'name'          => 'cs_hero_brand_logo_scale',
				'type'          => 'range',
				'min'           => 40,
				'max'           => 200,
				'step'          => 5,
				'default_value' => 100,
				'append'        => '%',
				'instructions'  => 'Height relative to the text line it replaces. Logos differ in how '
					. 'much of their box is ink, so wide wordmarks usually want less and square marks '
					. 'more.',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_cs_hero_bg',
				'label'         => 'Background Image',
				'name'          => 'cs_hero_bg',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Optional. Shown full strength with nothing over it, so upload an '
					. 'image that is already dark enough for white text to read on it. Leave empty '
					. 'for the plain dark hero. Use a wide image — 2400x1000 or so.',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_cs_hero_long',
				'label'         => 'Long headline treatment',
				'name'          => 'cs_hero_long',
				'type'          => 'true_false',
				'ui'            => 1,
				'instructions'  => 'Sets the headline smaller and wider, with a wider lede — the design\'s '
					. 'treatment for headlines that run past about eight words. Leave off for short headlines.',
				'default_value' => 0,
			),

			// ── Snapshot ──────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_snapshot',
				'label'     => 'Snapshot',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_snap_h2',
				'label'         => 'Heading',
				'name'          => 'cs_snap_h2',
				'type'          => 'text',
				'default_value' => 'Project Highlights & Key Metrics',
			),
			array(
				'key'          => 'field_cs_facts',
				'label'        => 'Facts',
				'name'         => 'cs_facts',
				'type'         => 'repeater',
				'instructions' => 'The six-cell grid at the top of the panel. Each row keeps the icon '
					. 'that belongs to its position in the approved design — industry, platform, region, '
					. 'timeline, engagement model, team size — unless you upload one.',
				'layout'       => 'table',
				'button_label' => '+ Add Fact',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'     => 'field_cs_fact_key',
						'label'   => 'Label',
						'name'    => 'cs_fact_key',
						'type'    => 'text',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'          => 'field_cs_fact_value',
						'label'        => 'Value',
						'name'         => 'cs_fact_value',
						'type'         => 'text',
						'instructions' => '&lt;br&gt; allowed.',
						'wrapper'      => array( 'width' => '50' ),
					),
					array(
						'key'           => 'field_cs_fact_icon',
						'label'         => 'Icon',
						'name'          => 'cs_fact_icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional override.',
						'wrapper'       => array( 'width' => '20' ),
					),
				),
			),
			array(
				'key'          => 'field_cs_roles_label',
				'label'        => 'Team Block — Label',
				'name'         => 'cs_roles_label',
				'type'         => 'text',
				'default_value' => 'Team Composition',
				'wrapper'      => array( 'width' => '33' ),
			),
			array(
				'key'          => 'field_cs_roles',
				'label'        => 'Team Composition',
				'name'         => 'cs_roles',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '+ Add Role',
				'min'          => 0,
				'max'          => 0,
				'wrapper'      => array( 'width' => '67' ),
				'sub_fields'   => array(
					array(
						'key'   => 'field_cs_role',
						'label' => 'Role',
						'name'  => 'cs_role',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'          => 'field_cs_blocks',
				'label'        => 'Detail Blocks',
				'name'         => 'cs_blocks',
				'type'         => 'repeater',
				'instructions' => 'The tile blocks under Team Composition. Two rows to start: the '
					. 'first is the tech block and the second the integrations block, and those two '
					. 'positions carry the built-in icons. Add more rows for anything else you want '
					. 'listed the same way.',
				'layout'       => 'block',
				'button_label' => '+ Add Block',
				'min'          => 2,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'     => 'field_cs_block_label',
						'label'   => 'Label',
						'name'    => 'cs_block_label',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'           => 'field_cs_block_icon',
						'label'         => 'Icon',
						'name'          => 'cs_block_icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional. Rendered about 30x30 with nothing drawn behind '
							. 'it, so include the border and background in the artwork. Leave empty '
							. 'for the built-in mark on its coloured badge.',
						'wrapper'       => array( 'width' => '50' ),
					),
					array(
						'key'          => 'field_cs_block_items',
						'label'        => 'Items',
						'name'         => 'cs_block_items',
						'type'         => 'repeater',
						'instructions' => 'Each item is a tile with its logo plus its name.',
						'layout'       => 'table',
						'button_label' => '+ Add Item',
						'min'          => 0,
						'max'          => 0,
						'sub_fields'   => array(
							array(
								'key'           => 'field_cs_block_item_logo',
								'label'         => 'Logo',
								'name'          => 'cs_block_item_logo',
								'type'          => 'image',
								'return_format' => 'array',
								'preview_size'  => 'thumbnail',
								'instructions'  => 'Square, transparent background.',
								'wrapper'       => array( 'width' => '25' ),
							),
							array(
								'key'     => 'field_cs_block_item_name',
								'label'   => 'Name',
								'name'    => 'cs_block_item_name',
								'type'    => 'text',
								'wrapper' => array( 'width' => '75' ),
							),
						),
					),
				),
			),

			// ── About ─────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_about',
				'label'     => 'About',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'          => 'field_cs_about_eyebrow',
				'label'        => 'Eyebrow',
				'name'         => 'cs_about_eyebrow',
				'type'         => 'text',
				'instructions' => 'e.g. "About Spruce".',
				'wrapper'      => array( 'width' => '40' ),
			),
			array(
				'key'     => 'field_cs_about_h2',
				'label'   => 'Heading',
				'name'    => 'cs_about_h2',
				'type'    => 'text',
				'wrapper' => array( 'width' => '60' ),
			),
			array(
				'key'           => 'field_cs_about_h2_sm',
				'label'         => 'Smaller heading',
				'name'          => 'cs_about_h2_sm',
				'type'          => 'true_false',
				'ui'            => 1,
				'instructions'  => 'The design sets this heading at 101px, dropping to 88px where the '
					. 'wording is longer. Turn on for the smaller of the two.',
				'default_value' => 0,
			),
			array(
				'key'          => 'field_cs_about_body',
				'label'        => 'Body',
				'name'         => 'cs_about_body',
				'type'         => 'textarea',
				'rows'         => 6,
				'instructions' => 'Use a blank line between paragraphs. &lt;br&gt; allowed.',
			),
			array(
				'key'          => 'field_cs_scale',
				'label'        => 'Scale Items',
				'name'         => 'cs_scale',
				'type'         => 'repeater',
				'instructions' => 'The four icon cards beside the copy.',
				'layout'       => 'table',
				'button_label' => '+ Add Item',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'     => 'field_cs_scale_text',
						'label'   => 'Text',
						'name'    => 'cs_scale_text',
						'type'    => 'textarea',
						'rows'    => 2,
						'wrapper' => array( 'width' => '80' ),
					),
					array(
						'key'           => 'field_cs_scale_icon',
						'label'         => 'Icon',
						'name'          => 'cs_scale_icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional override.',
						'wrapper'       => array( 'width' => '20' ),
					),
				),
			),

			// ── Quote ─────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_quote',
				'label'     => 'Client Quote',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_quote_photo',
				'label'         => 'Photo',
				'name'          => 'cs_quote_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Portrait crop. Recommended 900px on the long edge.',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_quote_text',
				'label'   => 'Quote',
				'name'    => 'cs_quote_text',
				'type'    => 'textarea',
				'rows'    => 4,
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_quote_name',
				'label'        => 'Attribution — Name or Title',
				'name'         => 'cs_quote_name',
				'type'         => 'text',
				'instructions' => 'e.g. "Operations Lead".',
				'wrapper'      => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_cs_quote_role',
				'label'        => 'Attribution — Company',
				'name'         => 'cs_quote_role',
				'type'         => 'text',
				'wrapper'      => array( 'width' => '50' ),
			),

			// ── Problem ───────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_problem',
				'label'     => 'Problem',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_prob_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'cs_prob_eyebrow',
				'type'          => 'text',
				'default_value' => 'The Challenge',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_prob_h2',
				'label'   => 'Heading',
				'name'    => 'cs_prob_h2',
				'type'    => 'text',
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_prob_body',
				'label'        => 'Narrative',
				'name'         => 'cs_prob_body',
				'type'         => 'textarea',
				'rows'         => 5,
				'instructions' => 'Blank line between paragraphs.',
			),
			array(
				'key'           => 'field_cs_prob_panel_label',
				'label'         => 'Panel Label',
				'name'          => 'cs_prob_panel_label',
				'type'          => 'text',
				'default_value' => 'Key Challenges',
				'wrapper'       => array( 'width' => '40' ),
			),
			array(
				'key'          => 'field_cs_challenges',
				'label'        => 'Challenges',
				'name'         => 'cs_challenges',
				'type'         => 'repeater',
				'instructions' => 'Numbered automatically in render order.',
				'layout'       => 'table',
				'button_label' => '+ Add Challenge',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'   => 'field_cs_challenge',
						'label' => 'Challenge',
						'name'  => 'cs_challenge',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'          => 'field_cs_prob_close',
				'label'        => 'Closing Line',
				'name'         => 'cs_prob_close',
				'type'         => 'textarea',
				'rows'         => 2,
				'instructions' => 'Sits below the list, inside the panel.',
			),

			// ── Solution ──────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_solution',
				'label'     => 'Solution',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_sol_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'cs_sol_eyebrow',
				'type'          => 'text',
				'default_value' => 'Our Solution',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'          => 'field_cs_sol_h2',
				'label'        => 'Heading',
				'name'         => 'cs_sol_h2',
				'type'         => 'textarea',
				'rows'         => 2,
				'instructions' => '&lt;br&gt; and &lt;span style="white-space:nowrap"&gt;…&lt;/span&gt; '
					. 'allowed, to control where the heading wraps.',
				'wrapper'      => array( 'width' => '70' ),
			),
			array(
				'key'     => 'field_cs_sol_lede',
				'label'   => 'Lede',
				'name'    => 'cs_sol_lede',
				'type'    => 'textarea',
				'rows'    => 2,
			),
			array(
				'key'          => 'field_cs_caps',
				'label'        => 'Capabilities',
				'name'         => 'cs_caps',
				'type'         => 'repeater',
				'instructions' => 'One tab per capability. Numbered automatically; each keeps the icon '
					. 'belonging to its position in the approved design unless you upload one.',
				'layout'       => 'block',
				'button_label' => '+ Add Capability',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'          => 'field_cs_cap_tab',
						'label'        => 'Tab Label',
						'name'         => 'cs_cap_tab',
						'type'         => 'text',
						'instructions' => 'Optional short form for the tab in the rail, where the design '
							. 'gives one line. Leave empty to use the title. e.g. title "Roof Measurement '
							. 'From Satellite Imagery", tab "Satellite Roof Measurement".',
					),
					array(
						'key'     => 'field_cs_cap_title',
						'label'   => 'Title',
						'name'    => 'cs_cap_title',
						'type'    => 'text',
						'wrapper' => array( 'width' => '60' ),
					),
					array(
						'key'           => 'field_cs_cap_icon',
						'label'         => 'Icon',
						'name'          => 'cs_cap_icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional override.',
						'wrapper'       => array( 'width' => '40' ),
					),
					array(
						'key'     => 'field_cs_cap_desc',
						'label'   => 'Description',
						'name'    => 'cs_cap_desc',
						'type'    => 'textarea',
						'rows'    => 2,
					),
					array(
						'key'          => 'field_cs_cap_result',
						'label'        => 'Result',
						'name'         => 'cs_cap_result',
						'type'         => 'text',
						'instructions' => 'The highlighted outcome line at the bottom of the panel.',
					),
				),
			),

			// ── Technology ────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_tech',
				'label'     => 'Technology',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_tech_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'cs_tech_eyebrow',
				'type'          => 'text',
				'default_value' => 'Engineering Approach',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_tech_h2',
				'label'   => 'Heading',
				'name'    => 'cs_tech_h2',
				'type'    => 'text',
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_tech_body',
				'label'        => 'Body',
				'name'         => 'cs_tech_body',
				'type'         => 'textarea',
				'rows'         => 7,
				'instructions' => 'Blank line between paragraphs.',
			),

			// ── Impact ────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_impact',
				'label'     => 'Impact',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_impact_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'cs_impact_eyebrow',
				'type'          => 'text',
				'default_value' => 'The Impact',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_impact_h2',
				'label'   => 'Heading',
				'name'    => 'cs_impact_h2',
				'type'    => 'text',
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'     => 'field_cs_impact_lede',
				'label'   => 'Lede',
				'name'    => 'cs_impact_lede',
				'type'    => 'textarea',
				'rows'    => 2,
			),
			array(
				'key'          => 'field_cs_ba',
				'label'        => 'Before → After',
				'name'         => 'cs_ba',
				'type'         => 'repeater',
				'instructions' => 'One row per pair. The Before / After column headers are fixed.',
				'layout'       => 'table',
				'button_label' => '+ Add Row',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'     => 'field_cs_ba_before',
						'label'   => 'Before',
						'name'    => 'cs_ba_before',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'     => 'field_cs_ba_after',
						'label'   => 'After',
						'name'    => 'cs_ba_after',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
				),
			),
			array(
				'key'           => 'field_cs_eng_eyebrow',
				'label'         => 'Engagement — Eyebrow',
				'name'          => 'cs_eng_eyebrow',
				'type'          => 'text',
				'default_value' => 'Our Engagement',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_eng_h2',
				'label'   => 'Engagement — Heading',
				'name'    => 'cs_eng_h2',
				'type'    => 'text',
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_eng_body',
				'label'        => 'Engagement — Body',
				'name'         => 'cs_eng_body',
				'type'         => 'textarea',
				'rows'         => 6,
				'instructions' => 'Blank line between paragraphs.',
			),
			array(
				'key'           => 'field_cs_outcomes_label',
				'label'         => 'Outcomes — Label',
				'name'          => 'cs_outcomes_label',
				'type'          => 'text',
				'default_value' => 'Business Outcomes',
				'wrapper'       => array( 'width' => '40' ),
			),
			array(
				'key'          => 'field_cs_outcomes',
				'label'        => 'Outcomes',
				'name'         => 'cs_outcomes',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => '+ Add Outcome',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'          => 'field_cs_outcome_value',
						'label'        => 'Value',
						'name'         => 'cs_outcome_value',
						'type'         => 'text',
						'instructions' => 'e.g. "50–60%", "2×".',
						'wrapper'      => array( 'width' => '30' ),
					),
					array(
						'key'     => 'field_cs_outcome_label',
						'label'   => 'Label',
						'name'    => 'cs_outcome_label',
						'type'    => 'text',
						'wrapper' => array( 'width' => '70' ),
					),
				),
			),

			// ── Expert note ───────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_expert',
				'label'     => 'Expert Note',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_expert_photo',
				'label'         => 'Photo',
				'name'          => 'cs_expert_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'wrapper'       => array( 'width' => '30' ),
			),
			array(
				'key'     => 'field_cs_expert_quote',
				'label'   => 'Quote',
				'name'    => 'cs_expert_quote',
				'type'    => 'textarea',
				'rows'    => 4,
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'          => 'field_cs_expert_name',
				'label'        => 'Name',
				'name'         => 'cs_expert_name',
				'type'         => 'text',
				'instructions' => 'Optional. Leave empty to credit the note by role alone, as the '
					. 'design does where the expert is not named.',
				'wrapper'      => array( 'width' => '34' ),
			),
			array(
				'key'          => 'field_cs_expert_role',
				'label'        => 'Role',
				'name'         => 'cs_expert_role',
				'type'         => 'text',
				'instructions' => 'e.g. "PropTech Product Strategy Lead".',
				'wrapper'      => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_cs_expert_org',
				'label'         => 'Organisation',
				'name'          => 'cs_expert_org',
				'type'          => 'text',
				'default_value' => 'TechnBrains',
				'wrapper'       => array( 'width' => '33' ),
			),

			// ── Logos ─────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_logos',
				'label'     => 'Client Reel',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'           => 'field_cs_logos_h2',
				'label'         => 'Heading',
				'name'          => 'cs_logos_h2',
				'type'          => 'text',
				'default_value' => "See How We've Solved Similar Challenges",
			),
			array(
				'key'          => 'field_cs_logos',
				'label'        => 'Clients',
				'name'         => 'cs_logos',
				'type'         => 'repeater',
				'instructions' => 'Scrolling reel of client logos. Add each client once — the template '
					. 'repeats the set to make the loop seamless.',
				'layout'       => 'table',
				'button_label' => '+ Add Client',
				'min'          => 0,
				'max'          => 0,
				'sub_fields'   => array(
					array(
						'key'           => 'field_cs_logo_img',
						'label'         => 'Logo',
						'name'          => 'cs_logo_img',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Client logo, transparent background, about 52px tall as '
							. 'rendered. Set the image\'s Alt Text in the media library — that is what '
							. 'a screen reader reads for this client. A row with no logo is skipped.',
						'wrapper'       => array( 'width' => '40' ),
					),
					array(
						'key'           => 'field_cs_logo_link',
						'label'         => 'Link',
						'name'          => 'cs_logo_link',
						'type'          => 'link',
						'return_format' => 'array',
						'instructions'  => 'Optional. Makes the logo clickable — tick "Open in new tab" '
							. 'in the link picker for an outside site. Leave empty and the logo is not '
							. 'a link.',
						'wrapper'       => array( 'width' => '60' ),
					),
				),
			),

			// ── CTA ───────────────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_cta',
				'label'     => 'CTA',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'   => 'field_cs_cta_h2',
				'label' => 'Heading',
				'name'  => 'cs_cta_h2',
				'type'  => 'text',
			),
			array(
				'key'     => 'field_cs_cta_sub',
				'label'   => 'Subheading',
				'name'    => 'cs_cta_sub',
				'type'    => 'textarea',
				'rows'    => 2,
			),
			array(
				'key'           => 'field_cs_cta_form_label',
				'label'         => 'Form Label',
				'name'          => 'cs_cta_form_label',
				'type'          => 'text',
				'default_value' => 'Access the full case study PDF',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_cs_cta_btn',
				'label'         => 'Submit Button',
				'name'          => 'cs_cta_btn',
				'type'          => 'text',
				'default_value' => 'Get PDF',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_cs_cta_alt_text',
				'label'         => 'Alternative — Prompt',
				'name'          => 'cs_cta_alt_text',
				'type'          => 'text',
				'default_value' => 'Prefer to talk instead?',
				'wrapper'       => array( 'width' => '40' ),
			),
			array(
				'key'          => 'field_cs_cta_alt_link',
				'label'        => 'Alternative — Button',
				'name'         => 'cs_cta_alt_link',
				'type'         => 'link',
				'return_format' => 'array',
				'instructions' => 'Set the URL to #tnb-popup to open the enquiry popup instead of '
					. 'navigating.',
				'wrapper'      => array( 'width' => '60' ),
			),
			array(
				'key'           => 'field_cs_cta_pdf',
				'label'         => 'Case Study PDF',
				'name'          => 'cs_cta_pdf',
				'type'          => 'file',
				'return_format' => 'url',
				'mime_types'    => 'pdf',
				'instructions'  => 'The file the form hands over. Upload it to this site — after a '
					. 'visitor submits their email the thank-you page starts the download for them. '
					. 'Leave empty and the form still captures the lead, it just sends nobody a file.',
			),

			// ── Card Display ─────────────────────────────────────────────────
			array(
				'key'       => 'field_cs_tab_card',
				'label'     => 'Card Display',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'left',
			),
			array(
				'key'          => 'field_cs_card_color_start',
				'label'        => 'Grid Card Color — Start',
				'name'         => 'cs_card_color_start',
				'type'         => 'color_picker',
				'instructions' => 'Optional. Used by the "Browse Case Studies By Industry" grid. '
					. 'Leave both this and End blank to auto-pick from the default rotation.',
				'wrapper'      => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_cs_card_color_end',
				'label'        => 'Grid Card Color — End',
				'name'         => 'cs_card_color_end',
				'type'         => 'color_picker',
				'instructions' => 'Optional — pairs with Start above for the gradient.',
				'wrapper'      => array( 'width' => '50' ),
			),
		),
	) );
}
