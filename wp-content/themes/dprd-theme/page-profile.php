<?php
/**
 * Template Name: Profile
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<style>
/* ===== HERO (DISAMAKAN PERSIS SEPERTI HALAMAN KONTAK) ===== */
.hero {
  position: relative !important;
  width: 100% !important;
  margin-top: 96px !important;
  margin-bottom: 0 !important;
  border-radius: 0 !important;
  overflow: hidden !important;
  height: calc(100vh - 96px) !important;
  min-height: 540px !important;
  cursor: pointer !important;
  box-shadow: none !important;
  transition: height 0.2s ease-out, box-shadow 0.3s ease-in-out !important;
}

.hero:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
}

.hero img#heroImage {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  object-position: center 60% !important;
  transform: scale(1.05) !important;
  transition: transform 0.5s ease !important;
}

.hero:hover img#heroImage {
  transform: scale(1.1) !important;
}

.hero::after {
  content: '' !important;
  position: absolute !important;
  inset: 0 !important;
  background: linear-gradient(90deg, rgba(0, 0, 0, .65) 0%, rgba(0, 0, 0, .3) 50%, rgba(0, 0, 0, 0) 70%) !important;
}

.hero-text {
  position: absolute !important;
  left: 60px !important;
  bottom: 60px !important;
  color: #fff !important;
  max-width: 600px !important;
  z-index: 2 !important;
}

.hero-text h2 {
  font-size: 44px !important;
  font-weight: 800 !important;
  margin-bottom: 16px !important;
  text-shadow: 0 2px 8px rgba(0,0,0,0.4) !important;
}

.hero-text p {
  font-size: 16px !important;
  line-height: 1.6 !important;
  opacity: .95 !important;
  text-shadow: 0 1px 5px rgba(0,0,0,0.4) !important;
}

/* ===== BATIK DIVIDER CENTER SECTION (DISAMAKAN PERSIS SEPERTI HALAMAN KONTAK) ===== */
.batik-user-divider-container {
  width: calc(100% - 80px) !important;
  max-width: 1180px !important;
  margin: 24px auto !important;
  padding: 0 !important;
  position: relative !important;
  z-index: 3 !important;
  overflow: visible !important;
}

.batik-user-divider-inner {
  display: flex !important;
  align-items: center !important;
  justify-content: space-between !important;
  width: 100% !important;
  gap: 12px !important;
  padding: 0 4px !important;
}

.batik-line-img {
  flex-grow: 1 !important;
  height: 14px !important;
  width: 100% !important;
  object-fit: fill !important;
  display: block !important;
}

.batik-img-center {
  height: 80px !important;
  width: auto !important;
  object-fit: contain !important;
  flex-shrink: 0 !important;
  display: block !important;
}

/* SECTION DIVIDER (UNIFIED FLEXBOX WITH PSEUDO LINES) */
.section-divider {
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: calc(100% - 80px) !important;
  max-width: 1180px !important;
  margin: 24px auto !important;
  position: relative !important;
  z-index: 10 !important;
}

.section-divider::before,
.section-divider::after {
  content: "" !important;
  flex: 1 !important;
  height: 2px !important;
  background-color: #d8b4b4 !important;
  margin: 0 15px !important;
}

.section-divider img {
  max-height: 48px !important;
  width: auto !important;
  flex-shrink: 0 !important;
  display: block !important;
}

/* BACKGROUND BATIK MOTIF PINGGIR KIRI & KANAN (TOP: 380PX - TITIK TENGAH IDEAL SISI RUANG KOSONG) */
.batik-desktop-edge {
  position: absolute !important;
  top: 380px !important;
  height: 480px !important;
  width: auto !important;
  object-fit: contain !important;
  z-index: 2 !important;
  pointer-events: none !important;
  opacity: 0.96 !important;
  overflow: visible !important;
}

.batik-desktop-edge-left {
  left: 0 !important;
}

.batik-desktop-edge-right {
  right: 0 !important;
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
      <p>Sekretariat DPRD Kabupaten Purbalingga merupakan unsur pelayanan, administrasi dan pendukung pelaksanaan tugas dan fungsi DPRD dalam penyelenggaraan pemerintahan daerah.</p>
      <div class="value-grid">
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/department.svg" alt="Unsur Pelayanan"></div>
          <div class="content-box">
            <strong>Unsur Pelayanan</strong>
            <span>Memberikan dukungan administrasi kepada DPRD</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/verif.svg" alt="Profesional"></div>
          <div class="content-box">
            <strong>Profesional</strong>
            <span>Bekerja secara profesional dan berintegritas</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tebel.svg" alt="Akuntabel"></div>
          <div class="content-box">
            <strong>Akuntabel</strong>
            <span>Transparan, akuntabel, dan bertanggung jawab</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img icon-besar" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt="Kolaboratif"></div>
          <div class="content-box">
            <strong>Kolaboratif</strong>
            <span>Bersinergi untuk mendukung kinerja DPRD</span>
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
    <p>Dasar Peraturan Bupati Purbalingga Nomor 76 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Sekretariat Daerah Kabupaten Purbalingga.</p>
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
      <p>A. Sekretaris DPRD.</p>
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
      <p class="kelompok">C. Kelompok Jabatan Fungsional.</p>
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
    <h2 class="section-title">VISI</h2>
    <p class="lede">Terwujudnya Optimalisasi Fungsi Substansial dan Administrasi Sekretariat DPRD Kabupaten Purbalingga dalam Mendukung Sinergitas Legislatif dan Eksekutif sebagai Unsur Penyelenggara Pemerintahan Daerah</p>

    <h2 class="section-title">MISI</h2>
    <div class="misi-container">
      <div class="misi-item">
        <div class="num">1</div>
        <div><strong>Pilar Demokrasi:</strong> Mewujudkan DPRD sebagai salah satu pilar kehidupan demokratis yang berlandaskan Pancasila dan Undang-Undang Dasar 1945.</div>
      </div>
      <div class="misi-item">
        <div class="num">2</div>
        <div><strong>Dukungan Kinerja:</strong> Memberikan pelayanan prima dan dukungan administratif serta keahlian yang optimal bagi pelaksanaan tugas kedewanan.</div>
      </div>
      <div class="misi-item">
        <div class="num">3</div>
        <div><strong>Sinergi Pemerintahan:</strong> Memperkuat kerja sama yang harmonis antara jajaran legislatif dan eksekutif demi kelancaran pembangunan daerah.</div>
      </div>
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
    <h2 class="section-title">TUGAS POKOK DAN FUNGSI</h2>
    <p class="lede">Sekretariat DPRD mempunyai tugas pokok melaksanakan pelayanan terhadap DPRD dan tugas administrasi kesekretariatan DPRD serta administrasi keuangan DPRD dalam mendukung kelancaran pelaksanaan tugas dan fungsi DPRD.</p>
    <h4>Sekretariat DPRD mempunyai fungsi :</h4>
    <div class="fungsi-grid">
      <div class="fungsi-item"><div class="num">1</div><span>Unsur pelayanan terhadap DPRD.</span></div>
      <div class="fungsi-item"><div class="num">4</div><span>Mendukung pelaksanaan tugas dan fungsi DPRD.</span></div>
      <div class="fungsi-item"><div class="num">2</div><span>Tugas administrasi kesekretariatan DPRD.</span></div>
      <div class="fungsi-item"><div class="num">5</div><span>Menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD.</span></div>
      <div class="fungsi-item"><div class="num">3</div><span>Administrasi keuangan DPRD.</span></div>
      <div class="fungsi-item"><div class="num">6</div><span>Pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.</span></div>
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
