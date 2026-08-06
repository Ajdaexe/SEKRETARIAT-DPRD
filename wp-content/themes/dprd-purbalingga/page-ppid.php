<?php
/*
Template Name: Ppid Template
*/
get_header(); ?>

<!-- Hero Section -->
  <section class="hero" id="heroSection" onclick="openLightbox()">
    <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2>PPID</h2>
      <p>Layanan informasi publik yang terbuka, cepat, dan transparan. Sekretariat DPRD Kabupaten Purbalingga
        berkomitmen memberikan informasi yang akurat untuk masyarakat.</p>
    </div>
  </section>

  <!-- Modal Lightbox -->
  <div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg" src="" alt="Zoom Foto">
  </div>

  <!-- ===== BATIK DIVIDER CENTER SECTION ===== -->
  <div class="batik-user-divider-container">
    <div class="batik-user-divider-inner">
      <img src="<?php echo get_template_directory_uri(); ?>/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="<?php echo get_template_directory_uri(); ?>/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="<?php echo get_template_directory_uri(); ?>/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>

  <div class="container">

    <div class="info-card">
      <div class="info-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/informasi.png" alt=""></div>
      <div>
        <h3>Informasi</h3>
        <p>PPID Sekretariat DPRD Kabupaten Purbalingga adalah portal layanan informasi publik untuk mewujudkan
          transparansi, akuntabilitas, dan keterbukaan informasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan
          Informasi Publik.</p>
      </div>
    </div>

    <div class="type-grid">
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/informasi berkala.png" alt=""></div>
        <h5>Informasi Berkala</h5>
        <p>Informasi yang wajib disediakan dan diumumkan secara berkala oleh Sekretariat DPRD.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Berkala')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/informasi serta merta.png" alt=""></div>
        <h5>Informasi Serta Merta</h5>
        <p>Informasi yang harus disampaikan segera karena berkaitan dengan hajat hidup orang banyak.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Serta Merta')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/search merah.png" alt=""></div>
        <h5>Informasi Setiap Saat</h5>
        <p>Informasi yang tersedia setiap saat dan dapat diakses oleh publik kapan pun dibutuhkan.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Setiap Saat')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/laporan ppid.png" alt=""></div>
        <h5>Laporan PPID</h5>
        <p>Laporan layanan informasi publik dan kinerja PPID Sekretariat DPRD Kabupaten Purbalingga.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Laporan PPID')">Lihat Informasi &rsaquo;</button>
      </div>
    </div>

    <!-- STATISTIK / OVERVIEW -->
    <div class="stats" id="statsOverviewGrid">
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/document.svg" alt=""></div>
        <div>
          <div class="stat-num" id="stat-dokumen">0</div>
          <div class="stat-label">Dokumen / Informasi Tersedia untuk publik</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/user account.svg" alt=""></div>
        <div>
          <div class="stat-num" id="stat-permintaan">0</div>
          <div class="stat-label">Permintaan Informasi Tahun Ini</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/layanan cepat.png" alt=""></div>
        <div>
          <div class="stat-num" id="stat-layanan">100%</div>
          <div class="stat-label">Layanan Cepat Sesuai SOP</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/Protect.png" alt=""></div>
        <div>
          <div class="stat-num" id="stat-komitmen">100%</div>
          <div class="stat-label">Komitmen Transparan &amp; Akuntabel</div>
        </div>
      </div>
    </div>

    <div class="doc-card" id="docCard">
      <div class="doc-head">
        <h3>Dokumen / Informasi Terbaru</h3>
        <a class="lihat" id="top-lihat-semua" onclick="toggleLihatSemua()">Lihat Semua &rsaquo;</a>
      </div>

      <div class="search-box">
        <input type="text" id="search-input" placeholder="Cari Dokumen....." oninput="applyFilters()">
        <span class="sic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/search merah.png" alt=""></span>
      </div>

      <div class="filter-row">
        <button class="pill-btn" id="btn-semua" onclick="resetFilter()">Semua</button>
        <select class="filter-select" id="filter-kategori" onchange="applyFilters()">
          <option value="">Dokumen (Semua Kategori)</option>
          <option value="Informasi Berkala">Informasi Berkala</option>
          <option value="Informasi Serta Merta">Informasi Serta Merta</option>
          <option value="Informasi Setiap Saat">Informasi Setiap Saat</option>
          <option value="Laporan PPID">Laporan PPID</option>
        </select>
        <!-- DROPDOWN TAHUN (2020 - 2026) -->
        <select class="filter-select" id="filter-tahun" onchange="applyFilters()">
          <option value="">Tahun (Semua Tahun)</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>
      </div>

      <table>
        <thead>
        <tr>
          <th style="width:60px;">Nomor</th>
          <th style="width:40%;">Judul Dokumen</th>
          <th style="width:220px; text-align: left; padding-left: 12px;">Kategori</th>
          <th style="width:160px;">Tanggal</th>
          <th style="width:170px; text-align: center;">Unduh</th>
        </tr>
      </thead>
        <tbody id="doc-table-body">
          <!-- otomatis diisi JS -->
        </tbody>
      </table>
      <div class="no-result" id="no-result" style="display:none;">Tidak ada dokumen yang cocok dengan pencarian/filter.</div>

      <div class="lihat-semua"><a id="bottom-lihat-semua" onclick="toggleLihatSemua()">Lihat Semua Dokumen &rsaquo;</a></div>
    </div>

    <!-- CTA BANNER -->
    <section class="cta-section">
      <div class="cta-banner">
        <div class="cta-left">
          <div class="cta-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/Headphones.png" alt=""></div>
          <div>
            <h4>Butuh Informasi Lain?</h4>
            <p>Ajukan permohonan informasi jika data yang anda cari belum terdata</p>
          </div>
        </div>
        <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline">
        Ajukan Permohonan
      </a>
      </div>
    </section>

  </div>

<?php get_footer(); ?>
