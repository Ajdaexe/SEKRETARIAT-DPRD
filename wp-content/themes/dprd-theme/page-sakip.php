<?php
/**
 * Template Name: Sakip
 *
 * @package nama-tema-kustom
 */

get_header();
?>

  <!-- Hero Section -->
  <section class="hero" id="heroSection">
    <?php 
      $hero_bg = get_option('dprd_hero_global_image', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); 
      $hero_title = get_option('dprd_hero_sakip_title', 'Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)');
      $hero_desc = get_option('dprd_hero_sakip_desc', 'Transparansi dan pertanggungjawaban kinerja Sekretariat DPRD Kabupaten Purbalingga.');
    ?>
    <img id="heroImage" src="<?php echo esc_url($hero_bg); ?>" alt="Gedung Sekretariat DPRD">
    <div class="hero-text" id="heroText">
      <h2><?php echo esc_html($hero_title); ?></h2>
      <p><?php echo esc_html($hero_desc); ?></p>
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
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
    </div>
  </div>

  <div class="container">

    <div class="stats-grid" id="statsOverviewGrid">
      <div class="stat-card">
        <div class="stat-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.png" alt=""></div>
        <div>
          <div class="label-top">Jumlah Dokumen</div>
          <div class="value" id="stat-jumlah-dokumen">0</div>
          <div class="label-bottom">Dokumen</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/kategori.png" alt=""></div>
        <div>
          <div class="label-top">Kategori Aktif</div>
          <div class="value" id="stat-kategori-aktif">0</div>
          <div class="label-bottom">Kategori</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic green"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Calendar.png" alt=""></div>
        <div>
          <div class="label-top">Update Terbaru</div>
          <div class="value" id="stat-update-terbaru">-</div>
          <div class="label-bottom" id="stat-update-judul">-</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-ic blue"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Download biru.png" alt=""></div>
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
          <div class="cta-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.png" alt=""></div>
          <div>
            <?php echo wp_kses_post( get_option('dprd_cta_text_sakip', '<h4>Butuh Informasi SAKIP Lainnya?</h4><p>Hubungi kami untuk layanan dan konsultasi akuntabilitas kinerja</p>') ); ?>
          </div>
        </div>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Konsultasi+SAKIP+Sekretariat+DPRD&body=Halo+Admin+Sekretariat+DPRD+Kabupaten+Purbalingga%2C%0A%0ASaya+ingin+berkonsultasi+terkait+layanan+atau+informasi+SAKIP.%0A%0ATerima+kasih." target="_blank" rel="noopener noreferrer" class="btn-outline">Hubungi Kami &rsaquo;</a>
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
            array(
                'key'     => '_dokumen_grup',
                'value'   => 'SAKIP',
                'compare' => '='
            )
        )
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            
            $kategori_terms = get_the_terms( get_the_ID(), 'kategori_dokumen' );
            $kategori = !empty($kategori_terms) && !is_wp_error($kategori_terms) ? $kategori_terms[0]->name : 'Renja';
            
            $file_url = get_post_meta( get_the_ID(), '_dokumen_file_url', true );
            $tanggal = get_post_meta( get_the_ID(), '_dokumen_tanggal', true );
            $unduhan = (int) get_post_meta( get_the_ID(), '_jumlah_unduhan', true );
            $author = get_the_author();
            
            $deskripsi = get_the_excerpt();
            if (empty($deskripsi)) {
                $deskripsi = 'Dokumen SAKIP Sekretariat DPRD Kabupaten Purbalingga.';
            }

            if(empty($tanggal)) $tanggal = get_the_date('d M Y');
            
            $track_url = home_url('/?download_doc_id=' . get_the_ID());
            if(empty($file_url)) $track_url = '#';

            $dokumen_array[] = array(
                "judul"         => get_the_title(),
                "deskripsi"     => $deskripsi,
                "kategori"      => $kategori,
                "tanggal"       => $tanggal,
                "tanggalSort"   => get_the_date('Y-m-d H:i:s'),
                "author"        => $author,
                "jumlahUnduhan" => $unduhan,
                "file"          => $track_url
            );
        }
        wp_reset_postdata();
    }
    
    if (empty($dokumen_array)) {
        $dokumen_array = array(
            array(
                "judul"         => "Belum ada dokumen SAKIP",
                "deskripsi"     => "Dokumen SAKIP belum ditambahkan.",
                "kategori"      => "Renja",
                "tanggal"       => date('d M Y'),
                "tanggalSort"   => date('Y-m-d'),
                "author"        => "admin",
                "jumlahUnduhan" => 0,
                "file"          => "#"
            )
        );
    }
    ?>
    const dokumenData = <?php echo json_encode($dokumen_array); ?>;

    function getCategoryBadgeClass(kat) {
      switch(kat) {
        case 'Renja': return 'badge-renja';
        case 'Renstra': return 'badge-renstra';
        case 'Anggaran': return 'badge-anggaran';
        case 'Cascading': return 'badge-cascading';
        case 'Rencana Aksi': return 'badge-rencana-aksi';
        case 'Perjanjian Kinerja': return 'badge-perjanjian-kinerja';
        case 'Dokumen Pelaksana Anggaran': return 'badge-dpa';
        case 'Indikator Kinerja Utama': return 'badge-iku';
        default: return 'badge-renja';
      }
    }

    function animateValue(id, start, end, duration, isFormatted = false) {
      const obj = document.getElementById(id);
      if (!obj) return;
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const current = Math.floor(progress * (end - start) + start);
        obj.textContent = isFormatted ? current.toLocaleString('id-ID') : current;
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }

    function initStatsCounter() {
      const totalDokumen = dokumenData.length;
      const kategoriAktif = new Set(dokumenData.map(d => d.kategori)).size;
      const totalUnduhan = dokumenData.reduce((sum, d) => sum + d.jumlahUnduhan, 0);
      const terbaru = [...dokumenData].sort((a, b) => new Date(b.tanggalSort) - new Date(a.tanggalSort))[0];

      animateValue('stat-jumlah-dokumen', 0, totalDokumen, 2000);
      animateValue('stat-kategori-aktif', 0, kategoriAktif, 2000);
      animateValue('stat-total-unduhan', 0, totalUnduhan, 2500, true);

      if (terbaru) {
        document.getElementById('stat-update-terbaru').textContent = terbaru.tanggal;
        document.getElementById('stat-update-judul').textContent = terbaru.judul;
      }
    }

    let hasAnimatedStats = false;
    const statsObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimatedStats) {
          hasAnimatedStats = true;
          initStatsCounter();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    document.addEventListener("DOMContentLoaded", function() {
      const statsGridEl = document.getElementById('statsOverviewGrid');
      if (statsGridEl) {
        statsObserver.observe(statsGridEl);
      }
      renderSakipCards(dokumenData);
    });

    function renderSakipCards(data) {
      const container = document.getElementById('sakipCardsContainer');
      const noResult = document.getElementById('sakipNoResult');
      container.innerHTML = '';

      if (data.length === 0) {
        noResult.style.display = 'block';
        return;
      }
      noResult.style.display = 'none';

      data.forEach(doc => {
        const parts = doc.tanggal.split(' ');
        const day = parts[0] || '14';
        const mon = parts[1] || 'Sep';
        const badgeClass = getCategoryBadgeClass(doc.kategori);

        const card = document.createElement('div');
        card.className = 'sakip-card-item';
        card.innerHTML = `
          <div class="sakip-card-top-badge ${badgeClass}">${doc.kategori}</div>
          <div class="sakip-card-body-row">
            <div class="sakip-date-box">
              <div class="day">${day}</div>
              <div class="mon">${mon}</div>
            </div>
            <div class="sakip-file-icon">
              <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/PDF.png" alt="PDF">
            </div>
            <div class="sakip-card-info">
              <h3><a href="${doc.file}" target="_blank" style="color:inherit; text-decoration:none;">${doc.judul}</a></h3>
              <p>${doc.deskripsi}</p>
              <div class="sakip-card-meta">
                <span class="sakip-meta-item"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/admin.png" alt=""> by ${doc.author}</span>
                <span class="sakip-meta-item"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Tear-Off Calendar.png" alt=""> ${doc.tanggal}</span>
              </div>
            </div>
            <a href="${doc.file}" download class="sakip-download-btn" style="text-decoration:none; display:inline-flex; align-items:center; justify-content:center; gap:8px;">
              <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.png" alt=""> Unduh
            </a>
          </div>
        `;
        container.appendChild(card);
      });
    }

    function filterSakipDocuments() {
      const selectedCategory = document.getElementById('sakipCategorySelect').value;

      const filtered = dokumenData.filter(doc => {
        const matchCategory = selectedCategory === "" || doc.kategori === selectedCategory;
        return matchCategory;
      });

      renderSakipCards(filtered);
    }

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

    function handleGlobalSearch(e) {
      const keyword = e.target.value.toLowerCase();
      const filtered = dokumenData.filter(doc => 
        doc.judul.toLowerCase().includes(keyword) || 
        doc.deskripsi.toLowerCase().includes(keyword) ||
        doc.kategori.toLowerCase().includes(keyword)
      );
      renderSakipCards(filtered);
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

