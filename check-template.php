<?php
require 'wp-load.php';
$req = new WP_Query('pagename=kontak');
echo 'Template: ' . get_page_template_slug($req->post->ID);
