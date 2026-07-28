<?php
/**
 * Template Name: PPID
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="PPID" data-subtitle="Pusat informasi publik Sekretariat DPRD Kabupaten Purbalingga.">
    <div class="hero-copy">
        <h1>PPID</h1>
        <p>Pusat informasi publik Sekretariat DPRD Kabupaten Purbalingga.</p>
    </div>
</section>

<section class="container section reveal">
    <div class="info-band">
        <div>ℹ️</div>
        <div>
            <h2>Informasi</h2>
            <p>PPID menyediakan informasi berkala, serta-merta, tersedia setiap saat, dan layanan permohonan informasi publik.</p>
        </div>
        <div class="info-points">
            <span>Transparansi Informasi</span>
            <span>Klasifikasi Informasi</span>
            <span>Cepat & Tepat</span>
            <span>Pelayanan Akuntabel</span>
        </div>
    </div>
</section>

<section class="container section reveal">
    <div class="service-grid ppid-services">
        <article class="service-card">
            <span>📘</span>
            <h3>Informasi Berkala</h3>
            <p>Informasi yang wajib diumumkan secara rutin.</p>
        </article>
        <article class="service-card">
            <span>⚡</span>
            <h3>Informasi Serta-Merta</h3>
            <p>Informasi yang menyangkut kepentingan luas.</p>
        </article>
        <article class="service-card">
            <span>🔎</span>
            <h3>Informasi Setiap Saat</h3>
            <p>Informasi yang tersedia dan dapat diakses.</p>
        </article>
        <article class="service-card">
            <span>📑</span>
            <h3>Laporan Layanan</h3>
            <p>Rekapitulasi pelayanan informasi publik.</p>
        </article>
    </div>
</section>

<section class="stats-strip container reveal">
    <?php
    $stat_dokumen = get_field('stat_dokumen', 'option') ?: '250+';
    ?>
    <article><span class="stat-icon">📄</span><div><strong class="stat-counter"><?php echo esc_html($stat_dokumen); ?></strong><small>Dokumen Publik</small></div></article>
    <article><span class="stat-icon">👥</span><div><strong class="stat-counter">150+</strong><small>Permohonan</small></div></article>
    <article><span class="stat-icon">🕘</span><div><strong class="stat-counter">100%</strong><small>Tepat Waktu</small></div></article>
    <article><span class="stat-icon">🛡️</span><div><strong class="stat-counter">100%</strong><small>Transparan</small></div></article>
</section>

<section class="container section reveal">
    <div class="document-panel">
        <div class="section-heading">
            <div><span class="eyebrow">Dokumen</span><h2>Informasi Terbaru</h2></div>
            <div class="search-box">
                <input id="ppidSearch" type="search" placeholder="Cari dokumen..."><span>⌕</span>
            </div>
        </div>
        
        <div class="filter-tabs">
            <button class="active" data-filter="all">Semua</button>
            <button data-filter="informasi-berkala">Berkala</button>
            <button data-filter="informasi-setiap-saat">Setiap Saat</button>
            <button data-filter="informasi-serta-merta">Serta-Merta</button>
            <button data-filter="laporan-ppid">Laporan</button>
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
                <tbody id="ppidTable">
                    <?php
                    $args = array(
                        'post_type'      => 'dokumen',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'kategori_dokumen',
                                'field'    => 'slug',
                                'terms'    => array('informasi-berkala', 'informasi-setiap-saat', 'informasi-serta-merta', 'laporan-ppid'),
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
                        <tr><td colspan="5">Belum ada dokumen yang tersedia.</td></tr>
                    <?php endif; ?>
                    <tr class="no-results" style="display:none;"><td colspan="5">Dokumen tidak ditemukan.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="container callout reveal">
    <div><span class="callout-icon">📢</span><div><strong>Butuh Informasi Lain?</strong><small>Ajukan permohonan informasi publik melalui layanan PPID.</small></div></div>
    <a href="<?php echo esc_url(site_url('/kontak')); ?>" class="btn btn-light">Ajukan Permohonan</a>
</section>

<?php get_footer(); ?>
