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
    <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png"
      alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2>Beranda</h2>
      <p>Selamat datang di website resmi Sekretariat DPRD Kabupaten Purbalingga. Kami hadir untuk mendukung keterbukaan
        informasi dan pelayanan publik.</p>
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
        <div class="stat-label">Pegawai Profesional</div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/university.png" alt="Agenda"></div>
      <div>
        <div class="stat-num" id="stat-agenda">0</div>
        <div class="stat-label">Agenda DPRD Tahun Ini</div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt="Dokumen"></div>
      <div>
        <div class="stat-num" id="stat-dokumen">0</div>
        <div class="stat-label">Dokumen Tersedia</div>
      </div>
    </div>
    <div class="stat-item">
      <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Protect.png" alt="Transparan"></div>
      <div>
        <div class="stat-num" id="stat-transparan">0%</div>
        <div class="stat-label">Pelayanan Transparan</div>
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
      <div class="card-tag"><span class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Video Call.png" alt=""></span>PERSETUJUAN
        BERSAMA RAPERTA PERTANGGUNGJAWABAN APBD TA 2025 DAN PENYAMPAIAN KUA PPAS TA 2027</div>
      <a href="https://youtu.be/uRZvKm-5YuE?si=0XHt5Nl5IPKieJRO" target="_blank" class="video-thumb">
        <img src="https://www.purbalinggakab.go.id/wp-content/uploads/2025/08/DSC00352-1280x640.jpg"
          alt="Rapat Paripurna">
        <div class="youtube-play-btn"></div>
        <div class="youtube-watch-badge">Tonton di <span>YouTube</span></div>
      </a>
      <div class="info-head">
        <span class="card-tag" style="margin-bottom:0;"><span class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png"
              alt=""></span> Informasi Terbaru</span>
        <a href="<?php echo dprd_get_page_url('ppid', 'docCard'); ?>" class="lihat">Lihat Semua &rsaquo;</a>
      </div>
      <div class="info-item" onclick="window.location.href='<?php echo get_template_directory_uri(); ?>/assets/pdf/DOR.pdf'">
        <div class="doc-ic">PDF</div>
        <div>
          <div class="doc-title">3 Renja Sekretariat DPRD Tahun 2023 Revisi 1</div>
          <div class="doc-date">12 Mei 2023</div>
        </div>
      </div>
    </div>
  </div>

  <!-- HASIL IKM CAROUSEL -->
  <div class="ikm-carousel-wrapper">
    <button id="prevBtn" class="ikm-nav-btn" onclick="prevSurvey()">&#10094;</button>
    <div class="ikm-carousel-overflow">
      <div id="surveyTrack" class="ikm-track">
        
        <!-- Slide 0 (Current) -->
        <div class="survey-card-item active">
          <div class="ikm-card-new">
            <div class="ikm-top">
              <div class="ikm-top-left">
                <div class="ikm-title">Hasil Survey Indeks Kepuasan Masyarakat<br>Sekretariat DPRD Kabupaten
                  Purbalingga<strong>SEMESTER I TAHUN 2026</strong></div>
                <div class="ikm-score">93.275</div>
                <div class="ikm-skala">Skala : 0 - 100</div>
              </div>
              <div class="ikm-top-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge a.png" alt="Sangat Baik" class="ikm-badge">
              </div>
            </div>
            <div class="ikm-bottom">
              <div class="ikm-bottom-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/QR Code.png" alt="QR Code" class="ikm-qr">
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

        <!-- Slide 1 -->
        <div class="survey-card-item">
          <div class="ikm-card-new">
            <div class="ikm-top">
              <div class="ikm-top-left">
                <div class="ikm-title">Hasil Survey Indeks Kepuasan Masyarakat<br>Sekretariat DPRD Kabupaten
                  Purbalingga<strong>SEMESTER II TAHUN 2025</strong></div>
                <div class="ikm-score">92.150</div>
                <div class="ikm-skala">Skala : 0 - 100</div>
              </div>
              <div class="ikm-top-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge a.png" alt="Sangat Baik" class="ikm-badge">
              </div>
            </div>
            <div class="ikm-bottom">
              <div class="ikm-bottom-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/QR Code.png" alt="QR Code" class="ikm-qr">
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

        <!-- Slide 2 -->
        <div class="survey-card-item">
          <div class="ikm-card-new">
            <div class="ikm-top">
              <div class="ikm-top-left">
                <div class="ikm-title">Hasil Survey Indeks Kepuasan Masyarakat<br>Sekretariat DPRD Kabupaten
                  Purbalingga<strong>SEMESTER I TAHUN 2025</strong></div>
                <div class="ikm-score">91.500</div>
                <div class="ikm-skala">Skala : 0 - 100</div>
              </div>
              <div class="ikm-top-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/badge a.png" alt="Sangat Baik" class="ikm-badge">
              </div>
            </div>
            <div class="ikm-bottom">
              <div class="ikm-bottom-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/QR Code.png" alt="QR Code" class="ikm-qr">
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

      </div>
    </div>
    <button id="nextBtn" class="ikm-nav-btn" onclick="nextSurvey()">&#10095;</button>
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
        <h3>Bersama Mewujudkan DPRD yang Berkinerja<br>Tinggi dan Melayani Masyarakat</h3>
      </div>
      <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank" rel="noopener noreferrer" class="btn-outline">
        Hubungi Kami
      </a>
    </div>
  </section>



<footer>
    <div class="footer-grid">
      <div>
        <div class="footer-logo">
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png" alt="Logo">
          <div>
            <h3>Sekretariat DPRD</h3>
            <p>Kabupaten Purbalingga</p>
          </div>
        </div>
        <p class="footer-desc">Mendukung kelancaran tugas dan wewenang DPRD melalui pelayanan yang profesional,
          transparan, dan akuntabel.</p>
        <div class="socials">
          <a href="#" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook"></span>
          </a>
          <a href="https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram"></span>
          </a>
          <a href="https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1" target="_blank" rel="noopener noreferrer"
            style="text-decoration:none;">
            <span>
              <svg class="icon-img" viewBox="0 0 24 24" fill="#ffffff" width="16" height="16">
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
              </svg>
            </span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email.png" alt="Email"></span>
          </a>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Kontak Kami</h6>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/maps.png" alt="Maps">
          <span>Jl. Onje No.2A Purbalingga, Jawa Tengah</span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="Phone">
          <span><a href="tel:02818951058" style="color:inherit;text-decoration:none;">Telp. (0281) 8951058</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/website.png" alt="Website">
          <span><a href="https://dprd.purbalinggakab.go.id" target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">www.dprd.purbalingga.go.id</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email merah.png" alt="Email">
          <span><a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id"
              target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">sekretariat@dprd.purbalingga.go.id</a></span>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Jam Layanan</h6>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tipis.png" alt="Clock">
          <div>
            <b>Senin - Kamis</b>
            <span>07:30 - 16:00 WIB</span>
          </div>
        </div>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tipis.png" alt="Clock">
          <div>
            <b>Jumat</b>
            <span>07:30 - 14:30 WIB</span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright">&copy; 2026 Sekretariat DPRD Kabupaten Purbalingga. All rights reserved.</div>

  <?php wp_footer(); ?>
</body>
</html>

