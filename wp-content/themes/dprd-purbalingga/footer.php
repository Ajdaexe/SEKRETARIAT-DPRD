</main>

<footer class="bg-gray-900 text-white mt-16">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Kolom 1: Profil & Sosmed -->
            <div>
                <h3 class="text-xl font-bold mb-4 text-maroon-dark">Sekretariat DPRD</h3>
                <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                    Website Resmi Sekretariat DPRD Kabupaten Purbalingga. Menyajikan informasi terkini seputar kegiatan dewan, dokumen publik, dan layanan aspirasi.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-maroon transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-maroon transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-maroon transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-maroon transition"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Kontak Kami -->
            <div>
                <h3 class="text-xl font-bold mb-4 border-b border-gray-700 pb-2 inline-block">Kontak Kami</h3>
                <ul class="text-gray-400 text-sm space-y-3">
                    <?php 
                        // Mengambil data dari ACF Options Page
                        $alamat = function_exists('get_field') ? get_field('kontak_alamat', 'option') : 'Jl. Onje No.2A, Purbalingga';
                        $telp = function_exists('get_field') ? get_field('kontak_telp', 'option') : '(0281) 891000';
                        $email = function_exists('get_field') ? get_field('kontak_email', 'option') : 'sekretariat@dprd.purbalingga.go.id';
                    ?>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-maroon"></i>
                        <span><?php echo esc_html($alamat); ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-maroon"></i>
                        <span><?php echo esc_html($telp); ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-maroon"></i>
                        <span><?php echo esc_html($email); ?></span>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Jam Layanan -->
            <div>
                <h3 class="text-xl font-bold mb-4 border-b border-gray-700 pb-2 inline-block">Jam Layanan</h3>
                <div class="text-gray-400 text-sm">
                    <?php 
                        $jam = function_exists('get_field') ? get_field('kontak_jam_layanan', 'option') : "Senin - Kamis: 07.00 - 15.30 WIB\nJumat: 07.00 - 11.00 WIB";
                        echo nl2br(esc_html($jam));
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copyright Bar -->
    <div class="bg-maroon py-4 text-center">
        <p class="text-white/80 text-xs">
            &copy; <?php echo date('Y'); ?> Sekretariat DPRD Kabupaten Purbalingga. All Rights Reserved.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
