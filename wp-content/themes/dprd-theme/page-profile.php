<?php
/**
 * Template Name: Profile
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<style>
/* ===== HERO ===== */
.hero {
  position: relative;
  width: 100%;
  margin: 0;
  border-radius: 0;
  overflow: hidden;
  height: calc(100vh - 96px);
  min-height: 540px;
  cursor: pointer;
  transition: height 0.2s ease-out;
}

.hero img#heroImage {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 60%;
  transform: scale(1.05);
  transition: transform 0.5s ease;
  z-index: 1;
}

.hero:hover img#heroImage {
  transform: scale(1.1);
}

.hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(0, 0, 0, .65) 0%, rgba(0, 0, 0, .3) 50%, rgba(0, 0, 0, 0) 70%);
  pointer-events: none;
  z-index: 2;
}

.hero-text {
  position: absolute;
  left: 60px;
  bottom: 60px;
  color: #fff;
  max-width: 600px;
  z-index: 3;
}

.hero-text h2 {
  font-size: 44px;
  font-weight: 800;
  margin-bottom: 16px;
  text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

.hero-text p {
  font-size: 16px;
  line-height: 1.6;
  opacity: .95;
  text-shadow: 0 1px 5px rgba(0,0,0,0.4);
}

/* ===== BATIK DIVIDER CENTER SECTION ===== */
.batik-user-divider-container {
  width: 100%;
  max-width: 1180px;
  margin: 0 auto 24px;
  padding: 0 20px;
  position: relative;
  z-index: 3;
  overflow: hidden;
  box-sizing: border-box;
}

.batik-user-divider-inner {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  gap: 12px;
}

.batik-line-img {
  flex: 1 1 0;
  height: 14px;
  object-fit: fill;
  display: block;
}

.batik-img-center {
  height: 80px;
  width: auto;
  object-fit: contain;
  flex-shrink: 0;
  display: block;
}

/* SECTION DIVIDER */
.section-divider {
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% - 80px);
  max-width: 1180px;
  margin: 24px auto;
  position: relative;
  z-index: 10;
}

.section-divider::before,
.section-divider::after {
  content: "";
  flex: 1;
  height: 2px;
  background-color: #d8b4b4;
  margin: 0 15px;
}

.section-divider img {
  max-height: 48px;
  width: auto;
  flex-shrink: 0;
  display: block;
}

/* BACKGROUND BATIK MOTIF PINGGIR KIRI & KANAN */
.batik-desktop-edge {
  position: absolute;
  top: 380px;
  height: 480px;
  width: auto;
  object-fit: contain;
  z-index: 2;
  pointer-events: none;
  opacity: 0.96;
  overflow: visible;
}

.batik-desktop-edge-left {
  left: 0;
}

.batik-desktop-edge-right {
  right: 0;
}

@media (max-width: 980px) {
  .hero {
    height: 380px !important;
    min-height: auto !important;
  }
  .hero-text {
    left: 20px;
    right: 20px;
    bottom: 24px;
    max-width: 100%;
  }
  .hero-text h2 {
    font-size: 28px;
    line-height: 1.2;
    margin-bottom: 8px;
  }
  .hero-text p {
    font-size: 14px;
  }
  .batik-user-divider-container {
    padding: 0 16px;
    margin: 10px auto 20px;
  }
  .batik-img-center {
    height: 50px;
  }
  .fungsi-item {
    order: var(--mobile-order) !important;
    align-items: flex-start !important;
  }
  .fungsi-item .num {
    margin-top: 2px !important;
  }
}
</style>

<!-- ===== HERO ===== -->
<section class="hero" id="heroSection" onclick="openLightbox()">
  <?php 
    $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
    $hero_title = get_option('dprd_hero_profil_title', 'Profil DPRD');
    $hero_desc = get_option('dprd_hero_profil_desc', 'Informasi mengenai Sekretariat DPRD Kabupaten Purbalingga meliputi kedudukan, struktur organisasi, visi misi, tugas pokok dan fungsi serta dasar hukum.');
  ?>
  <img id="heroImage" src="<?php echo esc_url($hero_bg); ?>" alt="Gedung Sekretariat DPRD">
  <div class="hero-text" id="heroText">
    <h2><?php echo esc_html($hero_title); ?></h2>
    <p><?php echo esc_html($hero_desc); ?></p>
  </div>
</section>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImg" src="" alt="Zoom Foto">
</div>

<!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
<div class="batik-user-divider-container">
  <div class="batik-user-divider-inner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
  </div>
</div>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImg" src="" alt="Zoom Foto">
</div>

<div class="container">

