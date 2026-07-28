<?php
/**
 * Template Name: Kontak
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<section class="hero" data-title="Kontak" data-subtitle="Hubungi kami untuk informasi, konsultasi, dan layanan publik.">
    <div class="hero-copy">
        <h1>Kontak</h1>
        <p>Hubungi kami untuk informasi, konsultasi, dan layanan publik.</p>
    </div>
</section>

<section class="container section-grid contact-grid reveal">
    <article class="card">
        <span class="eyebrow">Informasi Kontak</span>
        <h2>Hubungi Sekretariat DPRD</h2>
        <ul class="contact-list">
            <li><span>📍</span><div><b>Alamat</b><p><?php echo esc_html(get_field('alamat_kantor', 'option') ?: 'Jl. Onje No. 2A, Purbalingga'); ?></p></div></li>
            <li><span>☎️</span><div><b>Telepon</b><p><?php echo esc_html(get_field('nomor_telepon', 'option') ?: '(0281) 891234'); ?></p></div></li>
            <li><span>✉️</span><div><b>Email</b><p><?php echo esc_html(get_field('alamat_email', 'option') ?: 'sekretariat@dprd.purbalingga.go.id'); ?></p></div></li>
            <li><span>🌐</span><div><b>Website</b><p>dprd.purbalinggakab.go.id</p></div></li>
        </ul>
        <hr>
        <h3>Ikuti Kami</h3>
        <div class="social-row">
            <?php 
            $facebook = get_field('link_facebook', 'option') ?: '#';
            $instagram = get_field('link_instagram', 'option') ?: '#';
            $youtube = get_field('link_youtube', 'option') ?: '#';
            $twitter = get_field('link_twitter', 'option') ?: '#';
            ?>
            <a href="<?php echo esc_url($facebook); ?>">f</a>
            <a href="<?php echo esc_url($instagram); ?>">◎</a>
            <a href="<?php echo esc_url($youtube); ?>">▶</a>
            <a href="<?php echo esc_url($twitter); ?>">𝕏</a>
        </div>
    </article>
    <div class="contact-side">
        <article class="card">
            <span class="eyebrow">Lokasi Kantor</span>
            <div class="map-placeholder" style="padding:0; overflow:hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8837373516595!2d109.3598711!3d-7.3912783999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6559a4bb3316ab%3A0xb35a0ce8e82ef6b3!2sDPRD%20Kabupaten%20Purbalingga!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="210" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </article>
        <article class="card">
            <span class="eyebrow">Kirim Pesan</span>
            <?php echo do_shortcode('[contact-form-7 id="c52a0a3" title="Form Kontak Kami"]'); ?>
        </article>
    </div>
</section>

<section class="container callout reveal">
    <div><span class="callout-icon">👥</span><div><strong>Bersama Mewujudkan DPRD yang Berintegritas</strong><small>Kami siap membantu kebutuhan informasi Anda.</small></div></div>
    <a href="mailto:<?php echo esc_attr(get_field('alamat_email', 'option') ?: 'sekretariat@dprd.purbalingga.go.id'); ?>" class="btn btn-light">Hubungi Kami</a>
</section>

<?php get_footer(); ?>
