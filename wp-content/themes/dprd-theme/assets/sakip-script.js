const dokumenData = [
      {
        judul: "3 Renja Sekretariat DPRD Tahun 2023 Revisi 1",
        deskripsi: "Dokumen Rencana Kerja (Renja) Sekretariat DPRD Kabupaten Purbalingga Tahun 2023 Revisi 1 sebagai pedoman pelaksanaan program dan kegiatan.",
        kategori: "Renja",
        tanggal: "14 Sep 2023",
        tanggalSort: "2023-09-14",
        author: "admin",
        jumlahUnduhan: 340,
        file: "ganti-link-file-dokumen-1.pdf"
      },
      {
        judul: "Laporan Kinerja Instansi Pemerintah (LKjIP) Sekretariat DPRD Tahun 2022",
        deskripsi: "Laporan capaian kinerja instansi Sekretariat DPRD Kabupaten Purbalingga tahun anggaran 2022.",
        kategori: "Renja",
        tanggal: "10 Jan 2023",
        tanggalSort: "2023-01-10",
        author: "admin",
        jumlahUnduhan: 210,
        file: "ganti-link-file-dokumen-2.pdf"
      },
      {
        judul: "Ringkasan DPA Sekretariat DPRD Tahun 2023",
        deskripsi: "Ringkasan Dokumen Pelaksanaan Anggaran (DPA) Sekretariat DPRD Kabupaten Purbalingga Tahun 2023.",
        kategori: "Dokumen Pelaksana Anggaran",
        tanggal: "09 Jan 2023",
        tanggalSort: "2023-01-09",
        author: "admin",
        jumlahUnduhan: 180,
        file: "ganti-link-file-dokumen-3.pdf"
      },
      {
        judul: "Kebijakan Pelayanan Informasi Publik",
        deskripsi: "Dokumen kebijakan pelayanan informasi publik Sekretariat DPRD Kabupaten Purbalingga.",
        kategori: "Perjanjian Kinerja",
        tanggal: "08 Jan 2023",
        tanggalSort: "2023-01-08",
        author: "admin",
        jumlahUnduhan: 95,
        file: "ganti-link-file-dokumen-4.pdf"
      },
      {
        judul: "Rencana Strategis (Renstra) Sekretariat DPRD 2021-2026",
        deskripsi: "Dokumen Rencana Strategis jangka menengah Sekretariat DPRD Kabupaten Purbalingga.",
        kategori: "Renstra",
        tanggal: "15 Feb 2023",
        tanggalSort: "2023-02-15",
        author: "admin",
        jumlahUnduhan: 150,
        file: "ganti-link-file-dokumen-5.pdf"
      },
      {
        judul: "Dokumen Cascading Kinerja Sekretariat DPRD",
        deskripsi: "Pohon kinerja dan penjabaran sasaran strategis instansi.",
        kategori: "Cascading",
        tanggal: "20 Feb 2023",
        tanggalSort: "2023-02-20",
        author: "admin",
        jumlahUnduhan: 120,
        file: "ganti-link-file-dokumen-6.pdf"
      },
      {
        judul: "Rencana Aksi Atas Perjanjian Kinerja Tahun 2023",
        deskripsi: "Rincian target triwulanan pelaksanaan program kegiatan instansi.",
        kategori: "Rencana Aksi",
        tanggal: "02 Mar 2023",
        tanggalSort: "2023-03-02",
        author: "admin",
        jumlahUnduhan: 85,
        file: "ganti-link-file-dokumen-7.pdf"
      },
      {
        judul: "Indikator Kinerja Utama (IKU) Sekretariat DPRD",
        deskripsi: "Penetapan IKU sebagai ukuran keberhasilan pencapaian instansi.",
        kategori: "Indikator Kinerja Utama",
        tanggal: "10 Mar 2023",
        tanggalSort: "2023-03-10",
        author: "admin",
        jumlahUnduhan: 230,
        file: "ganti-link-file-dokumen-8.pdf"
      },
      {
        judul: "Laporan Anggaran dan Realisasi Belanja Q1 2023",
        deskripsi: "Transparansi pengelolaan keuangan triwulan pertama.",
        kategori: "Anggaran",
        tanggal: "05 Apr 2023",
        tanggalSort: "2023-04-05",
        author: "admin",
        jumlahUnduhan: 110,
        file: "ganti-link-file-dokumen-9.pdf"
      },
      {
        judul: "Perjanjian Kinerja Kepala Sekretariat DPRD Tahun 2023",
        deskripsi: "Dokumen komitmen pencapaian target kinerja tahunan.",
        kategori: "Perjanjian Kinerja",
        tanggal: "15 Apr 2023",
        tanggalSort: "2023-04-15",
        author: "admin",
        jumlahUnduhan: 190,
        file: "ganti-link-file-dokumen-10.pdf"
      }
    ];

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
              <img class="icon-img" src="images/PDF.png" alt="PDF">
            </div>
            <div class="sakip-card-info">
              <h3>${doc.judul}</h3>
              <p>${doc.deskripsi}</p>
              <div class="sakip-card-meta">
                <span class="sakip-meta-item"><img class="icon-img" src="images/admin.png" alt=""> by ${doc.author}</span>
                <span class="sakip-meta-item"><img class="icon-img" src="images/Tear-Off Calendar.png" alt=""> ${doc.tanggal}</span>
              </div>
            </div>
            <button class="sakip-download-btn" onclick="window.location.href='${doc.file}'">
              <img class="icon-img" src="images/unduh.png" alt=""> Unduh
            </button>
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
          document.getElementById('mainHeader').classList.remove('search-active');
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
      if(keyword.length > 0) {
        document.querySelector('.sakip-filter-bar').scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
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