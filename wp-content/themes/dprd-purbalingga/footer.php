<?php
/**
 * The template for displaying the footer
 *
 * @package dprd-purbalingga
 */
?>
</main>
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-header.png' ); ?>" alt="Sekretariat DPRD">
                <p>Mendukung pelaksanaan tugas dan fungsi DPRD Kabupaten Purbalingga melalui pelayanan yang profesional, transparan, dan akuntabel.</p>
                <div class="social-row">
                    <?php 
                    $facebook = get_field('link_facebook', 'option') ?: '#';
                    $instagram = get_field('link_instagram', 'option') ?: '#';
                    $youtube = get_field('link_youtube', 'option') ?: '#';
                    $twitter = get_field('link_twitter', 'option') ?: '#';
                    ?>
                    <a href="<?php echo esc_url($facebook); ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo esc_url($instagram); ?>" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo esc_url($youtube); ?>" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="<?php echo esc_url($twitter); ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h3>Kontak Kami</h3>
                <?php
                $alamat = get_field('alamat_kantor', 'option') ?: 'Jl. Onje No. 2A, Purbalingga';
                $telepon = get_field('nomor_telepon', 'option') ?: '(0281) 891234';
                $email = get_field('alamat_email', 'option') ?: 'sekretariat@dprd.purbalingga.go.id';
                ?>
                <p><?php echo esc_html($alamat); ?></p>
                <p><?php echo esc_html($telepon); ?></p>
                <p><?php echo esc_html($email); ?></p>
            </div>
            
            <div class="footer-col">
                <h3>Jam Layanan</h3>
                <?php
                $jam_senin_kamis = get_field('jam_senin_kamis', 'option') ?: '08.00 - 15.30 WIB';
                $jam_jumat = get_field('jam_jumat', 'option') ?: '08.00 - 11.00 WIB';
                ?>
                <p>Senin–Kamis<br><?php echo esc_html($jam_senin_kamis); ?></p>
                <p>Jumat<br><?php echo esc_html($jam_jumat); ?></p>
            </div>
        </div>
        <div class="copyright">
            © <?php echo date('Y'); ?> Sekretariat DPRD Kabupaten Purbalingga
        </div>
    </div>
</footer>

<!-- Modals -->
<dialog id="videoModal" class="modal">
    <button class="modal-close" data-modal-close aria-label="Tutup">×</button>
    <div class="video-placeholder">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Q0CbN8sfihY" title="Video Rapat Paripurna" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position:absolute; top:0; left:0; width:100%; height:100%;"></iframe>
    </div>
</dialog>

<?php wp_footer(); ?>
</body>
</html>
