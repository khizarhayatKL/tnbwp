<?php
/**
 * TechnBrains Leads — CPT, admin UI, honeypot helpers, and lead-save utility.
 *
 * Provides:
 *  - tnb_lead CPT  (admin-only, no public queries)
 *  - tnb_honeypot_field()  — renders hidden anti-spam field inside forms
 *  - tnb_check_honeypot()  — server-side guard; silently "succeeds" on bot hit
 *  - tnb_save_lead()       — inserts a lead post from any AJAX handler
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── Register CPT ──────────────────────────────────────────────────────────────

add_action( 'init', 'tnb_register_lead_cpt' );
function tnb_register_lead_cpt(): void {
	register_post_type(
		'tnb_lead',
		array(
			'labels'             => array(
				'name'               => 'Leads',
				'singular_name'      => 'Lead',
				'all_items'          => 'All Leads',
				'edit_item'          => 'Lead Detail',
				'view_item'          => 'View Lead',
				'search_items'       => 'Search Leads',
				'not_found'          => 'No leads found.',
				'not_found_in_trash' => 'No leads in trash.',
				'menu_name'          => 'Leads',
			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => false,
			'query_var'          => false,
			'rewrite'            => false,
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 25,
			'menu_icon'          => 'dashicons-email-alt',
			'supports'           => array( 'title' ),
			'show_in_rest'       => false,
			'capabilities'       => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'       => true,
		)
	);
}

// ── Admin list columns ────────────────────────────────────────────────────────

add_filter( 'manage_tnb_lead_posts_columns', 'tnb_lead_list_columns' );
function tnb_lead_list_columns( array $cols ): array {
	return array(
		'cb'           => '<input type="checkbox">',
		'title'        => 'Name / Email',
		'lead_phone'   => 'Phone',
		'lead_service' => 'Service',
		'lead_form'    => 'Form',
		'lead_source'  => 'Source Page',
		'lead_status'  => 'Status',
		'date'         => 'Date',
	);
}

add_action( 'manage_tnb_lead_posts_custom_column', 'tnb_lead_render_column', 10, 2 );
function tnb_lead_render_column( string $col, int $post_id ): void {
	switch ( $col ) {
		case 'lead_phone':
			echo esc_html( get_post_meta( $post_id, '_lead_phone', true ) ?: '—' );
			break;

		case 'lead_service':
			echo esc_html( get_post_meta( $post_id, '_lead_service', true ) ?: '—' );
			break;

		case 'lead_form':
			echo esc_html( get_post_meta( $post_id, '_lead_form_source', true ) ?: '—' );
			break;

		case 'lead_source':
			$url = get_post_meta( $post_id, '_lead_source_url', true );
			if ( $url ) {
				$path = wp_parse_url( $url, PHP_URL_PATH ) ?: $url;
				echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $path ) . '</a>';
			} else {
				echo '—';
			}
			break;

		case 'lead_status':
			$status = get_post_meta( $post_id, '_lead_status', true ) ?: 'new';
			$map    = array(
				'new'       => array( '#e74c3c', 'New' ),
				'contacted' => array( '#f39c12', 'Contacted' ),
				'converted' => array( '#27ae60', 'Converted' ),
				'spam'      => array( '#95a5a6', 'Spam' ),
			);
			[ $bg, $label ] = $map[ $status ] ?? $map['new'];
			echo '<span style="display:inline-block;padding:3px 10px;border-radius:12px;background:'
				. esc_attr( $bg ) . ';color:#fff;font-size:12px;font-weight:600;">'
				. esc_html( $label ) . '</span>';
			break;
	}
}

// Sortable status column
add_filter( 'manage_edit-tnb_lead_sortable_columns', function ( array $cols ): array {
	$cols['lead_status'] = 'lead_status';
	return $cols;
} );

add_action( 'pre_get_posts', function ( \WP_Query $q ): void {
	if ( ! is_admin() || ! $q->is_main_query() ) { return; }
	if ( $q->get( 'post_type' ) !== 'tnb_lead' ) { return; }
	if ( $q->get( 'orderby' ) === 'lead_status' ) {
		$q->set( 'meta_key', '_lead_status' );
		$q->set( 'orderby',  'meta_value' );
	}
} );

// ── Admin list search & column filters ────────────────────────────────────────

/**
 * Meta keys covered by the list-table search box (one per visible column,
 * plus name/email/message which live behind the title column and detail view).
 *
 * @return string[]
 */
