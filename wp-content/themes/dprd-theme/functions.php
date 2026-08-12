<?php
/**
 * Tema Kustom DPRD functions and definitions
 *
 * @package nama-tema-kustom
 */

if ( ! function_exists( 'tema_kustom_dprd_setup' ) ) :
    function tema_kustom_dprd_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register navigation menus
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'tema-kustom-dprd' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'tema_kustom_dprd_setup' );

/**
 * Enqueue scripts and styles.
 */
function tema_kustom_dprd_scripts() {
    // Styles
    wp_enqueue_style( 'tema-kustom-dprd-style', get_stylesheet_uri(), array(), time() );
    
    // Page specific styles
    if ( is_page_template('page-dlantunan.php') || is_page('dlantunan') || is_page('d-lantunan') ) {
        wp_enqueue_style( 'tema-kustom-dlantunan', get_template_directory_uri() . '/assets/dlantunan-style.css', array(), time() );
    }
    if ( is_page_template('page-kontak.php') || is_page('kontak') ) {
        wp_enqueue_style( 'tema-kustom-kontak', get_template_directory_uri() . '/assets/kontak-style.css', array(), time() );
    }
    if ( is_page_template('page-profile.php') || is_page('profile') || is_page('profil') ) {
        wp_enqueue_style( 'tema-kustom-profile', get_template_directory_uri() . '/assets/profile-style.css', array(), time() );
    }
    if ( is_page_template('page-ppid.php') || is_page('ppid') ) {
        wp_enqueue_style( 'tema-kustom-ppid', get_template_directory_uri() . '/assets/ppid-style.css', array(), time() );
    }
    if ( is_page_template('page-sakip.php') || is_page('sakip') ) {
        wp_enqueue_style( 'tema-kustom-sakip', get_template_directory_uri() . '/assets/sakip-style.css', array(), time() );
    }

    // Scripts
    wp_enqueue_script( 'tema-kustom-script', get_template_directory_uri() . '/assets/script.js', array(), null, true );
    wp_localize_script( 'tema-kustom-script', 'temaKustomData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    
    // Page specific scripts
    if ( is_page_template('page-dlantunan.php') ) {
        wp_enqueue_script( 'tema-kustom-dlantunan-script', get_template_directory_uri() . '/assets/dlantunan-script.js', array(), null, true );
    }
    if ( is_page_template('page-kontak.php') ) {
        wp_enqueue_script( 'tema-kustom-kontak-script', get_template_directory_uri() . '/assets/kontak-script.js', array(), null, true );
    }
    if ( is_page_template('page-profile.php') ) {
        wp_enqueue_script( 'tema-kustom-profile-script', get_template_directory_uri() . '/assets/profile-script.js', array(), null, true );
    }
    if ( is_page_template('page-beranda.php') || is_front_page() ) {
        wp_enqueue_style( 'tema-kustom-beranda', get_template_directory_uri() . '/assets/beranda-style.css', array(), time() );
        wp_enqueue_script( 'tema-kustom-beranda-script', get_template_directory_uri() . '/assets/beranda-script.js', array(), time(), true );
        
        // Pass dynamic data from options
        wp_localize_script( 'tema-kustom-beranda-script', 'siteData', array(
            'totalPegawai'     => intval( get_option('dprd_stat_pegawai', 150) ),
            'totalAgenda'      => intval( get_option('dprd_stat_agenda', 45) ),
            'totalDokumen'     => intval( get_option('dprd_stat_dokumen', 250) ),
            'persenTransparan' => intval( get_option('dprd_stat_transparan', 100) )
        ) );
    }
}
add_action( 'wp_enqueue_scripts', 'tema_kustom_dprd_scripts' );

/**
 * Inject dynamic CSS for CTA Banner Background
 */
function dprd_dynamic_cta_css() {
    $cta_bg = get_option('dprd_cta_bg_url');
    if ( $cta_bg ) {
        echo "<style>\n";
        echo "  .cta-banner::before {\n";
        echo "      background-image: url('" . esc_url($cta_bg) . "') !important;\n";
        echo "  }\n";
        echo "</style>\n";
    }
}
add_action( 'wp_head', 'dprd_dynamic_cta_css' );

/**
 * AJAX Handler for Live Search
 */
function tema_kustom_live_search() {
    $keyword = isset( $_POST['keyword'] ) ? sanitize_text_field( $_POST['keyword'] ) : '';
    $keyword_lower = strtolower( $keyword );
    
    $results = array();
    
    // 1. Smart Keyword Mapping
    if ( strpos( $keyword_lower, 'sekretariat' ) !== false || strpos( $keyword_lower, 'profil' ) !== false || strpos( $keyword_lower, 'dprd' ) !== false ) {
        $results[] = array(
            'title' => 'Profil Sekretariat DPRD',
            'desc'  => 'Halaman Profil Utama Instansi',
            'url'   => home_url( '/profile/' )
        );
    }
    
    if ( strpos( $keyword_lower, 'visi' ) !== false || strpos( $keyword_lower, 'misi' ) !== false ) {
        $results[] = array(
            'title' => 'Visi dan Misi Sekretariat',
            'desc'  => 'Halaman Profil - Bagian Visi & Misi',
            'url'   => home_url( '/profile/#visi-misi' )
        );
    }
    if ( strpos( $keyword_lower, 'tugas' ) !== false || strpos( $keyword_lower, 'fungsi' ) !== false || strpos( $keyword_lower, 'tupoksi' ) !== false ) {
        $results[] = array(
            'title' => 'Tugas Pokok dan Fungsi',
            'desc'  => 'Halaman Profil - Bagian Tupoksi',
            'url'   => home_url( '/profile/#tugas-fungsi' )
        );
    }
    if ( strpos( $keyword_lower, 'kontak' ) !== false || strpos( $keyword_lower, 'alamat' ) !== false || strpos( $keyword_lower, 'telepon' ) !== false ) {
        $results[] = array(
            'title' => 'Informasi Kontak',
            'desc'  => 'Halaman Kontak Resmi Sekretariat',
            'url'   => home_url( '/kontak/' )
        );
    }
    if ( strpos( $keyword_lower, 'berkala' ) !== false || strpos( $keyword_lower, 'serta merta' ) !== false || strpos( $keyword_lower, 'setiap saat' ) !== false || strpos( $keyword_lower, 'ppid' ) !== false ) {
        $results[] = array(
            'title' => 'Layanan Informasi Publik (PPID)',
            'desc'  => 'Halaman Dokumen PPID Sekretariat DPRD',
            'url'   => home_url( '/ppid/' )
        );
    }
    if ( strpos( $keyword_lower, 'sakip' ) !== false || strpos( $keyword_lower, 'kinerja' ) !== false ) {
        $results[] = array(
            'title' => 'Dokumen SAKIP',
            'desc'  => 'Halaman Sistem Akuntabilitas Kinerja Instansi Pemerintah',
            'url'   => home_url( '/sakip/' )
        );
    }
    if ( strpos( $keyword_lower, 'lantunan' ) !== false || strpos( $keyword_lower, 'magang' ) !== false || strpos( $keyword_lower, 'penelitian' ) !== false || strpos( $keyword_lower, 'kunjungan' ) !== false ) {
        $results[] = array(
            'title' => 'Layanan D\'Lantunan',
            'desc'  => 'Halaman Pengajuan Layanan Publik',
            'url'   => dprd_get_page_url( 'dlantunan' )
        );
    }
    
    // Simulate database search for dummy data
    if ( strpos( $keyword_lower, 'renja' ) !== false || strpos( $keyword_lower, 'dpa' ) !== false || strpos( $keyword_lower, 'lkjip' ) !== false || strpos( $keyword_lower, 'laporan' ) !== false ) {
        $results[] = array(
            'title' => 'Dokumen ' . ucwords( $keyword ),
            'desc'  => 'Lihat dokumen selengkapnya di tabel dokumen PPID',
            'url'   => dprd_get_page_url( 'ppid' )
        );
    }
    
    // 2. Optional: Query CPT Dokumen if they are available later.
    // We will leave it to the smart mapping for now as requested.

    wp_send_json_success( $results );
    wp_die();
}
add_action( 'wp_ajax_live_search', 'tema_kustom_live_search' );
add_action( 'wp_ajax_nopriv_live_search', 'tema_kustom_live_search' );

/**
 * Helper function to get robust page URL
 */
function dprd_get_page_url( $slug, $anchor = '' ) {
    $page = get_page_by_path( $slug );
    $url = $page ? get_permalink( $page ) : home_url( '/' . ltrim( $slug, '/' ) );
    if ( $anchor ) {
        $url .= '#' . ltrim( $anchor, '#' );
    }
    return $url;
}

/**
 * ==========================================================================
 * MENU WP-ADMIN UNTUK GAMBAR STRUKTUR ORGANISASI DINAMIS
 * ==========================================================================
 */

// 1. Registrasi Menu "Profile" di WP-Admin Sidebar
function dprd_register_struktur_menu() {
    add_menu_page(
        'Profile',
        'Profile',
        'manage_options',
        'dprd-profile',
        'dprd_render_struktur_options_page',
        'dashicons-id-alt',
        31
    );
}
add_action( 'admin_menu', 'dprd_register_struktur_menu' );

// 2. Enqueue Media Script & Cropper.js di WP Admin
function dprd_admin_enqueue_media_scripts( $hook ) {
    $is_profile = (isset($_GET['page']) && $_GET['page'] === 'dprd-profile') || strpos($hook, 'dprd-profile') !== false;
    if ( $is_profile || $hook === 'post.php' || $hook === 'post-new.php' ) {
        wp_enqueue_media();
        wp_enqueue_style( 'cropper-css', get_template_directory_uri() . '/assets/css/cropper.min.css', array(), time() );
        wp_enqueue_script( 'cropper-js', get_template_directory_uri() . '/assets/js/cropper.min.js', array( 'jquery' ), time(), false );
    }
}
add_action( 'admin_enqueue_scripts', 'dprd_admin_enqueue_media_scripts' );

// AJAX Handler simpan cropped image ke WP Uploads
function dprd_save_cropped_image() {
    check_ajax_referer( 'dprd_crop_nonce', 'nonce' );
    if ( ! current_user_can( 'upload_files' ) ) {
        wp_send_json_error( 'Permission denied' );
    }

    $image_data = isset( $_POST['image_data'] ) ? $_POST['image_data'] : '';
    if ( ! $image_data ) {
        wp_send_json_error( 'No image data provided' );
    }

    if ( strpos( $image_data, ',' ) !== false ) {
        @list( $type, $image_data ) = explode( ';', $image_data );
        @list( , $image_data )      = explode( ',', $image_data );
    }

    $decoded_image = base64_decode( $image_data );
    if ( ! $decoded_image ) {
        wp_send_json_error( 'Failed to decode image' );
    }

    $filename = 'susunan_photo_cropped_' . time() . '.jpg';
    $upload   = wp_upload_bits( $filename, null, $decoded_image );

    if ( ! empty( $upload['error'] ) ) {
        wp_send_json_error( $upload['error'] );
    }

    wp_send_json_success( array(
        'url' => $upload['url']
    ));
}
add_action( 'wp_ajax_dprd_save_cropped_image', 'dprd_save_cropped_image' );

// 3. Render Tampilan Halaman Pengaturan "Profile" di WP Admin
function dprd_render_struktur_options_page() {
    if ( isset( $_POST['dprd_save_profile_nonce'] ) && wp_verify_nonce( $_POST['dprd_save_profile_nonce'], 'dprd_save_profile' ) ) {
        $img_url       = isset( $_POST['dprd_struktur_img_url'] ) ? esc_url_raw( $_POST['dprd_struktur_img_url'] ) : '';
        $desc_txt      = isset( $_POST['dprd_struktur_desc'] ) ? sanitize_textarea_field( $_POST['dprd_struktur_desc'] ) : '';
        $susunan_photo = isset( $_POST['dprd_susunan_organisasi_photo'] ) ? esc_url_raw( $_POST['dprd_susunan_organisasi_photo'] ) : '';
        
        update_option( 'dprd_struktur_organisasi_img', $img_url );
        update_option( 'dprd_struktur_organisasi_desc', $desc_txt );
        update_option( 'dprd_susunan_organisasi_photo', $susunan_photo );
        
        echo '<div class="notice notice-success is-dismissible"><p><strong>Berhasil!</strong> Data & gambar Halaman Profile (Struktur & Susunan Organisasi) telah disimpan dan diperbarui.</p></div>';
    }

    $current_img      = get_option( 'dprd_struktur_organisasi_img', '' );
    $current_desc     = get_option( 'dprd_struktur_organisasi_desc', '' );
    $susunan_photo    = get_option( 'dprd_susunan_organisasi_photo', 'https://www.purbalinggakab.go.id/wp-content/uploads/2024/08/50-Anggota-DPRD-Purbalingga-Periode-2024-2029-Dilantik-1280x640.jpeg' );
    ?>
    <div class="wrap">
        <h1 style="display:flex; align-items:center; gap:10px;">
            <span class="dashicons dashicons-id-alt" style="font-size:32px; width:32px; height:32px; color:#A5182B;"></span>
            Pengaturan Halaman Profile Sekretariat DPRD
        </h1>
        <p class="description">Kelola konten dan gambar yang tampil secara dinamis pada halaman <strong>Profil</strong> (Struktur Organisasi & Susunan Organisasi).</p>
        
        <form method="post" action="" style="background:#ffffff; padding:28px; border:1px solid #ccd0d4; border-radius:8px; margin-top:20px; max-width:850px; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
            <?php wp_nonce_field( 'dprd_save_profile', 'dprd_save_profile_nonce' ); ?>
            
            <!-- SECTION 1: STRUKTUR ORGANISASI -->
            <h2 style="border-bottom:2px solid #A5182B; padding-bottom:8px; margin-bottom:16px; color:#A5182B; font-size:18px; display:flex; align-items:center; gap:8px;">
                <span class="dashicons dashicons-networking"></span> 1. Struktur Organisasi (Bagan / Diagram)
            </h2>
            <table class="form-table" role="presentation" style="margin-bottom:24px;">
                <tr>
                    <th scope="row"><label for="dprd_struktur_img_url">Gambar Bagan / Diagram</label></th>
                    <td>
                        <div id="dprd_struktur_img_preview" style="margin-bottom:15px; background:#fafafa; padding:16px; border:2px dashed #cbd5e1; border-radius:8px; text-align:center; width:100%;">
                            <?php if ( $current_img ) : ?>
                                <img src="<?php echo esc_url( $current_img ); ?>" style="max-width:100%; height:auto; display:block; margin:0 auto; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Struktur Organisasi">
                            <?php else : ?>
                                <p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada gambar Struktur Organisasi yang diunggah.</p>
                            <?php endif; ?>
                        </div>
                        
                        <input type="hidden" name="dprd_struktur_img_url" id="dprd_struktur_img_url" value="<?php echo esc_url( $current_img ); ?>">
                        <input type="file" id="dprd_upload_struktur_file" accept="image/*" style="position:absolute; width:1px; height:1px; opacity:0; z-index:-1;">
                        <button type="button" class="button button-primary" id="dprd_upload_struktur_btn" style="margin-right:8px; background:#A5182B; border-color:#8B1E1E;">
                            <span class="dashicons dashicons-upload" style="vertical-align:middle; margin-right:4px;"></span> Unggah / Pilih Gambar Bagan
                        </button>
                        <button type="button" class="button button-secondary" id="dprd_remove_struktur_btn" style="<?php echo $current_img ? '' : 'display:none;'; ?> color:#d63031; border-color:#d63031;">
                            Hapus Gambar
                        </button>
                        <p class="description" style="margin-top:8px;">Format gambar yang disarankan: PNG, JPG, WebP, atau SVG dengan resolusi tinggi.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="dprd_struktur_desc">Keterangan / Catatan Gambar (Opsional)</label></th>
                    <td>
                        <textarea name="dprd_struktur_desc" id="dprd_struktur_desc" rows="2" class="large-text" placeholder="Contoh: Bagan Struktur Organisasi Sekretariat DPRD Kabupaten Purbalingga sesuai Perbup Nomor 76 Tahun 2016"><?php echo esc_textarea( $current_desc ); ?></textarea>
                    </td>
                </tr>
            </table>

            <!-- SECTION 2: SUSUNAN ORGANISASI (FOTO ANGGOTA / PEJABAT) -->
            <h2 style="border-bottom:2px solid #A5182B; padding-bottom:8px; margin-bottom:16px; margin-top:32px; color:#A5182B; font-size:18px; display:flex; align-items:center; gap:8px;">
                <span class="dashicons dashicons-groups"></span> 2. Susunan Organisasi (Foto Anggota / Pejabat)
            </h2>
            <p class="description" style="margin-bottom:16px;">Foto ini tampil di bagian bawah section <strong>Susunan Organisasi</strong> dengan efek linier fade putih halus.</p>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="dprd_susunan_organisasi_photo">Foto Susunan Organisasi</label></th>
                    <td>
                        <div id="dprd_susunan_photo_preview" style="margin-bottom:15px; background:#fafafa; padding:16px; border:2px dashed #cbd5e1; border-radius:8px; text-align:center; max-width:580px;">
                            <?php if ( $susunan_photo ) : ?>
                                <img src="<?php echo esc_url( $susunan_photo ); ?>" style="max-width:100%; max-height:300px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Foto Susunan Organisasi">
                            <?php else : ?>
                                <p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada foto Susunan Organisasi yang diunggah.</p>
                            <?php endif; ?>
                        </div>
                        
                        <input type="hidden" name="dprd_susunan_organisasi_photo" id="dprd_susunan_organisasi_photo" value="<?php echo esc_url( $susunan_photo ); ?>">
                        <input type="file" id="dprd_upload_susunan_file" accept="image/*" style="position:absolute; width:1px; height:1px; opacity:0; z-index:-1;">
                        <button type="button" class="button button-primary" id="dprd_upload_susunan_btn" style="margin-right:8px; background:#A5182B; border-color:#8B1E1E;">
                            <span class="dashicons dashicons-upload" style="vertical-align:middle; margin-right:4px;"></span> Unggah / Pilih Foto Susunan
                        </button>
                        <button type="button" class="button button-secondary" id="dprd_remove_susunan_btn" style="<?php echo $susunan_photo ? '' : 'display:none;'; ?> color:#d63031; border-color:#d63031;">
                            Hapus Foto
                        </button>
                        <p class="description" style="margin-top:8px;">Foto panoramic/landscape horizontal disarankan (rasio 16:9 / 2:1).</p>
                    </td>
                </tr>
            </table>

            <div style="margin-top:28px; padding-top:16px; border-top:1px solid #eee;">
                <?php submit_button( 'Simpan Semua Perubahan Profile', 'primary', 'submit', false, array('style' => 'background:#A5182B; border-color:#8B1E1E; padding:8px 24px; font-size:15px; font-weight:600;') ); ?>
            </div>
        </form>
    </div>

    <!-- MODAL INTERAKTIF POTONG GAMBAR (CROPPER + LIVE WEB PREVIEW TERGABUNG) -->
    <div id="dprd_cropper_modal" style="display:none; position:fixed; z-index:999999; inset:0; background:rgba(15,23,42,0.88); align-items:center; justify-content:center; backdrop-filter:blur(6px); padding:20px; box-sizing:border-box;">
        <div style="background:#ffffff; border-radius:12px; width:95vw; max-width:1220px; max-height:92vh; display:flex; flex-direction:column; overflow:hidden; box-shadow:0 25px 50px -12px rgba(0,0,0,0.5);">
            <div style="padding:16px 24px; background:#A5182B; color:#ffffff; display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin:0; color:#ffffff; font-size:16px; font-weight:600; display:flex; align-items:center; gap:8px;">
                    <span class="dashicons dashicons-crop"></span> Potong / Crop Foto & Pratinjau Tampilan Teks + Foto Susunan Organisasi
                </h3>
                <button type="button" id="dprd_close_crop_modal" style="background:none; border:none; color:#ffffff; font-size:24px; cursor:pointer; line-height:1;">&times;</button>
            </div>
            
            <!-- SIDE-BY-SIDE SPLIT VIEW: LEFT CROPPER CANVAS, RIGHT LIVE COMBINED CARD PREVIEW -->
            <div style="display:flex; flex-direction:row; flex-grow:1; overflow:hidden; min-height:420px;">
                <!-- LEFT COLUMN: INTERACTIVE CROPPER CANVAS -->
                <div style="flex:1.2; padding:20px; background:#0f172a; display:flex; flex-direction:column; align-items:center; justify-content:center; border-right:1px solid #334155;">
                    <span style="color:#94a3b8; font-size:12px; margin-bottom:10px; display:flex; align-items:center; gap:4px;">
                        <span class="dashicons dashicons-move"></span> Area Pemotongan Foto (Geser / Ubah Ukuran Box)
                    </span>
                    <div style="max-width:100%; max-height:440px; width:100%; display:flex; justify-content:center; align-items:center;">
                        <img id="dprd_crop_target_img" src="" alt="Target Crop" style="max-width:100%; max-height:440px; display:block;">
                    </div>
                </div>

                <!-- RIGHT COLUMN: REALTIME COMBINED LIVE PREVIEW WITH TEXT & FADE -->
                <div id="crop_right_column" style="flex:1; padding:20px; background:#f8fafc; overflow-y:auto; display:flex; flex-direction:column; justify-content:center;">
                    <div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; padding:20px; box-shadow:0 4px 18px rgba(0,0,0,0.06); position:relative; font-family:'Poppins', sans-serif;">
                        
                        <!-- HEADER CARD SIMULASI WEBSITE -->
                        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px; border-bottom:1px solid #f1f5f9; padding-bottom:8px;">
                            <h3 style="margin:0; font-size:16px; font-weight:700; color:#8B1E1E;">Susunan Organisasi</h3>
                            <span style="font-size:11px; background:#fef2f2; color:#990000; padding:3px 10px; border-radius:12px; font-weight:600;">Pratinjau Hasil Web</span>
                        </div>

                        <!-- KONTEN TEKS SIMULASI SAMAKAN DENGAN HALAMAN PROFIL -->
                        <div style="font-size:12.5px; color:#475569; line-height:1.5; margin-bottom:14px;">
                            <p style="margin:0 0 4px 0; font-weight:700; color:#8B1E1E;">A. Sekretaris DPRD.</p>
                            <p style="margin:0 0 4px 0; font-weight:700; color:#8B1E1E;">B. Bagian terdiri dari:</p>
                            <ul style="margin:0 0 6px 16px; padding:0; list-style-type:disc; font-size:12px;">
                                <li>1. Bagian Perundang-undangan (Subbagian Produk & Dok. Hukum)</li>
                                <li>2. Bagian Persidangan (Subbagian Rapat & Risalah)</li>
                                <li>3. Bagian Umum (TU, Keuangan, Humas)</li>
                            </ul>
                            <p style="margin:0; font-weight:700; color:#8B1E1E;">C. Kelompok Jabatan Fungsional.</p>
                        </div>

                        <!-- WRAPPER FOTO DENGAN LIVE CROP PREVIEW & SMOOTH ALPHA MASK (RASIO TERKUNCI 800:260) -->
                        <div style="position:relative; width:calc(100% + 40px); max-width:calc(100% + 40px); aspect-ratio:800/260; margin:16px -20px -20px; overflow:hidden; border-radius:0 0 10px 10px; background:#ffffff; -webkit-mask-image: linear-gradient(to top, rgba(0,0,0,1) 90%, rgba(0,0,0,0) 100%); mask-image: linear-gradient(to top, rgba(0,0,0,1) 90%, rgba(0,0,0,0) 100%);">
                            <!-- REAL LIVE CROPPED CANVAS PREVIEW IMG WITH ULTRA SMOOTH MASK -->
                            <img id="dprd_live_preview_img" src="" alt="Pratinjau Foto" style="width:100%; height:100%; object-fit:cover; object-position:center center; display:block; border-radius:0 0 10px 10px; -webkit-mask-image: linear-gradient(to top, rgba(0,0,0,1) 90%, rgba(0,0,0,0) 100%); mask-image: linear-gradient(to top, rgba(0,0,0,1) 90%, rgba(0,0,0,0) 100%);">
                        </div>

                        <p style="margin-top:10px; margin-bottom:0; font-size:11.5px; color:#64748b; font-style:italic; text-align:center;">
                            Ã¢Å“Â¨ Hasil penggabungan teks & foto diperbarui secara langsung saat Anda menggeser box crop di sebelah kiri!
                        </p>
                    </div>
                </div>
            </div>

            <!-- CONTROLS TOOLBAR -->
            <div style="padding:14px 24px; background:#ffffff; border-top:1px solid #e2e8f0; display:flex; flex-wrap:wrap; gap:12px; justify-content:space-between; align-items:center;">
                <div style="display:flex; gap:8px; align-items:center;">
                    <button type="button" class="button" id="crop_rotate_left" title="Putar Kiri"><span class="dashicons dashicons-undo"></span> -90°</button>
                    <button type="button" class="button" id="crop_rotate_right" title="Putar Kanan"><span class="dashicons dashicons-redo"></span> +90°</button>
                    <button type="button" class="button" id="crop_zoom_in" title="Perbesar"><span class="dashicons dashicons-plus-alt2"></span></button>
                    <button type="button" class="button" id="crop_zoom_out" title="Perkecil"><span class="dashicons dashicons-minus"></span></button>
                    <select id="crop_aspect_ratio" class="button" style="height:30px; line-height:1; font-size:13px; font-weight:600; color:#2271b1;">
                        <option value="NaN" selected>Crop Bebas (Freeform)</option>
                        <option value="3.076923076923077">Rasio Khusus Profil (800:260)</option>
                        <option value="1">1:1 (Persegi)</option>
                        <option value="1.7777777777777777">16:9 (Landscape)</option>
                    </select>
                </div>

                <div style="display:flex; gap:10px;">
                    <button type="button" class="button button-secondary" id="btn_use_original">Gunakan Gambar Asli</button>
                    <button type="button" class="button button-primary" id="btn_apply_crop" style="background:#A5182B; border-color:#8B1E1E;">
                        <span class="dashicons dashicons-yes" style="vertical-align:middle; margin-right:2px;"></span> Potong & Simpan Hasil Crop
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var cropNonce = '<?php echo wp_create_nonce( "dprd_crop_nonce" ); ?>';
        var selectedOriginalUrl = '';
        var cropper = null;
        var updatePreviewTimeout = null;
        var currentCropTarget = ''; // 'struktur' or 'susunan'

        function updateLiveImg() {
            if (!cropper || currentCropTarget !== 'susunan') return;
            try {
                var canvas = cropper.getCroppedCanvas({ width: 800, height: 260 });
                if (canvas) {
                    $('#dprd_live_preview_img').attr('src', canvas.toDataURL('image/jpeg', 0.90));
                }
            } catch(e) {}
        }

        function openCropper(imageSrc, target) {
            currentCropTarget = target;
            selectedOriginalUrl = imageSrc;
            $('#dprd_crop_target_img').attr('src', imageSrc);
            
            if (target === 'struktur') {
                $('#crop_right_column').hide();
                $('#crop_aspect_ratio').val('NaN'); // Default freeform
            } else {
                $('#crop_right_column').show();
                $('#crop_aspect_ratio').val('3.076923076923077'); // Default profile ratio
            }

            $('#dprd_cropper_modal').css('display', 'flex');

            if (cropper) {
                cropper.destroy();
            }

            var image = document.getElementById('dprd_crop_target_img');
            var currentRatioVal = parseFloat($('#crop_aspect_ratio').val());
            cropper = new Cropper(image, {
                aspectRatio: isNaN(currentRatioVal) ? NaN : currentRatioVal,
                viewMode: 1,
                autoCropArea: 0.95,
                responsive: true,
                background: false,
                crop: function() {
                    if (updatePreviewTimeout) clearTimeout(updatePreviewTimeout);
                    updatePreviewTimeout = setTimeout(updateLiveImg, 40);
                },
                ready: function() {
                    updateLiveImg();
                }
            });
        }

        function uploadCroppedImage(base64Data, $btn) {
            $btn.prop('disabled', true).text('Memproses Potong Gambar...');
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'dprd_save_cropped_image',
                    nonce: cropNonce,
                    image_data: base64Data
                },
                success: function(response) {
                    $btn.prop('disabled', false).html('<span class="dashicons dashicons-yes"></span> Potong & Simpan Hasil Crop');
                    if (response.success && response.data.url) {
                        var finalUrl = response.data.url;
                        if (currentCropTarget === 'struktur') {
                            $('#dprd_struktur_img_url').val(finalUrl);
                            $('#dprd_struktur_img_preview').html('<img src="' + finalUrl + '" style="max-width:100%; height:auto; display:block; margin:0 auto; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview">');
                            $('#dprd_remove_struktur_btn').show();
                        } else {
                            $('#dprd_susunan_organisasi_photo').val(finalUrl);
                            $('#dprd_susunan_photo_preview').html('<img src="' + finalUrl + '" style="max-width:100%; max-height:300px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview">');
                            $('#dprd_remove_susunan_btn').show();
                        }
                        if (cropper) cropper.destroy();
                        $('#dprd_cropper_modal').hide();
                    } else {
                        alert('Gagal menyimpan gambar: ' + (response.data || 'Error'));
                    }
                },
                error: function() {
                    $btn.prop('disabled', false).html('<span class="dashicons dashicons-yes"></span> Potong & Simpan Hasil Crop');
                    alert('Terjadi kesalahan server.');
                }
            });
        }

        // TRIGGER FILE INPUTS
        $('#dprd_upload_struktur_btn').on('click', function(e) {
            e.preventDefault();
            $('#dprd_upload_struktur_file').click();
        });

        $('#dprd_upload_susunan_btn').on('click', function(e) {
            e.preventDefault();
            $('#dprd_upload_susunan_file').click();
        });

        // HANDLE FILE SELECTION (Local FileReader)
        $('#dprd_upload_struktur_file, #dprd_upload_susunan_file').on('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;
            
            var targetType = $(this).attr('id') === 'dprd_upload_struktur_file' ? 'struktur' : 'susunan';
            
            var reader = new FileReader();
            reader.onload = function(evt) {
                openCropper(evt.target.result, targetType);
            };
            reader.readAsDataURL(file);
            $(this).val(''); // Reset input
        });

        // REMOVE BUTTONS
        $('#dprd_remove_struktur_btn').on('click', function(e){
            e.preventDefault();
            $('#dprd_struktur_img_url').val('');
            $('#dprd_struktur_img_preview').html('<p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada gambar Struktur Organisasi yang diunggah.</p>');
            $(this).hide();
        });

        $('#dprd_remove_susunan_btn').on('click', function(e){
            e.preventDefault();
            $('#dprd_susunan_organisasi_photo').val('');
            $('#dprd_susunan_photo_preview').html('<p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada foto Susunan Organisasi yang diunggah.</p>');
            $(this).hide();
        });

        // CROPPER CONTROLS
        $('#crop_rotate_left').on('click', function(){ if (cropper) { cropper.rotate(-90); updateLiveImg(); } });
        $('#crop_rotate_right').on('click', function(){ if (cropper) { cropper.rotate(90); updateLiveImg(); } });
        $('#crop_zoom_in').on('click', function(){ if (cropper) { cropper.zoom(0.1); updateLiveImg(); } });
        $('#crop_zoom_out').on('click', function(){ if (cropper) { cropper.zoom(-0.1); updateLiveImg(); } });
        $('#crop_aspect_ratio').on('change', function(){
            if (cropper) {
                var val = parseFloat($(this).val());
                cropper.setAspectRatio(isNaN(val) ? NaN : val);
                setTimeout(updateLiveImg, 80);
            }
        });

        // CLOSE CROPPER MODAL
        $('#dprd_close_crop_modal').on('click', function(){
            if (cropper) cropper.destroy();
            $('#dprd_cropper_modal').hide();
        });

        // APPLY CROP (AJAX UPLOAD)
        $('#btn_apply_crop').on('click', function(){
            if (!cropper) return;
            var canvas = cropper.getCroppedCanvas({
                maxWidth: 1920,
                maxHeight: 1080,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            uploadCroppedImage(canvas.toDataURL('image/jpeg', 0.92), $(this));
        });

        // USE ORIGINAL IMAGE
        $('#btn_use_original').on('click', function(){
            if (selectedOriginalUrl) {
                uploadCroppedImage(selectedOriginalUrl, $('#btn_apply_crop'));
            }
        });
    });
    </script>
