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
        wp_enqueue_style( 'tema-kustom-beranda', get_template_directory_uri() . '/assets/beranda-style.css', array(), '1.2' );
        wp_enqueue_script( 'tema-kustom-beranda-script', get_template_directory_uri() . '/assets/beranda-script.js', array(), '1.2', true );
    }
}
add_action( 'wp_enqueue_scripts', 'tema_kustom_dprd_scripts' );

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
        25
    );
}
add_action( 'admin_menu', 'dprd_register_struktur_menu' );

// 2. Enqueue Media Script & Cropper.js di WP Admin
function dprd_admin_enqueue_media_scripts( $hook ) {
    if ( $hook === 'toplevel_page_dprd-profile' || $hook === 'toplevel_page_dprd-struktur-organisasi' || $hook === 'post.php' || $hook === 'post-new.php' ) {
        wp_enqueue_media();
        wp_enqueue_style( 'cropper-css', 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css', array(), '1.5.13' );
        wp_enqueue_script( 'cropper-js', 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js', array( 'jquery' ), '1.5.13', true );
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
                        <div id="dprd_struktur_img_preview" style="margin-bottom:15px; background:#fafafa; padding:16px; border:2px dashed #cbd5e1; border-radius:8px; text-align:center; max-width:580px;">
                            <?php if ( $current_img ) : ?>
                                <img src="<?php echo esc_url( $current_img ); ?>" style="max-width:100%; max-height:380px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Struktur Organisasi">
                            <?php else : ?>
                                <p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada gambar Struktur Organisasi yang diunggah.</p>
                            <?php endif; ?>
                        </div>
                        
                        <input type="hidden" name="dprd_struktur_img_url" id="dprd_struktur_img_url" value="<?php echo esc_url( $current_img ); ?>">
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
                <div style="flex:1; padding:20px; background:#f8fafc; overflow-y:auto; display:flex; flex-direction:column; justify-content:center;">
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
                            ✨ Hasil penggabungan teks & foto diperbarui secara langsung saat Anda menggeser box crop di sebelah kiri!
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
                    <select id="crop_aspect_ratio" class="button" style="height:30px; line-height:1; font-size:13px; font-weight:600; color:#A5182B;" disabled>
                        <option value="3.076923076923077" selected>🔒 Rasio Box Foto (Terkunci Presisi 800:260)</option>
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

        function updateLiveImg() {
            if (!cropper) return;
            try {
                var canvas = cropper.getCroppedCanvas({ width: 800, height: 260 });
                if (canvas) {
                    $('#dprd_live_preview_img').attr('src', canvas.toDataURL('image/jpeg', 0.90));
                }
            } catch(e) {}
        }

        // 1. Media Uploader untuk Struktur Organisasi
        var frameStruktur;
        $('#dprd_upload_struktur_btn').on('click', function(e){
            e.preventDefault();
            if (frameStruktur) {
                frameStruktur.open();
                return;
            }
            frameStruktur = wp.media({
                title: 'Pilih atau Unggah Gambar Struktur Organisasi',
                button: { text: 'Gunakan Gambar Ini' },
                multiple: false
            });
            frameStruktur.on('select', function(){
                var attachment = frameStruktur.state().get('selection').first().toJSON();
                $('#dprd_struktur_img_url').val(attachment.url);
                $('#dprd_struktur_img_preview').html('<img src="' + attachment.url + '" style="max-width:100%; max-height:380px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Struktur Organisasi">');
                $('#dprd_remove_struktur_btn').show();
            });
            frameStruktur.open();
        });

        $('#dprd_remove_struktur_btn').on('click', function(e){
            e.preventDefault();
            $('#dprd_struktur_img_url').val('');
            $('#dprd_struktur_img_preview').html('<p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada gambar Struktur Organisasi yang diunggah.</p>');
            $(this).hide();
        });

        // 2. Media Uploader + CROPPER INTERAKTIF & LIVE PREVIEW untuk Susunan Organisasi
        var frameSusunan;
        $('#dprd_upload_susunan_btn').on('click', function(e){
            e.preventDefault();
            if (frameSusunan) {
                frameSusunan.open();
                return;
            }
            frameSusunan = wp.media({
                title: 'Pilih atau Unggah Foto Susunan Organisasi',
                button: { text: 'Pilih & Potong Gambar' },
                multiple: false
            });
            frameSusunan.on('select', function(){
                var attachment = frameSusunan.state().get('selection').first().toJSON();
                selectedOriginalUrl = attachment.url;

                // Buka Cropper Modal
                $('#dprd_crop_target_img').attr('src', selectedOriginalUrl);
                $('#dprd_cropper_modal').css('display', 'flex');

                if (cropper) {
                    cropper.destroy();
                }

                var image = document.getElementById('dprd_crop_target_img');
                var SUSUNAN_RATIO = 800 / 260; // Rasio Terkunci 3.0769 (Sesuai Box Wadah Foto Web)
                cropper = new Cropper(image, {
                    aspectRatio: SUSUNAN_RATIO,
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
            });
            frameSusunan.open();
        });

        // Controls Cropper
        $('#crop_rotate_left').on('click', function(){ if (cropper) { cropper.rotate(-90); updateLiveImg(); } });
        $('#crop_rotate_right').on('click', function(){ if (cropper) { cropper.rotate(90); updateLiveImg(); } });
        $('#crop_zoom_in').on('click', function(){ if (cropper) { cropper.zoom(0.1); updateLiveImg(); } });
        $('#crop_zoom_out').on('click', function(){ if (cropper) { cropper.zoom(-0.1); updateLiveImg(); } });
        $('#crop_aspect_ratio').on('change', function(){
            if (cropper) {
                cropper.setAspectRatio(800 / 260);
                setTimeout(updateLiveImg, 80);
            }
        });

        // Close Modal
        $('#dprd_close_crop_modal').on('click', function(){
            if (cropper) cropper.destroy();
            $('#dprd_cropper_modal').hide();
        });

        // Use Original (Tanpa Crop)
        $('#btn_use_original').on('click', function(){
            if (selectedOriginalUrl) {
                $('#dprd_susunan_organisasi_photo').val(selectedOriginalUrl);
                $('#dprd_susunan_photo_preview').html('<img src="' + selectedOriginalUrl + '" style="max-width:100%; max-height:300px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Foto Susunan Organisasi">');
                $('#dprd_remove_susunan_btn').show();
            }
            if (cropper) cropper.destroy();
            $('#dprd_cropper_modal').hide();
        });

        // Apply Crop & Upload via AJAX
        $('#btn_apply_crop').on('click', function(){
            if (!cropper) return;
            var $btn = $(this);
            $btn.prop('disabled', true).text('Memproses Potong Gambar...');

            var canvas = cropper.getCroppedCanvas({
                maxWidth: 1920,
                maxHeight: 1080,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });

            var croppedDataUrl = canvas.toDataURL('image/jpeg', 0.92);

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'dprd_save_cropped_image',
                    nonce: cropNonce,
                    image_data: croppedDataUrl
                },
                success: function(response) {
                    $btn.prop('disabled', false).html('<span class="dashicons dashicons-yes"></span> Potong & Simpan Hasil Crop');
                    if (response.success && response.data.url) {
                        var croppedUrl = response.data.url;
                        $('#dprd_susunan_organisasi_photo').val(croppedUrl);
                        $('#dprd_susunan_photo_preview').html('<img src="' + croppedUrl + '" style="max-width:100%; max-height:300px; border-radius:6px; box-shadow:0 2px 10px rgba(0,0,0,0.1);" alt="Preview Foto Susunan Organisasi">');
                        $('#dprd_remove_susunan_btn').show();
                        if (cropper) cropper.destroy();
                        $('#dprd_cropper_modal').hide();
                    } else {
                        alert('Gagal menyimpan gambar hasil potong: ' + (response.data || 'Error'));
                    }
                },
                error: function() {
                    $btn.prop('disabled', false).html('<span class="dashicons dashicons-yes"></span> Potong & Simpan Hasil Crop');
                    alert('Terjadi kesalahan server saat menyimpan gambar.');
                }
            });
        });

        $('#dprd_remove_susunan_btn').on('click', function(e){
            e.preventDefault();
            $('#dprd_susunan_organisasi_photo').val('');
            $('#dprd_susunan_photo_preview').html('<p style="color:#64748b; margin:20px 0; font-size:14px;">Belum ada foto Susunan Organisasi yang diunggah.</p>');
            $(this).hide();
        });
    });
    </script>
    <?php
}

