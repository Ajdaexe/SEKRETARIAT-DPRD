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

// ==========================================
// PENGATURAN BERANDA & VIDEO (WP-ADMIN)
// ==========================================

function dprd_theme_admin_scripts($hook) {
    if ( $hook != 'toplevel_page_dprd-statistik-beranda' ) {
        return;
    }
    wp_enqueue_media(); // For file uploads (PDF)
    wp_enqueue_style( 'cropper-css', 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css' );
    wp_enqueue_script( 'cropper-js', 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js', array(), '1.5.13', true );
}
add_action( 'admin_enqueue_scripts', 'dprd_theme_admin_scripts' );

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

function dprd_theme_settings_menu() {
    add_menu_page(
        'Pengaturan Beranda', 
        'Pengaturan Beranda', 
        'manage_options', 
        'dprd-statistik-beranda', 
        'dprd_theme_settings_page_html', 
        'dashicons-admin-home', 
        25
    );
}
add_action( 'admin_menu', 'dprd_theme_settings_menu' );

function dprd_theme_settings_init() {
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_pegawai' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_agenda' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_dokumen' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_transparan' );
    
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_label_pegawai' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_label_agenda' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_label_dokumen' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_stat_label_transparan' );
    
    // Video Settings
    register_setting( 'dprd_statistik_beranda_group', 'dprd_video_title' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_video_url' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_video_thumbnail_base64', array( 'sanitize_callback' => 'dprd_handle_video_thumb_base64' ) );

    // Informasi Terbaru Settings
    register_setting( 'dprd_statistik_beranda_group', 'dprd_info_title' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_info_date' );
    register_setting( 'dprd_statistik_beranda_group', 'dprd_info_file_url' );
}
add_action( 'admin_init', 'dprd_theme_settings_init' );

function dprd_theme_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Pengaturan Statistik Beranda</h1>
        <p>Silakan isi teks label dan angka untuk ditampilkan pada bagian statistik di halaman Beranda.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_statistik_beranda_group' );
            do_settings_sections( 'dprd_statistik_beranda_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Statistik 1</th>
                    <td>
                        <input type="text" name="dprd_stat_label_pegawai" value="<?php echo esc_attr( get_option('dprd_stat_label_pegawai', 'Pegawai Profesional') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_pegawai" value="<?php echo esc_attr( get_option('dprd_stat_pegawai', 150) ); ?>" placeholder="Angka" style="width: 100px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 2</th>
                    <td>
                        <input type="text" name="dprd_stat_label_agenda" value="<?php echo esc_attr( get_option('dprd_stat_label_agenda', 'Agenda DPRD Tahun Ini') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_agenda" value="<?php echo esc_attr( get_option('dprd_stat_agenda', 45) ); ?>" placeholder="Angka" style="width: 100px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 3</th>
                    <td>
                        <input type="text" name="dprd_stat_label_dokumen" value="<?php echo esc_attr( get_option('dprd_stat_label_dokumen', 'Dokumen Tersedia') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_dokumen" value="<?php echo esc_attr( get_option('dprd_stat_dokumen', 250) ); ?>" placeholder="Angka" style="width: 100px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 4</th>
                    <td>
                        <input type="text" name="dprd_stat_label_transparan" value="<?php echo esc_attr( get_option('dprd_stat_label_transparan', 'Pelayanan Transparan') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_transparan" value="<?php echo esc_attr( get_option('dprd_stat_transparan', 100) ); ?>" max="100" placeholder="Angka" style="width: 100px;" /> %
                    </td>
                </tr>
            </table>
            
            <hr style="margin: 30px 0;">
            <h2>Pengaturan Video Beranda</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Video</th>
                    <td><input type="text" name="dprd_video_title" value="<?php echo esc_attr( get_option('dprd_video_title', 'PERSETUJUAN BERSAMA RAPERTA PERTANGGUNGJAWABAN APBD TA 2025 DAN PENYAMPAIAN KUA PPAS TA 2027') ); ?>" style="width: 100%; max-width: 600px;" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link YouTube</th>
                    <td><input type="url" name="dprd_video_url" value="<?php echo esc_url( get_option('dprd_video_url', 'https://youtu.be/uRZvKm-5YuE?si=0XHt5Nl5IPKieJRO') ); ?>" style="width: 100%; max-width: 600px;" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thumbnail Saat Ini</th>
                    <td>
                        <?php $thumb = get_option('dprd_video_thumbnail_url', 'https://www.purbalinggakab.go.id/wp-content/uploads/2025/08/DSC00352-1280x640.jpg'); ?>
                        <img src="<?php echo esc_url($thumb); ?>" style="max-width: 400px; height: auto; border: 1px solid #ccc; border-radius: 8px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Unggah Thumbnail Baru</th>
                    <td>
                        <p>Pilih gambar baru, lalu sesuaikan (crop) sebelum disimpan.</p>
                        <input type="file" id="video_image_input" accept="image/*" />
                        <div id="cropper-container" style="max-width: 600px; margin-top: 10px; display: none;">
                            <img id="image_to_crop" src="" style="max-width: 100%;" />
                            <br><br>
                            <button type="button" class="button button-secondary" id="btn_apply_crop">Terapkan Crop</button>
                        </div>
                        <div id="cropped_preview_container" style="margin-top: 15px; display: none;">
                            <h4>Preview Crop:</h4>
                            <img id="cropped_preview" src="" style="max-width: 400px; border-radius: 8px;" />
                        </div>
                        <input type="hidden" name="dprd_video_thumbnail_base64" id="dprd_video_thumbnail_base64" value="" />
                    </td>
                </tr>
            </table>

            <hr style="margin: 30px 0;">
            <h2>Pengaturan Informasi Terbaru</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul File</th>
                    <td><input type="text" name="dprd_info_title" value="<?php echo esc_attr( get_option('dprd_info_title', '3 Renja Sekretariat DPRD Tahun 2023 Revisi 1') ); ?>" style="width: 100%; max-width: 600px;" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Tanggal Upload</th>
                    <td><input type="text" name="dprd_info_date" value="<?php echo esc_attr( get_option('dprd_info_date', '12 Mei 2023') ); ?>" style="width: 100%; max-width: 300px;" placeholder="Contoh: 12 Mei 2023" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">File (PDF/Link)</th>
                    <td>
                        <input type="url" name="dprd_info_file_url" id="dprd_info_file_url" value="<?php echo esc_url( get_option('dprd_info_file_url', get_template_directory_uri() . '/assets/pdf/DOR.pdf') ); ?>" style="width: 100%; max-width: 500px;" />
                        <button type="button" class="button button-secondary" id="btn_upload_info_file">Pilih / Unggah File</button>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputImage = document.getElementById('video_image_input');
        var imageToCrop = document.getElementById('image_to_crop');
        var cropperContainer = document.getElementById('cropper-container');
        var btnApplyCrop = document.getElementById('btn_apply_crop');
        var hiddenBase64 = document.getElementById('dprd_video_thumbnail_base64');
        var croppedPreview = document.getElementById('cropped_preview');
        var croppedPreviewContainer = document.getElementById('cropped_preview_container');
        var cropper;

        if(inputImage) {
            inputImage.addEventListener('change', function(e) {
                var files = e.target.files;
                if (files && files.length > 0) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        imageToCrop.src = event.target.result;
                        cropperContainer.style.display = 'block';
                        if (cropper) { cropper.destroy(); }
                        cropper = new Cropper(imageToCrop, {
                            aspectRatio: 16 / 9,
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                }
            });
        }

        if(btnApplyCrop) {
            btnApplyCrop.addEventListener('click', function() {
                if (cropper) {
                    var canvas = cropper.getCroppedCanvas({ width: 1280, height: 720 });
                    var base64 = canvas.toDataURL('image/jpeg', 0.8);
                    hiddenBase64.value = base64;
                    croppedPreview.src = base64;
                    croppedPreviewContainer.style.display = 'block';
                    cropperContainer.style.display = 'none';
                    alert("Gambar berhasil dicrop! Jangan lupa klik 'Save Changes' di bawah untuk menyimpan pengaturan.");
                }
            });
        }

        // Media Uploader for Informasi Terbaru File
        var btnUploadInfoFile = document.getElementById('btn_upload_info_file');
        var inputInfoFileUrl = document.getElementById('dprd_info_file_url');
        var mediaUploader;

        if (btnUploadInfoFile) {
            btnUploadInfoFile.addEventListener('click', function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Pilih atau Unggah File',
                    button: { text: 'Gunakan File Ini' },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    inputInfoFileUrl.value = attachment.url;
                });
                mediaUploader.open();
            });
        }
    });
    </script>
    <?php
}


