<?php
defined('ABSPATH') || exit;

add_action('admin_menu', function () {
    add_management_page(
        'URL Migration',
        'URL Migration',
        'manage_options',
        'tnb-url-migration',
        'tnb_url_migration_page'
    );
});

// ---------------------------------------------------------------------------
// Mappings
// ---------------------------------------------------------------------------

function tnb_url_migration_get_mappings() {
    return [
        '/test'        => '/test/example/',
//         '/stack/flutter-app-development'             => '/technologies/flutter/',
    ];
}

// ---------------------------------------------------------------------------
// Regex helpers
// ---------------------------------------------------------------------------

/**
 * Context-aware URL path regex. Matches old_path only when preceded by a
 * URL-context character (quote, whitespace, =, (, >, or start-of-string)
 * and followed by a URL-terminating character. Prevents re-matching a path
 * that is already embedded inside a converted path like /platforms/old-path/.
 */
function tnb_url_migration_build_pattern($old_path) {
    $e = preg_quote($old_path, '/');
    return '/((?:^|["\'\\s=(>]))(https?:\\/\\/[^\\/]*)?' . $e . '\\/?' . '(?=[?#"\'\\s<>)]|$)/';
}

function tnb_url_migration_replace_in_string($content, $old_path, $new_path) {
    return preg_replace(
        tnb_url_migration_build_pattern($old_path),
        '${1}${2}' . $new_path,
        $content
    );
}

function tnb_url_migration_count_in_string($content, $old_path) {
    return (int) preg_match_all(tnb_url_migration_build_pattern($old_path), $content);
}

// ---------------------------------------------------------------------------
// Serialization-aware replace
// ---------------------------------------------------------------------------

function tnb_url_migration_safe_replace($value, $old_path, $new_path) {
    $u = @unserialize($value);
    if ($u !== false || $value === 'b:0;') {
        return serialize(tnb_url_migration_replace_in_value($u, $old_path, $new_path));
    }
    return tnb_url_migration_replace_in_string($value, $old_path, $new_path);
}

function tnb_url_migration_replace_in_value($val, $old_path, $new_path) {
    if (is_string($val)) return tnb_url_migration_replace_in_string($val, $old_path, $new_path);
    if (is_array($val)) {
        foreach ($val as $k => $v) $val[$k] = tnb_url_migration_replace_in_value($v, $old_path, $new_path);
        return $val;
    }
    if (is_object($val)) {
        foreach ($val as $k => $v) $val->$k = tnb_url_migration_replace_in_value($v, $old_path, $new_path);
        return $val;
    }
    return $val;
}

// ---------------------------------------------------------------------------
// Scan
// ---------------------------------------------------------------------------

