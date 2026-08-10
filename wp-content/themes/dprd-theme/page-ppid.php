<?php
/**
 * Template Name: PPID
 *
 * @package nama-tema-kustom
 */

get_header();
?>

  <!-- Hero Section -->
  <section class="hero" id="heroSection" onclick="openLightbox()">
    <?php 
      $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
      $hero_title = get_option('dprd_hero_ppid_title', 'Layanan Informasi Publik (PPID)');
      $hero_desc = get_option('dprd_hero_ppid_desc', 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) Sekretariat DPRD Purbalingga melayani permintaan informasi sesuai UU KIP.');
    ?>
    <img id="heroImage" src="<?php echo esc_url($hero_bg); ?>" alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2><?php echo esc_html($hero_title); ?></h2>
      <p><?php echo esc_html($hero_desc); ?></p>
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
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>

  <div class="container">

    <div class="info-card">
      <div class="info-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/informasi.png" alt=""></div>
      <div>
        <h3>Informasi</h3>
        <p>PPID Sekretariat DPRD Kabupaten Purbalingga adalah portal layanan informasi publik untuk mewujudkan
          transparansi, akuntabilitas, dan keterbukaan informasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan
          Informasi Publik.</p>
      </div>
    </div>

    <div class="type-grid">
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/informasi berkala.png" alt=""></div>
        <h5>Informasi Berkala</h5>
        <p>Informasi yang wajib disediakan dan diumumkan secara berkala oleh Sekretariat DPRD.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Berkala')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/informasi serta merta.png" alt=""></div>
        <h5>Informasi Serta Merta</h5>
        <p>Informasi yang harus disampaikan segera karena berkaitan dengan hajat hidup orang banyak.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Serta Merta')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search merah.png" alt=""></div>
        <h5>Informasi Setiap Saat</h5>
        <p>Informasi yang tersedia setiap saat dan dapat diakses oleh publik kapan pun dibutuhkan.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Informasi Setiap Saat')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/laporan ppid.png" alt=""></div>
        <h5>Laporan PPID</h5>
        <p>Laporan layanan informasi publik dan kinerja PPID Sekretariat DPRD Kabupaten Purbalingga.</p>
        <button class="btn-red-sm" onclick="filterByCategory('Laporan PPID')">Lihat Informasi &rsaquo;</button>
      </div>
    </div>

    <!-- STATISTIK / OVERVIEW -->
    <div class="stats" id="statsOverviewGrid">
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt=""></div>
        <div>
          <div class="stat-num" id="stat-dokumen">0</div>
          <div class="stat-label">Dokumen / Informasi Tersedia untuk publik</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt=""></div>
        <div>
          <div class="stat-num" id="stat-permintaan">0</div>
          <div class="stat-label">Permintaan Informasi Tahun Ini</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/layanan cepat.png" alt=""></div>
        <div>
          <div class="stat-num" id="stat-layanan">100%</div>
          <div class="stat-label">Layanan Cepat Sesuai SOP</div>
        </div>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Protect.png" alt=""></div>
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
        <span class="sic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search merah.png" alt=""></span>
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
          <div class="cta-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Headphones.png" alt=""></div>
          <div>
            <?php echo wp_kses_post( get_option('dprd_cta_text_ppid', '<h4>Butuh Informasi Lain?</h4><p>Ajukan permohonan informasi jika data yang anda cari belum terdata</p>') ); ?>
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

  <script>
    const dokumenData = [
      { judul: "3 Renja Sekretariat DPRD Tahun 2026", kategori: "Informasi Berkala", tanggal: "12 Januari 2026", tahun: 2026, file: "#" },
      { judul: "Laporan Kinerja Instansi Pemerintah (LKjIP) 2025", kategori: "Informasi Berkala", tanggal: "15 Februari 2025", tahun: 2025, file: "#" },
      { judul: "Ringkasan DPA Sekretariat DPRD Tahun 2025", kategori: "Informasi Berkala", tanggal: "10 Januari 2025", tahun: 2025, file: "#" },
      { judul: "Kebijakan Pelayanan Informasi Publik 2026", kategori: "Informasi Setiap Saat", tanggal: "05 Maret 2026", tahun: 2026, file: "#" },
      { judul: "Daftar Informasi Publik (DIP) Tahun 2025", kategori: "Informasi Setiap Saat", tanggal: "20 Desember 2025", tahun: 2025, file: "#" },
      { judul: "Laporan Layanan Informasi Publik Semester I 2026", kategori: "Laporan PPID", tanggal: "30 Juni 2026", tahun: 2026, file: "#" },
      { judul: "Informasi Penanganan Darurat Bencana Alam", kategori: "Informasi Serta Merta", tanggal: "12 November 2025", tahun: 2025, file: "#" },
      { judul: "Rencana Kerja (Renja) Sekretariat DPRD Tahun 2024", kategori: "Informasi Berkala", tanggal: "14 Januari 2024", tahun: 2024, file: "#" },
      { judul: "LKjIP Sekretariat DPRD Tahun 2024", kategori: "Informasi Berkala", tanggal: "20 Februari 2024", tahun: 2024, file: "#" },
      { judul: "DPA Sekretariat DPRD Tahun 2024", kategori: "Informasi Berkala", tanggal: "10 Januari 2024", tahun: 2024, file: "#" },
      { judul: "Laporan PPID Tahunan 2024", kategori: "Laporan PPID", tanggal: "15 Januari 2025", tahun: 2024, file: "#" },
      { judul: "Informasi Kebijakan Tarif Layanan Publik 2024", kategori: "Informasi Setiap Saat", tanggal: "05 April 2024", tahun: 2024, file: "#" },
      { judul: "Renja Sekretariat DPRD Tahun 2023", kategori: "Informasi Berkala", tanggal: "12 Mei 2023", tahun: 2023, file: "#" },
      { judul: "LKjIP Sekretariat DPRD Tahun 2022", kategori: "Informasi Berkala", tanggal: "10 Januari 2023", tahun: 2023, file: "#" },
      { judul: "Ringkasan DPA Sekretariat DPRD Tahun 2023", kategori: "Informasi Berkala", tanggal: "09 Januari 2023", tahun: 2023, file: "#" },
      { judul: "Kebijakan Pelayanan Informasi Publik 2023", kategori: "Informasi Setiap Saat", tanggal: "08 Januari 2023", tahun: 2023, file: "#" },
      { judul: "Laporan Layanan PPID Tahun 2022", kategori: "Laporan PPID", tanggal: "12 Januari 2023", tahun: 2022, file: "#" },
      { judul: "Rencana Strategis (Renstra) 2021-2026", kategori: "Informasi Setiap Saat", tanggal: "15 Februari 2021", tahun: 2021, file: "#" },
      { judul: "Laporan Tahunan Kinerja PPID 2021", kategori: "Laporan PPID", tanggal: "10 Januari 2022", tahun: 2021, file: "#" },
      { judul: "Dokumen Anggaran Belanja Tahun 2021", kategori: "Informasi Berkala", tanggal: "05 Januari 2021", tahun: 2021, file: "#" },
      { judul: "Profil Pimpinan dan Anggota DPRD 2020", kategori: "Informasi Berkala", tanggal: "18 Maret 2020", tahun: 2020, file: "#" },
      { judul: "Laporan Kinerja PPID Tahun 2020", kategori: "Laporan PPID", tanggal: "14 Januari 2021", tahun: 2020, file: "#" }
    ];

    const kategoriClass = {
      "Informasi Berkala": "tag-berkala",
      "Informasi Serta Merta": "tag-serta",
      "Informasi Setiap Saat": "tag-setiap",
      "Laporan PPID": "tag-laporan"
    };

    let showAll = false;

    function animateValue(id, start, end, duration, isFormatted = false, suffix = '') {
      const obj = document.getElementById(id);
      if (!obj) return;
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        let val = isFormatted ? current.toLocaleString('id-ID') : current;
        obj.textContent = val + suffix;
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }

    function initStats() {
      const num1 = <?php echo intval( get_option('dprd_stat_ppid_num_1', 22) ); ?>;
      const num2 = <?php echo intval( get_option('dprd_stat_ppid_num_2', 120) ); ?>;
      const num3 = <?php echo intval( get_option('dprd_stat_ppid_num_3', 100) ); ?>;
      const num4 = <?php echo intval( get_option('dprd_stat_ppid_num_4', 100) ); ?>;

      animateValue('stat-dokumen', 0, num1, 2000);
      animateValue('stat-permintaan', 0, num2, 2000);
      animateValue('stat-layanan', 0, num3, 2000, false, '%');
      animateValue('stat-komitmen', 0, num4, 2000, false, '%');
    }

    let hasAnimatedStats = false;
    const statsObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimatedStats) {
          hasAnimatedStats = true;
          initStats();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    document.addEventListener("DOMContentLoaded", function() {
      const statsGridEl = document.getElementById('statsOverviewGrid');
      if (statsGridEl) {
        statsObserver.observe(statsGridEl);
      }
      applyFilters();
    });

    function renderTable(data) {
      const body = document.getElementById('doc-table-body');
      const noResult = document.getElementById('no-result');
      body.innerHTML = '';

      if (data.length === 0) {
        noResult.style.display = 'block';
        return;
      }
      noResult.style.display = 'none';

      const displayData = showAll ? data : data.slice(0, 5);

      displayData.forEach((doc, i) => {
        const tagClass = kategoriClass[doc.kategori] || 'tag-berkala';
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${i + 1}.</td>
          <td>${doc.judul}</td>
          <td><span class="kategori-tag ${tagClass}">${doc.kategori}</span></td>
          <td>${doc.tanggal}</td>
          <td><a href="${doc.file}" class="unduh-ic" download><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh merah.png" alt="Unduh"></a></td>
        `;
        body.appendChild(row);
      });

      const topBtn = document.getElementById('top-lihat-semua');
      const bottomBtn = document.getElementById('bottom-lihat-semua');

      if (showAll) {
        if(topBtn) topBtn.innerHTML = '&lt; kembali';
        if(bottomBtn) bottomBtn.innerHTML = '&lt; kembali';
      } else {
        if(topBtn) topBtn.innerHTML = 'Lihat Semua &rsaquo;';
        if(bottomBtn) bottomBtn.innerHTML = 'Lihat Semua Dokumen &rsaquo;';
      }
    }

    function applyFilters() {
      const keyword = document.getElementById('search-input').value.trim().toLowerCase();
      const kategori = document.getElementById('filter-kategori').value;
      const tahun = document.getElementById('filter-tahun').value;

      let filtered = dokumenData.filter(doc => {
        const matchKeyword = !keyword || doc.judul.toLowerCase().includes(keyword);
        const matchKategori = !kategori || doc.kategori === kategori;
        const matchTahun = !tahun || doc.tahun == tahun;
        return matchKeyword && matchKategori && matchTahun;
      });

      renderTable(filtered);
    }

    function toggleLihatSemua() {
      showAll = !showAll;
      applyFilters();
      if (!showAll) {
        document.getElementById('docCard').scrollIntoView({ behavior: 'smooth' });
      }
    }

    function filterByCategory(kategori) {
      document.getElementById('filter-kategori').value = kategori;
      showAll = true;
      applyFilters();
      document.getElementById('docCard').scrollIntoView({ behavior: 'smooth' });
    }

    function resetFilter() {
      document.getElementById('search-input').value = '';
      document.getElementById('filter-kategori').value = '';
      document.getElementById('filter-tahun').value = '';
      showAll = false;
      applyFilters();
    }

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

    function triggerSearchFocus() {
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