<!-- ===== INTRO: SEKRETARIAT DPRD + SEKILAS ===== -->
<section class="intro-section">
  <div class="wrap intro-grid" style="padding:0;">
    <div class="intro-card intro-card-main">
      <div class="icon-badge"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/university.svg" alt="Sekretariat DPRD"></div>
      <h3>Sekretariat DPRD</h3>
      <?php
        $tentang_desc = get_option( 'dprd_tentang_teks', 'Sekretariat DPRD Kabupaten Purbalingga merupakan unsur pelayanan, administrasi dan pendukung pelaksanaan tugas dan fungsi DPRD dalam penyelenggaraan pemerintahan daerah.' );
        $pilar_1_title = get_option('dprd_pilar_1_title', 'Unsur Pelayanan');
        $pilar_1_desc  = get_option('dprd_pilar_1_desc', 'Memberikan dukungan administrasi kepada DPRD');
        $pilar_2_title = get_option('dprd_pilar_2_title', 'Profesional');
        $pilar_2_desc  = get_option('dprd_pilar_2_desc', 'Bekerja secara profesional dan berintegritas');
        $pilar_3_title = get_option('dprd_pilar_3_title', 'Akuntabel');
        $pilar_3_desc  = get_option('dprd_pilar_3_desc', 'Transparan, akuntabel, dan bertanggung jawab');
        $pilar_4_title = get_option('dprd_pilar_4_title', 'Kolaboratif');
        $pilar_4_desc  = get_option('dprd_pilar_4_desc', 'Bersinergi untuk mendukung kinerja DPRD');
      ?>
      <p><?php echo esc_html($tentang_desc); ?></p>
      <div class="value-grid">
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/department.svg" alt="<?php echo esc_attr($pilar_1_title); ?>"></div>
          <div class="content-box">
            <strong><?php echo esc_html($pilar_1_title); ?></strong>
            <span><?php echo esc_html($pilar_1_desc); ?></span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/verif.svg" alt="<?php echo esc_attr($pilar_2_title); ?>"></div>
          <div class="content-box">
            <strong><?php echo esc_html($pilar_2_title); ?></strong>
            <span><?php echo esc_html($pilar_2_desc); ?></span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tebel.svg" alt="<?php echo esc_attr($pilar_3_title); ?>"></div>
          <div class="content-box">
            <strong><?php echo esc_html($pilar_3_title); ?></strong>
            <span><?php echo esc_html($pilar_3_desc); ?></span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img icon-besar" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt="<?php echo esc_attr($pilar_4_title); ?>"></div>
          <div class="content-box">
            <strong><?php echo esc_html($pilar_4_title); ?></strong>
            <span><?php echo esc_html($pilar_4_desc); ?></span>
          </div>
        </div>
      </div>
    </div>

    <div class="intro-card sekilas">
      <h3>Sekilas Sekretariat DPRD</h3>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flag.svg" alt="Kedudukan"></div>
        <div><strong>Kedudukan</strong><span>Unsur pelayanan administrasi DPRD</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/department.svg" alt="Tipe Unit Kerja"></div>
        <div><strong>Tipe Unit Kerja</strong><span>Sekretariat DPRD Kabupaten Purbalingga</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/businessman.svg" alt="Bentuk Organisasi"></div>
        <div><strong>Bentuk Organisasi</strong><span>Perangkat Daerah Kabupaten</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt="Jumlah Bagian"></div>
        <div><strong>Jumlah Bagian</strong><span>3 Bagian Utama</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flag.svg" alt="Kelompok Jabatan Fungsional"></div>
        <div><strong>Jabatan Fungsional</strong><span>Ada / Terstruktur</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== DASAR HUKUM ===== -->
<section class="dasar-hukum">
  <div class="card-panel">
    <h2 class="section-title">Dasar Hukum</h2>
    <?php
      $dasar_hukum = get_option('dprd_dasar_hukum', 'Dasar Peraturan Bupati Purbalingga Nomor 76 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Sekretariat Daerah Kabupaten Purbalingga.');
    ?>
    <p><?php echo esc_html($dasar_hukum); ?></p>
  </div>
</section>