<?php
}

// ==========================================
// PENGATURAN BERANDA & VIDEO (WP-ADMIN)
// ==========================================

function dprd_theme_admin_scripts($hook) {
    if ( strpos( $hook, 'dprd' ) === false ) {
        return;
    }
    wp_enqueue_media(); // For file uploads (PDF)
    wp_enqueue_style( 'cropper-css', get_template_directory_uri() . '/assets/css/cropper.min.css', array(), time() );
    wp_enqueue_script( 'cropper-js', get_template_directory_uri() . '/assets/js/cropper.min.js', array(), time(), false );
}
add_action( 'admin_enqueue_scripts', 'dprd_theme_admin_scripts' );

function dprd_upload_media_direct() {
    if ( ! current_user_can( 'upload_files' ) ) {
        wp_send_json_error( 'Permission denied' );
    }
    
    if ( empty( $_FILES['async_upload'] ) ) {
        wp_send_json_error( 'No file uploaded' );
    }

    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    $upload_overrides = array( 'test_form' => false );
    
    $movefile = wp_handle_upload( $_FILES['async_upload'], $upload_overrides );

    if ( $movefile && ! isset( $movefile['error'] ) ) {
        wp_send_json_success( array( 'url' => $movefile['url'] ) );
    } else {
        wp_send_json_error( $movefile['error'] );
    }
}
add_action( 'wp_ajax_dprd_upload_media_direct', 'dprd_upload_media_direct' );

