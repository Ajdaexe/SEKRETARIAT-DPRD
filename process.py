import os

def process_file(in_file, out_file):
    with open(in_file, 'r', encoding='utf-8') as f:
        content = f.read()

    start_str = '<!-- ===== HERO ===== -->'
    end_str = '<!-- ===== FOOTER ===== -->'
    
    start_idx = content.find(start_str)
    end_idx = content.find(end_str)
    
    if start_idx == -1 or end_idx == -1:
        print(f"Error: Markers not found in {in_file}")
        return
        
    body = content[start_idx:end_idx]
    
    # Replace images/ with <?php echo get_template_directory_uri(); ?>/assets/images/
    body = body.replace('"images/', '"<?php echo get_template_directory_uri(); ?>/assets/images/')
    
    # Also replace any single quote image references if they exist
    body = body.replace("'images/", "'<?php echo get_template_directory_uri(); ?>/assets/images/")
    
    template_name = os.path.basename(out_file).replace('.php', '')
    
    header = f"<?php\n/**\n * Template Name: {template_name.replace('page-', '').capitalize()}\n *\n * @package dprd-purbalingga\n */\n\nget_header();\n?>\n\n"
    footer = "\n<?php get_footer(); ?>\n"
    
    with open(out_file, 'w', encoding='utf-8') as f:
        f.write(header + body + footer)
        
    print(f"Processed {in_file} -> {out_file}")

base_dir = r"d:\APP\xampp2\htdocs\sekretariat-dprd"
process_file(
    os.path.join(base_dir, r"html-tambahan\dlantunan.html"),
    os.path.join(base_dir, r"wp-content\themes\dprd-purbalingga\page-dlantunan.php")
)
process_file(
    os.path.join(base_dir, r"html-tambahan\kontak.html"),
    os.path.join(base_dir, r"wp-content\themes\dprd-purbalingga\page-kontak.php")
)
process_file(
    os.path.join(base_dir, r"html-tambahan\profile.html"),
    os.path.join(base_dir, r"wp-content\themes\dprd-purbalingga\page-profil.php")
)
