<?php
/**
 * Component: Hire Developer — Role Stack
 * Layout   : hd_roles (ACF Flexible Content)
 *
 * Category filter pills + scrollable role list on left +
 * perspective-stacked role cards on right.
 *
 * Fields:
 *   hdrl_eyebrow         — text
 *   hdrl_heading         — text   (plain part)
 *   hdrl_heading_accent  — text   (accent span)
 *   hdrl_sub             — textarea
 *   hdrl_roles           — repeater
 *     hdrl_role_title    — text
 *     hdrl_role_desc     — textarea
 *     hdrl_role_tags     — text   (comma-separated)
 *     hdrl_role_img      — image (array)
 *     hdrl_role_url      — url   (empty = popup)
 *     hdrl_role_cats     — text  (comma-separated: Mobile, Frontend, Backend)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdrl_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdrl_heading' )        ?: 'Hire Remote Developers by';
$heading_accent = get_sub_field( 'hdrl_heading_accent' ) ?: 'Role & Tech Stack';
$sub            = get_sub_field( 'hdrl_sub' )            ?: '';

$roles = [];
if ( have_rows( 'hdrl_roles' ) ) {
	while ( have_rows( 'hdrl_roles' ) ) {
		the_row();
		$tags     = [];
		$tags_raw = get_sub_field( 'hdrl_role_tags' );
		if ( is_array( $tags_raw ) ) {
			// Repeater of link fields.
			foreach ( $tags_raw as $tag_row ) {
				$link  = isset( $tag_row['hdrl_role_tag_link'] ) ? $tag_row['hdrl_role_tag_link'] : null;
				$label = is_array( $link ) && ! empty( $link['title'] ) ? $link['title'] : '';
				if ( '' === $label ) {
					continue;
				}
				$tags[] = [
					'label'  => $label,
					'url'    => is_array( $link ) && ! empty( $link['url'] ) ? $link['url'] : '',
					'target' => is_array( $link ) && ! empty( $link['target'] ) ? $link['target'] : '',
				];
			}
		}
		$cats_raw = get_sub_field( 'hdrl_role_cats' ) ?: '';
		$img      = get_sub_field( 'hdrl_role_img' );
		$page_url = get_sub_field( 'hdrl_role_page' ) ?: '';

		$roles[] = [
			'title' => get_sub_field( 'hdrl_role_title' ) ?: '',
			'desc'  => get_sub_field( 'hdrl_role_desc' )  ?: '',
			'tags'  => $tags,
			'cats'  => array_filter( array_map( 'trim', explode( ',', $cats_raw ) ) ),
			'img'   => $img,
			'url'   => $page_url ?: ( get_sub_field( 'hdrl_role_url' ) ?: '' ),
		];
	}
}

if ( empty( $roles ) ) {
	return;
}

/* Build category list from roles */
$all_cats = [ 'All Developers' ];
foreach ( $roles as $r ) {
	foreach ( $r['cats'] as $c ) {
		if ( ! in_array( $c, $all_cats, true ) ) {
			$all_cats[] = $c;
		}
	}
}

