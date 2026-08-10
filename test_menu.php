<?php
require 'wp-load.php';
require_once 'wp-admin/includes/menu.php';
require_once 'wp-admin/menu.php';
global $menu;
echo json_encode($menu);
