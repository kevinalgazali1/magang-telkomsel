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
            {{-- <a class="text-secondary" href="#"><i class="bi bi-person-fill me-2"></i>Profile Alumni</a> --}}
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
                            <h4 class="fw-bold mb-3">Info Pelatihan</h4>
                            <p>
                                Sertifikasi merupakan salah satu bukti kompetensi yang penting dimiliki alumni SMK untuk
                                meningkatkan daya saing di dunia kerja.
                                Program ini disediakan oleh Mitra melalui platform Skul.id dan dapat mencakup berbagai
                                bidang keahlian.
                            </p>
                            <p>
                                Mitra dapat menambahkan sertifikasi baru yang akan langsung tampil di halaman alumni
                                agar bisa diakses dan diikuti.
                                Alumni diharapkan aktif mengecek dan mengikuti sertifikasi sesuai bidang keahlian
                                masing-masing.
                            </p>

                            <!-- Tombol Tambah Sertifikasi -->
                            <button class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#pelatihanModal">+ Tambah Pelatihan</button>

                            <div class="sertif-container">
                                <h5 class="mb-3 fw-semibold text-primary">Pelatihan Anda</h5>
                                <div class="sertif-list">
                                    @forelse($pelatihanMitraSendiri as $pelatihan)
                                        <div class="item border rounded p-3 mb-3"> <img
                                                src="{{ asset('storage/' . $pelatihan->foto_pelatihan) }}"
                                                alt="Foto Pelatihan" class="img-fluid mb-2 rounded"
                                                style="max-height: 150px;">
                                            <h6 class="fw-bold">{{ $pelatihan->nama_pelatihan }}</h6>
                                            <p>{{ $pelatihan->deskripsi }}</p> <a href="#"
                                                class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editPelatihanModal" data-id="{{ $pelatihan->id }}"
                                                data-nama_pelatihan="{{ $pelatihan->nama_pelatihan }}"
                                                data-deskripsi="{{ $pelatihan->deskripsi }}"
                                                data-mulai="{{ $pelatihan->tanggal_mulai }}"
                                                data-selesai="{{ $pelatihan->tanggal_selesai }}"
                                                data-kota="{{ $pelatihan->kota }}"
                                                data-tempat_pelatihan="{{ $pelatihan->tempat_pelatihan }}"
                                                data-biaya="{{ $pelatihan->biaya }}"
                                                data-foto="{{ asset('storage/' . $pelatihan->foto_pelatihan) }}"
                                                onclick="openEditModal(this)">Edit</a>

                                            <form action="{{ route('mitra.pelatihan.destroy', $pelatihan->id) }}"
                                                method="POST" class="d-inline"> @csrf
                                                @method('DELETE') <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus pelatihan ini?')">Hapus</button>
                                            </form>
                                    </div> @empty <p class="text-muted">Belum ada Pelatihan yang Anda buat.</p>
                                    @endforelse
                                </div>
                            </div>
                            {{-- Pelatihan Mitra Lain --}}

                            <div class="sertif-container mt-4">
                                <h5 class="mb-3 text-primary fw-semibold">Pelatihan dari Mitra Lain</h5>
                                <div class="sertif-list">
                                    @forelse($pelatihanMitraLain as $pelatihan)
                                        <div class="item border rounded p-3 mb-3"> <img
                                                src="{{ asset('storage/' . $pelatihan->foto_pelatihan) }}"
                                                alt="Foto Pelatihan" class="img-fluid mb-2 rounded"
                                                style="max-height: 150px;">
                                            <h6 class="fw-bold">{{ $sertif->nama_pelatihan }}</h6>
                                            <p>{{ $pelatihan->deskripsi }}</p>
                                    </div> @empty <p class="text-muted">Belum ada Pelatihan dari mitra lain.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Form Tambah Pelatihan -->
                    <div class="modal fade" id="pelatihanModal" tabindex="-1" aria-labelledby="pelatihanModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('mitra.pelatihan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pelatihanModalLabel">Form Tambah Pelatihan
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_pelatihan" class="form-label">Judul
                                                Sertifikasi</label>
                                            <input type="text" class="form-control" id="nama_pelatihan"
                                                name="nama_pelatihan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="tanggal_mulai" class="form-label">Waktu Mulai</label>
                                                <input type="date" class="form-control" id="tanggal_mulai"
                                                    name="tanggal_mulai" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="tanggal_selesai" class="form-label">Waktu Selesai</label>
                                                <input type="date" class="form-control" id="tanggal_selesai"
                                                    name="tanggal_selesai" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kota" class="form-label">Kota Penyelenggaraan</label>
                                            <input type="text" class="form-control" id="kota" name="kota"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_pelatihan" class="form-label">Tempat
                                                Penyelenggaraan</label>
                                            <input type="text" class="form-control" id="tempat_pelatihan"
                                                name="tempat_pelatihan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status"
                                                onchange="toggleBiayaField(this)" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Gratis">Gratis</option>
                                                <option value="Berbayar">Berbayar</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="group_biaya_tambah">
                                            <label for="biaya" class="form-label">Biaya Sertifikasi (Rp)</label>
                                            <input type="text" class="form-control" id="biaya" name="biaya"
                                                oninput="formatRupiah(this)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Upload Foto Sertifikasi</label>
                                            <input type="file" class="form-control" id="foto_pelatihan"
                                                name="foto_pelatihan" accept=".jpg,.jpeg,.png" required>
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

                    <!-- Modal Form Edit Pelatihan -->
                    <div class="modal fade" id="editPelatihanModal" tabindex="-1"
                        aria-labelledby="editPelatihanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="editForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPelatihanModalLabel">Edit Sertifikasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="edit_id">
                                        <div class="mb-3">
                                            <label for="edit_nama_pelatihan" class="form-label">Judul
                                                Pelatihan</label>
                                            <input type="text" class="form-control" id="edit_nama_pelatihan"
                                                name="nama_pelatihan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="edit_tanggal_mulai" class="form-label">Waktu Mulai</label>
                                                <input type="date" class="form-control" id="edit_tanggal_mulai"
                                                    name="tanggal_mulai" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="edit_tanggal_selesai" class="form-label">Waktu
                                                    Selesai</label>
                                                <input type="date" class="form-control" id="edit_tanggal_selesai"
                                                    name="tanggal_selesai" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_kota" class="form-label">Kota</label>
                                            <input type="text" class="form-control" id="edit_kota" name="kota"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_tempat_pelatihan" class="form-label">Tempat</label>
                                            <input type="text" class="form-control" id="edit_tempat_pelatihan"
                                                name="tempat_pelatihan" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_status" class="form-label">Status</label>
                                            <select class="form-select" id="edit_status" name="status"
                                                onchange="toggleBiayaField(this)" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Gratis">Gratis</option>
                                                <option value="Berbayar">Berbayar</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="group_biaya_edit">
                                            <label for="edit_biaya" class="form-label">Biaya (Rp)</label>
                                            <input type="text" class="form-control" id="edit_biaya"
                                                name="biaya" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="edit_foto_pelatihan" class="form-label">Upload Foto Baru
                                                (Opsional)</label>
                                            <input type="file" class="form-control" id="edit_foto_pelatihan"
                                                name="foto_pelatihan" accept=".jpg,.jpeg,.png">
                                            <img id="preview_foto_edit" class="img-fluid mt-2 rounded"
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
                            const nama_pelatihan = button.getAttribute('data-nama_pelatihan');
                            const deskripsi = button.getAttribute('data-deskripsi');
                            const mulai = button.getAttribute('data-mulai');
                            const selesai = button.getAttribute('data-selesai');
                            const kota = button.getAttribute('data-kota');
                            const tempat_pelatihan = button.getAttribute('data-tempat_pelatihan');
                            const biaya = button.getAttribute('data-biaya');
                            const foto = button.getAttribute('data-foto');

                            document.getElementById('edit_nama_pelatihan').value = nama_pelatihan;
                            document.getElementById('edit_deskripsi').value = deskripsi;
                            document.getElementById('edit_tanggal_mulai').value = mulai;
                            document.getElementById('edit_tanggal_selesai').value = selesai;
                            document.getElementById('edit_kota').value = kota;
                            document.getElementById('edit_tempat_pelatihan').value = tempat_pelatihan;
                            document.getElementById('edit_biaya').value = biaya;
                            document.getElementById('preview_foto_edit').src = foto;

                            // Set form action URL
                            const form = document.getElementById('editForm');
                            form.action = `/mitra/update-pelatihan/${id}`;
                        }

                        function formatRupiah(input) {
                            let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                            let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambah titik setiap 3 digit dari belakang
                            input.value = formatted;
                        }

                        function toggleBiayaField(select) {
                            const status = select.value;

                            // Cek konteks: apakah dipanggil dari modal tambah atau edit
                            if (select.id === 'status') {
                                const biayaDiv = document.getElementById('group_biaya_tambah');
                                const biayaInput = document.getElementById('biaya');

                                if (status === 'Gratis') {
                                    biayaDiv.style.display = 'none';
                                    biayaInput.removeAttribute('required');
                                    biayaInput.value = '';
                                } else {
                                    biayaDiv.style.display = 'block';
                                    biayaInput.setAttribute('required', 'required');
                                }
                            }

                            if (select.id === 'edit_status') {
                                const biayaDiv = document.getElementById('group_biaya_edit');
                                const biayaInput = document.getElementById('edit_biaya');

                                if (status === 'Gratis') {
                                    biayaDiv.style.display = 'none';
                                    biayaInput.removeAttribute('required');
                                    biayaInput.value = '';
                                } else {
                                    biayaDiv.style.display = 'block';
                                    biayaInput.setAttribute('required', 'required');
                                }
                            }
                        }
                        document.addEventListener('DOMContentLoaded', function() {
                            toggleBiayaField(document.getElementById('status'));
                            toggleBiayaField(document.getElementById('edit_status'));
                        });
                    </script>
</body>

</html>
