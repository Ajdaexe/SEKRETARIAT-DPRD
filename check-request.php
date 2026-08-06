<?php
require 'wp-load.php';
$_SERVER['REQUEST_URI'] = '/sekretariat-dprd/kontak/';
$wp = new WP();
$wp->parse_request();
print_r($wp->query_vars);
