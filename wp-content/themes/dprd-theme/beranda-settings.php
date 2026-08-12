<?php
// ==========================================
// PENGATURAN BERANDA (SUB-MENUS)
// ==========================================

function dprd_beranda_settings_menu_new() {
    // Parent Menu
    add_menu_page(
        'Pengaturan Beranda', 
        'Pengaturan Beranda', 
        'manage_options', 
        'dprd-beranda-settings', 
        'dprd_beranda_statistik_html',
        'dashicons-admin-home',
        '32'
    );

    // Sub-menus
    add_submenu_page(
        'dprd-beranda-settings',
        'Statistik',
        'Statistik',
        'manage_options',
        'dprd-beranda-settings', // Same slug as parent makes this the default page
        'dprd_beranda_statistik_html'
    );
    add_submenu_page(
        'dprd-beranda-settings',
        'Video Beranda',
        'Video Beranda',
        'manage_options',
        'dprd-beranda-video',
        'dprd_beranda_video_html'
    );
    add_submenu_page(
        'dprd-beranda-settings',
        'Informasi Terbaru',
        'Info Terbaru',
        'manage_options',
        'dprd-beranda-info',
        'dprd_beranda_info_html'
    );
    add_submenu_page(
        'dprd-beranda-settings',
        'Hasil Survey IKM',
        'Survey IKM',
        'manage_options',
        'dprd-beranda-ikm',
        'dprd_beranda_ikm_html'
    );
    add_submenu_page(
        'dprd-beranda-settings',
        'Reels / Video Singkat',
        'Reels',
        'manage_options',
        'dprd-beranda-reels',
        'dprd_beranda_reels_html'
    );
}
add_action( 'admin_menu', 'dprd_beranda_settings_menu_new' );

function dprd_beranda_settings_init_new() {
    // Statistik Fields
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_pegawai' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_agenda' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_dokumen' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_transparan' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_label_pegawai' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_label_agenda' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_label_dokumen' );
    register_setting( 'dprd_beranda_statistik_group', 'dprd_stat_label_transparan' );

    // Video Fields
    register_setting( 'dprd_beranda_video_group', 'dprd_video_title' );
    register_setting( 'dprd_beranda_video_group', 'dprd_video_url' );
    register_setting( 'dprd_beranda_video_group', 'dprd_video_thumbnail_base64', array( 'sanitize_callback' => 'dprd_handle_video_thumb_base64' ) );

    // Info Fields
    register_setting( 'dprd_beranda_info_group', 'dprd_info_title' );
    register_setting( 'dprd_beranda_info_group', 'dprd_info_date' );
    register_setting( 'dprd_beranda_info_group', 'dprd_info_file_url' );

    // IKM Fields
    register_setting( 'dprd_beranda_ikm_group', 'dprd_ikm_slides_data' );

    // Reels Fields
    register_setting( 'dprd_beranda_reels_group', 'dprd_reels_data' );
}
add_action( 'admin_init', 'dprd_beranda_settings_init_new' );

/* ==========================================================================
 * 1. STATISTIK HTML
 * ========================================================================== */
function dprd_beranda_statistik_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Statistik Beranda</h1>
        <p>Silakan isi teks label dan angka untuk ditampilkan pada bagian statistik di halaman Beranda.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_beranda_statistik_group' );
            do_settings_sections( 'dprd_beranda_statistik_group' );
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
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/* ==========================================================================
 * 2. VIDEO HTML
 * ========================================================================== */
function dprd_beranda_video_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Video Beranda</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_beranda_video_group' );
            do_settings_sections( 'dprd_beranda_video_group' );
            ?>
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
    });
    </script>
    <?php
}

/* ==========================================================================
 * 3. INFORMASI TERBARU HTML
 * ========================================================================== */
function dprd_beranda_info_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Informasi Terbaru</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_beranda_info_group' );
            do_settings_sections( 'dprd_beranda_info_group' );
            ?>
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

/* ==========================================================================
 * 4. HASIL SURVEY IKM HTML
 * ========================================================================== */
