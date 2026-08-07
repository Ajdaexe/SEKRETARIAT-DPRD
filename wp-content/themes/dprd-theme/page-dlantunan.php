<?php
/**
 * Template Name: Dlantunan
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<style>
/* ===== HERO SECTION FIGMA 1:1 OVERLAPPING LAYOUT ===== */
.figma-hero-wrapper {
  position: relative !important;
  width: calc(100% - 80px) !important;
  max-width: 1180px !important;
  margin: 30px auto 0 !important;
  height: 440px !important;
  min-height: 440px !important;
  z-index: 2 !important;
  display: block !important;
}

.figma-hero-banner {
  position: absolute !important;
  left: 0 !important;
  top: 0 !important;
  width: 76% !important;
  height: 100% !important;
  border-radius: 24px !important;
  overflow: hidden !important;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
  cursor: pointer !important;
  z-index: 1 !important;
}

.figma-hero-banner img#heroImage {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  object-position: center 60% !important;
  transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1) !important;
}

.figma-hero-banner:hover img#heroImage {
  transform: scale(1.04) !important;
}

.figma-hero-overlay {
  position: absolute !important;
  inset: 0 !important;
  background: linear-gradient(90deg, rgba(0, 0, 0, 0.82) 0%, rgba(0, 0, 0, 0.45) 60%, rgba(0, 0, 0, 0.1) 100%) !important;
  pointer-events: none !important;
  z-index: 2 !important;
}

.figma-hero-text {
  position: absolute !important;
  left: 44px !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  max-width: 440px !important;
  color: #ffffff !important;
  z-index: 3 !important;
}

.figma-hero-text h2 {
  font-size: 42px !important;
  font-weight: 800 !important;
  margin-bottom: 14px !important;
  line-height: 1.15 !important;
  color: #ffffff !important;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4) !important;
}

.figma-hero-text p {
  font-size: 15px !important;
  line-height: 1.65 !important;
  color: rgba(255, 255, 255, 0.95) !important;
  text-shadow: 0 1px 5px rgba(0, 0, 0, 0.4) !important;
}

.figma-welcome-card {
  position: absolute !important;
  right: 0 !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  width: 38% !important;
  max-width: 440px !important;
  min-width: 340px !important;
  background: #ffffff !important;
  border-radius: 20px !important;
  padding: 30px 28px !important;
  box-shadow: 0 16px 40px rgba(0, 0, 0, 0.14), 0 4px 12px rgba(0, 0, 0, 0.06) !important;
  border: 1px solid #ECE8E4 !important;
  z-index: 10 !important;
  transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), 
              box-shadow 0.35s cubic-bezier(0.4, 0, 0.2, 1), 
              border-color 0.35s ease !important;
}

.figma-welcome-card:hover {
  transform: translateY(calc(-50% - 6px)) scale(1.02) !important;
  box-shadow: 0 24px 50px rgba(155, 27, 43, 0.22), 0 8px 24px rgba(0, 0, 0, 0.12) !important;
  border-color: rgba(155, 27, 43, 0.35) !important;
}

.figma-welcome-card .icon-circle.red-bubble {
  width: 44px !important;
  height: 44px !important;
  border-radius: 50% !important;
  background: #9B1B2B !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  margin-bottom: 16px !important;
  box-shadow: 0 4px 14px rgba(155, 27, 43, 0.25) !important;
  transition: transform 0.3s ease, background-color 0.3s ease !important;
}

.figma-welcome-card:hover .icon-circle.red-bubble {
  transform: scale(1.12) !important;
  background: #7D1220 !important;
}

.figma-welcome-card .icon-circle.red-bubble .icon-img {
  width: 22px !important;
  height: 22px !important;
  filter: brightness(0) invert(1) !important;
}

.figma-welcome-card h3 {
  font-size: 21px !important;
  font-weight: 700 !important;
  color: #1A1A1A !important;
  margin-bottom: 14px !important;
  line-height: 1.3 !important;
}

.figma-welcome-card p {
  font-size: 13.5px !important;
  color: #555555 !important;
  line-height: 1.65 !important;
  margin-bottom: 10px !important;
}

.figma-welcome-card p:last-child {
  margin-bottom: 0 !important;
}

@media (max-width: 992px) {
  .figma-hero-wrapper {
    height: auto !important;
    min-height: initial !important;
    display: flex !important;
    flex-direction: column !important;
    width: calc(100% - 40px) !important;
    gap: 20px !important;
  }
  
  .figma-hero-banner {
    position: relative !important;
    width: 100% !important;
    height: 380px !important;
  }
  
  .figma-welcome-card {
    position: relative !important;
    right: auto !important;
    top: auto !important;
    transform: none !important;
    width: 100% !important;
    max-width: 100% !important;
  }
}
</style>

