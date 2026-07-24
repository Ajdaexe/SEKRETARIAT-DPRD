<?php
/*
Plugin Name: DPRD Purbalingga Core
Description: Core Custom Post Types, Taxonomies, and ACF Configurations for Sekretariat DPRD Purbalingga.
Version: 1.0
Author: System
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// 1. Register Custom Post Types
function dprd_register_cpts() {
    // CPT: Dokumen
    register_post_type('dokumen', array(
        'labels' => array(
            'name' => 'Dokumen',
            'singular_name' => 'Dokumen',
            'add_new' => 'Tambah Dokumen',
            'add_new_item' => 'Tambah Dokumen Baru',
            'edit_item' => 'Edit Dokumen',
            'all_items' => 'Semua Dokumen'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-media-document',
        'show_in_rest' => true
    ));

    // CPT: Layanan D'Lantunan
    register_post_type('layanan_dlantunan', array(
        'labels' => array(
            'name' => 'Layanan D\'Lantunan',
            'singular_name' => 'Layanan',
            'add_new' => 'Tambah Layanan',
            'add_new_item' => 'Tambah Layanan Baru',
            'edit_item' => 'Edit Layanan',
            'all_items' => 'Semua Layanan'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-clipboard',
        'show_in_rest' => true
    ));

    // CPT: Berita
    register_post_type('berita', array(
        'labels' => array(
            'name' => 'Info Terbaru / Berita',
            'singular_name' => 'Berita',
            'add_new' => 'Tambah Berita',
            'add_new_item' => 'Tambah Berita Baru',
            'edit_item' => 'Edit Berita',
            'all_items' => 'Semua Berita'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-megaphone',
        'show_in_rest' => true
    ));
}
add_action('init', 'dprd_register_cpts');

// 2. Register Taxonomy
function dprd_register_taxonomies() {
    register_taxonomy('kategori_dokumen', 'dokumen', array(
        'labels' => array(
            'name' => 'Kategori Dokumen',
            'singular_name' => 'Kategori Dokumen',
            'add_new_item' => 'Tambah Kategori Baru'
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true
    ));
}
add_action('init', 'dprd_register_taxonomies');

// 3. Register ACF Fields
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_dokumen_meta',
        'title' => 'Dokumen Meta',
        'fields' => array(
            array(
                'key' => 'field_file_dokumen',
                'label' => 'File Dokumen (PDF)',
                'name' => 'file_dokumen',
                'type' => 'file',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_tahun_dokumen',
                'label' => 'Tahun',
                'name' => 'tahun_dokumen',
                'type' => 'number',
            ),
            array(
                'key' => 'field_grup_dokumen',
                'label' => 'Grup (PPID / Sakip)',
                'name' => 'grup_dokumen',
                'type' => 'select',
                'choices' => array(
                    'ppid' => 'PPID',
                    'sakip' => 'Sakip'
                ),
            ),
            array(
                'key' => 'field_dokumen_unggulan',
                'label' => 'Dokumen Unggulan?',
                'name' => 'dokumen_unggulan',
                'type' => 'true_false',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'dokumen',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
        'key' => 'group_layanan_meta',
        'title' => 'Layanan D\'Lantunan Meta',
        'fields' => array(
            array(
                'key' => 'field_icon_layanan',
                'label' => 'Icon Layanan (Class name misal: fas fa-file)',
                'name' => 'icon_layanan',
                'type' => 'text',
            ),
            array(
                'key' => 'field_link_form_layanan',
                'label' => 'Link/Slug Form',
                'name' => 'link_form_layanan',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'layanan_dlantunan',
                ),
            ),
        ),
    ));

    // Options Page
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Pengaturan Website DPRD',
            'menu_title'    => 'Pengaturan Web',
            'menu_slug'     => 'pengaturan-web',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }

    acf_add_local_field_group(array(
        'key' => 'group_pengaturan_global',
        'title' => 'Pengaturan Global',
        'fields' => array(
            array(
                'key' => 'field_statistik_pegawai',
                'label' => 'Statistik: Pegawai',
                'name' => 'statistik_pegawai',
                'type' => 'text',
                'default_value' => '150+'
            ),
            array(
                'key' => 'field_statistik_agenda',
                'label' => 'Statistik: Agenda',
                'name' => 'statistik_agenda',
                'type' => 'text',
                'default_value' => '45'
            ),
            array(
                'key' => 'field_statistik_dokumen',
                'label' => 'Statistik: Dokumen',
                'name' => 'statistik_dokumen',
                'type' => 'text',
                'default_value' => '250+'
            ),
            array(
                'key' => 'field_statistik_transparan',
                'label' => 'Statistik: Transparan',
                'name' => 'statistik_transparan',
                'type' => 'text',
                'default_value' => '100%'
            ),
            array(
                'key' => 'field_ikm_angka',
                'label' => 'IKM Angka',
                'name' => 'ikm_angka',
                'type' => 'text',
            ),
            array(
                'key' => 'field_ikm_predikat',
                'label' => 'IKM Predikat',
                'name' => 'ikm_predikat',
                'type' => 'text',
            ),
            array(
                'key' => 'field_kontak_alamat',
                'label' => 'Alamat Kantor',
                'name' => 'kontak_alamat',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_kontak_telp',
                'label' => 'Telepon',
                'name' => 'kontak_telp',
                'type' => 'text',
            ),
            array(
                'key' => 'field_kontak_email',
                'label' => 'Email',
                'name' => 'kontak_email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_kontak_jam_layanan',
                'label' => 'Jam Layanan',
                'name' => 'kontak_jam_layanan',
                'type' => 'textarea',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'pengaturan-web',
                ),
            ),
        ),
    ));
}
