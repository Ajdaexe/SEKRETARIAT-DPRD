<?php
$pageTitle = "Kontak - Sekretariat DPRD Kabupaten Purbalingga";
$pageStyle = "kontak-style.css";
$pageScript = "kontak-script.js";
$currentPage = "kontak";
include 'header.php';
?>

<!-- ===== HERO ===== -->
<section class="hero" id="heroSection" onclick="openLightbox()">
  <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
  <div class="hero-text" id="heroText">
    <h2>Kontak</h2>
    <p>Informasi lengkap mengenai alamat, kontak, jam layanan, dan cara menghubungi Sekretariat DPRD Kabupaten Purbalingga.</p>
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
    <img src="images/garis kiri.svg" alt="Garis Kiri" class="batik-line-img">
    <img src="images/motif tengah.svg" alt="Motif Batik Tengah" class="batik-img-center">
    <img src="images/garis kanan.svg" alt="Garis Kanan" class="batik-line-img">
  </div>
</div>

<div class="container">

<!-- ===== KONTAK SECTION ===== -->
<section class="kontak-section">
  <div class="wrap kontak-grid" style="padding:0;">

    <!-- LEFT COLUMN -->
    <div class="kontak-left">
      <div class="card-panel">
        <h2 class="section-title">Informasi Kontak</h2>
        <p class="info-lede">Silahkan hubungi kami untuk informasi dan layanan publik.</p>

        <div class="info-item">
          <div class="ic"><img class="icon-img icon-maps" src="images/maps.svg" alt="Alamat"></div>
          <div>
            <strong>Alamat Sekretariat DPRD Kabupaten Purbalingga</strong>
            <p>Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="images/phone.svg" alt="Telepon"></div>
          <div>
            <strong>Telp.</strong>
            <p>(0281) 891058</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="images/email.svg" alt="Email"></div>
          <div>
            <strong>Email</strong>
            <p>sekretariat@dprd.purbalingga.go.id</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img icon-website" src="images/website.svg" alt="Website"></div>
          <div>
            <strong>Website</strong>
            <p>www.dprd.purbalingga.go.id</p>
          </div>
        </div>

        <div class="info-item">
          <div class="ic"><img class="icon-img" src="images/clock tebel.svg" alt="Jam Layanan"></div>
          <div>
            <strong>Jam Layanan</strong>
            <p>Senin - Jum'at<br>08.00 - 16.00 WIB</p>
            <p class="note">*Kecuali hari libur nasional</p>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="kontak-right">
      <div class="card-panel">
        <h2 class="section-title">Lokasi Kantor</h2>
        <div class="lokasi-frame">
          <iframe
            src="https://www.google.com/maps?q=Kantor+DPRD+Kabupaten+Purbalingga&z=17&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi Sekretariat DPRD Kabupaten Purbalingga">
          </iframe>
          <div class="lokasi-card">
            <div class="pin"><img class="icon-img icon-maps" src="images/maps.svg" alt="Lokasi"></div>
            <div>
              <strong>Sekretariat DPRD Kabupaten Purbalingga</strong>
              <span>Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311</span>
            </div>
          </div>
        </div>
      </div>

      <div class="card-panel ikuti-kami">
        <h2 class="section-title">Ikuti Kami</h2>
        <p>Dapatkan informasi terbaru dan kegiatan Sekretariat DPRD Kabupaten Purbalingga melalui kanal resmi kami.</p>
        <div class="socials">
          <a href="#" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="images/facebook.svg" alt="Facebook"></span>
          </a>
          <a href="https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="images/instagram.svg" alt="Instagram"></span>
          </a>
          <a href="https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span>
              <svg class="icon-img" viewBox="0 0 24 24" fill="#ffffff" width="16" height="16">
                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
              </svg>
            </span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="images/email.svg" alt="Email"></span>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

</div>

<!-- ===== CTA BANNER (HUBUNGI KAMI) ===== -->
<section class="cta-section">
  <div class="wrap">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle"><img class="icon-img" src="images/user account.svg" alt=""></div>
        <h3>Bersama Mewujudkan DPRD yang Berkinerja<br>Tinggi dan Melayani Masyarakat</h3>
      </div>
      <a
        href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id&su=Permohonan%20Informasi"
        target="_blank"
        rel="noopener noreferrer"
        class="btn-outline">
        Hubungi Kami
      </a>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->

<?php include 'footer.php'; ?>
