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
  <?php wp_body_open(); ?>

  <header id="mainHeader">
    <div class="logo-wrap">
      <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png"
        alt="Logo Purbalingga">
      <div>
        <h1>Sekretariat DPRD</h1>
        <p>Kabupaten Purbalingga</p>
      </div>
    </div>
    <nav>
      <a href="<?php echo home_url('/beranda'); ?>">Beranda</a>
      <a href="<?php echo home_url('/profil'); ?>">Profil</a>
      <a href="<?php echo home_url('/kontak'); ?>">Kontak</a>
      <a href="<?php echo home_url('/ppid'); ?>">PPID</a>
      <a href="<?php echo home_url('/sakip'); ?>" class="active">Sakip</a>
      <a href="<?php echo home_url('/dlantunan'); ?>">D'Lantunan</a>
    </nav>
    <div class="search-container">
      <div class="search-box-animated" id="searchBoxAnimated" onclick="triggerSearchFocus()">
        <button class="search-btn-icon" type="button"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="Cari"></button>
        <input type="text" id="globalSearchInput" placeholder="Cari dokumen..." onkeyup="handleGlobalSearch(event)">
      </div>
    </div>
  </header>
