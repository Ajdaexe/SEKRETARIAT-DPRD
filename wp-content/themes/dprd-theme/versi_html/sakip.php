<?php
$pageTitle = "Sakip - Sekretariat DPRD Kabupaten Purbalingga";
$pageStyle = "sakip-style.css";
$pageScript = "sakip-script.js";
$currentPage = "sakip";
include 'header.php';
?>

<!-- Hero Section -->
  <section class="hero" id="heroSection" onclick="openLightbox()">
    <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png"
      alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2>Sakip</h2>
      <p>Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP) Sekretariat DPRD Kabupaten Purbalingga sebagai wujud
        komitmen dalam mewujudkan kinerja yang terukur, transparan, dan akuntabel.</p>
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
      <img src="images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>

  <div class="container">

    <div class="stats-grid" id="statsOverviewGrid">
      <div class="stat-card">
        <div class="stat-ic"><img class="icon-img" src="images/document.png" alt=""></div>
        <div>
          <div class="label-top">Jumlah Dokumen</div>
          <div class="value" id="stat-jumlah-dokumen">0</div>
          <div class="label-bottom">Dokumen</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic"><img class="icon-img" src="images/kategori.png" alt=""></div>
        <div>
          <div class="label-top">Kategori Aktif</div>
          <div class="value" id="stat-kategori-aktif">0</div>
          <div class="label-bottom">Kategori</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic green"><img class="icon-img" src="images/Calendar.png" alt=""></div>
        <div>
          <div class="label-top">Update Terbaru</div>
          <div class="value" id="stat-update-terbaru">-</div>
          <div class="label-bottom" id="stat-update-judul">-</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic blue"><img class="icon-img" src="images/Download biru.png" alt=""></div>
        <div>
          <div class="label-top">Total Unduhan</div>
          <div class="value" id="stat-total-unduhan">0</div>
          <div class="label-bottom">Kali</div>
        </div>
      </div>
    </div>

    <!-- FILTER BAR -->
    <div class="sakip-filter-bar">
      <div class="sakip-dropdown-wrap">
        <select id="sakipCategorySelect" class="sakip-dropdown-select" onchange="filterSakipDocuments()">
          <option value="">Semua Kategori</option>
          <option value="Renja">Renja</option>
          <option value="Renstra">Renstra</option>
          <option value="Anggaran">Anggaran</option>
          <option value="Cascading">Cascading</option>
          <option value="Rencana Aksi">Rencana Aksi</option>
          <option value="Perjanjian Kinerja">Perjanjian Kinerja</option>
          <option value="Dokumen Pelaksana Anggaran">Dokumen Pelaksana Anggaran</option>
          <option value="Indikator Kinerja Utama">Indikator Kinerja Utama</option>
        </select>
      </div>
    </div>

    <!-- CONTAINER KARTU DOKUMEN VERTIKAL -->
    <div class="sakip-cards-container" id="sakipCardsContainer"></div>
    <div class="no-result" id="sakipNoResult" style="display:none;">Tidak ada dokumen yang cocok dengan kategori ini.</div>

    <!-- CTA BANNER -->
    <section class="cta-section">
      <div class="cta-banner">
        <div class="cta-left">
          <div class="cta-ic"><img class="icon-img" src="images/user account.png" alt=""></div>
          <div>
            <h4>Butuh Informasi SAKIP Lainnya?</h4>
            <p>Hubungi kami untuk layanan dan konsultasi akuntabilitas kinerja</p>
          </div>
        </div>
        <a href="kontak.php" class="btn-outline">Hubungi Kami</a>
      </div>
    </section>

  </div>

<?php include 'footer.php'; ?>
