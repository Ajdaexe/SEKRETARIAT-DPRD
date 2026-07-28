<?php
/**
 * Template Name: D'Lantunan
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="D'Lantunan" data-subtitle="Layanan digital untuk menyampaikan aspirasi, pengaduan, dan permohonan informasi.">
    <div class="hero-copy">
        <h1>D'Lantunan</h1>
        <p>Layanan digital untuk menyampaikan aspirasi, pengaduan, dan permohonan informasi.</p>
    </div>
</section>

<section class="container section reveal">
    <article class="welcome-card">
        <div class="welcome-icon">💬</div>
        <div>
            <span class="eyebrow">Selamat Datang</span>
            <h2>D'Lantunan</h2>
            <p>Gunakan layanan ini untuk menyampaikan aspirasi dan kebutuhan informasi kepada Sekretariat DPRD Kabupaten Purbalingga secara mudah dan terarah.</p>
        </div>
        <div class="welcome-art">🧑‍💻</div>
    </article>
</section>

<section class="container section reveal">
    <div class="service-grid three">
        <article class="service-card">
            <span>📮</span>
            <h3>Layanan Permohonan Magang</h3>
            <p>Pengajuan magang bagi pelajar dan mahasiswa.</p>
            <button class="btn btn-primary small" data-modal-open="modalMagang">Ajukan Sekarang</button>
        </article>
        <article class="service-card">
            <span>📄</span>
            <h3>Layanan Permohonan Penelitian</h3>
            <p>Pengajuan izin dan kebutuhan data penelitian.</p>
            <button class="btn btn-primary small" data-modal-open="modalPenelitian">Ajukan Sekarang</button>
        </article>
        <article class="service-card">
            <span>👥</span>
            <h3>Layanan Permohonan Kunjungan</h3>
            <p>Pengajuan kunjungan kelembagaan dan edukasi.</p>
            <button class="btn btn-primary small" data-modal-open="modalKunjungan">Ajukan Sekarang</button>
        </article>
    </div>
</section>

<section class="container section-grid two-col reveal">
    <article class="card">
        <span class="eyebrow">Alur Layanan</span>
        <h2>Proses D'Lantunan</h2>
        <div class="steps">
            <div><b>1</b><span>Isi formulir permohonan</span></div>
            <div><b>2</b><span>Verifikasi data oleh petugas</span></div>
            <div><b>3</b><span>Tindak lanjut dan notifikasi</span></div>
        </div>
    </article>
    <article class="card">
        <div class="section-heading">
            <div><span class="eyebrow">Informasi</span><h2>Informasi & Bantuan</h2></div>
        </div>
        <div class="faq">
            <details>
                <summary>Berapa lama proses verifikasi?</summary>
                <p>Verifikasi awal dilakukan maksimal 2 hari kerja.</p>
            </details>
            <details>
                <summary>Apakah layanan ini berbayar?</summary>
                <p>Tidak, seluruh layanan dasar tersedia tanpa biaya.</p>
            </details>
            <details>
                <summary>Bagaimana melacak pengajuan?</summary>
                <p>Status dapat dilacak menggunakan nomor registrasi melalui WhatsApp atau Email Anda.</p>
            </details>
        </div>
    </article>
</section>

<!-- Modals -->
<dialog id="modalMagang" class="modal">
    <button class="modal-close" data-modal-close aria-label="Tutup">×</button>
    <div style="padding: 40px;">
        <h2 style="margin-top:0;">Permohonan Magang</h2>
        <p style="color:var(--muted); margin-bottom: 24px;">Silakan lengkapi formulir di bawah ini.</p>
        <?php echo do_shortcode('[contact-form-7 id="3b5fa77" title="Form Permohonan Magang"]'); ?>
    </div>
</dialog>

<dialog id="modalPenelitian" class="modal">
    <button class="modal-close" data-modal-close aria-label="Tutup">×</button>
    <div style="padding: 40px;">
        <h2 style="margin-top:0;">Izin Penelitian</h2>
        <p style="color:var(--muted); margin-bottom: 24px;">Silakan lengkapi formulir di bawah ini beserta proposal penelitian.</p>
        <?php echo do_shortcode('[contact-form-7 id="ecfa3bc" title="Form Izin Penelitian"]'); ?>
    </div>
</dialog>

<dialog id="modalKunjungan" class="modal">
    <button class="modal-close" data-modal-close aria-label="Tutup">×</button>
    <div style="padding: 40px;">
        <h2 style="margin-top:0;">Izin Kunjungan</h2>
        <p style="color:var(--muted); margin-bottom: 24px;">Silakan lengkapi formulir di bawah ini untuk institusi/lembaga.</p>
        <?php echo do_shortcode('[contact-form-7 id="ea7bb13" title="Form Izin Kunjungan"]'); ?>
    </div>
</dialog>

<?php get_footer(); ?>
