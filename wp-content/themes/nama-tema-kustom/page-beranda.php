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
      <a href="<?php echo home_url('/profile'); ?>"><button class="btn-red">Lebih Lanjut &rarr;</button></a>
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
        <a href="<?php echo home_url('/ppid'); ?>#docCard" class="lihat">Lihat Semua &rsaquo;</a>
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

  <!-- HASIL IKM -->
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
          <p>Scan QR code di samping untuk mengisi Survey Kepuasan Masyarakat.<br>Masukan Anda sangat berarti demi
            peningkatan kualitas layanan kami.</p>
        </div>
      </div>
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

<script>
    const siteData = {
      totalPegawai: 150,
      totalAgenda: 45,
      totalDokumen: 250,
      persenTransparan: 100
    };

    function renderCounter(el, target, decimals = 0, suffix = "", duration = 2000) {
      if (!el) return;
      let start = 0;
      const startTime = performance.now();
      function tick(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const value = start + (target - start) * progress;
        if (decimals) {
          el.textContent = value.toFixed(decimals) + suffix;
        } else {
          el.textContent = Math.round(value) + suffix;
        }
        if (progress < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }

    let currentSurveyIndex = 2;
    const totalSurveys = 3;

    function updateSurveyCarousel() {
      const track = document.getElementById('surveyTrack');
      const cards = document.querySelectorAll('.survey-card-item');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');

      if (!track) return;
      track.style.transform = `translateX(-${currentSurveyIndex * 100}%)`;

      cards.forEach((card, idx) => {
        if (idx === currentSurveyIndex) {
          card.classList.add('active');
        } else {
          card.classList.remove('active');
        }
      });

      // Sembunyikan/munculkan panah di ujung slide
      if (currentSurveyIndex === 0) {
        prevBtn.style.display = 'none';
      } else {
        prevBtn.style.display = 'flex';
      }

      if (currentSurveyIndex === totalSurveys - 1) {
        nextBtn.style.display = 'none';
      } else {
        nextBtn.style.display = 'flex';
      }
    }

    function prevSurvey() {
      currentSurveyIndex = (currentSurveyIndex - 1 + totalSurveys) % totalSurveys;
      updateSurveyCarousel();
    }

    function nextSurvey() {
      currentSurveyIndex = (currentSurveyIndex + 1) % totalSurveys;
      updateSurveyCarousel();
    }

    function initBerandaStats() {
      renderCounter(document.getElementById('stat-pegawai'), siteData.totalPegawai, 0, "", 2000);
      renderCounter(document.getElementById('stat-agenda'), siteData.totalAgenda, 0, "", 2000);
      renderCounter(document.getElementById('stat-dokumen'), siteData.totalDokumen, 0, "", 2000);
      renderCounter(document.getElementById('stat-transparan'), siteData.persenTransparan, 0, "%", 2000);
      updateSurveyCarousel();
    }

    let hasAnimatedBerandaStats = false;
    const berandaStatsObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimatedBerandaStats) {
          hasAnimatedBerandaStats = true;
          initBerandaStats();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    document.addEventListener("DOMContentLoaded", function () {
      const statsGridEl = document.getElementById('statsOverviewGrid');
      if (statsGridEl) {
        berandaStatsObserver.observe(statsGridEl);
      }
      updateSurveyCarousel();
    });

    function triggerSearchFocus() {
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

    window.addEventListener('scroll', function () {
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

      if (heroSection) {
        if (scrollY <= 0) {
          heroSection.style.height = 'calc(100vh - 96px)';
        } else {
          heroSection.style.height = '460px';
        }
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
