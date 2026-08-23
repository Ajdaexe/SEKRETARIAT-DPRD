<?php
// ==========================================
// PENGATURAN PPID (SPLIT MENJADI SUB-MENU)
// ==========================================

function dprd_ppid_settings_menu() {
    // Menu Utama (akan otomatis membuka submenu pertama)
    add_menu_page(
        'Pengaturan PPID', 
        'PPID', 
        'manage_options', 
        'dprd-ppid-settings', 
        'dprd_ppid_stat_page_html', 
        'dashicons-chart-bar', 
        35
    );
    
    // Submenu 1: Statistik
    add_submenu_page(
        'dprd-ppid-settings',
        'Statistik PPID',
        'Statistik',
        'manage_options',
        'dprd-ppid-settings',
        'dprd_ppid_stat_page_html'
    );
    
    // Submenu 2: Informasi Utama
    add_submenu_page(
        'dprd-ppid-settings',
        'Informasi Utama PPID',
        'Informasi Utama',
        'manage_options',
        'dprd-ppid-info-settings',
        'dprd_ppid_info_page_html'
    );
    
    // Submenu 3: Kartu Kategori
    add_submenu_page(
        'dprd-ppid-settings',
        'Kartu Kategori PPID',
        'Kartu Kategori',
        'manage_options',
        'dprd-ppid-cards-settings',
        'dprd_ppid_cards_page_html'
    );
}
add_action( 'admin_menu', 'dprd_ppid_settings_menu' );

// 1. Inisialisasi Settings untuk Statistik
function dprd_ppid_stat_settings_init() {
    for ($i = 1; $i <= 4; $i++) {
        register_setting( 'dprd_ppid_stat_group', 'dprd_stat_ppid_label_' . $i );
        register_setting( 'dprd_ppid_stat_group', 'dprd_stat_ppid_num_' . $i );
    }
}
add_action( 'admin_init', 'dprd_ppid_stat_settings_init' );

// 2. Inisialisasi Settings untuk Informasi Utama
function dprd_ppid_info_settings_init() {
    register_setting( 'dprd_ppid_info_group', 'dprd_ppid_info_title' );
    register_setting( 'dprd_ppid_info_group', 'dprd_ppid_info_desc' );
}
add_action( 'admin_init', 'dprd_ppid_info_settings_init' );

// 3. Inisialisasi Settings untuk Kartu Kategori
function dprd_ppid_cards_settings_init() {
    for ($i = 1; $i <= 4; $i++) {
        register_setting( 'dprd_ppid_cards_group', 'dprd_ppid_card_title_' . $i );
        register_setting( 'dprd_ppid_cards_group', 'dprd_ppid_card_desc_' . $i );
    }
}
add_action( 'admin_init', 'dprd_ppid_cards_settings_init' );


// ==========================================
// TAMPILAN HALAMAN (HTML)
// ==========================================

