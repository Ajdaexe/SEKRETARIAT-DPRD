<?php
/**
 * The template for displaying the front page
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative w-full h-[600px] bg-gray-900 flex items-center justify-center">
    <div class="absolute inset-0 w-full h-full">
        <!-- Placeholder image, will be replaced with actual image -->
        <img src="https://via.placeholder.com/1920x600/8B1E1E/ffffff?text=Gedung+DPRD+Purbalingga" alt="Gedung DPRD" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">Selamat Datang di Sekretariat DPRD</h1>
        <p class="text-xl md:text-2xl mb-8 drop-shadow-md">Kabupaten Purbalingga</p>
        <a href="#tentang-kami" class="inline-block bg-maroon hover:bg-maroon-dark text-white font-bold py-3 px-8 rounded-full transition duration-300">
            Kenali Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</section>

<!-- 4 Stat Card (Mockup: 150+ Pegawai, 45 Agenda, 250+ Dokumen, 100% Transparan) -->
<section class="py-12 bg-white -mt-20 relative z-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            // Try getting from ACF if available, else fallback to hardcoded
            $stat_pegawai = get_field('stat_pegawai', 'option') ?: '150+';
            $stat_agenda = get_field('stat_agenda', 'option') ?: '45';
            $stat_dokumen = get_field('stat_dokumen', 'option') ?: '250+';
            $stat_transparan = get_field('stat_transparan', 'option') ?: '100%';
            ?>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_pegawai); ?></h3>
                <p class="text-gray-600 font-medium">Pegawai</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_agenda); ?></h3>
                <p class="text-gray-600 font-medium">Agenda Tahunan</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_dokumen); ?></h3>
                <p class="text-gray-600 font-medium">Dokumen Publik</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center border-b-4 border-maroon">
                <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center mb-4 text-maroon text-2xl">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-2"><?php echo esc_html($stat_transparan); ?></h3>
                <p class="text-gray-600 font-medium">Transparan</p>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Kami & Video Embed -->
<section id="tentang-kami" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                    Tentang Kami
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-maroon"></span>
                </h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Sekretariat DPRD Kabupaten Purbalingga memiliki tugas menyelenggarakan administrasi kesekretariatan, administrasi keuangan, mendukung pelaksanaan tugas dan fungsi DPRD, dan menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD sesuai dengan kemampuan keuangan daerah.
                </p>
                <a href="<?php echo esc_url(site_url('/profil')); ?>" class="text-maroon font-semibold hover:underline flex items-center">
                    Baca Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg bg-gray-200 relative pb-[56.25%] h-0">
                    <!-- YouTube Video Embed Placeholder -->
                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/Q0CbN8sfihY" title="Video Rapat Paripurna" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Akses Cepat -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 inline-block relative">
                Akses Cepat Layanan
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
            <p class="text-gray-600">Pilih menu di bawah ini untuk mengakses informasi dengan cepat</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Profil -->
            <a href="<?php echo esc_url(site_url('/profil')); ?>" class="block group">
                <div class="bg-gray-50 rounded-xl p-8 text-center transition duration-300 transform group-hover:-translate-y-2 group-hover:shadow-xl border border-gray-100 group-hover:border-maroon">
                    <div class="w-20 h-20 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Profil</h3>
                    <p class="text-gray-500 text-sm">Informasi tentang Sekretariat DPRD</p>
                </div>
            </a>
            
            <!-- PPID -->
            <a href="<?php echo esc_url(site_url('/ppid')); ?>" class="block group">
                <div class="bg-gray-50 rounded-xl p-8 text-center transition duration-300 transform group-hover:-translate-y-2 group-hover:shadow-xl border border-gray-100 group-hover:border-maroon">
                    <div class="w-20 h-20 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">PPID</h3>
                    <p class="text-gray-500 text-sm">Layanan Informasi Publik Terpadu</p>
                </div>
            </a>

            <!-- Sakip -->
            <a href="<?php echo esc_url(site_url('/sakip')); ?>" class="block group">
                <div class="bg-gray-50 rounded-xl p-8 text-center transition duration-300 transform group-hover:-translate-y-2 group-hover:shadow-xl border border-gray-100 group-hover:border-maroon">
                    <div class="w-20 h-20 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sakip</h3>
                    <p class="text-gray-500 text-sm">Sistem Akuntabilitas Kinerja Instansi</p>
                </div>
            </a>

            <!-- D'Lantunan -->
            <a href="<?php echo esc_url(site_url('/dlantunan')); ?>" class="block group">
                <div class="bg-gray-50 rounded-xl p-8 text-center transition duration-300 transform group-hover:-translate-y-2 group-hover:shadow-xl border border-gray-100 group-hover:border-maroon">
                    <div class="w-20 h-20 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">D'Lantunan</h3>
                    <p class="text-gray-500 text-sm">Layanan Bantuan dan Fasilitasi</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Banner IKM -->
<section class="py-16 bg-maroon text-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-10 -mb-10"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-8 md:mb-0 md:w-2/3">
                <h2 class="text-3xl font-bold mb-4">Indeks Kepuasan Masyarakat (IKM)</h2>
                <?php
                    $ikm_semester = get_field('ikm_semester', 'option') ?: 'Semester I';
                    $ikm_tahun = get_field('ikm_tahun', 'option') ?: '2026';
                    $ikm_predikat = get_field('ikm_predikat', 'option') ?: 'Sangat Baik';
                ?>
                <p class="text-xl opacity-90">Berdasarkan hasil survei <?php echo esc_html($ikm_semester . ' Tahun ' . $ikm_tahun); ?>, pelayanan kami mendapatkan predikat <strong>"<?php echo esc_html($ikm_predikat); ?>"</strong>.</p>
            </div>
            <div class="md:w-1/3 text-center md:text-right">
                <?php $ikm_nilai = get_field('ikm_nilai', 'option') ?: '89.5'; ?>
                <div class="inline-block bg-white text-maroon rounded-full w-40 h-40 flex items-center justify-center text-5xl font-bold border-4 border-cream shadow-2xl">
                    <?php echo esc_html($ikm_nilai); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Terbaru (Berita/Post) -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2 relative inline-block">
                    Informasi Terbaru
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-maroon"></span>
                </h2>
                <p class="text-gray-600 mt-2">Kabar dan berita terkini dari Sekretariat DPRD</p>
            </div>
            <a href="<?php echo esc_url(site_url('/berita')); ?>" class="hidden md:inline-block text-maroon font-semibold hover:underline">
                Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type'      => 'berita', // Assuming CPT is 'berita'
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            );
            $query = new WP_Query($args);

            // If no 'berita', fallback to 'post'
            if (!$query->have_posts()) {
                $args['post_type'] = 'post';
                $query = new WP_Query($args);
            }

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                <article class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover transition duration-500 hover:scale-110')); ?>
                        <?php else: ?>
                            <img src="https://via.placeholder.com/600x400?text=No+Image" alt="No image" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-gray-500 mb-2 flex items-center">
                            <i class="far fa-calendar-alt mr-2"></i> <?php echo get_the_date(); ?>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-maroon transition"><?php the_title(); ?></a>
                        </h3>
                        <div class="text-gray-600 text-sm mb-4 line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-maroon font-semibold text-sm hover:underline flex items-center">
                            Baca Selengkapnya <i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-span-3 text-center py-10 text-gray-500">
                    Belum ada informasi terbaru.
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Mobile View All Button -->
        <div class="mt-8 text-center md:hidden">
            <a href="<?php echo esc_url(site_url('/berita')); ?>" class="inline-block border-2 border-maroon text-maroon font-bold py-2 px-6 rounded-full hover:bg-maroon hover:text-white transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="bg-cream py-16 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-maroon mb-4">Butuh Informasi Lebih Lanjut?</h2>
        <p class="text-gray-700 mb-8 max-w-2xl mx-auto">Kami siap melayani kebutuhan informasi Anda. Hubungi kami melalui kontak yang tersedia atau kunjungi kantor Sekretariat DPRD Kabupaten Purbalingga.</p>
        <a href="<?php echo esc_url(site_url('/kontak')); ?>" class="inline-block bg-maroon hover:bg-maroon-dark text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:-translate-y-1">
            Hubungi Kami Sekarang <i class="fas fa-paper-plane ml-2"></i>
        </a>
    </div>
</section>

<?php get_footer(); ?>
