<?php
/**
 * Script Setup Fase 2 Otomatis (Aktivasi Plugin & Struktur Data)
 */
define('WP_USE_THEMES', false);
require_once( dirname( __FILE__ ) . '/wp-load.php' );
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

echo "Memulai Setup Fase 2...\n";

// Skip plugin activation as it causes redirects.

// 2. Setup CPT UI (Opsi Database)
$cptui_post_types = array(
    'dokumen' => array(
        'name' => 'dokumen',
        'label' => 'Dokumen',
        'singular_label' => 'Dokumen',
        'public' => 'true',
        'show_ui' => 'true',
        'show_in_rest' => 'true',
        'menu_icon' => 'dashicons-media-document',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'kategori_dokumen' )
    ),
    'layanan_dlantunan' => array(
        'name' => 'layanan_dlantunan',
        'label' => 'Layanan D\'Lantunan',
        'singular_label' => 'Layanan',
        'public' => 'true',
        'show_ui' => 'true',
        'show_in_rest' => 'true',
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array( 'title', 'editor' )
    ),
    'berita' => array(
        'name' => 'berita',
        'label' => 'Info Terbaru',
        'singular_label' => 'Berita',
        'public' => 'true',
        'show_ui' => 'true',
        'show_in_rest' => 'true',
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    )
);
update_option('cptui_post_types', $cptui_post_types);
echo "[OK] CPTUI Post Types disimpan.\n";

$cptui_taxonomies = array(
    'kategori_dokumen' => array(
        'name' => 'kategori_dokumen',
        'label' => 'Kategori Dokumen',
        'singular_label' => 'Kategori Dokumen',
        'public' => 'true',
        'hierarchical' => 'true',
        'show_ui' => 'true',
        'show_in_menu' => 'true',
        'show_admin_column' => 'true',
        'show_in_rest' => 'true',
        'object_types' => array( 'dokumen' )
    )
);
update_option('cptui_taxonomies', $cptui_taxonomies);
echo "[OK] CPTUI Taxonomies disimpan.\n";

// Daftarkan ulang rewrite rules (flush)
flush_rewrite_rules();

echo "Setup Fase 2 selesai!\n";
?>
