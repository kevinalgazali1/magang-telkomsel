<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skul.Id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* ============ Base ============ */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .container-fluid {
            padding: 0;
            margin: 0;
        }

        /* ============ Navbar ============ */
        .navbar {
            background-color: #ffffff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-content {
            padding: 3rem 10%;
        }

        .right-section {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .sertif-item {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .sertif-container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-top: 1.5rem;
        }

        .sertif-list .item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }

        .sertif-list .item:last-child {
            border-bottom: none;
        }

        .sertif-list .item h6 {
            font-weight: 600;
            font-size: 15px;
        }

        .sertif-list .item p {
            font-size: 14px;
            margin: 0;
        }

        #konten {
            background-color: #fff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .navbar .logo {
            width: 120px;
        }

        .search-bar {
            margin-bottom: 2rem;
        }

        .card-jurusan {
            background: #fff;
            border-radius: 15px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
            height: 100%;
        }

        .card-jurusan:hover {
            transform: scale(1.03);
        }

        .card-jurusan img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .card-jurusan h6 {
            font-size: 14px;
            font-weight: 600;
        }

        .right-section {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .right-section h6 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .sertif-item {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info span {
            margin-right: 1rem;
            font-weight: 600;
        }

        .user-info .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #c04055;
        }

        /* ============ Layout ============ */
        .main-wrapper {
            display: flex;
            height: calc(100vh - 80px);
        }

        .artikel-card {
            display: flex;
            gap: 1rem;
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            height: 100%;
        }

        .artikel-card img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .artikel-card .artikel-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }


        .sidebar {
            width: 220px;
            background-color: #eff9ff;
            padding: 2rem 2rem;
            flex-shrink: 0;
        }

        .sidebar a {
            display: block;
            color: #000;
            padding: 0.75rem 0;
            font-weight: 600;
        }

        .sidebar a:hover {
            color: #d24c62;
        }

        .sidebar .logout {
            margin-top: 2rem;
            color: #d24c62;
        }

        .content {
            flex: 1;
            overflow-y: auto;
            background-color: #fff;
            margin: 0;
        }

        /* ============ Banner ============ */
        .banner {
            background: url('{{ url('img/background.jpg') }}') no-repeat center center;
            padding: 2rem;
            position: relative;
            margin-bottom: 2rem;
            min-height: 350px;
        }

        .banner h2 {
            color: #c04055;
            font-weight: 700;
        }

        .banner p {
            max-width: 500px;
        }

        .banner .illustration {
            position: absolute;
            bottom: 0;
            right: 2rem;
            width: 350px;
        }

        /* ============ Fitur Section ============ */
        #fitur {
            max-width: 1000px;
            margin: 2rem auto;
        }

        .feature-card {
            background-color: #f1f1f1;
            border-radius: 15px;
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s ease;
        }

        .feature-card:hover {
            transform: scale(1.03);
        }

        .feature-content {
            flex: 1;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: 0.95rem;
        }

        /* ============ Custom Feature Colors ============ */
        .sertifikasi {
            background-color: #DAF2FF;
        }

        .sertifikasi .feature-title {
            color: #196BE7;
        }

        .sertifikasi p {
            color: #428EFF;
        }

        .loker {
            background-color: #9BFFB9;
        }

        .loker .feature-title {
            color: #00924E;
        }

        .loker p {
            color: #00C569;
        }

        .pelatihan {
            background-color: #81F082;
        }

        .pelatihan .feature-title {
            color: #007B1F;
        }

        .pelatihan p {
            color: #00A92A;
        }

        .alumni {
            background-color: #F6C371;
        }

        .alumni .feature-title {
            color: #91641B;
        }

        .alumni p {
            color: #B98128;
        }

        .magang {
            background-color: #D9D9D9;
        }

        .magang .feature-title {
            color: #7D7D7D;
        }

        .magang p {
            color: #8E8E8E;
        }

        .footer {
            margin-top: 200px;
        }

        /* ============ Responsive ============ */
        @media (max-width: 768px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                display: none;
            }

            .content {
                padding: 1rem;
            }

            .banner-images {
                flex-direction: column;
                align-items: flex-start;
            }

            .banner-images img {
                width: 100%;
            }

            .banner .illustration {
                display: none;
            }
        }

        @media (max-width: 1000px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                display: none;
            }

            #fitur {
                margin-left: 20px;
                margin-right: 20px;
            }

            .banner-images {
                flex-direction: column;
                align-items: flex-start;
            }

            .banner-images img {
                width: 100%;
            }

            .banner .illustration {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <img src="{{ url('img/logo.png') }}" alt="Logo" class="logo" width="" />
        <div class="user-info">
            <span>Halo User</span>
            <img src="{{ url('img/profile.jpg') }}" alt="Profile" class="profile-picture" />
        </div>
    </div>

    <div class="main-wrapper">
        <div class="sidebar">
            <a class="text-secondary" href="{{ route('mitra.index') }}"><i
                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
            <a class="text-secondary" href="{{ route('mitra.sertifikasi') }}"><i
                    class="bi bi-patch-check-fill me-2"></i>Sertifikasi</a>
            <a class="text-secondary" href="{{ route('mitra.loker') }}"><i
                    class="bi bi-briefcase-fill me-2"></i>Loker</a>
            <a class="text-secondary" href="{{ route('mitra.pelatihan') }}"><i
                    class="bi bi-journal-text me-2"></i>Pelatihan</a>
            {{-- <a class="text-secondary" href="#"><i class="bi bi-person-fill me-2"></i>Profil</a> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout</a>
            </form>
        </div>

        <div class="content">
            <div class="banner">
                <div
                    class="col-lg-7 d-flex flex-column justify-content-center text-lg-start text-center py-5 px-4 ml-5">
                    <h2 class="fw-bold">Bangun Masa Depanmu Bersama Skul.Id</h2>
                    <p class="text-secondary">Temukan peluang terbaik seperti pelatihan, sertifikasi, dan informasi
                        kampus untuk membantumu meraih cita-cita karier.</p>
                </div>
                <img src="{{ url('img/main-dashboard.png') }}" alt="Ilustrasi" class="illustration" />
            </div>

            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" id="error-message">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="main-content">
                <div class="row">
                    <!-- Konten Utama -->
                    <div class="col-lg-9">
                        <div id="konten">
                            <h4 class="fw-bold mb-3">Info Lowongan Kerja</h4>
                            <p>
                                Temukan berbagai lowongan kerja dari mitra Skul.id untuk alumni SMK. Mitra dapat
                                menambahkan lowongan baru dan alumni bisa langsung melamar melalui platform ini.
                            </p>

                            <!-- Tombol Tambah Sertifikasi -->
                            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#lokerModal">+
                                Tambah Lowongan Kerja</button>

                            <div class="sertif-container">
                                <h5 class="mb-3 fw-semibold text-primary">Lowongan Kerja Anda</h5>
                                <div class="sertif-list">
                                    @forelse($lokerMitraSendiri as $loker)
                                        <div class="item border rounded p-3 mb-3"> <img
                                                src="{{ asset('storage/' . $loker->gambar) }}" alt="Foto Sertifikasi"
                                                class="img-fluid mb-2 rounded" style="max-height: 150px;">
                                            <h6 class="fw-bold">{{ $loker->nama_perusahaan }}</h6>
                                            <p>{{ $loker->posisi }}</p>
                                            <p>{{ $loker->tipe }}</p>
                                            <p>Rp {{ number_format($loker->gaji, 0, ',', '.') }}</p>
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editLokerModal" data-id="{{ $loker->id }}"
                                                data-nama_perusahaan="{{ $loker->nama_perusahaan }}"
                                                data-deskripsi="{{ $loker->deskripsi }}"
                                                data-posisi="{{ $loker->posisi }}" data-lokasi="{{ $loker->lokasi }}"
                                                data-tipe="{{ $loker->tipe }}"
                                                data-pendidikan="{{ $loker->pendidikan }}"
                                                data-gaji="{{ $loker->gaji }}"
                                                data-gambar="{{ asset('storage/' . $loker->gambar) }}"
                                                onclick="openEditModal(this)">Edit</a>
                                            <form action="{{ route('mitra.loker.destroy', $loker->id) }}"
                                                method="POST" class="d-inline"> @csrf
                                                @method('DELETE') <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus Lowongan Kerja ini?')">Hapus</button>
                                            </form>
                                    </div> @empty <p class="text-muted">Belum ada Lowongan Kerja yang Anda buat.</p>
                                    @endforelse
                                </div>
                            </div>
                            {{-- Sertifikasi Mitra Lain --}}

                            <div class="sertif-container mt-4">
                                <h5 class="mb-3 text-primary fw-semibold">Lowongan Kerja dari Mitra Lain</h5>
                                <div class="sertif-list">
                                    @forelse($lokerMitraLain as $loker)
                                        <div class="item border rounded p-3 mb-3"> <img
                                                src="{{ asset('storage/' . $loker->gambar) }}" alt="Foto lokerikasi"
                                                class="img-fluid mb-2 rounded" style="max-height: 150px;">
                                            <h6 class="fw-bold">{{ $loker->nama_perusahaan }}</h6>
                                            <p>{{ $loker->posisi }}</p>
                                            <p>{{ $loker->tipe }}</p>
                                            <p>{{ $loker->gaji }}</p>
                                    </div> @empty <p class="text-muted">Belum ada Lowongan Kerja dari mitra lain.
                                        </p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                <div class="right-section">
                                    <h5>Sertifikasi Terbaru</h5>
                                    <div class="sertif-item">Sertifikasi Microsoft Office</div>
                                    <div class="sertif-item">Sertifikasi Desain Grafis</div>
                                    <div class="sertif-item">Sertifikasi Jaringan Komputer</div>
                                    <div class="sertif-item">Sertifikasi Teknik Otomotif</div>
                                    <div class="sertif-item">Sertifikasi Arsitektur Gedung</div>
                                    <div class="sertif-item">Sertifikasi Mekanik Roda Dua</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Form Tambah Sertifikasi -->
                    <div class="modal fade" id="lokerModal" tabindex="-1" aria-labelledby="lokerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('mitra.loker.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="lokerModalLabel">Form Tambah Lowongan Kerja
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="nama_perusahaan"
                                                name="nama_perusahaan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="posisi" class="form-label">Posisi</label>
                                                <input type="text" class="form-control" id="posisi"
                                                    name="posisi" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lokasi" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" id="lokasi"
                                                    name="lokasi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="tipe-group">
                                            <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                            <select class="form-select rounded-3" name="tipe" required>
                                                <option value="freelance"
                                                    {{ old('tipe') == 'freelance' ? 'selected' : '' }}>Freelance
                                                </option>
                                                <option value="magang"
                                                    {{ old('tipe') == 'magang' ? 'selected' : '' }}>Magang
                                                </option>
                                                <option value="part time"
                                                    {{ old('tipe') == 'part time' ? 'selected' : '' }}>Part Time
                                                </option>
                                                <option value="full time"
                                                    {{ old('tipe') == 'full time' ? 'selected' : '' }}>Full Time
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" id="pendidikan"
                                                name="pendidikan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gaji" class="form-label">Gaji Sertifikasi (Rp)</label>
                                            <input type="text" class="form-control" id="gaji" name="gaji"
                                                required oninput="formatRupiah(this)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar" class="form-label">Upload Foto Perusahaan</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar"
                                                accept=".jpg,.jpeg,.png" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Form Edit Sertifikasi -->
                    <div class="modal fade" id="editLokerModal" tabindex="-1" aria-labelledby="editLokerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="editForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLokerModalLabel">Edit Sertifikasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="edit_id">
                                        <div class="mb-3">
                                            <label for="edit_nama_perusahaan" class="form-label">Nama
                                                Perusahaan</label>
                                            <input type="text" class="form-control" id="edit_nama_perusahaan"
                                                name="nama_perusahaan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="edit_posisi" class="form-label">Posisi</label>
                                                <input type="text" class="form-control" id="edit_posisi"
                                                    name="posisi" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="edit_lokasi" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" id="edit_lokasi"
                                                    name="lokasi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="tipe-group">
                                            <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                            <select class="form-select rounded-3" name="tipe" id="edit_tipe"
                                                required>
                                                <option value="freelance">Freelance</option>
                                                <option value="magang">Magang</option>
                                                <option value="part time">Part Time</option>
                                                <option value="full time">Full Time</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_pendidikan" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" id="edit_pendidikan"
                                                name="pendidikan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_gaji" class="form-label">Gaji (Rp)</label>
                                            <input type="text" class="form-control" id="edit_gaji" name="gaji"
                                                required oninput="formatRupiah(this)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_gambar" class="form-label">Upload Foto Baru
                                                (Opsional)</label>
                                            <input type="file" class="form-control" id="edit_gambar"
                                                name="gambar" accept=".jpg,.jpeg,.png">
                                            <img id="preview_gambar_edit" class="img-fluid mt-2 rounded"
                                                style="max-height: 150px;">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

                    <script>
                        function openEditModal(button) {
                            const id = button.getAttribute('data-id');
                            const nama_perusahaan = button.getAttribute('data-nama_perusahaan');
                            const deskripsi = button.getAttribute('data-deskripsi');
                            const posisi = button.getAttribute('data-posisi');
                            const lokasi = button.getAttribute('data-lokasi');
                            const tipe = button.getAttribute('data-tipe');
                            const pendidikan = button.getAttribute('data-pendidikan');
                            const gaji = button.getAttribute('data-gaji');
                            const gambar = button.getAttribute('data-gambar');

                            document.getElementById('edit_id').value = id;
                            document.getElementById('edit_nama_perusahaan').value = nama_perusahaan;
                            document.getElementById('edit_deskripsi').value = deskripsi;
                            document.getElementById('edit_posisi').value = posisi;
                            document.getElementById('edit_lokasi').value = lokasi;
                            document.getElementById('edit_tipe').value = tipe;
                            document.getElementById('edit_pendidikan').value = pendidikan;
                            document.getElementById('edit_gaji').value = gaji;
                            document.getElementById('preview_gambar_edit').src = gambar;

                            const form = document.getElementById('editForm');
                            form.action = `/mitra/update-loker/${id}`;
                        }

                        function formatRupiah(input) {
                            let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                            let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambah titik setiap 3 digit dari belakang
                            input.value = formatted;
                        }
                    </script>

</body>

</html>
