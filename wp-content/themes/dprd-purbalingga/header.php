<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'maroon': {
                            DEFAULT: '#8B1E1E',
                            'dark': '#A61C1C',
                        },
                        'krem': '#FBEAEA',
                        'krem-light': '#FDF3F0',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-maroon text-white font-bold py-2 px-6 rounded-full hover:bg-maroon-dark transition duration-300 inline-flex items-center;
            }
            .card {
                @apply bg-white rounded-xl shadow-md p-6;
            }
        }
    </style>
</head>
<body <?php body_class('bg-gray-50 text-gray-800 font-sans antialiased'); ?>>
<?php wp_body_open(); ?>

<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <!-- Asumsi ada logo dprd di media library, atau kita pakai custom logo wp -->
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <div class="w-10 h-12 bg-maroon rounded-md flex items-center justify-center text-white font-bold text-xs">LOGO</div>
            <?php endif; ?>
            <div class="leading-tight">
                <h1 class="text-maroon font-bold text-lg md:text-xl m-0"><a href="<?php echo esc_url(home_url('/')); ?>">Sekretariat DPRD</a></h1>
                <p class="text-gray-500 text-xs md:text-sm m-0">Kabupaten Purbalingga</p>
            </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-6">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'container' => false,
                'menu_class' => 'flex gap-6 text-sm font-semibold text-gray-700',
                'fallback_cb' => false,
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            ));
            ?>
            <button class="text-maroon hover:text-maroon-dark focus:outline-none">
                <i class="fas fa-search"></i>
            </button>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden text-gray-700 focus:outline-none text-2xl">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Navigation (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 py-2">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => 'flex flex-col gap-3 text-sm font-semibold text-gray-700 pb-4',
            'fallback_cb' => false,
        ));
        ?>
    </div>
</header>
<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
<main id="primary" class="site-main">