function dprd_beranda_ikm_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Hasil Survey IKM (Slide Dinamis)</h1>
        <p>Anda dapat menambah, menghapus, atau mengubah urutan slide IKM di bawah ini. Anda juga bisa mengganti gambar QR Code per-slide.</p>
        
        <form action="options.php" method="post" id="ikm_form">
            <?php
            settings_fields( 'dprd_beranda_ikm_group' );
            do_settings_sections( 'dprd_beranda_ikm_group' );
            
            $default_slides = json_encode([
                ['title' => 'SEMESTER I TAHUN 2026', 'score' => '93.275', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/qr-code.png'],
                ['title' => 'SEMESTER II TAHUN 2025', 'score' => '92.150', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/qr-code.png'],
                ['title' => 'SEMESTER I TAHUN 2025', 'score' => '91.500', 'predicate' => 'Sangat Baik', 'grade' => 'A', 'qr' => get_template_directory_uri() . '/assets/images/qr-code.png']
            ]);
            $saved_slides = get_option('dprd_ikm_slides_data', '');
            if (empty($saved_slides) || $saved_slides === '[]' || $saved_slides === 'false') {
                $saved_slides = $default_slides;
            }
            ?>
            <input type="hidden" name="dprd_ikm_slides_data" id="dprd_ikm_slides_data" value="<?php echo esc_attr($saved_slides); ?>">
            
            <div id="ikm_repeater_container"></div>
            <button type="button" class="button button-primary" id="btn_add_ikm_slide" style="margin-top: 10px;">+ Tambah Slide Baru</button>
            <br><br>
            <?php submit_button(); ?>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var ikmSlidesData = [];
        try {
            var rawVal = document.getElementById('dprd_ikm_slides_data').value;
            ikmSlidesData = JSON.parse(rawVal || '[]');
        } catch(e) { console.error('Failed parsing IKM JSON data'); }

        var ikmContainer = document.getElementById('ikm_repeater_container');

        function renderIkmRow(slide, index) {
            var html = `
            <div class="ikm-slide-row" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; background: #fafafa; position: relative;">
                <h4 style="margin-top:0;">Slide ${index + 1}</h4>
                <button type="button" class="button button-link-delete btn_remove_ikm_slide" style="position:absolute; top:15px; right:15px; color:#a00;">Hapus Slide</button>
                <table class="form-table">
                    <tr>
                        <th scope="row">Semester & Tahun</th>
                        <td><input type="text" class="ikm_input_title" value="${slide.title || ''}" style="width:100%; max-width:300px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Skor (Nilai)</th>
                        <td><input type="text" class="ikm_input_score" value="${slide.score || ''}" style="width:150px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Huruf Mutu (Grade)</th>
                        <td><input type="text" class="ikm_input_grade" value="${slide.grade || ''}" style="width:50px;" maxlength="2"></td>
                    </tr>
                    <tr>
                        <th scope="row">Teks Predikat (Badge)</th>
                        <td><input type="text" class="ikm_input_predicate" value="${slide.predicate || ''}" style="width:100%; max-width:150px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar QR Code</th>
                        <td>
                            <input type="url" class="ikm_input_qr" value="${slide.qr || ''}" style="width:100%; max-width:300px;">
                            <button type="button" class="button btn_upload_ikm_qr">Pilih Gambar</button>
                        </td>
                    </tr>
                </table>
            </div>
            `;
            ikmContainer.insertAdjacentHTML('beforeend', html);
        }

        function renderAllIkmRows() {
            ikmContainer.innerHTML = '';
            ikmSlidesData.forEach(function(slide, idx) {
                renderIkmRow(slide, idx);
            });
        }
        renderAllIkmRows();

        var btnAddIkm = document.getElementById('btn_add_ikm_slide');
        if (btnAddIkm) {
            btnAddIkm.addEventListener('click', function() {
                ikmSlidesData.push({title:'', score:'', grade:'', predicate:'', qr:''});
                renderAllIkmRows();
            });
        }

        ikmContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn_remove_ikm_slide')) {
                if(confirm('Hapus slide ini?')) {
                    var row = e.target.closest('.ikm-slide-row');
                    var index = Array.from(ikmContainer.children).indexOf(row);
                    if (index > -1) {
                        ikmSlidesData.splice(index, 1);
                        renderAllIkmRows();
                    }
                }
            }
            
            if (e.target.classList.contains('btn_upload_ikm_qr')) {
                e.preventDefault();
                var inputQr = e.target.previousElementSibling;
                var uploader = wp.media({
                    title: 'Pilih Gambar QR Code',
                    button: { text: 'Gunakan Gambar Ini' },
                    multiple: false
                });
                uploader.on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    inputQr.value = attachment.url;
                });
                uploader.open();
            }
        });

        // Update JSON before saving
        var form = document.getElementById('ikm_form');
        if (form) {
            form.addEventListener('submit', function() {
                var rows = ikmContainer.querySelectorAll('.ikm-slide-row');
                var newData = [];
                rows.forEach(function(row) {
                    newData.push({
                        title: row.querySelector('.ikm_input_title').value,
                        score: row.querySelector('.ikm_input_score').value,
                        grade: row.querySelector('.ikm_input_grade').value,
                        predicate: row.querySelector('.ikm_input_predicate').value,
                        qr: row.querySelector('.ikm_input_qr').value
                    });
                });
                document.getElementById('dprd_ikm_slides_data').value = JSON.stringify(newData);
            });
        }
    });
    </script>
    <?php
}

