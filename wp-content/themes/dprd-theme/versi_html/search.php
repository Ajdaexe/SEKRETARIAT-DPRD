<?php 
$pageTitle = 'Pencarian - Sekretariat DPRD Kabupaten Purbalingga';
$pageStyle = '../style.css';
$currentPage = 'search';
$keyword = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

include 'header.php'; 
?>
<!-- Make sure search-style is also loaded -->
<link rel="stylesheet" href="../assets/search-style.css">

<!-- Ganti tinggi desktop edge batik supaya tidak numpuk terlalu bawah karena tidak ada hero -->
<style>
  body.search .batik-desktop-edge { display: none !important; }
  .batik-desktop-edge {
    top: 250px !important;
  }
</style>

<!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
<div class="batik-user-divider-container" style="margin-top: 100px; margin-bottom: 80px;">
  <div class="batik-user-divider-inner">
    <img src="images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
    <img src="images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
    <img src="images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
  </div>
</div>

<main id="primary" class="site-main">
  <div class="search-page-container">

    <?php 
    $keyword = isset($_GET['q']) ? $_GET['q'] : '';
    // Simulasi hasil untuk versi HTML
    $has_results = false;
    if ($keyword === 'email' || $keyword === 'kontak') {
        $has_results = true;
    }
    ?>

    <!-- Search Box Besar di Tengah -->
    <form role="search" method="get" class="search-page-form" action="search.php">
      <input type="text" name="q" id="q" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Cari dokumen, berita, atau layanan...">
      <button type="submit" aria-label="Cari">
        <img src="images/search.png" alt="Search Icon">
      </button>
    </form>

    <?php if ( $has_results ) : ?>

      <!-- Hasil Ditemukan -->
      <div class="search-results-list">
        <!-- Item dummy hasil pencarian -->
        <div class="search-result-item">
          <h3><a href="kontak.php" style="color:inherit; text-decoration:none;">Informasi Kontak</a></h3>
          <p>Halaman Kontak Resmi Sekretariat. Temukan alamat, telepon, dan email untuk menghubungi kami.</p>
          <div class="search-result-meta">
            <span><img src="images/Tear-Off Calendar.png" alt="Date"><?php echo date('d F Y'); ?></span>
            <span><img src="images/kategori.png" alt="Category">Halaman Terkait</span>
          </div>
        </div>
      </div>

    <?php else : ?>

      <!-- State Kosong (Tidak Ditemukan) -->
      <div class="search-empty-state">
        <div class="empty-icon-circle">
          <img src="images/search.png" alt="Search Icon">
        </div>
        <h2>Tidak ada hasil ditemukan</h2>
        <p>Kami tidak menemukan hasil yang cocok dengan kata kunci "<strong><?php echo htmlspecialchars($keyword); ?></strong>". Coba gunakan kata kunci lain.</p>
      </div>

    <?php endif; ?>

  </div>
</main>

<script>
  // Sembunyikan header search box saat di halaman search agar tidak double focus
  document.addEventListener('DOMContentLoaded', function() {
    var topSearch = document.querySelector('.search-container');
    if (topSearch) {
      topSearch.style.display = 'none';
    }
  });
</script>

<?php include 'footer.php'; ?>
