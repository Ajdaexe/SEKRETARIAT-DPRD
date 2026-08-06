import os
import re

html_dir = r'd:\APP\xampp2\htdocs\sekretariat-dprd\versi_html'
theme_dir = r'd:\APP\xampp2\htdocs\sekretariat-dprd\wp-content\themes\dprd-purbalingga'

pages = {
    'profile.html': 'page-profil.php',
    'sakip.html': 'page-sakip.php',
    'ppid.html': 'page-ppid.php',
    'dlantunan.html': 'page-dlantunan.php',
    'kontak.html': 'page-kontak.php'
}

def convert_asset_paths(content):
    # replace src="images/..."
    content = re.sub(r'src=(["\'])images/([^"\']+)\1', r'src=\1<?php echo get_template_directory_uri(); ?>/assets/images/\2\1', content)
    # replace href="images/..."
    content = re.sub(r'href=(["\'])images/([^"\']+)\1', r'href=\1<?php echo get_template_directory_uri(); ?>/assets/images/\2\1', content)
    # replace URL images in style="background-image: url(...) "
    content = re.sub(r'url\([\'"]?images/([^\'"\)]+)[\'"]?\)', r'url("<?php echo get_template_directory_uri(); ?>/assets/images/\1")', content)
    
    # replace HTML links with WordPress endpoints
    content = re.sub(r'href=["\']beranda\.html["\']', r'href="<?php echo home_url(\'/\'); ?>"', content)
    content = re.sub(r'href=["\']profile\.html["\']', r'href="<?php echo home_url(\'/profil\'); ?>"', content)
    content = re.sub(r'href=["\']sakip\.html["\']', r'href="<?php echo home_url(\'/sakip\'); ?>"', content)
    content = re.sub(r'href=["\']ppid\.html["\']', r'href="<?php echo home_url(\'/ppid\'); ?>"', content)
    content = re.sub(r'href=["\']dlantunan\.html["\']', r'href="<?php echo home_url(\'/dlantunan\'); ?>"', content)
    content = re.sub(r'href=["\']kontak\.html["\']', r'href="<?php echo home_url(\'/kontak\'); ?>"', content)

    # replace pdf/
    content = re.sub(r'["\']pdf/([^"\']+)["\']', r'"<?php echo get_template_directory_uri(); ?>/assets/pdf/\1"', content)

    # replace icon-img .png with .svg if .svg exists
    svg_files = [f for f in os.listdir(os.path.join(theme_dir, 'assets', 'images')) if f.endswith('.svg')]
    for svg_file in svg_files:
        png_equivalent = svg_file.replace('.svg', '.png')
        content = content.replace(png_equivalent, svg_file)

    return content

for html_file, php_file in pages.items():
    html_path = os.path.join(html_dir, html_file)
    php_path = os.path.join(theme_dir, php_file)
    
    with open(html_path, 'r', encoding='utf-8') as f:
        html_content = f.read()
        
    header_end = html_content.find('</header>')
    if header_end != -1:
        content = html_content[header_end + len('</header>'):]
    else:
        body_start = html_content.find('<body>')
        content = html_content[body_start + len('<body>'):]
        
    footer_start = content.find('<footer')
    if footer_start != -1:
        content = content[:footer_start]
        
    content = convert_asset_paths(content)
    
    template_name = php_file.replace('page-', '').replace('.php', '').capitalize()
    if template_name == 'Profil':
        template_name = 'Profile'
        
    php_content = f"""<?php
/*
Template Name: {template_name} Template
*/
get_header(); ?>

{content.strip()}

<?php get_footer(); ?>
"""
    
    with open(php_path, 'w', encoding='utf-8') as f:
        f.write(php_content)
        
    print(f'Converted {html_file} to {php_file}')
