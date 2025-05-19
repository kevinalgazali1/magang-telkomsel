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

            .user-info {
                display: none;
            }
        }

        /* ============ Responsive ============ */
        @media (max-width: 768px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                display: none;
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

            .user-info {
                display: none;
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
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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

            <div class="container-fluid mt-5">
                <div id="fitur">
                    <h5 class="mb-4 fw-semibold">Fitur Utama :</h5>
                    <div class="row gx-4 gy-4 mb-4">
                        <div class="col-md-4">
                            <a href="{{ route('alumni-siswa.sertifikasi') }}">
                                <div class="feature-card sertifikasi h-100">
                                    <div class="feature-content">
                                        <div class="feature-title">Sertifikasi</div>
                                        <p>Perkuat kredensialmu dengan sertifikasi profesional.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('alumni-siswa.loker') }}">
                                <div class="feature-card loker h-100">
                                    <div class="feature-content">
                                        <div class="feature-title">Loker</div>
                                        <p>Temukan pekerjaan yang sesuai dengan minat dan keahlianmu.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('alumni-siswa.pelatihan') }}">
                                <div class="feature-card pelatihan h-100">
                                    <div class="feature-content">
                                        <div class="feature-title">Pelatihan</div>
                                        <p>Ikuti pelatihan untuk meningkatkan kompetensimu.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row gx-4 gy-4">
                        <div class="col-md-6">
                            <a href="{{ route('alumni-siswa.ikatan') }}">
                                <div class="feature-card alumni h-100">
                                    <div class="feature-content">
                                        <div class="feature-title">Ikatan Alumni</div>
                                        <p>Bangun koneksi dengan sesama alumni dari sekolahmu.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('alumni-siswa.kuliah') }}">
                                <div class="feature-card magang h-100">
                                    <div class="feature-content">
                                        <div class="feature-title">Kuliah</div>
                                        <p>Informasi dan panduan kuliah di berbagai universitas Indonesia.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h5 class="mb-4 mt-5 fw-semibold">Fitur Add-On :</h5>
                    <div class="row gx-4 gy-4 mb-4 text-center">
                        <div class="col-6 col-md-2">
                            <a href="{{ route('alumni-siswa.artikel') }}" class="text-decoration-none text-dark">
                                <div>
                                    <i class="bi bi-file-earmark-text-fill fs-1 text-danger"></i>
                                    <div class="mt-2 fw-semibold">Artikel</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <a href="{{ route('alumni-siswa.ebook') }}" class="text-decoration-none text-dark">
                                <div>
                                    <i class="bi bi-book-half fs-1 text-primary"></i>
                                    <div class="mt-2 fw-semibold">E-Book</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <a href="{{ route('alumni-siswa.jelajah') }}" class="text-decoration-none text-dark">
                                <div>
                                    <i class="bi bi-globe-americas fs-1 text-warning"></i>
                                    <div class="mt-2 fw-semibold">Jelajah Skul.id</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <a href="https://www.telkomsel.com/shops/digital-product/package?utm_source=wec&utm_medium=skulbanner&utm_campaign=EPskul&utm_id=EPskul&embed=on&msisdn=&type=Kamu%20Banget&category=&roaming=&service=&sort=lowest-price&minPrice=&maxPrice=&quota="
                                class="text-decoration-none text-dark" target="_blank">
                                <div>
                                    <i class="bi bi-wifi fs-1 text-info"></i>
                                    <div class="mt-2 fw-semibold">Pulsa & Internet</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <a href="https://account.schoters.com/en/login?redirect_url=https%3A%2F%2Facademy.schoters.com%2Fdemo%2Fclaim%3Fcode%3Dschotersskulid&client_id=schoters&view=login"
                                class="text-decoration-none text-dark" target="_blank">
                                <div>
                                    <i class="bi bi-mortarboard-fill fs-1 text-success"></i>
                                    <div class="mt-2 fw-semibold">Beasiswaku</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Voucher Games Section -->
                    <div class="container-fluid my-5">
                        <h5 class="text-danger fw-semibold py-1 mt-10">
                            <i class="bi bi-controller me-2"></i>VOUCHER GAMES
                        </h5>
                        <p class="text-muted">Upgrade karakter game kamu dengan beli vouchernya!</p>
                        <div class="d-flex flex-wrap align-items-center gap-4 mt-3 mb-5">
                            <a href="https://duniagames.co.id/top-up/item/mobile-legends" target="_blank">
                                <img src="img/mlbb.png" alt="Mobile Legends" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                            <a href="https://duniagames.co.id/top-up/item/call-of-duty-mobile" target="_blank">
                                <img src="img/codm.png" alt="COD Mobile" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                            <a href="https://duniagames.co.id/top-up/item/razer-gold" target="_blank">
                                <img src="img/zepeto.png" alt="Zepeto Gold" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                            <a href="https://duniagames.co.id/top-up/item/google-play" target="_blank">
                                <img src="img/googleplay.png" alt="Google Play" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                            <a href="https://duniagames.co.id/top-up/item/aov" target="_blank">
                                <img src="img/aov.png" alt="AOV" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                            <a href="https://duniagames.co.id/top-up/item/freefire" target="_blank">
                                <img src="img/freefire.png" alt="Free Fire" class="rounded-circle"
                                    style="width: 80px; height: 80px;">
                            </a>
                        </div>
                    </div>


                    <!-- Artikel Section -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-danger fw-semibold">
                            <i class="bi bi-journal-richtext me-2 py-1 mt-10"></i>ARTIKEL
                        </h5>
                        <a href="{{ route('alumni-siswa.artikel') }}"
                            class="text-danger text-decoration-none fw-semibold">Lihat Semua</a>
                    </div>

                    <div class="row g-3 mb-10">
                        <!-- Artikel 1 -->
                        <div class="col-md-6">
                            <div class="artikel-card">
                                <img src="https://my.skul.id/static/media/img_default_artikel_thumb.03a53a33.svg"
                                    alt="Thumbnail">
                                <div class="artikel-content">
                                    <div class="fw-semibold mb-1">Code Redeem Roblox: Blox Fruits Mei 2025</div>
                                    <div class="text-muted small">Oleh Duniagames</div>
                                </div>
                            </div>
                        </div>

                        <!-- Artikel 2 -->
                        <div class="col-md-6">
                            <div class="artikel-card">
                                <img src="https://my.skul.id/static/media/img_default_artikel_thumb.03a53a33.svg"
                                    alt="Thumbnail">
                                <div class="artikel-content">
                                    <div class="fw-semibold mb-1">PS5 Bakal Memperkenalkan Cara Baru untuk Beli Game
                                        Mereka</div>
                                    <div class="text-muted small">Oleh Duniagames</div>
                                </div>
                            </div>
                        </div>

                        <!-- Artikel 3 -->
                        <div class="col-md-6">
                            <div class="artikel-card">
                                <img src="https://my.skul.id/static/media/img_default_artikel_thumb.03a53a33.svg"
                                    alt="Thumbnail">
                                <div class="artikel-content">
                                    <div class="fw-semibold mb-1">Rilis Teaser Perdana, Ini Beragam Hal Menarik
                                        Godzilla X Kong: Supernova</div>
                                    <div class="text-muted small">Oleh Duniagames</div>
                                </div>
                            </div>
                        </div>

                        <!-- Artikel 4 -->
                        <div class="col-md-6">
                            <div class="artikel-card">
                                <img src="https://my.skul.id/static/media/img_default_artikel_thumb.03a53a33.svg"
                                    alt="Thumbnail">
                                <div class="artikel-content">
                                    <div class="fw-semibold mb-1">Alliance Insight: Set Terbaru Yu-Gi-Oh! AE yang
                                        Hadirkan Kartu-kartu Lama!</div>
                                    <div class="text-muted small">Oleh Duniagames</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->

                </div>

            </div>
            <footer class="footer bg-light py-4">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-md-5 mb-3">
                            <h5 class="text-primary fw-bold">Skul.Id</h5>
                            <p class="text-muted mb-0">Skul.Id adalah platform yang menghubungkan alumni dengan
                                sekolah, dunia industri, dan peluang karier.</p>
                        </div>
                        <div class="col-md-3 ms-auto text-start mb-3">
                            <h5 class="fw-bold">Kontak</h5>
                            <p class="mb-0 text-muted">Email: info@skul.id</p>
                            <p class="mb-0 text-muted">Telp/WA: +62 852-2584-5253</p>
                        </div>
                    </div>
                    <div class="text-center text-muted small mt-4">
                        © 2025 Skul.Id. All rights reserved.
                    </div>
                </div>
            </footer>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