function tnb_url_migration_scan($mappings) {
    global $wpdb;
    $findings        = [];
    $skip_option_pfx = ['_transient_', '_site_transient_', 'cron'];

    foreach ($mappings as $old_path => $new_path) {
        if ($old_path === $new_path) continue;
        $like = '%' . $wpdb->esc_like($old_path) . '%';

        // wp_posts guid
        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT ID, guid FROM {$wpdb->posts} WHERE guid LIKE %s AND post_status != 'auto-draft'", $like
        )) as $row) {
            $path = parse_url($row->guid, PHP_URL_PATH);
            if ($path && preg_match('/\.[a-zA-Z0-9]{2,5}$/', rtrim($path, '/'))) continue;
            $nv = tnb_url_migration_replace_in_string($row->guid, $old_path, $new_path);
            if ($nv === $row->guid) continue;
            $findings[] = ['table' => $wpdb->posts, 'field' => 'guid', 'id_col' => 'ID',
                'id_val' => $row->ID, 'count' => tnb_url_migration_count_in_string($row->guid, $old_path),
                'old_disp' => esc_html($row->guid), 'new_disp' => esc_html($nv),
                'old_path' => $old_path, 'new_path' => $new_path];
        }

        // wp_posts post_content
        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT ID, post_content FROM {$wpdb->posts} WHERE post_content LIKE %s AND post_status != 'auto-draft'", $like
        )) as $row) {
            $nv = tnb_url_migration_replace_in_string($row->post_content, $old_path, $new_path);
            if ($nv === $row->post_content) continue;
            $findings[] = ['table' => $wpdb->posts, 'field' => 'post_content', 'id_col' => 'ID',
                'id_val' => $row->ID, 'count' => tnb_url_migration_count_in_string($row->post_content, $old_path),
                'old_disp' => esc_html(substr($row->post_content, 0, 120)) . '…',
                'new_disp' => esc_html(substr($nv, 0, 120)) . '…',
                'old_path' => $old_path, 'new_path' => $new_path];
        }

        // wp_postmeta
        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT meta_id, meta_key, meta_value FROM {$wpdb->postmeta} WHERE meta_value LIKE %s", $like
        )) as $row) {
            $nv = tnb_url_migration_safe_replace($row->meta_value, $old_path, $new_path);
            if ($nv === $row->meta_value) continue;
            $u = @unserialize($row->meta_value);
            $flat = ($u !== false || $row->meta_value === 'b:0;') ? json_encode($u) : $row->meta_value;
            $findings[] = ['table' => $wpdb->postmeta, 'field' => 'meta_value', 'id_col' => 'meta_id',
                'id_val' => $row->meta_id, 'count' => tnb_url_migration_count_in_string($flat, $old_path),
                'old_disp' => esc_html($row->meta_key) . ': ' . esc_html(substr($row->meta_value, 0, 100)),
                'new_disp' => esc_html($row->meta_key) . ': ' . esc_html(substr($nv, 0, 100)),
                'old_path' => $old_path, 'new_path' => $new_path];
        }

        // wp_options
        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT option_id, option_name, option_value FROM {$wpdb->options} WHERE option_value LIKE %s", $like
        )) as $row) {
            $skip = false;
            foreach ($skip_option_pfx as $p) { if (strpos($row->option_name, $p) !== false) { $skip = true; break; } }
            if ($skip) continue;
            $nv = tnb_url_migration_safe_replace($row->option_value, $old_path, $new_path);
            if ($nv === $row->option_value) continue;
            $u = @unserialize($row->option_value);
            $flat = ($u !== false || $row->option_value === 'b:0;') ? json_encode($u) : $row->option_value;
            $findings[] = ['table' => $wpdb->options, 'field' => 'option_value', 'id_col' => 'option_id',
                'id_val' => $row->option_id, 'count' => tnb_url_migration_count_in_string($flat, $old_path),
                'old_disp' => esc_html($row->option_name) . ': ' . esc_html(substr($row->option_value, 0, 100)),
                'new_disp' => esc_html($row->option_name) . ': ' . esc_html(substr($nv, 0, 100)),
                'old_path' => $old_path, 'new_path' => $new_path];
        }
    }

    return $findings;
}

// ---------------------------------------------------------------------------
// Backup
// ---------------------------------------------------------------------------

/**
 * Snapshot current DB values for every row that will be changed.
 * Stored in wp_options under 'tnb_url_migration_backup' (autoload=no).
 * Deduplicates by table+field+id so each row is stored exactly once.
 */
function tnb_url_migration_create_backup($findings) {
    global $wpdb;

    $allowed_fields  = ['guid', 'post_content', 'meta_value', 'option_value'];
    $allowed_id_cols = ['ID', 'meta_id', 'option_id'];

    $seen = [];
    $rows = [];

    foreach ($findings as $f) {
        // Whitelist fields/id-cols (findings come from internal code, but belt-and-suspenders)
        if (!in_array($f['field'], $allowed_fields, true))  continue;
        if (!in_array($f['id_col'], $allowed_id_cols, true)) continue;

        $key = $f['table'] . '.' . $f['field'] . '.' . $f['id_val'];
        if (isset($seen[$key])) continue;
        $seen[$key] = true;

        // Read the LIVE value right now (not the cached scan value)
        $current = $wpdb->get_var($wpdb->prepare(
            "SELECT `{$f['field']}` FROM `{$f['table']}` WHERE `{$f['id_col']}` = %s",
            $f['id_val']
        ));

        $rows[] = [
            'table'    => $f['table'],
            'field'    => $f['field'],
            'id_col'   => $f['id_col'],
            'id_val'   => $f['id_val'],
            'original' => $current,
        ];
    }

    update_option('tnb_url_migration_backup', [
        'created_at' => current_time('mysql'),
        'rows'       => $rows,
    ], false);

    return count($rows);
}

