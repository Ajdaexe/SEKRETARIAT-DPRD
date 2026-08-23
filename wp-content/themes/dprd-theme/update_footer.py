import os

css_files = [
    'beranda-style.css',
    'dlantunan-style.css',
    'kontak-style.css',
    'ppid-style.css',
    'sakip-style.css',
    'profile-style.css',
    '../style.css'
]

override = """
/* SUPER COMPACT CTA AND FOOTER FOR MOBILE */
@media(max-width: 768px) {
  /* CTA Extra Small */
  .cta-section {
    margin: 16px 12px 0 !important;
  }
  .cta-banner {
    padding: 16px 12px !important;
    gap: 12px !important;
  }
  .cta-left {
    gap: 8px !important;
  }
  .cta-left .icon-circle {
    width: 36px !important;
    height: 36px !important;
  }
  .cta-left .icon-circle img {
    width: 16px !important;
    height: 16px !important;
  }
  .cta-left h3 {
    font-size: 14px !important;
    line-height: 1.3 !important;
  }
  .btn-outline {
    padding: 8px 16px !important;
    font-size: 12px !important;
  }
  .btn-outline::after {
    font-size: 16px !important;
  }

  /* Footer Extra Small */
  footer {
    padding: 24px 16px 12px !important;
    margin-top: 32px !important;
  }
  .footer-grid {
    gap: 20px !important;
  }
  .footer-logo img {
    width: 36px !important;
    height: 36px !important;
  }
  .footer-logo h3 {
    font-size: 15px !important;
  }
  .footer-logo p {
    font-size: 10px !important;
  }
  .footer-desc {
    font-size: 11.5px !important;
    line-height: 1.4 !important;
    margin-bottom: 12px !important;
  }
  footer h6 {
    font-size: 14px !important;
    margin-bottom: 10px !important;
  }
  .contact-item, .jam-item {
    font-size: 11.5px !important;
    margin-bottom: 8px !important;
    gap: 8px !important;
  }
  .jam-item b {
    font-size: 11.5px !important;
  }
  .contact-item .ic-foot, .jam-item .ic-foot {
    width: 18px !important;
    height: 18px !important;
  }
  .contact-item .ic-foot img, .jam-item .ic-foot img {
    width: 12px !important;
    max-width: 12px !important;
    height: 12px !important;
    max-height: 12px !important;
  }
  .jam-item img.icon-img,
  .jam-item img[alt='Clock'],
  .jam-item .icon-img {
      width: 16px !important;
      height: 16px !important;
      max-width: 16px !important;
      max-height: 16px !important;
  }
  .socials span {
    width: 26px !important;
    height: 26px !important;
  }
  .socials span .icon-img {
    width: 11px !important;
    height: 11px !important;
  }
  .socials svg.icon-img {
    width: 11px !important;
    height: 11px !important;
  }
  .copyright {
    padding: 10px !important;
    font-size: 10px !important;
    margin-top: 20px !important;
  }
}
"""

base_dir = 'd:/APP/xampp2/htdocs/sekretariat-dprd/wp-content/themes/dprd-theme/assets'

for file in css_files:
    filepath = os.path.join(base_dir, file)
    if os.path.exists(filepath):
        with open(filepath, 'a', encoding='utf-8') as f:
            f.write(override)
        print('Appended super compact override to ' + file)
    else:
        print('File ' + file + ' not found')
