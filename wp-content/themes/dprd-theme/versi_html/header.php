<?php
if (!isset($pageTitle)) $pageTitle = 'Sekretariat DPRD Kabupaten Purbalingga';
if (!isset($currentPage)) $currentPage = '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <?php if(isset($pageStyle) && $pageStyle): ?>
  <link rel="stylesheet" href="<?php echo $pageStyle; ?>">
  <?php endif; ?>
</head>

<body>
  <!-- Motif Batik Full Viewport Desktop Edge -->
  <img src="images/motif kiri.svg" alt="Motif Batik Kiri Desktop" class="batik-desktop-edge batik-desktop-edge-left">
  <img src="images/motif kanan.svg" alt="Motif Batik Kanan Desktop" class="batik-desktop-edge batik-desktop-edge-right">
  
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
      <a href="beranda.php" class="<?php echo ($currentPage == 'beranda') ? 'active' : ''; ?>">Beranda</a>
      <a href="profile.php" class="<?php echo ($currentPage == 'profile') ? 'active' : ''; ?>">Profil</a>
      <a href="kontak.php" class="<?php echo ($currentPage == 'kontak') ? 'active' : ''; ?>">Kontak</a>
      <a href="ppid.php" class="<?php echo ($currentPage == 'ppid') ? 'active' : ''; ?>">PPID</a>
      <a href="sakip.php" class="<?php echo ($currentPage == 'sakip') ? 'active' : ''; ?>">Sakip</a>
      <a href="dlantunan.php" class="<?php echo ($currentPage == 'dlantunan') ? 'active' : ''; ?>">D'Lantunan</a>
    </nav>
    <div class="search-container">
      <div class="search-box-animated" id="searchBoxAnimated" onclick="triggerSearchFocus()">
        <button class="search-btn-icon" type="button"><img class="icon-img" src="images/search.png" alt="Cari"></button>
        <input type="text" id="globalSearchInput" placeholder="Cari dokumen..." onkeyup="handleGlobalSearch(event)">
      </div>
    </div>
  </header>
