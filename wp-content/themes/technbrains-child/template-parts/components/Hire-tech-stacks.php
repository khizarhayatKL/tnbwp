<?php
/**
 * Component: Hire Developer — Tech Stacks
 * Layout   : hd_tech (ACF Flexible Content)
 *
 * Two-column header (title/eyebrow left, description paragraph right),
 * tab pills for each category, per-category tech grid with colored icon tiles.
 *
 * Fields:
 *   hdtk_eyebrow       — text
 *   hdtk_heading       — text
 *   hdtk_head_right    — textarea  (right-column description paragraph)
 *   hdtk_cats          — repeater
 *     hdtk_cat_label   — text      (e.g. "Frontend & Web Development")
 *     hdtk_cat_desc    — textarea  (below-tab description)
 *     hdtk_cat_items   — repeater  (tech items)
 *       hdtk_item_name — text      (tech name)
 *       hdtk_item_icon — image     (optional icon; falls back to $tt_meta abbreviation tile)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow    = get_sub_field( 'hdtk_eyebrow' )    ?: '';
$heading    = get_sub_field( 'hdtk_heading' )    ?: '';
$head_right = get_sub_field( 'hdtk_head_right' ) ?: '';

$cats = [];
if ( have_rows( 'hdtk_cats' ) ) {
	while ( have_rows( 'hdtk_cats' ) ) {
		the_row();
		$items = [];
		if ( have_rows( 'hdtk_cat_items' ) ) {
			while ( have_rows( 'hdtk_cat_items' ) ) {
				the_row();
				$icon_field = get_sub_field( 'hdtk_item_icon' );
				$page_url   = get_sub_field( 'hdtk_item_page' ) ?: '';
				$items[] = [
					'name' => get_sub_field( 'hdtk_item_name' ) ?: '',
					'icon' => is_array( $icon_field ) ? $icon_field : null,
					'url'  => $page_url ?: ( get_sub_field( 'hdtk_item_url' ) ?: '' ),
				];
			}
		}
		$cats[] = [
			'label' => get_sub_field( 'hdtk_cat_label' ) ?: '',
			'desc'  => get_sub_field( 'hdtk_cat_desc' )  ?: '',
			'items' => $items,
		];
	}
}


/* Tech meta dictionary: name → [abbreviation, hex_color] */
$tt_meta = [
	'ReactJS'                      => [ 'Re',   '#149ECA' ],
	'Angular'                      => [ 'Ng',   '#DD0031' ],
	'Vue.js'                       => [ 'V',    '#42B883' ],
	'Next.js'                      => [ 'N',    '#0C2340' ],
	'HTML5'                        => [ 'H5',   '#E34F26' ],
	'TypeScript'                   => [ 'TS',   '#3178C6' ],
	'Tailwind CSS'                 => [ 'TW',   '#06B6D4' ],
	'React Native'                 => [ 'RN',   '#149ECA' ],
	'Flutter'                      => [ 'Fl',   '#0468D7' ],
	'Swift'                        => [ 'Sw',   '#F05138' ],
	'Kotlin'                       => [ 'Kt',   '#7F52FF' ],
	'iOS'                          => [ 'iOS',  '#1D1D1F' ],
	'Android'                      => [ 'An',   '#3DDC84' ],
	'Node.js'                      => [ 'No',   '#5FA04E' ],
	'Python'                       => [ 'Py',   '#3776AB' ],
	'PHP'                          => [ 'PHP',  '#777BB4' ],
	'Java'                         => [ 'Jv',   '#E76F00' ],
	'.NET'                         => [ '.N',   '#512BD4' ],
	'NestJS'                       => [ 'Ne',   '#E0234E' ],
	'Django'                       => [ 'Dj',   '#0C4B33' ],
	'Laravel'                      => [ 'La',   '#FF2D20' ],
	'AWS'                          => [ 'aws',  '#E8932A' ],
	'Microsoft Azure'              => [ 'Az',   '#0078D4' ],
	'Google Cloud Platform'        => [ 'GCP',  '#4285F4' ],
	'Google Cloud Platform (GCP)'  => [ 'GCP',  '#4285F4' ],
	'Docker'                       => [ 'Dk',   '#2496ED' ],
	'Kubernetes'                   => [ 'K8',   '#326CE5' ],
	'Terraform'                    => [ 'Tf',   '#7B42BC' ],
	'TensorFlow'                   => [ 'TF',   '#FF6F00' ],
	'PyTorch'                      => [ 'Pt',   '#EE4C2C' ],
	'OpenAI APIs'                  => [ 'AI',   '#10A37F' ],
	'Scikit-learn'                 => [ 'Sk',   '#F7931E' ],
	'LangChain'                    => [ 'Lc',   '#1C7C54' ],
	'Hugging Face'                 => [ 'HF',   '#E6A817' ],
	'Jenkins'                      => [ 'Jk',   '#D24939' ],
	'GitHub Actions'               => [ 'GH',   '#2088FF' ],
	'Ansible'                      => [ 'An',   '#1A1918' ],
	'NLP (Natural Language Processing)' => [ 'NLP', '#7C3AED' ],
	'Computer Vision'              => [ 'CV',   '#0EA5E9' ],
	'Salesforce'                   => [ 'SF',   '#00A1E0' ],
	'SAP'                          => [ 'SAP',  '#0FAAFF' ],
	'PostgreSQL'                   => [ 'Pg',   '#336791' ],
	'MySQL'                        => [ 'My',   '#00758F' ],
	'MongoDB'                      => [ 'Mo',   '#47A248' ],
	'Redis'                        => [ 'Rd',   '#DC382D' ],
];