function tnb_lead_searchable_meta_keys(): array {
	return array(
		'_lead_name',
		'_lead_email',
		'_lead_phone',
		'_lead_service',
		'_lead_form_source',
		'_lead_source_url',
		'_lead_message',
	);
}

/**
 * Whether the current query is the Leads list-table main query with a search term.
 */
function tnb_lead_is_search_query( \WP_Query $q ): bool {
	return is_admin()
		&& $q->is_main_query()
		&& 'tnb_lead' === $q->get( 'post_type' )
		&& '' !== trim( (string) $q->get( 's' ) );
}

// Join postmeta so the search box can match every column, not just the title.
add_filter( 'posts_join', 'tnb_lead_search_join', 10, 2 );
function tnb_lead_search_join( string $join, \WP_Query $q ): string {
	global $wpdb;

	if ( ! tnb_lead_is_search_query( $q ) ) {
		return $join;
	}

	$keys         = tnb_lead_searchable_meta_keys();
	$placeholders = implode( ',', array_fill( 0, count( $keys ), '%s' ) );

	// phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
	$join .= $wpdb->prepare(
		" LEFT JOIN {$wpdb->postmeta} tnb_lead_search ON ( {$wpdb->posts}.ID = tnb_lead_search.post_id AND tnb_lead_search.meta_key IN ($placeholders) )",
		$keys
	);

	return $join;
}

// Replace the title-only search WHERE with title-or-any-lead-meta.
add_filter( 'posts_search', 'tnb_lead_search_where', 10, 2 );
function tnb_lead_search_where( string $search, \WP_Query $q ): string {
	global $wpdb;

	if ( ! tnb_lead_is_search_query( $q ) ) {
		return $search;
	}

	$like = '%' . $wpdb->esc_like( trim( (string) $q->get( 's' ) ) ) . '%';

	return $wpdb->prepare(
		" AND ( {$wpdb->posts}.post_title LIKE %s OR tnb_lead_search.meta_value LIKE %s )",
		$like,
		$like
	);
}

// The postmeta join can yield one row per matching meta — collapse duplicates.
add_filter( 'posts_distinct', 'tnb_lead_search_distinct', 10, 2 );
function tnb_lead_search_distinct( string $distinct, \WP_Query $q ): string {
	return tnb_lead_is_search_query( $q ) ? 'DISTINCT' : $distinct;
}

