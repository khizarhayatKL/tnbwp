<?php

/**
 * Flexible Content — layout dispatcher
 *
 * Called by page-templates/page-flexible.php (and page-platforms.php alias).
 * Loops through the 'page_sections' ACF Flexible Content field and routes
 * each row to its component template. Zero hardcoded content — every section
 * is added, reordered, and removed by editors via the "+ Add Section" button.
 *
 * To add a new section type:
 *   1. Register layout in inc/acf-fields.php → layouts array
 *   2. Create template-parts/components/{Component-name}.php
 *   3. Add a case below
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'get_field' ) ) {
	return;
}

if ( ! have_rows( 'page_sections' ) ) {
	if ( current_user_can( 'edit_pages' ) ) {
		echo '<p style="text-align:center;padding:60px 20px;color:#888;font-size:14px;">';
		echo 'No sections yet — <a href="' . esc_url( get_edit_post_link() ) . '" style="color:#ec1c24;">add sections</a>.';
		echo '</p>';
	}
	return;
}

// Optional $args (passed via get_template_part()'s third parameter) restrict which
// rows this pass renders: 'only' => [...] renders exactly those layouts, 'skip' => [...]
// renders everything except those. Both default to null (render everything, the
// original behaviour) so every existing call site is unaffected. This exists so
// page-flexible.php can render the Article family's `art_silo` row after the sidebar
// grid closes instead of inside it, without a second copy of this switch statement.
$tnb_dispatch_only = isset( $args['only'] ) ? (array) $args['only'] : null;
$tnb_dispatch_skip = isset( $args['skip'] ) ? (array) $args['skip'] : null;

while ( have_rows( 'page_sections' ) ) :
	the_row();

	$tnb_dispatch_layout = get_row_layout();

	if ( null !== $tnb_dispatch_only && ! in_array( $tnb_dispatch_layout, $tnb_dispatch_only, true ) ) {
		continue;
	}
	if ( null !== $tnb_dispatch_skip && in_array( $tnb_dispatch_layout, $tnb_dispatch_skip, true ) ) {
		continue;
	}

	switch ( $tnb_dispatch_layout ) {

		// ── TechnBrains — Services ────────────────────────────────────────

		case 'sv_hero':
			get_template_part( 'template-parts/components/Service-banner' );
			break;

		case 'sv_track_record':
			get_template_part( 'template-parts/components/Service-track-record' );
			break;

		case 'sv_recog_slider':
			get_template_part( 'template-parts/components/Service-recognition-slider' );
			break;

		case 'sv_stack':
			get_template_part( 'template-parts/components/Service-stack' );
			break;

		case 'sv_three_ways':
			get_template_part( 'template-parts/components/Service-three-ways' );
			break;

		case 'sv_process':
			get_template_part( 'template-parts/components/Service-process' );
			break;

		case 'sv_tools':
			get_template_part( 'template-parts/components/Service-teckstacks' );
			break;

		// ── TechnBrains — Platforms ────────────────────────────────────────

		case 'platform_banner':
			get_template_part( 'template-parts/components/Platform-banner' );
			break;

		case 'trust_slider':
			get_template_part( 'template-parts/components/Trust-slider' );
			break;

		case 'platforms_specialize':
			get_template_part( 'template-parts/components/Platforms-specialize' );
			break;

		case 'platform_services':
			get_template_part( 'template-parts/components/Platform-services' );
			break;

		case 'platform_engagement':
			get_template_part( 'template-parts/components/Platform-engagement' );
			break;

		case 'platform_cta':
			get_template_part( 'template-parts/components/Platform-cta' );
			break;

		case 'platform_blog':
			get_template_part( 'template-parts/components/Platform-blog' );
			break;

		case 'platform_faqs':
			get_template_part( 'template-parts/components/Platform-faqs' );
			break;

		// ── TechnBrains — Industry Hub ─────────────────────────────────────────

		case 'industry_banner':
			get_template_part( 'template-parts/components/new-Industry-banner' );
			break;

		case 'ih_industries':
			get_template_part( 'template-parts/components/new-Industry-specific' );
			break;

		case 'case_studies_slider':
			get_template_part( 'template-parts/components/case-studies-slider' );
			break;

		case 'flexible_engagement':
			get_template_part( 'template-parts/components/Flexible-engagement' );
			break;

		case 'why_choose_industry':
			get_template_part( 'template-parts/components/Why-choose-industry' );
			break;

		case 'experts_team':
			get_template_part( 'template-parts/components/Experts-team' );
			break;

		case 'industry_testimonials':
			get_template_part( 'template-parts/components/Industry-testimonials' );
			break;

		case 'reasons_compare':
			get_template_part( 'template-parts/components/Reasons-compare' );
			break;

		case 'consult_steps':
			get_template_part( 'template-parts/components/Consult-steps' );
			break;

		// ── TechnBrains — Hire Developer ──────────────────────────────────────

		case 'hd_hero':
			get_template_part( 'template-parts/components/new-hire-banner' );
			break;

		case 'hd_available':
			get_template_part( 'template-parts/components/hire-available' );
			break;

		case 'hd_metrics':
			get_template_part( 'template-parts/components/hire-metrics' );
			break;

		case 'hd_services':
			get_template_part( 'template-parts/components/Hire-services' );
			break;

		case 'hd_roles':
			get_template_part( 'template-parts/components/Hire-role-stack' );
			break;

		case 'hd_vetting':
			get_template_part( 'template-parts/components/Hire-vetting' );
			break;

		case 'hd_engage':
			get_template_part( 'template-parts/components/Hire-Engage' );
			break;

		case 'hd_tech':
			get_template_part( 'template-parts/components/Hire-tech-stacks' );
			break;

		case 'hd_why':
			get_template_part( 'template-parts/components/Hire-why' );
			break;

		case 'hd_process':
			get_template_part( 'template-parts/components/Hire-process' );
			break;

		case 'hd_compare':
			get_template_part( 'template-parts/components/Hire-compare' );
			break;

		case 'hd_industry_experts':
			get_template_part( 'template-parts/components/Hire-industry-experts' );
			break;

		case 'hd_advisor':
			get_template_part( 'template-parts/components/Hire-advisor' );
			break;

		case 'hd_form':
			get_template_part( 'template-parts/components/Hire-dev-form' );
			break;

		// ── TechnBrains — Technology ──────────────────────────────────────────

		case 'tc_hero':
			get_template_part( 'template-parts/components/Technology-banner' );
			break;

		case 'tc_certs':
			get_template_part( 'template-parts/components/Tech-certifications' );
			break;

		case 'tst_stack':
			get_template_part( 'template-parts/components/Technology-techstacks' );
			break;

		case 'tai_aihub':
			get_template_part( 'template-parts/components/Technology-aihub' );
			break;

		// ── TechnBrains — Locations ───────────────────────────────────────────

		case 'lhb_hero':
			get_template_part( 'template-parts/components/Location-banner' );
			break;

		case 'loc_results_rec':
			get_template_part( 'template-parts/components/Location-results-recognition' );
			break;

		case 'loc_cards':
			get_template_part( 'template-parts/components/Location-cards' );
			break;
			
		// ── TechnBrains — About Us V2 ─────────────────────────────────────────

		// One layout for the whole story. The component owns the
		// .abs-story-track wrapper because about-v2.js measures the rail against
		// that element's direct <section> children, and loops its own
		// abs_chapters rows inside it.
		case 'abs_story':
			get_template_part( 'template-parts/components/About-story' );
			break;
			
		// ── TechnBrains — Staff Augmentation ──────────────────────────────────

		case 'sa_hero':
			get_template_part( 'template-parts/components/Staff-aug-hero' );
			break;

		case 'sa_brands':
			get_template_part( 'template-parts/components/Staff-aug-brands' );
			break;

		case 'sa_results':
			get_template_part( 'template-parts/components/Staff-aug-results' );
			break;

		case 'sa_roles':
			get_template_part( 'template-parts/components/Staff-aug-roles' );
			break;

		case 'sa_fit':
			get_template_part( 'template-parts/components/Staff-aug-fit' );
			break;

		case 'sa_process':
			get_template_part( 'template-parts/components/Staff-aug-process' );
			break;

		// ── TechnBrains — Software Outsourcing ────────────────────────────────

		case 'so_hero':
			get_template_part( 'template-parts/components/Software-outsourcing-hero' );
			break;

		// One layout for both matrices on the page — the sourcing models and the
		// why-choose-us comparison are the same object with different columns.
		case 'so_compare':
			get_template_part( 'template-parts/components/Software-outsourcing-compare' );
			break;

		case 'so_pricing':
			get_template_part( 'template-parts/components/Software-outsourcing-pricing' );
			break;

		case 'so_hire':
			get_template_part( 'template-parts/components/Software-outsourcing-hire' );
			break;

		case 'so_riskx':
			get_template_part( 'template-parts/components/Software-outsourcing-risks' );
			break;

		// ── TechnBrains — Dedicated Teams ─────────────────────────────────────

		case 'dt_hero':
			get_template_part( 'template-parts/components/Dedicated-teams-hero' );
			break;

		case 'dt_fit':
			get_template_part( 'template-parts/components/Dedicated-teams-fit' );
			break;

		case 'dt_models':
			get_template_part( 'template-parts/components/Dedicated-teams-models' );
			break;

		case 'dt_risks':
			get_template_part( 'template-parts/components/Dedicated-teams-risks' );
			break;

		case 'dt_vetting':
			get_template_part( 'template-parts/components/Dedicated-teams-vetting' );
			break;

		case 'dt_scale':
			get_template_part( 'template-parts/components/Dedicated-teams-scale' );
			break;

		case 'dt_devs':
			get_template_part( 'template-parts/components/Dedicated-teams-devs' );
			break;

		// ── Construction Software Development ─────────────────────────────
		case 'cn_hero':
			get_template_part( 'template-parts/components/Construction-hero' );
			break;

		case 'cn_answer':
			get_template_part( 'template-parts/components/Construction-answer' );
			break;

		case 'cn_trust':
			get_template_part( 'template-parts/components/Construction-trust' );
			break;

		case 'cn_types':
			get_template_part( 'template-parts/components/Construction-types' );
			break;

		case 'cn_cases':
			get_template_part( 'template-parts/components/Construction-cases' );
			break;

		case 'cn_roofing':
			get_template_part( 'template-parts/components/Construction-roofing' );
			break;

		case 'cn_integrations':
			get_template_part( 'template-parts/components/Construction-integrations' );
			break;

		case 'cn_datacost':
			get_template_part( 'template-parts/components/Construction-datacost' );
			break;

		case 'cn_calculator':
			get_template_part( 'template-parts/components/Construction-calculator' );
			break;

		case 'cn_compare':
			get_template_part( 'template-parts/components/Construction-compare' );
			break;

		case 'cn_ai':
			get_template_part( 'template-parts/components/Construction-ai' );
			break;

		case 'cn_abandon':
			get_template_part( 'template-parts/components/Construction-abandon' );
			break;

		case 'cn_engineer':
			get_template_part( 'template-parts/components/Construction-engineer' );
			break;

		case 'cn_reviews':
			get_template_part( 'template-parts/components/Construction-reviews' );
			break;

		case 'cn_drivers':
			get_template_part( 'template-parts/components/Construction-drivers' );
			break;

		case 'cn_process':
			get_template_part( 'template-parts/components/Construction-process' );
			break;

		case 'cn_models':
			get_template_part( 'template-parts/components/Construction-models' );
			break;

		case 'cn_stack':
			get_template_part( 'template-parts/components/Construction-stack' );
			break;

		case 'cn_banner':
			get_template_part( 'template-parts/components/Construction-banner' );
			break;

		// ── Article template family (Procore Alternatives + sibling buyer's-guide pages) ──

		case 'art_hero':
			get_template_part( 'template-parts/components/Article-Hero' );
			break;

		case 'art_prose':
			get_template_part( 'template-parts/components/Article-Prose' );
			break;

		case 'art_tldr':
			get_template_part( 'template-parts/components/Article-Tldr' );
			break;

		case 'art_tldr_new':
			get_template_part( 'template-parts/components/Article-Tldr-New' );
			break;

		case 'art_decision_table':
			get_template_part( 'template-parts/components/Article-DecisionTable' );
			break;

		case 'art_diag_set':
			get_template_part( 'template-parts/components/Article-DiagSet' );
			break;

		case 'art_callout':
			get_template_part( 'template-parts/components/Article-Callout' );
			break;

		case 'art_scope_note':
			get_template_part( 'template-parts/components/Article-ScopeNote' );
			break;

		case 'art_alt_evals':
			get_template_part( 'template-parts/components/Article-AltEvals' );
			break;

		case 'art_head_to_head':
			get_template_part( 'template-parts/components/Article-HeadToHead' );
			break;

		case 'art_inline_cta':
			get_template_part( 'template-parts/components/Article-InlineCta' );
			break;

		case 'art_sentiment_table':
			get_template_part( 'template-parts/components/Article-SentimentTable' );
			break;

		case 'art_cost_models':
			get_template_part( 'template-parts/components/Article-CostModels' );
			break;

		case 'art_checklist':
			get_template_part( 'template-parts/components/Article-Checklist' );
			break;

		case 'art_sources':
			get_template_part( 'template-parts/components/Article-Sources' );
			break;

		case 'art_silo':
			get_template_part( 'template-parts/components/Article-Silo' );
			break;

		case 'art_stat_block':
			get_template_part( 'template-parts/components/Article-StatBlock' );
			break;

		case 'art_vendor_table':
			get_template_part( 'template-parts/components/Article-VendorTable' );
			break;

		case 'art_evidence_table':
			get_template_part( 'template-parts/components/Article-EvidenceTable' );
			break;

		case 'art_mini_list':
			get_template_part( 'template-parts/components/Article-MiniList' );
			break;

		case 'art_cost_calculator':
			get_template_part( 'template-parts/components/Article-CostCalculator' );
			break;

		case 'art_criteria_cards':
			get_template_part( 'template-parts/components/Article-CriteriaCards' );
			break;

		case 'art_methods_diagram':
			get_template_part( 'template-parts/components/Article-MethodsDiagram' );
			break;

		case 'art_profile_rows':
			get_template_part( 'template-parts/components/Article-ProfileRows' );
			break;

		case 'art_stat_cards':
			get_template_part( 'template-parts/components/Article-StatCards' );
			break;

		case 'art_compare_table':
			get_template_part( 'template-parts/components/Article-CompareTable' );
			break;

		case 'art_tool_eval_tabs':
			get_template_part( 'template-parts/components/Article-ToolEvalTabs' );
			break;

		case 'art_platform_evals':
			get_template_part( 'template-parts/components/Article-PlatformEvals' );
			break;

		case 'art_legend_matrix':
			get_template_part( 'template-parts/components/Article-LegendMatrix' );
			break;

		case 'art_case_box':
			get_template_part( 'template-parts/components/Article-CaseBox' );
			break;

		// ── Landing Page ────────────────────────────────────────────────────
		case 'lp_hero':
			get_template_part( 'template-parts/components/LP-Hero' );
			break;

		case 'lp_stats':
			get_template_part( 'template-parts/components/LP-Stats' );
			break;

		case 'lp_cards':
			get_template_part( 'template-parts/components/LP-Cards' );
			break;

		case 'lp_workflow_slider':
			get_template_part( 'template-parts/components/LP-WorkflowSlider' );
			break;

		case 'lp_case_studies':
			get_template_part( 'template-parts/components/LP-CaseStudies' );
			break;

		case 'lp_why_choose':
			get_template_part( 'template-parts/components/LP-WhyChoose' );
			break;

		case 'lp_why_choose5':
			get_template_part( 'template-parts/components/LP-WhyChoose5' );
			break;

		case 'lp_compliance':
			get_template_part( 'template-parts/components/LP-Compliance' );
			break;

// ── Logistics ──────────────────────────────────────────────────────
		case 'lg_why':
			get_template_part( 'template-parts/components/LG-Why' );
			break;

		case 'lg_flow':
			get_template_part( 'template-parts/components/LG-Flow' );
			break;

		case 'lg_roles':
			get_template_part( 'template-parts/components/LG-Roles' );
			break;

		case 'lg_cost_table':
			get_template_part( 'template-parts/components/LG-CostTable' );
			break;

		case 'lg_conn_ops':
			get_template_part( 'template-parts/components/LG-ConnOps' );
			break;

		case 'lg_priorities':
			get_template_part( 'template-parts/components/LG-Priorities' );
			break;

		case 'lg_compliance':
			get_template_part( 'template-parts/components/LG-Compliance' );
			break;

		case 'lg_ladder':
			get_template_part( 'template-parts/components/LG-Ladder' );
			break;

		case 'lg_types':
			get_template_part( 'template-parts/components/LG-Types' );
			break;

		case 'lg_estimator':
			get_template_part( 'template-parts/components/LG-Estimator' );
			break;
			
		// ── Mobile App Development ────────────────────────────────────────
		case 'ma_hero':
			get_template_part( 'template-parts/components/MobileApp-Hero' );
			break;

		case 'ma_acc':
			get_template_part( 'template-parts/components/MobileApp-Problems' );
			break;

		case 'ma_grow3':
			get_template_part( 'template-parts/components/MobileApp-Growth' );
			break;

		case 'ma_eco':
			get_template_part( 'template-parts/components/MobileApp-Devices' );
			break;
			
		case 'case_studies_hero':
			get_template_part( 'template-parts/components/case-studies-hero' );
			break;

		case 'case_studies_coverflow':
			get_template_part( 'template-parts/components/case-studies-coverflow' );
			break;

		case 'case_studies_filtered_grid':
			get_template_part( 'template-parts/components/case-studies-filtered-grid' );
			break;

	}

endwhile;