<!-- ===== HERO SECTION (FIGMA 1:1 OVERLAPPING LAYOUT) ===== -->
<div class="figma-hero-wrapper">
  <!-- Banner Gambar Utama di Kiri (76% Width) -->
  <div class="figma-hero-banner" id="heroSection" onclick="openHeroLightbox()">
    <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
    <div class="figma-hero-overlay"></div>
    <div class="figma-hero-text" id="heroText">
      <h2>D'Lantunan</h2>
      <p>Portal Layanan digital dadn aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga untuk permohonan layanan dan kebutuhan administratif secara mudah, cepat, dan transparan.</p>
    </div>
  </div>

  <!-- Card Putih Selamat Datang di Kanan (Position Absolute Right: 0, Width: 38% Overlapping) -->
  <div class="figma-welcome-card">
    <div class="icon-circle red-bubble">
      <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/sms.png" alt="SMS Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/email merah.png';">
    </div>
    <h3>Selamat Datang di D'Lantunan</h3>
    <p>D'Lantunan adalah portal layanan dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga.</p>
    <p>Melalui portal ini, Anda dapat mengajukan berbagai permohonan layanan dengan mudah secara daring.</p>
    <p>Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan akuntabel.</p>
  </div>
</div>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox(event)">
  <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
  <img id="lightboxImg" src="" alt="Zoom Foto">
  <div id="lightboxCaption" style="color:#ffffff; margin-top:10px; font-weight:600; text-align:center;"></div>
</div>

<!-- Modal Video -->
<div class="video-modal" id="videoModal" onclick="closeVideoModal(event)">
  <div class="video-modal-content" onclick="event.stopPropagation()">
    <div class="video-modal-header">
      <h4 id="videoModalTitle">Dokumentasi Video</h4>
      <span class="video-modal-close" onclick="closeVideoModal(event)">&times;</span>
    </div>
    <div class="video-modal-body">
      <iframe id="videoIframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>

<!-- Central Batik Divider -->
<div class="batik-user-divider-container">
  <div class="batik-user-divider-inner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
  </div>
</div>

<div class="container">

<!-- ===== 3 LAYANAN CARDS ===== -->
<section class="layanan-section">
  <div class="wrap layanan-grid" style="padding:0; max-width:none;">

    <!-- Layanan Magang -->
    <div class="card-panel layanan-card">
      <div class="icon-circle">
        <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/tas kerja.svg" alt="Magang Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/user account.png';">
      </div>
      <h3>Layanan<br>Permohonan Magang</h3>
      <p>Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang <span class="arrow-icon">&rsaquo;</span>
      </a>
    </div>

    <!-- Layanan Ijin Penelitian -->
    <div class="card-panel layanan-card">
      <div class="icon-circle">
        <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt="Penelitian Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/document.png';">
      </div>
      <h3>Layanan<br>Permohonan Ijin<br>Penelitian</h3>
      <p>Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang <span class="arrow-icon">&rsaquo;</span>
      </a>
    </div>

    <!-- Layanan Ijin Kunjungan -->
    <div class="card-panel layanan-card">
      <div class="icon-circle">
        <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt="Kunjungan Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/user account.png';">
      </div>
      <h3>Layanan<br>Permohonan Ijin<br>Kunjungan</h3>
      <p>Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang <span class="arrow-icon">&rsaquo;</span>
      </a>
    </div>

  </div>
</section>

<!-- ===== INFORMASI & DOKUMEN TERKAIT + ALUR LAYANAN ===== -->
<section class="mid-info-section">
  <div class="wrap mid-info-grid" style="padding:0; max-width:none;">

    <!-- Kolom Kiri: Informasi & Dokumen Terkait -->
    <div class="card-panel dokumen-card">
      <div class="dokumen-head">
        <div class="dokumen-title-group">
          <div class="head-icon-box">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt="Dokumen" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/document.png';">
          </div>
          <h3>Informasi &amp; Dokumen Terkait</h3>
        </div>
        <a href="<?php echo dprd_get_page_url('ppid'); ?>" class="lihat-semua-link">Lihat Semua</a>
      </div>
      <div class="dokumen-list">
        <div class="dokumen-item">
          <div class="pdf-icon-badge">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf.svg" alt="PDF" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/PDF.png';">
          </div>
          <div class="file-info">
            <span class="file-title">Panduan Penggunaan Portal D'Lantunan</span>
            <span class="file-meta">PDF &bull; 1.8 MB &bull; 20 Mei 2023</span>
          </div>
          <a class="btn-download" href="<?php echo get_template_directory_uri(); ?>/assets/pdf/DOR.pdf" download aria-label="Unduh">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.svg" alt="Unduh" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/unduh.png';">
          </a>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Alur Layanan D'Lantunan -->
    <div class="card-panel alur-card">
      <div class="alur-head">
        <div class="head-icon-box">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/genealogy.svg" alt="Alur Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/kategori.png';">
        </div>
        <div>
          <h3>Alur Layanan D'Lantunan</h3>
          <p>Proses permohonan layanan yang mudah dan terstruktur.</p>
        </div>
      </div>
      <div class="alur-steps-wrapper">
        <div class="alur-connecting-line"></div>
        <div class="alur-steps">
          <div class="alur-step">
            <div class="step-number-bubble">1</div>
            <div class="step-icon-box">
              <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/formulir.svg" alt="Formulir" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/document.png';">
            </div>
            <h4>Isi Formulir</h4>
            <p>Lengkapi formulir permohonan dan unggah dokumen yang diperlukan.</p>
          </div>
          <div class="alur-step">
            <div class="step-number-bubble">2</div>
            <div class="step-icon-box">
              <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/verif.svg" alt="Verifikasi" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/Protect.png';">
            </div>
            <h4>Unggah Dokumen</h4>
            <p>Tim kami akan memverifikasi data dan dokumen yang telah Anda kirimkan.</p>
          </div>
          <div class="alur-step">
            <div class="step-number-bubble">3</div>
            <div class="step-icon-box">
              <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg" alt="Tindak Lanjut" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/user account.png';">
            </div>
            <h4>Tindak Lanjut</h4>
            <p>Permohonan disetujui dan Anda akan menerima informasi selanjutnya.</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ===== SECTION VIDEO ===== -->
