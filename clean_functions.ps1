$file = "wp-content/themes/dprd-theme/functions.php"
$content = Get-Content $file -Raw

# 1. Remove the CTA HTML block from anywhere it exists
$pattern_html = '(?s)<hr style="margin: 30px 0;">\s*<h2>Pengaturan Banner Hubungi Kami \(CTA\)<\/h2>\s*<table class="form-table">.*?<\/table>'
$content = [regex]::Replace($content, $pattern_html, "")

# 2. Remove the CTA JavaScript block from anywhere it exists
$pattern_js = '(?s)// --- CROPPER FOR CTA BANNER ---.*?alert\("Background CTA berhasil dicrop! Jangan lupa klik ''Save Changes'' untuk menyimpan."\);\s*\}\s*\}\);\s*\}'
$content = [regex]::Replace($content, $pattern_js, "")

# 3. Add the new menu and settings to the end of the file
$new_menu = @'

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
        27
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
            <?php $default_text = 'Bersama Mewujudkan DPRD yang Berkinerja Tinggi dan Melayani Masyarakat'; ?>
            
            <h3>1. Halaman Beranda</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_beranda" value="<?php echo esc_attr( get_option('dprd_cta_text_beranda', $default_text) ); ?>" class="large-text" /></td>
                </tr>
            </table>

            <h3>2. Halaman Profil</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_profil" value="<?php echo esc_attr( get_option('dprd_cta_text_profil', $default_text) ); ?>" class="large-text" /></td>
                </tr>
            </table>

            <h3>3. Halaman Kontak</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_kontak" value="<?php echo esc_attr( get_option('dprd_cta_text_kontak', $default_text) ); ?>" class="large-text" /></td>
                </tr>
            </table>

            <h3>4. Halaman PPID</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_ppid" value="<?php echo esc_attr( get_option('dprd_cta_text_ppid', $default_text) ); ?>" class="large-text" /></td>
                </tr>
            </table>

            <h3>5. Halaman Sakip</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_sakip" value="<?php echo esc_attr( get_option('dprd_cta_text_sakip', $default_text) ); ?>" class="large-text" /></td>
                </tr>
            </table>

            <h3>6. Halaman D'Lantunan</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Teks CTA</th>
                    <td><input type="text" name="dprd_cta_text_dlantunan" value="<?php echo esc_attr( get_option('dprd_cta_text_dlantunan', $default_text) ); ?>" class="large-text" /></td>
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
'@

$content += $new_menu

# Let's save the file
$content | Set-Content $file -Encoding UTF8
