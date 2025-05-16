<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .card {
            max-width: 600px;
            margin: 50px auto;
        }

        header {
            display: flex;
            align-items: center;
            padding: 15px 0 20px 30px;
        }

        header img {
            width: 120px;
        }
    </style>
</head>

<body>

    <header>
        <img src="{{ url('img/logo.png') }}" alt="Logo Skul.Id">
        <img src="{{ url('img/pu.jpeg') }}" alt="Logo Skul.Id" class="mx-2">
    </header>

    <div class="container">
        <div class="card p-4 rounded-4">
            <h3 class="mb-4 fw-bold text-primary text-center">Data Diri</h3>
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
            <form action="{{ route('alumni-siswa.storeProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select id="status-select" name="status" class="form-select rounded-3" onchange="toggleStatus()">
                        <option value="siswa" selected>Siswa</option>
                        <option value="alumni">Alumni</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" class="form-control rounded-3" name="nama_lengkap"
                        value="{{ old('nama_lengkap') }}" required>
                </div>

                <div class="mb-3" id="nisn-group">
                    <label class="form-label fw-semibold">NISN</label>
                    <input type="text" class="form-control rounded-3" name="nisn" value="{{ old('nisn') }}"
                        required>
                </div>

                <div class="mb-3" id="kelas-group">
                    <label class="form-label fw-semibold">Kelas</label>
                    <select class="form-select rounded-3" name="kelas" required>
                        <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>11</option>
                        <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>12</option>
                    </select>
                </div>

                <div class="mb-3" id="tahun-lulusan-group" style="display: none;">
                    <label class="form-label fw-semibold">Tahun Kelulusan</label>
                    <input type="number" class="form-control rounded-3" name="tahun_kelulusan"
                        value="{{ old('tahun_kelulusan') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Provinsi</label>
                    <select class="form-select rounded-3" name="provinsi">
                        {{-- <option selected disabled>Pilih Provinsi</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option> --}}
                        <option selected value="Sulawesi Selatan">Sulawesi Selatan</option>
                        {{-- <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Gorontalo">Gorontalo</option> --}}
                        {{-- <option value="Sulawesi Barat">Sulawesi Barat</option> --}}
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kota/Kabupaten</label>
                    <input type="text" class="form-control rounded-3" name="kota" value="Pare-Pare" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">NPSN Sekolah</label>
                    <input type="text" class="form-control rounded-3" name="npsn" value="40307702" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Asal Sekolah</label>
                    <input type="text" class="form-control rounded-3" name="asal_sekolah" value="SMK 2 Pare-Pare"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jurusan</label>
                    <input type="text" class="form-control rounded-3" name="jurusan" value="{{ old('jurusan') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control rounded-3" name="email" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telepon</label>
                    <input type="text" class="form-control rounded-3" name="no_telepon" value="{{ $no_hp }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select class="form-select rounded-3" name="jenis_kelamin">
                        <option value="laki-laki" selected>Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" class="form-control rounded-3" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status Saat Ini</label>
                    <select class="form-select rounded-3" name="status_saat_ini">
                        <option selected disabled>Pilih Status</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Kuliah">Kuliah</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Bidang Pekerjaan</label>
                    <input type="text" class="form-control rounded-3" name="bidang_pekerjaan"
                        placeholder="Contoh: Teknologi Informasi">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Sertifikasi Terakhir yang Diikuti</label>
                    <input type="text" class="form-control rounded-3" name="sertifikasi_terakhir"
                        placeholder="Contoh: Junior Web Developer">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Apakah Sertifikasi Sesuai dengan Pekerjaan?</label>
                    <select class="form-select rounded-3" name="kesesuaian_sertifikasi">
                        <option selected disabled>Pilih Jawaban</option>
                        <option>Ya, sesuai</option>
                        <option>Tidak sesuai</option>
                        <option>Tidak relevan / Belum bekerja</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea class="form-control rounded-3" rows="2" name="alamat">{{ old('alamat') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded-3 fw-semibold">Simpan
                        Perubahan</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function toggleStatus() {
            const status = document.getElementById('status-select').value;

            const kelasGroup = document.getElementById('kelas-group');
            const kelasInput = document.querySelector('select[name="kelas"]');

            const tahunLulusanGroup = document.getElementById('tahun-lulusan-group');
            const tahunKelulusanInput = document.querySelector('input[name="tahun_kelulusan"]');

            if (status === 'alumni') {
                kelasGroup.style.display = 'none';
                kelasInput.removeAttribute('required');

                tahunLulusanGroup.style.display = 'block';
                tahunKelulusanInput.setAttribute('required', true);
            } else {
                kelasGroup.style.display = 'block';
                kelasInput.setAttribute('required', true);

                tahunLulusanGroup.style.display = 'none';
                tahunKelulusanInput.removeAttribute('required');
            }
        }

        setTimeout(function() {
            var msg = document.getElementById('success-message');
            if (msg) {
                msg.style.transition = "opacity 0.5s ease-out";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 500); // hapus elemen setelah transisi
            }
        }, 5000);

        setTimeout(function() {
            var errorMsg = document.getElementById('error-message');
            if (errorMsg) {
                errorMsg.style.transition = "opacity 0.5s ease-out";
                errorMsg.style.opacity = "0";
                setTimeout(() => errorMsg.remove(), 500);
            }
        }, 5000);


        // Inisialisasi saat halaman pertama kali dibuka
        document.addEventListener('DOMContentLoaded', toggleStatus);
    </script>

</body>

</html>
