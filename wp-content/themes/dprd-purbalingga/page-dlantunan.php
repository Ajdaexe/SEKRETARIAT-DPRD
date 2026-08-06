<?php
/*
Template Name: Dlantunan Template
*/
get_header(); ?>

<!-- Hero Section -->
  <section class="hero" id="heroSection" onclick="openHeroLightbox()">
    <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD Purbalingga">
    <div class="hero-text" id="heroText">
      <h2>D'Lantunan</h2>
      <p>Portal Layanan digital dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga untuk permohonan layanan dan kebutuhan administratif secara mudah, cepat, dan transparan.</p>
    </div>
    <div class="card-panel welcome-card right-welcome" style="position:absolute; top:50%; right:20px; max-width:400px; margin:0;" onclick="event.stopPropagation();">
      <div class="welcome-icon-box" style="margin-bottom:12px; display:flex; align-items:center; gap:12px;">
        <div class="icon-circle red-bubble" style="width:44px; height:44px; border-radius:50%; background:var(--merah); color:#ffffff; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow:0 4px 12px var(--merah-glow);">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-11 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm4 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm4 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg>
        </div>
        <h2 style="font-size:22px; font-weight:700; color:var(--teks-primary); margin:0;">Selamat Datang di D'Lantunan</h2>
      </div>
      <div class="welcome-text">
        <p style="font-size:14.5px; color:var(--teks-secondary); line-height:1.65; margin-bottom:10px;">D'Lantunan adalah portal layanan dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga.</p>
        <p style="font-size:14.5px; color:var(--teks-secondary); line-height:1.65; margin-bottom:10px;">Melalui portal ini, Anda dapat mengajukan berbagai permohonan layanan dengan mudah secara daring.</p>
        <p style="font-size:14.5px; color:var(--teks-secondary); line-height:1.65; margin-bottom:0;">Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan akuntabel.</p>
      </div>
    </div>
  </section>

  <main class="container">

  <!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
  <div class="batik-user-divider-container">
    <div class="batik-user-divider-inner">
      <img src="<?php echo get_template_directory_uri(); ?>/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="<?php echo get_template_directory_uri(); ?>/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>




  <!-- ===== LAYANAN SECTION (3 CARDS) ===== -->
  <section class="layanan-section">
    <div class="layanan-grid">

      <!-- Layanan Magang -->
      <div class="card-panel layanan-card">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
            <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/>
          </svg>
        </div>
        <h3>Layanan Permohonan Magang</h3>
        <p>Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.</p>
        <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform" target="_blank" rel="noopener">
          <span>Ajukan Sekarang</span>
          <span class="arrow-icon">›</span>
        </a>
      </div>

      <!-- Layanan Ijin Penelitian -->
      <div class="card-panel layanan-card">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
          </svg>
        </div>
        <h3>Layanan Permohonan Ijin Penelitian</h3>
        <p>Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.</p>
        <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform" target="_blank" rel="noopener">
          <span>Ajukan Sekarang</span>
          <span class="arrow-icon">›</span>
        </a>
      </div>

      <!-- Layanan Ijin Kunjungan -->
      <div class="card-panel layanan-card">
        <div class="icon-circle">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
          </svg>
        </div>
        <h3>Layanan Permohonan Ijin Kunjungan</h3>
        <p>Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.</p>
        <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform" target="_blank" rel="noopener">
          <span>Ajukan Sekarang</span>
          <span class="arrow-icon">›</span>
        </a>
      </div>

    </div>
  </section>

  <!-- ===== ALUR LAYANAN & DOKUMEN SECTION ===== -->
  <section class="mid-info-section">
    <div class="mid-info-grid">

      <!-- Kolom Kiri: Informasi & Dokumen Terkait -->
      <div class="card-panel dokumen-card">
        <div class="dokumen-head">
          <div class="dokumen-title-group">
            <div class="head-icon-box">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
                <path d="M6 2c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6H6zm7 7V3.5L18.5 9H13z"/>
              </svg>
            </div>
            <h3>Informasi &amp; Dokumen Terkait</h3>
          </div>
        </div>

        <div class="dokumen-list">
          <!-- Dokumen 1 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">Panduan Penggunaan Portal D'Lantunan</span>
              <span class="file-meta">PDF &bull; 1.8 MB &bull; 20 Mei 2023</span>
            </div>
            <a class="btn-download" href="file-panduan.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>

          <!-- Dokumen 2 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">SOP Permohonan Layanan Magang &amp; Penelitian</span>
              <span class="file-meta">PDF &bull; 2.4 MB &bull; 15 Juni 2023</span>
            </div>
            <a class="btn-download" href="file-sop.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>

          <!-- Dokumen 3 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">Formulir Permohonan Izin Penelitian Mahasiswa</span>
              <span class="file-meta">PDF &bull; 850 KB &bull; 10 Januari 2024</span>
            </div>
            <a class="btn-download" href="file-formulir-penelitian.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>

          <!-- Dokumen 4 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">Tata Tertib &amp; Etika Magang Sekretariat DPRD</span>
              <span class="file-meta">PDF &bull; 1.2 MB &bull; 04 Maret 2024</span>
            </div>
            <a class="btn-download" href="file-tatatertib.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>

          <!-- Dokumen 5 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">Syarat &amp; Ketentuan Kunjungan Kerja DPRD</span>
              <span class="file-meta">PDF &bull; 920 KB &bull; 12 Agustus 2024</span>
            </div>
            <a class="btn-download" href="file-syarat-kunjungan.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>

          <!-- Dokumen 6 -->
          <div class="dokumen-item">
            <div class="pdf-icon-badge">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zm4.5 2h1v-3h-1v3zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"/>
              </svg>
            </div>
            <div class="file-info">
              <span class="file-title">Laporan Realisasi Pelayanan Aspirasi Masyarakat</span>
              <span class="file-meta">PDF &bull; 3.1 MB &bull; 01 Februari 2025</span>
            </div>
            <a class="btn-download" href="file-laporan-aspirasi.pdf" download title="Unduh Dokumen" aria-label="Unduh Dokumen">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Kolom Kanan: Alur Layanan D'Lantunan -->
      <div class="card-panel alur-card">
        <div class="alur-head">
          <div class="head-icon-box">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
              <path d="M19 15v-3h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 7V4h3V2H4c-1.1 0-2 .9-2 2v3h2zm0 10v3c0 1.1.9 2 2 2h3v-2H4v-3H2v-2h2zm16-10V4c0-1.1-.9-2-2-2h-3v2h3v3h2zm-8-3c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
            </svg>
          </div>
          <div>
            <h3>Alur Layanan D'Lantunan</h3>
            <p>Proses permohonan layanan yang mudah dan terstruktur.</p>
          </div>
        </div>

        <div class="alur-steps-wrapper">
          <div class="alur-connecting-line"></div>
          
          <div class="alur-steps">
            <!-- Step 1 -->
            <div class="alur-step">
              <div class="step-number-bubble">1</div>
              <div class="step-icon-box">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
              </div>
              <h4>Isi Formulir</h4>
              <p>Lengkapi formulir permohonan dan unggah dokumen yang diperlukan.</p>
            </div>

            <!-- Step 2 -->
            <div class="alur-step">
              <div class="step-number-bubble">2</div>
              <div class="step-icon-box">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                  <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/>
                </svg>
              </div>
              <h4>Unggah Dokumen</h4>
              <p>Tim kami akan memverifikasi data dan dokumen yang telah Anda kirimkan.</p>
            </div>

            <!-- Step 3 -->
            <div class="alur-step">
              <div class="step-number-bubble">3</div>
              <div class="step-icon-box">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                  <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                </svg>
              </div>
              <h4>Tindak Lanjut</h4>
              <p>Permohonan disetujui dan Anda akan menerima informasi selanjutnya.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ===== VIDEO DOKUMENTASI SECTION ===== -->
  <section class="video-section">
    <div class="section-title-wrap">
      <span class="head-icon-box">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
          <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
        </svg>
      </span>
      <h2 class="section-title">Video</h2>
    </div>

    <div class="video-grid">
      <!-- Video 1 -->
      <div class="video-card">
        <div class="video-thumbnail" onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1', 'Video')">
          <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80" alt="Video">
          <div class="play-btn-circle" aria-label="Putar Video">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="var(--merah)">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </div>
        </div>
        <div class="video-desc">
          <h3 class="video-card-title">Video</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada.</p>
        </div>
      </div>

      <!-- Video 2 -->
      <div class="video-card">
        <div class="video-thumbnail" onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1', 'Video Testimoni')">
          <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=800&q=80" alt="Video Testimoni">
          <div class="play-btn-circle" aria-label="Putar Video">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="var(--merah)">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </div>
        </div>
        <div class="video-desc">
          <h3 class="video-card-title">Video Testimoni</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOTO DOKUMENTASI SECTION ===== -->
  <section class="foto-section">
    <div class="section-title-wrap foto-title-wrap">
      <span class="head-icon-box">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
          <path d="M9 2L7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3.17L15 2H9zm3 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
        </svg>
      </span>
      <h2 class="section-title">Foto Dokumentasi</h2>
    </div>

    <div class="foto-grid">
      <!-- Foto 1 -->
      <div class="foto-card-box">
        <div class="foto-card" onclick="openGalleryLightbox(0)">
          <div class="foto-img-wrap">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80" alt="title" loading="lazy">
            <div class="foto-hover-overlay">
              <span class="zoom-icon">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#fff" stroke-width="2.5">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  <line x1="11" y1="8" x2="11" y2="14"></line>
                  <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <span class="foto-sub-title">title</span>
      </div>

      <!-- Foto 2 -->
      <div class="foto-card-box">
        <div class="foto-card" onclick="openGalleryLightbox(1)">
          <div class="foto-img-wrap">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=600&q=80" alt="title" loading="lazy">
            <div class="foto-hover-overlay">
              <span class="zoom-icon">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#fff" stroke-width="2.5">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  <line x1="11" y1="8" x2="11" y2="14"></line>
                  <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <span class="foto-sub-title">title</span>
      </div>

      <!-- Foto 3 -->
      <div class="foto-card-box">
        <div class="foto-card" onclick="openGalleryLightbox(2)">
          <div class="foto-img-wrap">
            <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=600&q=80" alt="title" loading="lazy">
            <div class="foto-hover-overlay">
              <span class="zoom-icon">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#fff" stroke-width="2.5">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  <line x1="11" y1="8" x2="11" y2="14"></line>
                  <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <span class="foto-sub-title">title</span>
      </div>

      <!-- Foto 4 -->
      <div class="foto-card-box">
        <div class="foto-card" onclick="openGalleryLightbox(3)">
          <div class="foto-img-wrap">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80" alt="title" loading="lazy">
            <div class="foto-hover-overlay">
              <span class="zoom-icon">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#fff" stroke-width="2.5">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  <line x1="11" y1="8" x2="11" y2="14"></line>
                  <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <span class="foto-sub-title">title</span>
      </div>
    </div>
  </section>

  <!-- ===== CTA BANNER ===== -->
  <section class="cta-section">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="cta-icon-circle">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="#ffffff">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
          </svg>
        </div>
        <h3>D'Lantunan untuk pelayanan publik yang lebih cepat,</h3>
      </div>
      <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline-white">
        <span>Hubungi Kami</span>
        <span class="arrow-icon">›</span>
      </a>
    </div>
  </section>

</main>

<!-- ===== FOOTER ===== -->

<?php get_footer(); ?>
