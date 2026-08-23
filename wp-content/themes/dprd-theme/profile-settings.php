<?php
// PENGATURAN PROFILE - WP-ADMIN SUBMENUS (TAMBAHAN)

function dprd_render_tentang_options_page() {
    if ( isset( $_POST["dprd_save_tentang_nonce"] ) && wp_verify_nonce( $_POST["dprd_save_tentang_nonce"], "dprd_save_tentang" ) ) {
        update_option( "dprd_tentang_teks", sanitize_textarea_field( $_POST["dprd_tentang_teks"] ) );
        for ($i=1; $i<=4; $i++) {
            if (isset($_POST["dprd_pilar_".$i."_title"])) update_option("dprd_pilar_".$i."_title", sanitize_text_field($_POST["dprd_pilar_".$i."_title"]));
            if (isset($_POST["dprd_pilar_".$i."_desc"])) update_option("dprd_pilar_".$i."_desc", sanitize_text_field($_POST["dprd_pilar_".$i."_desc"]));
        }
        echo "<div class=\"notice notice-success is-dismissible\"><p>Tentang & Nilai Utama disimpan!</p></div>";
    }
    $tentang = get_option( "dprd_tentang_teks", "Sekretariat DPRD merupakan unsur pelayanan administrasi dan pemberian dukungan terhadap tugas dan fungsi DPRD." );
    ?>
    <div class="wrap">
        <h1>Tentang & Nilai Utama</h1>
        <form method="post" action="">
            <?php wp_nonce_field( "dprd_save_tentang", "dprd_save_tentang_nonce" ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Deskripsi Tentang</th>
                    <td><textarea name="dprd_tentang_teks" rows="5" class="large-text"><?php echo esc_textarea($tentang); ?></textarea></td>
                </tr>
                <?php 
                $default_pilars = [
                    1 => ['Unsur Pelayanan', 'Memberikan dukungan administrasi kepada DPRD'],
                    2 => ['Profesional', 'Bekerja secara profesional dan berintegritas'],
                    3 => ['Akuntabel', 'Transparan, akuntabel, dan bertanggung jawab'],
                    4 => ['Kolaboratif', 'Bersinergi untuk mendukung kinerja DPRD']
                ];
                for($i=1; $i<=4; $i++): 
                    $p_title = get_option("dprd_pilar_".$i."_title", "");
                    $p_desc = get_option("dprd_pilar_".$i."_desc", "");
                    if (empty($p_title) && empty($p_desc) && isset($default_pilars[$i])) {
                        $p_title = $default_pilars[$i][0];
                        $p_desc = $default_pilars[$i][1];
                    }
                ?>
                <tr>
                    <th scope="row">Pilar / Nilai <?php echo $i; ?></th>
                    <td>
                        <input type="text" name="dprd_pilar_<?php echo $i; ?>_title" value="<?php echo esc_attr($p_title); ?>" placeholder="Judul Pilar" class="regular-text"><br><br>
                        <input type="text" name="dprd_pilar_<?php echo $i; ?>_desc" value="<?php echo esc_attr($p_desc); ?>" placeholder="Deskripsi Singkat" class="large-text">
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function dprd_render_hukum_options_page() {
    if ( isset( $_POST["dprd_save_hukum_nonce"] ) && wp_verify_nonce( $_POST["dprd_save_hukum_nonce"], "dprd_save_hukum" ) ) {
        update_option( "dprd_dasar_hukum", sanitize_textarea_field( $_POST["dprd_dasar_hukum"] ) );
        echo "<div class=\"notice notice-success is-dismissible\"><p>Dasar Hukum disimpan!</p></div>";
    }
    $hukum = get_option( "dprd_dasar_hukum", "Dasar Peraturan Bupati Purbalingga Nomor 76 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Sekretariat Daerah Kabupaten Purbalingga." );
    ?>
    <div class="wrap">
        <h1>Dasar Hukum</h1>
        <form method="post" action="">
            <?php wp_nonce_field( "dprd_save_hukum", "dprd_save_hukum_nonce" ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Isi Dasar Hukum</th>
                    <td><textarea name="dprd_dasar_hukum" rows="4" class="large-text"><?php echo esc_textarea($hukum); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function dprd_render_visimisi_options_page() {
    if ( isset( $_POST["dprd_save_visimisi_nonce"] ) && wp_verify_nonce( $_POST["dprd_save_visimisi_nonce"], "dprd_save_visimisi" ) ) {
        update_option( "dprd_visi_teks", sanitize_textarea_field( $_POST["dprd_visi_teks"] ) );
        for ($i=1; $i<=5; $i++) {
            update_option( "dprd_misi_".$i."_title", sanitize_text_field( $_POST["dprd_misi_".$i."_title"] ) );
            update_option( "dprd_misi_".$i."_desc", sanitize_textarea_field( $_POST["dprd_misi_".$i."_desc"] ) );
        }
        echo "<div class=\"notice notice-success is-dismissible\"><p>Visi dan Misi disimpan!</p></div>";
    }
    $visi = get_option( "dprd_visi_teks", "Terwujudnya Optimalisasi Fungsi Substansial dan Administrasi Sekretariat DPRD Kabupaten Purbalingga dalam Mendukung Sinergitas Legislatif dan Eksekutif sebagai Unsur Penyelenggara Pemerintahan Daerah" );
    ?>
    <div class="wrap">
        <h1>Visi dan Misi</h1>
        <form method="post" action="">
            <?php wp_nonce_field( "dprd_save_visimisi", "dprd_save_visimisi_nonce" ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Visi</th>
                    <td><textarea name="dprd_visi_teks" rows="4" class="large-text"><?php echo esc_textarea($visi); ?></textarea></td>
                </tr>
                <?php 
                $default_misi = [
                    1 => ['title' => 'Pilar Demokrasi:', 'desc' => 'Mewujudkan DPRD sebagai salah satu pilar kehidupan demokratis yang berlandaskan Pancasila dan Undang-Undang Dasar 1945.'],
                    2 => ['title' => 'Dukungan Kinerja:', 'desc' => 'Memberikan pelayanan prima dan dukungan administratif serta keahlian yang optimal bagi pelaksanaan tugas kedewanan.'],
                    3 => ['title' => 'Sinergi Pemerintahan:', 'desc' => 'Memperkuat kerja sama yang harmonis antara jajaran legislatif dan eksekutif demi kelancaran pembangunan daerah.']
                ];
                for($i=1; $i<=5; $i++): 
                    $m_title = get_option("dprd_misi_".$i."_title", "");
                    $m_desc = get_option("dprd_misi_".$i."_desc", "");
                    if (empty($m_title) && empty($m_desc) && isset($default_misi[$i])) {
                        $m_title = $default_misi[$i]['title'];
                        $m_desc = $default_misi[$i]['desc'];
                    }
                ?>
                <tr>
                    <th scope="row">Misi <?php echo $i; ?></th>
                    <td>
                        <input type="text" name="dprd_misi_<?php echo $i; ?>_title" value="<?php echo esc_attr($m_title); ?>" placeholder="Judul Misi (opsional)" class="regular-text"><br><br>
                        <textarea name="dprd_misi_<?php echo $i; ?>_desc" rows="2" class="large-text" placeholder="Deskripsi Misi"><?php echo esc_textarea($m_desc); ?></textarea>
                    </td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function dprd_render_tupoksi_options_page() {
    if ( isset( $_POST["dprd_save_tupoksi_nonce"] ) && wp_verify_nonce( $_POST["dprd_save_tupoksi_nonce"], "dprd_save_tupoksi" ) ) {
        update_option( "dprd_tugas_pokok", sanitize_textarea_field( $_POST["dprd_tugas_pokok"] ) );
        for ($i=1; $i<=8; $i++) {
            update_option( "dprd_fungsi_".$i, sanitize_text_field( $_POST["dprd_fungsi_".$i] ) );
        }
        echo "<div class=\"notice notice-success is-dismissible\"><p>Tugas Pokok & Fungsi disimpan!</p></div>";
    }
    $tugas = get_option( "dprd_tugas_pokok", "Sekretariat DPRD mempunyai tugas pokok melaksanakan pelayanan terhadap DPRD dan tugas administrasi kesekretariatan DPRD serta administrasi keuangan DPRD dalam mendukung kelancaran pelaksanaan tugas dan fungsi DPRD." );
    ?>
    <div class="wrap">
        <h1>Tugas Pokok & Fungsi</h1>
        <form method="post" action="">
            <?php wp_nonce_field( "dprd_save_tupoksi", "dprd_save_tupoksi_nonce" ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Tugas Pokok</th>
                    <td><textarea name="dprd_tugas_pokok" rows="4" class="large-text"><?php echo esc_textarea($tugas); ?></textarea></td>
                </tr>
                <?php 
                $default_fungsi = [
                    1 => 'Unsur pelayanan terhadap DPRD.',
                    2 => 'Tugas administrasi kesekretariatan DPRD.',
                    3 => 'Administrasi keuangan DPRD.',
                    4 => 'Mendukung pelaksanaan tugas dan fungsi DPRD.',
                    5 => 'Menyediakan serta mengoordinasikan tenaga ahli yang diperlukan oleh DPRD.',
                    6 => 'Pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.'
                ];
                for($i=1; $i<=8; $i++): 
                    $fungsi = get_option("dprd_fungsi_".$i, "");
                    if (empty($fungsi) && isset($default_fungsi[$i])) {
                        $fungsi = $default_fungsi[$i];
                    }
                ?>
                <tr>
                    <th scope="row">Fungsi <?php echo $i; ?></th>
                    <td><input type="text" name="dprd_fungsi_<?php echo $i; ?>" value="<?php echo esc_attr($fungsi); ?>" class="large-text" placeholder="Kosongkan jika tidak dipakai"></td>
                </tr>
                <?php endfor; ?>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
