<?php
/**
 * The template for displaying search results pages
 *
 * @package dprd-theme
 */

get_header();
?>

<!-- Ganti tinggi desktop edge batik supaya tidak numpuk terlalu bawah karena tidak ada hero -->
<style>
  body.search .batik-desktop-edge { display: none !important; }
  .batik-desktop-edge {
    top: 250px !important;
  }
</style>

<!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
<div class="batik-user-divider-container" style="margin-top: 100px; margin-bottom: 80px;">
  <div class="batik-user-divider-inner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
  </div>
</div>

<main id="primary" class="site-main">
  <div class="search-page-container">

    <!-- Search Box Besar di Tengah -->
    <form role="search" method="get" class="search-page-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="Cari dokumen, berita, atau layanan...">
      <button type="submit" aria-label="Cari">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Search Icon">
      </button>
    </form>

    <?php 
    $keyword = get_search_query();
    $smart_results = function_exists('dprd_get_smart_search_results') ? dprd_get_smart_search_results( $keyword ) : array();
    
    // We will collect all results here
    $all_results = array();

    // 1. Add Smart Results
    if (!empty($smart_results)) {
      foreach ($smart_results as $s_res) {
        $all_results[] = array(
          'title' => $s_res['title'],
          'url'   => $s_res['url'],
          'desc'  => $s_res['desc'],
          'date'  => date_i18n('d F Y'), // Current date as placeholder
          'cat'   => 'Halaman Terkait',
          'icon'  => 'document.png'
        );
      }
    }

    // 2. Add WP Query Results
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        $post_type = get_post_type();
        $icon = 'document.png';
        if ($post_type === 'berita') $icon = 'Berita.png';
        if ($post_type === 'layanan_dlantunan') $icon = 'layanan.png';

        $cat_name = '';
        if ($post_type == 'dokumen') {
           $kat = get_the_terms(get_the_ID(), 'kategori_dokumen');
           if ($kat && !is_wp_error($kat)) {
             $cat_name = $kat[0]->name;
           }
        }

        $all_results[] = array(
          'title' => get_the_title(),
          'url'   => get_permalink(),
          'desc'  => wp_trim_words( get_the_excerpt(), 20, '...' ),
          'date'  => get_the_date(),
          'cat'   => $cat_name,
          'icon'  => $icon
        );
      }
    }
    ?>

    <?php if ( !empty($all_results) ) : ?>

      <!-- Hasil Ditemukan -->
      <div class="search-results-list">
        <?php foreach ( $all_results as $res ) : ?>
          <div class="search-result-item">
            <h3><a href="<?php echo esc_url($res['url']); ?>" style="color:inherit; text-decoration:none;"><?php echo esc_html($res['title']); ?></a></h3>
            <p><?php echo esc_html($res['desc']); ?></p>
            <div class="search-result-meta">
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tear-Off Calendar.png" alt="Date"><?php echo esc_html($res['date']); ?></span>
              <?php if ( !empty($res['cat']) ) : ?>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kategori.png" alt="Category"><?php echo esc_html($res['cat']); ?></span>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    <?php else : ?>

      <!-- State Kosong (Tidak Ditemukan) -->
      <div class="search-empty-state">
        <div class="empty-icon-circle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Search Icon">
        </div>
        <h2>Tidak ada hasil ditemukan</h2>
        <p>Kami tidak menemukan hasil yang cocok dengan kata kunci "<strong><?php echo esc_html( get_search_query() ); ?></strong>". Coba gunakan kata kunci lain.</p>
      </div>

    <?php endif; ?>

  </div>
</main>


<?php get_footer(); ?>
