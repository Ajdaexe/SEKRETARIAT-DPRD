<?php
/**
 * Template Name: Profil
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative w-full h-[400px] bg-gray-900 flex items-center justify-center mt-[72px]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://via.placeholder.com/1920x400/8B1E1E/ffffff?text=Profil+Sekretariat" alt="Hero Profil" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4 mt-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Profil Sekretariat DPRD</h1>
        <p class="text-xl md:text-2xl drop-shadow-md">Kabupaten Purbalingga</p>
    </div>
</section>

<!-- Sekilas & Badge Grid -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 relative inline-block">
                    Sekilas Tentang Kami
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-maroon"></span>
                </h2>
                <div class="text-gray-700 leading-relaxed text-lg mb-6">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php 
                        $content = get_the_content();
                        if (trim($content)) {
                            the_content();
                        } else {
                            echo '<p>Sekretariat DPRD merupakan unsur pelayanan administrasi dan pemberian dukungan terhadap tugas dan fungsi DPRD Kabupaten Purbalingga. Kami berkomitmen memberikan pelayanan terbaik demi terwujudnya tata kelola pemerintahan yang baik.</p>';
                        }
                        ?>
                    <?php endwhile; else: ?>
                        <p>Sekretariat DPRD merupakan unsur pelayanan administrasi dan pemberian dukungan terhadap tugas dan fungsi DPRD Kabupaten Purbalingga. Kami berkomitmen memberikan pelayanan terbaik demi terwujudnya tata kelola pemerintahan yang baik.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Badges -->
                    <div class="bg-cream rounded-lg p-6 text-center border-l-4 border-maroon flex flex-col items-center justify-center shadow-sm hover:shadow-md transition">
                        <i class="fas fa-handshake text-3xl text-maroon mb-3"></i>
                        <h4 class="font-bold text-gray-900">Unsur Pelayanan</h4>
                    </div>
                    <div class="bg-cream rounded-lg p-6 text-center border-l-4 border-maroon flex flex-col items-center justify-center shadow-sm hover:shadow-md transition">
                        <i class="fas fa-user-tie text-3xl text-maroon mb-3"></i>
                        <h4 class="font-bold text-gray-900">Profesional</h4>
                    </div>
                    <div class="bg-cream rounded-lg p-6 text-center border-l-4 border-maroon flex flex-col items-center justify-center shadow-sm hover:shadow-md transition">
                        <i class="fas fa-clipboard-check text-3xl text-maroon mb-3"></i>
                        <h4 class="font-bold text-gray-900">Akuntabel</h4>
                    </div>
                    <div class="bg-cream rounded-lg p-6 text-center border-l-4 border-maroon flex flex-col items-center justify-center shadow-sm hover:shadow-md transition">
                        <i class="fas fa-users-cog text-3xl text-maroon mb-3"></i>
                        <h4 class="font-bold text-gray-900">Kolaboratif</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dasar Hukum -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 relative inline-block">
                Dasar Hukum
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto border-t-4 border-maroon">
            <ul class="list-disc pl-6 text-gray-700 space-y-3">
                <li>Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah.</li>
                <li>Peraturan Pemerintah Nomor 18 Tahun 2016 tentang Perangkat Daerah.</li>
                <li>Peraturan Daerah Kabupaten Purbalingga Nomor 12 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Purbalingga.</li>
                <li>Peraturan Bupati Purbalingga tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi, serta Tata Kerja Sekretariat DPRD.</li>
            </ul>
        </div>
    </div>
</section>

<!-- Struktur Organisasi & Susunan -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 relative inline-block">
                Struktur & Susunan Organisasi
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="lg:w-1/2">
                <h3 class="text-2xl font-bold text-maroon mb-6 border-l-4 border-maroon pl-3">Struktur Organisasi</h3>
                <div class="bg-gray-50 rounded-lg p-2 border border-gray-200 shadow-inner">
                    <img src="https://via.placeholder.com/800x600?text=Bagan+Struktur+Organisasi" alt="Bagan Struktur Organisasi" class="w-full h-auto rounded">
                </div>
            </div>
            
            <div class="lg:w-1/2">
                <h3 class="text-2xl font-bold text-maroon mb-6 border-l-4 border-maroon pl-3">Susunan Organisasi</h3>
                <div class="bg-cream rounded-lg p-8 h-full shadow-sm">
                    <ul class="space-y-4 text-gray-800">
                        <li class="font-bold flex items-start"><i class="fas fa-caret-right text-maroon mt-1 mr-2"></i> Sekretaris DPRD</li>
                        <li class="pl-6 font-semibold flex items-start"><i class="fas fa-caret-right text-maroon mt-1 mr-2"></i> <span>Bagian Umum
                            <ul class="pl-0 mt-2 font-normal text-gray-700 space-y-2">
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Tata Usaha dan Kepegawaian</li>
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Rumah Tangga dan Perlengkapan</li>
                            </ul></span>
                        </li>
                        <li class="pl-6 font-semibold flex items-start"><i class="fas fa-caret-right text-maroon mt-1 mr-2"></i> <span>Bagian Fasilitasi Penganggaran dan Pengawasan
                            <ul class="pl-0 mt-2 font-normal text-gray-700 space-y-2">
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Fasilitasi Penganggaran</li>
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Fasilitasi Pengawasan</li>
                            </ul></span>
                        </li>
                        <li class="pl-6 font-semibold flex items-start"><i class="fas fa-caret-right text-maroon mt-1 mr-2"></i> <span>Bagian Persidangan dan Perundang-undangan
                            <ul class="pl-0 mt-2 font-normal text-gray-700 space-y-2">
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Persidangan, Risalah dan Publikasi</li>
                                <li class="flex items-start"><i class="fas fa-minus text-xs text-gray-400 mt-1.5 mr-2"></i> Subbagian Perundang-undangan</li>
                            </ul></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="py-16 bg-maroon text-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-5 rounded-full -ml-20 -mt-20"></div>
    <div class="absolute bottom-0 right-0 w-48 h-48 bg-white opacity-5 rounded-full -mr-10 -mb-10"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold relative inline-block">
                Visi & Misi
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-cream mx-auto opacity-50"></span>
            </h2>
        </div>
        
        <div class="flex flex-col md:flex-row gap-8 max-w-5xl mx-auto">
            <div class="md:w-1/3 bg-white bg-opacity-10 p-8 rounded-lg border border-white border-opacity-20 backdrop-filter backdrop-blur-sm shadow-lg">
                <div class="w-16 h-16 mx-auto bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-eye text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-cream mb-4 text-center">Visi</h3>
                <p class="text-center text-lg italic leading-relaxed">
                    "Terwujudnya pelayanan yang prima dan profesional dalam memfasilitasi tugas pokok dan fungsi DPRD Kabupaten Purbalingga."
                </p>
            </div>
            <div class="md:w-2/3 bg-white bg-opacity-10 p-8 rounded-lg border border-white border-opacity-20 backdrop-filter backdrop-blur-sm shadow-lg">
                <div class="w-16 h-16 mx-auto bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-4 md:hidden">
                    <i class="fas fa-bullseye text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold text-cream mb-4 text-center md:text-left flex items-center">
                    <i class="fas fa-bullseye mr-3 hidden md:inline-block"></i> Misi
                </h3>
                <ol class="list-decimal pl-5 space-y-4 text-lg">
                    <li class="pl-2">Meningkatkan kualitas pelayanan administrasi kesekretariatan dan administrasi keuangan.</li>
                    <li class="pl-2">Meningkatkan kualitas fasilitasi penyelenggaraan rapat-rapat DPRD.</li>
                    <li class="pl-2">Meningkatkan kualitas fasilitasi pembentukan Peraturan Daerah, pembahasan anggaran, dan pengawasan.</li>
                    <li class="pl-2">Meningkatkan kualitas pengelolaan informasi dan dokumentasi publik.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Tugas Pokok & Fungsi (Tupoksi) Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Tugas Pokok & Fungsi
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">Dalam melaksanakan tugasnya, Sekretariat DPRD menyelenggarakan fungsi sebagai berikut:</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    1
                </div>
                <p class="text-gray-700 leading-relaxed font-medium">Penyelenggaraan administrasi kesekretariatan DPRD.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    2
                </div>
                <p class="text-gray-700 leading-relaxed font-medium">Penyelenggaraan administrasi keuangan DPRD.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    3
                </div>
                <p class="text-gray-700 leading-relaxed font-medium">Fasilitasi penyelenggaraan rapat DPRD.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    4
                </div>
                <p class="text-gray-700 leading-relaxed font-medium">Penyediaan dan pengoordinasian tenaga ahli yang diperlukan oleh DPRD.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    5
                </div>
                <p class="text-gray-700 leading-relaxed font-medium text-sm">Pembinaan dan pelaksanaan tugas di bidang umum, fasilitasi penganggaran dan pengawasan, serta persidangan dan perundang-undangan.</p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition border-t-4 border-maroon">
                <div class="w-14 h-14 bg-cream text-maroon rounded-full flex items-center justify-center text-2xl font-bold mb-6">
                    6
                </div>
                <p class="text-gray-700 leading-relaxed font-medium">Pelaksanaan fungsi lain yang diberikan oleh Pimpinan sesuai dengan tugas dan fungsinya.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