<!-- ===== STRUKTUR ORGANISASI (DINAMIS DARI WP ADMIN) ===== -->
<section class="struktur-organisasi" id="struktur-organisasi">
  <div class="card-panel">
    <h2 class="section-title">Struktur Organisasi</h2>
    <?php 
      $struktur_img  = get_option( 'dprd_struktur_organisasi_img', '' );
      $struktur_desc = get_option( 'dprd_struktur_organisasi_desc', '' );
    ?>
    <?php if ( $struktur_img ) : ?>
      <div class="struktur-box-dynamic" style="text-align:center; margin-top:16px;">
        <a href="<?php echo esc_url( $struktur_img ); ?>" target="_blank" title="Klik untuk memperbesar bagan struktur organisasi" style="display:inline-block; max-width:100%;">
          <img src="<?php echo esc_url( $struktur_img ); ?>" alt="Bagan Struktur Organisasi Sekretariat DPRD" style="max-width:100%; height:auto; border-radius:12px; box-shadow:0 4px 18px rgba(0,0,0,0.06); border:1px solid #ECE8E4; transition:transform 0.3s ease;">
        </a>
        <?php if ( $struktur_desc ) : ?>
          <p style="margin-top:14px; font-size:14px; color:#555555; font-weight:500;"><?php echo esc_html( $struktur_desc ); ?></p>
        <?php endif; ?>
      </div>
    <?php else : ?>
      <div class="struktur-box" style="text-align:center; padding:32px; background:#fafafa; border:2px dashed #e2e8f0; border-radius:12px; color:#64748b;">
        <span class="dashicons dashicons-networking" style="font-size:36px; width:36px; height:36px; color:#cbd5e1; margin-bottom:8px;"></span>
        <p style="font-size:14px; margin-bottom:4px;">Bagan Struktur Organisasi Sekretariat DPRD belum diunggah.</p>
        <small style="color:#94a3b8;">(Dapat diunggah & diperbarui secara langsung melalui <strong>WP Admin &gt; Struktur Organisasi</strong>)</small>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ===== SUSUNAN ORGANISASI ===== -->
<section class="susunan-organisasi susunan-wrap">
  <div class="card-panel">
    <h2 class="section-title">Susunan Organisasi</h2>
    <div class="susunan-list">
      <?php 
        $default_susunan_teks = '<p>A. Sekretaris DPRD.</p>
<p>B. Bagian terdiri dari:</p>
<ul>
  <li>
    1. Bagian Perundang-undangan
    <div class="sub-bagian">
      <ul>
        <li>Subbagian Produk Hukum</li>
        <li>Subbagian Dokumentasi Hukum</li>
      </ul>
    </div>
  </li>
  <li>
    2. Bagian Persidangan
    <div class="sub-bagian">
      <ul>
        <li>Subbagian Rapat</li>
        <li>Subbagian Risalah</li>
      </ul>
    </div>
  </li>
  <li>
    3. Bagian Umum
    <div class="sub-bagian">
      <ul>
        <li>Subbagian Tata Usaha dan Perlengkapan</li>
        <li>Subbagian Keuangan</li>
        <li>Subbagian Humas dan Protokol</li>
      </ul>
    </div>
  </li>
</ul>
<p class="kelompok">C. Kelompok Jabatan Fungsional.</p>';
        echo get_option('dprd_susunan_organisasi_teks', $default_susunan_teks); 
      ?>
    </div>
    <?php 
      $susunan_photo = get_option( 'dprd_susunan_organisasi_photo', 'https://www.purbalinggakab.go.id/wp-content/uploads/2024/08/50-Anggota-DPRD-Purbalingga-Periode-2024-2029-Dilantik-1280x640.jpeg' );
    ?>
    <?php if ( $susunan_photo ) : ?>
      <div class="susunan-photo-wrap">
        <img
          src="<?php echo esc_url( $susunan_photo ); ?>"
          alt="Foto anggota Sekretariat DPRD Kabupaten Purbalingga"
          class="susunan-photo-img"
        >
        <div class="susunan-photo-fade"></div>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ===== VISI MISI ===== -->
<section class="visi-misi" id="visi-misi">
  <div class="card-panel">
    <?php
      $visi_teks = get_option( 'dprd_visi_teks', 'Terwujudnya Optimalisasi Fungsi Substansial dan Administrasi Sekretariat DPRD Kabupaten Purbalingga dalam Mendukung Sinergitas Legislatif dan Eksekutif sebagai Unsur Penyelenggara Pemerintahan Daerah' );
    ?>
    <h2 class="section-title">VISI</h2>
    <p class="lede"><?php echo esc_html($visi_teks); ?></p>

    <h2 class="section-title">MISI</h2>
    <div class="misi-container">
      <?php 
        $count = 1;
        for ($i=1; $i<=5; $i++) :
          $misi_title = get_option('dprd_misi_'.$i.'_title', '');
          $misi_desc = get_option('dprd_misi_'.$i.'_desc', '');
          
          if ($i == 1 && empty($misi_title) && empty($misi_desc)) {
            $misi_title = 'Pilar Demokrasi:';
            $misi_desc = 'Mewujudkan DPRD sebagai salah satu pilar kehidupan demokratis yang berlandaskan Pancasila dan Undang-Undang Dasar 1945.';
          } elseif ($i == 2 && empty($misi_title) && empty($misi_desc)) {
            $misi_title = 'Dukungan Kinerja:';
            $misi_desc = 'Memberikan pelayanan prima dan dukungan administratif serta keahlian yang optimal bagi pelaksanaan tugas kedewanan.';
          } elseif ($i == 3 && empty($misi_title) && empty($misi_desc)) {
            $misi_title = 'Sinergi Pemerintahan:';
            $misi_desc = 'Memperkuat kerja sama yang harmonis antara jajaran legislatif dan eksekutif demi kelancaran pembangunan daerah.';
          }

          if ( !empty($misi_title) || !empty($misi_desc) ) :
      ?>
      <div class="misi-item">
        <div class="num"><?php echo $count; ?></div>
        <div>
          <?php if (!empty($misi_title)) : ?><strong><?php echo esc_html($misi_title); ?></strong> <?php endif; ?>
          <?php echo nl2br(esc_html($misi_desc)); ?>
        </div>
      </div>
      <?php 
          $count++;
          endif; 
        endfor; 
      ?>
    </div>
  </div>
