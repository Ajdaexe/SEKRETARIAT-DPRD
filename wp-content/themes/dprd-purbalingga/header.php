<?php
/**
 * The header for our theme
 *
 * @package dprd-purbalingga
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-page="<?php echo is_front_page() ? 'beranda' : (is_page() ? get_post_field('post_name') : ''); ?>">
<?php wp_body_open(); ?>

<header class="site-header">
    <nav class="nav">
        <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-header.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        </a>
        
        <div class="nav-links" id="navLinks">
            <?php
            // We use a custom loop to output <a> tags directly to match the frontend CSS.
            // wp_nav_menu() is not used here because it generates <li> tags by default.
            $locations = get_nav_menu_locations();
            if ( isset( $locations['menu-1'] ) ) {
                $menu = wp_get_nav_menu_object( $locations['menu-1'] );
                if ( $menu ) {
                    $menu_items = wp_get_nav_menu_items( $menu->term_id );
                    foreach ( (array) $menu_items as $key => $menu_item ) {
                        $title = $menu_item->title;
                        
                        // Abaikan "Laman Contoh" jika terbawa otomatis oleh WordPress
                        if ( strtolower($title) === 'laman contoh' ) {
                            continue;
                        }

                        $is_active = ($menu_item->object_id == get_queried_object_id()) ? 'active' : '';
                        $url = $menu_item->url;
                        
                        // Handle dropdown for SAKIP if needed
                        if(strtolower($title) == 'sakip') {
                            echo '<div class="dropdown">';
                            echo '<a class="' . esc_attr($is_active) . '" href="' . esc_url($url) . '">' . esc_html($title) . ' ▾</a>';
                            echo '<div class="dropdown-menu">';
                            echo '<a href="' . esc_url(site_url('/sakip')) . '">Dokumen SAKIP</a>';
                            echo '<a href="' . esc_url(site_url('/sakip#perencanaan')) . '">Perencanaan</a>';
                            echo '<a href="' . esc_url(site_url('/sakip#pelaporan')) . '">Pelaporan</a>';
                            echo '</div></div>';
                        } else {
                            echo '<a class="' . esc_attr($is_active) . '" href="' . esc_url($url) . '">' . esc_html($title) . '</a>';
                        }
                    }
                } else {
                    dprd_default_nav_fallback();
                }
            } else {
                dprd_default_nav_fallback();
            }
            
            function dprd_default_nav_fallback() {
                $page_slug = is_page() ? get_post_field('post_name') : (is_front_page() ? 'beranda' : '');
                $navItems = array(
                    'beranda' => array('Beranda', site_url('/')),
                    'profil' => array('Profil', site_url('/profil')),
                    'kontak' => array('Kontak', site_url('/kontak')),
                    'ppid' => array('PPID', site_url('/ppid')),
                    'sakip' => array('SAKIP', site_url('/sakip')),
                    'dlantunan' => array('D\'Lantunan', site_url('/dlantunan'))
                );
                
                foreach($navItems as $id => $data) {
                    $active = ($page_slug == $id) ? 'active' : '';
                    if($id == 'sakip') {
                        echo '<div class="dropdown">';
                        echo '<a class="' . $active . '" href="' . $data[1] . '">' . $data[0] . ' ▾</a>';
                        echo '<div class="dropdown-menu">';
                        echo '<a href="' . site_url('/sakip') . '">Dokumen SAKIP</a>';
                        echo '<a href="' . site_url('/sakip#perencanaan') . '">Perencanaan</a>';
                        echo '<a href="' . site_url('/sakip#pelaporan') . '">Pelaporan</a>';
                        echo '</div></div>';
                    } else {
                        echo '<a class="' . $active . '" href="' . $data[1] . '">' . $data[0] . '</a>';
                    }
                }
            }
            ?>
        </div>
        
        <div class="nav-tools">
            <button class="icon-btn" id="searchBtn" aria-label="Cari">⌕</button>
            <button class="icon-btn menu-btn" id="menuBtn" aria-label="Menu">☰</button>
        </div>
    </nav>
</header>
<main>
