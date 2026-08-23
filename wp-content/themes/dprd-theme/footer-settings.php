<?php
// PENGATURAN FOOTER (WP-ADMIN)

function dprd_footer_settings_menu() {
    add_menu_page(
        'Pengaturan Footer', 
        'Footer', 
        'manage_options', 
        'dprd-footer-settings', 
        'dprd_footer_settings_page_html',
        'dashicons-admin-links',
        '33'
    );
}
add_action( 'admin_menu', 'dprd_footer_settings_menu' );

function dprd_footer_settings_init() {
    register_setting( 'dprd_footer_group', 'dprd_footer_desc' );
    
    // Socials
    register_setting( 'dprd_footer_group', 'dprd_footer_fb' );
    register_setting( 'dprd_footer_group', 'dprd_footer_ig' );
    register_setting( 'dprd_footer_group', 'dprd_footer_yt' );
    
    // Contacts
    register_setting( 'dprd_footer_group', 'dprd_footer_alamat' );
    register_setting( 'dprd_footer_group', 'dprd_footer_telp' );
    register_setting( 'dprd_footer_group', 'dprd_footer_website' );
    register_setting( 'dprd_footer_group', 'dprd_footer_email' );
    
    // Working Hours
    register_setting( 'dprd_footer_group', 'dprd_footer_jam_seninkamis' );
    register_setting( 'dprd_footer_group', 'dprd_footer_jam_jumat' );
}
add_action( 'admin_init', 'dprd_footer_settings_init' );

function dprd_footer_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>Pengaturan Footer</h1>
        <p>Atur teks, alamat, kontak, dan link sosial media yang muncul di bagian bawah website (footer).</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_footer_group' );
            do_settings_sections( 'dprd_footer_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Deskripsi Footer</th>
                    <td><textarea name="dprd_footer_desc" rows="3" class="large-text"><?php echo esc_textarea( get_option('dprd_footer_desc', 'Mendukung kelancaran tugas dan wewenang DPRD melalui pelayanan yang profesional, transparan, dan akuntabel.') ); ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link Facebook</th>
                    <td><input type="url" name="dprd_footer_fb" value="<?php echo esc_attr( get_option('dprd_footer_fb', '#') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link Instagram</th>
                    <td><input type="url" name="dprd_footer_ig" value="<?php echo esc_attr( get_option('dprd_footer_ig', 'https://www.instagram.com/sekretariatdprd_pbg?igsh=MXQ2ZGQwenA2a2NxYw==') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Link YouTube</th>
                    <td><input type="url" name="dprd_footer_yt" value="<?php echo esc_attr( get_option('dprd_footer_yt', 'https://youtube.com/@dprdpurbalingga?si=SaazLFY6H9PvVLw1') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Alamat Kantor</th>
                    <td><input type="text" name="dprd_footer_alamat" value="<?php echo esc_attr( get_option('dprd_footer_alamat', 'Jl. Onje No.2A Purbalingga, Jawa Tengah') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">No. Telepon</th>
                    <td><input type="text" name="dprd_footer_telp" value="<?php echo esc_attr( get_option('dprd_footer_telp', '02818951058') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Website URL</th>
                    <td><input type="url" name="dprd_footer_website" value="<?php echo esc_attr( get_option('dprd_footer_website', 'https://dprd.purbalinggakab.go.id') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Email</th>
                    <td><input type="email" name="dprd_footer_email" value="<?php echo esc_attr( get_option('dprd_footer_email', 'sekretariat@dprd.purbalingga.go.id') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Jam Layanan (Senin - Kamis)</th>
                    <td><input type="text" name="dprd_footer_jam_seninkamis" value="<?php echo esc_attr( get_option('dprd_footer_jam_seninkamis', '07:30 - 16:00 WIB') ); ?>" class="regular-text" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Jam Layanan (Jumat)</th>
                    <td><input type="text" name="dprd_footer_jam_jumat" value="<?php echo esc_attr( get_option('dprd_footer_jam_jumat', '07:30 - 14:30 WIB') ); ?>" class="regular-text" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