function tnb_url_migration_get_backup() {
    return get_option('tnb_url_migration_backup', null);
}

function tnb_url_migration_delete_backup() {
    delete_option('tnb_url_migration_backup');
}

// ---------------------------------------------------------------------------
// Rollback
// ---------------------------------------------------------------------------

/**
 * Restore every backed-up row to its original value and delete the backup.
 * Returns number of rows restored, or WP_Error on failure.
 */
function tnb_url_migration_rollback() {
    global $wpdb;

    $backup = tnb_url_migration_get_backup();
    if (!$backup || empty($backup['rows'])) {
        return new WP_Error('no_backup', 'No backup found.');
    }

    $allowed_fields  = ['guid', 'post_content', 'meta_value', 'option_value'];
    $allowed_id_cols = ['ID', 'meta_id', 'option_id'];
    $restored        = 0;

    foreach ($backup['rows'] as $row) {
        if (!in_array($row['field'], $allowed_fields, true))  continue;
        if (!in_array($row['id_col'], $allowed_id_cols, true)) continue;

        $result = $wpdb->update(
            $row['table'],
            [$row['field']   => $row['original']],
            [$row['id_col']  => $row['id_val']]
        );

        if ($result !== false) $restored++;
    }

    tnb_url_migration_delete_backup();

    return $restored;
}

// ---------------------------------------------------------------------------
// Apply
// ---------------------------------------------------------------------------

function tnb_url_migration_apply($mappings) {
    global $wpdb;
    $updated         = 0;
    $skip_option_pfx = ['_transient_', '_site_transient_', 'cron'];

    foreach ($mappings as $old_path => $new_path) {
        if ($old_path === $new_path) continue;
        $like = '%' . $wpdb->esc_like($old_path) . '%';

        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT ID, guid FROM {$wpdb->posts} WHERE guid LIKE %s AND post_status != 'auto-draft'", $like
        )) as $row) {
            $path = parse_url($row->guid, PHP_URL_PATH);
            if ($path && preg_match('/\.[a-zA-Z0-9]{2,5}$/', rtrim($path, '/'))) continue;
            $nv = tnb_url_migration_replace_in_string($row->guid, $old_path, $new_path);
            if ($nv === $row->guid) continue;
            $wpdb->update($wpdb->posts, ['guid' => $nv], ['ID' => $row->ID]);
            $updated++;
        }

        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT ID, post_content FROM {$wpdb->posts} WHERE post_content LIKE %s AND post_status != 'auto-draft'", $like
        )) as $row) {
            $nv = tnb_url_migration_replace_in_string($row->post_content, $old_path, $new_path);
            if ($nv === $row->post_content) continue;
            $wpdb->update($wpdb->posts, ['post_content' => $nv], ['ID' => $row->ID]);
            $updated++;
        }

        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT meta_id, meta_value FROM {$wpdb->postmeta} WHERE meta_value LIKE %s", $like
        )) as $row) {
            $nv = tnb_url_migration_safe_replace($row->meta_value, $old_path, $new_path);
            if ($nv === $row->meta_value) continue;
            $wpdb->update($wpdb->postmeta, ['meta_value' => $nv], ['meta_id' => $row->meta_id]);
            $updated++;
        }

        foreach ($wpdb->get_results($wpdb->prepare(
            "SELECT option_id, option_name, option_value FROM {$wpdb->options} WHERE option_value LIKE %s", $like
        )) as $row) {
            $skip = false;
            foreach ($skip_option_pfx as $p) { if (strpos($row->option_name, $p) !== false) { $skip = true; break; } }
            if ($skip) continue;
            $nv = tnb_url_migration_safe_replace($row->option_value, $old_path, $new_path);
            if ($nv === $row->option_value) continue;
            $wpdb->update($wpdb->options, ['option_value' => $nv], ['option_id' => $row->option_id]);
            $updated++;
        }
    }

    return $updated;
}

// ---------------------------------------------------------------------------
// Admin page
// ---------------------------------------------------------------------------