/* Hex → rgba helper in PHP (used for inline styles) */
function tnb_hdtk_hex_rgba( string $hex, float $alpha ): string {
	$hex = ltrim( $hex, '#' );
	if ( strlen( $hex ) === 3 ) {
		$hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
	}
	$r = hexdec( substr( $hex, 0, 2 ) );
	$g = hexdec( substr( $hex, 2, 2 ) );
	$b = hexdec( substr( $hex, 4, 2 ) );
	return "rgba({$r},{$g},{$b},{$alpha})";
}

if ( empty( $cats ) ) {
	return;
}

static $hdtk_uid = 0;
$hdtk_uid++;
$sec_id = 'hd-tech-' . $hdtk_uid;
?>
<section class="section hd-tt2" id="<?php echo esc_attr( $sec_id ); ?>">
	<div class="container">

		<!-- Two-column header -->
		<div class="sv-tools-head">
			<div class="section-intro">
				<?php if ( $eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>
				<h2><?php echo esc_html( $heading ); ?></h2>
			</div>
			<?php if ( $head_right ) : ?>
			<p><?php echo esc_html( $head_right ); ?></p>
			<?php endif; ?>
		</div>

		<!-- Category tabs -->
		<div class="sv-tabs" role="tablist" aria-label="Technology categories">
			<?php foreach ( $cats as $ci => $cat ) : ?>
			<button
				type="button"
				role="tab"
				aria-selected="<?php echo $ci === 0 ? 'true' : 'false'; ?>"
				class="sv-tab<?php echo $ci === 0 ? ' is-active' : ''; ?>"
				data-tab="<?php echo esc_attr( $ci ); ?>">
				<?php echo esc_html( $cat['label'] ); ?>
			</button>
			<?php endforeach; ?>
		</div>

		<!-- Category description (updated via JS) -->
		<p class="hd-tt2-cat-desc" id="<?php echo esc_attr( $sec_id ); ?>-desc">
			<?php echo esc_html( $cats[0]['desc'] ?? '' ); ?>
		</p>

		<!-- Tech grids — one per category, hidden via JS -->
		<?php foreach ( $cats as $ci => $cat ) : ?>
		<div
			class="sv-tools-grid"
			data-grid="<?php echo esc_attr( $ci ); ?>"
			<?php echo $ci !== 0 ? 'style="display:none"' : ''; ?>>
			<?php foreach ( $cat['items'] as $ti => $item ) :
				$tech  = $item['name'];
				$icon  = $item['icon'];
				$meta  = $tt_meta[ $tech ] ?? [ strtoupper( substr( $tech, 0, 2 ) ), '#185FA5' ];
				$abbr  = $meta[0];
				$color = $meta[1];
				$bg    = tnb_hdtk_hex_rgba( $color, 0.12 );
				$brd   = tnb_hdtk_hex_rgba( $color, 0.28 );
				$delay = ( $ti * 40 ) . 'ms';
				$has_icon = ! empty( $icon['url'] );
				$has_link = ! empty( $item['url'] );
				$tool_tag = $has_link ? 'a' : 'div';
			?>
			<<?php echo $tool_tag; ?> class="sv-tool"<?php echo $has_link ? ' href="' . esc_url( $item['url'] ) . '"' : ''; ?> style="animation-delay:<?php echo esc_attr( $delay ); ?>">
				<?php if ( $has_icon ) : ?>
				<span class="sv-tool-tile" style="background:<?php echo esc_attr( $bg ); ?>;border:1px solid <?php echo esc_attr( $brd ); ?>">
					<img
						src="<?php echo esc_url( $icon['url'] ); ?>"
						alt="<?php echo esc_attr( $tech ); ?>"
						width="<?php echo esc_attr( $icon['width'] ?? 34 ); ?>"
						height="<?php echo esc_attr( $icon['height'] ?? 34 ); ?>"
						class="sv-tool-icon-img"
						loading="lazy">
				</span>
				<?php else : ?>
				<span
					class="sv-tool-tile"
					style="background:<?php echo esc_attr( $bg ); ?>;color:<?php echo esc_attr( $color ); ?>;border:1px solid <?php echo esc_attr( $brd ); ?>">
					<?php echo esc_html( $abbr ); ?>
				</span>
				<?php endif; ?>
				<span class="sv-tool-name"><?php echo esc_html( $tech ); ?></span>
			</<?php echo $tool_tag; ?>>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>

	</div>
</section>
<script>
(function() {
	var sec = document.getElementById(<?php echo wp_json_encode( $sec_id ); ?>);
	if (!sec) return;

	var tabs  = sec.querySelectorAll('.sv-tab');
	var grids = sec.querySelectorAll('[data-grid]');
	var desc  = document.getElementById(<?php echo wp_json_encode( $sec_id . '-desc' ); ?>);

	var DESCS = <?php echo wp_json_encode( array_column( $cats, 'desc' ) ); ?>;

	function activate(idx) {
		tabs.forEach(function(t) {
			var i = parseInt(t.dataset.tab, 10);
			t.classList.toggle('is-active', i === idx);
			t.setAttribute('aria-selected', i === idx ? 'true' : 'false');
		});
		grids.forEach(function(g) {
			var i = parseInt(g.dataset.grid, 10);
			g.style.display = i === idx ? '' : 'none';
			/* Re-trigger animation on newly shown grid */
			if (i === idx) {
				g.querySelectorAll('.sv-tool').forEach(function(el) {
					el.style.animationName = 'none';
					/* Force reflow */
					void el.offsetHeight;
					el.style.animationName = '';
				});
			}
		});
		if (desc) desc.textContent = DESCS[idx] || '';
	}

	tabs.forEach(function(btn) {
		btn.addEventListener('click', function() {
			activate(parseInt(btn.dataset.tab, 10));
		});
	});
})();
</script>