// Dropdown filters above the list table: Status, Form, Service.
// (Date already has core's month dropdown; free-text columns are covered
// by the search box.)
add_action( 'restrict_manage_posts', 'tnb_lead_filter_controls' );
function tnb_lead_filter_controls( string $post_type ): void {
	global $wpdb;

	if ( 'tnb_lead' !== $post_type ) {
		return;
	}

	$dropdowns = array(
		'tnb_lead_status'  => array( 'Statuses', '_lead_status' ),
		'tnb_lead_form'    => array( 'Forms', '_lead_form_source' ),
		'tnb_lead_service' => array( 'Services', '_lead_service' ),
	);

	// Fixed label order for statuses; other dropdowns list stored values.
	$status_labels = array( 'new' => 'New', 'contacted' => 'Contacted', 'converted' => 'Converted', 'spam' => 'Spam' );

	foreach ( $dropdowns as $param => list( $plural, $meta_key ) ) {
		$selected = sanitize_text_field( wp_unslash( $_GET[ $param ] ?? '' ) );

		if ( '_lead_status' === $meta_key ) {
			$options = $status_labels;
		} else {
			$values = $wpdb->get_col(
				$wpdb->prepare(
					"SELECT DISTINCT pm.meta_value
					FROM {$wpdb->postmeta} pm
					INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id AND p.post_type = 'tnb_lead'
					WHERE pm.meta_key = %s AND pm.meta_value != ''
					ORDER BY pm.meta_value",
					$meta_key
				)
			);
			$options = array_combine( $values, $values );
		}

		if ( empty( $options ) ) {
			continue;
		}

		echo '<select name="' . esc_attr( $param ) . '">';
		echo '<option value="">All ' . esc_html( $plural ) . '</option>';
		foreach ( $options as $value => $label ) {
			echo '<option value="' . esc_attr( $value ) . '"' . selected( $selected, $value, false ) . '>' . esc_html( $label ) . '</option>';
		}
		echo '</select>';
	}
}

// Apply the dropdown filters to the list-table query.
add_action( 'pre_get_posts', 'tnb_lead_apply_column_filters' );
function tnb_lead_apply_column_filters( \WP_Query $q ): void {
	if ( ! is_admin() || ! $q->is_main_query() || 'tnb_lead' !== $q->get( 'post_type' ) ) {
		return;
	}

	$map = array(
		'tnb_lead_status'  => '_lead_status',
		'tnb_lead_form'    => '_lead_form_source',
		'tnb_lead_service' => '_lead_service',
	);

	$meta_query = (array) $q->get( 'meta_query' );

	foreach ( $map as $param => $meta_key ) {
		$value = sanitize_text_field( wp_unslash( $_GET[ $param ] ?? '' ) );
		if ( '' === $value ) {
			continue;
		}
		$meta_query[] = array(
			'key'     => $meta_key,
			'value'   => $value,
			'compare' => '=',
		);
	}

	if ( ! empty( $meta_query ) ) {
		$q->set( 'meta_query', $meta_query );
	}
}

// ── Row actions ───────────────────────────────────────────────────────────────

add_filter( 'post_row_actions', 'tnb_lead_row_actions', 10, 2 );
function tnb_lead_row_actions( array $actions, \WP_Post $post ): array {
	if ( $post->post_type !== 'tnb_lead' ) { return $actions; }
	unset( $actions['inline hide-if-no-js'] );

	$current   = get_post_meta( $post->ID, '_lead_status', true ) ?: 'new';
	$available = array(
		'contacted' => 'Mark Contacted',
		'converted' => 'Mark Converted',
		'spam'      => 'Mark Spam',
	);

	foreach ( $available as $status => $label ) {
		if ( $current === $status ) { continue; }
		$url = wp_nonce_url(
			add_query_arg(
				array( 'tnb_lead_action' => $status, 'post_id' => $post->ID ),
				admin_url( 'edit.php?post_type=tnb_lead' )
			),
			'tnb_lead_row_' . $post->ID
		);
		$actions[ 'tnb_' . $status ] = '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
	}

	return $actions;
}

