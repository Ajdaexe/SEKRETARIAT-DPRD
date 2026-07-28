<?php
define('WP_USE_THEMES', false);
require_once( dirname( __FILE__ ) . '/wp-load.php' );

// Default keys for CPTUI Post Types to prevent warnings
$default_cpt_keys = array(
    'name' => '',
    'label' => '',
    'singular_label' => '',
    'description' => '',
    'public' => 'true',
    'publicly_queryable' => 'true',
    'show_ui' => 'true',
    'show_in_nav_menus' => 'true',
    'show_in_rest' => 'true',
    'rest_base' => '',
    'rest_controller_class' => '',
    'rest_namespace' => '',
    'has_archive' => 'false',
    'has_archive_string' => '',
    'exclude_from_search' => 'false',
    'capability_type' => 'post',
    'hierarchical' => 'false',
    'rewrite' => 'true',
    'rewrite_slug' => '',
    'rewrite_withfront' => 'true',
    'query_var' => 'true',
    'query_var_slug' => '',
    'menu_position' => '',
    'show_in_menu' => 'true',
    'show_in_menu_string' => '',
    'menu_icon' => '',
    'supports' => array('title', 'editor'),
    'taxonomies' => array(),
    'labels' => array(),
    'custom_supports' => ''
);

$cptui_post_types = get_option('cptui_post_types', array());
if (is_array($cptui_post_types)) {
    foreach ($cptui_post_types as $slug => $cpt) {
        $cptui_post_types[$slug] = array_merge($default_cpt_keys, $cpt);
        // Ensure taxonomies and labels are arrays to prevent foreach null warnings
        if (!is_array($cptui_post_types[$slug]['taxonomies'])) {
            $cptui_post_types[$slug]['taxonomies'] = array();
        }
        if (!is_array($cptui_post_types[$slug]['labels'])) {
            $cptui_post_types[$slug]['labels'] = array();
        }
        if (!is_array($cptui_post_types[$slug]['supports'])) {
            $cptui_post_types[$slug]['supports'] = array('title', 'editor');
        }
    }
    update_option('cptui_post_types', $cptui_post_types);
}

// Default keys for CPTUI Taxonomies to prevent warnings
$default_tax_keys = array(
    'name' => '',
    'label' => '',
    'singular_label' => '',
    'description' => '',
    'public' => 'true',
    'publicly_queryable' => 'true',
    'hierarchical' => 'false',
    'show_ui' => 'true',
    'show_in_menu' => 'true',
    'show_in_nav_menus' => 'true',
    'query_var' => 'true',
    'query_var_slug' => '',
    'rewrite' => 'true',
    'rewrite_slug' => '',
    'rewrite_withfront' => '1',
    'rewrite_hierarchical' => '0',
    'show_admin_column' => 'false',
    'show_in_rest' => 'true',
    'show_in_quick_edit' => 'true',
    'rest_base' => '',
    'rest_controller_class' => '',
    'rest_namespace' => '',
    'labels' => array(),
    'object_types' => array()
);

$cptui_taxonomies = get_option('cptui_taxonomies', array());
if (is_array($cptui_taxonomies)) {
    foreach ($cptui_taxonomies as $slug => $tax) {
        $cptui_taxonomies[$slug] = array_merge($default_tax_keys, $tax);
        // Ensure labels and object_types are arrays
        if (!is_array($cptui_taxonomies[$slug]['labels'])) {
            $cptui_taxonomies[$slug]['labels'] = array();
        }
        if (!is_array($cptui_taxonomies[$slug]['object_types'])) {
            $cptui_taxonomies[$slug]['object_types'] = array();
        }
    }
    update_option('cptui_taxonomies', $cptui_taxonomies);
}

echo "Berhasil memperbaiki struktur data CPTUI di database.\n";
