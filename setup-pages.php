<?php
define('WP_USE_THEMES', false);
require_once('wp-load.php');

$pages = [
    ['title' => 'Beranda', 'slug' => 'beranda', 'template' => 'page-beranda.php'],
    ['title' => 'Profil', 'slug' => 'profile', 'template' => 'page-profile.php'],
    ['title' => 'Kontak', 'slug' => 'kontak', 'template' => 'page-kontak.php'],
    ['title' => 'PPID', 'slug' => 'ppid', 'template' => 'page-ppid.php'],
    ['title' => 'Sakip', 'slug' => 'sakip', 'template' => 'page-sakip.php'],
    ['title' => "D'Lantunan", 'slug' => 'dlantunan', 'template' => 'page-dlantunan.php'],
];

foreach ($pages as $p) {
    $page_check = get_page_by_path($p['slug']);
    if (!isset($page_check->ID)) {
        // Try to get by title just in case it was created with wrong slug
        $page_by_title = get_page_by_title($p['title']);
        if ($page_by_title) {
            $page_check = $page_by_title;
            // update slug
            wp_update_post([
                'ID' => $page_check->ID,
                'post_name' => $p['slug']
            ]);
        }
    }

    if (!isset($page_check->ID)) {
        $page_id = wp_insert_post([
            'post_title' => $p['title'],
            'post_name' => $p['slug'],
            'post_type' => 'page',
            'post_status' => 'publish',
        ]);
        if ($page_id && !is_wp_error($page_id)) {
            update_post_meta($page_id, '_wp_page_template', $p['template']);
            echo "Created {$p['title']} with slug '{$p['slug']}' and template {$p['template']}\n";
        }
    } else {
        update_post_meta($page_check->ID, '_wp_page_template', $p['template']);
        echo "Updated {$p['title']} with slug '{$p['slug']}' and template {$p['template']}\n";
    }
}

// Set Front Page
$beranda = get_page_by_path('beranda');
if ($beranda) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $beranda->ID);
    echo "Front page set to Beranda\n";
}

// Ensure theme is active
switch_theme('nama-tema-kustom');
echo "Theme 'nama-tema-kustom' activated\n";

// Ensure permalink structure is /%postname%/
global $wp_rewrite;
$wp_rewrite->set_permalink_structure('/%postname%/');
$wp_rewrite->flush_rules();
echo "Permalink structure set and rules flushed\n";
?>
