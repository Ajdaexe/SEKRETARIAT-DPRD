<?php
/**
 * Template Name: Kontak
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<style>
/* ===== HERO (DISAMAKAN PERSIS SEPERTI HALAMAN PROFIL) ===== */
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
  transition: height 0.2s ease-out !important;
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

/* ===== BATIK DIVIDER CENTER SECTION (DISAMAKAN PERSIS SEPERTI HALAMAN PROFIL) ===== */
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

/* BACKGROUND BATIK MOTIF PINGGIR KIRI & KANAN (TOP: 380PX - TITIK TENGAH IDEAL DISAMAKAN 100% PROFIL) */
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
  <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
  <div class="hero-text" id="heroText">
    <h2>Kontak</h2>
    <p>Informasi lengkap mengenai alamat, kontak, jam layanan, dan cara menghubungi Sekretariat DPRD Kabupaten Purbalingga.</p>
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

<div class="container">

<!-- ===== KONTAK SECTION ===== -->
<section class="kontak-section">
  <div class="wrap kontak-grid" style="padding:0;">

    <!-- LEFT COLUMN -->
    <div class="kontak-left">
      <div class="card-panel">
        <h2 class="section-title">Informasi Kontak</h2>
        <p class="info-lede">Silahkan hubungi kami untuk informasi dan layanan publik.</p>

        <div class="info-item">
          <div class="ic"><img class="icon-img icon-maps" src="<?php echo get_template_directory_uri(); ?>/assets/images/maps.svg" alt="Alamat"></div>
          <div>
            <strong>Alamat Sekretariat DPRD Kabupaten Purbalingga</strong>
            <p>Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="Telepon"></div>
          <div>
            <strong>Telp.</strong>
            <p>(0281) 891058</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email.svg" alt="Email"></div>
          <div>
            <strong>Email</strong>
            <p>sekretariat@dprd.purbalingga.go.id</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img icon-website" src="<?php echo get_template_directory_uri(); ?>/assets/images/website.svg" alt="Website"></div>
          <div>
            <strong>Website</strong>
            <p>www.dprd.purbalingga.go.id</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tebel.svg" alt="Jam Layanan"></div>
          <div>
            <strong>Jam Layanan</strong>
            <p>Senin - Jum'at<br>08.00 - 16.00 WIB</p>
            <p class="note">*Kecuali hari libur nasional</p>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="kontak-right">
      <div class="card-panel">
        <h2 class="section-title">Lokasi Kantor</h2>
        <div class="lokasi-frame">
          <iframe
            src="https://www.google.com/maps?q=Kantor+DPRD+Kabupaten+Purbalingga&z=17&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi Sekretariat DPRD Kabupaten Purbalingga">
          </iframe>
          <div class="lokasi-card">
            <div class="pin"><img class="icon-img icon-maps" src="<?php echo get_template_directory_uri(); ?>/assets/images/maps.svg" alt="Lokasi"></div>
            <div>
              <strong>Sekretariat DPRD Kabupaten Purbalingga</strong>
              <span>Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311</span>
            </div>
          </div>
        </div>
      </div>

      <div class="card-panel ikuti-kami">
        <h2 class="section-title">Ikuti Kami</h2>
        <p>Dapatkan informasi terbaru dan kegiatan Sekretariat DPRD Kabupaten Purbalingga melalui kanal resmi kami.</p>
        <div class="socials">
          <a href="#" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="Facebook"></span>
          </a>
          <a href="https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="Instagram"></span>
          </a>
          <a href="https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span>
              <svg class="icon-img" viewBox="0 0 24 24" fill="#ffffff" width="16" height="16">
                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
              </svg>
            </span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email.svg" alt="Email"></span>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

</div>

<!-- ===== CTA BANNER (HUBUNGI KAMI) ===== -->
<section class="cta-section">
  <div class="wrap">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt=""></div>
        <h3>Bersama Mewujudkan DPRD yang Berkinerja<br>Tinggi dan Melayani Masyarakat</h3>
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



<script>
  // Script untuk lightbox khusus hero
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

  // Hero parallax
  window.addEventListener('scroll', function() {
    const scrollY = window.scrollY;
    const heroText = document.getElementById('heroText');
    if (heroText) {
      let opacity = 1 - (scrollY / 300);
      if (opacity < 0) opacity = 0;
      heroText.style.opacity = opacity;
      heroText.style.transform = `translateY(${scrollY * 0.3}px)`;
    }
  });
</script>

<?php get_footer(); ?>
