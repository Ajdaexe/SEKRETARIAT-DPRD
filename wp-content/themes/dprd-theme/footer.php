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
        <p class="footer-desc"><?php echo esc_html( get_option('dprd_footer_desc', 'Mendukung kelancaran tugas dan wewenang DPRD melalui pelayanan yang profesional, transparan, dan akuntabel.') ); ?></p>
        <div class="socials">
          <a href="<?php echo esc_url( get_option('dprd_footer_fb', '#') ); ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook"></span>
          </a>
          <a href="<?php echo esc_url( get_option('dprd_footer_ig', 'https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==') ); ?>" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram"></span>
          </a>
          <a href="<?php echo esc_url( get_option('dprd_footer_yt', 'https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1') ); ?>" target="_blank" rel="noopener noreferrer"
            style="text-decoration:none;">
            <span>
              <svg class="icon-img" viewBox="0 0 24 24" fill="#ffffff" width="16" height="16">
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
              </svg>
            </span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo esc_attr( get_option('dprd_footer_email', 'sekretariat@dprd.purbalingga.go.id') ); ?>" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email.png" alt="Email"></span>
          </a>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Kontak Kami</h6>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/maps.png" alt="Maps">
          <span><?php echo esc_html( get_option('dprd_footer_alamat', 'Jl. Onje No.2A Purbalingga, Jawa Tengah') ); ?></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone.png" alt="Phone">
          <span><a href="tel:<?php echo esc_attr( str_replace(' ', '', get_option('dprd_footer_telp', '02818951058')) ); ?>" style="color:inherit;text-decoration:none;">Telp. <?php echo esc_html( get_option('dprd_footer_telp', '(0281) 8951058') ); ?></a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/website.png" alt="Website">
          <span><a href="<?php echo esc_url( get_option('dprd_footer_website', 'https://dprd.purbalinggakab.go.id') ); ?>" target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;"><?php 
                $website = get_option('dprd_footer_website', 'www.dprd.purbalingga.go.id');
                echo esc_html( str_replace(array('http://', 'https://'), '', $website) ); 
              ?></a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/email merah.png" alt="Email">
          <span><a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo esc_attr( get_option('dprd_footer_email', 'sekretariat@dprd.purbalingga.go.id') ); ?>"
              target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;"><?php echo esc_html( get_option('dprd_footer_email', 'sekretariat@dprd.purbalingga.go.id') ); ?></a></span>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Jam Layanan</h6>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tipis.png" alt="Clock">
          <div>
            <b>Senin - Kamis</b>
            <span><?php echo esc_html( get_option('dprd_footer_jam_seninkamis', '07:30 - 16:00 WIB') ); ?></span>
          </div>
        </div>
        <div class="jam-item">
          <img class="icon-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/clock tipis.png" alt="Clock">
          <div>
            <b>Jumat</b>
            <span><?php echo esc_html( get_option('dprd_footer_jam_jumat', '07:30 - 14:30 WIB') ); ?></span>
          </div>
        </div>
    </div>
  </footer>

  <div class="copyright">&copy; <?php echo date('Y'); ?> Sekretariat DPRD Kabupaten Purbalingga. All rights reserved.</div>

  <script>
    function triggerSearchFocus() {
      const box = document.getElementById('searchBoxAnimated');
      if (box) {
        box.classList.add('active');
        const input = document.getElementById('globalSearchInput');
        if (input) {
          input.focus();
        }
      }
    }

    document.addEventListener('click', function (e) {
      const searchContainer = document.querySelector('.search-container');
      const searchBox = document.getElementById('searchBoxAnimated');
      if (searchContainer && searchBox && !searchContainer.contains(e.target)) {
        searchBox.classList.remove('active');
      }
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>
