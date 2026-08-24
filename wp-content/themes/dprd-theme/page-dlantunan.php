<?php
/**
 * Template Name: Dlantunan
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
  box-shadow: none;
  transition: height 0.2s ease-out, box-shadow 0.3s ease-in-out;
}

.hero:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.hero img#heroImage {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center 60%;
  transform: scale(1.05);
  transition: transform 0.5s ease;
}

.hero:hover img#heroImage {
  transform: scale(1.1);
}

.hero-overlay-dlantunan {
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.15) 100%);
  z-index: 1;
  pointer-events: none;
}

.hero-text-left {
  position: absolute;
  left: 60px;
  bottom: 60px;
  max-width: 480px;
  color: #ffffff;
  pointer-events: auto;
  z-index: 3;
}

.hero-text-left h2 {
  font-size: 44px;
  font-weight: 800;
  margin-bottom: 16px;
  line-height: 1.1;
  color: #ffffff;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
}

.hero-text-left p {
  font-size: 15px;
  line-height: 1.65;
  color: rgba(255, 255, 255, 0.95);
  text-shadow: 0 1px 5px rgba(0, 0, 0, 0.4);
}

.figma-welcome-card {
  pointer-events: auto;
  position: absolute;
  right: 40px;
  top: 50%;
  transform: translateY(-50%);
  z-index: 3;
  width: 390px;
  max-width: 100%;
  background: #ffffff;
  border-radius: 20px;
  padding: 26px;
  box-shadow: 0 16px 40px rgba(0, 0, 0, 0.18);
  border: 1px solid rgba(255, 255, 255, 0.6);
  flex-shrink: 0;
  cursor: pointer;
  transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.figma-welcome-card:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  transform: translateY(calc(-50% - 4px));
}

.card-header-row {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  margin-bottom: 16px;
}

.card-icon-bubble {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: #FCE8E8;
  color: #A5182B;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform 0.35s ease, background-color 0.3s ease, color 0.3s ease;
}

.card-icon-bubble svg {
  transition: fill 0.3s ease;
}

.figma-welcome-card:hover .card-icon-bubble {
  transform: scale(1.12) rotate(-5deg);
  background: #A5182B;
  color: #ffffff;
}

.figma-welcome-card:hover .card-icon-bubble svg {
  fill: #ffffff;
}

.card-header-row h3 {
  font-size: 20px;
  font-weight: 700;
  color: #111111;
  line-height: 1.25;
  margin: 0;
}

.figma-welcome-card p {
  font-size: 13px;
  color: #666666;
  line-height: 1.6;
  margin-bottom: 12px;
}

.figma-welcome-card p:last-child {
  margin-bottom: 0;
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
    height: auto !important;
    min-height: auto !important;
    display: flex !important;
    flex-direction: column !important;
    padding: 20px 20px 32px !important;
    box-sizing: border-box !important;
  }
  .hero img#heroImage {
    position: absolute !important;
    inset: 0 !important;
    z-index: 0 !important;
  }
  .hero-overlay-dlantunan {
    z-index: 1 !important;
  }
  .hero-text-left {
    position: relative !important;
    left: 0 !important;
    bottom: 0 !important;
    max-width: 100% !important;
    margin-bottom: 0 !important;
    margin-top: 12px !important;
    z-index: 3 !important;
    order: 2 !important;
  }
  .hero-text-left h2 {
    font-size: 26px !important;
    line-height: 1.2 !important;
    margin-bottom: 8px !important;
  }
  .hero-text-left p {
    font-size: 13.5px !important;
  }
}
@media (max-width: 600px) {
  .hero-text-left h2 {
    font-size: 24px !important;
  }
  .hero-text-left p {
    font-size: 13px !important;
  }
  .figma-welcome-card {
    position: relative !important;
    right: 0 !important;
    top: 0 !important;
    transform: none !important;
    width: 100% !important;
    z-index: 3 !important;
    padding: 16px !important;
    order: 1 !important;
  }
  .card-header-row {
    margin-bottom: 8px !important;
  }
  .card-header-row h3 {
    font-size: 15px !important;
  }
  .card-icon-bubble {
    width: 32px !important;
    height: 32px !important;
  }
  .card-icon-bubble svg {
    width: 16px !important;
    height: 16px !important;
  }
  .figma-welcome-card p {
    font-size: 12px !important;
    line-height: 1.35 !important;
    margin-bottom: 6px !important;
  }
  .batik-user-divider-container {
    padding: 0 16px !important;
    margin: 10px auto 20px !important;
  }
  .batik-img-center {
    height: 50px !important;
  }
  .batik-desktop-edge {
    top: 310px !important;
  }

  /* GRID AND OVERFLOW FIXES */
  .layanan-grid,
  .video-grid {
    grid-template-columns: 1fr !important;
    gap: 16px !important;
  }
  .foto-grid {
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 12px !important;
  }
  .dokumen-card,
  .alur-card,
  .layanan-card {
    padding: 16px !important;
    box-sizing: border-box !important;
  }
  
  .dokumen-list {
    max-height: 250px !important;
    padding-right: 4px !important;
  }
  
  .dokumen-item {
    padding: 10px 12px !important;
    gap: 10px !important;
    box-sizing: border-box !important;
    width: 100% !important;
  }
}

