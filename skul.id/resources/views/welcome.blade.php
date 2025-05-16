<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skul.Id</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            color: #252f35;
            font-size: 13px;
            background-color: #fff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        header {
            display: flex;
            align-items: center;
            padding: 15px 0 20px 30px;
        }

        header img {
            width: 120px;
        }

        .hero-section {
            background: linear-gradient(to bottom, #CDE8FC, #EEF6FE);
            border-radius: 0 0 20px 20px;
            height: auto;
            padding: 0;
        }

        .judul {
            text-align: center;
            margin: 60px 0 30px;
        }

        .judul h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .judul p {
            font-size: 18px;
            font-weight: 300;
            margin: 0;
        }

        .konten {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding-bottom: 60px;
        }

        .card-role {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 500px;
            padding: 20px 25px;
            border-radius: 18px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        }

        .card-role:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        }

        .card-role .text {
            max-width: 70%;
        }

        .card-role h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .card-role p {
            font-size: 14px;
            font-weight: 300;
            margin: 0;
        }

        .card-role img {
            width: 70px;
            height: auto;
        }

        .mitra {
            background-color: #D9FBE2;
            color: #256d3d;
        }

        .alumni {
            background-color: #D4F0FF;
            color: #437F9F;
        }

        .siswa {
            background-color: #ece8ff;
            color: #5a4895;
        }

        a.text-decoration-none:hover {
            color: inherit;
        }

        @media (max-width: 768px) {
            .card-role {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .card-role .text {
                max-width: 100%;
            }

            .card-role img {
                margin-top: 10px;
            }
        }

        .footer {
            background-color:#F2F9FF;
        }
    </style>
</head>
<body>
    <div class="body-utama">
        <header>
            <img src="{{ url('img/logo.png') }}" alt="Logo Skul.Id">
            <img src="{{ url('img/pu.jpeg') }}" alt="Logo Skul.Id" class="mx-2">
        </header>

        <div class="hero-section d-flex align-items-stretch p-0">
            <div class="container-fluid d-flex align-items-stretch p-0">
                <div class="col-lg-1"></div>
                <div class="row w-100 m-0 align-items-stretch">
                    <div class="col-lg-6 d-flex flex-column justify-content-center text-lg-start text-center py-5 px-4 ml-5">
                        <div>
                            <h1 class="fw-bold text-danger mb-3 ">Selamat Datang di <span class="text-primary">Skul.Id</span></h1>
                            <p class="fs-5 text-secondary">
                                Tempat terhubungnya alumni, sekolah, dunia kerja, dan peluang karier secara langsung dan terpercaya.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-end justify-content-center p-0">
                        <img src="{{ url('img/landing-logo.png') }}" alt="Ikon Utama" style="width: 250px; margin-bottom: 0;">
                    </div>
                </div>
            </div>
        </div>

        <div class="judul">
            <h1>Ayo Mulai</h1>
            <p>Silahkan pilih role kamu:</p>
        </div>

    <!-- Role Cards -->
    <div class="container pb-5">
      <div class="row g-4 justify-content-center">
        <!-- Mitra -->
        <div class="col-md-6 col-lg-4 d-flex">
          <a href="{{ route('login.mitra') }}" class="card-role mitra text-decoration-none w-100">
            <div>
              <h2>Mitra</h2>
              <p>Bergabung menjadi mitra sebagai penyedia sertifikasi, pelatihan dan informasi lowongan kerja</p>
            </div>
          </a>
        </div>

        <!-- Alumni -->
        <div class="col-md-6 col-lg-4 d-flex">
          <a href="{{ route('login.alumni') }}" class="card-role alumni text-decoration-none w-100">
            <div>
              <h2>Alumni</h2>
              <p>Jika kamu sudah lulus program pendidikan SMA/SMK/MA</p>
            </div>
          </a>
        </div>

        <!-- Siswa -->
        <div class="col-md-6 col-lg-4 d-flex">
          <a href="{{ route('login.alumni') }}" class="card-role siswa text-decoration-none w-100">
            <div>
              <h2>Siswa</h2>
              <p>Jika kamu sedang menempuh pendidikan di SMA/SMK/MA dan ingin mulai menjelajahi peluang karier</p>
            </div>
          </a>
        </div>
      </div>
    </div>
    </div>
 <!-- Footer -->
<footer class="footer mt-5 pt-4 border-top">
  <div class="container py-3">
    <div class="row justify-content-between align-items-start">
      <!-- Tentang Skul.Id -->
      <div class="col-md-6 mb-3">
        <h5 class="text-primary fw-bold">Skul.Id</h5>
        <p class="text-muted mb-0" style="max-width: 100%;">
          Skul.Id adalah platform yang menghubungkan alumni dengan sekolah, dunia industri, dan peluang karier. Kami percaya koneksi yang kuat akan membuka masa depan yang lebih baik.
        </p>
      </div>

      <!-- Kontak -->
<!-- Kontak -->
<div class="col-md-3 ms-auto text-start mb-3">
  <h6 class="fw-bold">Kontak</h6>
  <p class="mb-0">Email: info@skul.id</p>
  <p class="mb-0">Telp/WA: +62 852-2584-5253</p>
</div>



    <!-- Watermark -->
    <div class="text-center text-muted small mt-4">
      © 2025 Skul.Id. All rights reserved.
    </div>
  </div>
</footer>

</body>
</html>
