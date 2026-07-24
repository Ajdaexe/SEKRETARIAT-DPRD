<?php
/**
 * Template part for displaying document table with filters
 *
 * @package dprd-purbalingga
 */

// We expect $args to contain 'grup_dokumen' (e.g. 'ppid' or 'sakip')
$grup_dokumen = isset($args['grup_dokumen']) ? $args['grup_dokumen'] : 'ppid';

// For simplicity, we use client-side filtering via DataTables or vanilla JS. 
// Here we will use vanilla JS to filter the table.

// Get all documents for this group
$query_args = array(
    'post_type'      => 'dokumen',
    'posts_per_page' => -1, // Get all for client-side filtering
    'meta_query'     => array(
        array(
            'key'     => 'grup_dokumen',
            'value'   => $grup_dokumen,
            'compare' => '='
        )
    )
);

$dokumen_query = new WP_Query($query_args);
?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8 border-t-4 border-maroon">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h3 class="text-2xl font-bold text-gray-900">Daftar Dokumen <?php echo strtoupper($grup_dokumen); ?></h3>
        
        <!-- Search & Filter Controls -->
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <div class="relative w-full sm:w-48">
                <input type="text" id="search-dokumen" placeholder="Cari dokumen..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            
            <div class="relative w-full sm:w-40">
                <select id="filter-kategori" class="w-full pl-4 pr-8 py-2 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent bg-white">
                    <option value="all">Semua Kategori</option>
                    <?php
                    // Get terms for 'kategori_dokumen' taxonomy
                    $terms = get_terms(array(
                        'taxonomy' => 'kategori_dokumen',
                        'hide_empty' => false,
                    ));
                    if (!is_wp_error($terms) && !empty($terms)) {
                        foreach ($terms as $term) {
                            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                        }
                    }
                    ?>
                </select>
                <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
            </div>
            
            <div class="relative w-full sm:w-32">
                <select id="filter-tahun" class="w-full pl-4 pr-8 py-2 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-maroon focus:border-transparent bg-white">
                    <option value="all">Semua Tahun</option>
                    <?php
                    // Generate year options from 2020 to current year
                    $current_year = date('Y');
                    for ($y = $current_year; $y >= 2020; $y--) {
                        echo '<option value="' . esc_attr($y) . '">' . esc_html($y) . '</option>';
                    }
                    ?>
                </select>
                <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200" id="table-dokumen">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-12 text-center">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Dokumen</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="table-body-dokumen">
                <?php
                if ($dokumen_query->have_posts()) :
                    $no = 1;
                    while ($dokumen_query->have_posts()) : $dokumen_query->the_post();
                        $tahun = get_field('tahun_dokumen');
                        $file_pdf = get_field('file_pdf');
                        
                        // Get taxonomy terms
                        $terms = get_the_terms(get_the_ID(), 'kategori_dokumen');
                        $kategori_names = array();
                        $kategori_slugs = array();
                        
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $kategori_names[] = $term->name;
                                $kategori_slugs[] = $term->slug;
                            }
                        }
                        $kategori_str = implode(', ', $kategori_names);
                        $kategori_slug_str = implode(' ', $kategori_slugs);
                ?>
                <tr class="hover:bg-gray-50 transition dokumen-row" data-kategori="<?php echo esc_attr($kategori_slug_str); ?>" data-tahun="<?php echo esc_attr($tahun); ?>">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center font-medium"><?php echo $no++; ?></td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 dokumen-title">
                        <?php the_title(); ?>
                        <div class="text-xs text-gray-500 mt-1 md:hidden">
                            <?php echo esc_html($kategori_str); ?> | <?php echo esc_html($tahun); ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-cream text-maroon">
                            <?php echo esc_html($kategori_str); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                        <?php echo esc_html($tahun); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <?php if ($file_pdf) : ?>
                            <a href="<?php echo esc_url($file_pdf['url']); ?>" class="text-white bg-maroon hover:bg-maroon-dark py-1.5 px-3 rounded inline-flex items-center text-xs transition" target="_blank" rel="noopener">
                                <i class="fas fa-download mr-1.5"></i> Unduh
                            </a>
                        <?php else : ?>
                            <span class="text-gray-400 text-xs italic">Tidak ada file</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada dokumen yang tersedia.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <!-- No Results Message (Hidden by default) -->
        <div id="no-results-msg" class="hidden text-center py-8 text-gray-500">
            Tidak ditemukan dokumen yang sesuai dengan kriteria pencarian Anda.
        </div>
    </div>
    
    <!-- Simple Vanilla JS Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-dokumen');
            const kategoriFilter = document.getElementById('filter-kategori');
            const tahunFilter = document.getElementById('filter-tahun');
            const rows = document.querySelectorAll('.dokumen-row');
            const noResultsMsg = document.getElementById('no-results-msg');
            
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedKategori = kategoriFilter.value;
                const selectedTahun = tahunFilter.value;
                
                let visibleCount = 0;
                
                rows.forEach(row => {
                    const title = row.querySelector('.dokumen-title').textContent.toLowerCase();
                    const rowKategori = row.getAttribute('data-kategori');
                    const rowTahun = row.getAttribute('data-tahun');
                    
                    const matchSearch = title.includes(searchTerm);
                    const matchKategori = selectedKategori === 'all' || rowKategori.includes(selectedKategori);
                    const matchTahun = selectedTahun === 'all' || rowTahun === selectedTahun;
                    
                    if (matchSearch && matchKategori && matchTahun) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                if (visibleCount === 0 && rows.length > 0) {
                    noResultsMsg.classList.remove('hidden');
                } else {
                    noResultsMsg.classList.add('hidden');
                }
            }
            
            if (searchInput) searchInput.addEventListener('input', filterTable);
            if (kategoriFilter) kategoriFilter.addEventListener('change', filterTable);
            if (tahunFilter) tahunFilter.addEventListener('change', filterTable);
        });
    </script>
</div>
