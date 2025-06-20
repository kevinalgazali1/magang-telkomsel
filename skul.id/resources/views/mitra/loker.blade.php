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

        .main-content {
            width: 100%;
        }

        .right-section {
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
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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

        /* ============ Navbar ============ */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            width: 80px;
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

        .card.loker-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .card.loker-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .card.loker-card img {
            transition: transform 0.3s ease;
        }

        .card.loker-card:hover img {
            transform: scale(1.03);
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

        .modal-content {
            max-height: 90vh;
            overflow: hidden;
            animation: fadeInUp 0.3s ease-in-out;
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
                                    <h2 class="fw-bold mb-1">Kelola Lowongan Kerja</h2>
                                    <p class="text-muted">Tambah dan kelola lowongan kerja untuk alumni dari mitra Anda.
                                    </p>
                                </div>
                            </div>

                            <!-- Tombol Tambah Lowongan Kerja -->
                            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#lokerModal">+
                                Tambah Lowongan Kerja</button>

                            <hr class="container my-5">

                            <h5 class="mb-4 fw-bold">Lowongan Kerja Anda</h5>
                            <div class="sertif-container">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse($lokerMitraSendiri as $loker)
                                        <div class="col">
                                            <div class="card loker-card h-100 border-0 shadow-sm">
                                                <img src="{{ asset('storage/' . $loker->gambar) }}"
                                                    class="card-img-top object-fit-cover"
                                                    alt="Foto Loker {{ $loker->nama_perusahaan }}"
                                                    style="height: 200px; object-fit: cover;">

                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="fw-semibold mb-1">{{ $loker->posisi }}</h6>

                                                    <ul class="list-unstyled text-muted sertif-info mb-3 small">
                                                        <li><i class="bi bi-building"></i>
                                                            {{ $loker->nama_perusahaan }}
                                                        </li>
                                                        <li><i class="bi bi-cash-stack"></i> {{ $loker->gaji }}</li>
                                                    </ul>

                                                    <div
                                                        class="mt-auto d-flex justify-content-between align-items-center">
                                                        <button
                                                            class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                                            onclick="showLokerDetailModal(
                                                                                                        '{{ asset('storage/' . $loker->gambar) }}',
                                                                                                        '{{ $loker->posisi }}',
                                                                                                        `{{ $loker->deskripsi }}`,
                                                                                                        '{{ $loker->nama_perusahaan }}',
                                                                                                        '{{ $loker->lokasi }}',
                                                                                                        '{{ $loker->tipe }}',
                                                                                                        '{{ $loker->pendidikan }}',
                                                                                                        '{{ $loker->gaji }}'
                                                                                                    )">
                                                            Detail
                                                        </button>

                                                        <div class="d-flex gap-2">
                                                            <button
                                                                class="btn btn-sm btn-outline-warning rounded-circle btn-icon"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editLokerModal"
                                                                data-id="{{ $loker->id }}"
                                                                data-nama_perusahaan="{{ $loker->nama_perusahaan }}"
                                                                data-deskripsi="{{ $loker->deskripsi }}"
                                                                data-posisi="{{ $loker->posisi }}"
                                                                data-lokasi="{{ $loker->lokasi }}"
                                                                data-tipe="{{ $loker->tipe }}"
                                                                data-pendidikan="{{ $loker->pendidikan }}"
                                                                data-gaji="{{ $loker->gaji }}"
                                                                data-gambar="{{ asset('storage/' . $loker->gambar) }}"
                                                                onclick="openEditModal(this)">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </button>

                                                            <form id="deleteForm-{{ $loker->id }}"
                                                                action="{{ route('mitra.loker.destroy', $loker->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" {{-- ubah type ke button, bukan submit --}}
                                                                    onclick="confirmDelete({{ $loker->id }})"
                                                                    class="btn btn-sm btn-outline-danger rounded-circle btn-icon">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="lokerDetailModal" tabindex="-1"
                                            aria-labelledby="lokerDetailModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content shadow-lg rounded-4">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-primary-emphasis"
                                                            id="lokerDetailModalLabel">
                                                            <i class="bi bi-info-circle me-2"></i> Detail Lowongan
                                                            Kerja
                                                        </h5>
                                                    </div>

                                                    <div class="modal-body pt-2">
                                                        <div class="row gy-4">
                                                            <!-- Left: Detail Lowongan -->
                                                            <div class="col-md-6">
                                                                <img id="lokerDetailFoto" src=""
                                                                    class="img-fluid rounded shadow-sm mb-3 w-100"
                                                                    alt="Foto Perusahaan"
                                                                    style="max-height: 240px; object-fit: cover;">
                                                                <h4 id="lokerDetailPosisi" class="fw-semibold mb-2">
                                                                </h4>
                                                                <p id="lokerDetailDeskripsi" class="text-muted"></p>
                                                                <ul class="list-unstyled text-sm">
                                                                    <li class="mb-1">
                                                                        <i
                                                                            class="bi bi-building me-2 text-secondary"></i>
                                                                        <strong>Perusahaan:</strong> <span
                                                                            id="lokerDetailPerusahaan"></span>
                                                                    </li>
                                                                    <li class="mb-1">
                                                                        <i
                                                                            class="bi bi-geo-alt me-2 text-secondary"></i>
                                                                        <strong>Lokasi:</strong> <span
                                                                            id="lokerDetailLokasi"></span>
                                                                    </li>
                                                                    <li class="mb-1">
                                                                        <i
                                                                            class="bi bi-briefcase me-2 text-secondary"></i>
                                                                        <strong>Tipe:</strong> <span
                                                                            id="lokerDetailTipe"></span>
                                                                    </li>
                                                                    <li class="mb-1">
                                                                        <i
                                                                            class="bi bi-mortarboard me-2 text-secondary"></i>
                                                                        <strong>Pendidikan:</strong> <span
                                                                            id="lokerDetailPendidikan"></span>
                                                                    </li>
                                                                    <li class="mb-1">
                                                                        <i
                                                                            class="bi bi-cash-stack me-2 text-secondary"></i>
                                                                        <strong>Gaji:</strong> <span
                                                                            id="lokerDetailGaji"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <!-- Right: Placeholder Daftar Pelamar -->
                                                            <div class="col-md-6">
                                                                <h5 class="fw-semibold mb-2">Daftar Pelamar</h5>
                                                                <p class="text-muted small mb-3">Data pelamar yang
                                                                    telah mendaftar untuk
                                                                    lowongan ini.</p>
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table table-sm table-hover table-striped align-middle mb-0">
                                                                        <thead class="table-light text-center">
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Nama</th>
                                                                                <th>Email</th>
                                                                                <th>CV</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="pesertaTableBody">
                                                                            <tr>
                                                                                <td colspan="4"
                                                                                    class="text-muted fst-italic">
                                                                                    Memuat data...</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer border-top-0 pt-3">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bi bi-x-circle me-1"></i> Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">Belum ada Lowongan Kerja yang Anda buat.</p>
                                    @endforelse
                                </div>
                            </div>
                            {{-- Loker Mitra Lain --}}
                            <hr class="container my-5">
                            <h5 class="mb-4 fw-bold">Lowongan Kerja dari Mitra Lain</h5>
                            <div class="sertif-container mt-4">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @forelse($lokerMitraLain as $loker)
                                        <div class="col">
                                            <div class="card loker-card h-100 border-0 shadow-sm">
                                                <img src="{{ asset('storage/' . $loker->gambar) }}"
                                                    class="card-img-top object-fit-cover"
                                                    alt="Foto Loker {{ $loker->nama_perusahaan }}"
                                                    style="height: 200px; object-fit: cover;">

                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="fw-semibold mb-1">{{ $loker->posisi }}</h6>

                                                    <ul class="list-unstyled text-muted sertif-info mb-3 small">
                                                        <li><i class="bi bi-building"></i>
                                                            {{ $loker->nama_perusahaan }}
                                                        </li>
                                                        <li><i class="bi bi-briefcase"></i> {{ $loker->tipe }}</li>
                                                        <li><i class="bi bi-cash-stack"></i> {{ $loker->gaji }}</li>
                                                    </ul>

                                                    {{-- Bisa tambahkan tombol detail jika dibutuhkan --}}
                                                    {{-- <button
                                                        class="btn btn-sm btn-outline-primary rounded-pill mt-auto px-3">Lihat
                                                        Detail</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">Belum ada Lowongan Kerja dari mitra lain.</p>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal Form Tambah Loker -->
                    <div class="modal fade" id="lokerModal" tabindex="-1" aria-labelledby="lokerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden"
                                style="max-height: 90vh;">
                                <div class="row g-0 h-100">
                                    <!-- Kolom Ilustrasi -->
                                    <div class="col-md-5 d-none d-md-block bg-light position-relative">
                                        <div
                                            class="h-100 d-flex flex-column justify-content-center align-items-center p-4">
                                            <h5 class="text-primary fw-bold">Tambah Lowongan Kerja</h5>
                                            <p class="text-muted text-center px-3">
                                                Posting lowongan kerja untuk menjangkau lebih banyak kandidat yang
                                                berkualitas dan sesuai dengan kebutuhan perusahaan Anda.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Kolom Form -->
                                    <div class="col-md-7 bg-white d-flex flex-column">
                                        <form action="{{ route('mitra.loker.store') }}" method="POST"
                                            enctype="multipart/form-data" class="d-flex flex-column h-100"
                                            id="tambahLokerForm">
                                            @csrf

                                            <!-- Header -->
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold" id="lokerModalLabel">
                                                    <i class="bi bi-briefcase-fill me-2 text-primary"></i>Tambah
                                                    Lowongan
                                                </h5>
                                            </div>

                                            <!-- Body scrollable -->
                                            <div class="modal-body overflow-auto" style="max-height: 65vh;">
                                                <!-- 👇 Masukkan semua input form kamu di sini -->
                                                <div class="mb-3">
                                                    <label for="nama_perusahaan" class="form-label">Nama
                                                        Perusahaan</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-building"></i></span>
                                                        <input type="text" class="form-control"
                                                            id="nama_perusahaan" name="nama_perusahaan"
                                                            value="{{ auth()->user()->mitraProfile->nama_instansi }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi
                                                        Pekerjaan</label>
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

                                                <div class="mb-3">
                                                    <label for="tipe" class="form-label">Tipe Pekerjaan</label>
                                                    <select class="form-select" name="tipe" required>
                                                        <option value="">Pilih Tipe</option>
                                                        <option value="freelance">Freelance</option>
                                                        <option value="magang">Magang</option>
                                                        <option value="part time">Part Time</option>
                                                        <option value="full time">Full Time</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pendidikan" class="form-label">Pendidikan
                                                        Terakhir</label>
                                                    <input type="text" class="form-control" id="pendidikan"
                                                        name="pendidikan" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Rentang Gaji (Rp)</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" class="form-control"
                                                                id="gaji_min_view" placeholder="Minimum" required>
                                                            <input type="hidden" name="gaji_min" id="gaji_min">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control"
                                                                id="gaji_max_view" placeholder="Maksimum" required>
                                                            <input type="hidden" name="gaji_max" id="gaji_max">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Upload Foto
                                                        Perusahaan</label>
                                                    <input type="file" class="form-control" id="gambar"
                                                        name="gambar" accept=".jpg,.jpeg,.png" required>
                                                </div>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="confirmTambahLoker()">Simpan Lowongan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Form Edit loker -->
                    <div class="modal fade" id="editLokerModal" tabindex="-1" aria-labelledby="editLokerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content edit-modal-content">
                                <form id="editForm" method="POST" enctype="multipart/form-data" action="{{ url('/mitra/update-loker/' . $loker->id) }}"
                                    onsubmit="return validateGajiEdit()">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-semibold text-primary-emphasis">
                                            <i class="bi bi-pencil-square me-2"></i>Edit Lowongan Kerja
                                        </h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row gx-4 gy-3">
                                            <!-- Left Section -->
                                            <div class="col-lg-6">
                                                <input type="hidden" id="edit_id">

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Perusahaan</label>
                                                    <input type="text" class="form-control"
                                                        id="edit_nama_perusahaan" name="nama_perusahaan" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Pendidikan</label>
                                                    <input type="text" class="form-control" id="edit_pendidikan"
                                                        name="pendidikan" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Upload Gambar (Opsional)</label>
                                                    <input type="file" class="form-control" id="edit_gambar"
                                                        name="gambar" accept=".jpg,.jpeg,.png"
                                                        onchange="previewImageEdit(this)">
                                                </div>
                                            </div>

                                            <!-- Right Section -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Posisi</label>
                                                    <input type="text" class="form-control" id="edit_posisi"
                                                        name="posisi" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Lokasi</label>
                                                    <input type="text" class="form-control" id="edit_lokasi"
                                                        name="lokasi" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tipe Pekerjaan</label>
                                                    <select class="form-select" name="tipe" id="edit_tipe"
                                                        required>
                                                        <option value="freelance">Freelance</option>
                                                        <option value="magang">Magang</option>
                                                        <option value="part time">Part Time</option>
                                                        <option value="full time">Full Time</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Rentang Gaji (Rp)</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" class="form-control"
                                                                id="edit_gaji_min_view" placeholder="Minimum" required
                                                                oninput="formatRupiah(this)">
                                                            <input type="hidden" name="gaji_min" id="edit_gaji_min">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control"
                                                                id="edit_gaji_max_view" placeholder="Maksimum"
                                                                required oninput="formatRupiah(this)">
                                                            <input type="hidden" name="gaji_max" id="edit_gaji_max">
                                                        </div>
                                                    </div>
                                                    <small id="gajiErrorEdit" class="text-danger d-none">Gaji maksimum
                                                        harus lebih besar dari minimum.</small>
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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function parseRupiah(str) {
                return parseInt(str.replace(/\D/g, ''), 10) || 0;
            }

            function formatToRupiahInput(input) {
                let angka = parseRupiah(input.value);
                input.value = angka ? 'Rp ' + new Intl.NumberFormat('id-ID').format(angka) : '';
            }

            function previewImageEdit(input) {
                const preview = document.getElementById('preview_gambar_edit');
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = e => preview.src = e.target.result;
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // VALIDASI UNTUK TAMBAH DAN EDIT
            function validateGajiForm(minId, maxId, minHiddenId, maxHiddenId) {
                const minInput = document.getElementById(minId);
                const maxInput = document.getElementById(maxId);

                const min = parseRupiah(minInput.value);
                const max = parseRupiah(maxInput.value);

                if (isNaN(min) || isNaN(max)) {
                    minInput.setCustomValidity("Gaji harus berupa angka.");
                    maxInput.setCustomValidity("Gaji harus berupa angka.");
                    return;
                } else {
                    minInput.setCustomValidity("");
                    maxInput.setCustomValidity("");
                }

                document.getElementById(minHiddenId).value = min;
                document.getElementById(maxHiddenId).value = max;

                if (max <= min) {
                    maxInput.setCustomValidity("Gaji maksimum harus lebih besar dari minimum.");
                } else {
                    maxInput.setCustomValidity("");
                }
            }


            // FORM TAMBAH
            const tambahForm = document.getElementById("tambahLokerForm");
            tambahForm?.addEventListener("submit", function(e) {
                validateGajiForm('gaji_min_view', 'gaji_max_view', 'gaji_min', 'gaji_max');
                if (!this.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.classList.add('was-validated');
                }
            });

            // FORM EDIT
            const editForm = document.getElementById("editForm");
            editForm?.addEventListener("submit", function(e) {
                validateGajiForm('edit_gaji_min_view', 'edit_gaji_max_view', 'edit_gaji_min', 'edit_gaji_max');
                if (!this.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    this.classList.add('was-validated');
                }
            });

            // INPUT EVENT UNTUK TAMBAH
            ['gaji_min_view', 'gaji_max_view'].forEach(id => {
                const input = document.getElementById(id);
                input?.addEventListener("input", () => {
                    formatToRupiahInput(input);
                    validateGajiForm('gaji_min_view', 'gaji_max_view', 'gaji_min', 'gaji_max');
                });
            });

            // INPUT EVENT UNTUK EDIT
            ['edit_gaji_min_view', 'edit_gaji_max_view'].forEach(id => {
                const input = document.getElementById(id);
                input?.addEventListener("input", () => {
                    formatToRupiahInput(input);
                    validateGajiForm('edit_gaji_min_view', 'edit_gaji_max_view', 'edit_gaji_min',
                        'edit_gaji_max');
                });
            });

            function confirmTambahLoker() {
                Swal.fire({
                    title: 'Simpan Lowongan?',
                    text: "Pastikan semua informasi sudah benar.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#6c757d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        tambahForm.requestSubmit();
                    }
                });
            }

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Lowongan kerja akan dihapus permanen!",
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
                    title: 'Perbarui Lowongan Kerja?',
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

            function showLokerDetailModal(foto, posisi, deskripsi, perusahaan, lokasi, tipe, pendidikan, gaji) {
                document.getElementById('lokerDetailFoto').src = foto;
                document.getElementById('lokerDetailPosisi').innerText = posisi;
                document.getElementById('lokerDetailDeskripsi').innerText = deskripsi;
                document.getElementById('lokerDetailPerusahaan').innerText = perusahaan;
                document.getElementById('lokerDetailLokasi').innerText = lokasi;
                document.getElementById('lokerDetailTipe').innerText = tipe;
                document.getElementById('lokerDetailPendidikan').innerText = pendidikan;
                document.getElementById('lokerDetailGaji').innerText = gaji;

                new bootstrap.Modal(document.getElementById('lokerDetailModal')).show();
            }

            function openEditModal(button) {
                const id = button.dataset.id;
                const nama_perusahaan = button.dataset.nama_perusahaan;
                const deskripsi = button.dataset.deskripsi;
                const posisi = button.dataset.posisi;
                const lokasi = button.dataset.lokasi;
                const tipe = button.dataset.tipe;
                const pendidikan = button.dataset.pendidikan;
                const gaji = button.dataset.gaji;
                const gambar = button.dataset.gambar;

                setGajiInputs(gaji);


                document.getElementById('edit_id').value = id;
                document.getElementById('edit_nama_perusahaan').value = nama_perusahaan;
                document.getElementById('edit_deskripsi').value = deskripsi;
                document.getElementById('edit_posisi').value = posisi;
                document.getElementById('edit_lokasi').value = lokasi;
                document.getElementById('edit_tipe').value = tipe;
                document.getElementById('edit_pendidikan').value = pendidikan;


                document.getElementById('preview_gambar_edit').src = gambar;

                document.getElementById('editForm').action = `/public/mitra/update-loker/${id}`;
            }

            function setGajiInputs(gajiRange) {
                // gajiRange contoh: "Rp 10.000 - Rp 100.000"
                const regex = /Rp\s*([\d\.]+)\s*-\s*Rp\s*([\d\.]+)/;
                const match = gajiRange.match(regex);

                if (match) {
                    const gajiMinText = `Rp ${match[1]}`;
                    const gajiMaxText = `Rp ${match[2]}`;
                    const gajiMinNumber = parseInt(match[1].replace(/\./g, ''));
                    const gajiMaxNumber = parseInt(match[2].replace(/\./g, ''));

                    // Tampilkan dalam input view
                    document.getElementById('edit_gaji_min_view').value = gajiMinText;
                    document.getElementById('edit_gaji_max_view').value = gajiMaxText;

                    // Simpan dalam input hidden
                    document.getElementById('edit_gaji_min').value = gajiMinNumber;
                    document.getElementById('edit_gaji_max').value = gajiMaxNumber;
                } else {
                    console.warn("Format gaji tidak cocok:", gajiRange);
                }
            }

            // Alert Timeout
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 300);
                }
            }, 5000);
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lokerId = {{ $loker->id }}; // pastikan variabel ini tersedia di Blade
                const tableBody = document.getElementById('pesertaTableBody');

                fetch(`/loker/${lokerId}/peserta`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = ''; // kosongkan isi awal

                        if (data.length === 0) {
                            tableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="text-muted fst-italic">Belum ada pelamar</td>
                        </tr>`;
                            return;
                        }

                        data.forEach((pelamar, index) => {
                            tableBody.innerHTML += `
        <tr>
            <td>${index + 1}</td>
            <td>${pelamar.nama_lengkap}</td>
            <td>${pelamar.email}</td>
            <td>
                <a href="/storage/assets/cv/${pelamar.cv}" target="_blank"
                    class="btn btn-sm btn-outline-primary">Lihat CV</a>
            </td>
        </tr>`;
                        });

                    })
                    .catch(error => {
                        console.error('Gagal memuat data pelamar:', error);
                        tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-danger">Gagal memuat data.</td>
                    </tr>`;
                    });
            });
        </script>


</body>

</html>
