# PRD — Custom WordPress Theme
## Website Sekretariat DPRD Kabupaten Purbalingga

**Versi:** 1.0
**Tanggal:** 23 Juli 2026
**Disusun untuk:** Pengembangan tema WordPress custom sesuai mockup (Beranda, Profil, Kontak, PPID, Sakip, D'Lantunan)
**Prinsip utama:** Hanya menggunakan plugin **gratis** (free/open-source dari repository WordPress.org), database di-host di **Aiven**.

---

## 1. Latar Belakang & Tujuan

Sekretariat DPRD Kabupaten Purbalingga membutuhkan website resmi baru yang:
- Tampilannya sesuai mockup desain (skema warna merah-krem, identitas visual pemerintah daerah).
- Menyediakan 6 halaman utama: **Beranda, Profil, Kontak, PPID, Sakip, D'Lantunan**.
- Dibangun di atas **WordPress** dengan tema custom (bukan tema premium/beli), memakai plugin gratis saja.
- Database dipisah dari hosting file, di-host di **Aiven for MySQL** (managed DB).
- Mudah dikelola oleh admin non-teknis (staf sekretariat) melalui WP Admin & Custom Post Types.

### Tujuan Produk
1. Website transparan, cepat, mobile-friendly, dan mudah diupdate kontennya.
2. Struktur data dokumen (PPID, Sakip) terkelola sebagai Custom Post Type, bukan hardcode.
3. Form kontak & form layanan D'Lantunan berfungsi (submit → email/notifikasi + tersimpan di DB).
4. Desain 1:1 mendekati mockup: hero image dengan overlay teks, kartu statistik, kartu informasi, tabel dokumen dengan filter, kartu layanan dengan CTA.

---

## 2. Ruang Lingkup (Scope)

### 2.1 In-Scope
- Custom WordPress theme (folder tema sendiri, tidak fork dari tema berbayar).
- 6 halaman/template sesuai mockup + header & footer global.
- Custom Post Type: `Dokumen` (untuk PPID & Sakip), `Layanan D'Lantunan`, `Info Terbaru/Berita`.
- Form: Kontak (Kirim Pesan) & 3 form pengajuan layanan D'Lantunan (Magang, Izin Penelitian, Izin Kunjungan).
- Integrasi Google Maps (lokasi kantor) via embed gratis (tanpa API key berbayar wajib).
- Statistik dinamis (counter) dikelola dari WP Admin (ACF/Custom Fields), bukan hardcode angka.
- Database Aiven MySQL sebagai backend WordPress.
- Responsif (desktop, tablet, mobile) — mockup Kontak menunjukkan versi mobile.

### 2.2 Out-of-Scope
- Tidak ada pembelian plugin premium/berbayar.
- Tidak membangun sistem login warga/UMKM (beda proyek dari UMKM Merdeka).
- Tidak termasuk migrasi data lama (jika ada website existing), kecuali diminta terpisah.
- Payment gateway — tidak ada transaksi di situs ini.

---

## 3. Tech Stack

| Layer | Teknologi | Catatan |
|---|---|---|
| CMS | WordPress (versi terbaru, self-hosted) | Core WP gratis |
| Tema | Custom theme (`_underscores`/manual) | PHP + Tailwind atau plain CSS |
| Database | **Aiven for MySQL** (free tier / trial plan) | Koneksi via `wp-config.php` (host, port, SSL) |
| Hosting file (webserver) | VPS/shared hosting mendukung PHP (mis. hosting biasa/Cloudways free trial/local dulu) | Terpisah dari DB Aiven |
| Custom Fields | **Advanced Custom Fields (ACF) — versi free** | Untuk statistik, jam layanan, dsb |
| Custom Post Type | **Custom Post Type UI (CPTUI) — free** | Dokumen, Layanan, Berita |
| Form | **Contact Form 7 (CF7) — free** atau **WPForms Lite — free** | Form Kontak & D'Lantunan |
| SEO dasar | **Yoast SEO / Rank Math — free tier** | Meta tag, sitemap |
| Cache/Performance | **WP Super Cache / LiteSpeed Cache — free** | Karena banyak gambar hero besar |
| Image optimization | **Smush (free tier)** | Kompres gambar hero |
| Security | **Wordfence (free tier)** atau **Really Simple SSL (free)** | Basic hardening |
| Maps | Google Maps **Embed** (tanpa API key, iframe gratis) | Untuk "Lokasi Kantor" |
| Table/filter dokumen | Custom PHP query + JS filter (vanilla), TIDAK pakai plugin tabel berbayar | Sesuai tampilan tabel PPID/Sakip |
| Version control | Git (opsional tapi disarankan) | — |

> Catatan: Semua plugin di atas punya versi gratis penuh untuk fitur yang dibutuhkan mockup ini — tidak perlu upgrade Pro.

---

## 4. Design System (dari analisis mockup)

- **Warna primer:** Merah maroon (`#8B1E1E`–`#A61C1C` kira-kira) untuk header teks, tombol, badge, footer bar bawah.
- **Warna aksen:** Krem/pink pucat (`#FBEAEA`/`#FDF3F0`) untuk background card icon & section highlight (mis. "Hasil Survey IKM").
- **Netral:** Putih untuk card background, abu-abu untuk teks sekunder.
- **Tipografi:** Sans-serif bold untuk heading (mirip Poppins/Inter), regular untuk body.
- **Komponen berulang di semua halaman:**
  - Header: logo + nama instansi (2 baris) + nav (Beranda, Profil, Kontak, PPID, Sakip, D'Lantunan) + ikon search.
  - Hero section: foto gedung kantor full-width dengan overlay gradient gelap + judul halaman + deskripsi singkat.
  - Card statistik icon-bulat (4 kolom) di beberapa halaman (Beranda, PPID, Sakip).
  - CTA banner merah di atas footer ("Hubungi Kami").
  - Footer 3 kolom: profil singkat + sosmed, Kontak Kami, Jam Layanan + copyright bar merah.
- Tombol utama: pill/rounded merah solid dengan ikon panah `>`.

---

## 5. Struktur Halaman (berdasarkan mockup)

| Halaman | Elemen Kunci |
|---|---|
| **Beranda** | Hero, 4 stat card, "Tentang Kami" + video Rapat Paripurna (embed), Info Terbaru list, Banner IKM (angka besar), 4 Akses Cepat Layanan (Profil/PPID/Sakip/D'Lantunan), CTA banner |
| **Profil** | Hero, "Sekretariat DPRD" desc + 4 badge (Unsur Pelayanan, Profesional, Akuntabel, Kolaboratif), Sekilas card, Dasar Hukum, Struktur Organisasi (image/embed), Susunan Organisasi (list bertingkat), Visi Misi, Tugas Pokok & Fungsi (6 item) |
| **Kontak** | Hero, Informasi Kontak (alamat/telp/email/web/jam), Ikuti Kami (sosmed), Lokasi Kantor (map card), Form Kirim Pesan (Nama, Email, Pesan) |
| **PPID** | Hero, Info box UU KIP, 4 kategori card (Berkala/Serta Merta/Setiap Saat/Laporan PPID) dengan tombol "Lihat Informasi", 4 stat card, Tabel Dokumen (search + filter kategori + filter tahun), CTA "Ajukan Permohonan" |
| **Sakip** | Hero, 4 stat card, Search + filter kategori dropdown, Dokumen Unggulan (featured card), Tabel Daftar Dokumen |
| **D'Lantunan** | Hero, Intro box, 3 card layanan (Magang/Izin Penelitian/Izin Kunjungan) tombol "Ajukan Sekarang", Alur Layanan (3 step), Info & Dokumen Terkait (panduan PDF), CTA banner |

**Catatan struktur:** PPID & Sakip berbagi struktur "Tabel Dokumen" yang sama persis → dibuat sebagai **1 template reusable** (`template-dokumen.php`) dengan parameter kategori CPT berbeda. Ini efisiensi dev.

---

## 6. Custom Post Types & Data Model

### CPT: `dokumen`
- Fields (ACF): Judul, Kategori (taxonomy: Informasi Berkala / Serta Merta / Setiap Saat / Laporan PPID / Renja, dst), Tahun, Tanggal, File PDF (upload), Grup (PPID atau Sakip), Featured (boolean untuk "Dokumen Unggulan").

### CPT: `layanan_dlantunan`
- Fields: Judul layanan, Deskripsi, Icon, Link/Slug form.

### CPT: `berita` (Info Terbaru)
- Fields: Judul, Tanggal, File/Link.

### Options Page (ACF Options — free):
- Statistik Beranda (150+ Pegawai, 45 Agenda, 250+ Dokumen, 100% Transparan).
- Hasil Survey IKM (angka, semester, tahun, predikat).
- Info Kontak global (alamat, telp, email, jam layanan) — dipakai di footer semua halaman.

---

## 7. Fase Pengerjaan

### **Fase 0 — Persiapan & Perencanaan (2–3 hari)**
- Finalisasi PRD ini + sign-off stakeholder (Sekretariat DPRD).
- Kumpulkan aset: logo, foto gedung resolusi tinggi, video rapat paripurna, dokumen PDF contoh.
- Setup repo Git + struktur folder proyek.
- **Deliverable:** PRD final, aset terkumpul, repo kosong siap isi.

### **Fase 1 — Setup Infrastruktur**
1. **Provisioning Aiven MySQL**
   - Buat akun Aiven, buat service **MySQL** (pilih plan gratis/trial terkecil).
   - Catat: host, port, username, password, SSL cert (Aiven wajib SSL).
   - Buat database `wp_dprd_purbalingga`.
2. **Setup hosting/server** untuk PHP + WordPress (terpisah dari DB).
   - Install PHP 8.x, pastikan ekstensi `mysqli`/`pdo_mysql` mendukung SSL connection.
3. **Install WordPress core** (unduh dari wordpress.org, gratis).
4. **Konfigurasi `wp-config.php`** mengarah ke Aiven:
   ```php
   define('DB_HOST', 'mysql-xxxx.aivencloud.com');
   define('DB_PORT', '12345'); // custom via DB_HOST 'host:port'
   define('DB_NAME', 'wp_dprd_purbalingga');
   define('DB_USER', 'avnadmin');
   define('DB_PASSWORD', '******');
   define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);
   ```
   - Tambahkan CA cert Aiven agar koneksi SSL valid (`MYSQL_SSL_CA` via filter atau custom `db.php` drop-in bila perlu).
5. Uji konek WP ke Aiven (halaman instalasi 5-menit WP berhasil).
- **Deliverable:** WP terinstall & konek ke Aiven, admin login berhasil, halaman default tampil.

### **Fase 2 — Setup Plugin & Struktur Dasar**
1. Install plugin free: ACF, CPTUI, Contact Form 7/WPForms Lite, Yoast/Rank Math, Cache plugin, Smush, Wordfence/Really Simple SSL.
2. Definisikan CPT (`dokumen`, `layanan_dlantunan`, `berita`) via CPTUI.
3. Definisikan Field Groups via ACF (per CPT + Options Page global).
4. Buat taxonomy kategori dokumen (Informasi Berkala, dst).
5. Import data dummy (4 dokumen contoh per mockup) untuk keperluan dev/QA.
- **Deliverable:** Struktur konten siap diisi, dummy data tampil di WP Admin.

### **Fase 3 — Pengembangan Tema Custom (Scaffolding)**
1. Buat folder tema baru (`style.css`, `functions.php`, `header.php`, `footer.php`, `index.php`).
2. Bangun **design token**: variabel warna (merah maroon, krem), font-family, spacing, radius tombol — via CSS custom properties.
3. Bangun komponen global:
   - `header.php`: logo + nav + search icon (sticky, responsive hamburger di mobile).
   - `footer.php`: 3 kolom + copyright bar, ambil data dari ACF Options.
   - Reusable partials: hero-section, stat-card, cta-banner.
- **Deliverable:** Header/footer tampil di semua halaman, konsisten dengan mockup, responsif dasar berfungsi.

### **Fase 4 — Build Halaman per Mockup**
Urutan build (dari kompleksitas rendah ke tinggi):

1. **Beranda** (`front-page.php`) — hero, 4 stat card, tentang kami + video embed, info terbaru loop, banner IKM, 4 akses cepat, CTA.
2. **Profil** (`page-profil.php`) — hero, badge grid, dasar hukum, area struktur organisasi (image/PDF embed atau org-chart sederhana via HTML/CSS), susunan organisasi (nested list), visi-misi, tupoksi grid 6 item.
3. **Kontak** (`page-kontak.php`) — hero, info kontak, sosmed icons, map embed (iframe Google Maps), form CF7 custom-styled (Nama, Email, Pesan) → kirim ke email admin.
4. **Template Dokumen reusable** (`template-dokumen.php`) dipakai untuk:
   - **PPID** (`page-ppid.php` pakai template): 4 kategori card, stat card, search+filter kategori+filter tahun via JS (WP_Query + AJAX ringan atau filter JS di client-side jika data ≤100 baris).
   - **Sakip** (`page-sakip.php` pakai template): stat card versi Sakip, featured document, tabel dokumen.
5. **D'Lantunan** (`page-dlantunan.php`) — hero, intro box, 3 card layanan, form pengajuan per layanan (3 form CF7 terpisah atau 1 form dengan pilihan jenis layanan), alur layanan 3-step, info dokumen terkait.
- **Deliverable per sub-fase:** setiap halaman selesai → screenshot dibandingkan mockup → checklist visual disetujui sebelum lanjut halaman berikut.

### **Fase 5 — Fitur Interaktif & Integrasi**
1. Search & filter dokumen (PPID/Sakip) — client-side JS filter atau AJAX WP.
2. Form submission handling:
   - Kontak → email ke `sekretariat@dprd.purbalingga.go.id` + simpan entri (CF7 + DB Feed / atau flamingo plugin free untuk arsip pesan).
   - Form D'Lantunan → sama, dengan field upload dokumen (khusus izin penelitian/kunjungan).
3. Statistik counter (angka di stat card) — ambil dari ACF Options, opsional animasi count-up (vanilla JS, tanpa plugin berbayar).
4. Video embed Rapat Paripurna (YouTube embed gratis).
- **Deliverable:** Semua form berfungsi & terkirim, filter dokumen bekerja, video/maps tampil.

### **Fase 6 — Konten Riil (Content Population)**
- Admin/staf sekretariat input data asli: dokumen PPID, Sakip, berita, statistik, kontak final, foto struktur organisasi.
- Ganti semua data dummy dengan data resmi.
- **Deliverable:** Website terisi data riil, siap direview stakeholder.

### **Fase 7 — Optimasi & Performance**
1. Kompresi gambar hero (Smush) — pastikan tidak memperlambat load.
2. Setup cache (WP Super Cache/LiteSpeed).
3. Cek skor performa (PageSpeed Insights — gratis) target minimal "Good" di mobile.
4. Setup SEO dasar (meta title/desc per halaman, sitemap.xml, robots.txt).
5. Setup SSL (HTTPS) via Really Simple SSL / Let's Encrypt (gratis).
- **Deliverable:** Skor performance & SEO baseline tercatat, HTTPS aktif.

### **Fase 8 — QA (Quality Assurance)**
**QA Visual (per halaman vs mockup):**
- Bandingkan pixel-level: warna, spacing, ukuran font, posisi elemen.
- Cek breakpoint: desktop (≥1280px), tablet (768px), mobile (≤480px — sesuai mockup Kontak versi mobile).

**QA Fungsional:**
- [ ] Navigasi semua menu berfungsi & highlight state aktif benar (contoh: menu "Kontak" merah saat di halaman Kontak).
- [ ] Form Kontak: submit sukses, validasi field wajib, email diterima.
- [ ] Form D'Lantunan (3 jenis): submit sukses, upload file berjalan.
- [ ] Filter/search dokumen PPID & Sakip menghasilkan hasil sesuai kategori/tahun.
- [ ] Tombol download dokumen mengunduh file benar.
- [ ] Statistik & angka dinamis muncul sesuai input ACF Options.
- [ ] Map lokasi kantor akurat menunjuk Jl. Onje No.2A Purbalingga.
- [ ] Video Rapat Paripurna dapat diputar.
- [ ] Sosial media icon link ke akun benar (atau placeholder jika belum ada).

**QA Teknis:**
- [ ] Koneksi WordPress ↔ Aiven stabil (uji reconnect, cek SSL tidak expired).
- [ ] Cross-browser check: Chrome, Firefox, Edge, Safari (mobile).
- [ ] Tidak ada plugin berbayar/nulled terpasang (audit plugin list).
- [ ] Tidak ada PHP notice/error/warning tampil ke publik (WP_DEBUG off di production).
- [ ] Backup otomatis berjalan (plugin free: UpdraftPlus).
- [ ] Uji beban ringan (concurrent visit sederhana) tidak membuat site down.

**QA Konten:**
- [ ] Tidak ada typo pada teks statis (footer, tupoksi, visi-misi).
- [ ] Semua tanggal & data dokumen konsisten (format tanggal Indonesia).

- **Deliverable:** QA report (checklist di atas + bug list + status resolved), sign-off dari stakeholder.

### **Fase 9 — Deployment & Go-Live**
1. Final migrasi ke domain resmi (mis. `dprd.purbalingga.go.id`) bila belum live di sana.
2. DNS pointing, cek propagasi.
3. Aktifkan monitoring uptime (gratis, mis. UptimeRobot free tier).
4. Training singkat untuk admin (cara input dokumen, berita, ubah statistik).
- **Deliverable:** Website live, admin bisa mandiri kelola konten, dokumentasi singkat (SOP admin) diserahkan.

### **Fase 10 — Post-Launch Monitoring (2 minggu pertama)**
- Pantau error log, submission form, kecepatan load real-user.
- Perbaikan bug minor pasca-launch.
- **Deliverable:** Laporan stabilitas 2 minggu, proyek closed.

---

## 8. Daftar Plugin Free (Final)

| Kebutuhan | Plugin | Status |
|---|---|---|
| Custom fields | Advanced Custom Fields | Free |
| Custom post type | Custom Post Type UI | Free |
| Form | Contact Form 7 (+ Flamingo utk arsip pesan) | Free |
| SEO | Rank Math atau Yoast SEO | Free tier |
| Cache | WP Super Cache / LiteSpeed Cache | Free |
| Image compress | Smush | Free tier |
| Security | Wordfence / Really Simple SSL | Free tier |
| Backup | UpdraftPlus | Free tier |
| Uptime monitor (eksternal) | UptimeRobot | Free tier |

> Tidak ada satupun item di atas yang wajib upgrade berbayar untuk memenuhi kebutuhan fitur di mockup.

---

## 9. Risiko & Mitigasi

| Risiko | Mitigasi |
|---|---|
| Koneksi WP ke Aiven terputus (SSL/cert expired) | Set reminder rotasi cert, gunakan connection pooling bila trafik naik |
| Free tier Aiven punya limit storage/koneksi | Pantau usage dashboard Aiven, siapkan rencana upgrade jika dokumen PDF makin banyak (pertimbangkan simpan file di storage terpisah, DB hanya metadata) |
| Filter dokumen lambat jika data banyak | Gunakan AJAX + pagination WP_Query, hindari load-all-client-side jika >200 dokumen |
| Konsistensi visual meleset dari mockup | Review visual per fase sebelum lanjut ke halaman berikutnya |

---

## 10. Timeline Ringkas (indikatif)

| Fase | Estimasi |
|---|---|
| 0. Persiapan | 2–3 hari |
| 1. Infrastruktur (WP + Aiven) | 2 hari |
| 2. Plugin & struktur data | 2 hari |
| 3. Scaffolding tema | 3 hari |
| 4. Build 6 halaman | 8–10 hari |
| 5. Fitur interaktif | 3 hari |
| 6. Konten riil | 2–3 hari |
| 7. Optimasi | 2 hari |
| 8. QA | 3 hari |
| 9. Deployment | 1 hari |
| 10. Monitoring pasca-launch | 14 hari (paralel) |

**Total estimasi aktif development:** ± 4–5 minggu kerja.

---

## 11. Kriteria Sukses (Definition of Done)

1. 6 halaman live sesuai mockup (toleransi minor visual, bukan struktural).
2. Semua form berfungsi & data masuk dengan benar.
3. WordPress berjalan stabil dengan database Aiven (tanpa downtime terkait DB dalam 2 minggu pertama).
4. 100% plugin yang digunakan berstatus **gratis**, tidak ada dependency berbayar.
5. Admin non-teknis bisa menambah dokumen PPID/Sakip tanpa bantuan developer.
6. Skor PageSpeed mobile minimal "cukup baik" (>50, idealnya >70).