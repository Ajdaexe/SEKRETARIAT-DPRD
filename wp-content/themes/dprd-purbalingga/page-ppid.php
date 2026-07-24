<?php
/**
 * Template Name: PPID
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative w-full h-[400px] bg-gray-900 flex items-center justify-center mt-[72px]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://via.placeholder.com/1920x400/8B1E1E/ffffff?text=Layanan+PPID" alt="Hero PPID" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">PPID</h1>
        <p class="text-xl md:text-2xl drop-shadow-md">Pejabat Pengelola Informasi dan Dokumentasi</p>
    </div>
</section>

<!-- Info Box UU KIP -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="bg-maroon text-white rounded-lg shadow-lg p-8 md:p-12 relative overflow-hidden">
            <div class="absolute -right-20 -top-20 opacity-10">
                <i class="fas fa-balance-scale text-9xl"></i>
            </div>
            <div class="relative z-10 md:w-3/4">
                <h2 class="text-2xl font-bold mb-4">Undang-Undang Keterbukaan Informasi Publik</h2>
                <p class="text-lg opacity-90 leading-relaxed mb-6">
                    Berdasarkan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik, Sekretariat DPRD Kabupaten Purbalingga berkomitmen penuh memberikan pelayanan informasi publik yang transparan, akuntabel, dan mudah diakses oleh seluruh lapisan masyarakat.
                </p>
                <a href="#tabel-dokumen" class="inline-block bg-white text-maroon hover:bg-cream font-bold py-2.5 px-6 rounded transition">
                    Cari Dokumen Informasi <i class="fas fa-search ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 4 Kategori Card -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Kategori Informasi
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Informasi Berkala -->
            <div class="bg-gray-50 rounded-xl p-6 text-center border border-gray-100 hover:border-maroon hover:shadow-lg transition group">
                <div class="w-16 h-16 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi Berkala</h3>
                <p class="text-gray-600 text-sm mb-6">Informasi yang wajib diperbaharui, disediakan dan diumumkan secara rutin.</p>
                <a href="#tabel-dokumen" onclick="document.getElementById('filter-kategori').value='informasi-berkala'; document.getElementById('filter-kategori').dispatchEvent(new Event('change'));" class="text-maroon font-semibold hover:underline text-sm inline-flex items-center">
                    Lihat Informasi <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            
            <!-- Informasi Serta Merta -->
            <div class="bg-gray-50 rounded-xl p-6 text-center border border-gray-100 hover:border-maroon hover:shadow-lg transition group">
                <div class="w-16 h-16 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi Serta Merta</h3>
                <p class="text-gray-600 text-sm mb-6">Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum.</p>
                <a href="#tabel-dokumen" onclick="document.getElementById('filter-kategori').value='informasi-serta-merta'; document.getElementById('filter-kategori').dispatchEvent(new Event('change'));" class="text-maroon font-semibold hover:underline text-sm inline-flex items-center">
                    Lihat Informasi <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            
            <!-- Informasi Setiap Saat -->
            <div class="bg-gray-50 rounded-xl p-6 text-center border border-gray-100 hover:border-maroon hover:shadow-lg transition group">
                <div class="w-16 h-16 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi Setiap Saat</h3>
                <p class="text-gray-600 text-sm mb-6">Informasi yang harus disediakan dan siap sedia untuk dapat langsung diberikan.</p>
                <a href="#tabel-dokumen" onclick="document.getElementById('filter-kategori').value='informasi-setiap-saat'; document.getElementById('filter-kategori').dispatchEvent(new Event('change'));" class="text-maroon font-semibold hover:underline text-sm inline-flex items-center">
                    Lihat Informasi <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            
            <!-- Laporan PPID -->
            <div class="bg-gray-50 rounded-xl p-6 text-center border border-gray-100 hover:border-maroon hover:shadow-lg transition group">
                <div class="w-16 h-16 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-2xl mb-4 group-hover:bg-cream group-hover:text-maroon transition">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Laporan PPID</h3>
                <p class="text-gray-600 text-sm mb-6">Laporan tahunan layanan informasi publik oleh Pejabat Pengelola Informasi dan Dokumentasi.</p>
                <a href="#tabel-dokumen" onclick="document.getElementById('filter-kategori').value='laporan-ppid'; document.getElementById('filter-kategori').dispatchEvent(new Event('change'));" class="text-maroon font-semibold hover:underline text-sm inline-flex items-center">
                    Lihat Informasi <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 4 Stat Card PPID -->
<section class="py-12 bg-maroon text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <?php
            // Mockup data for PPID stats, can be moved to ACF Options if needed
            $stat_info_berkala = get_field('stat_info_berkala', 'option') ?: '120+';
            $stat_info_sertamerta = get_field('stat_info_sertamerta', 'option') ?: '15';
            $stat_info_setiapsaat = get_field('stat_info_setiapsaat', 'option') ?: '85+';
            $stat_permohonan = get_field('stat_permohonan', 'option') ?: '450';
            ?>
            <div class="p-4 border-r border-white border-opacity-20 last:border-0">
                <h3 class="text-4xl font-bold mb-2 text-cream"><?php echo esc_html($stat_info_berkala); ?></h3>
                <p class="text-sm uppercase tracking-wider opacity-80">Dokumen Berkala</p>
            </div>
            <div class="p-4 border-r border-white border-opacity-20 hidden md:block">
                <h3 class="text-4xl font-bold mb-2 text-cream"><?php echo esc_html($stat_info_sertamerta); ?></h3>
                <p class="text-sm uppercase tracking-wider opacity-80">Dokumen Serta Merta</p>
            </div>
            <div class="p-4 border-r border-white border-opacity-20 last:border-0 md:hidden">
                <h3 class="text-4xl font-bold mb-2 text-cream"><?php echo esc_html($stat_permohonan); ?></h3>
                <p class="text-sm uppercase tracking-wider opacity-80">Permohonan Selesai</p>
            </div>
            <div class="p-4 border-r border-white border-opacity-20 hidden md:block">
                <h3 class="text-4xl font-bold mb-2 text-cream"><?php echo esc_html($stat_info_setiapsaat); ?></h3>
                <p class="text-sm uppercase tracking-wider opacity-80">Dokumen Setiap Saat</p>
            </div>
            <div class="p-4 hidden md:block">
                <h3 class="text-4xl font-bold mb-2 text-cream"><?php echo esc_html($stat_permohonan); ?></h3>
                <p class="text-sm uppercase tracking-wider opacity-80">Permohonan Selesai</p>
            </div>
        </div>
    </div>
</section>

<!-- Tabel Dokumen -->
<section id="tabel-dokumen" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Dokumen Informasi Publik
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        
        <?php 
        // Get the reusable table part
        get_template_part('template-parts/tabel', 'dokumen', array('grup_dokumen' => 'ppid')); 
        ?>
    </div>
</section>

<!-- CTA Ajukan Permohonan -->
<section class="py-16 bg-cream text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-maroon mb-4">Tidak Menemukan Informasi yang Dicari?</h2>
        <p class="text-gray-700 mb-8 max-w-2xl mx-auto">Anda memiliki hak untuk mengajukan permohonan informasi publik. Tim PPID kami siap membantu memfasilitasi kebutuhan informasi Anda sesuai dengan ketentuan yang berlaku.</p>
        <a href="<?php echo esc_url(site_url('/dlantunan')); ?>" class="inline-block bg-maroon hover:bg-maroon-dark text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:-translate-y-1">
            Ajukan Permohonan Informasi <i class="fas fa-file-signature ml-2"></i>
        </a>
    </div>
</section>

<?php get_footer(); ?>
