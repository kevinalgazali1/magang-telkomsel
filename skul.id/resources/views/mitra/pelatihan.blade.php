<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Skul.Id - Pelatihan</title>
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

    .training-item {
      padding: 10px;
      margin-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .training-container {
      background-color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-top: 1.5rem;
    }

    .training-list .item {
      padding: 1rem;
      border-bottom: 1px solid #eee;
    }

    .training-list .item:last-child {
      border-bottom: none;
    }

    .training-list .item h6 {
      font-weight: 600;
      font-size: 15px;
    }

    .training-list .item p {
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
        <h4 class="fw-bold mb-3">Program Pelatihan</h4>
        <p>
          Tingkatkan keterampilanmu melalui program pelatihan dari Skul.id dan mitra terpercaya. Pelatihan ini dirancang untuk mempersiapkan alumni SMK menghadapi dunia kerja.
        </p>
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#trainingModal">+ Tambah Pelatihan</button>

        @php
          $mitraIdLogin = 1;

          $trainingList = [
            ['judul' => 'Pelatihan UI/UX Design', 'deskripsi' => 'Figma dan prototyping', 'mitra_id' => 1],
            ['judul' => 'Dasar Mekanik Otomotif', 'deskripsi' => 'Praktik tune up dan perawatan kendaraan', 'mitra_id' => 2],
            ['judul' => 'Digital Marketing Dasar', 'deskripsi' => 'Belajar SEO, konten dan ads', 'mitra_id' => 3],
            ['judul' => 'Manajemen Gudang', 'deskripsi' => 'Sistem FIFO & pengelolaan inventaris', 'mitra_id' => 1],
          ];

          $trainingMitraSendiri = collect($trainingList)->where('mitra_id', $mitraIdLogin);
          $trainingMitraLain = collect($trainingList)->where('mitra_id', '!=', $mitraIdLogin);
        @endphp

        <div class="training-container">
          <h5 class="mb-3 fw-semibold text-primary">Pelatihan Anda</h5>
          <div class="training-list">
            @forelse($trainingMitraSendiri as $training)
              <div class="item">
                <h6>{{ $training['judul'] }}</h6>
                <p>{{ $training['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada pelatihan yang Anda buat.</p>
            @endforelse
          </div>
        </div>

        <div class="training-container mt-4">
          <h5 class="mb-3 text-primary fw-semibold">Pelatihan dari Mitra Lain</h5>
          <div class="training-list">
            @forelse($trainingMitraLain as $training)
              <div class="item">
                <h6>{{ $training['judul'] }}</h6>
                <p>{{ $training['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada pelatihan dari mitra lain.</p>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mt-4 mt-lg-0">
      <div class="right-section">
        <h5>Pelatihan Populer</h5>
        <div class="training-item">MS Excel untuk Administrasi</div>
        <div class="training-item">Pemrograman Python Dasar</div>
        <div class="training-item">Editing Video di CapCut</div>
        <div class="training-item">Teknik Wawancara Kerja</div>
        <div class="training-item">Pelatihan Desain Canva</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Pelatihan -->
<div class="modal fade" id="trainingModal" tabindex="-1" aria-labelledby="trainingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="#" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="trainingModalLabel">Form Tambah Pelatihan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Pelatihan</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
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
              <label for="durasi" class="form-label">Durasi</label>
              <input type="text" class="form-control" id="durasi" name="durasi" placeholder="Contoh: 2 minggu, 10 sesi">
            </div>
            <div class="col-md-6 mb-3">
              <label for="sertifikat" class="form-label">Sertifikat</label>
              <select class="form-select" id="sertifikat" name="sertifikat">
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
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
