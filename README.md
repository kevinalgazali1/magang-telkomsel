# MitraSkul.id

**MitraSkul.id** adalah platform informasi dan kolaborasi antara alumni sekolah dan mitra dunia kerja. Website ini memfasilitasi alumni dalam mengakses peluang kerja, pelatihan, sertifikasi, dan membangun jaringan antar sesama alumni serta mitra perusahaan.

## 🎯 Fitur Utama

### 🔐 Autentikasi & Role
- Login multi-role: `admin`, `mitra`, dan `alumnisiswa`
- Validasi login dengan nomor HP dan password
- Session management & redirect berdasarkan status profile

### 👥 Alumni
- Pendaftaran dan pengisian profil alumni
- Melihat data ikatan alumni berdasarkan sekolah
- Status alumni: Bekerja / Tidak Bekerja / Kuliah

### 🏢 Mitra
- Profil perusahaan mitra
- Posting lowongan kerja (loker)
- Kelola pelatihan dan sertifikasi
- Export peserta pelatihan (Excel)

### 📝 Sertifikasi
- Alumni bisa melihat dan mendaftar sertifikasi
- Mitra dapat menambahkan, mengedit, dan mengelola peserta

### 📚 Pelatihan
- Alumni dapat melihat pelatihan yang tersedia
- Mitra bisa menambahkan dan mengatur jadwal pelatihan

### 📄 Admin Panel
- Manajemen user: mitra & alumni
- Validasi dan verifikasi data mitra/alumni
- Kontrol penuh terhadap semua data platform

## 🧱 Teknologi yang Digunakan

- **Backend**: Laravel 10+
- **Frontend**: Blade + Bootstrap 5
- **Database**: MySQL
- **SweetAlert2**: Notifikasi interaktif
- **DataTables (opsional)**: Untuk tampilan tabel interaktif
- **Maatwebsite Excel**: Export data ke Excel

## 🚀 Cara Menjalankan

1. Clone repository
   ```bash
   git clone https://github.com/username/mitraskul.id.git
   cd mitraskul.id

2. Install Dependency
   composer install
   npm install && npm run dev

3. Buat file .env
   cp .env.example .env
   php artisan key:generate

4. Atur database di .env, lalu migrasi
   php artisan migrate --seed

5. Jalankan server lokal
   php artisan serve

## 📝 Catatan Tambahan
- Beberapa fitur seperti pencarian alumni, filter pelatihan berdasarkan tanggal, dan validasi nomor HP menggunakan RegEx.
- Menggunakan middleware profile_complete untuk memastikan user melengkapi profil sebelum akses dashboard.

## 📬 Kontak
- Pengembang: Kevin Al Gazali
- Email: [gazalikevin06@gmail.com]
- Website: https://mitraskul.id
