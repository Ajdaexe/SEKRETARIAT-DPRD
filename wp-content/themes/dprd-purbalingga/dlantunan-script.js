  function toggleSearchBox() {
    const box = document.getElementById('searchBoxAnimated');
    box.classList.add('active');
    document.getElementById('globalSearchInput').focus();
  }

  document.getElementById('globalSearchInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      const keyword = this.value.trim();
      if (keyword) {
        alert('Mencari kata kunci: "' + keyword + '"');
      }
    }
  });

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
