<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Super Admin' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            min-width: 250px;
            min-height: 100vh;
            background-color: #fff;
            border-right: 1px solid #e1e1e1;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #0d6efd;
            color: #fff !important;
        }

        .card-stat {
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--color), #96c93d);
            color: #fff;
            transition: transform 0.2s ease;
        }

        .card-stat:hover {
            transform: translateY(-3px);
        }

        .mitra-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 30px;
        }

        .nav-title {
            font-weight: 600;
            font-size: 18px;
        }

        h2,
        h4,
        h6 {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
        }

        .card h6 {
            font-weight: 600;
        }

        .soft-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            background-color: #f7f9fc;
        }

        .soft-table thead {
            background-color: #f7f9fc;
            border-bottom: 1px solid #e0e6ed;
        }

        .soft-table th,
        .soft-table td {
            vertical-align: middle;
            padding: 0.75rem;
        }

        .soft-table tbody tr:hover {
            background-color: #f5faff;
            transition: background-color 0.3s ease;
        }

        .badge-soft {
            display: inline-block;
            padding: 4px 10px;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 6px;
        }

        .badge-aktif {
            background-color: #e6f4ea;
            color: #2e7d32;
        }

        .badge-nonaktif {
            background-color: #fcecec;
            color: #c62828;
        }

        .text-muted-small {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .btn-icon {
            border: none;
            background: transparent;
            color: #6c757d;
            font-size: 1rem;
        }

        .btn-icon:hover {
            color: #0d6efd;
        }

        .rounded-soft {
            border-radius: 10px !important;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-4 shadow-sm">
            <h4 class="text-primary mb-4">Super Admin</h4>
            <div class="nav flex-column">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.sertifikasi') }}"
                    class="nav-link {{ request()->routeIs('admin.sertifikasi') ? 'active' : '' }}">
                    <i class="bi bi-award-fill me-2"></i> Sertifikasi
                </a>
                <a href="{{ route('admin.pelatihan') }}"
                    class="nav-link {{ request()->routeIs('admin.pelatihan') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill me-2"></i> Pelatihan
                </a>
                <a href="{{ route('admin.loker') }}"
                    class="nav-link {{ request()->routeIs('admin.loker') ? 'active' : '' }}">
                    <i class="bi bi-briefcase-fill me-2"></i> Loker
                </a>
                <a href="{{ route('admin.artikel') }}" class="nav-link"
                    class="nav-link {{ request()->routeIs('admin.artikel') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text-fill me-2"></i> Artikel
                </a>
                <div class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center {{ request()->is('admin/users*') ? 'active' : '' }}"
                        data-bs-toggle="collapse" href="#submenuUsers" role="button"
                        aria-expanded="{{ request()->is('admin/users*') ? 'true' : 'false' }}"
                        aria-controls="submenuUsers">
                        <span><i class="bi bi-people-fill me-2"></i> Users</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse {{ request()->is('admin/users*') ? 'show' : '' }}" id="submenuUsers">
                        <a href="{{ route('admin.usersalumni') }}"
                            class="nav-link ps-4 {{ request()->routeIs('admin.usersalumni') ? 'active' : '' }}">
                            <i class="bi bi-person-lines-fill me-2"></i> Alumni
                        </a>
                        <a href="{{ route('admin.usersmitra') }}"
                            class="nav-link ps-4 {{ request()->routeIs('admin.usersmitra') ? 'active' : '' }}">
                            <i class="bi bi-building me-2"></i> Mitra
                        </a>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="#" class="logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout</a>
                </form>
            </div>
            <div class="mt-auto pt-5 text-muted small">
                &copy; {{ date('Y') }} Super Admin
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <span class="nav-title">{{ $title ?? 'Dashboard' }}</span>
                <span class="text-muted">Hi, Admin</span>
            </div>

            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold">Data Sertifikasi</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sertifikasiModal">+ Tambah
                        Sertifikasi</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle soft-table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Mitra</th>
                                <th>Judul Sertifikasi</th>
                                <th>Kota</th>
                                <th>Tempat</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sertifikasis as $s)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-semibold">{{ $s->user->mitraProfile->nama_instansi ?? '-' }}
                                        </div>
                                        <div class="text-muted-small">{{ $s->user->email ?? '-' }}</div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $s->judul_sertifikasi }}</div>
                                        <div class="text-muted-small">{{ Str::limit($s->deskripsi, 40) }}</div>
                                    </td>
                                    <td class="text-center">
                                        {{ $s->kota }}
                                    </td>
                                    <td class="text-center">
                                        {{ $s->tempat }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge-soft {{ $s->status == 'Gratis' ? 'badge-aktif' : 'badge-nonaktif' }}">
                                            {{ $s->status }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($s->tanggal_mulai)->format('d M Y') }} <br>
                                        <span class="text-muted-small">s/d
                                            {{ \Carbon\Carbon::parse($s->tanggal_selesai)->format('d M Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            {{ $s->daftarSertifikasis->count() }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#modalLihat{{ $s->id }}" title="Lihat"><i
                                                class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-sm btn-outline-warning rounded-circle btn-icon"
                                            data-bs-toggle="modal" data-bs-target="#editSertifikasiModal"
                                            data-id="{{ $s->id }}" data-judul="{{ $s->judul_sertifikasi }}"
                                            data-deskripsi="{{ $s->deskripsi }}" data-mulai="{{ $s->tanggal_mulai }}"
                                            data-selesai="{{ $s->tanggal_selesai }}" data-kota="{{ $s->kota }}"
                                            data-tempat="{{ $s->tempat }}" data-biaya="{{ $s->biaya }}"
                                            data-foto="{{ asset('storage/' . $s->foto_sertifikasi) }}"
                                            onclick="openEditModal(this)">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <form id="deleteForm-{{ $s->id }}"
                                            action="{{ route('admin.sertifikasi.destroy', $s->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                onclick="confirmDelete({{ $s->id }})" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">Belum ada data sertifikasi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                {{-- Modal Tambah --}}
                <div class="modal fade" id="sertifikasiModal" tabindex="-1" aria-labelledby="sertifikasiModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{ route('admin.sertifikasi.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sertifikasiModalLabel">Form Tambah
                                        Sertifikasi
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judul_sertifikasi" class="form-label">Judul
                                            Sertifikasi</label>
                                        <input type="text" class="form-control" id="judul_sertifikasi"
                                            name="judul_sertifikasi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
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
                                            <input type="date" class="form-control" id="tanggal_selesai"
                                                name="tanggal_selesai" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kota" class="form-label">Kota
                                            Penyelenggaraan</label>
                                        <input type="text" class="form-control" id="kota" name="kota"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat" class="form-label">Tempat
                                            Penyelenggaraan</label>
                                        <input type="text" class="form-control" id="tempat" name="tempat"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status
                                            Sertifikasi</label>
                                        <select class="form-select" id="status" name="status" required
                                            onchange="toggleBiaya('status', 'biaya')">
                                            <option value="Berbayar">Berbayar</option>
                                            <option value="Gratis">Gratis</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="biaya" class="form-label">Biaya Sertifikasi
                                            (Rp)</label>
                                        <input type="number" class="form-control" id="biaya" name="biaya"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Upload Foto
                                            Sertifikasi</label>
                                        <input type="file" class="form-control" id="foto_sertifikasi"
                                            name="foto_sertifikasi" accept=".jpg,.jpeg,.png" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Loop untuk Modal Lihat --}}
                @foreach ($sertifikasis as $s)
                    <div class="modal fade" id="modalLihat{{ $s->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Sertifikasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>{{ $s->judul_sertifikasi }}</h5>
                                    <p>{{ $s->deskripsi }}</p>
                                    <p><strong>Lokasi:</strong> {{ $s->tempat }}, {{ $s->kota }}</p>
                                    <p><strong>Tanggal:</strong> {{ $s->tanggal_mulai }} s/d {{ $s->tanggal_selesai }}
                                    </p>
                                    <p><strong>Status:</strong> {{ $s->status }}</p>
                                    @if ($s->foto_sertifikasi)
                                        <img src="{{ asset('storage/' . $s->foto_sertifikasi) }}" alt="Foto"
                                            class="img-fluid rounded shadow-sm mb-3">
                                    @endif

                                    @if ($s->daftarSertifikasis && $s->daftarSertifikasis->count())
                                        <hr>
                                        <h6>Daftar Peserta yang Terdaftar {{ $s->daftarSertifikasis_count }}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nama Lengkap</th>
                                                        <th>Email</th>
                                                        <th>No HP</th>
                                                        <th>Asal Sekolah</th>
                                                        <th>Jurusan</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tanggal Lahir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($s->daftarSertifikasis as $peserta)
                                                        <tr>
                                                            <td>{{ $peserta->nama_lengkap }}</td>
                                                            <td>{{ $peserta->email }}</td>
                                                            <td>{{ $peserta->no_hp }}</td>
                                                            <td>{{ $peserta->asal_sekolah }}</td>
                                                            <td>{{ $peserta->jurusan }}</td>
                                                            <td>{{ $peserta->jenis_kelamin }}</td>
                                                            <td>{{ $peserta->tanggal_lahir }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="text-muted mt-3">Belum ada peserta yang mendaftar.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- Modal Edit Sertifikasi -->
                <div class="modal fade" id="editSertifikasiModal" tabindex="-1"
                    aria-labelledby="editSertifikasiModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="" id="editForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editSertifikasiModalLabel">Edit
                                        Sertifikasi
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="edit_id">
                                    <div class="mb-3">
                                        <label for="edit_judul_sertifikasi" class="form-label">Judul
                                            Sertifikasi</label>
                                        <input type="text" class="form-control" id="edit_judul_sertifikasi"
                                            name="judul_sertifikasi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tanggal_mulai" class="form-label">Waktu
                                                Mulai</label>
                                            <input type="date" class="form-control" id="edit_tanggal_mulai"
                                                name="tanggal_mulai" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_tanggal_selesai" class="form-label">Waktu
                                                Selesai</label>
                                            <input type="date" class="form-control" id="edit_tanggal_selesai"
                                                name="tanggal_selesai" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_kota" class="form-label">Kota</label>
                                        <input type="text" class="form-control" id="edit_kota" name="kota"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_tempat" class="form-label">Tempat</label>
                                        <input type="text" class="form-control" id="edit_tempat" name="tempat"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_status" class="form-label">Status
                                            Sertifikasi</label>
                                        <select class="form-select" id="edit_status" name="status" required
                                            onchange="toggleBiaya('edit_status', 'edit_biaya')">
                                            <option value="Berbayar">Berbayar</option>
                                            <option value="Gratis">Gratis</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_biaya" class="form-label">Biaya (Rp)</label>
                                        <input type="number" class="form-control" id="edit_biaya" name="biaya"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_foto_sertifikasi" class="form-label">Upload
                                            Foto
                                            Baru
                                            (Opsional)</label>
                                        <input type="file" class="form-control" id="edit_foto_sertifikasi"
                                            name="foto_sertifikasi" accept=".jpg,.jpeg,.png">
                                        <img id="preview_foto_edit" class="img-fluid mt-2 rounded"
                                            style="max-height: 150px;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </form>
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

                    function confirmDelete(id) {
                        Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data Lowongan Kerja akan dihapus permanen!",
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
                </script>
                <script>
                    function openEditModal(button) {
                        const id = button.getAttribute('data-id');
                        const judul = button.getAttribute('data-judul');
                        const deskripsi = button.getAttribute('data-deskripsi');
                        const mulai = button.getAttribute('data-mulai');
                        const selesai = button.getAttribute('data-selesai');
                        const kota = button.getAttribute('data-kota');
                        const tempat = button.getAttribute('data-tempat');
                        const biaya = button.getAttribute('data-biaya');
                        const foto = button.getAttribute('data-foto');
                        const action = button.getAttribute('data-action');
                        const status = button.getAttribute('data-status');


                        document.getElementById('edit_judul_sertifikasi').value = judul;
                        document.getElementById('edit_deskripsi').value = deskripsi;
                        document.getElementById('edit_tanggal_mulai').value = mulai;
                        document.getElementById('edit_tanggal_selesai').value = selesai;
                        document.getElementById('edit_kota').value = kota;
                        document.getElementById('edit_tempat').value = tempat;
                        document.getElementById('edit_status').value = status;
                        document.getElementById('edit_biaya').value = biaya ? formatAngkaRupiah(biaya) : '';
                        document.getElementById('preview_foto_edit').src = foto;

                        // Set form action URL
                        toggleBiayaField(document.getElementById('edit_status'));
                    }

                    setTimeout(() => {
                        const alert = document.querySelector('.alert');
                        if (alert) {
                            alert.classList.remove('show');
                            alert.classList.add('hide');
                            setTimeout(() => alert.remove(), 300);
                        }
                    }, 5000); // 5 detik

                    function toggleBiaya(statusId, biayaId) {
                        const status = document.getElementById(statusId).value;
                        const biayaField = document.getElementById(biayaId).closest('.mb-3');

                        if (status === 'Gratis') {
                            biayaField.style.display = 'none';
                            document.getElementById(biayaId).value = 0;
                        } else {
                            biayaField.style.display = 'block';
                        }
                    }

                    // Trigger saat modal dibuka (untuk reset tampilan biaya)
                    document.getElementById('sertifikasiModal').addEventListener('show.bs.modal', () => {
                        toggleBiaya('status', 'biaya');
                    });

                    document.getElementById('editSertifikasiModal').addEventListener('show.bs.modal', () => {
                        toggleBiaya('edit_status', 'edit_biaya');
                    });
                </script>

</body>

</html>
