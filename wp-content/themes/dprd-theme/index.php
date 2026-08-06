<?php
/**
 * The main template file
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<div class="container" style="min-height: 50vh; padding: 40px; display: flex; align-items: center; justify-content: center;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    else :
        echo '<h1>Halaman tidak ditemukan.</h1>';
    endif;
    ?>
</div>

<?php
get_footer();
