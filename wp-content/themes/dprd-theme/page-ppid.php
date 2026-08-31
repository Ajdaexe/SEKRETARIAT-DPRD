<?php
/**
 * Template Name: PPID
 *
 * @package nama-tema-kustom
 */

get_header();
?>

  <!-- Hero Section -->
  <section class="hero" id="heroSection">
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
        <h3><?php echo esc_html( get_option('dprd_ppid_info_title', 'Informasi') ); ?></h3>
        <p><?php echo esc_html( get_option('dprd_ppid_info_desc', 'PPID Sekretariat DPRD Kabupaten Purbalingga adalah portal layanan informasi publik untuk mewujudkan transparansi, akuntabilitas, dan keterbukaan informasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.') ); ?></p>
      </div>
    </div>

    <div class="type-grid">
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/informasi berkala.png" alt=""></div>
        <h5><?php echo esc_html( get_option('dprd_ppid_card_title_1', 'Informasi Berkala') ); ?></h5>
        <p><?php echo esc_html( get_option('dprd_ppid_card_desc_1', 'Informasi yang wajib disediakan dan diumumkan secara berkala oleh Sekretariat DPRD.') ); ?></p>
        <button class="btn-red-sm" onclick="filterByCategory('<?php echo esc_js( get_option('dprd_ppid_card_title_1', 'Informasi Berkala') ); ?>')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/informasi serta merta.png" alt=""></div>
        <h5><?php echo esc_html( get_option('dprd_ppid_card_title_2', 'Informasi Serta Merta') ); ?></h5>
        <p><?php echo esc_html( get_option('dprd_ppid_card_desc_2', 'Informasi yang harus disampaikan segera karena berkaitan dengan hajat hidup orang banyak.') ); ?></p>
        <button class="btn-red-sm" onclick="filterByCategory('<?php echo esc_js( get_option('dprd_ppid_card_title_2', 'Informasi Serta Merta') ); ?>')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search merah.png" alt=""></div>
        <h5><?php echo esc_html( get_option('dprd_ppid_card_title_3', 'Informasi Setiap Saat') ); ?></h5>
        <p><?php echo esc_html( get_option('dprd_ppid_card_desc_3', 'Informasi yang tersedia setiap saat dan dapat diakses oleh publik kapan pun dibutuhkan.') ); ?></p>
        <button class="btn-red-sm" onclick="filterByCategory('<?php echo esc_js( get_option('dprd_ppid_card_title_3', 'Informasi Setiap Saat') ); ?>')">Lihat Informasi &rsaquo;</button>
      </div>
      <div class="type-card">
        <div class="type-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/laporan ppid.png" alt=""></div>
        <h5><?php echo esc_html( get_option('dprd_ppid_card_title_4', 'Laporan PPID') ); ?></h5>
        <p><?php echo esc_html( get_option('dprd_ppid_card_desc_4', 'Laporan layanan informasi publik dan kinerja PPID Sekretariat DPRD Kabupaten Purbalingga.') ); ?></p>
        <button class="btn-red-sm" onclick="filterByCategory('<?php echo esc_js( get_option('dprd_ppid_card_title_4', 'Laporan PPID') ); ?>')">Lihat Informasi &rsaquo;</button>
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
          <option value="<?php echo esc_attr( get_option('dprd_ppid_card_title_1', 'Informasi Berkala') ); ?>"><?php echo esc_html( get_option('dprd_ppid_card_title_1', 'Informasi Berkala') ); ?></option>
          <option value="<?php echo esc_attr( get_option('dprd_ppid_card_title_2', 'Informasi Serta Merta') ); ?>"><?php echo esc_html( get_option('dprd_ppid_card_title_2', 'Informasi Serta Merta') ); ?></option>
          <option value="<?php echo esc_attr( get_option('dprd_ppid_card_title_3', 'Informasi Setiap Saat') ); ?>"><?php echo esc_html( get_option('dprd_ppid_card_title_3', 'Informasi Setiap Saat') ); ?></option>
          <option value="<?php echo esc_attr( get_option('dprd_ppid_card_title_4', 'Laporan PPID') ); ?>"><?php echo esc_html( get_option('dprd_ppid_card_title_4', 'Laporan PPID') ); ?></option>
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
    <?php
    $dokumen_array = array();
    $args = array(
        'post_type'      => 'dokumen',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => '_dokumen_grup',
                'value'   => 'PPID',
                'compare' => '='
            ),
            array(
                'key'     => '_dokumen_grup',
                'compare' => 'NOT EXISTS' // Fallback for old/default posts
            )
        )
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            
            $kategori_terms = get_the_terms( get_the_ID(), 'kategori_dokumen' );
            $kategori = !empty($kategori_terms) && !is_wp_error($kategori_terms) ? $kategori_terms[0]->name : 'Informasi Berkala';
            
            $file_url = get_post_meta( get_the_ID(), '_dokumen_file_url', true );
            $tanggal = get_post_meta( get_the_ID(), '_dokumen_tanggal', true );
            $tahun = get_post_meta( get_the_ID(), '_dokumen_tahun', true );
            
            if(empty($file_url)) $file_url = '#';
            if(empty($tanggal)) $tanggal = get_the_date('d F Y');
            if(empty($tahun)) $tahun = get_the_date('Y');
            
            $dokumen_array[] = array(
                "judul"    => get_the_title(),
                "kategori" => $kategori,
                "tanggal"  => $tanggal,
                "tahun"    => $tahun,
                "file"     => $file_url
            );
        }
        wp_reset_postdata();
    }
    
    // Fallback if no documents found at all (or add dummy for testing)
    $dokumen_array[] = array("judul" => "Dokumen Dummy 1: Laporan Kinerja Instansi Pemerintah (LKjIP) 2026", "kategori" => "Laporan PPID", "tanggal" => "10 Januari 2026", "tahun" => "2026", "file" => "#");
    $dokumen_array[] = array("judul" => "Dokumen Dummy 2: Rencana Strategis (Renstra) DPRD 2021-2026", "kategori" => "Informasi Berkala", "tanggal" => "15 Februari 2026", "tahun" => "2026", "file" => "#");
    $dokumen_array[] = array("judul" => "Dokumen Dummy 3: Ringkasan Daftar Isian Pelaksanaan Anggaran (DIPA) 2025", "kategori" => "Informasi Berkala", "tanggal" => "20 Maret 2025", "tahun" => "2025", "file" => "#");
    $dokumen_array[] = array("judul" => "Dokumen Dummy 4: Informasi Kebencanaan Daerah Purbalingga", "kategori" => "Informasi Serta Merta", "tanggal" => "05 April 2025", "tahun" => "2025", "file" => "#");
    $dokumen_array[] = array("judul" => "Dokumen Dummy 5: Prosedur Permintaan Informasi Publik", "kategori" => "Informasi Setiap Saat", "tanggal" => "12 Mei 2024", "tahun" => "2024", "file" => "#");
    $dokumen_array[] = array("judul" => "Dokumen Dummy 6: Daftar Aset dan Inventaris Sekretariat DPRD", "kategori" => "Informasi Setiap Saat", "tanggal" => "30 Juni 2024", "tahun" => "2024", "file" => "#");

    ?>
    const dokumenData = <?php echo json_encode($dokumen_array); ?>;

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
          <td><a href="${doc.file}" target="_blank" style="color: inherit; text-decoration: none;">${doc.judul}</a></td>
          <td><span class="kategori-tag ${tagClass}">${doc.kategori}</span></td>
          <td>${doc.tanggal}</td>
          <td><a href="${doc.file}" class="unduh-ic" download><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh merah.png" alt="Unduh"></a></td>
        `;
        body.appendChild(row);
      });

      const topBtn = document.getElementById('top-lihat-semua');
      const bottomBtn = document.getElementById('bottom-lihat-semua');

      if (showAll) {
        if(topBtn) { topBtn.style.display = 'inline-block'; topBtn.innerHTML = '&lt; kembali'; }
        if(bottomBtn) { bottomBtn.innerHTML = '&lt; kembali'; bottomBtn.style.pointerEvents = 'auto'; bottomBtn.style.color = ''; }
      } else {
        if (data.length > 5) {
          if(topBtn) { topBtn.style.display = 'inline-block'; topBtn.innerHTML = 'Lihat Semua &rsaquo;'; }
          if(bottomBtn) { bottomBtn.innerHTML = 'Lihat Semua Dokumen &rsaquo;'; bottomBtn.style.pointerEvents = 'auto'; bottomBtn.style.color = ''; }
        } else {
          if(topBtn) topBtn.style.display = 'none';
          if(bottomBtn) { bottomBtn.innerHTML = 'Anda sudah mencapai akhir dokumen'; bottomBtn.style.pointerEvents = 'none'; bottomBtn.style.color = '#888'; }
        }
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
    });

        function triggerSearchFocus() {
      const e = window.event;
      if (e && e.target && e.target.tagName === 'INPUT') return;
      
      const box = document.getElementById('searchBoxAnimated');
      if (box) {
        const isActive = box.classList.contains('active');
        if (isActive) {
          box.classList.remove('active');
          const header = document.getElementById('mainHeader');
          if(header) header.classList.remove('search-active');
        } else {
          box.classList.add('active');
          const header = document.getElementById('mainHeader');
          if(header) header.classList.add('search-active');
          const input = document.getElementById('globalSearchInput');
          if (input) {
            input.focus();
          }
        }
      }
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


