<?php
/**
 * DPRD Purbalingga functions and definitions
 */

if ( ! function_exists( 'dprd_purbalingga_setup' ) ) :
    function dprd_purbalingga_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register Navigation Menus
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary Menu', 'dprd-purbalingga' ),
            'footer-1' => esc_html__( 'Footer Menu', 'dprd-purbalingga' ),
        ) );

        // Switch default core markup to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'dprd_purbalingga_setup' );

// Auto-create necessary pages if they don't exist
function auto_create_theme_pages() {
    $pages = array(
        'profil' => 'Profil',
        'kontak' => 'Kontak',
        'ppid' => 'PPID',
        'sakip' => 'Sakip',
        'dlantunan' => 'D\'Lantunan'
    );
    foreach ($pages as $slug => $title) {
        $page_check = get_page_by_path($slug);
        if (!isset($page_check->ID)) {
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $title,
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_author' => 1,
            );
            $new_page_id = wp_insert_post($new_page);
            update_post_meta($new_page_id, '_wp_page_template', 'page-'.$slug.'.php');
        }
    }
}
add_action('init', 'auto_create_theme_pages');

/**
 * Enqueue scripts and styles.
 */
function dprd_purbalingga_scripts() {
    // Enqueue Google Fonts: Inter
    wp_enqueue_style( 'dprd-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );
    
    // FontAwesome for Icons
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Enqueue Main Theme Stylesheet
    wp_enqueue_style( 'dprd-purbalingga-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );

    // Enqueue Theme JS
    wp_enqueue_script( 'dprd-purbalingga-script', get_template_directory_uri() . '/script.js', array(), filemtime( get_template_directory() . '/script.js' ), true );

    // Enqueue SAKIP CSS and JS
    if ( is_page_template('page-sakip.php') || is_page('sakip') ) {
        wp_enqueue_style( 'sakip-style', get_template_directory_uri() . '/sakip.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'sakip-script', get_template_directory_uri() . '/sakip.js', array(), '1.0.0', true );
        wp_localize_script( 'sakip-script', 'themeData', array(
            'templateUrl' => get_template_directory_uri()
        ) );
    }

    // Enqueue Beranda CSS and JS
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'beranda-style', get_template_directory_uri() . '/beranda.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'beranda-script', get_template_directory_uri() . '/beranda.js', array(), '1.0.0', true );
        wp_localize_script( 'beranda-script', 'themeData', array(
            'templateUrl' => get_template_directory_uri()
        ) );
    }

    // Enqueue PPID CSS and JS
    if ( is_page_template('page-ppid.php') || is_page('ppid') ) {
        wp_enqueue_style( 'ppid-style', get_template_directory_uri() . '/ppid.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'ppid-script', get_template_directory_uri() . '/ppid.js', array(), '1.0.0', true );
        wp_localize_script( 'ppid-script', 'themeData', array(
            'templateUrl' => get_template_directory_uri()
        ) );
    }

    // Enqueue D'Lantunan CSS and JS
    if ( is_page_template('page-dlantunan.php') || is_page('dlantunan') ) {
        wp_enqueue_style( 'dlantunan-style', get_template_directory_uri() . '/dlantunan-style.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'dlantunan-script', get_template_directory_uri() . '/dlantunan-script.js', array(), '1.0.0', true );
    }

    // Enqueue Kontak CSS and JS
    if ( is_page_template('page-kontak.php') || is_page('kontak') ) {
        wp_enqueue_style( 'kontak-style', get_template_directory_uri() . '/kontak-style.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'kontak-script', get_template_directory_uri() . '/kontak-script.js', array(), '1.0.0', true );
    }

    // Enqueue Profil CSS and JS
    if ( is_page_template('page-profil.php') || is_page('profil') ) {
        wp_enqueue_style( 'profil-style', get_template_directory_uri() . '/profile-style.css', array(), '1.0.0' );
        
        wp_enqueue_script( 'profil-script', get_template_directory_uri() . '/profile-script.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'dprd_purbalingga_scripts' );

// Allow SVG Upload
function dprd_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'dprd_mime_types');

// Register ACF Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Pengaturan Website',
        'menu_title'    => 'Pengaturan Tema',
        'menu_slug'     => 'acf-options-pengaturan',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Load ACF Fields Definition
require_once get_template_directory() . '/acf-fields.php';

