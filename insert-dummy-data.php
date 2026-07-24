<?php
/**
 * Script untuk memasukkan data dummy dokumen (PPID dan Sakip).
 * Jalankan script ini HANYA SEKALI setelah WordPress selesai di-install
 * dengan cara mengaksesnya melalui browser (misal: http://localhost/sekretariat-dprd/insert-dummy-data.php).
 * Setelah berhasil, HARAP HAPUS file ini demi keamanan.
 */

require_once( dirname( __FILE__ ) . '/wp-load.php' );

if ( ! function_exists( 'wp_insert_post' ) ) {
    die('WordPress tidak dimuat dengan benar.');
}

$dummy_docs = array(
    array(
        'title' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) 2025',
        'kategori' => 'Laporan PPID',
        'tahun' => 2025,
        'grup' => 'sakip',
        'unggulan' => 1
    ),
    array(
        'title' => 'Rencana Kerja (Renja) Sekretariat DPRD 2026',
        'kategori' => 'Renja',
        'tahun' => 2026,
        'grup' => 'sakip',
        'unggulan' => 1
    ),
    array(
        'title' => 'Informasi Berkala Semester 1 Tahun 2026',
        'kategori' => 'Informasi Berkala',
        'tahun' => 2026,
        'grup' => 'ppid',
        'unggulan' => 0
    ),
    array(
        'title' => 'Informasi Serta Merta - Rapat Paripurna Istimewa',
        'kategori' => 'Serta Merta',
        'tahun' => 2026,
        'grup' => 'ppid',
        'unggulan' => 0
    ),
);

$count = 0;

foreach ($dummy_docs as $doc) {
    // Check if exists
    $existing = get_page_by_title($doc['title'], OBJECT, 'dokumen');
    if ($existing) {
        continue;
    }

    $post_id = wp_insert_post(array(
        'post_title'    => $doc['title'],
        'post_status'   => 'publish',
        'post_type'     => 'dokumen'
    ));

    if ($post_id && !is_wp_error($post_id)) {
        // Tambahkan taxonomy (jika term belum ada, buat baru)
        if (!term_exists($doc['kategori'], 'kategori_dokumen')) {
            wp_insert_term($doc['kategori'], 'kategori_dokumen');
        }
        wp_set_object_terms($post_id, $doc['kategori'], 'kategori_dokumen');

        // Tambahkan ACF fields
        if (function_exists('update_field')) {
            update_field('tahun_dokumen', $doc['tahun'], $post_id);
            update_field('grup_dokumen', $doc['grup'], $post_id);
            update_field('dokumen_unggulan', $doc['unggulan'], $post_id);
        } else {
            // Fallback to update_post_meta if ACF not active yet
            update_post_meta($post_id, 'tahun_dokumen', $doc['tahun']);
            update_post_meta($post_id, 'grup_dokumen', $doc['grup']);
            update_post_meta($post_id, 'dokumen_unggulan', $doc['unggulan']);
        }

        $count++;
    }
}

echo "Berhasil memasukkan $count data dummy dokumen. Silakan hapus file ini demi keamanan.";
?>