@media (max-width: 767px) {
  .mid-info-grid {
    grid-template-columns: 1fr !important;
  }
  
  /* TUKAR POSISI CARD INFO DAN ALUR DI MOBILE */
  .dokumen-card {
    order: 2 !important;
  }
  .alur-card {
    order: 1 !important;
  }
}

@media (max-width: 980px) {
  .pdf-icon-badge {
    width: 32px !important;
    height: 32px !important;
  }
  .file-info {
    min-width: 0 !important; /* ensures truncation works */
  }
  .file-title {
    font-size: 12px !important;
  }
  .file-meta {
    font-size: 10.5px !important;
  }
  .btn-download {
    width: 30px !important;
    height: 30px !important;
  }
  .btn-download img {
    width: 16px !important;
    height: 16px !important;
  }
  
  /* ALUR LAYANAN FIX - JADIKAN GRID */
  .alur-step {
    display: grid !important;
    grid-template-columns: auto auto 1fr !important;
    grid-template-rows: auto auto !important;
    column-gap: 14px !important;
    row-gap: 6px !important;
    text-align: left !important;
    align-items: center !important;
    padding-bottom: 16px !important;
    border-bottom: 1px solid #f0f0f0 !important;
  }
  .alur-step:last-child {
    border-bottom: none !important;
    padding-bottom: 0 !important;
  }
  .step-number-bubble {
    grid-column: 1 !important;
    grid-row: 1 !important;
    margin: 0 !important;
  }
  .step-icon-box {
    grid-column: 2 !important;
    grid-row: 1 !important;
    margin: 0 !important;
  }
  .alur-step h4 {
    grid-column: 3 !important;
    grid-row: 1 !important;
    margin: 0 !important;
  }
  .alur-step p {
    grid-column: 2 / 4 !important;
    grid-row: 2 !important;
    margin: 0 !important;
  }
}
</style>

<!-- ===== HERO SECTION (FULL-WIDTH DISAMAKAN PERSIS DENGAN PROFIL) ===== -->
<section class="hero" id="heroSection" onclick="openHeroLightbox()">
  <?php 
    $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
    $hero_title = get_option('dprd_hero_dlantunan_title', 'D\'Lantunan');
    $hero_desc = get_option('dprd_hero_dlantunan_desc', 'Portal Layanan digital dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga untuk permohonan layanan dan kebutuhan administratif secara mudah, cepat, dan transparan.');
  ?>
  <img id="heroImage" src="<?php echo esc_url($hero_bg); ?>" alt="Gedung Sekretariat DPRD Purbalingga">
  <div class="hero-overlay-dlantunan"></div>

  <!-- Left Side: Title & Description (Directly at left: 40px; bottom: 50px; like Profil) -->
  <div class="hero-text-left" id="heroText">
    <h2><?php echo esc_html($hero_title); ?></h2>
    <p><?php echo esc_html($hero_desc); ?></p>
  </div>

  <!-- Right Side: Floating White Welcome Card -->
  <div class="figma-welcome-card" onclick="event.stopPropagation();">
    <div class="card-header-row">
      <div class="card-icon-bubble">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="#A5182B">
          <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-11 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm4 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm4 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
        </svg>
      </div>
      <?php
      $welcome_title_raw = get_option('dprd_dlantunan_welcome_title', "Selamat Datang di\nD'Lantunan");
      $welcome_title_clean = str_replace(array('<br>', '<br/>', '<br />'), "\n", $welcome_title_raw);
      ?>
      <h3><?php echo wp_kses_post( nl2br($welcome_title_clean) ); ?></h3>
    </div>
    <?php
    $default_welcome = "<p>D'Lantunan adalah portal layanan dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga.</p>\n<p>Melalui portal ini, Anda dapat mengajukan berbagai permohonan layanan dengan mudah secara daring.</p>\n<p>Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan akuntabel.</p>";
    echo wp_kses_post( wpautop( get_option('dprd_dlantunan_welcome_text', $default_welcome) ) );
    ?>
  </div>
</section>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox(event)">
  <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
  <div class="lightbox-content" onclick="event.stopPropagation()">
    <img id="lightboxImg" src="" alt="Zoom Foto">
    <div id="lightboxCaption" class="lightbox-caption" style="color:#ffffff; margin-top:10px; font-weight:600; text-align:center;"></div>
  </div>
