<footer>
    <div class="footer-grid">
      <div>
        <div class="footer-logo">
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Lambang_Kabupaten_Purbalingga.png" alt="Logo">
          <div>
            <h3>Sekretariat DPRD</h3>
            <p>Kabupaten Purbalingga</p>
          </div>
        </div>
        <p class="footer-desc">Mendukung kelancaran tugas dan wewenang DPRD melalui pelayanan yang profesional,
          transparan, dan akuntabel.</p>
        <div class="socials">
          <a href="#" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Facebook"></span>
          </a>
          <a href="https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg" alt="Instagram"></span>
          </a>
          <a href="https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1" target="_blank" rel="noopener noreferrer"
            style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/youtube.svg" alt="YouTube"></span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/email.svg" alt="Email"></span>
          </a>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Kontak Kami</h6>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/maps.svg" alt="Maps">
          <span>Jl. Onje No.2A Purbalingga, Jawa Tengah</span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/phone.svg" alt="Phone">
          <span><a href="tel:02818951058" style="color:inherit;text-decoration:none;">Telp. (0281) 8951058</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/website.svg" alt="Website">
          <span><a href="https://dprd.purbalinggakab.go.id" target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">www.dprd.purbalingga.go.id</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/email.svg" alt="Email">
          <span><a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id"
              target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">sekretariat@dprd.purbalingga.go.id</a></span>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Jam Layanan</h6>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/clock tipis.svg" alt="Clock">
          <div>
            <b>Senin - Kamis</b>
            <span>07:30 - 16:00 WIB</span>
          </div>
        </div>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/images/clock tipis.svg" alt="Clock">
          <div>
            <b>Jumat</b>
            <span>07:30 - 14:30 WIB</span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright">&copy; 2026 Sekretariat DPRD Kabupaten Purbalingga. All rights reserved.</div>

  <?php wp_footer(); ?>

  <!-- Explicit JS Links -->
  <script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
  <?php if (is_front_page() || is_home() || is_page_template('front-page.php')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/beranda.js"></script>
  <?php elseif (is_page_template('page-profil.php') || is_page('profil')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/profile-script.js"></script>
  <?php elseif (is_page_template('page-kontak.php') || is_page('kontak')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/kontak-script.js"></script>
  <?php elseif (is_page_template('page-ppid.php') || is_page('ppid')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/ppid.js"></script>
  <?php elseif (is_page_template('page-sakip.php') || is_page('sakip')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/sakip.js"></script>
  <?php elseif (is_page_template('page-dlantunan.php') || is_page('dlantunan')) : ?>
    <script src="<?php echo get_template_directory_uri(); ?>/dlantunan-script.js"></script>
  <?php endif; ?>

</body>
</html>
