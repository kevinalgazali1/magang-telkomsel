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
            background-color: #fff;
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

        /* ============ Navbar ============ */
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

        .main-content {
            width: 100%;
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
            padding: 2rem;
            border-radius: 15px;
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
            width: 150px;
            margin-left: 30px;
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

        .content {
            flex: 1;
            overflow: auto;
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

        @media (max-width: 768px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                display: none;
            }

            .user-info {
                display: none;
                ;
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

        .modal-content {
            max-height: 90vh;
            overflow: hidden;
            animation: fadeInUp 0.3s ease-in-out;
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

        #success-message,
        #error-message {
            animation: fadeSlideDown 0.5s ease;
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
                                    <h2 class="fw-bold mb-1">Kelola Pelatihan</h2>
                                    <p class="text-muted">Tambah dan kelola pelatihan atau sertifikasi dari mitra
                                        untuk alumni SMK.</p>
                                </div>
                            </div>

                            <!-- Tombol Tambah -->
                            <button class="btn btn-primary mb-4" data-bs-toggle="modal"
                                data-bs-target="#pelatihanModal">+ Tambah Pelatihan</button>

                            <hr class="container my-5">
                            <!-- Pelatihan Anda -->
                            <h5 class="mb-4 fw-bold">Pelatihan Anda</h5>
                            <div class="sertif-container">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse($pelatihanMitraSendiri as $pelatihan)
                                        <div class="col">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <img src="{{ asset('storage/' . $pelatihan->foto_pelatihan) }}"
                                                    class="card-img-top object-fit-cover"
                                                    alt="Foto Pelatihan {{ $pelatihan->nama_pelatihan }}"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="fw-semibold mb-1">{{ $pelatihan->nama_pelatihan }}</h6>
                                                    <ul class="list-unstyled text-muted small mb-3">
                                                        <li><i class="bi bi-calendar-event"></i>
                                                            {{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d M Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d M Y') }}
                                                        </li>
                                                        <li><i class="bi bi-geo-alt"></i> {{ $pelatihan->kota }},
                                                            {{ $pelatihan->tempat_pelatihan }}
                                                        </li>
                                                        <li><i class="bi bi-cash-stack"></i>
                                                            {{ $pelatihan->biaya == 0 ? 'Gratis' : 'Rp' . number_format((int) $pelatihan->biaya, 0, ',', '.') }}
                                                        </li>
                                                    </ul>
                                                    <div
                                                        class="mt-auto d-flex justify-content-between align-items-center">
                                                        <button
                                                            class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                                            onclick="showDetailPelatihanModal(
  '{{ asset('storage/' . $pelatihan->foto_pelatihan) }}',
  '{{ $pelatihan->nama_pelatihan }}',
  `{{ $pelatihan->deskripsi }}`,
  '{{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d M Y') }}',
  '{{ $pelatihan->kota }}',
  '{{ $pelatihan->tempat_pelatihan }}',
  '{{ $pelatihan->biaya == 0 ? 'Gratis' : 'Rp' . number_format((int) $pelatihan->biaya, 0, ',', '.') }}',
  {{ $pelatihan->id }}
)">
                                                            Detail
                                                        </button>




                                                        <div class="d-flex gap-2">
                                                            <button
                                                                class="btn btn-sm btn-outline-warning rounded-circle btn-icon"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editPelatihanModal"
                                                                onclick="openEditModal(this)" ...>
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </button>
                                                            <form id="deleteForm-{{ $pelatihan->id }}"
                                                                action="{{ route('mitra.pelatihan.destroy', $pelatihan->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" {{-- ubah dari submit ke button --}}
                                                                    onclick="confirmDelete({{ $pelatihan->id }})"
                                                                    class="btn btn-sm btn-outline-danger rounded-circle btn-icon">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">Belum ada pelatihan yang Anda buat.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Separator -->
                            <hr class="container my-5">

                            <!-- Pelatihan Mitra Lain -->
                            <h5 class="mb-4 fw-bold">Pelatihan dari Mitra Lain</h5>
                            <div class="sertif-container mt-4">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse($pelatihanMitraLain as $pelatihan)
                                        <div class="col">
                                            <div class="card h-100 border-0 shadow-sm">
                                                <img src="{{ asset('storage/' . $pelatihan->foto_pelatihan) }}"
                                                    class="card-img-top object-fit-cover"
                                                    alt="Foto Pelatihan {{ $pelatihan->nama_pelatihan }}"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="fw-semibold mb-1">{{ $pelatihan->nama_pelatihan }}</h6>
                                                    <ul class="list-unstyled text-muted small mb-3">
                                                        <li><i class="bi bi-calendar-event"></i>
                                                            {{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d M Y') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d M Y') }}
                                                        </li>
                                                        <li><i class="bi bi-geo-alt"></i> {{ $pelatihan->kota }},
                                                            {{ $pelatihan->tempat_pelatihan }}
                                                        </li>
                                                        <li><i class="bi bi-cash-stack"></i>
                                                            {{ $pelatihan->biaya == 0 ? 'Gratis' : 'Rp' . number_format((int) $pelatihan->biaya, 0, ',', '.') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">Belum ada pelatihan dari mitra lain.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Detail Pelatihan -->
                    <div class="modal fade" id="detailPelatihanModal" tabindex="-1"
                        aria-labelledby="detailPelatihanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content detail-modal-content shadow-lg rounded-4">
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold text-primary-emphasis"
                                        id="detailPelatihanModalLabel">
                                        <i class="bi bi-info-circle me-2"></i> Detail Pelatihan
                                    </h5>
                                </div>

                                <div class="modal-body pt-2">
                                    <div class="row gy-4">
                                        <!-- Left: Detail Pelatihan -->
                                        <div class="col-md-6">
                                            <img id="pelatihanFoto" src=""
                                                class="img-fluid rounded shadow-sm mb-3 w-100" alt="Foto Pelatihan"
                                                style="max-height: 240px; object-fit: cover;">
                                            <h4 id="pelatihanJudul" class="fw-semibold mb-2"></h4>
                                            <p id="pelatihanDeskripsi" class="text-muted"></p>
                                            <ul class="list-unstyled text-sm">
                                                <li class="mb-1"><i
                                                        class="bi bi-calendar-event me-2 text-secondary"></i><strong>Tanggal:</strong>
                                                    <span id="pelatihanTanggal"></span>
                                                </li>
                                                <li class="mb-1"><i
                                                        class="bi bi-geo-alt me-2 text-secondary"></i><strong>Lokasi:</strong>
                                                    <span id="pelatihanKota"></span>
                                                </li>
                                                <li class="mb-1"><i
                                                        class="bi bi-building me-2 text-secondary"></i><strong>Tempat:</strong>
                                                    <span id="pelatihanTempat"></span>
                                                </li>
                                                <li class="mb-1"><i
                                                        class="bi bi-cash-stack me-2 text-secondary"></i><strong>Biaya:</strong>
                                                    <span id="pelatihanBiaya"></span>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Right: Daftar Peserta -->
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h5 class="fw-semibold mb-0">Daftar Peserta</h5>
                                                <button id="btnDownloadPesertaPelatihan"
                                                    class="btn btn-sm btn-outline-success d-flex align-items-center">
                                                    <i class="bi bi-download me-1"></i> CSV
                                                </button>
                                            </div>
                                            <p class="text-muted small mb-3">Berikut adalah peserta yang terdaftar
                                                untuk pelatihan ini.</p>

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
                                                    <tbody id="pesertaPelatihanTableBody" class="small text-center">
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



                    <!-- Modal Form Tambah Pelatihan -->
                    <div class="modal fade" id="pelatihanModal" tabindex="-1" aria-labelledby="pelatihanModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                                <div class="row g-0">
                                    <!-- Ilustrasi / Informasi -->
                                    <div class="col-md-5 d-none d-md-block bg-light position-relative">
                                        <div
                                            class="h-100 d-flex flex-column justify-content-center align-items-center p-4">
                                            <h5 class="text-primary fw-bold">Tambah Pelatihan Baru</h5>
                                            <p class="text-muted text-center px-3">
                                                Publikasikan program pelatihan Anda agar alumni dapat mengembangkan
                                                keterampilan dan meningkatkan daya saing mereka.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <div class="col-md-7 bg-white">
                                        <form action="{{ route('mitra.pelatihan.store') }}" method="POST"
                                            enctype="multipart/form-data" class="p-4" id="tambahPelatihanForm">
                                            @csrf
                                            <div class="modal-header border-0 pb-0">
                                                <h5 class="modal-title fw-bold" id="pelatihanModalLabel">
                                                    <i class="bi bi-journal-text me-2 text-primary"></i>Tambah
                                                    Pelatihan
                                                </h5>
                                            </div>
                                            <div class="modal-body overflow-auto" style="max-height: 65vh;">
                                                <div class="mb-3">
                                                    <label for="nama_pelatihan" class="form-label">Judul
                                                        Pelatihan</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-card-text"></i></span>
                                                        <input type="text" class="form-control"
                                                            id="nama_pelatihan" name="nama_pelatihan"
                                                            placeholder="Contoh: Pelatihan UI/UX Designer" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                        placeholder="Jelaskan pelatihan ini secara singkat..." required></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="tanggal_mulai" class="form-label">Waktu
                                                            Mulai</label>
                                                        <input type="date" class="form-control" id="tanggal_mulai"
                                                            name="tanggal_mulai" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="tanggal_selesai" class="form-label">Waktu
                                                            Selesai</label>
                                                        <input type="date" class="form-control"
                                                            id="tanggal_selesai" name="tanggal_selesai" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="kota" class="form-label">Kota
                                                            Penyelenggaraan</label>
                                                        <input type="text" class="form-control" id="kota"
                                                            name="kota" placeholder="Contoh: Bandung" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="tempat_pelatihan" class="form-label">Tempat
                                                            Penyelenggaraan</label>
                                                        <input type="text" class="form-control"
                                                            id="tempat_pelatihan" name="tempat_pelatihan"
                                                            placeholder="Contoh: Gedung Serbaguna" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status Pelatihan</label>
                                                    <select class="form-select" id="status" name="status"
                                                        required onchange="toggleBiayaPelatihan()">
                                                        <option value="Berbayar">Berbayar</option>
                                                        <option value="Gratis" selected>Gratis</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3" id="biayaPelatihanGroup">
                                                    <label for="biaya" class="form-label">Biaya Pelatihan
                                                        (Rp)</label>
                                                    <input type="number" class="form-control" id="biaya"
                                                        name="biaya" placeholder="Contoh: 150000">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto_pelatihan" class="form-label">Upload Foto
                                                        Pelatihan</label>
                                                    <input type="file" class="form-control" id="foto_pelatihan"
                                                        name="foto_pelatihan" accept=".jpg,.jpeg,.png" required>
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="confirmTambahPelatihan()">Simpan
                                                        Pelatihan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Form Edit Pelatihan -->
                    <div class="modal fade" id="editPelatihanModal" tabindex="-1"
                        aria-labelledby="editPelatihanModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content edit-modal-content">
                                <form id="editForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-semibold text-primary-emphasis">
                                            <i class="bi bi-pencil-square me-2"></i>Edit Pelatihan
                                        </h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row gx-4 gy-3">
                                            <!-- Left Column -->
                                            <div class="col-lg-6">
                                                <input type="hidden" id="edit_id">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Judul Pelatihan</label>
                                                    <input type="text" class="form-control edit-input"
                                                        id="edit_nama_pelatihan" name="nama_pelatihan"
                                                        placeholder="Contoh: Pelatihan Digital Marketing" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control edit-input" id="edit_deskripsi" name="deskripsi" rows="4"
                                                        placeholder="Tulis penjelasan pelatihan secara ringkas..." required></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Tanggal Mulai</label>
                                                        <input type="date" class="form-control edit-input"
                                                            id="edit_tanggal_mulai" name="tanggal_mulai" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Tanggal Selesai</label>
                                                        <input type="date" class="form-control edit-input"
                                                            id="edit_tanggal_selesai" name="tanggal_selesai" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column -->
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Kota</label>
                                                    <input type="text" class="form-control edit-input"
                                                        id="edit_kota" name="kota" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Tempat</label>
                                                    <input type="text" class="form-control edit-input"
                                                        id="edit_tempat_pelatihan" name="tempat_pelatihan" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Status Pelatihan</label>
                                                    <select class="form-select edit-input" id="edit_status"
                                                        name="status" onchange="toggleBiayaField(this)" required>
                                                        <option value="Berbayar">Berbayar</option>
                                                        <option value="Gratis">Gratis</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-3" id="edit_biaya_wrapper">
                                                    <label class="form-label">Biaya (Rp)</label>
                                                    <input type="text" class="form-control edit-input"
                                                        id="edit_biaya" name="biaya" oninput="formatRupiah(this)">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label">Upload Foto Pelatihan (Opsional)</label>
                                                    <input type="file" class="form-control edit-input"
                                                        id="edit_foto_pelatihan" name="foto_pelatihan"
                                                        accept=".jpg,.jpeg,.png"
                                                        onchange="previewImage(this, 'preview_foto_edit')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="confirmEditPelatihan()">Perbarui</button>
                                    </div>
                                </form>
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
                                    mitraskul.Id adalah platform yang menghubungkan alumni dengan sekolah, dunia
                                    industri,
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
                                    <img src="{{ url('img/pu.png') }}" alt="PUP Makassar"
                                        class="partner-footer-logo">
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

                function confirmTambahPelatihan() {
                    Swal.fire({
                        title: 'Simpan Pelatihan?',
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
                        text: "Data pelatihan akan dihapus permanen!",
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

                function confirmEditPelatihan() {
                    Swal.fire({
                        title: 'Perbarui Pelatihan?',
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
                    document.getElementById('editForm').action = `/public/mitra/update-pelatihan/${id}`;
                }

                function formatRupiah(input) {
                    let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                    let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambah titik setiap 3 digit dari belakang
                    input.value = formatted;
                }

                function toggleBiayaPelatihan() {
                    const status = document.getElementById('status').value;
                    const biayaGroup = document.getElementById('biayaPelatihanGroup');
                    if (status === 'Berbayar') {
                        biayaGroup.style.display = 'block';
                        document.getElementById('biaya').setAttribute('required', 'required');
                    } else {
                        biayaGroup.style.display = 'none';
                        document.getElementById('biaya').removeAttribute('required');
                    }
                }

                // Inisialisasi tampilan awal saat modal dibuka
                document.addEventListener('DOMContentLoaded', function() {
                    toggleBiayaPelatihan();
                });

                function showDetailPelatihanModal(foto, judul, deskripsi, tanggal, kota, tempat, biaya, id) {
                    document.getElementById('pelatihanFoto').src = foto;
                    document.getElementById('pelatihanJudul').textContent = judul;
                    document.getElementById('pelatihanDeskripsi').textContent = deskripsi;
                    document.getElementById('pelatihanTanggal').textContent = tanggal;
                    document.getElementById('pelatihanKota').textContent = kota;
                    document.getElementById('pelatihanTempat').textContent = tempat;
                    document.getElementById('pelatihanBiaya').textContent = biaya;

                    const tbody = document.getElementById('pesertaPelatihanTableBody');
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted">Memuat data peserta...</td></tr>';

                    fetch(`/pelatihan/${id}/peserta`)
                        .then(response => response.json())
                        .then(data => {
                            tbody.innerHTML = '';
                            if (data.length === 0) {
                                tbody.innerHTML =
                                    '<tr><td colspan="4" class="text-center text-muted">Belum ada peserta.</td></tr>';
                            } else {
                                data.forEach((p, i) => {
                                    tbody.innerHTML += `
            <tr>
              <td>${i + 1}</td>
              <td>${p.nama}</td>
              <td>${p.email}</td>
              <td>${p.telepon}</td>
            </tr>
          `;
                                });
                            }
                        });

                    // Modal ID untuk pelatihan
                    const modal = new bootstrap.Modal(document.getElementById('detailPelatihanModal'));
                    modal.show();
                }

                function toggleBiayaField(select) {
                    const wrapper = document.getElementById('edit_biaya_wrapper');
                    if (select.value === 'Gratis') {
                        wrapper.style.display = 'none';
                        document.getElementById('edit_biaya').value = '';
                    } else {
                        wrapper.style.display = 'block';
                    }
                }

                function formatRupiah(input) {
                    let value = input.value.replace(/\D/g, '');
                    input.value = new Intl.NumberFormat('id-ID').format(value);
                }

                function previewImage(input, targetId) {
                    const file = input.files[0];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(targetId).src = e.target.result;
                    };
                    if (file) reader.readAsDataURL(file);
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