</section>

<!-- ===== TUGAS POKOK DAN FUNGSI ===== -->
<section class="tupoksi" id="tugas-fungsi">
  <div class="card-panel">
    <div class="watermark">
      <img
        src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png"
        alt=""
        aria-hidden="true"
      >
    </div>
    <?php
      $tugas_pokok = get_option('dprd_tugas_pokok', 'Sekretariat DPRD mempunyai tugas pokok melaksanakan pelayanan terhadap DPRD dan tugas administrasi kesekretariatan DPRD serta administrasi keuangan DPRD dalam mendukung kelancaran pelaksanaan tugas dan fungsi DPRD.');
    ?>
    <h2 class="section-title">TUGAS POKOK DAN FUNGSI</h2>
    <p class="lede"><?php echo esc_html($tugas_pokok); ?></p>
    <h4>Sekretariat DPRD mempunyai fungsi :</h4>
    <div class="fungsi-grid">
      <?php 
        $default_fungsi = [
            1 => 'Unsur pelayanan terhadap DPRD.',
            2 => 'Tugas administrasi kesekretariatan DPRD.',
            3 => 'Administrasi keuangan DPRD.',
            4 => 'Mendukung pelaksanaan tugas dan fungsi DPRD.',
            5 => 'Menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD.',
            6 => 'Pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.'
        ];

        // Retrieve existing options or use defaults
        $active_fungsi = [];
        for ($i = 1; $i <= 8; $i++) {
            $fungsi = get_option('dprd_fungsi_'.$i, '');
            if (empty($fungsi) && isset($default_fungsi[$i])) {
                $fungsi = $default_fungsi[$i];
            }
            if (!empty($fungsi)) {
                $active_fungsi[] = [
                    'num' => count($active_fungsi) + 1,
                    'text' => $fungsi
                ];
            }
        }

        // Interleave for a 2-column grid reading downwards
        $total = count($active_fungsi);
        $half = ceil($total / 2);
        
        $ordered_fungsi = [];
        for ($i = 0; $i < $half; $i++) {
            $ordered_fungsi[] = $active_fungsi[$i]; // Left column item
            if ($i + $half < $total) {
                $ordered_fungsi[] = $active_fungsi[$i + $half]; // Right column item
            }
        }

        // Output items
        foreach ($ordered_fungsi as $item) :
      ?>
      <div class="fungsi-item" style="--mobile-order: <?php echo $item['num']; ?>;"><div class="num"><?php echo $item['num']; ?></div><span><?php echo esc_html($item['text']); ?></span></div>
      <?php 
        endforeach; 
      ?>
    </div>
  </div>
</section>

</div>


<script>
  function toggleSearchBox() {
    const box = document.getElementById('searchBoxAnimated');
    box.classList.add('active');
    document.getElementById('globalSearchInput').focus();
  }

  document.addEventListener('click', function (e) {
    const searchContainer = document.querySelector('.search-container');
    const searchBox = document.getElementById('searchBoxAnimated');
    if (searchContainer && searchBox && !searchContainer.contains(e.target)) {
      searchBox.classList.remove('active');
    }
  });

  window.addEventListener('scroll', function() {
    const scrollY = window.scrollY;
    const mainHeader = document.getElementById('mainHeader');
    const heroText = document.getElementById('heroText');
    const heroSection = document.getElementById('heroSection');

    if (mainHeader) {
      if (scrollY > 20) {
        mainHeader.classList.add('scrolled');
      } else {
        mainHeader.classList.remove('scrolled');
      }
    }

    if (heroText) {
      let opacity = 1 - (scrollY / 300);
      if (opacity < 0) opacity = 0;
      heroText.style.opacity = opacity;
      heroText.style.transform = `translateY(${scrollY * 0.3}px)`;
    }
  });

  function openLightbox() {
    const modal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const heroImgSrc = document.getElementById('heroImage').src;
    lightboxImg.src = heroImgSrc;
    modal.classList.add('show');
  }

  function closeLightbox() {
    const modal = document.getElementById('lightboxModal');
    modal.classList.remove('show');
  }

</script>

<?php get_footer(); ?>
