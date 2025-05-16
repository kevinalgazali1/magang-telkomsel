<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skul.Id</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #EFFCFF;
    }

    header img {
      margin-left: 2rem;
    }

    .container-fluid {
      background: linear-gradient(to right, #08BADC, #B2EEFF);
      height: 330px;
      padding: 5rem 10%;
      border-radius: 0 0 20px 20px;
    }

    .profile-img {
      width: 170px;
      height: 170px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #fff;
    }

    .main-content {
      padding: 3rem 10%;
    }

    .right-section {
      background-color: white;
      border-radius: 15px;
      padding: 1.5rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .job-item {
      padding: 10px;
      margin-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .job-container {
      background-color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-top: 1.5rem;
    }

    .job-list .item {
      padding: 1rem;
      border-bottom: 1px solid #eee;
    }

    .job-list .item:last-child {
      border-bottom: none;
    }

    .job-list .item h6 {
      font-weight: 600;
      font-size: 15px;
    }

    .job-list .item p {
      font-size: 14px;
      margin: 0;
    }

    #konten {
      background-color: #fff;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

<header class="d-flex p-2">
  <img src="{{ url('img/logo.png') }}" alt="icon" width="7.5%" />
</header>

<div class="container-fluid">
  <div class="profile-header text-white d-flex align-items-center gap-4">
    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile Image" class="profile-img" />
    <div class="text">
      <h1>Halo, Feline Rosa</h1>
      <p class="mb-0">Alumni, SMKN 8 Makassar</p>
      <p class="mb-0">feline@skul.id</p>
      <p class="mb-0">0852-2584-5253</p>
    </div>
  </div>
</div>

<div class="main-content">
  <div class="row">
    <div class="col-lg-9">
      <div id="konten">
        <h4 class="fw-bold mb-3">Info Lowongan Kerja</h4>
        <p>
          Temukan berbagai lowongan kerja dari mitra Skul.id untuk alumni SMK. Mitra dapat menambahkan lowongan baru dan alumni bisa langsung melamar melalui platform ini.
        </p>
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#lokerModal">+ Tambah Lowongan</button>

        @php
          $mitraIdLogin = 1;

          $lokerList = [
            ['judul' => 'Front-End Developer', 'deskripsi' => 'React & Tailwind CSS', 'mitra_id' => 1],
            ['judul' => 'Teknisi Listrik', 'deskripsi' => 'Instalasi dan perawatan listrik', 'mitra_id' => 2],
            ['judul' => 'Digital Marketing', 'deskripsi' => 'SEO, SEM, Social Media', 'mitra_id' => 3],
            ['judul' => 'Admin Gudang', 'deskripsi' => 'Penataan barang & input data', 'mitra_id' => 1],
            ['judul' => 'Desainer Grafis', 'deskripsi' => 'Adobe Illustrator dan Canva', 'mitra_id' => 4],
          ];

          $lokerMitraSendiri = collect($lokerList)->where('mitra_id', $mitraIdLogin);
          $lokerMitraLain = collect($lokerList)->where('mitra_id', '!=', $mitraIdLogin);
        @endphp

        <div class="job-container">
          <h5 class="mb-3 fw-semibold text-primary">Lowongan Anda</h5>
          <div class="job-list">
            @forelse($lokerMitraSendiri as $job)
              <div class="item">
                <h6>{{ $job['judul'] }}</h6>
                <p>{{ $job['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada lowongan yang Anda buat.</p>
            @endforelse
          </div>
        </div>

        <div class="job-container mt-4">
          <h5 class="mb-3 text-primary fw-semibold">Lowongan dari Mitra Lain</h5>
          <div class="job-list">
            @forelse($lokerMitraLain as $job)
              <div class="item">
                <h6>{{ $job['judul'] }}</h6>
                <p>{{ $job['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada lowongan dari mitra lain.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-4 mt-lg-0">
      <div class="right-section">
        <h5>Lowongan Terbaru</h5>
        <div class="job-item">Barista Kopi Kenangan</div>
        <div class="job-item">Teknisi Mesin Pabrik</div>
        <div class="job-item">Asisten Apoteker</div>
        <div class="job-item">Staff Administrasi</div>
        <div class="job-item">Operator Produksi</div>
        <div class="job-item">Web Developer</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Lowongan -->
<div class="modal fade" id="lokerModal" tabindex="-1" aria-labelledby="lokerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="#" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="lokerModalLabel">Form Tambah Lowongan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Pekerjaan</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <select class="form-select" id="lokasi" name="lokasi" required>
              <option value="" disabled selected>Pilih Lokasi</option>
              <option>Makassar</option>
              <option>Jakarta</option>
              <option>Surabaya</option>
              <option>Bandung</option>
              <option>Yogyakarta</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="tipe" class="form-label">Tipe Pekerjaan</label>
              <select class="form-select" id="tipe" name="tipe" required>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Magang">Magang</option>
                <option value="Freelance">Freelance</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="gaji" class="form-label">Estimasi Gaji</label>
              <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Contoh: Rp3.000.000 - Rp5.000.000">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
