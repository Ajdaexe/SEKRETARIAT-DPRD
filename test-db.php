<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'mysql-1be3515b-sekretariat-dprd.b.aivencloud.com';
$port = 16999;
$user = 'avnadmin';
$password = 'AVNS_LzipKbBQHCzBy601wDm';
$db = 'defaultdb';
$ca = __DIR__ . '/ca.pem';

echo "Testing connection to $host:$port...\n";

$mysqli = mysqli_init();
mysqli_ssl_set($mysqli, NULL, NULL, $ca, NULL, NULL);

$connected = mysqli_real_connect($mysqli, $host, $user, $password, $db, $port, NULL, MYSQLI_CLIENT_SSL);

if ($connected) {
    echo "Connection successful!\n";
} else {
    echo "Connection failed: " . mysqli_connect_error() . "\n";
}