function tnb_url_migration_page() {
    if (!current_user_can('manage_options')) wp_die('Insufficient permissions.');

    $mappings = tnb_url_migration_get_mappings();
    $action   = isset($_POST['tnb_action']) ? sanitize_text_field($_POST['tnb_action']) : '';
    $nonce_ok = isset($_POST['tnb_nonce']) && wp_verify_nonce($_POST['tnb_nonce'], 'tnb_url_migration');

    $findings      = null;
    $notice        = null;   // ['type' => 'success|error|warning|info', 'msg' => '...']
    $apply_result  = null;   // ['backup_rows' => n, 'updated' => n]
    $rollback_done = false;

    if ($action && !$nonce_ok) {
        $notice = ['type' => 'error', 'msg' => 'Security check failed. Please try again.'];

    } elseif ($action === 'scan' && $nonce_ok) {
        $findings = tnb_url_migration_scan($mappings);

    } elseif ($action === 'apply' && $nonce_ok) {
        // Re-scan live state, backup, then apply
        $live_findings  = tnb_url_migration_scan($mappings);
        $backup_count   = tnb_url_migration_create_backup($live_findings);
        $updated        = tnb_url_migration_apply($mappings);
        $apply_result   = ['backup_rows' => $backup_count, 'updated' => $updated];

    } elseif ($action === 'rollback' && $nonce_ok) {
        $result = tnb_url_migration_rollback();
        if (is_wp_error($result)) {
            $notice = ['type' => 'error', 'msg' => $result->get_error_message()];
        } else {
            $rollback_done = true;
            $notice = ['type' => 'success', 'msg' => "Rollback complete. {$result} rows restored to original values. Backup deleted."];
        }

    } elseif ($action === 'clear_backup' && $nonce_ok) {
        tnb_url_migration_delete_backup();
        $notice = ['type' => 'info', 'msg' => 'Backup cleared. Previous state can no longer be restored.'];
    }

    $backup       = tnb_url_migration_get_backup();
    $total_hits   = $findings ? array_sum(array_column($findings, 'count')) : 0;
    ?>
    <div class="wrap">
        <h1>URL Migration Tool</h1>
        <p style="max-width:700px">
            Replaces old URL paths with new ones across the database.<br>
            <strong>Apply automatically creates a backup</strong> of every affected row before making any change.
            If something goes wrong, click <em>Rollback</em> to instantly revert to the pre-migration state.
        </p>

        <?php /* ── Rollback banner ── */ ?>
        <?php if ($backup && !$rollback_done): ?>
        <div style="background:#fff3cd;border:1px solid #ffc107;border-left:4px solid #e65c00;padding:14px 18px;margin-bottom:20px;border-radius:3px;max-width:900px">
            <strong style="font-size:14px">⚠ Backup available — created <?php echo esc_html($backup['created_at']); ?> (<?php echo count($backup['rows']); ?> rows)</strong><br>
            <span style="font-size:13px;color:#555">The migration has been applied. If anything looks wrong, click <strong>Rollback</strong> to restore all rows to their state at backup time.</span>
            <div style="margin-top:10px;display:flex;gap:10px;align-items:center">
                <form method="post" style="margin:0">
                    <?php wp_nonce_field('tnb_url_migration', 'tnb_nonce'); ?>
                    <input type="hidden" name="tnb_action" value="rollback">
                    <button type="submit" class="button"
                        style="background:#c0392b;color:#fff;border-color:#a93226;font-weight:bold"
                        onclick="return confirm('Rollback will restore <?php echo count($backup['rows']); ?> rows to their state from <?php echo esc_js($backup['created_at']); ?>.\n\nThis will undo all migration changes. Continue?')">
                        ↩ Rollback to <?php echo esc_html($backup['created_at']); ?>
                    </button>
                </form>
                <form method="post" style="margin:0">
                    <?php wp_nonce_field('tnb_url_migration', 'tnb_nonce'); ?>
                    <input type="hidden" name="tnb_action" value="clear_backup">
                    <button type="submit" class="button"
                        onclick="return confirm('Clear the backup? You will no longer be able to rollback the migration.')">
                        Clear Backup
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <?php /* ── Notices ── */ ?>
        <?php if ($notice): ?>
            <div class="notice notice-<?php echo esc_attr($notice['type']); ?> is-dismissible"><p><?php echo $notice['msg']; ?></p></div>
        <?php endif; ?>

        <?php /* ── Apply result ── */ ?>
        <?php if ($apply_result !== null): ?>
            <div class="notice notice-success is-dismissible">
                <p>
                    <strong>Migration applied.</strong>
                    <?php echo (int)$apply_result['updated']; ?> records updated.
                    Backup created for <?php echo (int)$apply_result['backup_rows']; ?> rows —
                    use the <em>Rollback</em> button above if you need to undo this.
                </p>
            </div>
        <?php endif; ?>

        <?php /* ── Scan form ── */ ?>
        <form method="post" style="margin-bottom:20px">
            <?php wp_nonce_field('tnb_url_migration', 'tnb_nonce'); ?>
            <input type="hidden" name="tnb_action" value="scan">
            <button type="submit" class="button button-primary">Run Dry-Run Scan</button>
            <span style="color:#666;font-size:12px;margin-left:10px">No changes made during scan.</span>
        </form>

        <?php /* ── Scan results ── */ ?>
        <?php if ($findings !== null): ?>
            <?php if (empty($findings)): ?>
                <div class="notice notice-success"><p><strong>No pending changes.</strong> All URLs are already up to date.</p></div>
            <?php else: ?>
                <div class="notice notice-warning">
                    <p>
                        <strong><?php echo count($findings); ?> records</strong> contain <?php echo $total_hits; ?> path occurrence(s) to update.<br>
                        Clicking <em>Apply</em> will <strong>first create a backup</strong>, then apply all changes.
                        Already-converted rows are excluded from this list.
                    </p>
                </div>

                <table class="wp-list-table widefat fixed striped" style="margin-bottom:20px">
                    <thead>
                        <tr>
                            <th style="width:14%">Table</th>
                            <th style="width:9%">Field</th>
                            <th style="width:6%">Row ID</th>
                            <th style="width:5%">Hits</th>
                            <th style="width:14%">Old Path</th>
                            <th style="width:14%">New Path</th>
                            <th>Old Value (preview)</th>
                            <th>New Value (preview)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($findings as $f): ?>
                        <tr>
                            <td><code><?php echo esc_html($f['table']); ?></code></td>
                            <td><code><?php echo esc_html($f['field']); ?></code></td>
                            <td><?php echo esc_html($f['id_val']); ?></td>
                            <td><?php echo (int)$f['count']; ?></td>
                            <td><code style="color:#c00"><?php echo esc_html($f['old_path']); ?></code></td>
                            <td><code style="color:#090"><?php echo esc_html($f['new_path']); ?></code></td>
                            <td style="word-break:break-all;font-size:11px"><?php echo $f['old_disp']; ?></td>
                            <td style="word-break:break-all;font-size:11px"><?php echo $f['new_disp']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <form method="post">
                    <?php wp_nonce_field('tnb_url_migration', 'tnb_nonce'); ?>
                    <input type="hidden" name="tnb_action" value="apply">
                    <button type="submit" class="button button-primary"
                        onclick="return confirm('This will:\n1. Create a backup of all <?php echo count($findings); ?> affected rows\n2. Apply the URL changes\n\nYou can rollback instantly after if needed.\n\nProceed?')">
                        Apply Changes — <?php echo count($findings); ?> records (auto-backup included)
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?>

        <?php /* ── Mappings reference ── */ ?>
        <hr style="margin-top:30px">
        <h2>Mappings (<?php echo count($mappings); ?> total)</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead><tr><th>Old Path</th><th>New Path</th></tr></thead>
            <tbody>
                <?php foreach ($mappings as $old => $new): ?>
                    <?php $noop = ($old === $new); ?>
                    <tr<?php echo $noop ? ' style="opacity:.4"' : ''; ?>>
                        <td><code><?php echo esc_html($old); ?></code><?php echo $noop ? ' <em>(no-op)</em>' : ''; ?></td>
                        <td><code><?php echo esc_html($new); ?></code></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