function dprd_upload_base64_image_ajax() {
    @ob_clean(); // Suppress notice if no buffer exists
    if ( ! current_user_can( 'upload_files' ) ) {
        wp_send_json_error( 'Permission denied' );
    }

    if ( empty( $_POST['image_base64'] ) ) {
        wp_send_json_error( 'No image data received (POST empty)' );
    }

    $base64 = $_POST['image_base64'];
    $base64 = str_replace(' ', '+', $base64);

    $parts = explode(',', $base64);
    if (count($parts) === 2) {
        $meta = $parts[0];
        $data = $parts[1];
        
        if (preg_match('/^data:image\/(\w+);base64/i', $meta, $matches)) {
            $type = strtolower($matches[1]);
            if (in_array($type, [ 'jpg', 'jpeg', 'gif', 'png', 'webp' ])) {
                $decoded = base64_decode($data);
                if ($decoded !== false) {
                    $filename = 'dokumentasi-' . time() . '-' . wp_generate_password(6, false) . '.' . $type;
                    
                    // Gunakan wp_upload_bits agar error direktori/izin (permissions) terdeteksi otomatis
                    $upload = wp_upload_bits($filename, null, $decoded);
                    
                    if ( ! $upload['error'] ) {
                        wp_send_json_success( array( 'url' => $upload['url'] ) );
                        return;
                    } else {
                        wp_send_json_error( 'WP Upload Error: ' . $upload['error'] );
                        return;
                    }
                } else {
                    wp_send_json_error( 'Gagal melakukan decode pada string base64.' );
                    return;
                }
            } else {
                wp_send_json_error( 'Tipe file tidak diizinkan: ' . $type );
                return;
            }
        } else {
            wp_send_json_error( 'Format meta image base64 tidak dikenali.' );
            return;
        }
    }
    wp_send_json_error( 'Format partisi data base64 tidak valid.' );
}
add_action( 'wp_ajax_dprd_upload_base64_image', 'dprd_upload_base64_image_ajax' );

function dprd_handle_video_thumb_base64( $base64 ) {
    if ( empty( $base64 ) ) {
        return '';
    }
    if ( preg_match('/^data:image\/(\w+);base64,/', $base64, $type) ) {
        $data = substr($base64, strpos($base64, ',') + 1);
        $type = strtolower($type[1]);
        if (in_array($type, [ 'jpg', 'jpeg', 'gif', 'png', 'webp' ])) {
            $data = base64_decode($data);
            if ($data !== false) {
                $filename = 'video-thumb-' . time() . '.' . $type;
                $upload = wp_upload_bits($filename, null, $data);
                if ( ! $upload['error'] ) {
                    update_option( 'dprd_video_thumbnail_url', $upload['url'] );
                }
            }
        }
    }
    return '';
}

function dprd_handle_cta_bg_base64( $base64 ) {
    if ( empty( $base64 ) ) {
        return '';
    }
    if ( preg_match('/^data:image\/(\w+);base64,/', $base64, $type) ) {
        $data = substr($base64, strpos($base64, ',') + 1);
        $type = strtolower($type[1]);
        if (in_array($type, [ 'jpg', 'jpeg', 'gif', 'png', 'webp' ])) {
            $data = base64_decode($data);
            if ($data !== false) {
                $filename = 'cta-bg-' . time() . '.' . $type;
                $upload = wp_upload_bits($filename, null, $data);
                if ( ! $upload['error'] ) {
                    update_option( 'dprd_cta_bg_url', $upload['url'] );
                }
            }
        }
    }
    return '';
}

require get_template_directory() . '/beranda-settings.php';
// ==========================================
// PENGATURAN HERO GLOBAL
// ==========================================

function dprd_hero_settings_menu() {
    add_menu_page(
        'Pengaturan Hero', 
        'Pengaturan Hero', 
        'manage_options', 
        'dprd-pengaturan-hero', 
        'dprd_hero_settings_page_html', 
        'dashicons-format-image', 
        33
    );
}
add_action( 'admin_menu', 'dprd_hero_settings_menu' );

