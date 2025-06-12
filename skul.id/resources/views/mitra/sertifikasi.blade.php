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
        }

        body:not(.modal-open) {
            overflow: hidden;
        }


        a {
            text-decoration: none;
        }

        .container-fluid {
            padding: 0;
            margin: 0;
        }

        .main-content {
            width: 100%;
        }

        .sertif-item {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        #konten {
            background-color: #fff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }



        /* ============ Layout ============ */
        .main-wrapper {
            display: flex;
            height: calc(100vh - 80px);
        }

        .content {
            flex: 1;
            overflow-x: hidden;
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

        /* Sertifikasi Card Enhancements */
        .card.sertifikasi-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .card.sertifikasi-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .card.sertifikasi-card img {
            transition: transform 0.3s ease;
        }

        .card.sertifikasi-card:hover img {
            transform: scale(1.03);
        }

        /* Detail Button */
        .btn-outline-primary {
            font-weight: 500;
            border-width: 2px;
            transition: all 0.2s ease-in-out;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        /* Icon Buttons (Edit/Delete) */
        .btn-icon {
            width: 38px;
            height: 38px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: background-color 0.2s ease-in-out, transform 0.2s ease;
        }

        .btn-icon:hover {
            transform: scale(1.1);
        }

        .btn-outline-warning.btn-icon:hover {
            background-color: #ffc107;
            color: #000;
        }

        .btn-outline-danger.btn-icon:hover {
            background-color: #dc3545;
            color: #fff;
        }

        /* List Styling */
        .sertif-info li {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 4px;
            font-size: 0.875rem;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .btn-icon {
                width: 34px;
                height: 34px;
                font-size: 14px;
            }
        }


        .transition {
            transition: all 0.3s ease;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        /* Optional: Alert transition (for smooth fade in/out) */
        .alert {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            transform: translateY(0);
        }

        .alert.show {
            opacity: 1;
            transform: translateY(0);
        }

        .alert.hide {
            opacity: 0;
            transform: translateY(-10px);
        }

        /* Extra polish */
        #success-message,
        #error-message {
            animation: fadeSlideDown 0.4s ease;
            margin-bottom: 1.5rem;
        }

        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            margin-top: 200px;
        }

        .partner-footer-logo {
            height: 40px;
            object-fit: contain;
        }

        .footer ul {
            padding-left: 0;
        }

        .footer li {
            margin-bottom: 8px;
        }

        .footer .bg-opacity-50 {
            background-color: rgba(255, 255, 255, 0.75) !important;
        }

        .container-footer {
            width: 100%;
            height: 100%;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            width: 150px;
            margin-left: 30px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-right: 30px;
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

        /* ============ Sidebar ============ */
        .sidebar {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            height: 100%;
            background-color: #eff9ff;
            position: relative;
            flex-shrink: 0;
        }

        .nav-link {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            color: #495057;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }

        .nav-link.active {
            background-color: #e7f1ff;
            color: #0d6efd;
            font-weight: 600;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .logout {
            cursor: pointer;
        }

        .modal-dialog {
            max-height: 90vh;
        }

        .modal-content {
            max-height: 90vh;
            overflow: hidden;
            animation: fadeInUp 0.3s ease-in-out;
        }


        .modal-body {
            overflow-y: auto;
            max-height: 70vh;
        }

        /* WebKit (Chrome, Safari, Edge) */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            /* Warna default semi-transparan */
            border-radius: 4px;
            border: none;
        }

        /* Hilangkan panah (scrollbar buttons) */
        ::-webkit-scrollbar-button {
            display: none;
        }

        /* Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
        }


        .edit-sertifikasi-input {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
            transition: border-color 0.3s;
        }

        .edit-modal-content {
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 0.5rem;
        }

        .edit-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.2);
            transition: 0.2s ease-in-out;
        }

        .edit-sertifikasi-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .detail-modal-content {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1rem 1.5rem;
        }

        .detail-modal-content .modal-title i {
            color: #0d6efd;
        }

        .detail-modal-content ul li {
            font-size: 0.95rem;
        }

        .detail-modal-content table th,
        .detail-modal-content table td {
            vertical-align: middle;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="col-lg-6 d-flex">
            <div class="col-lg-2">
                <img src="{{ url('img/logo.png') }}" alt="Logo" class="logo" width="" />
            </div>
        </div>
        <div class="user-info">
            <span>Halo, {{ $user->mitraProfile->nama_instansi }}</span>
            <img src="{{ url('img/user.png') }}" alt="Profile" class="profile-picture" />
        </div>
        <button class="btn d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar">
            <i class="bi bi-list fs-3"></i>
        </button>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('mitra.index') }}"><i
                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('mitra.sertifikasi') }}"><i
                    class="bi bi-patch-check-fill me-2"></i>Sertifikasi</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('mitra.loker') }}"><i
                    class="bi bi-briefcase-fill me-2"></i>Loker</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('mitra.pelatihan') }}"><i
                    class="bi bi-journal-text me-2"></i>Pelatihan</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('mitra.profile') }}"><i
                    class="bi bi-person-fill me-2"></i>Profil</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="logout" onclick="event.preventDefault(); confirmLogout();">
            </form>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="sidebar sidebar-main d-flex flex-column p-3" style="width: 250px;">


            <!-- Navigation Links -->
            <a class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('mitra.index') ? 'active' : 'text-secondary' }}"
                href="{{ route('mitra.index') }}">
                <i class="bi bi-house-door-fill me-2"></i> Beranda
            </a>
            <a class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('mitra.sertifikasi') ? 'active' : 'text-secondary' }}"
                href="{{ route('mitra.sertifikasi') }}">
                <i class="bi bi-patch-check-fill me-2"></i> Sertifikasi
            </a>
            <a class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('mitra.loker') ? 'active' : 'text-secondary' }}"
                href="{{ route('mitra.loker') }}">
                <i class="bi bi-briefcase-fill me-2"></i> Loker
            </a>
            <a class="nav-link d-flex align-items-center mb-2 {{ request()->routeIs('mitra.pelatihan') ? 'active' : 'text-secondary' }}"
                href="{{ route('mitra.pelatihan') }}">
                <i class="bi bi-journal-text me-2"></i> Pelatihan
            </a>
            <a class="nav-link d-flex align-items-center mb-4 {{ request()->routeIs('mitra.profile') ? 'active' : 'text-secondary' }}"
                href="{{ route('mitra.profile') }}">
                <i class="bi bi-person-fill me-2"></i> Profil
            </a>

            <!-- Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-auto">
                @csrf
                <a href="#" class="nav-link d-flex align-items-center text-danger fw-semibold mb-4"
                    onclick="confirmLogout(event)">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
            </form>
        </div>


        <div class="content">

            <div class="main-content">
                <div class="row">
                    <!-- Konten Utama -->
                    <div class="col-lg-12">
                        <div id="konten">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h2 class="fw-bold mb-1">Manajemen Sertifikasi</h2>
                                    <p class="text-muted">Atur dan kelola sertifikasi yang Anda tawarkan kepada alumni.
                                    </p>
                                </div>
                            </div>


                            <!-- Tombol Tambah Sertifikasi -->
                            <button class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#sertifikasiModal">+ Tambah
                                Sertifikasi</button>

                            <hr class="container my-5">

                            <h5 class="mb-4 fw-bold">Sertifikasi Anda</h5>

                            <!-- Sertifikasi Card Grid -->
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @forelse($sertifikasiMitraSendiri as $sertif)
                                    <div class="col">
                                        <div class="card sertifikasi-card h-100 border-0 shadow-sm">
                                            <img src="{{ asset('storage/' . $sertif->foto_sertifikasi) }}"
                                                class="card-img-top object-fit-cover"
                                                alt="Foto Sertifikasi {{ $sertif->judul_sertifikasi }}"
                                                style="height: 200px; object-fit: cover;">

                                            <div class="card-body d-flex flex-column">
                                                <h6 class="fw-semibold mb-1">{{ $sertif->judul_sertifikasi }}</h6>

                                                <ul class="list-unstyled text-muted sertif-info mb-3">
                                                    <li><i
                                                            class="bi bi-calendar-event"></i>{{ \Carbon\Carbon::parse($sertif->tanggal_mulai)->format('d M Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($sertif->tanggal_selesai)->format('d M Y') }}
                                                    </li>
                                                </ul>

                                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                                        onclick="showDetailModal(
            '{{ asset('storage/' . $sertif->foto_sertifikasi) }}',
            '{{ $sertif->judul_sertifikasi }}',
            `{{ $sertif->deskripsi }}`,
            '{{ \Carbon\Carbon::parse($sertif->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($sertif->tanggal_selesai)->format('d M Y') }}',
            '{{ $sertif->kota }}',
            '{{ $sertif->tempat }}',
            '{{ $sertif->biaya == 0 ? 'Gratis' : 'Rp' . number_format((int) $sertif->biaya, 0, ',', '.') }}',
            {{ $sertif->id }}
            )">
                                                        Detail
                                                    </button>


                                                    <div class="d-flex gap-2">
                                                        <button
                                                            class="btn btn-sm btn-outline-warning rounded-circle btn-icon"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editSertifikasiModal"
                                                            data-id="{{ $sertif->id }}"
                                                            data-judul="{{ $sertif->judul_sertifikasi }}"
                                                            data-deskripsi="{{ $sertif->deskripsi }}"
                                                            data-mulai="{{ $sertif->tanggal_mulai }}"
                                                            data-selesai="{{ $sertif->tanggal_selesai }}"
                                                            data-kota="{{ $sertif->kota }}"
                                                            data-tempat="{{ $sertif->tempat }}"
                                                            data-biaya="{{ $sertif->biaya }}"
                                                            data-foto="{{ asset('storage/' . $sertif->foto_sertifikasi) }}"
                                                            onclick="openEditModal(this)">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </button>

                                                        <form id="deleteForm-{{ $sertif->id }}"
                                                            action="{{ route('mitra.sertifikasi.destroy', $sertif->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger rounded-circle btn-icon"
                                                            onclick="confirmDelete('{{ $sertif->id }}')">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">Belum ada sertifikasi yang Anda buat.</p>
                                @endforelse
                            </div>

                            <hr class="my-5">
                            <h5 class="mb-4 fw-bold">Sertifikasi Mitra Lain</h5>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @forelse($sertifikasiMitraLain as $sertif)
                                    <div class="col">
                                        <div class="card sertifikasi-card h-100 border-0 shadow-sm">
                                            <img src="{{ asset('storage/' . $sertif->foto_sertifikasi) }}"
                                                class="card-img-top object-fit-cover"
                                                alt="Foto Sertifikasi {{ $sertif->judul_sertifikasi }}"
                                                style="height: 200px; object-fit: cover;">

                                            <div class="card-body d-flex flex-column">
                                                <h6 class="fw-semibold mb-1">{{ $sertif->judul_sertifikasi }}</h6>

                                                <ul class="list-unstyled text-muted sertif-info mb-0">
                                                    <li>
                                                        <i class="bi bi-calendar-event"></i>
                                                        {{ \Carbon\Carbon::parse($sertif->tanggal_mulai)->format('d M Y') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($sertif->tanggal_selesai)->format('d M Y') }}
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $sertif->kota }}, {{ $sertif->tempat }}
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-cash-stack"></i>
                                                        {{ $sertif->biaya == 0 ? 'Gratis' : 'Rp' . number_format($sertif->biaya, 0, ',', '.') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">Belum ada sertifikasi dari mitra lain.</p>
                                @endforelse
                            </div>

                            <!-- Modal Form Tambah Sertifikasi -->
                            <div class="modal fade" id="sertifikasiModal" tabindex="-1"
                                aria-labelledby="sertifikasiModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                        <div class="row g-0">
                                            <!-- Ilustrasi -->
                                            <div class="col-md-5 d-none d-md-block bg-light position-relative">
                                                <div
                                                    class="h-100 d-flex flex-column justify-content-center align-items-center p-4">
                                                    <h5 class="text-primary fw-bold">Tambah Sertifikasi Baru</h5>
                                                    <p class="text-muted text-center px-3">
                                                        Publikasikan program sertifikasi Anda agar alumni dapat
                                                        mengembangkan keterampilan dan
                                                        meningkatkan daya saing mereka.
                                                    </p>

                                                </div>
                                            </div>
                                            <!-- Form -->
                                            <div class="col-md-7 bg-white">
                                                <form action="{{ route('mitra.sertifikasi.store') }}" method="POST"
                                                    enctype="multipart/form-data" class="p-4" id="tambahForm">
                                                    @csrf
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold" id="sertifikasiModalLabel">
                                                            <i class="bi bi-award-fill me-2 text-primary"></i>Tambah
                                                            Sertifikasi
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="judul_sertifikasi" class="form-label">Judul
                                                                Sertifikasi</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bi bi-card-text"></i></span>
                                                                <input type="text" class="form-control"
                                                                    id="judul_sertifikasi" name="judul_sertifikasi"
                                                                    placeholder="Contoh: Sertifikasi Digital Marketing"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="deskripsi"
                                                                class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                                placeholder="Jelaskan sertifikasi ini secara singkat..." required></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="tanggal_mulai" class="form-label">Waktu
                                                                    Mulai</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_mulai" name="tanggal_mulai" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="tanggal_selesai" class="form-label">Waktu
                                                                    Selesai</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_selesai" name="tanggal_selesai"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="kota" class="form-label">Kota
                                                                    Penyelenggaraan</label>
                                                                <input type="text" class="form-control"
                                                                    id="kota" name="kota"
                                                                    placeholder="Contoh: Jakarta" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="tempat" class="form-label">Tempat
                                                                    Penyelenggaraan</label>
                                                                <input type="text" class="form-control"
                                                                    id="tempat" name="tempat"
                                                                    placeholder="Contoh: Gedung Balai Kartini"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status
                                                                Sertifikasi</label>
                                                            <select class="form-select" id="status" name="status"
                                                                required onchange="toggleBiaya()">
                                                                <option value="Berbayar">Berbayar</option>
                                                                <option value="Gratis" selected>Gratis</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3" id="biayaGroup">
                                                            <label for="biaya" class="form-label">Biaya Sertifikasi
                                                                (Rp)</label>
                                                            <input type="number" class="form-control" id="biaya"
                                                                name="biaya" placeholder="Contoh: 250000" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="foto_sertifikasi" class="form-label">Upload
                                                                Foto Sertifikasi</label>
                                                            <input type="file" class="form-control"
                                                                id="foto_sertifikasi" name="foto_sertifikasi"
                                                                accept=".jpg,.jpeg,.png" required>
                                                        </div>
                                                        <div class="modal-footer border-0 pt-0">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="confirmTambah()">Simpan
                                                                Sertifikasi</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Sertifikasi -->
                            <div class="modal fade" id="editSertifikasiModal" tabindex="-1"
                                aria-labelledby="editSertifikasiModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content edit-modal-content">
                                        <form id="editForm" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold text-primary-emphasis">
                                                    <i class="bi bi-pencil-square me-2"></i>Edit Sertifikasi
                                                </h5>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row gx-4 gy-3">
                                                    <!-- Left Section -->
                                                    <div class="col-lg-6">
                                                        <input type="hidden" id="edit_id">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Judul Sertifikasi</label>
                                                            <input type="text" class="form-control edit-input"
                                                                id="edit_judul_sertifikasi" name="judul_sertifikasi"
                                                                placeholder="Contoh: Sertifikasi UI/UX Designer"
                                                                required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control edit-input" id="edit_deskripsi" name="deskripsi" rows="4"
                                                                placeholder="Tulis penjelasan sertifikasi secara ringkas..." required></textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Tanggal Mulai</label>
                                                                <input type="date" class="form-control edit-input"
                                                                    id="edit_tanggal_mulai" name="tanggal_mulai"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Tanggal Selesai</label>
                                                                <input type="date" class="form-control edit-input"
                                                                    id="edit_tanggal_selesai" name="tanggal_selesai"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Right Section -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Kota</label>
                                                            <input type="text" class="form-control edit-input"
                                                                id="edit_kota" name="kota" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Tempat</label>
                                                            <input type="text" class="form-control edit-input"
                                                                id="edit_tempat" name="tempat" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Status Sertifikasi</label>
                                                            <select class="form-select edit-input" id="edit_status"
                                                                name="status" required onchange="toggleBiayaField()">
                                                                <option value="Berbayar">Berbayar</option>
                                                                <option value="Gratis">Gratis</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-3" id="edit_biaya_wrapper">
                                                            <label class="form-label">Biaya (Rp)</label>
                                                            <input type="number" class="form-control edit-input"
                                                                id="edit_biaya" name="biaya">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Upload Foto Sertifikasi
                                                                (Opsional)</label>
                                                            <input type="file" class="form-control edit-input"
                                                                id="edit_foto_sertifikasi" name="foto_sertifikasi"
                                                                accept=".jpg,.jpeg,.png"
                                                                onchange="previewImage(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="confirmEdit()">Perbarui</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Detail Sertifikasi -->
                            <!-- Modal Detail Sertifikasi -->
                            <div class="modal fade" id="detailModal" tabindex="-1"
                                aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content detail-modal-content shadow-lg rounded-4">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title fw-bold text-primary-emphasis"
                                                id="detailModalLabel">
                                                <i class="bi bi-info-circle me-2"></i> Detail Sertifikasi
                                            </h5>
                                        </div>

                                        <div class="modal-body pt-2">
                                            <div class="row gy-4">
                                                <!-- Left: Detail Sertifikasi -->
                                                <div class="col-md-6">
                                                    <img id="detailFoto" src=""
                                                        class="img-fluid rounded shadow-sm mb-3 w-100"
                                                        alt="Foto Sertifikasi"
                                                        style="max-height: 240px; object-fit: cover;">
                                                    <h4 id="detailJudul" class="fw-semibold mb-2"></h4>
                                                    <p id="detailDeskripsi" class="text-muted"></p>
                                                    <ul class="list-unstyled text-sm">
                                                        <li class="mb-1"><i
                                                                class="bi bi-calendar-event me-2 text-secondary"></i><strong>Tanggal:</strong>
                                                            <span id="detailTanggal"></span>
                                                        </li>
                                                        <li class="mb-1"><i
                                                                class="bi bi-geo-alt me-2 text-secondary"></i><strong>Lokasi:</strong>
                                                            <span id="detailKota"></span>
                                                        </li>
                                                        <li class="mb-1"><i
                                                                class="bi bi-building me-2 text-secondary"></i><strong>Tempat:</strong>
                                                            <span id="detailTempat"></span>
                                                        </li>
                                                        <li class="mb-1"><i
                                                                class="bi bi-cash-stack me-2 text-secondary"></i><strong>Biaya:</strong>
                                                            <span id="detailBiaya"></span>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <!-- Right: Daftar Peserta -->
                                                <div class="col-md-6">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-2">
                                                        <h5 class="fw-semibold mb-0">Daftar Peserta</h5>
                                                        <button id="btnDownloadPeserta"
                                                            class="btn btn-sm btn-outline-success d-flex align-items-center">
                                                            <i class="bi bi-download me-1"></i> CSV
                                                        </button>
                                                    </div>
                                                    <p class="text-muted small mb-3">Berikut adalah peserta yang
                                                        terdaftar untuk sertifikasi ini.
                                                    </p>

                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-sm table-hover table-striped align-middle mb-0">
                                                            <thead class="table-light text-center">
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Telepon</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="pesertaTableBody" class="small text-center">
                                                                <!-- Diisi melalui JavaScript -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer border-top-0 pt-3">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="bi bi-x-circle me-1"></i> Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-dark"
                style="background: url('{{ url('img/footer.png') }}') no-repeat center center / cover;">
                <div class="container-footer">
                    <div class="row align-items-start bg-white bg-opacity-75 rounded-3 p-4 shadow-sm">
                        <!-- Logo & Deskripsi -->
                        <div class="col-md-4 mb-4">
                            <img src="{{ url('img/logo.png') }}" alt="Logo Skul.Id" style="height: 65px;"
                                class="mb-3">
                            <p class="small">
                                mitraskul.Id adalah platform yang menghubungkan alumni dengan sekolah, dunia industri,
                                dan
                                peluang karier.
                            </p>
                        </div>

                        <!-- Kontak -->
                        <div class="col-md-4 mb-4">
                            <!-- <h6 class="fw-bold text-uppercase mb-3">Kontak</h6>
                            <ul class="list-unstyled small">
                                <li><i class="bi bi-envelope-fill me-2"></i>mitraskulid@gmail.com</li>
                                <li><i class="bi bi-telephone-fill me-2"></i>+62 851-7959-2408</li>
                            </ul> -->
                        </div>

                        <!-- Partner -->
                        <div class="col-md-4 mb-4">
                            <h6 class="fw-bold text-uppercase mb-3">Didukung Oleh</h6>
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <img src="{{ url('img/Telkomsel.png') }}" alt="Telkomsel"
                                    class="partner-footer-logo">
                                <img src="{{ url('img/pu.png') }}" alt="PUP Makassar" class="partner-footer-logo">
                            </div>
                        </div>
                        <div class="text-center text-dark small mt-4">
                            © 2025 mitraskul.Id. All rights reserved.
                        </div>
                    </div>

                </div>
            </footer>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (session('message'))
                Swal.fire({
                    icon: '{{ session('alert-type') == 'warning' ? 'warning' : 'info' }}',
                    title: '{{ ucfirst(session('alert-type') ?? 'Info') }}',
                    text: '{{ session('message') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif
            function confirmTambah() {
                Swal.fire({
                    title: 'Simpan Sertifikasi?',
                    text: "Pastikan semua informasi sudah lengkap dan benar.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('tambahForm').submit();
                    }
                });
            }

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data sertifikasi akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm-' + id).submit();
                    }
                });
            }

            function confirmEdit() {
                Swal.fire({
                    title: 'Perbarui Sertifikasi?',
                    text: "Pastikan semua data sudah benar.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, perbarui!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('editForm').submit();
                    }
                });
            }

            function confirmLogout() {
                event.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: "Anda akan keluar dari akun ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }
        </script>

        <script>
            function showDetailModal(foto, judul, deskripsi, tanggal, kota, tempat, biaya, sertifikasiId) {
                document.getElementById('detailFoto').src = foto;
                document.getElementById('detailJudul').textContent = judul;
                document.getElementById('detailDeskripsi').textContent = deskripsi;
                document.getElementById('detailTanggal').textContent = tanggal;
                document.getElementById('detailKota').textContent = kota;
                document.getElementById('detailTempat').textContent = tempat;
                document.getElementById('detailBiaya').textContent = biaya;


                // Ambil dan tampilkan data peserta
                fetch(`/sertifikasi/${sertifikasiId}/peserta`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('pesertaTableBody');
                        tableBody.innerHTML = ''; // Clear existing data

                        data.forEach((peserta, index) => {
                            tableBody.innerHTML += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${peserta.nama_lengkap}</td>
                        <td>${peserta.email}</td>
                        <td>${peserta.no_hp}</td>
                    </tr>
                `;
                        });
                    });

                const modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();

                // Tambah event listener tombol download (diperbarui setiap modal dibuka)
                document.getElementById('btnDownloadPeserta').onclick = function() {
                    window.location.href = `/public/sertifikasi/${sertifikasiId}/peserta/export`;
                };
            }
        </script>

        <script>
            function openEditModal(button) {
                const id = button.getAttribute('data-id');
                const judul = button.getAttribute('data-judul');
                const deskripsi = button.getAttribute('data-deskripsi');
                const mulai = button.getAttribute('data-mulai');
                const selesai = button.getAttribute('data-selesai');
                const kota = button.getAttribute('data-kota');
                const tempat = button.getAttribute('data-tempat');
                const biaya = button.getAttribute('data-biaya');
                const foto = button.getAttribute('data-foto');

                document.getElementById('edit_judul_sertifikasi').value = judul;
                document.getElementById('edit_deskripsi').value = deskripsi;
                document.getElementById('edit_tanggal_mulai').value = mulai;
                document.getElementById('edit_tanggal_selesai').value = selesai;
                document.getElementById('edit_kota').value = kota;
                document.getElementById('edit_tempat').value = tempat;
                document.getElementById('edit_biaya').value = biaya;
                document.getElementById('preview_foto_edit').src = foto;

                // Set form action URL
                document.getElementById('editForm').action = `/public/mitra/update-sertifikasi/${id}`;
            }

            setTimeout(() => {
                const alert = document.querySelector('.alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 300);
                }
            }, 5000); // 5 detik

            // Trigger saat modal dibuka (untuk reset tampilan biaya)
            document.getElementById('sertifikasiModal').addEventListener('show.bs.modal', () => {
                toggleBiaya('status', 'biaya');
            });

            document.getElementById('editSertifikasiModal').addEventListener('show.bs.modal', () => {
                toggleBiaya('edit_status', 'edit_biaya');
            });

            function toggleBiayaField() {
                const status = document.getElementById('edit_status').value;
                const biayaWrapper = document.getElementById('edit_biaya_wrapper');
                const biayaInput = document.getElementById('edit_biaya');

                if (status === 'Gratis') {
                    biayaWrapper.style.display = 'none';
                    biayaInput.value = 0;
                } else {
                    biayaWrapper.style.display = 'block';
                }
            }

            function toggleBiaya() {

                const status = document.getElementById('status').value;
                const biayaWrapper = document.getElementById('biayaGroup');
                const biayaInput = document.getElementById('biaya');


                if (status === 'Gratis') {
                    biayaWrapper.style.display = 'none';
                    biayaInput.value = 0;
                } else {
                    biayaWrapper.style.display = 'block';
                }
            }

            function previewImage(input) {
                const preview = document.getElementById('preview_foto_edit');
                const file = input.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        preview.src = e.target.result;
                        preview.classList.remove('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
        <script>
            const tanggalMulai = document.getElementById('tanggal_mulai');
            const tanggalSelesai = document.getElementById('tanggal_selesai');

            // Batasi tanggal mulai minimal hari ini
            const today = new Date().toISOString().split('T')[0];
            tanggalMulai.setAttribute('min', today);

            // Saat tanggal mulai berubah
            tanggalMulai.addEventListener('change', function() {
                tanggalSelesai.value = ''; // kosongkan dulu agar tidak tertinggal nilai lama
                tanggalSelesai.setAttribute('min', this.value); // tanggal selesai minimal = tanggal mulai
            });

            // Opsional: validasi tambahan saat submit (jika dibutuhkan)
            document.querySelector('form')?.addEventListener('submit', function(e) {
                if (tanggalSelesai.value < tanggalMulai.value) {
                    alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
                    e.preventDefault();
                }
            });
        </script>
</body>

</html>
