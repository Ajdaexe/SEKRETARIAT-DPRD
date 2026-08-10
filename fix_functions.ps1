$f = Get-Content wp-content/themes/dprd-theme/functions.php
$fb = Get-Content wp-content/themes/dprd-theme/functions_beranda_utf8.php

$part1 = $f[0..873]
$part2 = $fb[187..661]
$part3 = $f[874..($f.Length-1)]

$out = $part1 + $part2 + $part3

$out | Set-Content wp-content/themes/dprd-theme/functions.php -Encoding UTF8
