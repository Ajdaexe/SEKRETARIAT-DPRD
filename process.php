<?php
function processFile($inFile, $outFile) {
    $content = file_get_contents($inFile);
    
    // Extract everything between <!-- ===== HERO ===== --> and <!-- ===== FOOTER ===== -->
    $startString = '<!-- ===== HERO ===== -->';
    $endString = '<!-- ===== FOOTER ===== -->';
    
    $startPos = strpos($content, $startString);
    $endPos = strpos($content, $endString);
    
    if ($startPos === false || $endPos === false) {
        echo "Error: start or end string not found in $inFile\n";
        return;
    }
    
    $bodyContent = substr($content, $startPos, $endPos - $startPos);
    
    // Replace images/ with <?php echo get_template_directory_uri(); ?>/assets/images/
    $bodyContent = str_replace('"images/', '"<?php echo get_template_directory_uri(); ?>/assets/images/', $bodyContent);
    
    // Prepare the final PHP content
    $finalContent = "<?php\n/**\n * Template Name: " . basename($outFile, '.php') . "\n *\n * @package dprd-purbalingga\n */\n\nget_header();\n?>\n\n" . $bodyContent . "\n<?php get_footer(); ?>\n";
    
    file_put_contents($outFile, $finalContent);
    echo "Successfully processed $inFile -> $outFile\n";
}

processFile('d:/APP/xampp2/htdocs/sekretariat-dprd/html-tambahan/dlantunan.html', 'd:/APP/xampp2/htdocs/sekretariat-dprd/wp-content/themes/dprd-purbalingga/page-dlantunan.php');
processFile('d:/APP/xampp2/htdocs/sekretariat-dprd/html-tambahan/kontak.html', 'd:/APP/xampp2/htdocs/sekretariat-dprd/wp-content/themes/dprd-purbalingga/page-kontak.php');
processFile('d:/APP/xampp2/htdocs/sekretariat-dprd/html-tambahan/profile.html', 'd:/APP/xampp2/htdocs/sekretariat-dprd/wp-content/themes/dprd-purbalingga/page-profil.php');
