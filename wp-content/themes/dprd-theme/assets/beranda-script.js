    function renderCounter(el, target, decimals = 0, suffix = "", duration = 2000) {
      if (!el) return;
      let start = 0;
      const startTime = performance.now();
      function tick(now) {
        const progress = Math.min((now - startTime) / duration, 1);
        const value = start + (target - start) * progress;
        if (decimals) {
          el.textContent = value.toFixed(decimals) + suffix;
        } else {
          el.textContent = Math.round(value) + suffix;
        }
        if (progress < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
    }

    let currentSurveyIndex = 0;

    function updateSurveyCarousel() {
      const track = document.getElementById('surveyTrack');
      const cards = document.querySelectorAll('.survey-card-item');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const totalSurveys = cards.length;

      if (!track || totalSurveys === 0) {
        if (prevBtn) prevBtn.style.display = 'none';
        if (nextBtn) nextBtn.style.display = 'none';
        return;
      }
      
      track.style.transform = `translateX(-${currentSurveyIndex * 100}%)`;

      cards.forEach((card, idx) => {
        if (idx === currentSurveyIndex) {
          card.classList.add('active');
        } else {
          card.classList.remove('active');
        }
      });

      // Sembunyikan/munculkan panah di ujung slide
      if (prevBtn) {
        if (currentSurveyIndex <= 0) {
          prevBtn.style.display = 'none';
        } else {
          prevBtn.style.display = 'flex';
        }
      }

      if (nextBtn) {
        if (currentSurveyIndex >= totalSurveys - 1) {
          nextBtn.style.display = 'none';
        } else {
          nextBtn.style.display = 'flex';
        }
      }
    }

    function prevSurvey() {
      const totalSurveys = document.querySelectorAll('.survey-card-item').length;
      if (totalSurveys === 0) return;
      currentSurveyIndex = (currentSurveyIndex - 1 + totalSurveys) % totalSurveys;
      updateSurveyCarousel();
    }

    function nextSurvey() {
      const totalSurveys = document.querySelectorAll('.survey-card-item').length;
      if (totalSurveys === 0) return;
      currentSurveyIndex = (currentSurveyIndex + 1) % totalSurveys;
      updateSurveyCarousel();
    }

    function initBerandaStats() {
      renderCounter(document.getElementById('stat-pegawai'), siteData.totalPegawai, 0, "", 2000);
      renderCounter(document.getElementById('stat-agenda'), siteData.totalAgenda, 0, "", 2000);
      renderCounter(document.getElementById('stat-dokumen'), siteData.totalDokumen, 0, "", 2000);
      renderCounter(document.getElementById('stat-transparan'), siteData.persenTransparan, 0, "%", 2000);
      updateSurveyCarousel();
    }

    let hasAnimatedBerandaStats = false;
    const berandaStatsObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimatedBerandaStats) {
          hasAnimatedBerandaStats = true;
          initBerandaStats();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    document.addEventListener("DOMContentLoaded", function () {
      const statsGridEl = document.getElementById('statsOverviewGrid');
      if (statsGridEl) {
        berandaStatsObserver.observe(statsGridEl);
      }
      updateSurveyCarousel();
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
          document.getElementById('mainHeader').classList.remove('search-active');
      }
    });

    window.addEventListener('scroll', function () {
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