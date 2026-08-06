<?php
/**
 * Template Name: Dlantunan
 *
 * @package nama-tema-kustom
 */

get_header();
?>

<!-- ===== HERO ===== -->
<section class="hero" id="heroSection" onclick="openLightbox()">
  <img id="heroImage" src="https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png" alt="Gedung Sekretariat DPRD">
  <div class="hero-text" id="heroText">
    <h2>D'Lantunan</h2>
    <p>Portal layanan digital dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga untuk permohonan layanan dan kebutuhan administratif secara mudah, cepat, dan transparan.</p>
  </div>
</section>

<!-- Modal Lightbox untuk Foto Hero -->
<div class="lightbox-modal" id="lightboxModal" onclick="closeLightbox()">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImg" src="" alt="Zoom Foto">
</div>

<div class="container">

<!-- ===== SELAMAT DATANG ===== -->
<section class="welcome-section">
  <div class="wrap" style="padding:0; max-width:none;">
    <div class="card-panel welcome-card">
      <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/sms.svg" alt=""></div>
      <div>
        <h2>Selamat Datang di D'Lantunan</h2>
        <p>D'Lantunan adalah portal layanan dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga. Melalui portal ini, Anda dapat mengajukan berbagai permohonan layanan dengan mudah secara daring. Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan akuntabel.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== LAYANAN (link ke Google Form) ===== -->
<section class="layanan-section">
  <div class="wrap layanan-grid" style="padding:0; max-width:none;">

    <!-- Layanan Magang -->
    <div class="card-panel layanan-card">
      <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/tas kerja.svg" alt=""></div>
      <h3>Layanan Permohonan Magang</h3>
      <p>Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang
      </a>
    </div>

    <!-- Layanan Ijin Penelitian -->
    <div class="card-panel layanan-card">
      <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt=""></div>
      <h3>Layanan Permohonan Ijin Penelitian</h3>
      <p>Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang
      </a>
    </div>

    <!-- Layanan Ijin Kunjungan -->
    <div class="card-panel layanan-card">
      <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt=""></div>
      <h3>Layanan Permohonan Ijin Kunjungan</h3>
      <p>Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.</p>
      <a class="btn-ajukan" href="https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform" target="_blank" rel="noopener">
        Ajukan Sekarang
      </a>
    </div>

  </div>
</section>

<!-- ===== ALUR LAYANAN + DOKUMEN TERKAIT ===== -->
<section class="bottom-section">
  <div class="wrap bottom-grid" style="padding:0; max-width:none;">

    <div class="card-panel alur-card">
      <div class="alur-head">
        <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/genealogy.svg" alt=""></div>
        <div>
          <h3>Alur Layanan D'Lantunan</h3>
          <p>Proses permohonan layanan yang mudah dan terstruktur.</p>
        </div>
      </div>
      <div class="alur-steps">
        <div class="alur-step">
          <div class="num">1</div>
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/formulir.svg" alt=""></div>
          <h4>Isi Formulir</h4>
          <p>Lengkapi formulir permohonan dan unggah dokumen yang diperlukan.</p>
        </div>
        <div class="alur-step">
          <div class="num">2</div>
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/verif.svg" alt=""></div>
          <h4>Verifikasi</h4>
          <p>Tim kami akan memverifikasi data dan dokumen yang telah Anda kirimkan.</p>
        </div>
        <div class="alur-step">
          <div class="num">3</div>
          <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg" alt=""></div>
          <h4>Tindak Lanjut</h4>
          <p>Permohonan disetujui dan Anda akan menerima informasi selanjutnya.</p>
        </div>
      </div>
    </div>

    <div class="card-panel dokumen-card">
      <div class="dokumen-head">
        <div class="ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.svg" alt=""></div>
        <h3>Informasi &amp; Dokumen</h3>
      </div>
      <div class="dokumen-list">
        <!-- Dokumen 1 -->
        <div class="dokumen-item">
          <div class="file-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf.svg" alt="PDF"></div>
          <div class="file-info">
            <span class="file-title">Panduan Penggunaan Portal D'Lantunan</span>
            <span>PDF &bull; 1.8 MB &bull; 20 Mei 2023</span>
          </div>
          <a class="dl" href="<?php echo get_template_directory_uri(); ?>/assets/pdf/file-panduan.pdf" download aria-label="Unduh"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.svg" alt="Unduh"></a>
        </div>

        <!-- Dokumen 2 -->
        <div class="dokumen-item">
          <div class="file-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf.svg" alt="PDF"></div>
          <div class="file-info">
            <span class="file-title">SOP Permohonan Layanan Terbaru</span>
            <span>PDF &bull; 2.4 MB &bull; 15 Juni 2026</span>
          </div>
          <a class="dl" href="<?php echo get_template_directory_uri(); ?>/assets/pdf/file-sop.pdf" download aria-label="Unduh"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.svg" alt="Unduh"></a>
        </div>

        <!-- Dokumen 3 -->
        <div class="dokumen-item">
          <div class="file-ic"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdf.svg" alt="PDF"></div>
          <div class="file-info">
            <span class="file-title">Formulir Tambahan Studi Banding</span>
            <span>PDF &bull; 1.1 MB &bull; 10 Januari 2026</span>
          </div>
          <a class="dl" href="<?php echo get_template_directory_uri(); ?>/assets/pdf/file-formulir.pdf" download aria-label="Unduh"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/unduh.svg" alt="Unduh"></a>
        </div>
      </div>
    </div>

  </div>
</section>

</div>

<!-- ===== CTA BANNER ===== -->
<section class="cta-section">
  <div class="wrap" style="max-width:none;">
    <div class="cta-banner">
      <div class="cta-left">
        <div class="icon-circle"><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user account.svg" alt=""></div>
        <h3>D'Lantunan untuk pelayanan publik yang lebih cepat,<br>mudah, dan transparan.</h3>
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

<?php get_footer(); ?>