static $hdrl_uid = 0;
$hdrl_uid++;
$section_id = 'hd-roles-' . $hdrl_uid;
?>
<section class="hd-roles" id="<?php echo esc_attr( $section_id ); ?>">
	<div class="hd-container">

		<div class="hd-section-head">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="hd-roles-filters">
			<?php foreach ( $all_cats as $ci => $cat_label ) : ?>
			<button
				type="button"
				class="hd-roles-filter<?php echo $ci === 0 ? ' active' : ''; ?>"
				data-cat="<?php echo esc_attr( $ci === 0 ? 'all' : $cat_label ); ?>">
				<?php echo esc_html( $cat_label ); ?>
			</button>
			<?php endforeach; ?>
		</div>

		<div class="hd-roles-shell">

			<div class="hd-roles-list-wrap">
				<div class="hd-roles-list">
					<?php foreach ( $roles as $ri => $role ) : ?>
					<button
						type="button"
						class="hd-role-tab<?php echo $ri === 0 ? ' active' : ''; ?>"
						data-role-idx="<?php echo esc_attr( $ri ); ?>"
						data-role-cats="<?php echo esc_attr( implode( '|', $role['cats'] ) ); ?>">
						<span><?php echo esc_html( $role['title'] ); ?></span>
					</button>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="hd-roles-stage">
				<?php foreach ( $roles as $ri => $role ) :
					$pos = $ri === 0 ? 'front' : ( $ri === 1 ? 'behind-1' : ( $ri === 2 ? 'behind-2' : 'hidden' ) );
					$has_url = ! empty( $role['url'] );
				?>
				<div
					class="hd-role-card <?php echo esc_attr( $pos ); ?>"
					data-role-idx="<?php echo esc_attr( $ri ); ?>">

					<div class="hd-role-card-img"
						<?php if ( ! empty( $role['img']['url'] ) ) : ?>
						style="background-image:url('<?php echo esc_url( $role['img']['url'] ); ?>')"
						<?php endif; ?>>
					</div>

					<div class="hd-role-card-body">
						<div class="hd-role-card-title"><?php echo esc_html( $role['title'] ); ?></div>
						<div class="hd-role-card-desc"><?php echo esc_html( $role['desc'] ); ?></div>

						<?php if ( ! empty( $role['tags'] ) ) : ?>
						<div class="hd-role-card-tags">
							<?php foreach ( $role['tags'] as $tag ) : ?>
								<?php if ( ! empty( $tag['url'] ) && $tag['url'] !== '#' ) : ?>
									<a class="hd-role-card-tag"
									   href="<?php echo esc_url( $tag['url'] ); ?>"
									   <?php echo ! empty( $tag['target'] ) ? 'target="' . esc_attr( $tag['target'] ) . '" rel="noopener"' : ''; ?>>
										<?php echo esc_html( $tag['label'] ); ?>
									</a>
								<?php else : ?>
									<span class="hd-role-card-tag">
										<?php echo esc_html( $tag['label'] ); ?>
									</span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

						<?php if ( $has_url ) : ?>
						<a class="hd-role-card-link" href="<?php echo esc_url( $role['url'] ); ?>">View Role</a>
						<?php else : ?>
						<button type="button" class="hd-role-card-link tnb-popup-trigger">View Role</button>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
<script>
(function() {
	var sec = document.getElementById(<?php echo wp_json_encode( $section_id ); ?>);
	if (!sec) return;

	var TOTAL     = <?php echo count( $roles ); ?>;
	var activeIdx = 0;

	var filterBtns = sec.querySelectorAll('.hd-roles-filter');
	var tabs       = sec.querySelectorAll('.hd-role-tab');
	var cards      = sec.querySelectorAll('.hd-role-card');

	function positionClass(roleIdx) {
		var d = (roleIdx - activeIdx + TOTAL) % TOTAL;
		if (d === 0) return 'front';
		if (d === 1) return 'behind-1';
		if (d === 2) return 'behind-2';
		return 'hidden';
	}

	function updateCards() {
		cards.forEach(function(card) {
			var ri = parseInt(card.dataset.roleIdx, 10);
			card.className = 'hd-role-card ' + positionClass(ri);
		});
	}

	function getVisibleIndices(cat) {
		var visible = [];
		tabs.forEach(function(tab) {
			var idx  = parseInt(tab.dataset.roleIdx, 10);
			var cats = tab.dataset.roleCats ? tab.dataset.roleCats.split('|') : [];
			if (cat === 'all' || cats.indexOf(cat) !== -1) {
				visible.push(idx);
			}
		});
		return visible;
	}

	function applyFilter(cat) {
		tabs.forEach(function(tab) {
			var tabCats = tab.dataset.roleCats ? tab.dataset.roleCats.split('|') : [];
			var show = cat === 'all' || tabCats.indexOf(cat) !== -1;
			tab.style.display = show ? '' : 'none';
			tab.classList.remove('active');
		});

		var visible = getVisibleIndices(cat);
		if (visible.length > 0) {
			activeIdx = visible[0];
		}

		if (visible.length > 0) {
			var firstTab = sec.querySelector('.hd-role-tab[data-role-idx="' + activeIdx + '"]');
			if (firstTab) firstTab.classList.add('active');
		}

		updateCards();
	}

	filterBtns.forEach(function(btn) {
		btn.addEventListener('click', function() {
			filterBtns.forEach(function(b) { b.classList.remove('active'); });
			btn.classList.add('active');
			applyFilter(btn.dataset.cat);
		});
	});

	tabs.forEach(function(tab) {
		tab.addEventListener('click', function() {
			activeIdx = parseInt(tab.dataset.roleIdx, 10);
			tabs.forEach(function(t) {
				if (t.style.display !== 'none') t.classList.remove('active');
			});
			tab.classList.add('active');
			updateCards();
		});
	});
})();
</script>
