<?php
if( function_exists('acf_add_local_field_group') ):

    // 1. Opsi Global (Statistik & Kontak)
    acf_add_local_field_group(array(
        'key' => 'group_global_options',
        'title' => 'Pengaturan Website DPRD',
        'fields' => array(
            array(
                'key' => 'field_stat_pegawai',
                'label' => 'Jumlah Pegawai',
                'name' => 'stat_pegawai',
                'type' => 'number',
                'default_value' => '150',
            ),
            array(
                'key' => 'field_stat_agenda',
                'label' => 'Jumlah Agenda',
                'name' => 'stat_agenda',
                'type' => 'number',
                'default_value' => '45',
            ),
            array(
                'key' => 'field_stat_dokumen',
                'label' => 'Jumlah Dokumen',
                'name' => 'stat_dokumen',
                'type' => 'number',
                'default_value' => '250',
            ),
            array(
                'key' => 'field_stat_transparan',
                'label' => 'Persentase Transparan',
                'name' => 'stat_transparan',
                'type' => 'text',
                'default_value' => '100%',
            ),
            array(
                'key' => 'field_ikm_nilai',
                'label' => 'Nilai IKM',
                'name' => 'ikm_nilai',
                'type' => 'text',
                'default_value' => '85.50',
            ),
            array(
                'key' => 'field_ikm_predikat',
                'label' => 'Predikat IKM',
                'name' => 'ikm_predikat',
                'type' => 'text',
                'default_value' => 'Sangat Baik',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-pengaturan',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));

    // 2. Field untuk CPT Dokumen
    acf_add_local_field_group(array(
        'key' => 'group_dokumen_meta',
        'title' => 'Detail Dokumen',
        'fields' => array(
            array(
                'key' => 'field_tahun_dokumen',
                'label' => 'Tahun',
                'name' => 'tahun_dokumen',
                'type' => 'number',
            ),
            array(
                'key' => 'field_grup_dokumen',
                'label' => 'Grup Dokumen',
                'name' => 'grup_dokumen',
                'type' => 'select',
                'choices' => array(
                    'ppid' => 'PPID',
                    'sakip' => 'SAKIP',
                ),
            ),
            array(
                'key' => 'field_dokumen_unggulan',
                'label' => 'Jadikan Dokumen Unggulan?',
                'name' => 'dokumen_unggulan',
                'type' => 'true_false',
                'ui' => 1,
            ),
            array(
                'key' => 'field_file_dokumen',
                'label' => 'File PDF',
                'name' => 'file_dokumen',
                'type' => 'file',
                'return_format' => 'url',
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
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));

endif;
