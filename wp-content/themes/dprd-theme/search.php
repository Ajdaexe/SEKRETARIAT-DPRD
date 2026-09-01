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
          'icon'  => 'document.png',
          'badge' => isset($s_res['badge']) ? $s_res['badge'] : 'HALAMAN'
        );
      }
    }

    $fetched_post_ids = array();

    // 1.5 Add All Documents if keyword is 'dokumen' or 'berkas'
    if (strtolower(trim($keyword)) === 'dokumen' || strtolower(trim($keyword)) === 'berkas') {
        $all_docs = get_posts(array(
            'post_type' => 'dokumen',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        foreach ($all_docs as $d) {
            $fetched_post_ids[] = $d->ID;
            
            $grup = get_post_meta($d->ID, '_dokumen_grup', true);
            $badge_name = !empty($grup) ? strtoupper($grup) : 'PPID';
            
            $doc_url = get_post_meta($d->ID, '_dokumen_file_url', true);
            if (!empty($doc_url)) {
                $final_url = $doc_url;
            } else {
                $final_url = (strtolower($grup) === 'sakip') ? home_url('/sakip/') : home_url('/ppid/');
            }
            
            $kat_terms = get_the_terms($d->ID, 'kategori_dokumen');
            $cat_name = ($kat_terms && !is_wp_error($kat_terms)) ? $kat_terms[0]->name : '';
            
            $all_results[] = array(
                'title' => $d->post_title,
                'url'   => $final_url,
                'desc'  => wp_trim_words( $d->post_excerpt ? $d->post_excerpt : $d->post_content, 20, '...' ),
                'date'  => get_the_date('d F Y', $d->ID),
                'cat'   => $cat_name,
                'icon'  => 'document.png',
                'badge' => $badge_name
            );
        }
    }

    // 1.7 Add D'Lantunan JSON Documents
    $dlantunan_docs_json = get_option('dprd_dlantunan_docs_data', '');
    if (empty($dlantunan_docs_json) || $dlantunan_docs_json === '[]' || $dlantunan_docs_json === 'false') {
        $dlantunan_docs_json = json_encode([
            ['title' => 'Panduan Penggunaan Portal D\'Lantunan', 'url' => get_template_directory_uri() . '/assets/pdf/DOR.pdf', 'type' => 'PDF', 'date' => '20 Mei 2023']
        ]);
    }
    $dlantunan_docs = json_decode($dlantunan_docs_json, true);
    
    if (is_array($dlantunan_docs)) {
        foreach ($dlantunan_docs as $ddoc) {
            $is_dokumen_search = (strtolower(trim($keyword)) === 'dokumen' || strtolower(trim($keyword)) === 'berkas');
            $matches_keyword = (!empty($keyword) && stripos($ddoc['title'], $keyword) !== false);
            
            if ($is_dokumen_search || $matches_keyword) {
                $all_results[] = array(
                    'title' => $ddoc['title'],
                    'url'   => $ddoc['url'],
                    'desc'  => 'Dokumen Terkait Layanan D\'Lantunan',
                    'date'  => isset($ddoc['date']) ? $ddoc['date'] : date_i18n('d F Y'),
                    'cat'   => isset($ddoc['type']) ? $ddoc['type'] : 'File',
                    'icon'  => 'document.png',
                    'badge' => 'D\'LANTUNAN'
                );
            }
        }
    }

    // 1.8 Add Beranda Information Document
    $info_title = get_option('dprd_info_title', '3 Renja Sekretariat DPRD Tahun 2023 Revisi 1');
    $info_url = get_option('dprd_info_file_url', get_template_directory_uri() . '/assets/pdf/DOR.pdf');
    $info_date = get_option('dprd_info_date', '12 Mei 2023');
    
    $is_dokumen_search = (strtolower(trim($keyword)) === 'dokumen' || strtolower(trim($keyword)) === 'berkas');
    $matches_keyword = (!empty($keyword) && stripos($info_title, $keyword) !== false);
    
    if ($is_dokumen_search || $matches_keyword) {
        $all_results[] = array(
            'title' => $info_title,
            'url'   => $info_url,
            'desc'  => 'Informasi Terbaru Sekretariat DPRD',
            'date'  => $info_date,
            'cat'   => 'PDF',
            'icon'  => 'document.png',
            'badge' => 'BERANDA'
        );
    }

    // 2. Add WP Query Results
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        if (in_array(get_the_ID(), $fetched_post_ids)) continue;
        $post_type = get_post_type();
        $icon = 'document.png';
        if ($post_type === 'berita') $icon = 'Berita.png';
        if ($post_type === 'layanan_dlantunan') $icon = 'layanan.png';

        $badge_name = 'HALAMAN';
        if ($post_type === 'layanan_dlantunan') {
            $badge_name = "D'LANTUNAN";
        } elseif ($post_type === 'berita') {
            $badge_name = 'BERITA';
        } elseif ($post_type === 'dokumen') {
            $grup = get_post_meta(get_the_ID(), '_dokumen_grup', true);
            $badge_name = !empty($grup) ? strtoupper($grup) : 'PPID';
        }

        $cat_name = '';
        if ($post_type == 'dokumen') {
           $kat = get_the_terms(get_the_ID(), 'kategori_dokumen');
           if ($kat && !is_wp_error($kat)) {
             $cat_name = $kat[0]->name;
           }
        }
        
        $final_url = get_permalink();
        if ($post_type === 'layanan_dlantunan') {
            $gform = get_post_meta(get_the_ID(), '_dprd_layanan_url', true);
            if (!empty($gform)) {
                $final_url = $gform;
            } else {
                $final_url = home_url('/dlantunan/');
            }
        } elseif ($post_type === 'dokumen') {
            $doc_url = get_post_meta(get_the_ID(), '_dokumen_file_url', true);
            if (!empty($doc_url)) {
                $final_url = $doc_url;
            } else {
                $grup = get_post_meta(get_the_ID(), '_dokumen_grup', true);
                $final_url = (strtolower($grup) === 'sakip') ? home_url('/sakip/') : home_url('/ppid/');
            }
        }

        $all_results[] = array(
          'title' => get_the_title(),
          'url'   => $final_url,
          'desc'  => wp_trim_words( get_the_excerpt(), 20, '...' ),
          'date'  => get_the_date(),
          'cat'   => $cat_name,
          'icon'  => $icon,
          'badge' => $badge_name
        );
      }
    }
    ?>

    <?php if ( !empty($all_results) ) : ?>

      <!-- Hasil Ditemukan -->
      <div class="search-results-list">
        <?php foreach ( $all_results as $res ) : ?>
          <a href="<?php echo esc_url($res['url']); ?>" class="search-result-item" style="display:block; text-decoration:none; color:inherit;">
            <div class="search-result-header">
              <h3><?php echo esc_html($res['title']); ?></h3>
              <?php if ( !empty($res['badge']) ) : ?>
                <span class="search-badge"><?php echo esc_html($res['badge']); ?></span>
              <?php endif; ?>
            </div>
            <p><?php echo esc_html($res['desc']); ?></p>
            <div class="search-result-meta">
              <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tear-Off Calendar.png" alt="Date"><?php echo esc_html($res['date']); ?></span>
              <?php if ( !empty($res['cat']) ) : ?>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kategori.png" alt="Category"><?php echo esc_html($res['cat']); ?></span>
              <?php endif; ?>
            </div>
          </a>
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
