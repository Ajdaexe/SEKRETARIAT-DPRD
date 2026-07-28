<?php
/**
 * Template Name: SAKIP
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="SAKIP" data-subtitle="Sistem Akuntabilitas Kinerja Instansi Pemerintah.">
    <div class="hero-copy">
        <h1>SAKIP</h1>
        <p>Sistem Akuntabilitas Kinerja Instansi Pemerintah.</p>
    </div>
</section>

<section class="stats-strip container reveal">
    <?php
    $stat_dokumen = get_field('stat_dokumen', 'option') ?: '32';
    ?>
    <article><span class="stat-icon">📅</span><div><strong class="stat-counter"><?php echo esc_html($stat_dokumen); ?></strong><small>Dokumen Tahun Ini</small></div></article>
    <article><span class="stat-icon">📑</span><div><strong class="stat-counter">8</strong><small>Kategori</small></div></article>
    <article><span class="stat-icon">🗓️</span><div><strong class="stat-counter"><?php echo date('M Y'); ?></strong><small>Terakhir Diperbarui</small></div></article>
    <article><span class="stat-icon">⬇️</span><div><strong class="stat-counter">1.245</strong><small>Total Unduhan</small></div></article>
</section>

<section class="container section reveal">
    <div class="toolbar">
        <div class="search-box grow">
            <input id="sakipSearch" type="search" placeholder="Cari dokumen SAKIP..."><span>⌕</span>
        </div>
        <select id="sakipCategory">
            <option value="all">Semua kategori</option>
            <option value="renja-skpd">Rencana Kerja</option>
            <option value="perjanjian-kinerja">Perjanjian Kinerja</option>
            <option value="ikm">IKM</option>
            <option value="lkjip">LKJiP</option>
            <option value="laporan-kinerja">Laporan Kinerja</option>
        </select>
    </div>
</section>

<section class="container reveal">
    <?php
    // Get featured document
    $args_featured = array(
        'post_type'      => 'dokumen',
        'posts_per_page' => 1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'kategori_dokumen',
                'field'    => 'slug',
                'terms'    => array('renja-skpd', 'perjanjian-kinerja', 'ikm', 'lkjip', 'laporan-kinerja'),
                'operator' => 'IN',
            ),
        ),
    );
    $query_featured = new WP_Query($args_featured);
    if ($query_featured->have_posts()) :
        $query_featured->the_post();
        $file = get_field('file_dokumen');
        $file_url = $file ? esc_url($file['url']) : '#';
        $tanggal_format = get_field('tanggal_dokumen') ? date('d', strtotime(get_field('tanggal_dokumen'))) : get_the_date('d');
        $bulan_format = get_field('tanggal_dokumen') ? date('M', strtotime(get_field('tanggal_dokumen'))) : get_the_date('M');
        $tahun_format = get_field('tanggal_dokumen') ? date('Y', strtotime(get_field('tanggal_dokumen'))) : get_the_date('Y');
    ?>
    <article class="featured-doc">
        <div class="date-box">
            <b><?php echo esc_html($tanggal_format); ?></b>
            <span><?php echo esc_html($bulan_format); ?></span>
        </div>
        <div>
            <span class="eyebrow">Dokumen Terbaru</span>
            <h2><?php the_title(); ?></h2>
            <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
            <div class="meta">👤 Admin &nbsp; • &nbsp; 📅 <?php echo esc_html($tanggal_format . ' ' . $bulan_format . ' ' . $tahun_format); ?></div>
        </div>
        <a href="<?php echo $file_url; ?>" class="btn btn-primary" target="_blank" rel="noopener">⬇ Unduh</a>
    </article>
    <?php 
    endif;
    wp_reset_postdata(); 
    ?>
</section>

<section class="container section reveal">
    <div class="document-panel">
        <div class="section-heading">
            <div><span class="eyebrow">Arsip</span><h2>Daftar Dokumen</h2></div>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="sakipTable">
                    <?php
                    $args = array(
                        'post_type'      => 'dokumen',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'kategori_dokumen',
                                'field'    => 'slug',
                                'terms'    => array('renja-skpd', 'perjanjian-kinerja', 'ikm', 'lkjip', 'laporan-kinerja'),
                                'operator' => 'IN',
                            ),
                        ),
                    );
                    
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        $i = 1;
                        while ($query->have_posts()) : $query->the_post();
                            $kategori = wp_get_post_terms(get_the_ID(), 'kategori_dokumen');
                            $cat_slug = !empty($kategori) ? $kategori[0]->slug : 'all';
                            $cat_name = !empty($kategori) ? $kategori[0]->name : '-';
                            $file = get_field('file_dokumen');
                            $file_url = $file ? esc_url($file['url']) : '#';
                            $tanggal = get_field('tanggal_dokumen') ?: get_the_date('d M Y');
                    ?>
                        <tr data-category="<?php echo esc_attr($cat_slug); ?>">
                            <td><?php echo $i++; ?></td>
                            <td><strong><?php the_title(); ?></strong></td>
                            <td><span class="badge"><?php echo esc_html($cat_name); ?></span></td>
                            <td><?php echo esc_html($tanggal); ?></td>
                            <td>
                                <a href="<?php echo $file_url; ?>" class="action-btn" target="_blank" rel="noopener">⬇ Unduh</a>
                            </td>
                        </tr>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <tr class="no-results" style="display:none;"><td colspan="5">Dokumen tidak ditemukan.</td></tr>
                        <tr><td colspan="5">Belum ada dokumen SAKIP yang tersedia.</td></tr>
                    <?php endif; ?>
                    <tr class="no-results" style="display:none;"><td colspan="5">Dokumen tidak ditemukan.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php get_footer(); ?>