function dprd_hero_settings_init() {
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_global_image' );
    
    // Teks Hero Beranda
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_beranda_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_beranda_desc' );
    
    // Teks Hero Profil
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_profil_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_profil_desc' );

    // Teks Hero Kontak
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_kontak_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_kontak_desc' );

    // Teks Hero PPID
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_ppid_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_ppid_desc' );

    // Teks Hero Sakip
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_sakip_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_sakip_desc' );

    // Teks Hero D'Lantunan
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_dlantunan_title' );
    register_setting( 'dprd_hero_settings_group', 'dprd_hero_dlantunan_desc' );
}
add_action( 'admin_init', 'dprd_hero_settings_init' );

function dprd_hero_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Hero Global</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_hero_settings_group' );
            do_settings_sections( 'dprd_hero_settings_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Gambar Latar Belakang Hero (Global)</th>
                    <td>
                        <input type="url" name="dprd_hero_global_image" id="dprd_hero_global_image" value="<?php echo esc_attr( get_option('dprd_hero_global_image') ); ?>" class="regular-text" style="width: 400px;" />
                        <button type="button" class="button" id="btn_upload_hero_image">Pilih Gambar</button>
                        <p class="description">Gambar ini akan digunakan sebagai background section Hero di <strong>semua halaman</strong>.</p>
                        <div id="hero_image_preview" style="margin-top: 10px;">
                            <?php if(get_option('dprd_hero_global_image')) : ?>
                                <img src="<?php echo esc_url(get_option('dprd_hero_global_image')); ?>" style="max-width: 400px; height: auto;" />
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <hr>
            <h2>Teks Hero per Halaman</h2>
            
            <h3>1. Halaman Beranda</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_beranda_title" value="<?php echo esc_attr( get_option('dprd_hero_beranda_title', 'Beranda') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_beranda_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_beranda_desc', 'Selamat datang di website resmi Sekretariat DPRD Kabupaten Purbalingga. Kami hadir untuk mendukung keterbukaan informasi dan pelayanan publik.') ); ?></textarea></td>
                </tr>
            </table>

            <h3>2. Halaman Profil</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_profil_title" value="<?php echo esc_attr( get_option('dprd_hero_profil_title', 'Profil Instansi') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_profil_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_profil_desc', 'Mengenal lebih dekat Sekretariat DPRD Kabupaten Purbalingga beserta visi, misi, dan struktur organisasinya.') ); ?></textarea></td>
                </tr>
            </table>

            <h3>3. Halaman Kontak</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_kontak_title" value="<?php echo esc_attr( get_option('dprd_hero_kontak_title', 'Hubungi Kami') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_kontak_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_kontak_desc', 'Kami siap melayani Anda. Silakan hubungi kami melalui informasi kontak yang tersedia di bawah ini.') ); ?></textarea></td>
                </tr>
            </table>

            <h3>4. Halaman PPID</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_ppid_title" value="<?php echo esc_attr( get_option('dprd_hero_ppid_title', 'Layanan Informasi Publik (PPID)') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_ppid_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_ppid_desc', 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) Sekretariat DPRD Purbalingga melayani permintaan informasi sesuai UU KIP.') ); ?></textarea></td>
                </tr>
            </table>

            <h3>5. Halaman Sakip</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_sakip_title" value="<?php echo esc_attr( get_option('dprd_hero_sakip_title', 'Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_sakip_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_sakip_desc', 'Transparansi dan pertanggungjawaban kinerja Sekretariat DPRD Kabupaten Purbalingga.') ); ?></textarea></td>
                </tr>
            </table>

            <h3>6. Halaman D'Lantunan</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Hero</th>
                    <td><input type="text" name="dprd_hero_dlantunan_title" value="<?php echo esc_attr( get_option('dprd_hero_dlantunan_title', 'Layanan D\'Lantunan') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Hero</th>
                    <td><textarea name="dprd_hero_dlantunan_desc" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_hero_dlantunan_desc', 'Dukungan Layanan Turut Serta Pembangunan (D\'Lantunan). Mempermudah akses pelayanan publik di lingkungan Sekretariat DPRD.') ); ?></textarea></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var heroUploader;
        $('#btn_upload_hero_image').on('click', function(e) {
            e.preventDefault();
            if (heroUploader) {
                heroUploader.open();
                return;
            }
            heroUploader = wp.media({
                title: 'Pilih Latar Belakang Hero',
                button: { text: 'Gunakan Gambar Ini' },
                multiple: false
            });
            heroUploader.on('select', function() {
                var attachment = heroUploader.state().get('selection').first().toJSON();
                $('#dprd_hero_global_image').val(attachment.url);
                $('#hero_image_preview').html('<img src="' + attachment.url + '" style="max-width: 400px; height: auto;" />');
            });
            heroUploader.open();
        });
    });
    </script>
    <?php
}

// ==========================================
// PENGATURAN CTA BANNER GLOBAL
// ==========================================

function dprd_cta_settings_menu() {
    add_menu_page(
        'Pengaturan CTA', 
        'Pengaturan CTA', 
        'manage_options', 
        'dprd-cta-settings', 
        'dprd_cta_settings_page_html', 
        'dashicons-megaphone', 
        34
    );
}
add_action( 'admin_menu', 'dprd_cta_settings_menu' );

function dprd_cta_settings_init() {
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_bg_base64', array( 'sanitize_callback' => 'dprd_handle_cta_bg_base64' ) );
    
    // Teks CTA per Halaman
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_beranda' );
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_profil' );
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_kontak' );
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_ppid' );
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_sakip' );
    register_setting( 'dprd_cta_settings_group', 'dprd_cta_text_dlantunan' );
}
add_action( 'admin_init', 'dprd_cta_settings_init' );

function dprd_cta_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan CTA Banner (Global)</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_cta_settings_group' );
            do_settings_sections( 'dprd_cta_settings_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Background CTA Banner</th>
                    <td>
                        <p>Pilih gambar latar belakang untuk banner CTA merah di bagian bawah halaman. Anda wajib memotong (crop) gambarnya dalam rasio memanjang (6:1).</p>
                        <input type="file" id="cta_image_input" accept="image/*" />
                        
                        <div id="cta-cropper-container" style="max-width: 800px; margin-top: 10px; display: none;">
                            <img id="cta_image_to_crop" src="" style="max-width: 100%;" />
                            <br><br>
                            <button type="button" class="button button-secondary" id="btn_apply_cta_crop">Terapkan Crop</button>
                        </div>
                        
                        <div id="cta_cropped_preview_container" style="margin-top: 15px; <?php if(!get_option('dprd_cta_bg_url')) echo 'display:none;'; ?>">
                            <h4>Preview Background CTA Saat Ini:</h4>
                            <?php $current_cta = get_option('dprd_cta_bg_url', 'https://data.purbalinggakab.go.id/uploads/group/2023-05-30-023142.2793854qv8rx1b.png'); ?>
                            <img id="cta_cropped_preview" src="<?php echo esc_url($current_cta); ?>" style="width: 100%; max-width: 800px; border-radius: 8px;" />
                        </div>
                        
                        <input type="hidden" name="dprd_cta_bg_base64" id="dprd_cta_bg_base64" value="" />
                    </td>
                </tr>
            </table>

            <hr>
            <h2>Teks CTA per Halaman</h2>
            <?php 
                $default_beranda = 'Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat'; 
                $default_ppid = '<h4>Butuh Informasi Lain?</h4><p>Ajukan permohonan informasi jika data yang anda cari belum terdata</p>';
                $default_sakip = '<h4>Butuh Informasi SAKIP Lainnya?</h4><p>Hubungi kami untuk layanan dan konsultasi akuntabilitas kinerja</p>';
            ?>
            
            <h3>1. Halaman Beranda</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_beranda" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_beranda', $default_beranda) ); ?></textarea></td>
                </tr>
            </table>

            <h3>2. Halaman Profil</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_profil" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_profil', $default_beranda) ); ?></textarea></td>
                </tr>
            </table>

            <h3>3. Halaman Kontak</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_kontak" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_kontak', $default_beranda) ); ?></textarea></td>
                </tr>
            </table>

            <h3>4. Halaman PPID</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_ppid" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_ppid', $default_ppid) ); ?></textarea></td>
                </tr>
            </table>

            <h3>5. Halaman Sakip</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_sakip" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_sakip', $default_sakip) ); ?></textarea></td>
                </tr>
            </table>

            <h3>6. Halaman D'Lantunan</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><textarea name="dprd_cta_text_dlantunan" rows="3" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_cta_text_dlantunan', $default_beranda) ); ?></textarea></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var inputCtaImage = document.getElementById('cta_image_input');
        var ctaImageToCrop = document.getElementById('cta_image_to_crop');
        var ctaCropperContainer = document.getElementById('cta-cropper-container');
        var btnApplyCtaCrop = document.getElementById('btn_apply_cta_crop');
        var ctaHiddenBase64 = document.getElementById('dprd_cta_bg_base64');
        var ctaCroppedPreview = document.getElementById('cta_cropped_preview');
        var ctaCroppedPreviewContainer = document.getElementById('cta_cropped_preview_container');
        var ctaCropper;

        if (inputCtaImage) {
            inputCtaImage.addEventListener('change', function(e) {
                var files = e.target.files;
                if (files && files.length > 0) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        ctaImageToCrop.src = event.target.result;
                        ctaCropperContainer.style.display = 'block';
                        if (ctaCropper) { ctaCropper.destroy(); }
                        ctaCropper = new Cropper(ctaImageToCrop, {
                            aspectRatio: 6 / 1,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                }
            });
        }

        if (btnApplyCtaCrop) {
            btnApplyCtaCrop.addEventListener('click', function() {
                if (ctaCropper) {
                    var canvas = ctaCropper.getCroppedCanvas({ width: 1200, height: 200 });
                    var base64 = canvas.toDataURL('image/jpeg', 0.8);
                    ctaHiddenBase64.value = base64;
                    ctaCroppedPreview.src = base64;
                    ctaCroppedPreviewContainer.style.display = 'block';
                    ctaCropperContainer.style.display = 'none';
                    alert("Background CTA berhasil dicrop! Jangan lupa klik 'Save Changes' untuk menyimpan.");
                }
            });
        }
    });
    </script>
    <?php
}

// ==========================================
// PENGATURAN STATISTIK PPID
// ==========================================

require get_template_directory() . '/ppid-settings.php';

// ==========================================
// PENGATURAN HALAMAN D'LANTUNAN
// ==========================================

// Menu dipindahkan ke dprd_pengaturan_dlantunan_menu

function dprd_dlantunan_settings_init() {
    register_setting( 'dprd_dlantunan_settings_group', 'dprd_dlantunan_welcome_title' );
    register_setting( 'dprd_dlantunan_settings_group', 'dprd_dlantunan_welcome_text' );
}
add_action( 'admin_init', 'dprd_dlantunan_settings_init' );

