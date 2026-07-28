<?php
define('WP_USE_THEMES', false);
require_once( dirname( __FILE__ ) . '/wp-load.php' );

$pages_to_create = array(
    'Beranda' => 'front-page.php', // Actually, front-page.php works automatically if set as static front page, but we'll assign it anyway or just default
    'Profil' => 'page-profil.php',
    'Kontak' => 'page-kontak.php',
    'PPID' => 'page-ppid.php',
    'Sakip' => 'page-sakip.php',
    'D\'Lantunan' => 'page-dlantunan.php',
);

$front_page_id = 0;

foreach ($pages_to_create as $title => $template) {
    $page = get_page_by_title($title);
    if (!$page) {
        $post_id = wp_insert_post(array(
            'post_title' => $title,
            'post_type' => 'page',
            'post_status' => 'publish',
        ));
        
        if ($post_id) {
            echo "Halaman dibuat: $title\n";
            // Assign template
            if ($template !== 'front-page.php') {
                update_post_meta($post_id, '_wp_page_template', $template);
            }
            if ($title === 'Beranda') {
                $front_page_id = $post_id;
            }
        }
    } else {
        echo "Halaman sudah ada: $title\n";
        if ($title === 'Beranda') {
            $front_page_id = $page->ID;
        }
    }
}

// Set Beranda as Homepage
if ($front_page_id) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id);
    echo "Beranda diset sebagai halaman depan statis.\n";
}

// Setup Menu Utama
$menu_name = 'Menu Utama';
$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    
    // Add pages to menu
    $pages = get_pages();
    foreach ($pages as $page) {
        // Skip default sample page
        if ($page->post_title === 'Sample Page') continue;
        
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => $page->post_title,
            'menu-item-object-id' => $page->ID,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));
    }
    
    // Assign to Primary Menu location
    $locations = get_theme_mod('nav_menu_locations');
    $locations['menu-1'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
    
    echo "Menu Utama dibuat dan ditugaskan ke header.\n";
} else {
    echo "Menu Utama sudah ada.\n";
}

echo "Setup Halaman selesai.\n";
