<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <?php wp_head(); ?>

</head>

<body>

  <!-- Motif Batik Full Viewport Desktop Edge -->
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif kiri.svg" alt="Motif Batik Kiri Desktop" class="batik-desktop-edge batik-desktop-edge-left">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif kanan.svg" alt="Motif Batik Kanan Desktop" class="batik-desktop-edge batik-desktop-edge-right">
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
  </header>