/* ==========================================================================
 * 5. REELS / VIDEO SINGKAT HTML
 * ========================================================================== */
function dprd_beranda_reels_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Reels / Video Singkat</h1>
        <p>Tambahkan video pendek / reels. Kosongkan jika belum ada data.</p>
        
        <form action="options.php" method="post" id="reels_form">
            <?php
            settings_fields( 'dprd_beranda_reels_group' );
            do_settings_sections( 'dprd_beranda_reels_group' );
            
            $default_reels = json_encode([
                ['title' => 'Kunjungan Kerja', 'thumb' => get_template_directory_uri() . '/assets/images/placeholder-reel.png', 'url' => '#'],
                ['title' => 'Rapat Paripurna', 'thumb' => get_template_directory_uri() . '/assets/images/placeholder-reel.png', 'url' => '#']
            ]);
            $saved_reels = get_option('dprd_reels_data', '');
            if (empty($saved_reels) || $saved_reels === '[]' || $saved_reels === 'false') {
                $saved_reels = $default_reels;
            }
            ?>
            <input type="hidden" name="dprd_reels_data" id="dprd_reels_data" value="<?php echo esc_attr($saved_reels); ?>">
            
            <div id="reels_repeater_container"></div>
            <button type="button" class="button button-primary" id="btn_add_reel_slide" style="margin-top: 10px;">+ Tambah Reel Baru</button>
            <br><br>
            <?php submit_button(); ?>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var reelsData = [];
        try {
            var rawReelsVal = document.getElementById('dprd_reels_data').value;
            reelsData = JSON.parse(rawReelsVal || '[]');
        } catch(e) { console.error('Failed parsing Reels JSON data'); }

        var reelsContainer = document.getElementById('reels_repeater_container');
        if(!reelsContainer) return;

        function renderReelRow(slide, index) {
            var html = `
            <div class="reel-slide-row" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; background: #fafafa; position: relative;">
                <h4 style="margin-top:0;">Reel ${index + 1}</h4>
                <button type="button" class="button button-link-delete btn_remove_reel_slide" style="position:absolute; top:15px; right:15px; color:#a00;">Hapus</button>
                <table class="form-table">
                    <tr>
                        <th scope="row">Judul</th>
                        <td><input type="text" class="reel_input_title" value="${slide.title || ''}" style="width:100%; max-width:300px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">Gambar Thumbnail</th>
                        <td>
                            <input type="url" class="reel_input_thumb" value="${slide.thumb || ''}" style="width:100%; max-width:300px;">
                            <button type="button" class="button btn_upload_reel_thumb">Pilih Thumbnail</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Link (IG/Video)</th>
                        <td><input type="url" class="reel_input_url" value="${slide.url || ''}" style="width:100%; max-width:400px;"></td>
                    </tr>
                </table>
            </div>
            `;
            reelsContainer.insertAdjacentHTML('beforeend', html);
        }

        function renderAllReelRows() {
            reelsContainer.innerHTML = '';
            reelsData.forEach(function(slide, idx) {
                renderReelRow(slide, idx);
            });
        }
        renderAllReelRows();

        var btnAddReel = document.getElementById('btn_add_reel_slide');
        if (btnAddReel) {
            btnAddReel.addEventListener('click', function() {
                reelsData.push({title:'', thumb:'', url:''});
                renderAllReelRows();
            });
        }

        reelsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn_remove_reel_slide')) {
                if(confirm('Hapus reel ini?')) {
                    var row = e.target.closest('.reel-slide-row');
                    var index = Array.from(reelsContainer.children).indexOf(row);
                    if (index > -1) {
                        reelsData.splice(index, 1);
                        renderAllReelRows();
                    }
                }
            }
            
            if (e.target.classList.contains('btn_upload_reel_thumb')) {
                e.preventDefault();
                var inputThumb = e.target.previousElementSibling;
                var uploader = wp.media({
                    title: 'Pilih Gambar Thumbnail',
                    button: { text: 'Gunakan Gambar Ini' },
                    multiple: false
                });
                uploader.on('select', function() {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    inputThumb.value = attachment.url;
                });
                uploader.open();
            }
        });

        // Update JSON before saving
        var form = document.getElementById('reels_form');
        if (form) {
            form.addEventListener('submit', function() {
                var reelRows = reelsContainer.querySelectorAll('.reel-slide-row');
                var newReelsData = [];
                reelRows.forEach(function(row) {
                    newReelsData.push({
                        title: row.querySelector('.reel_input_title').value,
                        thumb: row.querySelector('.reel_input_thumb').value,
                        url: row.querySelector('.reel_input_url').value
                    });
                });
                document.getElementById('dprd_reels_data').value = JSON.stringify(newReelsData);
            });
        }
    });
    </script>
    <?php
}
