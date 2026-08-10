$files = @('page-beranda.php', 'page-kontak.php', 'page-ppid.php', 'page-sakip.php', 'page-dlantunan.php')
foreach ($f in $files) {
    $path = 'wp-content/themes/dprd-theme/' + $f
    $content = Get-Content $path -Raw
    $opt = 'dprd_cta_text_' + ($f -replace 'page-', '' -replace '\.php', '')
    $content = [regex]::Replace($content, '<h3>Bersama Mewujudkan DPRD yang Berkinerja<br>\s*Tinggi dan Melayani Masyarakat</h3>', '<h3><?php echo wp_kses_post( get_option(''' + $opt + ''', ''Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat'') ); ?></h3>')
    $content | Set-Content $path -Encoding UTF8
}