function dprd_dlantunan_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Kartu Sambutan D'Lantunan</h1>
        <p>Silakan isi teks judul dan deskripsi untuk kartu "Selamat Datang" di halaman D'Lantunan.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_dlantunan_settings_group' );
            do_settings_sections( 'dprd_dlantunan_settings_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Kartu Selamat Datang</th>
                    <td>
                        <?php 
                        $welcome_title_raw = get_option('dprd_dlantunan_welcome_title', "Selamat Datang di\nD'Lantunan");
                        $welcome_title_clean = str_replace(array('<br>', '<br/>', '<br />'), "\n", $welcome_title_raw);
                        ?>
                        <textarea name="dprd_dlantunan_welcome_title" rows="2" class="regular-text" style="width: 400px;"><?php echo esc_textarea( $welcome_title_clean ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Isi Teks Kartu</th>
                    <td>
                        <?php
                        $default_content = "<p>D'Lantunan adalah portal layanan dan aspirasi masyarakat Sekretariat DPRD Kabupaten Purbalingga.</p>\n<p>Melalui portal ini, Anda dapat mengajukan berbagai permohonan layanan dengan mudah secara daring.</p>\n<p>Kami berkomitmen memberikan pelayanan yang cepat, transparan, dan akuntabel.</p>";
                        $content = get_option('dprd_dlantunan_welcome_text', $default_content);
                        wp_editor($content, 'dprd_dlantunan_welcome_text', array(
                            'textarea_name' => 'dprd_dlantunan_welcome_text',
                            'media_buttons' => false,
                            'textarea_rows' => 10,
                            'teeny' => true,
                            'quicktags' => true
                        ));
                        ?>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// ==========================================
// CUSTOM FIELD (META BOX) UNTUK LAYANAN D'LANTUNAN
// ==========================================

function dprd_add_layanan_dlantunan_metabox() {
    add_meta_box(
        'dprd_layanan_dlantunan_meta', // ID
        'Tautan (URL) Layanan', // Title
        'dprd_layanan_dlantunan_meta_callback', // Callback
        'layanan_dlantunan', // Post Type
        'normal', // Context
        'default' // Priority
    );
}
add_action( 'add_meta_boxes', 'dprd_add_layanan_dlantunan_metabox' );

function dprd_layanan_dlantunan_meta_callback( $post ) {
    wp_nonce_field( 'dprd_layanan_dlantunan_meta_nonce_action', 'dprd_layanan_dlantunan_meta_nonce' );
    $url_layanan = get_post_meta( $post->ID, '_dprd_layanan_url', true );

    echo '<p><label for="dprd_layanan_url"><strong>URL / Link Tujuan Layanan:</strong></label></p>';
    echo '<p><input type="url" id="dprd_layanan_url" name="dprd_layanan_url" value="' . esc_attr( $url_layanan ) . '" class="widefat" placeholder="Contoh: https://docs.google.com/forms/..." /></p>';
    echo '<p class="description">Masukkan tautan formulir eksternal (seperti Google Forms) atau URL internal tujuan layanan ini.</p>';
}

function dprd_save_layanan_dlantunan_meta( $post_id ) {
    if ( ! isset( $_POST['dprd_layanan_dlantunan_meta_nonce'] ) || ! wp_verify_nonce( $_POST['dprd_layanan_dlantunan_meta_nonce'], 'dprd_layanan_dlantunan_meta_nonce_action' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['dprd_layanan_url'] ) ) {
        $url_data = sanitize_url( wp_unslash( $_POST['dprd_layanan_url'] ) );
        update_post_meta( $post_id, '_dprd_layanan_url', $url_data );
    }
}
add_action( 'save_post_layanan_dlantunan', 'dprd_save_layanan_dlantunan_meta' );

// ==========================================
// SIMPLIFY & AUTO-POPULATE LAYANAN D'LANTUNAN
// ==========================================

function dprd_simplify_layanan_dlantunan_supports() {
    // Hapus elemen yang tidak perlu agar admin fokus ke Judul, Deskripsi, dan URL saja
    remove_post_type_support( 'layanan_dlantunan', 'thumbnail' );
    remove_post_type_support( 'layanan_dlantunan', 'excerpt' );
    remove_post_type_support( 'layanan_dlantunan', 'custom-fields' );
    remove_post_type_support( 'layanan_dlantunan', 'comments' );
    remove_post_type_support( 'layanan_dlantunan', 'author' );
    remove_post_type_support( 'layanan_dlantunan', 'page-attributes' );
}
add_action( 'init', 'dprd_simplify_layanan_dlantunan_supports', 99 );

function dprd_seed_layanan_dlantunan() {
    $count = wp_count_posts('layanan_dlantunan');
    // Jika belum ada pos sama sekali, buat 3 layanan default secara otomatis
    if ( isset($count->publish) && $count->publish == 0 && isset($count->draft) && $count->draft == 0 && isset($count->trash) && $count->trash == 0 ) {
        $defaults = array(
            array(
                'title' => 'Layanan Permohonan Magang',
                'content' => 'Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.',
                'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform'
            ),
            array(
                'title' => 'Layanan Permohonan Ijin Penelitian',
                'content' => 'Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.',
                'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform'
            ),
            array(
                'title' => 'Layanan Permohonan Ijin Kunjungan',
                'content' => 'Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.',
                'url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform'
            )
        );

        foreach ($defaults as $item) {
            $post_id = wp_insert_post(array(
                'post_title' => $item['title'],
                'post_content' => $item['content'],
                'post_status' => 'publish',
                'post_type' => 'layanan_dlantunan'
            ));
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_dprd_layanan_url', $item['url']);
            }
        }
    }
}
add_action('admin_init', 'dprd_seed_layanan_dlantunan');


// ==========================================
// PENGATURAN 3 LAYANAN D'LANTUNAN (SETTINGS PAGE)
// ==========================================

function dprd_pengaturan_dlantunan_menu() {
    // Menu Utama
    add_menu_page(
        'Pengaturan D\'Lantunan', 
        'Pengaturan D\'Lantunan', 
        'manage_options', 
        'dprd-pengaturan-dlantunan', 
        'dprd_3layanan_settings_page_html', 
        'dashicons-clipboard', 
        30
    );
    // Submenu 1: 3 Layanan (Sekaligus rename parent item)
    add_submenu_page(
        'dprd-pengaturan-dlantunan',
        '3 Layanan D\'Lantunan',
        '3 Layanan',
        'manage_options',
        'dprd-pengaturan-dlantunan',
        'dprd_3layanan_settings_page_html'
    );
    // Submenu 2: Kartu Sambutan
    add_submenu_page(
        'dprd-pengaturan-dlantunan',
        'Kartu Sambutan D\'Lantunan', 
        'Kartu Sambutan', 
        'manage_options', 
        'dprd-dlantunan-settings', 
        'dprd_dlantunan_settings_page_html'
    );
    // Submenu 3: Upload File
    add_submenu_page(
        'dprd-pengaturan-dlantunan',
        'Upload File D\'Lantunan', 
        'Upload File', 
        'manage_options', 
        'dprd-upload-dlantunan-settings', 
        'dprd_upload_dlantunan_settings_page_html'
    );
    // Submenu 4: Upload Video
    add_submenu_page(
        'dprd-pengaturan-dlantunan',
        'Upload Video D\'Lantunan', 
        'Upload Video', 
        'manage_options', 
        'dprd-upload-video-dlantunan', 
        'dprd_upload_video_dlantunan_page_html'
    );
    // Submenu 5: Upload Dokumentasi
    add_submenu_page(
        'dprd-pengaturan-dlantunan',
        'Upload Dokumentasi D\'Lantunan', 
        'Upload Dokumentasi', 
        'manage_options', 
        'dprd-upload-dokumentasi-dlantunan', 
        'dprd_upload_dokumentasi_dlantunan_page_html'
    );

    // Sembunyikan CPT lama agar admin tidak bingung
    remove_menu_page( 'edit.php?post_type=layanan_dlantunan' );
}
add_action( 'admin_menu', 'dprd_pengaturan_dlantunan_menu', 999 );

function dprd_3layanan_settings_init() {
    for ($i = 1; $i <= 3; $i++) {
        register_setting( 'dprd_3layanan_settings_group', 'dprd_layanan'.$i.'_title' );
        register_setting( 'dprd_3layanan_settings_group', 'dprd_layanan'.$i.'_desc' );
        register_setting( 'dprd_3layanan_settings_group', 'dprd_layanan'.$i.'_link' );
    }
}
add_action( 'admin_init', 'dprd_3layanan_settings_init' );

function dprd_3layanan_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan 3 Layanan D'Lantunan</h1>
        <p>Silakan isi judul, deskripsi, dan link tautan untuk masing-masing dari 3 layanan utama D'Lantunan.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_3layanan_settings_group' );
            do_settings_sections( 'dprd_3layanan_settings_group' );
            
            $defaults = array(
                1 => array('title' => 'Layanan Permohonan Magang', 'desc' => 'Ajukan permohonan magang di lingkungan Sekretariat DPRD Kabupaten Purbalingga untuk mahasiswa dan pelajar.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSf-kexVgXar7DEOPdKhB_IZgfoWEb4F-QFBYa5kD9wRmf4AjA/viewform'),
                2 => array('title' => 'Layanan Permohonan Ijin Penelitian', 'desc' => 'Ajukan permohonan izin penelitian untuk keperluan akademik maupun lembaga terkait di Sekretariat DPRD.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSd4pWbgYw7ySztddt3luzmxw4Vume_BxQRk3h1Et5bpEyg2mg/viewform'),
                3 => array('title' => 'Layanan Permohonan Ijin Kunjungan', 'desc' => 'Ajukan permohonan kunjungan kerja atau studi banding ke Sekretariat DPRD Kabupaten Purbalingga.', 'link' => 'https://docs.google.com/forms/d/e/1FAIpQLSdOgg9-L2MaLKOKobYc7KblGJDvuTbvs_9L7RZDxg61Ww6tog/viewform')
            );
            ?>
            <table class="form-table">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <tr valign="top">
                    <td colspan="2"><hr><h2 style="margin:0;">Layanan Ke-<?php echo $i; ?></h2></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Judul Layanan <?php echo $i; ?></th>
                    <td>
                        <input type="text" name="dprd_layanan<?php echo $i; ?>_title" value="<?php echo esc_attr( get_option('dprd_layanan'.$i.'_title', $defaults[$i]['title']) ); ?>" class="regular-text" style="width: 400px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Layanan <?php echo $i; ?></th>
                    <td>
                        <textarea name="dprd_layanan<?php echo $i; ?>_desc" rows="3" class="regular-text" style="width: 400px;"><?php echo esc_textarea( get_option('dprd_layanan'.$i.'_desc', $defaults[$i]['desc']) ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link Tautan Layanan <?php echo $i; ?></th>
                    <td>
                        <input type="url" name="dprd_layanan<?php echo $i; ?>_link" value="<?php echo esc_url( get_option('dprd_layanan'.$i.'_link', $defaults[$i]['link']) ); ?>" class="regular-text" style="width: 400px;" placeholder="Contoh: https://docs.google.com/forms/..." />
                    </td>
                </tr>
            <?php endfor; ?>
            </table>
            <?php submit_button('Simpan Pengaturan Layanan'); ?>
        </form>
    </div>
    <?php
}

// ==========================================
// PENGATURAN UPLOAD FILE D'LANTUNAN (SETTINGS PAGE)
// ==========================================

// Menu dipindahkan ke dprd_pengaturan_dlantunan_menu

function dprd_upload_dlantunan_settings_init() {
    register_setting( 'dprd_upload_dlantunan_settings_group', 'dprd_dlantunan_docs_data' );
}
add_action( 'admin_init', 'dprd_upload_dlantunan_settings_init' );