</div>

<!-- Modal Video -->
<div class="video-modal" id="videoModal" onclick="closeVideoModal(event)">
  <div class="video-modal-content" onclick="event.stopPropagation()">
    <div class="video-modal-header">
      <h4 id="videoModalTitle">Dokumentasi Video</h4>
      <span class="video-modal-close" onclick="closeVideoModal(event)">&times;</span>
    </div>
    <div class="video-modal-body">
      <iframe id="videoIframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%; height:100%;"></iframe>
      <video id="videoPlayer" controls style="display:none; width:100%; height:100%; border-radius: 0 0 16px 16px;">
          <source src="" type="video/mp4">
          Browser Anda tidak mendukung tag video.
      </video>
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
    
    <?php
    $icons = array('tas kerja.svg', 'document.svg', 'user account.svg');
    $icons_fallback = array('user account.png', 'document.png', 'user account.png');
    
    $defaults = array(
        1 => array('title' => "Layanan\nPermohonan Magang", 'desc' => 'Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform'),
        2 => array('title' => "Layanan\nPermohonan Ijin\nPenelitian", 'desc' => 'Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform'),
        3 => array('title' => "Layanan\nPermohonan Ijin\nKunjungan", 'desc' => 'Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform')
    );

    for ($i = 1; $i <= 3; $i++) {
        $icon = isset($icons[$i-1]) ? $icons[$i-1] : 'document.svg';
        $fallback = isset($icons_fallback[$i-1]) ? $icons_fallback[$i-1] : 'document.png';
        
        $raw_title = get_option('dprd_layanan'.$i.'_title', $defaults[$i]['title']);
        $clean_title = str_replace(array('<br>', '<br/>', '<br />'), "\n", $raw_title);
        $desc = get_option('dprd_layanan'.$i.'_desc', $defaults[$i]['desc']);
        $url = get_option('dprd_layanan'.$i.'_link', $defaults[$i]['link']);
        if ( empty($url) ) $url = '#';
        ?>
        <div class="card-panel layanan-card">
          <div class="icon-circle">
            <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $icon; ?>" alt="<?php echo esc_attr( wp_strip_all_tags($clean_title) ); ?> Icon" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $fallback; ?>';">
          </div>
          <h3><?php echo wp_kses_post( nl2br($clean_title) ); ?></h3>
          <div style="font-size: 14px; line-height: 1.6; color: #555; margin-bottom: 24px; flex-grow: 1;">
            <?php echo wp_kses_post( wpautop( $desc ) ); ?>
          </div>
          <a class="btn-ajukan" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
            Ajukan Permohonan <span class="arrow-icon">&rsaquo;</span>
          </a>
        </div>
        <?php
    }
    ?>

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
      </div>
      <div class="dokumen-list" style="max-height: 300px; overflow-y: auto; padding-right: 10px;">
        <?php
        $default_docs = json_encode([
            ['title' => 'Panduan Penggunaan Portal D\'Lantunan', 'url' => get_template_directory_uri() . '/assets/pdf/DOR.pdf', 'type' => 'PDF', 'date' => '20 Mei 2023']
        ]);
        $saved_docs = get_option('dprd_dlantunan_docs_data', '');
        if (empty($saved_docs) || $saved_docs === '[]' || $saved_docs === 'false') {
            $saved_docs = $default_docs;
        }
        $docs_data = json_decode($saved_docs, true);
        
        if (is_array($docs_data) && !empty($docs_data)) {
            foreach ($docs_data as $doc) {
                $raw_type = strtoupper(isset($doc['type']) ? $doc['type'] : 'FILE');
                $display_type = $raw_type;
                $icon_name = 'pdf.svg';
                
                if (strpos($raw_type, 'DOC') !== false || strpos($raw_type, 'WORD') !== false) {
                    $icon_name = 'document.svg';
                    $display_type = 'DOCX';
                } elseif (strpos($raw_type, 'XLS') !== false || strpos($raw_type, 'SPREADSHEET') !== false) {
                    $icon_name = 'document.svg';
                    $display_type = 'XLSX';
                } elseif (strpos($raw_type, 'PPT') !== false || strpos($raw_type, 'PRESENTATION') !== false) {
                    $icon_name = 'document.svg';
                    $display_type = 'PPTX';
                } elseif (strpos($raw_type, 'PDF') !== false) {
                    $icon_name = 'pdf.svg';
                    $display_type = 'PDF';
                } elseif (strlen($raw_type) > 10) {
                    $display_type = 'FILE';
                }
                ?>
                <div class="dokumen-item">
                  <div class="pdf-icon-badge">
                    <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $icon_name; ?>" alt="<?php echo esc_attr($display_type); ?>" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/PDF.png';">
                  </div>
                  <div class="file-info">
                    <span class="file-title"><?php echo esc_html($doc['title']); ?></span>
                    <span class="file-meta"><?php echo esc_html($display_type); ?> &bull; <?php echo esc_html($doc['date']); ?></span>
                  </div>
                  <a class="btn-download" href="<?php echo esc_url($doc['url']); ?>" download aria-label="Unduh" target="_blank" rel="noopener">
                    <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.svg" alt="Unduh" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/unduh.png';">
                  </a>
                </div>
                <?php
            }
        }
        ?>
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
    <h3 class="section-title">Video</h3>
  </div>

  <div class="video-grid">
    <?php
    $default_vids = json_encode([
        ['title' => 'Video', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada.', 'url' => 'https://www.youtube.com/embed/uRZvKm-5YuE', 'thumb' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Video', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada. Vestibulum rutrum risus id efficitur mattis.', 'url' => 'https://www.youtube.com/embed/uRZvKm-5YuE', 'thumb' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80']
    ]);
    $saved_vids = get_option('dprd_dlantunan_video_data', '');
    if (empty($saved_vids) || $saved_vids === '[]' || $saved_vids === 'false') {
        $saved_vids = $default_vids;
    }
    $vids_data = json_decode($saved_vids, true);
    
    if (is_array($vids_data) && !empty($vids_data)) {
        foreach ($vids_data as $vid) {
            $vid_url = isset($vid['url']) ? $vid['url'] : '';
            $js_vid_url = ($vid_url === '-') ? '-' : esc_url($vid_url);
            $vid_mp4 = isset($vid['mp4']) ? esc_url($vid['mp4']) : '';
            ?>
            <div class="video-card">
              <div class="video-thumbnail" onclick="openVideoModal('<?php echo esc_js($js_vid_url); ?>', '<?php echo esc_js(esc_attr($vid['title'])); ?>', '<?php echo esc_js($vid_mp4); ?>')">
                <img src="<?php echo esc_url($vid['thumb']); ?>" alt="<?php echo esc_attr($vid['title']); ?>" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80';">
                <div class="play-btn-circle">
                  <svg viewBox="0 0 24 24" width="22" height="22" fill="#9B1B2B">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </div>
              </div>
              <div class="video-desc">
                <?php if (!empty($vid['title'])) : ?>
                  <h4 class="video-card-title"><?php echo esc_html($vid['title']); ?></h4>
                <?php endif; ?>
                <p><?php echo wp_kses_post($vid['desc']); ?></p>
              </div>
            </div>
            <?php
        }
    }
    ?>
  </div>
</section>

<!-- ===== SECTION FOTO DOKUMENTASI ===== -->
<section class="foto-section">
  <div class="section-title-wrap foto-title-wrap">
    <h3 class="section-title">Foto Dokumentasi</h3>
  </div>

  <div class="foto-grid">
    <?php
    $default_fotos = json_encode([
        ['url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80', 'caption' => 'Dokumentasi Kegiatan 1'],
        ['url' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80', 'caption' => 'Dokumentasi Kegiatan 2'],
        ['url' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80', 'caption' => 'Dokumentasi Kegiatan 3'],
        ['url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80', 'caption' => 'Dokumentasi Kegiatan 4']
    ]);
    $saved_fotos = get_option('dprd_dlantunan_foto_data', '');
    if (empty($saved_fotos) || $saved_fotos === '[]' || $saved_fotos === 'false') {
        $saved_fotos = $default_fotos;
    }
    $fotos_data = json_decode($saved_fotos, true);
    
    if (is_array($fotos_data) && !empty($fotos_data)) {
        foreach ($fotos_data as $idx => $foto) {
            ?>
            <div class="foto-card" onclick="openGalleryLightbox(<?php echo $idx; ?>)">
              <div class="foto-img-wrap">
                <img src="<?php echo esc_url($foto['url']); ?>" alt="Foto Dokumentasi <?php echo $idx + 1; ?>">
                <div class="foto-hover-overlay">
                  <div class="zoom-icon">
                    <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Zoom" style="width:20px; height:20px; filter:brightness(0) invert(1);">
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    }
    ?>
  </div>
  <script>
      window.galleryPhotosData = <?php echo json_encode($fotos_data); ?>;
  </script>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="cta-section">
  <div class="wrap" style="padding:0; max-width:none;">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt="User Account Icon" style="filter:brightness(0) invert(1); width:22px; height:22px;">
        </div>
        <h3><?php echo wp_kses_post( get_option('dprd_cta_text_dlantunan', 'Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat') ); ?></h3>
      </div>
      <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline">
        Hubungi Kami
      </a>
    </div>
  </div>
</section>

</div><!-- /.container -->

<?php get_footer(); ?>


