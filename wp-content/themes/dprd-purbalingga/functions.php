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

/**
 * Enqueue scripts and styles.
 */
function dprd_purbalingga_scripts() {
    // Enqueue Google Fonts: Inter
    wp_enqueue_style( 'dprd-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );
    
    // FontAwesome for Icons
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
}
add_action( 'wp_enqueue_scripts', 'dprd_purbalingga_scripts' );

// Allow SVG Upload
function dprd_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'dprd_mime_types');
