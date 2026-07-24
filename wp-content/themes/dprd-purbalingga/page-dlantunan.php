<?php
/**
 * Template Name: D'Lantunan
 *
 * @package dprd-purbalingga
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative w-full h-[400px] bg-gray-900 flex items-center justify-center mt-[72px]">
    <div class="absolute inset-0 w-full h-full">
        <img src="https://via.placeholder.com/1920x400/8B1E1E/ffffff?text=Layanan+D'Lantunan" alt="Hero DLantunan" class="w-full h-full object-cover opacity-50">
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">D'Lantunan</h1>
        <p class="text-xl md:text-2xl drop-shadow-md">Layanan Bantuan dan Fasilitasi Sekretariat DPRD</p>
    </div>
</section>

<!-- Intro Box -->
<section class="py-12 bg-white -mt-10 relative z-20">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-xl p-8 md:p-12 text-center max-w-4xl mx-auto border-t-4 border-maroon">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Apa itu D'Lantunan?</h2>
            <p class="text-gray-700 text-lg leading-relaxed mb-0">
                <strong>D'Lantunan</strong> (Digital Layanan Bantuan dan Fasilitasi) merupakan inovasi layanan publik dari Sekretariat DPRD Kabupaten Purbalingga untuk mempermudah masyarakat, mahasiswa, dan instansi lain dalam mengajukan permohonan Magang, Izin Penelitian, dan Izin Kunjungan Kerja secara online.
            </p>
        </div>
    </div>
</section>

<!-- 3 Card Layanan -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Pilih Jenis Layanan
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
            <p class="text-gray-600">Pilih layanan yang Anda butuhkan dan isi formulir pengajuannya.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Magang -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 flex flex-col h-full">
                <div class="h-3 bg-maroon w-full"></div>
                <div class="p-8 flex-grow flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-cream text-maroon rounded-full flex items-center justify-center text-3xl mb-6">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Magang / PKL</h3>
                    <p class="text-gray-600 mb-8 flex-grow">Layanan pengajuan magang atau Praktik Kerja Lapangan (PKL) bagi mahasiswa dan siswa SMK di lingkungan Sekretariat DPRD.</p>
                    <button class="w-full bg-white text-maroon font-bold py-3 px-4 border-2 border-maroon rounded hover:bg-maroon hover:text-white transition" onclick="openModal('modal-magang')">
                        Ajukan Sekarang
                    </button>
                </div>
            </div>
            
            <!-- Izin Penelitian -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 flex flex-col h-full">
                <div class="h-3 bg-maroon w-full"></div>
                <div class="p-8 flex-grow flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-cream text-maroon rounded-full flex items-center justify-center text-3xl mb-6">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Izin Penelitian</h3>
                    <p class="text-gray-600 mb-8 flex-grow">Layanan pengajuan izin riset, observasi, atau pengambilan data untuk keperluan tugas akhir, skripsi, tesis, dan disertasi.</p>
                    <button class="w-full bg-white text-maroon font-bold py-3 px-4 border-2 border-maroon rounded hover:bg-maroon hover:text-white transition" onclick="openModal('modal-penelitian')">
                        Ajukan Sekarang
                    </button>
                </div>
            </div>
            
            <!-- Izin Kunjungan -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 flex flex-col h-full">
                <div class="h-3 bg-maroon w-full"></div>
                <div class="p-8 flex-grow flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-cream text-maroon rounded-full flex items-center justify-center text-3xl mb-6">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Izin Kunjungan</h3>
                    <p class="text-gray-600 mb-8 flex-grow">Layanan pengajuan kunjungan kerja, studi banding, atau audiensi dari instansi pemerintah, sekolah, maupun lembaga lain.</p>
                    <button class="w-full bg-white text-maroon font-bold py-3 px-4 border-2 border-maroon rounded hover:bg-maroon hover:text-white transition" onclick="openModal('modal-kunjungan')">
                        Ajukan Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alur Layanan 3-Step -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 relative inline-block">
                Alur Pengajuan Layanan
                <span class="absolute bottom-0 left-1/4 right-1/4 h-1 bg-maroon mx-auto"></span>
            </h2>
        </div>
        
        <div class="relative max-w-4xl mx-auto">
            <!-- Connecting Line -->
            <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-1 bg-gray-200 z-0"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl font-bold mb-6 shadow-lg border-4 border-white">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Isi Formulir</h3>
                    <p class="text-gray-600">Pilih jenis layanan dan lengkapi data diri beserta dokumen persyaratan (surat pengantar/proposal).</p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl font-bold mb-6 shadow-lg border-4 border-white">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Verifikasi</h3>
                    <p class="text-gray-600">Tim kami akan memverifikasi berkas permohonan Anda maksimal 2x24 jam hari kerja.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto bg-maroon text-white rounded-full flex items-center justify-center text-3xl font-bold mb-6 shadow-lg border-4 border-white">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Persetujuan</h3>
                    <p class="text-gray-600">Surat balasan atau konfirmasi persetujuan akan dikirimkan melalui email atau WhatsApp Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info & Dokumen Terkait -->
<section class="py-16 bg-cream">
    <div class="container mx-auto px-4 max-w-4xl text-center">
        <h2 class="text-3xl font-bold text-maroon mb-6">Informasi & Dokumen Panduan</h2>
        <p class="text-gray-700 mb-8">Sebelum mengajukan permohonan, pastikan Anda telah membaca syarat dan ketentuan layanan pada buku panduan D'Lantunan.</p>
        
        <div class="bg-white rounded-lg p-6 shadow-md inline-flex items-center gap-4">
            <i class="fas fa-file-pdf text-4xl text-red-500"></i>
            <div class="text-left">
                <h4 class="font-bold text-gray-900">Buku Panduan Layanan D'Lantunan</h4>
                <p class="text-sm text-gray-500">PDF, 2.4 MB</p>
            </div>
            <a href="#" class="ml-4 bg-maroon hover:bg-maroon-dark text-white p-3 rounded-full transition">
                <i class="fas fa-download"></i>
            </a>
        </div>
    </div>
</section>

<!-- Modals for Forms -->
<!-- Modal Magang -->
<div id="modal-magang" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center p-6 border-b border-gray-200 sticky top-0 bg-white z-10">
            <h3 class="text-xl font-bold text-gray-900">Form Pengajuan Magang/PKL</h3>
            <button onclick="closeModal('modal-magang')" class="text-gray-400 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 prose max-w-none">
            <p class="text-center italic text-gray-500 bg-gray-50 p-4 border border-dashed border-gray-300 rounded">
                [Area form pendaftaran magang. Tambahkan shortcode Contact Form 7 di sini dari WP Admin]
            </p>
            
            <!-- Mockup form visual -->
            <form class="mt-4" onsubmit="event.preventDefault();">
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="Nama">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Instansi/Kampus</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="Asal Kampus">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Upload Surat Pengantar (PDF)</label>
                    <input type="file" class="w-full border rounded p-2" accept=".pdf">
                </div>
                <button class="bg-maroon text-white font-bold py-2 px-4 rounded w-full">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Penelitian -->
<div id="modal-penelitian" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center p-6 border-b border-gray-200 sticky top-0 bg-white z-10">
            <h3 class="text-xl font-bold text-gray-900">Form Pengajuan Izin Penelitian</h3>
            <button onclick="closeModal('modal-penelitian')" class="text-gray-400 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 prose max-w-none">
            <p class="text-center italic text-gray-500 bg-gray-50 p-4 border border-dashed border-gray-300 rounded">
                [Area form pendaftaran izin penelitian. Tambahkan shortcode Contact Form 7 di sini dari WP Admin]
            </p>
            <!-- Mockup form visual -->
            <form class="mt-4" onsubmit="event.preventDefault();">
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Judul Penelitian</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="Judul">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Upload Proposal (PDF)</label>
                    <input type="file" class="w-full border rounded p-2" accept=".pdf">
                </div>
                <button class="bg-maroon text-white font-bold py-2 px-4 rounded w-full">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Kunjungan -->
<div id="modal-kunjungan" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center p-6 border-b border-gray-200 sticky top-0 bg-white z-10">
            <h3 class="text-xl font-bold text-gray-900">Form Pengajuan Izin Kunjungan</h3>
            <button onclick="closeModal('modal-kunjungan')" class="text-gray-400 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 prose max-w-none">
            <p class="text-center italic text-gray-500 bg-gray-50 p-4 border border-dashed border-gray-300 rounded">
                [Area form pendaftaran izin kunjungan. Tambahkan shortcode Contact Form 7 di sini dari WP Admin]
            </p>
            <!-- Mockup form visual -->
            <form class="mt-4" onsubmit="event.preventDefault();">
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Instansi/Lembaga Asal</label>
                    <input type="text" class="w-full border rounded p-2" placeholder="Nama Instansi">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Tujuan Kunjungan</label>
                    <textarea class="w-full border rounded p-2" rows="3"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Estimasi Peserta</label>
                    <input type="number" class="w-full border rounded p-2" placeholder="Jumlah orang">
                </div>
                <button class="bg-maroon text-white font-bold py-2 px-4 rounded w-full">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore background scrolling
    }
    
    // Close modal on click outside
    window.onclick = function(event) {
        if (event.target.classList.contains('bg-opacity-50')) {
            event.target.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
</script>

<?php get_footer(); ?>
