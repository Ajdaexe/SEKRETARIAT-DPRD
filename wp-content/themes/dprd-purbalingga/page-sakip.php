<?php
/**
 * Template Name: Sakip
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative w-full h-[400px] bg-gray-900 flex items-center justify-center mt-[72px]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://via.placeholder.com/1920x400/8B1E1E/ffffff?text=Layanan+Sakip" alt="Hero Sakip" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">SAKIP</h1>
        <p class="text-xl md:text-2xl drop-shadow-md">Sistem Akuntabilitas Kinerja Instansi Pemerintah</p>
    </div>
</section>

<!-- 4 Stat Card Sakip -->
<section class="py-12 bg-white -mt-10 relative z-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            // Mockup data for Sakip stats, can be moved to ACF Options
            $stat_sakip_nilai = get_field('stat_sakip_nilai', 'option') ?: 'A';
            $stat_sakip_dokumen = get_field('stat_sakip_dokumen', 'option') ?: '45+';
            $stat_sakip_indikator = get_field('stat_sakip_indikator', 'option') ?: '12';
            $stat_sakip_tahun = get_field('stat_sakip_tahun', 'option') ?: date('Y');
            ?>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl font-bold">
                    <?php echo esc_html($stat_sakip_nilai); ?>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Nilai SAKIP</h3>
                <p class="text-gray-500 text-sm">Predikat Akuntabilitas Kinerja</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_sakip_dokumen); ?></h3>
                <p class="text-gray-500 text-sm">Dokumen Kinerja</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_sakip_indikator); ?></h3>
                <p class="text-gray-500 text-sm">Indikator Kinerja Utama</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_sakip_tahun); ?></h3>
                <p class="text-gray-500 text-sm">Tahun Pelaporan</p>
            </div>
        </div>
    </div>
</section>

<!-- Dokumen Unggulan (Featured) -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Dokumen Kinerja Utama
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            // Query for featured SAKIP documents
            $featured_args = array(
                'post_type'      => 'dokumen',
                'posts_per_page' => 3,
                'meta_query'     => array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'grup_dokumen',
                        'value'   => 'sakip',
                        'compare' => '='
                    ),
                    array(
                        'key'     => 'dokumen_unggulan',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            );
            $featured_query = new WP_Query($featured_args);

            if ($featured_query->have_posts()) :
                while ($featured_query->have_posts()) : $featured_query->the_post();
                    $tahun = get_field('tahun_dokumen');
                    $file_pdf = get_field('file_pdf');
            ?>
                <div class="bg-white rounded-lg shadow-md p-8 border border-gray-100 hover:border-maroon hover:shadow-xl transition group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-maroon text-white rounded-bl-full flex items-start justify-end p-3">
                        <i class="fas fa-star text-sm mt-1 mr-1"></i>
                    </div>
                    
                    <div class="w-16 h-16 bg-cream text-maroon rounded-lg flex items-center justify-center text-3xl mb-6">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    
                    <div class="text-xs font-bold text-maroon uppercase tracking-wider mb-2">Tahun <?php echo esc_html($tahun); ?></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 line-clamp-2"><?php the_title(); ?></h3>
                    
                    <?php if ($file_pdf) : ?>
                        <a href="<?php echo esc_url($file_pdf['url']); ?>" class="inline-flex items-center text-maroon font-semibold hover:underline mt-4 group-hover:text-maroon-dark transition" target="_blank" rel="noopener">
                            <i class="fas fa-download mr-2"></i> Unduh Dokumen
                        </a>
                    <?php else : ?>
                        <span class="text-gray-400 text-sm italic mt-4 block">File tidak tersedia</span>
                    <?php endif; ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-span-3 text-center py-10 bg-white rounded-lg border border-dashed border-gray-300 text-gray-500">
                    Belum ada dokumen unggulan.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Tabel Dokumen -->
<section id="tabel-dokumen" class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Seluruh Dokumen SAKIP
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        
        <?php 
        // Get the reusable table part
        get_template_part('template-parts/tabel', 'dokumen', array('grup_dokumen' => 'sakip')); 
        ?>
    </div>
</section>

<?php get_footer(); ?>