function dprd_upload_dlantunan_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Upload File D'Lantunan</h1>
        <p>Kelola dokumen "Informasi & Dokumen Terkait" di halaman D'Lantunan.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_upload_dlantunan_settings_group' );
            do_settings_sections( 'dprd_upload_dlantunan_settings_group' );
            
            $defaults = json_encode([
                ['title' => 'Panduan Penggunaan Portal D\'Lantunan', 'url' => get_template_directory_uri() . '/assets/pdf/DOR.pdf', 'type' => 'PDF', 'date' => '20 Mei 2023']
            ]);
            $saved_docs = get_option('dprd_dlantunan_docs_data', '');
            if (empty($saved_docs) || $saved_docs === '[]' || $saved_docs === 'false') {
                $saved_docs = $defaults;
            }
            ?>
            <input type="hidden" name="dprd_dlantunan_docs_data" id="dprd_dlantunan_docs_data" value="<?php echo esc_attr($saved_docs); ?>">
            
            <div id="docs_repeater_container"></div>
            
            <button type="button" class="button button-primary" id="btn_add_doc_slide" style="margin-top: 10px;">+ Tambah Dokumen Baru</button>

            <br><br>
            <?php submit_button('Simpan Dokumen'); ?>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var docsData = [];
        try {
            var rawVal = document.getElementById('dprd_dlantunan_docs_data').value;
            docsData = JSON.parse(rawVal || '[]');
        } catch(e) {}

        var container = document.getElementById('docs_repeater_container');

        function renderRow(doc, index) {
            var html = `
            <div class="doc-slide-row" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; background: #fafafa; position: relative;">
                <h4 style="margin-top:0;">Dokumen ${index + 1}</h4>
                <button type="button" class="button button-link-delete btn_remove_doc" style="position:absolute; top:15px; right:15px; color:#a00;">Hapus</button>
                <table class="form-table">
                    <tr>
                        <th scope="row">Judul Dokumen</th>
                        <td><input type="text" class="doc_input_title" value="${doc.title || ''}" style="width:100%; max-width:400px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Pilih File</th>
                        <td>
                            <input type="url" class="doc_input_url" value="${doc.url || ''}" style="width:100%; max-width:400px;" readonly>
                            <button type="button" class="button btn_upload_doc">Pilih/Unggah File</button>
                            <br><small>Tipe file dan tanggal otomatis di-generate setelah file dipilih.</small>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Tipe & Tanggal (Otomatis)</th>
                        <td>
                            Tipe: <input type="text" class="doc_input_type" value="${doc.type || ''}" style="width:80px;" readonly> 
                            Tanggal: <input type="text" class="doc_input_date" value="${doc.date || ''}" style="width:150px;" readonly>
                        </td>
                    </tr>
                </table>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function renderAll() {
            container.innerHTML = '';
            docsData.forEach(function(doc, idx) {
                renderRow(doc, idx);
            });
        }
        renderAll();

        document.getElementById('btn_add_doc_slide').addEventListener('click', function() {
            docsData.push({title:'', url:'', type:'', date:''});
            renderAll();
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn_remove_doc')) {
                if(confirm('Hapus dokumen ini?')) {
                    var row = e.target.closest('.doc-slide-row');
                    var index = Array.from(container.children).indexOf(row);
                    if (index > -1) {
                        docsData.splice(index, 1);
                        renderAll();
                    }
                }
            }
            
            if (e.target.classList.contains('btn_upload_doc')) {
                e.preventDefault();
                var row = e.target.closest('.doc-slide-row');
                var inputUrl = row.querySelector('.doc_input_url');
                var inputType = row.querySelector('.doc_input_type');
                var inputDate = row.querySelector('.doc_input_date');
                var inputTitle = row.querySelector('.doc_input_title');
                
                var uploader = wp.media({
                    title: 'Pilih Dokumen',
                    button: { text: 'Gunakan Dokumen Ini' },
                    multiple: false
                });
                uploader.on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    inputUrl.value = attachment.url;
                    
                    // Generate Type (e.g., pdf -> PDF)
                    var type = attachment.subtype ? attachment.subtype.toUpperCase() : 'FILE';
                    inputType.value = type;
                    
                    // Generate Date
                    var dateFmt = attachment.dateFormatted || '';
                    if (!dateFmt && attachment.date) {
                        // Fallback if dateFormatted is missing
                        var d = new Date(attachment.date);
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        dateFmt = d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
                    }
                    inputDate.value = dateFmt;
                    
                    if(inputTitle.value === '') {
                        inputTitle.value = attachment.title;
                    }
                });
                uploader.open();
            }
        });

        var form = document.querySelector('form[action="options.php"]');
        if (form) {
            form.addEventListener('submit', function() {
                var rows = container.querySelectorAll('.doc-slide-row');
                var newData = [];
                rows.forEach(function(row) {
                    newData.push({
                        title: row.querySelector('.doc_input_title').value,
                        url: row.querySelector('.doc_input_url').value,
                        type: row.querySelector('.doc_input_type').value,
                        date: row.querySelector('.doc_input_date').value
                    });
                });
                document.getElementById('dprd_dlantunan_docs_data').value = JSON.stringify(newData);
            });
        }
    });
    </script>
    <?php
}

// ==========================================
// PENGATURAN UPLOAD VIDEO D'LANTUNAN (SETTINGS PAGE)
// ==========================================

// Menu dipindahkan ke dprd_pengaturan_dlantunan_menu

function dprd_upload_video_dlantunan_init() {
    register_setting( 'dprd_upload_video_dlantunan_group', 'dprd_dlantunan_video_data' );
}
add_action( 'admin_init', 'dprd_upload_video_dlantunan_init' );

function dprd_upload_video_dlantunan_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Upload Video D'Lantunan</h1>
        <p>Kelola daftar video dokumentasi pada halaman D'Lantunan.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_upload_video_dlantunan_group' );
            do_settings_sections( 'dprd_upload_video_dlantunan_group' );
            
            $defaults = json_encode([
                ['title' => 'Video', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada.', 'url' => 'https://www.youtube.com/embed/uRZvKm-5YuE', 'thumb' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=800&q=80'],
                ['title' => 'Video', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis blandit malesuada. Vestibulum rutrum risus id efficitur mattis.', 'url' => 'https://www.youtube.com/embed/uRZvKm-5YuE', 'thumb' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80']
            ]);
            $saved_vids = get_option('dprd_dlantunan_video_data', '');
            if (empty($saved_vids) || $saved_vids === '[]' || $saved_vids === 'false') {
                $saved_vids = $defaults;
            }
            ?>
            <input type="hidden" name="dprd_dlantunan_video_data" id="dprd_dlantunan_video_data" value="<?php echo esc_attr($saved_vids); ?>">
            
            <div id="video_repeater_container"></div>
            
            <button type="button" class="button button-primary" id="btn_add_video_slide" style="margin-top: 10px;">+ Tambah Video Baru</button>

            <br><br>
            <?php submit_button('Simpan Video'); ?>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var vidsData = [];
        try {
            var rawVal = document.getElementById('dprd_dlantunan_video_data').value;
            vidsData = JSON.parse(rawVal || '[]');
        } catch(e) {}

        var container = document.getElementById('video_repeater_container');

        function renderRow(vid, index) {
            var html = `
            <div class="video-slide-row" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; background: #fafafa; position: relative;">
                <h4 style="margin-top:0;">Video ${index + 1}</h4>
                <button type="button" class="button button-link-delete btn_remove_video" style="position:absolute; top:15px; right:15px; color:#a00;">Hapus</button>
                <table class="form-table">
                    <tr>
                        <th scope="row">Judul Video</th>
                        <td><input type="text" class="vid_input_title" value="${vid.title || ''}" style="width:100%; max-width:400px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Deskripsi</th>
                        <td><textarea class="vid_input_desc" rows="3" style="width:100%; max-width:400px;">${vid.desc || ''}</textarea></td>
                    </tr>
                    <tr>
                        <th scope="row">Link Video (YouTube Embed)</th>
                        <td>
                            <input type="text" class="vid_input_url" value="${vid.url || ''}" style="width:100%; max-width:400px;" placeholder="Contoh: https://www.youtube.com/embed/...">
                            <p class="description" style="margin-top:4px; font-size:12px;">Catatan: Jika Anda menggunakan unggahan video lokal (MP4), mohon isi kolom ini dengan tanda hubung (-). Jika menggunakan tautan YouTube, silakan masukkan URL-nya secara lengkap.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Upload File/Video (MP4)</th>
                        <td>
                            <div class="mp4-preview-container" style="margin-bottom: 10px; display: ${vid.mp4 ? 'block' : 'none'};">
                                <video class="vid_preview_mp4" src="${vid.mp4 || ''}" controls style="max-width: 250px; border: 1px solid #ddd; border-radius: 4px;"></video>
                            </div>
                            <input type="hidden" class="vid_input_mp4" value="${vid.mp4 || ''}">
                            <input type="file" class="hidden_file_input_mp4" accept="video/mp4" style="display:none;">
                            <button type="button" class="button btn_upload_mp4">Pilih/Unggah Video</button>
                            <span class="upload-status" style="margin-left: 10px; color: #0073aa; font-weight: bold; display: none;">Mengunggah...</span>
                            <button type="button" class="button btn_remove_mp4" style="color: #a00; border-color: transparent; box-shadow: none; display: ${vid.mp4 ? 'inline-block' : 'none'};">Hapus Video</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar Thumbnail</th>
                        <td>
                            <div style="margin-bottom: 10px;">
                                <img src="${vid.thumb || ''}" class="vid_preview_thumb" style="max-width: 200px; max-height: 120px; display: ${vid.thumb ? 'block' : 'none'}; border: 1px solid #ddd; border-radius: 4px;" />
                            </div>
                            <input type="hidden" class="vid_input_thumb" value="${vid.thumb || ''}">
                            <input type="file" class="hidden_file_input_thumb" accept="image/*" style="display:none;">
                            <button type="button" class="button btn_upload_video_thumb">Pilih/Unggah Gambar</button>
                            <span class="upload-status-thumb" style="margin-left: 10px; color: #0073aa; font-weight: bold; display: none;">Mengunggah...</span>
                        </td>
                    </tr>
                </table>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function renderAll() {
            container.innerHTML = '';
            vidsData.forEach(function(vid, idx) {
                renderRow(vid, idx);
            });
        }
        renderAll();

        document.getElementById('btn_add_video_slide').addEventListener('click', function() {
            vidsData.push({title:'', desc:'', url:'', thumb:'', mp4:''});
            renderAll();
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn_remove_video')) {
                if(confirm('Hapus video ini?')) {
                    var row = e.target.closest('.video-slide-row');
                    var index = Array.from(container.children).indexOf(row);
                    if (index > -1) {
                        vidsData.splice(index, 1);
                        renderAll();
                    }
                }
            }
            
            if (e.target.classList.contains('btn_upload_video_thumb')) {
                e.preventDefault();
                var row = e.target.closest('.video-slide-row');
                var fileInput = row.querySelector('.hidden_file_input_thumb');
                if (fileInput) fileInput.click();
            }

            if (e.target.classList.contains('btn_upload_mp4')) {
                e.preventDefault();
                var row = e.target.closest('.video-slide-row');
                var fileInput = row.querySelector('.hidden_file_input_mp4');
                if (fileInput) fileInput.click();
            }

            if (e.target.classList.contains('btn_remove_mp4')) {
                e.preventDefault();
                var row = e.target.closest('.video-slide-row');
                var inputMp4 = row.querySelector('.vid_input_mp4');
                var previewMp4 = row.querySelector('.vid_preview_mp4');
                var previewContainer = row.querySelector('.mp4-preview-container');
                var btnRemove = e.target;
                
                inputMp4.value = '';
                previewMp4.src = '';
                previewContainer.style.display = 'none';
                btnRemove.style.display = 'none';
            }
        });

        container.addEventListener('change', function(e) {
            if (e.target.classList.contains('hidden_file_input_mp4') || e.target.classList.contains('hidden_file_input_thumb')) {
                var file = e.target.files[0];
                if (!file) return;
                
                var isMp4 = e.target.classList.contains('hidden_file_input_mp4');
                var row = e.target.closest('.video-slide-row');
                var statusEl = row.querySelector(isMp4 ? '.upload-status' : '.upload-status-thumb');
                var inputUrl = row.querySelector(isMp4 ? '.vid_input_mp4' : '.vid_input_thumb');
                var previewEl = row.querySelector(isMp4 ? '.vid_preview_mp4' : '.vid_preview_thumb');
                
                var formData = new FormData();
                formData.append('action', 'dprd_upload_media_direct');
                formData.append('async_upload', file);
                
                statusEl.style.display = 'inline-block';
                statusEl.textContent = 'Mengunggah...';
                
                fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        statusEl.textContent = 'Berhasil!';
                        inputUrl.value = data.data.url;
                        previewEl.src = data.data.url;
                        if (isMp4) {
                            row.querySelector('.mp4-preview-container').style.display = 'block';
                            row.querySelector('.btn_remove_mp4').style.display = 'inline-block';
                        } else {
                            previewEl.style.display = 'block';
                        }
                        setTimeout(() => statusEl.style.display = 'none', 2000);
                    } else {
                        statusEl.textContent = 'Gagal: ' + (data.data || 'Error');
                    }
                })
                .catch(error => {
                    statusEl.textContent = 'Terjadi kesalahan jaringan.';
                    console.error(error);
                });
            }
        });

        var form = document.querySelector('form[action="options.php"]');
        if (form) {
            form.addEventListener('submit', function() {
                var rows = container.querySelectorAll('.video-slide-row');
                var newData = [];
                rows.forEach(function(row) {
                    newData.push({
                        title: row.querySelector('.vid_input_title').value,
                        desc: row.querySelector('.vid_input_desc').value,
                        url: row.querySelector('.vid_input_url').value,
                        thumb: row.querySelector('.vid_input_thumb').value,
                        mp4: row.querySelector('.vid_input_mp4') ? row.querySelector('.vid_input_mp4').value : ''
                    });
                });
                document.getElementById('dprd_dlantunan_video_data').value = JSON.stringify(newData);
            });
        }
    });
    </script>
    <?php
}

// ==========================================
// PENGATURAN FOTO DOKUMENTASI D'LANTUNAN
// ==========================================

// Menu dipindahkan ke dprd_pengaturan_dlantunan_menu

function dprd_upload_dokumentasi_dlantunan_init() {
    register_setting( 'dprd_upload_dokumentasi_dlantunan_group', 'dprd_dlantunan_foto_data' );
}
add_action( 'admin_init', 'dprd_upload_dokumentasi_dlantunan_init' );

