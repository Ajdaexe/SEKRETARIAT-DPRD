<?php
/**
 * Plugin Name: Aiven DB SSL Forcer
 * Description: Memaksa koneksi database WordPress untuk menggunakan sertifikat SSL (dibutuhkan oleh Aiven).
 */

// If WP_DB_DROPIN is used or standard mysqli, this hook forces the SSL cert if the filter is fired
add_action('mysqli_real_connect', function($mysqli) {
    if (defined('MYSQL_SSL_CA')) {
        mysqli_ssl_set($mysqli, NULL, NULL, MYSQL_SSL_CA, NULL, NULL);
    }
});
