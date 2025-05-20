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

        .navbar .logo {
            width: 120px;
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

        .certificate-card {
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 360px;
        }

        .certificate-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
        }

        .certificate-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            padding-top: 10px;
        }

        .certificate-content {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .certificate-title {
            font-size: 1rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .certificate-provider {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .certificate-date {
            font-size: 0.8rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }

        .btn-view {
            align-self: start;
            background-color: #0a66c2;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: none !important;
        }

        .btn-view:hover {
            background-color: #0a66c2;
            color: #fff;
            text-decoration: none;
            transform: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="col-lg-6 d-flex gap-4">
            <div class="col-lg-2">
                <img src="{{ url('img/logo.png') }}" alt="Logo" class="logo" width="" />
            </div>
            <div class="col-lg-2">
                <img src="{{ url('img/pu.jpeg') }}" alt="Logo" class="logo" width="" />
            </div>
        </div>
        <div class="user-info">
            <span>Halo User</span>
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
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('alumni-siswa.index') }}"><i
                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('alumni-siswa.sertifikasi') }}"><i
                    class="bi bi-patch-check-fill me-2"></i>Sertifikasi</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('alumni-siswa.loker') }}"><i
                    class="bi bi-briefcase-fill me-2"></i>Loker</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('alumni-siswa.pelatihan') }}"><i
                    class="bi bi-journal-text me-2"></i>Pelatihan</a>
            <a class="d-block mb-2 text-dark fw-semibold" href="{{ route('alumni-siswa.profile') }}"><i
                    class="bi bi-person-fill me-2"></i>Profil</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout</a>
            </form>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="sidebar">
            <a class="text-secondary" href="{{ route('alumni-siswa.index') }}"><i
                    class="bi bi-house-door-fill me-2"></i>Beranda</a>
            <a class="text-secondary" href="{{ route('alumni-siswa.sertifikasi') }}"><i
                    class="bi bi-patch-check-fill me-2"></i>Sertifikasi</a>
            <a class="text-secondary" href="{{ route('alumni-siswa.loker') }}"><i
                    class="bi bi-briefcase-fill me-2"></i>Loker</a>
            <a class="text-secondary" href="{{ route('alumni-siswa.pelatihan') }}"><i
                    class="bi bi-journal-text me-2"></i>Pelatihan</a>
            <a class="text-secondary" href="{{ route('alumni-siswa.profile') }}"><i
                    class="bi bi-person-fill me-2"></i>Profil</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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

            <div class="main-content px-5 py-3">
                <div class="row">

                    <div class="col-lg-12">
                        {{-- Alert Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-{{ session('alert-type') ?? 'info' }} alert-dismissible fade show"
                                role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <input type="text" class="form-control search-bar" placeholder="Cari Tipe" />

                        <div class="row g-4">
                            @foreach ($loker as $item)
                                <div class="col-md-4 d-flex justify-content-center">
                                    <div class="certificate-card">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto Lowongan"
                                            class="certificate-img">

                                        <div class="certificate-content">
                                            <h3 class="certificate-title">{{ $item->posisi }}</h3>

                                            <p class="certificate-provider">
                                                <strong>Perusahaan:</strong> {{ $item->nama_perusahaan }}
                                            </p>

                                            <p class="certificate-provider">
                                                <strong>Lokasi:</strong> {{ $item->lokasi }}
                                            </p>

                                            <p class="certificate-provider">
                                                <strong>Jenis Pekerjaan:</strong> {{ $item->tipe }}
                                            </p>

                                            <p class="certificate-provider">
                                                <strong>Pendidikan:</strong> {{ $item->pendidikan }}
                                            </p>

                                            <p class="certificate-provider">
                                                <strong>Gaji:</strong> Rp{{ number_format($item->gaji, 0, ',', '.') }}
                                            </p>

                                            {{-- Tombol Detail dan Daftar --}}
                                            <div class="d-flex gap-2 mt-3 justify-content-between">
                                                <a href="#" class="btn-view" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $item->id }}">Detail</a>
                                                <button type="button" class="btn-view" data-bs-toggle="modal"
                                                    data-bs-target="#daftarModal{{ $item->id }}">Daftar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- Modal Detail --}}
                                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content p-4">
                                            <h5 class="modal-title mb-3">{{ $item->posisi }} -
                                                {{ $item->nama_perusahaan }}</h5>
                                            <p><strong>Deskripsi:</strong></p>
                                            <p>{{ $item->deskripsi }}</p>
                                            <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
                                            <p><strong>Jenis Pekerjaan:</strong> {{ $item->tipe }}</p>
                                            <p><strong>Pendidikan:</strong> {{ $item->pendidikan }}</p>
                                            <p><strong>Gaji:</strong> Rp{{ number_format($item->gaji, 0, ',', '.') }}
                                            </p>
                                            <button type="button" class="btn btn-secondary mt-3"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Daftar dengan Upload CV -->
                                <div class="modal fade" id="daftarModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="daftarModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-4">
                                            <h5 class="modal-title" id="daftarModalLabel{{ $item->id }}">Unggah
                                                CV - {{ $item->nama_perusahaan }}</h5>
                                            <form action="{{ route('alumni-siswa.loker.store', $item->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="sertifikasi_id"
                                                    value="{{ $item->id }}">

                                                <div class="mb-3">
                                                    <label for="cv{{ $item->id }}" class="form-label">Upload CV
                                                        (PDF)
                                                    </label>
                                                    <input type="file" name="cv" id="cv{{ $item->id }}"
                                                        class="form-control" accept=".pdf" required>
                                                </div>

                                                <div class="d-flex justify-content-end gap-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
    </script>

</body>

</html>