// Halaman Statistik PPID
function dprd_ppid_stat_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Statistik PPID</h1>
        <p>Silakan isi teks label dan angka untuk ditampilkan pada bagian statistik di halaman PPID.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_ppid_stat_group' );
            do_settings_sections( 'dprd_ppid_stat_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Statistik 1</th>
                    <td>
                        <input type="text" name="dprd_stat_ppid_label_1" value="<?php echo esc_attr( get_option('dprd_stat_ppid_label_1', 'Dokumen / Informasi Tersedia untuk publik') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_ppid_num_1" value="<?php echo esc_attr( get_option('dprd_stat_ppid_num_1', 22) ); ?>" placeholder="Angka" style="width: 100px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 2</th>
                    <td>
                        <input type="text" name="dprd_stat_ppid_label_2" value="<?php echo esc_attr( get_option('dprd_stat_ppid_label_2', 'Permintaan Informasi Tahun Ini') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_ppid_num_2" value="<?php echo esc_attr( get_option('dprd_stat_ppid_num_2', 120) ); ?>" placeholder="Angka" style="width: 100px;" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 3</th>
                    <td>
                        <input type="text" name="dprd_stat_ppid_label_3" value="<?php echo esc_attr( get_option('dprd_stat_ppid_label_3', 'Layanan Cepat Sesuai SOP') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_ppid_num_3" value="<?php echo esc_attr( get_option('dprd_stat_ppid_num_3', 100) ); ?>" placeholder="Angka" style="width: 100px;" /> %
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Statistik 4</th>
                    <td>
                        <input type="text" name="dprd_stat_ppid_label_4" value="<?php echo esc_attr( get_option('dprd_stat_ppid_label_4', 'Komitmen Transparan & Akuntabel') ); ?>" placeholder="Teks Label" style="width: 250px; margin-right: 10px;" />
                        <input type="number" name="dprd_stat_ppid_num_4" value="<?php echo esc_attr( get_option('dprd_stat_ppid_num_4', 100) ); ?>" placeholder="Angka" style="width: 100px;" /> %
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Halaman Informasi Utama PPID
function dprd_ppid_info_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Informasi Utama PPID</h1>
        <p>Silakan sesuaikan kotak informasi utama (kotak atas) pada halaman PPID.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_ppid_info_group' );
            do_settings_sections( 'dprd_ppid_info_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Judul Informasi</th>
                    <td>
                        <input type="text" name="dprd_ppid_info_title" value="<?php echo esc_attr( get_option('dprd_ppid_info_title', 'Informasi') ); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Deskripsi Informasi</th>
                    <td>
                        <textarea name="dprd_ppid_info_desc" rows="4" cols="50" class="large-text"><?php echo esc_textarea( get_option('dprd_ppid_info_desc', 'PPID Sekretariat DPRD Kabupaten Purbalingga adalah portal layanan informasi publik untuk mewujudkan transparansi, akuntabilitas, dan keterbukaan informasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.') ); ?></textarea>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Halaman Kartu Kategori PPID
function dprd_ppid_cards_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) return;
    ?>
    <div class="wrap">
        <h1>Pengaturan Kartu Kategori PPID</h1>
        <p>Silakan atur teks dan penjelasan untuk 4 kotak kategori informasi PPID.</p>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'dprd_ppid_cards_group' );
            do_settings_sections( 'dprd_ppid_cards_group' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Kartu 1 (Berkala)</th>
                    <td>
                        <input type="text" name="dprd_ppid_card_title_1" value="<?php echo esc_attr( get_option('dprd_ppid_card_title_1', 'Informasi Berkala') ); ?>" class="regular-text" style="margin-bottom: 5px;" /><br>
                        <textarea name="dprd_ppid_card_desc_1" rows="2" class="large-text"><?php echo esc_textarea( get_option('dprd_ppid_card_desc_1', 'Informasi yang wajib disediakan dan diumumkan secara berkala oleh Sekretariat DPRD.') ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Kartu 2 (Serta Merta)</th>
                    <td>
                        <input type="text" name="dprd_ppid_card_title_2" value="<?php echo esc_attr( get_option('dprd_ppid_card_title_2', 'Informasi Serta Merta') ); ?>" class="regular-text" style="margin-bottom: 5px;" /><br>
                        <textarea name="dprd_ppid_card_desc_2" rows="2" class="large-text"><?php echo esc_textarea( get_option('dprd_ppid_card_desc_2', 'Informasi yang harus disampaikan segera karena berkaitan dengan hajat hidup orang banyak.') ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Kartu 3 (Setiap Saat)</th>
                    <td>
                        <input type="text" name="dprd_ppid_card_title_3" value="<?php echo esc_attr( get_option('dprd_ppid_card_title_3', 'Informasi Setiap Saat') ); ?>" class="regular-text" style="margin-bottom: 5px;" /><br>
                        <textarea name="dprd_ppid_card_desc_3" rows="2" class="large-text"><?php echo esc_textarea( get_option('dprd_ppid_card_desc_3', 'Informasi yang tersedia setiap saat dan dapat diakses oleh publik kapan pun dibutuhkan.') ); ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Kartu 4 (Laporan)</th>
                    <td>
                        <input type="text" name="dprd_ppid_card_title_4" value="<?php echo esc_attr( get_option('dprd_ppid_card_title_4', 'Laporan PPID') ); ?>" class="regular-text" style="margin-bottom: 5px;" /><br>
                        <textarea name="dprd_ppid_card_desc_4" rows="2" class="large-text"><?php echo esc_textarea( get_option('dprd_ppid_card_desc_4', 'Laporan layanan informasi publik dan kinerja PPID Sekretariat DPRD Kabupaten Purbalingga.') ); ?></textarea>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
