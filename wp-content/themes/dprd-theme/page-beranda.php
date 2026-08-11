<?php
/**
 * Template Name: Beranda
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<!-- Hero Section -->
  <section class="hero" id="heroSection" onclick="openLightbox()">
    <?php 
      $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
      $hero_title = get_option('dprd_hero_beranda_title', 'Beranda');
      $hero_desc = get_option('dprd_hero_beranda_desc', 'Selamat datang di website resmi Sekretariat DPRD Kabupaten Purbalingga. Kami hadir untuk mendukung keterbukaan informasi dan pelayanan publik.');
    ?>
    <img id="heroImage" src="<?php echo esc_url($hero_bg); ?>"
      alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2><?php echo esc_html($hero_title); ?></h2>
      <p>
        <?php echo esc_html($hero_desc); ?>
      </p>
    </div>
  </section>

  <!-- Modal Lightbox -->
  <div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg" src="" alt="Zoom Foto">
  </div>

  <!-- Kotak Statistik / Overview -->
  <div class="stats" id="statsOverviewGrid">
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt="Pegawai"></div>
      <div>
        <div class="stat-num" id="stat-pegawai">0</div>
        <div class="stat-label"><?php echo esc_html( get_option('dprd_stat_label_pegawai', 'Pegawai Profesional') ); ?></div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/university.png" alt="Agenda"></div>
      <div>
        <div class="stat-num" id="stat-agenda">0</div>
        <div class="stat-label"><?php echo esc_html( get_option('dprd_stat_label_agenda', 'Agenda DPRD Tahun Ini') ); ?></div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt="Dokumen"></div>
      <div>
        <div class="stat-num" id="stat-dokumen">0</div>
        <div class="stat-label"><?php echo esc_html( get_option('dprd_stat_label_dokumen', 'Dokumen Tersedia') ); ?></div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Protect.png" alt="Transparan"></div>
      <div>
        <div class="stat-num" id="stat-transparan">0%</div>
        <div class="stat-label"><?php echo esc_html( get_option('dprd_stat_label_transparan', 'Pelayanan Transparan') ); ?></div>
      </div>
    </div>
  </div>

  <!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
  <div class="batik-user-divider-container">
    <div class="batik-user-divider-inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>

  <div class="content-grid">
    <div class="card about-card">
      <div class="card-tag"><span class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/university.png" alt=""></span> Tentang
        Kami</div>
      <h3>Sekretariat DPRD Kabupaten Purbalingga</h3>
      <div class="divider"></div>
      <p>Untuk mendukung kelancaran pelaksaan tugas dan wewenang DPRD dibentuk Sekretariat DPRD yang susunan organisasi
        dan tata kerjanya ditetapkan dengan perda dan personilnya terdiri atas pegawai negeri sipil.</p>
      <p>Sekretariat DPRD dipimpin oleh seorang Sekretariat DPRD yang diangkat dan diberhentikan dengan keputusan bupati
        atas persetujuan pimpinan DPRD.</p>
      <a href="<?php echo dprd_get_page_url('profile'); ?>"><button class="btn-red">Lebih Lanjut &rarr;</button></a>
    </div>

    <!-- Video Card -->
    <div class="card video-card">
      <div class="card-tag"><span class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Video Call.png" alt=""></span><?php echo esc_html( get_option('dprd_video_title', 'PERSETUJUAN BERSAMA RAPERTA PERTANGGUNGJAWABAN APBD TA 2025 DAN PENYAMPAIAN KUA PPAS TA 2027') ); ?></div>
      <a href="<?php echo esc_url( get_option('dprd_video_url', 'https://youtu.be/uRZvKm-5YuE?si=0XHt5Nl5IPKieJRO') ); ?>" target="_blank" class="video-thumb">
        <img src="<?php echo esc_url( get_option('dprd_video_thumbnail_url', 'https://www.purbalinggakab.go.id/wp-content/uploads/2025/08/DSC00352-1280x640.jpg') ); ?>"
          alt="Rapat Paripurna">
        <div class="youtube-play-btn"></div>
        <div class="youtube-watch-badge">Tonton di <span>YouTube</span></div>
      </a>
      <div class="info-head">
        <span class="card-tag" style="margin-bottom:0;"><span class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png"
              alt=""></span> Informasi Terbaru</span>
        <a href="<?php echo dprd_get_page_url('ppid', 'docCard'); ?>" class="lihat">Lihat Semua &rsaquo;</a>
      </div>
        <div class="info-item" onclick="window.location.href='<?php echo esc_url( get_option('dprd_info_file_url', get_template_directory_uri() . '/assets/pdf/DOR.pdf') ); ?>'">
          <div class="doc-ic">PDF</div>
          <div>
            <div class="doc-title"><?php echo esc_html( get_option('dprd_info_title', '3 Renja Sekretariat DPRD Tahun 2023 Revisi 1') ); ?></div>
            <div class="doc-date"><?php echo esc_html( get_option('dprd_info_date', '12 Mei 2023') ); ?></div>
          </div>
        </div>
    </div>
  </div>

  <!-- HASIL IKM CAROUSEL -->
  <div class="ikm-carousel-wrapper">
    <button id="prevBtn" class="ikm-nav-btn" onclick="prevSurvey()">&#10094;</button>
    <div class="ikm-carousel-overflow">
      <div id="surveyTrack" class="ikm-track">
        <?php
        $default_slides = json_encode([
            ['title' => 'SEMESTER I TAHUN 2026', 'score' => '93.275', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/QR Code.png'],
            ['title' => 'SEMESTER II TAHUN 2025', 'score' => '92.150', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/QR Code.png'],
            ['title' => 'SEMESTER I TAHUN 2025', 'score' => '91.500', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/QR Code.png']
        ]);
        $saved_slides = get_option('dprd_ikm_slides_data', '');
        if (empty($saved_slides) || $saved_slides === '[]' || $saved_slides === 'false') {
            $saved_slides = $default_slides;
        }
        $slides = json_decode($saved_slides, true);
        
        if (is_array($slides)) {
            foreach ($slides as $index => $slide): 
                $title = isset($slide['title']) ? $slide['title'] : '';
                $score = isset($slide['score']) ? $slide['score'] : '';
                $predicate = isset($slide['predicate']) ? $slide['predicate'] : '';
                $grade = isset($slide['grade']) ? $slide['grade'] : '';
                $qr = isset($slide['qr']) && !empty($slide['qr']) ? $slide['qr'] : get_template_directory_uri() . '/assets/images/QR Code.png';
        ?>
        <!-- Slide <?php echo $index + 1; ?> -->
        <div class="survey-card-item <?php if($index == 0) echo 'active'; ?>">
          <div class="ikm-card-new">
            <div class="ikm-top">
              <div class="ikm-top-left">
                <div class="ikm-title">Hasil Survey Indeks Kepuasan Masyarakat<br>Sekretariat DPRD Kabupaten
                  Purbalingga<strong><?php echo esc_html($title); ?></strong></div>
                <div class="ikm-score"><?php echo esc_html($score); ?></div>
                <div class="ikm-skala">Skala : 0 - 100</div>
              </div>
              <div class="ikm-top-right">
                <div class="badge-container">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge.png" alt="Badge IKM" class="ikm-badge">
                  <span class="badge-grade"><?php echo esc_html($grade); ?></span>
                  <svg viewBox="0 0 180 180" class="badge-svg-text">
                    <path id="curve-<?php echo $index; ?>" d="M 20,144 Q 95,120 170,144" fill="transparent" />
                    <text width="180">
                      <textPath href="#curve-<?php echo $index; ?>" startOffset="50%" text-anchor="middle">
                        <?php echo esc_html($predicate); ?>
                      </textPath>
                    </text>
                  </svg>
                </div>
              </div>
            </div>
            <div class="ikm-bottom">
              <div class="ikm-bottom-left">
                <img src="<?php echo esc_url($qr); ?>" alt="QR Code" class="ikm-qr">
              </div>
              <div class="ikm-bottom-right">
                <div class="ikm-bottom-text">
                  <h4>Berikan Penilaian Anda</h4>
                  <p>Scan QR code di samping untuk mengisi Survey Kepuasan Masyarakat.<br>Masukan Anda sangat berarti demi peningkatan kualitas layanan kami.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
            endforeach; 
        }
        ?>

      </div>
    </div>
    <button id="nextBtn" class="ikm-nav-btn" onclick="nextSurvey()">&#10095;</button>
  </div>

  <!-- REELS SECTION -->
  <h3 class="quick-title">Reels</h3>
  <div class="reels-grid-container" style="max-width: 1200px; margin: 0 auto 50px auto; padding: 0 20px;">
    <div class="reels-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
    <?php
    $default_reels = json_encode([
        ['title' => 'Kegiatan Kunjungan', 'thumb' => 'https://via.placeholder.com/270x480.png?text=Reel+1', 'url' => '#'],
        ['title' => 'Rapat Paripurna', 'thumb' => 'https://via.placeholder.com/270x480.png?text=Reel+2', 'url' => '#']
    ]);
    $saved_reels = get_option('dprd_reels_data', '');
    if (empty($saved_reels) || $saved_reels === '[]' || $saved_reels === 'false') {
        $saved_reels = $default_reels;
    }
    $reels = json_decode($saved_reels, true);
    if(is_array($reels)):
        foreach($reels as $reel):
            $title = isset($reel['title']) ? $reel['title'] : '';
            $thumb = isset($reel['thumb']) && !empty($reel['thumb']) ? $reel['thumb'] : 'https://via.placeholder.com/270x480.png?text=Reel';
            $url = isset($reel['url']) ? $reel['url'] : '#';
    ?>
        <a href="<?php echo esc_url($url); ?>" target="_blank" class="reel-item" style="position: relative; display: block; border-radius: 12px; overflow: hidden; aspect-ratio: 9/16; background: #000; text-decoration: none; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8; transition: transform 0.3s ease;">
            <!-- Play Icon overlay -->
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 40px; height: 40px; background: rgba(255,255,255,0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="white"><path d="M8 5v14l11-7z"/></svg>
            </div>
            <div style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 30px 12px 12px; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: #fff; font-size: 14px; font-weight: 600; line-height: 1.3;">
                <?php echo esc_html($title); ?>
            </div>
        </a>
    <?php 
        endforeach;
    endif; 
    ?>
    </div>
    <style>
        .reel-item:hover img { transform: scale(1.05); }
    </style>
  </div>

  <!-- QUICK ACCESS -->
  <h3 class="quick-title">Akses Cepat Layanan</h3>
  <div class="quick-grid">
    <div class="quick-card c1" onclick="window.location.href='<?php echo home_url('/profile'); ?>'">
      <div class="quick-card-top">
        <div class="quick-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" style="filter: brightness(0) saturate(100%) invert(24%) sepia(51%) saturate(2331%) hue-rotate(345deg) brightness(98%) contrast(92%);" alt=""></div>
        <h5>Profil</h5>
      </div>
      <p>Informasi profil dan struktur organisasi Sekretariat DPRD.</p>
      <div class="quick-arrow arrow-c1">&rarr;</div>
    </div>
    <div class="quick-card c2" onclick="window.location.href='<?php echo home_url('/ppid'); ?>'">
      <div class="quick-card-top">
        <div class="quick-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Protect.png" style="filter: brightness(0) saturate(100%) invert(29%) sepia(87%) saturate(1478%) hue-rotate(192deg) brightness(96%) contrast(100%);" alt=""></div>
        <h5>PPID</h5>
      </div>
      <p>Akses informasi publik secara transparan.</p>
      <div class="quick-arrow arrow-c2">&rarr;</div>
    </div>
    <div class="quick-card c3" onclick="window.location.href='<?php echo home_url('/sakip'); ?>'">
      <div class="quick-card-top">
        <div class="quick-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Combo Chart.png" style="filter: brightness(0) saturate(100%) invert(43%) sepia(21%) saturate(1443%) hue-rotate(97deg) brightness(93%) contrast(91%);" alt=""></div>
        <h5>Sakip</h5>
      </div>
      <p>Sistem Akuntabilitas Kinerja Instansi Pemerintah.</p>
      <div class="quick-arrow arrow-c3">&rarr;</div>
    </div>
    <div class="quick-card c4" onclick="window.location.href='<?php echo home_url('/dlantunan'); ?>'">
      <div class="quick-card-top">
        <div class="quick-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Musical Note.png" style="filter: brightness(0) saturate(100%) invert(35%) sepia(26%) saturate(1636%) hue-rotate(248deg) brightness(90%) contrast(87%);" alt=""></div>
        <h5>D'Lantunan</h5>
      </div>
      <p>Portal aspirasi dan pengaduan masyarakat.</p>
      <div class="quick-arrow arrow-c4">&rarr;</div>
    </div>
  </div>

  <!-- CTA BANNER (Gaya Kontak) -->
  <section class="cta-section">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt=""></div>
        <h3><?php echo wp_kses_post( get_option('dprd_cta_text_beranda', 'Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat') ); ?></h3>
      </div>
      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank" rel="noopener noreferrer" class="btn-outline">
        Hubungi Kami
      </a>
    </div>
  </section>



<?php get_footer(); ?>


