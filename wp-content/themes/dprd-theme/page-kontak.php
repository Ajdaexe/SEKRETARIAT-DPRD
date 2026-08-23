<?php
/**
 * Template Name: Kontak
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
}
</style>

<!-- ===== HERO ===== -->
<section class="hero" id="heroSection" onclick="openLightbox()">
  <?php 
    $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
    $hero_title = get_option('dprd_hero_kontak_title', 'Kontak');
    $hero_desc = get_option('dprd_hero_kontak_desc', 'Informasi lengkap mengenai alamat, kontak, jam layanan, dan cara menghubungi Sekretariat DPRD Kabupaten Purbalingga.');
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
            <strong>Alamat <?php echo esc_html( get_option('dprd_kontak_nama_lokasi', 'Sekretariat DPRD Kabupaten Purbalingga') ); ?></strong>
            <p><?php echo esc_html( get_option('dprd_kontak_alamat', 'Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311') ); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.svg" alt="Telepon"></div>
          <div>
            <strong>Telp.</strong>
            <p><?php echo esc_html( get_option('dprd_kontak_telp', '(0281) 891058') ); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email.svg" alt="Email"></div>
          <div>
            <strong>Email</strong>
            <p><?php echo esc_html( get_option('dprd_kontak_email', 'sekretariat@dprd.purbalingga.go.id') ); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img icon-website" src="<?php echo get_template_directory_uri(); ?>/assets/images/website.svg" alt="Website"></div>
          <div>
            <strong>Website</strong>
            <p><?php echo esc_html( get_option('dprd_kontak_website', 'www.dprd.purbalingga.go.id') ); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tebel.svg" alt="Jam Layanan"></div>
          <div>
            <strong>Jam Layanan</strong>
            <p><?php echo esc_html( get_option('dprd_kontak_jam_hari', "Senin - Jum'at") ); ?><br><?php echo esc_html( get_option('dprd_kontak_jam_waktu', '08.00 - 16.00 WIB') ); ?></p>
            <p class="note"><?php echo esc_html( get_option('dprd_kontak_jam_note', '*Kecuali hari libur nasional') ); ?></p>
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
            src="<?php echo esc_url( get_option('dprd_kontak_maps_url', 'https://www.google.com/maps?q=Kantor+DPRD+Kabupaten+Purbalingga&z=17&output=embed') ); ?>"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi <?php echo esc_attr( get_option('dprd_kontak_nama_lokasi', 'Sekretariat DPRD Kabupaten Purbalingga') ); ?>">
          </iframe>
          <div class="lokasi-card">
            <div class="pin"><img class="icon-img icon-maps" src="<?php echo get_template_directory_uri(); ?>/assets/images/maps.svg" alt="Lokasi"></div>
            <div>
              <strong><?php echo esc_html( get_option('dprd_kontak_nama_lokasi', 'Sekretariat DPRD Kabupaten Purbalingga') ); ?></strong>
              <span><?php echo esc_html( get_option('dprd_kontak_alamat', 'Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311') ); ?></span>
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

<!-- ===== CTA BANNER (HUBUNGI KAMI) ===== -->
<section class="cta-section">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt=""></div>
        <h3><?php echo wp_kses_post( get_option('dprd_cta_text_kontak', 'Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat') ); ?></h3>
      </div>
      <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline">
        Hubungi Kami
      </a>
    </div>
</section>

</div>



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

