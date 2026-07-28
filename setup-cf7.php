<?php
define('WP_USE_THEMES', false);
require_once( dirname( __FILE__ ) . '/wp-load.php' );

function create_cf7_form($title, $form_html, $mail_body) {
    // Check if form already exists
    $existing = get_page_by_title($title, OBJECT, 'wpcf7_contact_form');
    if ($existing) {
        echo "Form sudah ada: $title (Shortcode: [contact-form-7 id=\"{$existing->ID}\" title=\"$title\"])\n";
        return $existing->ID;
    }

    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_type' => 'wpcf7_contact_form',
        'post_status' => 'publish'
    ));

    if ($post_id) {
        update_post_meta($post_id, '_form', $form_html);
        update_post_meta($post_id, '_mail', array(
            'subject' => 'Pesan Baru dari Website DPRD - ' . $title,
            'sender' => '[your-name] <wordpress@' . $_SERVER['SERVER_NAME'] . '>',
            'body' => $mail_body,
            'recipient' => 'sekretariat@dprd.purbalingga.go.id', // Default dari PRD
            'additional_headers' => 'Reply-To: [your-email]',
            'attachments' => '[file-upload]',
            'use_html' => false,
            'exclude_blank' => false
        ));
        update_post_meta($post_id, '_messages', array(
            'mail_sent_ok' => 'Terima kasih atas pesan Anda. Kami akan segera menghubungi Anda.',
            'mail_sent_ng' => 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi.'
        ));
        echo "Form berhasil dibuat: $title (Shortcode: [contact-form-7 id=\"$post_id\" title=\"$title\"])\n";
        return $post_id;
    }
    return false;
}

$form_kontak = '
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
    [text* your-name class:w-full class:px-3 class:py-2 class:border class:border-gray-300 class:rounded-md class:focus:outline-none class:focus:ring-2 class:focus:ring-maroon placeholder "Masukkan nama Anda"]
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
    [email* your-email class:w-full class:px-3 class:py-2 class:border class:border-gray-300 class:rounded-md class:focus:outline-none class:focus:ring-2 class:focus:ring-maroon placeholder "email@domain.com"]
</div>
<div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2">Pesan</label>
    [textarea* your-message class:w-full class:px-3 class:py-2 class:border class:border-gray-300 class:rounded-md class:focus:outline-none class:focus:ring-2 class:focus:ring-maroon placeholder "Tuliskan pesan Anda di sini..."]
</div>
<div>
    [submit class:bg-maroon class:text-white class:font-bold class:py-2 class:px-6 class:rounded class:hover:bg-maroon-dark class:transition class:cursor-pointer "Kirim Pesan"]
</div>
';
$mail_kontak = "Nama: [your-name]\nEmail: [your-email]\n\nPesan:\n[your-message]";

create_cf7_form('Form Kontak Kami', $form_kontak, $mail_kontak);

$form_magang = '
<div class="mb-4">
    <label class="block text-sm font-semibold mb-1">Nama Lengkap / Kelompok</label>
    [text* your-name class:w-full class:px-3 class:py-2 class:border class:rounded-md]
</div>
<div class="mb-4">
    <label class="block text-sm font-semibold mb-1">Email</label>
    [email* your-email class:w-full class:px-3 class:py-2 class:border class:rounded-md]
</div>
<div class="mb-4">
    <label class="block text-sm font-semibold mb-1">Asal Instansi / Universitas</label>
    [text* instansi class:w-full class:px-3 class:py-2 class:border class:rounded-md]
</div>
<div class="mb-6">
    <label class="block text-sm font-semibold mb-1">Upload Surat Pengantar (PDF/Doc, Max 2MB)</label>
    [file* file-upload limit:2mb filetypes:pdf|doc|docx class:w-full]
</div>
<div>
    [submit class:w-full class:bg-maroon class:text-white class:font-bold class:py-3 class:rounded-md class:hover:bg-maroon-dark "Kirim Pengajuan Magang"]
</div>
';
$mail_magang = "Pengajuan Magang Baru\n\nNama: [your-name]\nEmail: [your-email]\nInstansi: [instansi]";

create_cf7_form('Form Layanan Magang', $form_magang, $mail_magang);

// We will use the same form style for Penelitian and Kunjungan, just varying the titles in the script.
$form_penelitian = str_replace('Magang', 'Penelitian', $form_magang);
$mail_penelitian = str_replace('Magang', 'Penelitian', $mail_magang);
create_cf7_form('Form Izin Penelitian', $form_penelitian, $mail_penelitian);

$form_kunjungan = str_replace('Magang', 'Kunjungan', $form_magang);
$mail_kunjungan = str_replace('Magang', 'Kunjungan', $mail_magang);
create_cf7_form('Form Izin Kunjungan', $form_kunjungan, $mail_kunjungan);

echo "Proses pembuatan form CF7 selesai.\n";
