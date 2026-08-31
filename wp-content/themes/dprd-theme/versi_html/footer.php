<style id='unified-footer-css'>
/* UNIFIED FOOTER CSS FROM DLANTUNAN (FORCES CACHE BYPASS) */
footer {
  width: 100vw !important;
  position: relative !important;
  left: 50% !important;
  right: 50% !important;
  margin-left: -50vw !important;
  margin-right: -50vw !important;
  margin-top: 56px !important;
  padding: 50px 40px 30px !important;
  background: #ffffff !important;
  border-top: 1px solid var(--border-color, #ececec) !important;
  box-shadow: 0 -10px 25px rgba(0, 0, 0, 0.04) !important;
  box-sizing: border-box !important;
}

.footer-grid {
  display: grid;
  grid-template-columns: 1.4fr 1.2fr 1fr;
  gap: 40px;
  align-items: start;
  max-width: 1180px;
  margin: 0 auto;
}

.footer-logo {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 16px;
}

.footer-logo img {
  width: 52px;
  height: 52px;
  object-fit: contain;
}

.footer-logo h3 {
  color: var(--merah);
  font-size: 22px;
  font-weight: 800;
  line-height: 1.1;
}

.footer-logo p {
  font-size: 13px;
  font-weight: 500;
  color: var(--teks-primary);
}

.footer-desc {
  font-size: 13.5px;
  color: var(--teks-secondary);
  line-height: 1.6;
  margin-bottom: 24px;
  max-width: 360px;
}

.socials {
  display: flex;
  gap: 12px;
}

.socials span {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: var(--merah);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.2s;
  cursor: pointer;
}

.socials span:hover {
  transform: scale(1.08);
}

.socials .icon-img {
  width: 16px;
  height: 16px;
  filter: brightness(0) invert(1);
}

.socials svg.icon-img {
  width: 13px !important;
  height: 13px !important;
}

.footer-col-border {
  border-left: 1px solid var(--border-color, #ECE8E4);
  padding-left: 40px;
}

footer h6 {
  font-size: 18px;
  font-weight: 700;
  color: var(--teks-primary);
  margin-bottom: 20px;
}

.contact-item {
  display: flex;
  gap: 12px;
  align-items: center;
  margin-bottom: 16px;
  font-size: 13.5px;
  color: var(--teks-secondary);
  line-height: 1.5;
}

/* FIX FOOTER JAM LAYANAN BALANCING MOBILE */
@media(max-width: 768px) {
  .jam-item {
    gap: 8px !important;
    margin-bottom: 8px !important;
  }
  .jam-item div {
    display: flex;
    flex-direction: column;
    gap: 2px !important;
  }
  .jam-item b {
    font-size: 11px !important;
    font-weight: 600 !important;
  }
  .jam-item span {
    font-size: 10px !important;
  }
  .jam-item img.icon-img, .jam-item img[alt='Clock'] {
    width: 12px !important;
    height: 12px !important;
    margin-top: 2px !important;
  }
  /* Ensure contact-item also matches the scale */
  .contact-item {
    gap: 8px !important;
    margin-bottom: 8px !important;
    font-size: 11px !important;
  }
  .contact-item span, .contact-item a {
    font-size: 10px !important;
  }
  .contact-item img.icon-img {
    width: 12px !important;
    height: 12px !important;
    margin-top: 2px !important;
  }
  footer h6 {
    font-size: 13px !important;
    margin-bottom: 8px !important;
  }
}

/* FOOTER GRID 1-COLUMN STACK ON MOBILE */
@media(max-width: 768px) {
  footer {
    margin-top: 24px !important;
    padding: 32px 24px 24px !important;
  }
  .footer-grid {
    grid-template-columns: 1fr !important;
    gap: 24px !important;
  }
  .footer-grid > div:nth-child(1) {
    order: 1;
  }
  .footer-grid > div:nth-child(2) {
    order: 3;
  }
  .footer-grid > div:nth-child(3) {
    order: 2;
  }
  .footer-col-border {
    border-left: none !important;
    padding-left: 0 !important;
    border-top: 1px solid var(--border-color, #ECE8E4);
    padding-top: 24px;
  }
}
</style>
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
            <span><img class="icon-img" src="images/facebook.png" alt="Facebook"></span>
          </a>
          <a href="https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="images/instagram.png" alt="Instagram"></span>
          </a>
          <a href="https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1" target="_blank" rel="noopener noreferrer"
            style="text-decoration:none;">
            <span>
              <svg class="icon-img" viewBox="0 0 24 24" fill="#ffffff" width="16" height="16">
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
              </svg>
            </span>
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id" target="_blank"
            rel="noopener noreferrer" style="text-decoration:none;">
            <span><img class="icon-img" src="images/email.png" alt="Email"></span>
          </a>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Kontak Kami</h6>
        <div class="contact-item">
          <img class="icon-img" src="images/maps.png" alt="Maps">
          <span>Jl. Onje No.2A Purbalingga, Jawa Tengah</span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="images/phone.png" alt="Phone">
          <span><a href="tel:02818951058" style="color:inherit;text-decoration:none;">Telp. (0281) 8951058</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="images/website.png" alt="Website">
          <span><a href="https://dprd.purbalinggakab.go.id" target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">www.dprd.purbalingga.go.id</a></span>
        </div>
        <div class="contact-item">
          <img class="icon-img" src="images/email merah.png" alt="Email">
          <span><a href="https://mail.google.com/mail/?view=cm&fs=1&to=sekretariat@dprd.purbalingga.go.id"
              target="_blank" rel="noopener noreferrer"
              style="color:inherit;text-decoration:none;">sekretariat@dprd.purbalingga.go.id</a></span>
        </div>
      </div>

      <div class="footer-col-border">
        <h6>Jam Layanan</h6>
        <div class="jam-item">
          <img class="icon-img" src="images/clock tipis.png" alt="Clock">
          <div>
            <b>Senin - Kamis</b>
            <span>07:30 - 16:00 WIB</span>
          </div>
        </div>
        <div class="jam-item">
          <img class="icon-img" src="images/clock tipis.png" alt="Clock">
          <div>
            <b>Jumat</b>
            <span>07:30 - 14:30 WIB</span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright">&copy; 2026 Sekretariat DPRD Kabupaten Purbalingga. All rights reserved.</div>

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

  <?php if(isset($pageScript) && $pageScript): ?>
  <script src="<?php echo $pageScript; ?>"></script>
  <?php endif; ?>

</body>
</html>