<section class="video-section">
  <div class="section-title-wrap">
    <span class="title-pill-tag"></span>
    <h3 class="section-title">Video</h3>
  </div>

  <div class="video-grid">
    <!-- Video Card 1 -->
    <div class="video-card">
      <div class="video-thumbnail" onclick="openVideoModal('https://www.youtube.com/embed/uRZvKm-5YuE', 'Video Rapat Paripurna DPRD')">
        <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80" alt="Video 1">
        <div class="play-btn-circle">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="#9B1B2B">
            <path d="M8 5v14l11-7z"/>
          </svg>
        </div>
      </div>
      <div class="video-desc">
        <h4 class="video-card-title">Video</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada.</p>
      </div>
    </div>

    <!-- Video Card 2 -->
    <div class="video-card">
      <div class="video-thumbnail" onclick="openVideoModal('https://www.youtube.com/embed/uRZvKm-5YuE', 'Video Dokumentasi Layanan DPRD')">
        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80" alt="Video 2">
        <div class="play-btn-circle">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="#9B1B2B">
            <path d="M8 5v14l11-7z"/>
          </svg>
        </div>
      </div>
      <div class="video-desc">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada. Vestibulum rutrum risus id efficitur mattis. Ut scelerisque est auctor, iaculis diam a, hendrerit ante.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== SECTION FOTO DOKUMENTASI ===== -->
<section class="foto-section">
  <div class="section-title-wrap foto-title-wrap">
    <span class="title-pill-tag"></span>
    <h3 class="section-title">Foto Dokumentasi</h3>
  </div>

  <div class="foto-grid">
    <!-- Foto 1 -->
    <div class="foto-card" onclick="openGalleryLightbox(0)">
      <div class="foto-img-wrap">
        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="Foto Dokumentasi 1">
        <div class="foto-hover-overlay">
          <div class="zoom-icon">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Zoom" style="width:20px; height:20px; filter:brightness(0) invert(1);">
          </div>
        </div>
      </div>
    </div>

    <!-- Foto 2 -->
    <div class="foto-card" onclick="openGalleryLightbox(1)">
      <div class="foto-img-wrap">
        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80" alt="Foto Dokumentasi 2">
        <div class="foto-hover-overlay">
          <div class="zoom-icon">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Zoom" style="width:20px; height:20px; filter:brightness(0) invert(1);">
          </div>
        </div>
      </div>
    </div>

    <!-- Foto 3 -->
    <div class="foto-card" onclick="openGalleryLightbox(2)">
      <div class="foto-img-wrap">
        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80" alt="Foto Dokumentasi 3">
        <div class="foto-hover-overlay">
          <div class="zoom-icon">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Zoom" style="width:20px; height:20px; filter:brightness(0) invert(1);">
          </div>
        </div>
      </div>
    </div>

    <!-- Foto 4 -->
    <div class="foto-card" onclick="openGalleryLightbox(3)">
      <div class="foto-img-wrap">
        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80" alt="Foto Dokumentasi 4">
        <div class="foto-hover-overlay">
          <div class="zoom-icon">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Zoom" style="width:20px; height:20px; filter:brightness(0) invert(1);">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>

<!-- ===== CTA BANNER ===== -->
<section class="cta-section">
  <div class="wrap" style="max-width:none;">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="cta-icon-circle">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt="User Account Icon" style="filter:brightness(0) invert(1); width:22px; height:22px;">
        </div>
        <h3>D'Lantunan untuk pelayanan publik yang lebih cepat,</h3>
      </div>
      <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline-white">
        Hubungi Kami <span class="arrow-icon">&rsaquo;</span>
      </a>
    </div>
  </div>
</section>

<?php get_footer(); ?>

