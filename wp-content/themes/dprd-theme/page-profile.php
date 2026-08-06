<?php
/**
 * Template Name: Profile
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<!-- ===== HERO ===== -->
<section class="hero" id="heroSection" onclick="openLightbox()">
  <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
  <div class="hero-text" id="heroText">
    <h2>Profil DPRD/h2>
    <p>Informasi mengenai Sekretariat DPRD Kabupaten Purbalingga meliputi kedudukan, struktur organisasi, visi misi, tugas pokok dan fungsi serta dasar hukum.</p>
  </div>
</section>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImg" src="" alt="Zoom Foto">
</div>

<div class="container">

<!-- ===== INTRO: SEKRETARIAT DPRD + SEKILAS ===== -->
<section class="intro-section">
  <div class="wrap intro-grid" style="padding:0;">
    <div class="intro-card intro-card-main">
      <div class="icon-badge"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/university.svg" alt="Sekretariat DPRD"></div>
      <h3>Sekretariat DPRD</h3>
      <p>Sekretariat DPRD Kabupaten Purbalingga merupakan unsur pelayanan, administrasi dan pendukung pelaksanaan tugas dan fungsi DPRD dalam penyelenggaraan pemerintahan daerah.</p>
      <div class="value-grid">
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/department.svg" alt="Unsur Pelayanan"></div>
          <div class="content-box">
            <strong>Unsur Pelayanan</strong>
            <span>Memberikan dukungan administrasi kepada DPRD</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/verif.svg" alt="Profesional"></div>
          <div class="content-box">
            <strong>Profesional</strong>
            <span>Bekerja secara profesional dan berintegritas</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tebel.svg" alt="Akuntabel"></div>
          <div class="content-box">
            <strong>Akuntabel</strong>
            <span>Transparan, akuntabel, dan bertanggung jawab</span>
          </div>
        </div>
        <div class="value-item">
          <div class="dot"><img class="icon-img icon-besar" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt="Kolaboratif"></div>
          <div class="content-box">
            <strong>Kolaboratif</strong>
            <span>Bersinergi untuk mendukung kinerja DPRD</span>
          </div>
        </div>
      </div>
    </div>

    <div class="intro-card sekilas">
      <h3>Sekilas Sekretariat DPRD</h3>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flag.svg" alt="Kedudukan"></div>
        <div><strong>Kedudukan</strong><span>Unsur pelayanan administrasi DPRD</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/department.svg" alt="Tipe Unit Kerja"></div>
        <div><strong>Tipe Unit Kerja</strong><span>Sekretariat DPRD Kabupaten Purbalingga</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/businessman.svg" alt="Bentuk Organisasi"></div>
        <div><strong>Bentuk Organisasi</strong><span>Perangkat Daerah Kabupaten</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt="Jumlah Bagian"></div>
        <div><strong>Jumlah Bagian</strong><span>3 Bagian Utama</span></div>
      </div>
      <div class="sekilas-item">
        <div class="ic"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/flag.svg" alt="Kelompok Jabatan Fungsional"></div>
        <div><strong>Jabatan Fungsional</strong><span>Ada / Terstruktur</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== DASAR HUKUM ===== -->
<section class="dasar-hukum">
  <div class="card-panel">
    <h2 class="section-title">Dasar Hukum</h2>
    <p>Dasar Peraturan Bupati Purbalingga Nomor 76 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Sekretariat Daerah Kabupaten Purbalingga.</p>
  </div>
</section>

<!-- ===== STRUKTUR ORGANISASI ===== -->
<section class="struktur-organisasi">
  <div class="card-panel">
    <h2 class="section-title">Struktur Organisasi</h2>
    <div class="struktur-box">
      Bagan struktur organisasi akan ditampilkan di sini.<br>
      (Unggah gambar/diagram bagan organisasi Sekretariat DPRD)
    </div>
  </div>
</section>

<!-- ===== SUSUNAN ORGANISASI ===== -->
<section class="susunan-organisasi susunan-wrap">
  <div class="card-panel">
    <h2 class="section-title">Susunan Organisasi</h2>
    <div class="susunan-list">
      <p>A. Sekretaris DPRD.</p>
      <p>B. Bagian terdiri dari:</p>
      <ul>
        <li>
          1. Bagian Perundang-undangan
          <div class="sub-bagian">
            <ul>
              <li>Subbagian Produk Hukum</li>
              <li>Subbagian Dokumentasi Hukum</li>
            </ul>
          </div>
        </li>
        <li>
          2. Bagian Persidangan
          <div class="sub-bagian">
            <ul>
              <li>Subbagian Rapat</li>
              <li>Subbagian Risalah</li>
            </ul>
          </div>
        </li>
        <li>
          3. Bagian Umum
          <div class="sub-bagian">
            <ul>
              <li>Subbagian Tata Usaha dan Perlengkapan</li>
              <li>Subbagian Keuangan</li>
              <li>Subbagian Humas dan Protokol</li>
            </ul>
          </div>
        </li>
      </ul>
      <p class="kelompok">C. Kelompok Jabatan Fungsional.</p>
    </div>
    <div class="susunan-photo-wrap">
      <img
        src="https://www.purbalinggakab.go.id/wp-content/uploads/2024/08/50-Anggota-DPRD-Purbalingga-Periode-2024-2029-Dilantik-1280x640.jpeg"
        alt="Foto anggota Sekretariat DPRD Kabupaten Purbalingga"
        class="susunan-photo-img"
      >
      <div class="susunan-photo-fade"></div>
    </div>
  </div>
</section>

<!-- ===== VISI MISI ===== -->
<section class="visi-misi" id="visi-misi">
  <div class="card-panel">
    <h2 class="section-title">VISI</h2>
    <p class="lede">Terwujudnya Optimalisasi Fungsi Substansial dan Administrasi Sekretariat DPRD Kabupaten Purbalingga dalam Mendukung Sinergitas Legislatif dan Eksekutif sebagai Unsur Penyelenggara Pemerintahan Daerah</p>

    <h2 class="section-title">MISI</h2>
    <div class="misi-container">
      <div class="misi-item">
        <div class="num">1</div>
        <div><strong>Pilar Demokrasi:</strong> Mewujudkan DPRD sebagai salah satu pilar kehidupan demokratis yang berlandaskan Pancasila dan Undang-Undang Dasar 1945.</div>
      </div>
      <div class="misi-item">
        <div class="num">2</div>
        <div><strong>Dukungan Kinerja:</strong> Memberikan pelayanan prima dan dukungan administratif serta keahlian yang optimal bagi pelaksanaan tugas kedewanan.</div>
      </div>
      <div class="misi-item">
        <div class="num">3</div>
        <div><strong>Sinergi Pemerintahan:</strong> Memperkuat kerja sama yang harmonis antara jajaran legislatif dan eksekutif demi kelancaran pembangunan daerah.</div>
      </div>
    </div>
  </div>
</section>

<!-- ===== TUGAS POKOK DAN FUNGSI ===== -->
<section class="tupoksi" id="tugas-fungsi">
  <div class="card-panel">
    <div class="watermark">
      <img
        src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png"
        alt=""
        aria-hidden="true"
      >
    </div>
    <h2 class="section-title">TUGAS POKOK DAN FUNGSI</h2>
    <p class="lede">Sekretariat DPRD mempunyai tugas pokok melaksanakan pelayanan terhadap DPRD dan tugas administrasi kesekretariatan DPRD serta administrasi keuangan DPRD dalam mendukung kelancaran pelaksanaan tugas dan fungsi DPRD.</p>
    <h4>Sekretariat DPRD mempunyai fungsi :</h4>
    <div class="fungsi-grid">
      <div class="fungsi-item"><div class="num">1</div><span>Unsur pelayanan terhadap DPRD.</span></div>
      <div class="fungsi-item"><div class="num">4</div><span>Mendukung pelaksanaan tugas dan fungsi DPRD.</span></div>
      <div class="fungsi-item"><div class="num">2</div><span>Tugas administrasi kesekretariatan DPRD.</span></div>
      <div class="fungsi-item"><div class="num">5</div><span>Menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD.</span></div>
      <div class="fungsi-item"><div class="num">3</div><span>Administrasi keuangan DPRD.</span></div>
      <div class="fungsi-item"><div class="num">6</div><span>Pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.</span></div>
    </div>
  </div>
</section>

</div>


<script>
  function toggleSearchBox() {
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

  window.addEventListener('scroll', function() {
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
