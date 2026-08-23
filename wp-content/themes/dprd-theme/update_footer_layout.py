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
/* FOOTER GRID 2-COLUMNS FOR CONTACT & HOURS ON MOBILE */
@media(max-width: 980px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr !important;
    gap: 16px !important;
  }
  .footer-grid > div:first-child {
    grid-column: 1 / -1 !important;
    text-align: left;
  }
}
"""

base_dir = 'd:/APP/xampp2/htdocs/sekretariat-dprd/wp-content/themes/dprd-theme/assets'

for file in css_files:
    filepath = os.path.join(base_dir, file)
    if os.path.exists(filepath):
        with open(filepath, 'a', encoding='utf-8') as f:
            f.write(override)
        print('Appended footer grid layout override to ' + file)
    else:
        print('File ' + file + ' not found')
