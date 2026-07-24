<?php
/**
 * Template Name: Kontak
 *
 * @package dprd-purbalingga
 */

get_header();

// Fetch contact data from ACF Options if available
$kontak_alamat = get_field('kontak_alamat', 'option') ?: 'Jl. Onje No. 2A, Purbalingga, Jawa Tengah';
$kontak_telp = get_field('kontak_telp', 'option') ?: '(0281) 891011';
$kontak_email = get_field('kontak_email', 'option') ?: 'sekretariat@dprd.purbalingga.go.id';
$kontak_jam = get_field('kontak_jam', 'option') ?: 'Senin - Kamis: 07.00 - 15.30 WIB<br>Jumat: 07.00 - 11.00 WIB';
$kontak_facebook = get_field('kontak_facebook', 'option') ?: '#';
$kontak_instagram = get_field('kontak_instagram', 'option') ?: '#';
$kontak_twitter = get_field('kontak_twitter', 'option') ?: '#';
$kontak_youtube = get_field('kontak_youtube', 'option') ?: '#';
?>

<!-- Hero Section -->
<section class="relative w-full h-[350px] bg-gray-900 flex items-center justify-center mt-[72px]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://via.placeholder.com/1920x350/8B1E1E/ffffff?text=Kontak+Kami" alt="Hero Kontak" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Hubungi Kami</h1>
        <p class="text-xl drop-shadow-md">Kami siap melayani dan mendengarkan aspirasi Anda</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- Contact Info & Map (Left Column) -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-8 mb-8 border-t-4 border-maroon">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                    
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="w-10 h-10 bg-cream text-maroon rounded-full flex items-center justify-center shrink-0 mt-1 mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Alamat</h4>
                                <p class="text-gray-600"><?php echo wp_kses_post($kontak_alamat); ?></p>
                            </div>
                        </li>
                        
                        <li class="flex items-start">
                            <div class="w-10 h-10 bg-cream text-maroon rounded-full flex items-center justify-center shrink-0 mt-1 mr-4">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Telepon</h4>
                                <p class="text-gray-600"><?php echo esc_html($kontak_telp); ?></p>
                            </div>
                        </li>
                        
                        <li class="flex items-start">
                            <div class="w-10 h-10 bg-cream text-maroon rounded-full flex items-center justify-center shrink-0 mt-1 mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Email</h4>
                                <a href="mailto:<?php echo esc_attr($kontak_email); ?>" class="text-maroon hover:underline"><?php echo esc_html($kontak_email); ?></a>
                            </div>
                        </li>
                        
                        <li class="flex items-start">
                            <div class="w-10 h-10 bg-cream text-maroon rounded-full flex items-center justify-center shrink-0 mt-1 mr-4">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Jam Layanan</h4>
                                <p class="text-gray-600"><?php echo wp_kses_post($kontak_jam); ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-8 border-t-4 border-maroon">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Ikuti Kami</h2>
                    <div class="flex space-x-4">
                        <a href="<?php echo esc_url($kontak_facebook); ?>" class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-maroon hover:text-white transition shadow-sm" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="<?php echo esc_url($kontak_instagram); ?>" class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-maroon hover:text-white transition shadow-sm" target="_blank" rel="noopener">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="<?php echo esc_url($kontak_twitter); ?>" class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-maroon hover:text-white transition shadow-sm" target="_blank" rel="noopener">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="<?php echo esc_url($kontak_youtube); ?>" class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center hover:bg-maroon hover:text-white transition shadow-sm" target="_blank" rel="noopener">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form (Right Column) -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-md p-8 h-full border-t-4 border-maroon">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
                    <p class="text-gray-600 mb-8">Silakan isi formulir di bawah ini untuk mengirimkan pesan, pertanyaan, atau masukan kepada kami.</p>
                    
                    <div class="prose max-w-none contact-form-wrapper">
                        <?php 
                        // The content should contain the Contact Form 7 shortcode
                        // Usually something like: [contact-form-7 id="123" title="Contact form 1"]
                        $content = '';
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                $content = get_the_content();
                                if (trim($content)) {
                                    the_content();
                                }
                            }
                        }
                        ?>
                        
                        <?php if(!trim($content)): ?>
                            <div class="bg-cream p-4 rounded text-maroon text-center italic border border-maroon border-dashed">
                                Form Kontak belum diatur. Silakan tambahkan shortcode form (seperti Contact Form 7) pada konten halaman di dashboard admin.
                            </div>
                            
                            <!-- Placeholder form for visual completeness -->
                            <form class="mt-6" onsubmit="event.preventDefault();">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap *</label>
                                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent" id="name" type="text" placeholder="Masukkan nama Anda">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email *</label>
                                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent" id="email" type="email" placeholder="Masukkan alamat email">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">Subjek</label>
                                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent" id="subject" type="text" placeholder="Subjek pesan">
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">Pesan *</label>
                                    <textarea class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent" id="message" rows="5" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                                </div>
                                <div>
                                    <button class="bg-maroon hover:bg-maroon-dark text-white font-bold py-3 px-8 rounded focus:outline-none focus:shadow-outline transition w-full md:w-auto" type="button">
                                        Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Google Maps Embed -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Lokasi Kantor</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden h-[400px]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1m2!1s0x2e655c3132646b5d%3A0x6b2e1136b850428d!2sDPRD%20Kabupaten%20Purbalingga!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
