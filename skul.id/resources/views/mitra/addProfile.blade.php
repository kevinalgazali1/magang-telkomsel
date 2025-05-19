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
            <h3 class="mb-4 fw-bold text-primary text-center">Data Perusahaan</h3>
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
            <form action="{{ route('mitra.storeProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Perusahaan</label>
                    <input type="text" class="form-control rounded-3" name="nama_perusahaan"
                        value="{{ old('nama_perusahaan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Penanggung Jawab</label>
                    <input type="text" class="form-control rounded-3" name="penanggung_jawab"
                        value="{{ old('penanggung_jawab') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">NPWP</label>
                    <input type="text" class="form-control rounded-3" name="NPWP" value="{{ old('NPWP') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Bidang Industri</label>
                    <input type="text" class="form-control rounded-3" name="bidang_industri"
                        value="{{ old('bidang_industri') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Provinsi</label>
                    <select class="form-select rounded-3" id="provinsi-select" name="provinsi" required>
                        <option selected disabled>Pilih Provinsi</option>
                        @foreach ($provinsi as $prov)
                            <option value="{{ $prov['name'] }}" data-id="{{ $prov['id'] }}">
                                {{ $prov['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kota/Kabupaten</label>
                    <select class="form-select rounded-3" id="kota-select" name="kota" required>
                        <option selected disabled>Pilih Kota/Kabupaten</option>
                        @foreach ($kabupaten as $kab)
                            <option value="{{ $kab['name'] }}">{{ $kab['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea class="form-control rounded-3" rows="2" name="alamat">{{ old('alamat') }}</textarea>
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

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded-3 fw-semibold">Simpan
                        Perubahan</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        document.getElementById('provinsi-select').addEventListener('change', function() {
            const provId = this.options[this.selectedIndex].getAttribute('data-id');

            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
                .then(response => response.json())
                .then(data => {
                    const kotaSelect = document.getElementById('kota-select');
                    kotaSelect.innerHTML = '<option selected disabled>Pilih Kota/Kabupaten</option>';

                    data.forEach(kota => {
                        const opt = document.createElement('option');
                        opt.value = kota.name;
                        opt.textContent = kota.name;
                        kotaSelect.appendChild(opt);
                    });
                });
        });

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
