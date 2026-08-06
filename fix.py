import os

theme_dir = r'd:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\themes\dprd-purbalingga'
files = ['page-profil.php', 'page-sakip.php', 'page-ppid.php', 'page-dlantunan.php', 'page-kontak.php']

for file in files:
    path = os.path.join(theme_dir, file)
    with open(path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    content = content.replace(r"\'", "'")
    
    with open(path, 'w', encoding='utf-8') as f:
        f.write(content)
