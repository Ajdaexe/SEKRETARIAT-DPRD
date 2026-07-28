<?php
/**
 * The template for displaying the front page
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="Selamat Datang di Sekretariat DPRD" data-subtitle="Kabupaten Purbalingga">
    <div class="hero-copy">
        <h1>Selamat Datang di Sekretariat DPRD</h1>
        <p>Kabupaten Purbalingga</p>
    </div>
</section>

<section class="stats-strip container reveal">
    <?php
    $stat_pegawai = get_field('stat_pegawai', 'option') ?: '150+';
    $stat_agenda = get_field('stat_agenda', 'option') ?: '45';
    $stat_dokumen = get_field('stat_dokumen', 'option') ?: '250+';
    $stat_transparan = get_field('stat_transparan', 'option') ?: '100%';
    ?>
    <article><span class="stat-icon">👥</span><div><strong class="stat-counter"><?php echo esc_html($stat_pegawai); ?></strong><small>Anggota & Pegawai</small></div></article>
    <article><span class="stat-icon">📄</span><div><strong class="stat-counter"><?php echo esc_html($stat_agenda); ?></strong><small>Agenda Tahunan</small></div></article>
    <article><span class="stat-icon">📰</span><div><strong class="stat-counter"><?php echo esc_html($stat_dokumen); ?></strong><small>Dokumen Publik</small></div></article>
    <article><span class="stat-icon">🛡️</span><div><strong class="stat-counter"><?php echo esc_html($stat_transparan); ?></strong><small>Pelayanan Transparan</small></div></article>
</section>

<section class="container section-grid two-col reveal">
    <article class="card prose-card">
        <span class="eyebrow">Sekilas Tentang Kami</span>
        <h2>Sekretariat DPRD Kabupaten Purbalingga</h2>
        <p>Sekretariat DPRD memiliki tugas menyelenggarakan administrasi kesekretariatan, administrasi keuangan, mendukung pelaksanaan tugas dan fungsi DPRD, dan menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD sesuai dengan kemampuan keuangan daerah.</p>
        <a class="btn btn-primary" href="<?php echo esc_url(site_url('/profil')); ?>">Baca Selengkapnya</a>
    </article>
    <article class="card media-card">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/video-thumb.jpg'); ?>" alt="Tampilan video profil Sekretariat DPRD" />
        <button class="play-button" aria-label="Putar video" data-modal-open="videoModal">▶</button>
        <div class="media-caption"><strong>Profil Sekretariat DPRD Purbalingga</strong><span>Kenali pelayanan dan fungsi kami</span></div>
    </article>
</section>

<section class="container reveal">
    <div class="survey-card">
        <p>Indeks Kepuasan Masyarakat (IKM)</p>
        <?php
        $ikm_semester = get_field('ikm_semester', 'option') ?: 'Semester I';
        $ikm_tahun = get_field('ikm_tahun', 'option') ?: '2026';
        $ikm_predikat = get_field('ikm_predikat', 'option') ?: 'Sangat Baik';
        $ikm_nilai = get_field('ikm_nilai', 'option') ?: '89.5';
        ?>
        <h2><?php echo esc_html($ikm_nilai); ?></h2>
        <strong>Berdasarkan hasil survei <?php echo esc_html($ikm_semester . ' Tahun ' . $ikm_tahun); ?>: <span><?php echo esc_html(strtoupper($ikm_predikat)); ?></span></strong>
    </div>
</section>

<section class="container section reveal">
    <div class="section-heading">
        <div><span class="eyebrow">Akses Cepat</span><h2>Layanan Utama</h2></div>
    </div>
    <div class="service-grid">
        <a class="service-card" href="<?php echo esc_url(site_url('/profil')); ?>"><span>🏛️</span><h3>Profil</h3><p>Informasi kelembagaan dan struktur organisasi.</p></a>
        <a class="service-card" href="<?php echo esc_url(site_url('/ppid')); ?>"><span>ℹ️</span><h3>PPID</h3><p>Permohonan dan informasi publik.</p></a>
        <a class="service-card" href="<?php echo esc_url(site_url('/sakip')); ?>"><span>📊</span><h3>SAKIP</h3><p>Dokumen akuntabilitas kinerja.</p></a>
        <a class="service-card" href="<?php echo esc_url(site_url('/dlantunan')); ?>"><span>💬</span><h3>D'Lantunan</h3><p>Layanan bantuan dan fasilitasi.</p></a>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="container section reveal">
    <div class="section-heading">
        <div><span class="eyebrow">Informasi Terbaru</span><h2>Kabar Terkini</h2></div>
        <a href="<?php echo esc_url(site_url('/berita')); ?>" class="text-link">Lihat Semua Berita ➔</a>
    </div>
    <div class="service-grid three">
        <?php
        $args = array(
            'post_type'      => 'berita',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
        );
        $query = new WP_Query($args);
        
        if (!$query->have_posts()) {
            $args['post_type'] = 'post';
            $query = new WP_Query($args);
        }
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
            <article class="card">
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin:-30px -30px 20px; overflow:hidden; border-radius:var(--radius) var(--radius) 0 0;">
                        <?php the_post_thumbnail('medium_large', array('style' => 'width:100%; height:180px; object-fit:cover;')); ?>
                    </div>
                <?php endif; ?>
                <div style="font-size:13px; color:var(--muted); margin-bottom:8px;">🗓️ <?php echo get_the_date(); ?></div>
                <h3 style="margin-top:0; font-size:18px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p style="font-size:14px; color:var(--muted); line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden;"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
            </article>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <div style="grid-column: 1/-1; text-align:center; padding: 40px; color:var(--muted);">Belum ada informasi terbaru.</div>
        <?php endif; ?>
    </div>
</section>

<section class="container callout reveal">
    <div><span class="callout-icon">👥</span><div><strong>Butuh Informasi Lebih Lanjut?</strong><small>Kami siap melayani kebutuhan informasi Anda.</small></div></div>
    <a href="<?php echo esc_url(site_url('/kontak')); ?>" class="btn btn-light">Hubungi Kami</a>
</section>

<?php get_footer(); ?>
