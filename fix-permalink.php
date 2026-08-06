<?php
require 'wp-load.php';
update_option('permalink_structure', '/%postname%/');
flush_rewrite_rules(true);
echo "Permalink structure updated to /%postname%/ and rules flushed.";