add_action( 'admin_init', 'tnb_lead_handle_row_action' );
function tnb_lead_handle_row_action(): void {
	$action  = sanitize_key( $_GET['tnb_lead_action'] ?? '' );
	$post_id = (int) ( $_GET['post_id'] ?? 0 );

	if ( ! $action || ! $post_id ) { return; }
	if ( ! in_array( $action, array( 'contacted', 'converted', 'spam' ), true ) ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

	check_admin_referer( 'tnb_lead_row_' . $post_id );

	update_post_meta( $post_id, '_lead_status', $action );

	wp_safe_redirect( add_query_arg( 'updated', '1', admin_url( 'edit.php?post_type=tnb_lead' ) ) );
	exit;
}

// ── Meta boxes ────────────────────────────────────────────────────────────────

add_action( 'add_meta_boxes', 'tnb_lead_add_meta_boxes' );
function tnb_lead_add_meta_boxes(): void {
	add_meta_box( 'tnb_lead_details', 'Lead Details', 'tnb_lead_details_cb', 'tnb_lead', 'normal', 'high' );
	add_meta_box( 'tnb_lead_status',  'Lead Status',  'tnb_lead_status_cb',  'tnb_lead', 'side',   'high' );
}

function tnb_lead_details_cb( \WP_Post $post ): void {
	$fields = array(
		'_lead_name'         => 'Name',
		'_lead_email'        => 'Email',
		'_lead_phone'        => 'Phone',
		'_lead_service'      => 'Service',
		'_lead_form_source'  => 'Form',
		'_lead_message'      => 'Message',
		'_lead_source_url'   => 'Source URL',
		'_lead_submitted_at' => 'Submitted At',
		'_lead_ip'           => 'IP Address',
		'_lead_user_agent'   => 'User Agent',
	);

	echo '<table class="widefat fixed striped" style="font-size:13px;">';
	foreach ( $fields as $key => $label ) {
		$val = get_post_meta( $post->ID, $key, true );
		if ( $val === '' || $val === false ) { continue; }
		echo '<tr><th style="width:140px;padding:8px 10px;font-weight:600;">' . esc_html( $label ) . '</th><td style="padding:8px 10px;">';
		if ( $key === '_lead_email' ) {
			echo '<a href="mailto:' . esc_attr( $val ) . '">' . esc_html( $val ) . '</a>';
		} elseif ( $key === '_lead_source_url' ) {
			echo '<a href="' . esc_url( $val ) . '" target="_blank" rel="noopener noreferrer">' . esc_html( $val ) . '</a>';
		} elseif ( $key === '_lead_message' ) {
			echo '<pre style="white-space:pre-wrap;margin:0;font-family:inherit;">' . esc_html( $val ) . '</pre>';
		} else {
			echo esc_html( $val );
		}
		echo '</td></tr>';
	}
	echo '</table>';

	// Extra raw fields (anything not already displayed)
	$raw = get_post_meta( $post->ID, '_lead_raw_data', true );
	if ( $raw ) {
		$decoded = json_decode( $raw, true );
		if ( is_array( $decoded ) ) {
			$skip  = array( 'hp_field_verify', 'action', 'nonce', 'tnb_popup_nonce', 'tnb_exit_popup_nonce', 'tnb_footer_nonce', 'tnb_collab_nonce', 'tnb_app_dev_nonce', 'g-recaptcha-response', 'name', 'email', 'phone', 'service', 'message', 'source', 'form' );
			$extra = array_diff_key( $decoded, array_flip( $skip ) );
			if ( ! empty( $extra ) ) {
				echo '<h4 style="margin:16px 0 8px;font-size:13px;">Additional Fields</h4>';
				echo '<table class="widefat fixed striped" style="font-size:13px;">';
				foreach ( $extra as $k => $v ) {
					echo '<tr><th style="width:140px;padding:8px 10px;font-weight:600;">' . esc_html( $k ) . '</th><td style="padding:8px 10px;">' . esc_html( (string) $v ) . '</td></tr>';
				}
				echo '</table>';
			}
		}
	}
}

function tnb_lead_status_cb( \WP_Post $post ): void {
	$current  = get_post_meta( $post->ID, '_lead_status', true ) ?: 'new';
	$statuses = array( 'new' => 'New', 'contacted' => 'Contacted', 'converted' => 'Converted', 'spam' => 'Spam' );
	wp_nonce_field( 'tnb_save_lead_status', 'tnb_lead_status_nonce' );
	echo '<label for="tnb_lead_status" style="display:block;margin-bottom:6px;font-weight:600;font-size:13px;">Status</label>';
	echo '<select name="tnb_lead_status" id="tnb_lead_status" style="width:100%;">';
	foreach ( $statuses as $val => $label ) {
		echo '<option value="' . esc_attr( $val ) . '"' . selected( $current, $val, false ) . '>' . esc_html( $label ) . '</option>';
	}
	echo '</select>';
}

add_action( 'save_post_tnb_lead', 'tnb_lead_save_status_meta' );
function tnb_lead_save_status_meta( int $post_id ): void {
	if ( ! isset( $_POST['tnb_lead_status_nonce'] ) ) { return; }
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tnb_lead_status_nonce'] ) ), 'tnb_save_lead_status' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

	$allowed = array( 'new', 'contacted', 'converted', 'spam' );
	$status  = sanitize_key( $_POST['tnb_lead_status'] ?? 'new' );
	if ( in_array( $status, $allowed, true ) ) {
		update_post_meta( $post_id, '_lead_status', $status );
	}
}

// ── Public helpers ────────────────────────────────────────────────────────────

/**
 * Output the honeypot anti-spam field inside a <form>.
 * Real users never see or interact with it — bots auto-fill it.
 */
function tnb_honeypot_field(): void {
	echo '<div style="position:absolute;left:-9999px;top:-9999px;width:0;height:0;overflow:hidden;" aria-hidden="true">'
		. '<input type="text" name="hp_field_verify" value="" tabindex="-1" autocomplete="off">'
		. '</div>';
}

/**
 * Server-side honeypot guard. Call at the top of every AJAX handler.
 * Bot detected → silent success with bot:true (defense-in-depth; primary check is client-side JS).
 */
function tnb_check_honeypot(): void {
	if ( ! empty( sanitize_text_field( wp_unslash( $_POST['hp_field_verify'] ?? '' ) ) ) ) {
		wp_send_json_success( array( 'bot' => true ) );
	}
}

/**
 * Save a lead to the tnb_lead CPT.
 *
 * @param  array{name:string, email:string, phone:string, service?:string, message?:string, form?:string, source?:string} $data
 * @return int  Post ID on success, 0 on failure.
 */
function tnb_save_lead( array $data ): int {
	$name    = sanitize_text_field( $data['name']    ?? '' );
	$email   = sanitize_email( $data['email']        ?? '' );
	$phone   = sanitize_text_field( $data['phone']   ?? '' );
	$service = sanitize_text_field( $data['service'] ?? '' );
	$message = sanitize_textarea_field( $data['message'] ?? '' );
	$source  = esc_url_raw( $data['source'] ?? sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ?? '' ) ) );
	$form    = sanitize_text_field( $data['form']    ?? 'Unknown Form' );

	$post_id = wp_insert_post(
		array(
			'post_type'   => 'tnb_lead',
			'post_title'  => sanitize_text_field( $name . ( $email ? ' <' . $email . '>' : '' ) ),
			'post_status' => 'publish',
			'post_author' => 0,
		),
		true
	);

	if ( is_wp_error( $post_id ) ) { return 0; }

	update_post_meta( $post_id, '_lead_name',         $name );
	update_post_meta( $post_id, '_lead_email',        $email );
	update_post_meta( $post_id, '_lead_phone',        $phone );
	update_post_meta( $post_id, '_lead_service',      $service );
	update_post_meta( $post_id, '_lead_message',      $message );
	update_post_meta( $post_id, '_lead_source_url',   $source );
	update_post_meta( $post_id, '_lead_form_source',  $form );
	update_post_meta( $post_id, '_lead_status',       'new' );
	update_post_meta( $post_id, '_lead_submitted_at', current_time( 'mysql' ) );
	update_post_meta( $post_id, '_lead_ip',           sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ) );
	update_post_meta( $post_id, '_lead_user_agent',   sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ?? '' ) ) );
	update_post_meta( $post_id, '_lead_raw_data',     wp_json_encode( $data ) );

	return $post_id;
}
