<?php
// PENGATURAN KONTAK (WP-ADMIN)

function dprd_kontak_settings_menu() {
    add_menu_page(
        'Pengaturan Kontak', 
        'Pengaturan Kontak', 
        'manage_options', 
        'dprd-kontak-settings', 
        'dprd_kontak_settings_page_html',
        'dashicons-location',
        '34'
    );
}
add_action( 'admin_menu', 'dprd_kontak_settings_menu' );

function dprd_kontak_settings_init() {
    // Card Informasi Kontak
    register_setting( 'dprd_kontak_group', 'dprd_kontak_nama_lokasi' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_alamat' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_telp' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_email' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_website' );
    
    register_setting( 'dprd_kontak_group', 'dprd_kontak_jam_hari' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_jam_waktu' );
    register_setting( 'dprd_kontak_group', 'dprd_kontak_jam_note' );
    
    // Lokasi Kantor
    register_setting( 'dprd_kontak_group', 'dprd_kontak_maps_url' );
}
add_action( 'admin_init', 'dprd_kontak_settings_init' );

function dprd_kontak_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Pengaturan Halaman Kontak</h1>
        <p>Atur informasi kontak dan lokasi kantor (Google Maps) yang akan ditampilkan di halaman Kontak.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_kontak_group' );
            do_settings_sections( 'dprd_kontak_group' );
            ?>
            <h2 style="border-bottom: 2px solid #ccc; padding-bottom: 5px;">Informasi Kontak</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Nama Lokasi/Instansi</th>
                    <td><input type="text" name="dprd_kontak_nama_lokasi" value="<?php echo esc_attr( get_option('dprd_kontak_nama_lokasi', 'Sekretariat DPRD Kabupaten Purbalingga') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Alamat Lengkap</th>
                    <td><textarea name="dprd_kontak_alamat" rows="3" class="large-text"><?php echo esc_textarea( get_option('dprd_kontak_alamat', 'Jl. Onje No.2a, Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311') ); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">No. Telepon</th>
                    <td><input type="text" name="dprd_kontak_telp" value="<?php echo esc_attr( get_option('dprd_kontak_telp', '(0281) 891058') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Email</th>
                    <td><input type="email" name="dprd_kontak_email" value="<?php echo esc_attr( get_option('dprd_kontak_email', 'sekretariat@dprd.purbalingga.go.id') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Website URL (Teks)</th>
                    <td><input type="text" name="dprd_kontak_website" value="<?php echo esc_attr( get_option('dprd_kontak_website', 'www.dprd.purbalingga.go.id') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Hari Layanan</th>
                    <td><input type="text" name="dprd_kontak_jam_hari" value="<?php echo esc_attr( get_option('dprd_kontak_jam_hari', "Senin - Jum'at") ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Waktu Layanan</th>
                    <td><input type="text" name="dprd_kontak_jam_waktu" value="<?php echo esc_attr( get_option('dprd_kontak_jam_waktu', '08.00 - 16.00 WIB') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Catatan Jam Layanan</th>
                    <td><input type="text" name="dprd_kontak_jam_note" value="<?php echo esc_attr( get_option('dprd_kontak_jam_note', '*Kecuali hari libur nasional') ); ?>" class="regular-text" /></td>
                </tr>
            </table>

            <h2 style="border-bottom: 2px solid #ccc; padding-bottom: 5px; margin-top: 30px;">Lokasi Kantor (Google Maps)</h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Link Embed Google Maps</th>
                    <td>
                        <input type="url" name="dprd_kontak_maps_url" value="<?php echo esc_attr( get_option('dprd_kontak_maps_url', 'https://www.google.com/maps?q=Kantor+DPRD+Kabupaten+Purbalingga&z=17&output=embed') ); ?>" class="large-text" />
                        <p class="description">Masukkan link URL iframe map (hanya link src-nya saja, contoh: https://www.google.com/maps?q=...&output=embed)</p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
