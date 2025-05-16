<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sertifikasi</title>
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

    .sertif-item {
      padding: 10px;
      margin-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .sertif-container {
      background-color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
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
      <h1>Halo, {{ Auth::user()->name }}</h1>
      <p class="mb-0">Alumni, SMKN 8 Makassar</p>
      <p class="mb-0">feline@skul.id</p>
      <p class="mb-0">0852-2584-5253</p>
    </div>
  </div>
</div>

<div class="main-content">
  <div class="row">
    <!-- Konten Utama -->
    <div class="col-lg-9">
      <div id="konten">
        <h4 class="fw-bold mb-3">Info Sertifikasi</h4>
        <p>
          Sertifikasi merupakan salah satu bukti kompetensi yang penting dimiliki alumni SMK untuk meningkatkan daya saing di dunia kerja.
          Program ini disediakan oleh Mitra melalui platform Skul.id dan dapat mencakup berbagai bidang keahlian.
        </p>
        <p>
          Mitra dapat menambahkan sertifikasi baru yang akan langsung tampil di halaman alumni agar bisa diakses dan diikuti.
          Alumni diharapkan aktif mengecek dan mengikuti sertifikasi sesuai bidang keahlian masing-masing.
        </p>

        <!-- Tombol Tambah Sertifikasi -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#sertifikasiModal">+ Tambah Sertifikasi</button>

        @php
          $mitraIdLogin = 1;

          $sertifikasiList = [
            ['judul' => 'Sertifikasi Microsoft Excel', 'deskripsi' => 'Pelatihan Excel tingkat lanjut.', 'mitra_id' => 1],
            ['judul' => 'Sertifikasi UI/UX Design', 'deskripsi' => 'Dasar desain UI dan UX.', 'mitra_id' => 2],
            ['judul' => 'Sertifikasi Jaringan Dasar', 'deskripsi' => 'Topologi dan perangkat jaringan.', 'mitra_id' => 3],
            ['judul' => 'Sertifikasi Teknisi AC', 'deskripsi' => 'Pendingin dan tata udara.', 'mitra_id' => 1],
            ['judul' => 'Sertifikasi Digital Marketing', 'deskripsi' => 'Strategi pemasaran online.', 'mitra_id' => 4],
          ];

          $sertifikasiMitraSendiri = collect($sertifikasiList)->where('mitra_id', $mitraIdLogin);
          $sertifikasiMitraLain = collect($sertifikasiList)->where('mitra_id', '!=', $mitraIdLogin);
        @endphp

        <!-- Sertifikasi Mitra Sendiri -->
        <div class="sertif-container">
          <h5 class="mb-3 fw-semibold text-primary">Sertifikasi Anda</h5>
          <div class="sertif-list">
            @forelse($sertifikasiMitraSendiri as $sertif)
              <div class="item">
                <h6>{{ $sertif['judul'] }}</h6>
                <p>{{ $sertif['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada sertifikasi yang Anda buat.</p>
            @endforelse
          </div>
        </div>

        <!-- Sertifikasi Mitra Lain -->
        <div class="sertif-container mt-4">
          <h5 class="mb-3 text-primary fw-semibold">Sertifikasi dari Mitra Lain</h5>
          <div class="sertif-list">
            @forelse($sertifikasiMitraLain as $sertif)
              <div class="item">
                <h6>{{ $sertif['judul'] }}</h6>
                <p>{{ $sertif['deskripsi'] }}</p>
              </div>
            @empty
              <p class="text-muted">Belum ada sertifikasi dari mitra lain.</p>
            @endforelse
          </div>
        </div>
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
<div class="modal fade" id="sertifikasiModal" tabindex="-1" aria-labelledby="sertifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('mitra.sertifikasi.store') }}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="sertifikasiModalLabel">Form Tambah Sertifikasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Sertifikasi</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="perusahaan" class="form-label">Nama Perusahaan / Mitra</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="{{ Auth::user()->name }}" readonly>
          </div>
          <div class="mb-3">
            <label for="wilayah" class="form-label">Wilayah</label>
            <select class="form-select" id="wilayah" name="wilayah" required>
              <option disabled selected>Pilih Wilayah</option>
              <option value="Makassar">Makassar</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Surabaya">Surabaya</option>
              <option value="Bandung">Bandung</option>
              <option value="Yogyakarta">Yogyakarta</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
              <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="lisensi" class="form-label">Nomor Lisensi</label>
            <input type="text" class="form-control" id="lisensi" name="lisensi" value="{{ old('lisensi') }}" required>
          </div>
          <div class="mb-3">
            <label for="file_sertifikat" class="form-label">Upload Sertifikat (opsional)</label>
            <input type="file" class="form-control" id="file_sertifikat" name="file_sertifikat" accept=".pdf,.jpg,.png">
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
