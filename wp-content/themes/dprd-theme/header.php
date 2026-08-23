<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header id="mainHeader">
    <div class="logo-wrap">
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png"
        alt="Logo Purbalingga" class="logo-img">
      <div class="logo-text">
        <h1>Sekretariat DPRD</h1>
        <p>Kabupaten Purbalingga</p>
      </div>
    </div>
    <nav>
      <a href="<?php echo home_url('/'); ?>" class="<?php echo (is_front_page() || is_home()) ? 'active' : ''; ?>">Beranda</a>
      <a href="<?php echo dprd_get_page_url('profile'); ?>" class="<?php echo is_page('profile') ? 'active' : ''; ?>">Profil</a>
      <a href="<?php echo dprd_get_page_url('kontak'); ?>" class="<?php echo is_page('kontak') ? 'active' : ''; ?>">Kontak</a>
      <a href="<?php echo dprd_get_page_url('ppid'); ?>" class="<?php echo is_page('ppid') ? 'active' : ''; ?>">PPID</a>
      <a href="<?php echo dprd_get_page_url('sakip'); ?>" class="<?php echo is_page('sakip') ? 'active' : ''; ?>">Sakip</a>
      <a href="<?php echo dprd_get_page_url('dlantunan'); ?>" class="<?php echo is_page('dlantunan') ? 'active' : ''; ?>">D'Lantunan</a>
    </nav>
    <div class="search-container">
      <div class="search-box-animated" id="searchBoxAnimated" onclick="triggerSearchFocus()">
        <button class="search-btn-icon" type="button"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Cari"></button>
        <input type="text" id="globalSearchInput" placeholder="Cari dokumen..." onkeyup="handleGlobalSearch(event)">
      </div>
    </div>
    
    <!-- Hamburger Menu Toggle (Mobile) -->
    <button class="hamburger-menu" id="hamburgerMenu" aria-label="Toggle Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </header>

  <!-- Motif Batik Full Viewport Desktop Edge -->
  <style>
    .batik-desktop-edge {
      height: 550px !important;
      opacity: 0.9 !important;
    }
    @media (max-width: 1024px) {
      .batik-desktop-edge {
        height: 350px !important;
      }
    }
    @media (max-width: 768px) {
      .batik-desktop-edge {
        display: block !important;
        height: 200px !important;
        opacity: 0.6 !important;
      }
    }
  </style>
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif kiri.svg" alt="Motif Batik Kiri Desktop" class="batik-desktop-edge batik-desktop-edge-left" id="batik-edge-left">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif kanan.svg" alt="Motif Batik Kanan Desktop" class="batik-desktop-edge batik-desktop-edge-right" id="batik-edge-right">
  
  <script>
    // Pastikan motif batik selalu berada tepat di perbatasan antara foto hero dan konten putih
    function adjustBatikPosition() {
      var hero = document.querySelector('.hero');
      var leftBatik = document.getElementById('batik-edge-left');
      var rightBatik = document.getElementById('batik-edge-right');
      
      if (hero && leftBatik && rightBatik) {
        var offset = leftBatik.offsetHeight / 2;
        if (!offset || offset < 10) offset = 275; // Fallback jika gambar belum ter-render

        // Kita selalu kunci titik tengah batik pada perbatasan persis garis bawah foto hero
        var targetCenter = hero.offsetTop + hero.offsetHeight;

        leftBatik.style.top = (targetCenter - offset) + 'px';
        rightBatik.style.top = (targetCenter - offset) + 'px';
      }
    }
    
    document.addEventListener('DOMContentLoaded', adjustBatikPosition);
    window.addEventListener('load', adjustBatikPosition); // Pastikan dijalankan lagi setelah gambar loading
    window.addEventListener('resize', adjustBatikPosition);
  </script>