function dprd_upload_dokumentasi_dlantunan_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap" style="max-width: 900px;">
        <h1>Upload Dokumentasi D'Lantunan</h1>

        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_upload_dokumentasi_dlantunan_group' );
            do_settings_sections( 'dprd_upload_dokumentasi_dlantunan_group' );
            
            $defaults = json_encode([
                ['caption' => '', 'url' => '']
            ]);
            $foto_data = get_option( 'dprd_dlantunan_foto_data', '' );
            if (empty($foto_data) || $foto_data === '[]' || $foto_data === 'false') {
                $foto_data = $defaults;
            }
            ?>
            <input type="hidden" name="dprd_dlantunan_foto_data" id="dprd_dlantunan_foto_data" value="<?php echo esc_attr( $foto_data ); ?>">

            <div id="foto_repeater_container" style="margin-bottom:15px;">
                <?php
                $foto_data_arr = json_decode($foto_data, true);
                if (!is_array($foto_data_arr) || empty($foto_data_arr)) {
                    $foto_data_arr = [['caption' => '', 'url' => '']];
                }
                
                foreach ($foto_data_arr as $index => $foto) {
                    $idx = $index;
                    $caption = isset($foto['caption']) ? esc_attr($foto['caption']) : '';
                    $url = isset($foto['url']) ? esc_url($foto['url']) : '';
                    $display_img = $url ? 'block' : 'none';
                    $display_empty = $url ? 'none' : 'block';
                    $display_btn_remove = $url ? 'inline-block' : 'none';
                    ?>
                    <div class="foto-slide-row" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 25px; background: #ffffff; box-shadow: 0 1px 3px rgba(0,0,0,0.05); position: relative;">
                        <h4 style="margin-top:0; color:#334155; font-size:15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">Item Foto <span class="row-index"><?php echo $idx + 1; ?></span></h4>
                        <button type="button" class="button button-link-delete btn_remove_foto" style="position:absolute; top:20px; right:20px; color:#d63638; border: 1px solid #fca5a5; border-radius: 4px; padding: 2px 10px; text-decoration:none; background:#fef2f2;">Hapus Item</button>
                        <table class="form-table" style="margin-top:0;">
                            <tr>
                                <th scope="row" style="padding-top:25px; font-weight:600; color:#334155; width:220px;">Judul Foto</th>
                                <td style="padding-top:25px;">
                                    <input type="text" class="foto_input_caption" value="<?php echo $caption; ?>" style="width:100%; max-width:100%; padding: 8px; border-color: #cbd5e1; border-radius: 4px; box-shadow: none;" placeholder="Contoh: Kegiatan Rapat Paripurna DPRD...">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="padding-top:20px; font-weight:600; color:#334155;">Gambar Foto Dokumentasi</th>
                                <td style="padding-top:20px;">
                                    <div class="foto-preview-container" style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 30px 20px; text-align: center; background: #f8fafc; margin-bottom: 15px; position: relative; min-height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                        <span class="empty-state-text" style="color: #64748b; font-size: 14px; display: <?php echo $display_empty; ?>;">Belum ada gambar foto yang diunggah.</span>
                                        <img src="<?php echo $url; ?>" class="foto_preview_img" style="max-width: 100%; max-height: 300px; border-radius: 4px; display: <?php echo $display_img; ?>; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" />
                                        <button type="button" class="button btn_remove_foto_image" style="margin-top: 15px; color: #d63638; border-color: transparent; box-shadow: none; text-decoration: underline; display: <?php echo $display_btn_remove; ?>;">Hapus Gambar Ini</button>
                                    </div>
                                    <input type="hidden" class="foto_input_url" value="<?php echo $url; ?>">
                                    <input type="file" class="hidden_file_input_foto" accept="image/*" style="display:none;">
                                    
                                    <button type="button" class="button button-primary btn_upload_foto" style="background:#A5182B; border-color:#8B1E1E; padding: 4px 16px; height: auto; min-height: 36px; display:inline-flex; align-items:center;">
                                        <span class="dashicons dashicons-upload" style="margin-right:6px; font-size: 18px; width: 18px; height: 18px;"></span> Unggah / Pilih Gambar Foto
                                    </button>
                                    <span class="upload-status-foto" style="margin-left: 10px; color: #0073aa; font-weight: bold; display: none;">Memproses...</span>
                                    <p class="description" style="margin-top:12px; font-size:13px; color:#64748b;">Format gambar yang disarankan: PNG, JPG, WebP, atau SVG dengan resolusi tinggi.</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <button type="button" class="button" id="btn_add_foto_slide" style="margin-bottom: 20px;">+ Tambah Foto Dokumentasi</button>
            <br>
            <?php submit_button( 'Simpan Perubahan' ); ?>
        </form>
    </div>

    <!-- Cropper Modal -->
    <div id="cropper_modal_overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:999999;">
        <div style="background:#fff; width:90%; max-width:1000px; height:90%; margin:2% auto; position:relative; display:flex; flex-direction:column; border-radius: 8px; overflow:hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.5);">
            <div style="padding:15px; border-bottom:1px solid #ddd; display:flex; justify-content:space-between; align-items:center; background:#f9f9f9; z-index:10;">
                <h3 style="margin:0;">Crop Foto Dokumentasi</h3>
                <button type="button" class="button" id="btn_close_cropper">Batal</button>
            </div>
            
            <div style="flex-grow:1; display:flex; flex-direction:row; overflow:hidden; background:#e5e5e5; z-index:5;">
                <div style="flex:1; padding:20px; overflow:hidden; background:#333; position:relative;">
                    <div style="width:100%; height:100%; position:relative; display:block;">
                        <img id="image_to_crop_doc" src="" style="display:block; max-width:100%; max-height:100%; margin:0 auto;">
                    </div>
                </div>
                <div style="width:250px; padding:20px; background:#f0f0f0; border-left:1px solid #ddd; display:flex; flex-direction:column; align-items:center;">
                    <h4 style="margin-top:0; margin-bottom:15px;">Preview</h4>
                    <div class="cropper-preview" style="width: 240px; height: 135px; overflow: hidden; border: 1px solid #ccc; background: #fff;"></div>
                </div>
            </div>
            
            <div style="padding:15px; border-top:1px solid #ddd; text-align:right; background:#f9f9f9; z-index:10;">
                <button type="button" class="button button-primary" id="btn_apply_crop_doc">Terapkan Crop &amp; Simpan</button>
            </div>
        </div>
    </div>

    <script>
    (function() {
        var fotoData = [];
        try {
            var rawVal = document.getElementById('dprd_dlantunan_foto_data').value;
            fotoData = JSON.parse(rawVal || '[]');
        } catch(e) {}

        if (!Array.isArray(fotoData) || fotoData.length === 0) {
            fotoData = [{caption: '', url: ''}];
        }

        var container = document.getElementById('foto_repeater_container');
        var cropperModal = document.getElementById('cropper_modal_overlay');
        var cropperImage = document.getElementById('image_to_crop_doc');
        var btnCloseCropper = document.getElementById('btn_close_cropper');
        var btnApplyCrop = document.getElementById('btn_apply_crop_doc');
        var activeRow = null;
        var cropper = null;

        function renderRow(foto, index) {
            var html = `
            <div class="foto-slide-row" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 25px; background: #ffffff; box-shadow: 0 1px 3px rgba(0,0,0,0.05); position: relative;">
                <h4 style="margin-top:0; color:#334155; font-size:15px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">Item Foto <span class="row-index">${index + 1}</span></h4>
                <button type="button" class="button button-link-delete btn_remove_foto" style="position:absolute; top:20px; right:20px; color:#d63638; border: 1px solid #fca5a5; border-radius: 4px; padding: 2px 10px; text-decoration:none; background:#fef2f2;">Hapus Item</button>
                <table class="form-table" style="margin-top:0;">
                    <tr>
                        <th scope="row" style="padding-top:25px; font-weight:600; color:#334155; width:220px;">Judul Foto</th>
                        <td style="padding-top:25px;">
                            <input type="text" class="foto_input_caption" value="${foto.caption || ''}" style="width:100%; max-width:100%; padding: 8px; border-color: #cbd5e1; border-radius: 4px; box-shadow: none;" placeholder="Contoh: Kegiatan Rapat Paripurna DPRD...">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="padding-top:20px; font-weight:600; color:#334155;">Gambar Foto Dokumentasi</th>
                        <td style="padding-top:20px;">
                            <div class="foto-preview-container" style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 30px 20px; text-align: center; background: #f8fafc; margin-bottom: 15px; position: relative; min-height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <span class="empty-state-text" style="color: #64748b; font-size: 14px; display: ${foto.url ? 'none' : 'block'};">Belum ada gambar foto yang diunggah.</span>
                                <img src="${foto.url || ''}" class="foto_preview_img" style="max-width: 100%; max-height: 300px; border-radius: 4px; display: ${foto.url ? 'block' : 'none'}; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" />
                                <button type="button" class="button btn_remove_foto_image" style="margin-top: 15px; color: #d63638; border-color: transparent; box-shadow: none; text-decoration: underline; display: ${foto.url ? 'inline-block' : 'none'};">Hapus Gambar Ini</button>
                            </div>
                            <input type="hidden" class="foto_input_url" value="${foto.url || ''}">
                            <input type="file" class="hidden_file_input_foto" accept="image/*" style="position:absolute; width:1px; height:1px; opacity:0; z-index:-1;">
                            
                            <button type="button" class="button button-primary btn_upload_foto" style="background:#A5182B; border-color:#8B1E1E; padding: 4px 16px; height: auto; min-height: 36px; display:inline-flex; align-items:center;">
                                <span class="dashicons dashicons-upload" style="margin-right:6px; font-size: 18px; width: 18px; height: 18px;"></span> Unggah / Pilih Gambar Foto
                            </button>
                            <span class="upload-status-foto" style="margin-left: 10px; color: #0073aa; font-weight: bold; display: none;">Memproses...</span>
                            <p class="description" style="margin-top:12px; font-size:13px; color:#64748b;">Format gambar yang disarankan: PNG, JPG, WebP, atau SVG dengan resolusi tinggi.</p>
                        </td>
                    </tr>
                </table>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function reindexRows() {
            var rows = container.querySelectorAll('.foto-slide-row');
            rows.forEach(function(row, idx) {
                var indexSpan = row.querySelector('.row-index');
                if (indexSpan) indexSpan.textContent = idx + 1;
            });
        }

        document.getElementById('btn_add_foto_slide').addEventListener('click', function() {
            var currentRows = container.querySelectorAll('.foto-slide-row').length;
            renderRow({url:'', caption:''}, currentRows);
        });

        container.addEventListener('click', function(e) {
            var targetEl = e.target.nodeType === 3 ? e.target.parentNode : e.target;
            if (!targetEl || !targetEl.closest) return;
            
            var btnRemoveFoto = targetEl.closest('.btn_remove_foto');
            if (btnRemoveFoto) {
                if(confirm('Hapus foto ini?')) {
                    var row = btnRemoveFoto.closest('.foto-slide-row');
                    row.remove();
                    reindexRows();
                }
                return;
            }
            
            var btnUploadFoto = targetEl.closest('.btn_upload_foto');
            if (btnUploadFoto) {
                e.preventDefault();
                var row = btnUploadFoto.closest('.foto-slide-row');
                var fileInput = row.querySelector('.hidden_file_input_foto');
                if (fileInput) fileInput.click();
                return;
            }
            
            var btnRemoveImg = targetEl.closest('.btn_remove_foto_image');
            if (btnRemoveImg) {
                e.preventDefault();
                var row = btnRemoveImg.closest('.foto-slide-row');
                var inputUrl = row.querySelector('.foto_input_url');
                var previewImg = row.querySelector('.foto_preview_img');
                var emptyState = row.querySelector('.empty-state-text');
                
                inputUrl.value = '';
                previewImg.src = '';
                previewImg.style.display = 'none';
                btnRemoveImg.style.display = 'none';
                if(emptyState) emptyState.style.display = 'block';
                return;
            }
        });

        container.addEventListener('change', function(e) {
            if (e.target.classList.contains('hidden_file_input_foto')) {
                var file = e.target.files[0];
                if (!file) return;
                
                activeRow = e.target.closest('.foto-slide-row');
                var reader = new FileReader();
                reader.onload = function(evt) {
                    cropperModal.style.display = 'block';
                    cropperImage.src = evt.target.result;
                    
                    setTimeout(function() {
                        if (cropper) {
                            cropper.destroy();
                            cropper = null;
                        }
                        
                        var initCropper = function() {
                            cropper = new Cropper(cropperImage, {
                                viewMode: 2,
                                aspectRatio: 16 / 9,
                                dragMode: 'move',
                                autoCropArea: 1,
                                restore: false,
                                guides: true,
                                center: true,
                                highlight: true,
                                cropBoxMovable: true,
                                cropBoxResizable: true,
                                toggleDragModeOnDblclick: false,
                                zoomOnWheel: false,
                                responsive: true,
                                preview: '.cropper-preview'
                            });
                        };

                        if (typeof Cropper !== 'undefined') {
                            initCropper();
                        } else {
                            // Fallback: Dynamically inject script if enqueue failed
                            var script = document.createElement('script');
                            script.src = "<?php echo get_template_directory_uri(); ?>/assets/js/cropper.min.js?v=" + new Date().getTime();
                            script.onload = function() {
                                if (typeof Cropper !== 'undefined') {
                                    initCropper();
                                } else {
                                    alert("Pustaka Cropper.js masih gagal dimuat (Internal Error).");
                                }
                            };
                            script.onerror = function() {
                                alert("Pustaka Cropper.js gagal dimuat secara fatal! Periksa koneksi atau lokasi file.");
                            };
                            document.head.appendChild(script);
                            
                            // Also inject CSS
                            var link = document.createElement('link');
                            link.rel = 'stylesheet';
                            link.href = "<?php echo get_template_directory_uri(); ?>/assets/css/cropper.min.css?v=" + new Date().getTime();
                            document.head.appendChild(link);
                        }
                    }, 250);
                };
                reader.readAsDataURL(file);
                e.target.value = ''; 
            }
        });

        btnCloseCropper.addEventListener('click', function() {
            cropperModal.style.display = 'none';
            if (cropper) cropper.destroy();
            activeRow = null;
        });

        btnApplyCrop.addEventListener('click', function() {
            if (!cropper || !activeRow) return;
            
            var canvas = cropper.getCroppedCanvas({
                maxWidth: 1200,
                maxHeight: 1200
            });
            
            if (!canvas) {
                alert('Gagal memotong gambar.');
                return;
            }

            var base64Data = canvas.toDataURL('image/jpeg', 0.85);
            var statusEl = activeRow.querySelector('.upload-status-foto');
            var inputUrl = activeRow.querySelector('.foto_input_url');
            var previewEl = activeRow.querySelector('.foto_preview_img');

            cropperModal.style.display = 'none';
            if (cropper) cropper.destroy();

            statusEl.style.display = 'inline-block';
            statusEl.textContent = 'Menyimpan...';

            var formData = new FormData();
            formData.append('action', 'dprd_upload_base64_image');
            formData.append('image_base64', base64Data);

            jQuery.ajax({
                url: ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // response is already parsed JSON if server sends application/json
                    if (typeof response === 'string') {
                        try { response = JSON.parse(response); } catch(e) {}
                    }
                    if (response && response.success) {
                        statusEl.style.display = 'inline-block';
                        statusEl.textContent = 'Berhasil!';
                        inputUrl.value = response.data.url;
                        previewEl.src = response.data.url;
                        previewEl.style.display = 'block';
                        
                        var btnRemoveImg = activeRow.querySelector('.btn_remove_foto_image');
                        if (btnRemoveImg) btnRemoveImg.style.display = 'inline-block';
                        
                        var emptyState = activeRow.querySelector('.empty-state-text');
                        if (emptyState) emptyState.style.display = 'none';
                        
                        setTimeout(() => statusEl.style.display = 'none', 2000);
                    } else {
                        statusEl.style.display = 'inline-block';
                        var err = response && response.data ? response.data : 'Tidak diketahui (Server merespons: ' + JSON.stringify(response) + ')';
                        statusEl.textContent = 'Gagal: ' + err;
                    }
                },
                error: function(xhr, status, error) {
                    statusEl.style.display = 'inline-block';
                    statusEl.textContent = 'Server Error: ' + error;
                    console.error("AJAX Error: ", xhr.responseText);
                }
            });
        });

        var form = document.querySelector('form[action="options.php"]');
        if (form) {
            form.addEventListener('submit', function() {
                var rows = container.querySelectorAll('.foto-slide-row');
                var newData = [];
                rows.forEach(function(row) {
                    newData.push({
                        url: row.querySelector('.foto_input_url').value,
                        caption: row.querySelector('.foto_input_caption').value
                    });
                });
                document.getElementById('dprd_dlantunan_foto_data').value = JSON.stringify(newData);
            });
        }
    })();
    </script>
    <?php
}

// ==========================================
// CUSTOMIZE ADMIN COLUMNS FOR DOKUMEN CPT
// ==========================================
function dprd_dokumen_columns($columns) {
    $new_columns = array(
        'cb' => $columns['cb'],
        'title' => 'Judul Dokumen',
    );
    
    if (isset($columns['taxonomy-kategori_dokumen'])) {
        $new_columns['taxonomy-kategori_dokumen'] = 'Kategori';
    } else {
        $new_columns['kategori_dokumen_custom'] = 'Kategori';
    }
    
    $new_columns['dokumen_grup'] = 'Grup (Lokasi)';
    $new_columns['dokumen_tahun'] = 'Tahun';
    $new_columns['dokumen_file'] = 'File PDF';
    
    return $new_columns;
}
add_filter('manage_dokumen_posts_columns', 'dprd_dokumen_columns', 99); // 99 to override SEO plugins

function dprd_dokumen_custom_column($column, $post_id) {
    switch ($column) {
        case 'kategori_dokumen_custom':
            $terms = get_the_terms($post_id, 'kategori_dokumen');
            if (!empty($terms) && !is_wp_error($terms)) {
                $out = array();
                foreach ($terms as $term) {
                    $out[] = $term->name;
                }
                echo join(', ', $out);
            } else {
                echo '-';
            }
            break;
        case 'dokumen_grup':
            $grup = get_post_meta($post_id, '_dokumen_grup', true);
            if ($grup == 'PPID') {
                echo '<span style="background:#e0f2fe; color:#0369a1; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Halaman PPID</span>';
            } elseif ($grup == 'SAKIP') {
                echo '<span style="background:#fef08a; color:#854d0e; padding:4px 10px; border-radius:12px; font-weight:600; font-size:11px;">Halaman SAKIP</span>';
            } else {
                echo esc_html($grup);
            }
            break;
        case 'dokumen_tahun':
            echo '<strong>' . esc_html(get_post_meta($post_id, '_dokumen_tahun', true)) . '</strong>';
            break;
        case 'dokumen_file':
            $file = get_post_meta($post_id, '_dokumen_file_url', true);
            if ($file) {
                echo '<a href="'.esc_url($file).'" target="_blank" class="button button-small"><span class="dashicons dashicons-media-document" style="margin-top:3px; color:#A5182B;"></span> Lihat File</a>';
            } else {
                echo '<span style="color:#94a3b8; font-style:italic;">Belum ada file</span>';
            }
            break;
    }
}
add_action('manage_dokumen_posts_custom_column', 'dprd_dokumen_custom_column', 10, 2);

// Hapus fitur "Quick Edit" (Penyuntingan Cepat) untuk CPT Dokumen agar user tidak bingung
function dprd_remove_quick_edit_dokumen($actions, $post) {
    if ($post->post_type === 'dokumen') {
        unset($actions['inline hide-if-no-js']);
    }
    return $actions;
}
add_filter('post_row_actions', 'dprd_remove_quick_edit_dokumen', 10, 2);

// ==========================================
// CPT DOKUMEN & CUSTOM TAXONOMY
// ==========================================

function dprd_register_dokumen_cpt() {
    $labels = array(
        'name'                  => _x( 'Dokumen', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Dokumen', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Dokumen', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Dokumen', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Tambah Baru', 'textdomain' ),
        'add_new_item'          => __( 'Tambah Dokumen Baru', 'textdomain' ),
        'new_item'              => __( 'Dokumen Baru', 'textdomain' ),
        'edit_item'             => __( 'Edit Dokumen', 'textdomain' ),
        'view_item'             => __( 'Lihat Dokumen', 'textdomain' ),
        'all_items'             => __( 'Semua Dokumen', 'textdomain' ),
        'search_items'          => __( 'Cari Dokumen', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dokumen' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-media-document',
        'supports'           => array( 'title', 'editor', 'excerpt' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'dokumen', $args );

    // Register Taxonomy
    $tax_labels = array(
        'name'              => _x( 'Kategori Dokumen', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Kategori', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Cari Kategori', 'textdomain' ),
        'all_items'         => __( 'Semua Kategori', 'textdomain' ),
        'parent_item'       => __( 'Parent Kategori', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Kategori:', 'textdomain' ),
        'edit_item'         => __( 'Edit Kategori', 'textdomain' ),
        'update_item'       => __( 'Update Kategori', 'textdomain' ),
        'add_new_item'      => __( 'Tambah Kategori', 'textdomain' ),
        'new_item_name'     => __( 'Nama Kategori Baru', 'textdomain' ),
        'menu_name'         => __( 'Kategori', 'textdomain' ),
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'kategori-dokumen' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'kategori_dokumen', array( 'dokumen' ), $tax_args );
}
add_action( 'init', 'dprd_register_dokumen_cpt' );

// META BOXES FOR DOKUMEN
function dprd_dokumen_meta_boxes() {
    add_meta_box(
        'dprd_dokumen_details',
        'Detail Dokumen',
        'dprd_dokumen_meta_box_html',
        'dokumen',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'dprd_dokumen_meta_boxes' );

function dprd_dokumen_meta_box_html( $post ) {
    wp_nonce_field( 'dprd_save_dokumen_meta', 'dprd_dokumen_meta_nonce' );

    $file_url = get_post_meta( $post->ID, '_dokumen_file_url', true );
    $tanggal = get_post_meta( $post->ID, '_dokumen_tanggal', true );
    $tahun = get_post_meta( $post->ID, '_dokumen_tahun', true );
    $grup = get_post_meta( $post->ID, '_dokumen_grup', true );

    // Defaults
    if(empty($tanggal)) $tanggal = date('d F Y');
    if(empty($tahun)) $tahun = date('Y');
    if(empty($grup)) $grup = 'PPID';

    ?>
    <table class="form-table">
        <tr>
            <th><label for="dokumen_grup">Grup Dokumen</label></th>
            <td>
                <select name="dokumen_grup" id="dokumen_grup">
                    <option value="PPID" <?php selected($grup, 'PPID'); ?>>PPID</option>
                    <option value="SAKIP" <?php selected($grup, 'SAKIP'); ?>>SAKIP</option>
                </select>
                <p class="description">Pilih di mana dokumen ini akan ditampilkan.</p>
            </td>
        </tr>
        <tr>
            <th><label for="dokumen_tanggal">Tanggal Dokumen</label></th>
            <td>
                <input type="text" name="dokumen_tanggal" id="dokumen_tanggal" value="<?php echo esc_attr($tanggal); ?>" class="regular-text">
                <p class="description">Contoh: 12 Januari 2026</p>
            </td>
        </tr>
        <tr>
            <th><label for="dokumen_tahun">Tahun Dokumen</label></th>
            <td>
                <input type="number" name="dokumen_tahun" id="dokumen_tahun" value="<?php echo esc_attr($tahun); ?>" class="regular-text" style="width:100px;">
                <p class="description">Contoh: 2026</p>
            </td>
        </tr>
        <tr>
            <th><label for="dokumen_file_url">File PDF Dokumen</label></th>
            <td>
                <input type="text" name="dokumen_file_url" id="dokumen_file_url" value="<?php echo esc_url($file_url); ?>" class="regular-text">
                <button type="button" class="button button-secondary" id="dokumen_upload_btn">Upload PDF</button>
                <p class="description">URL file dokumen (PDF/Word/Excel).</p>
            </td>
        </tr>
    </table>
    <script>
    jQuery(document).ready(function($){
        var mediaUploader;
        $('#dokumen_upload_btn').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Pilih Dokumen',
                button: { text: 'Gunakan Dokumen Ini' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#dokumen_file_url').val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

function dprd_save_dokumen_meta( $post_id ) {
    if ( ! isset( $_POST['dprd_dokumen_meta_nonce'] ) || ! wp_verify_nonce( $_POST['dprd_dokumen_meta_nonce'], 'dprd_save_dokumen_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['dokumen_file_url'] ) ) {
        update_post_meta( $post_id, '_dokumen_file_url', sanitize_text_field( $_POST['dokumen_file_url'] ) );
    }
    if ( isset( $_POST['dokumen_tanggal'] ) ) {
        update_post_meta( $post_id, '_dokumen_tanggal', sanitize_text_field( $_POST['dokumen_tanggal'] ) );
    }
    if ( isset( $_POST['dokumen_tahun'] ) ) {
        update_post_meta( $post_id, '_dokumen_tahun', absint( $_POST['dokumen_tahun'] ) );
    }
    if ( isset( $_POST['dokumen_grup'] ) ) {
        update_post_meta( $post_id, '_dokumen_grup', sanitize_text_field( $_POST['dokumen_grup'] ) );
    }
}
add_action( 'save_post_dokumen', 'dprd_save_dokumen_meta' );

// ==========================================
// DOKUMEN DOWNLOAD TRACKER
// ==========================================
function dprd_track_dokumen_download() {
    if ( isset( $_GET['download_doc_id'] ) ) {
        $post_id = intval( $_GET['download_doc_id'] );
        $post = get_post($post_id);
        
        if ( $post && $post->post_type === 'dokumen' ) {
            $file_url = get_post_meta( $post_id, '_dokumen_file_url', true );
            
            if ( ! empty( $file_url ) ) {
                // Increment counter
                $count = (int) get_post_meta( $post_id, '_jumlah_unduhan', true );
                update_post_meta( $post_id, '_jumlah_unduhan', $count + 1 );
                
                // Redirect to file
                wp_redirect( esc_url_raw( $file_url ) );
                exit;
            }
        }
        
        // Fallback if file not found
        wp_redirect( home_url() );
        exit;
    }
}
add_action( 'template_redirect', 'dprd_track_dokumen_download' );

// Include Footer Settings
require get_template_directory() . '/footer-settings.php';

