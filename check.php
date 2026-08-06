<?php
require 'wp-load.php';
$p = get_page_by_path('kontak');
echo $p ? 'exists: ' . $p->ID : 'missing';
$args = array('post_type' => 'page', 'posts_per_page' => -1);
$pages = get_posts($args);
echo "\nALL PAGES:\n";
foreach($pages as $page) {
    echo $page->post_name . ' (' . $page->ID . ")\n";
}
