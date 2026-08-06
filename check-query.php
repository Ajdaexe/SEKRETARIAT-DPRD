<?php
require 'wp-load.php';
global $wp, $wp_query, $wp_the_query;
$wp->main('kontak/');
echo "Is front page? " . (is_front_page() ? 'Yes' : 'No') . "\n";
echo "Is home? " . (is_home() ? 'Yes' : 'No') . "\n";
echo "Is page? " . (is_page() ? 'Yes' : 'No') . "\n";
echo "Queried object ID: " . get_queried_object_id() . "\n";
echo "Template: " . get_page_template_slug() . "\n";
