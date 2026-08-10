/**
 * D'Lantunan - Sekretariat DPRD Kabupaten Purbalingga
 * Interactive JavaScript Script
 */

// Foto Galeri Data
const galleryPhotos = [
  {
    src: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=1200&q=85",
    caption: "Dokumentasi Kegiatan Sidang Paripurna DPRD Purbalingga"
  },
  {
    src: "https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=85",
    caption: "Kegiatan Pelayanan Riset & Mahasiswa Magang di Perpustakaan DPRD"
  },
  {
    src: "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=1200&q=85",
    caption: "Penerimaan Kunjungan Kerja & Studi Banding Masyarakat Purbalingga"
  },
  {
    src: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=1200&q=85",
    caption: "Koordinasi Layanan Administrasi Publik Sekretariat DPRD"
  }
];

// Toggle Search Box (Disamakan dengan SAKIP & Profil)
function triggerSearchFocus(event) {
  if (event && event.stopPropagation) event.stopPropagation();
  const searchBox = document.getElementById('searchBoxAnimated');
  const searchInput = document.getElementById('globalSearchInput');
  
  if (searchBox) searchBox.classList.add('active');
  if (searchInput) searchInput.focus();
}

function toggleSearchBox(event) {
  triggerSearchFocus(event);
}

// Global Click to close search box if clicked outside
document.addEventListener('click', function(e) {
  const searchBox = document.getElementById('searchBoxAnimated');
  const searchContainer = document.querySelector('.search-container');
  
  if (searchContainer && searchBox && !searchContainer.contains(e.target)) {
    searchBox.classList.remove('active');
  }
});

// Search input submit on Enter
document.getElementById('globalSearchInput')?.addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    e.preventDefault();
    const query = this.value.trim();
    if (query) {
      alert(`Mencari informasi atau permohonan dengan kata kunci: "${query}"`);
    }
  }
});

// Toggle Show All Documents
function toggleAllDocs(event) {
  event.preventDefault();
  const extraDoc = document.getElementById('doc2');
  const link = event.currentTarget;
  
  if (extraDoc) {
    extraDoc.classList.toggle('show');
    if (extraDoc.classList.contains('show')) {
      link.textContent = 'Sembunyikan';
    } else {
      link.textContent = 'Lihat Semua';
    }
  }
}

// Lightbox for Hero
function openHeroLightbox() {
  const modal = document.getElementById('lightboxModal');
  const img = document.getElementById('lightboxImg');
  const caption = document.getElementById('lightboxCaption');
  
  img.src = 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png';
  caption.textContent = 'Gedung Sekretariat DPRD Kabupaten Purbalingga';
  modal.classList.add('show');
  document.body.style.overflow = 'hidden';
}

// Lightbox for Gallery Photos
function openGalleryLightbox(index) {
  const modal = document.getElementById('lightboxModal');
  const img = document.getElementById('lightboxImg');
  const caption = document.getElementById('lightboxCaption');
  
  if (galleryPhotos[index]) {
    img.src = galleryPhotos[index].src;
    caption.textContent = galleryPhotos[index].caption;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }
}

// Close Lightbox Modal
function closeLightbox(event) {
  const modal = document.getElementById('lightboxModal');
  modal.classList.remove('show');
  document.body.style.overflow = '';
}

// Video Modal
function openVideoModal(videoUrl, title) {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('videoIframe');
  const titleEl = document.getElementById('videoModalTitle');
  
  iframe.src = videoUrl;
  titleEl.textContent = title || 'Dokumentasi Video';
  modal.classList.add('show');
  document.body.style.overflow = 'hidden';
}

// Close Video Modal
function closeVideoModal(event) {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('videoIframe');
  
  iframe.src = '';
  modal.classList.remove('show');
  document.body.style.overflow = '';
}

// Close Modals on ESC Key
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeLightbox();
    closeVideoModal();
    const searchBox = document.getElementById('searchBoxAnimated');
    if (searchBox) searchBox.classList.remove('active');
  }
});

// Header & Hero scroll effects
window.addEventListener('scroll', function() {
  const scrollY = window.scrollY;
  const header = document.getElementById('mainHeader');
  const heroText = document.getElementById('heroText');
  const heroSection = document.getElementById('heroSection');
  const rightWelcome = document.querySelector('.right-welcome');

  if (header) {
    if (scrollY > 20) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  }
  
  if (heroText) {
    let opacity = 1 - (scrollY / 300);
    if (opacity < 0) opacity = 0;
    heroText.style.opacity = opacity;
    heroText.style.transform = `translateY(${scrollY * 0.3}px)`;
  }
  
  if (rightWelcome) {
    let opacity = 1 - (scrollY / 300);
    if (opacity < 0) opacity = 0;
    
    if (opacity >= 1) {
      rightWelcome.style.opacity = '';
    } else {
      rightWelcome.style.opacity = opacity;
    }
  }
  
  if (heroSection) {
    if (scrollY <= 0) {
      heroSection.style.height = 'calc(100vh - 96px)';
    } else {
      heroSection.style.height = '460px';
    }
  }
});
