<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Explicit CSS Links -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <?php if (is_front_page() || is_home() || is_page_template('front-page.php')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/beranda.css">
  <?php elseif (is_page_template('page-profil.php') || is_page('profil')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/profile-style.css">
  <?php elseif (is_page_template('page-kontak.php') || is_page('kontak')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/kontak-style.css">
  <?php elseif (is_page_template('page-ppid.php') || is_page('ppid')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ppid.css">
  <?php elseif (is_page_template('page-sakip.php') || is_page('sakip')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/sakip.css">
  <?php elseif (is_page_template('page-dlantunan.php') || is_page('dlantunan')) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dlantunan-style.css">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Motif Batik Full Viewport Desktop Edge -->
  <img src="<?php echo get_template_directory_uri(); ?>/images/motif kiri.svg" alt="Motif Batik Kiri Desktop" class="batik-desktop-edge batik-desktop-edge-left">
  <img src="<?php echo get_template_directory_uri(); ?>/images/motif kanan.svg" alt="Motif Batik Kanan Desktop" class="batik-desktop-edge batik-desktop-edge-right">
  <header id="mainHeader">
    <div class="logo-wrap">
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png"
        alt="Logo Purbalingga">
      <div>
        <h1>Sekretariat DPRD</h1>
        <p>Kabupaten Purbalingga</p>
      </div>
    </div>
      <?php
        $is_profil = false;
        $is_kontak = false;
        $is_ppid = false;
        $is_sakip = false;
        $is_dlantunan = false;
        $is_beranda = false;

        if (is_page()) {
            global $post;
            $slug = isset($post->post_name) ? $post->post_name : '';
            
            if (strpos($slug, 'profil') !== false || is_page_template('page-profil.php')) {
                $is_profil = true;
            } elseif (strpos($slug, 'kontak') !== false || is_page_template('page-kontak.php')) {
                $is_kontak = true;
            } elseif (strpos($slug, 'ppid') !== false || is_page_template('page-ppid.php')) {
                $is_ppid = true;
            } elseif (strpos($slug, 'sakip') !== false || is_page_template('page-sakip.php')) {
                $is_sakip = true;
            } elseif (strpos($slug, 'dlantunan') !== false || is_page_template('page-dlantunan.php')) {
                $is_dlantunan = true;
            } else {
                $is_beranda = true;
            }
        } else {
            $is_beranda = true;
        }
      ?>
    <nav>
      <a href="<?php echo home_url('/'); ?>" class="<?php echo $is_beranda ? 'active' : ''; ?>">Beranda</a>
      <a href="<?php echo home_url('/profil'); ?>" class="<?php echo $is_profil ? 'active' : ''; ?>">Profil</a>
      <a href="<?php echo home_url('/kontak'); ?>" class="<?php echo $is_kontak ? 'active' : ''; ?>">Kontak</a>
      <a href="<?php echo home_url('/ppid'); ?>" class="<?php echo $is_ppid ? 'active' : ''; ?>">PPID</a>
      <a href="<?php echo home_url('/sakip'); ?>" class="<?php echo $is_sakip ? 'active' : ''; ?>">Sakip</a>
      <a href="<?php echo home_url('/dlantunan'); ?>" class="<?php echo $is_dlantunan ? 'active' : ''; ?>">D'Lantunan</a>
    </nav>
    <div class="search-container">
      <div class="search-box-animated" id="searchBoxAnimated" onclick="triggerSearchFocus()">
        <button class="search-btn-icon" type="button"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="Cari"></button>
        <input type="text" id="globalSearchInput" placeholder="Cari dokumen..." onkeyup="handleGlobalSearch(event)">
      </div>
    </div>
  </header>
