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

    function initStats() {
      const totalDokumen = dokumenData.length;
      const totalPermintaan = dokumenData.filter(d => d.tahun === 2026).length * 25 + 45;

      animateValue('stat-dokumen', 0, totalDokumen, 2000);
      animateValue('stat-permintaan', 0, totalPermintaan, 2000);
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
          <td><a href="${doc.file}" class="unduh-ic" download><img class="icon-img" src="images/unduh merah.png" alt="Unduh"></a></td>
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
          
        } else {
          
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