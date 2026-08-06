import os
import glob

theme_dir = r'd:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\themes\dprd-purbalingga'

# All PHP files in theme root
php_files = glob.glob(os.path.join(theme_dir, '*.php'))

for file_path in php_files:
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Replace CSS and JS paths
    content = content.replace('/assets/css/', '/')
    content = content.replace('/assets/js/', '/')
    
    # Replace images and pdf paths
    content = content.replace('/assets/images/', '/images/')
    content = content.replace('/assets/pdf/', '/pdf/')

    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(content)
        
print("Paths fixed successfully.")
