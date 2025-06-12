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
                    <h4 class="fw-semibold">Data Loker</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lokerModal"">+ Tambah
                        Loker</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th><strong>Mitra</strong></th>
                                <th>Perusahaan</th>
                                <th>Posisi</th>
                                <th>Lokasi</th>
                                <th>Tipe</th>
                                <th>Pendidikan</th>
                                <th>Gaji</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokers as $index => $l)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $l->user && $l->user->mitraProfile ? $l->user->mitraProfile->nama_instansi : '-' }}
                                    </td>
                                    <td>{{ $l->nama_perusahaan }}</td>
                                    <td>{{ $l->posisi }}</td>
                                    <td>{{ $l->lokasi }}</td>
                                    <td>{{ $l->tipe }}</td>
                                    <td>{{ $l->pendidikan }}</td>
                                    <td>{{ $l->gaji }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalLihat{{ $l->id }}"><i
                                                class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editLokerModal" onclick="openEditModal(this)"
                                            data-id="{{ $l->id }}"
                                            data-nama_perusahaan="{{ $l->nama_perusahaan }}"
                                            data-deskripsi="{{ $l->deskripsi }}" data-posisi="{{ $l->posisi }}"
                                            data-lokasi="{{ $l->lokasi }}" data-tipe="{{ $l->tipe }}"
                                            data-pendidikan="{{ $l->pendidikan }}" data-gaji="{{ $l->gaji }}"
                                            data-gambar="{{ asset('storage/' . $l->gambar) }}"
                                            data-action="{{ route('admin.loker.update', $l->id) }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <form id="deleteForm-{{ $l->id }}"
                                            action="{{ route('admin.loker.destroy', $l->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                onclick="confirmDelete({{ $l->id }})" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Lihat --}}
                                <div class="modal fade" id="modalLihat{{ $l->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Loker</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{ $l->posisi }}</h5>
                                                <p><strong>Perusahaan:</strong> {{ $l->nama_perusahaan }}</p>
                                                <p><strong>Deskripsi:</strong> {{ $l->deskripsi }}</p>
                                                <p><strong>Lokasi:</strong> {{ $l->lokasi }}</p>
                                                <p><strong>Tipe:</strong> {{ $l->tipe }}</p>
                                                <p><strong>Pendidikan:</strong> {{ $l->pendidikan }}</p>
                                                <p><strong>Gaji:</strong> {{ $l->gaji }}</p>
                                                @if ($l->gambar)
                                                    <img src="{{ asset('storage/' . $l->gambar) }}"
                                                        class="img-fluid rounded shadow-sm mt-3" alt="Gambar Loker">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editLokerModal" tabindex="-1"
                                    aria-labelledby="editLokerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="" id="editForm" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLokerModalLabel">Edit Lowongan
                                                        Kerja</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="edit_id">
                                                    <div class="mb-3">
                                                        <label for="edit_nama_perusahaan" class="form-label">Nama
                                                            Perusahaan</label>
                                                        <input type="text" class="form-control"
                                                            id="edit_nama_perusahaan" name="nama_perusahaan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_deskripsi"
                                                            class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_posisi" class="form-label">Posisi</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_posisi" name="posisi" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_lokasi" class="form-label">Lokasi</label>
                                                            <input type="text" class="form-control"
                                                                id="edit_lokasi" name="lokasi" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3" id="tipe-group">
                                                        <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                                        <select class="form-select rounded-3" name="tipe"
                                                            id="edit_tipe" required>
                                                            <option value="freelance">Freelance</option>
                                                            <option value="magang">Magang</option>
                                                            <option value="part time">Part Time</option>
                                                            <option value="full time">Full Time</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_pendidikan"
                                                            class="form-label">Pendidikan</label>
                                                        <input type="text" class="form-control"
                                                            id="edit_pendidikan" name="pendidikan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_gaji" class="form-label">Gaji (Rp)</label>
                                                        <input type="text" class="form-control" id="edit_gaji"
                                                            name="gaji" required oninput="formatRupiah(this)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_gambar" class="form-label">Upload Foto Baru
                                                            (Opsional)
                                                        </label>
                                                        <input type="file" class="form-control" id="edit_gambar"
                                                            name="gambar" accept=".jpg,.jpeg,.png">
                                                        <img id="preview_gambar_edit" class="img-fluid mt-2 rounded"
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Form Tambah Sertifikasi -->
            <div class="modal fade" id="lokerModal" tabindex="-1" aria-labelledby="lokerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('admin.loker.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="lokerModalLabel">Form Tambah Lowongan Kerja
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_perusahaan"
                                        name="nama_perusahaan">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="posisi" class="form-label">Posisi</label>
                                        <input type="text" class="form-control" id="posisi" name="posisi"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3" id="tipe-group">
                                    <label class="form-label fw-semibold">Tipe Pekerjaan</label>
                                    <select class="form-select rounded-3" name="tipe" required>
                                        <option value="freelance" {{ old('tipe') == 'freelance' ? 'selected' : '' }}>
                                            Freelance
                                        </option>
                                        <option value="magang" {{ old('tipe') == 'magang' ? 'selected' : '' }}>Magang
                                        </option>
                                        <option value="part time" {{ old('tipe') == 'part time' ? 'selected' : '' }}>
                                            Part Time
                                        </option>
                                        <option value="full time" {{ old('tipe') == 'full time' ? 'selected' : '' }}>
                                            Full Time
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="gaji" class="form-label">Gaji (Rp)</label>
                                    <input type="text" class="form-control" id="gaji" name="gaji"
                                        required oninput="formatRupiah(this)">
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Upload Foto Perusahaan</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar"
                                        accept=".jpg,.jpeg,.png" required>
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
                function openEditModalPelatihan(button) {
                    // Ambil data dari tombol
                    const id = button.getAttribute('data-id');
                    const nama_pelatihan = button.getAttribute('data-nama_pelatihan');
                    const deskripsi = button.getAttribute('data-deskripsi');
                    const mulai = button.getAttribute('data-mulai');
                    const selesai = button.getAttribute('data-selesai');
                    const kota = button.getAttribute('data-kota');
                    const tempat = button.getAttribute('data-tempat_pelatihan');
                    const biaya = button.getAttribute('data-biaya');
                    const foto = button.getAttribute('data-foto');
                    const status = button.getAttribute('data-status');
                    const action = button.getAttribute('data-action');

                    // Set nilai ke form
                    document.getElementById('edit_nama_pelatihan').value = nama_pelatihan;
                    document.getElementById('edit_deskripsi').value = deskripsi;
                    document.getElementById('edit_tanggal_mulai').value = mulai;
                    document.getElementById('edit_tanggal_selesai').value = selesai;
                    document.getElementById('edit_kota').value = kota;
                    document.getElementById('edit_tempat_pelatihan').value = tempat;
                    document.getElementById('edit_status').value = status;
                    document.getElementById('edit_biaya').value = biaya ? formatAngkaRupiah(biaya) : '';
                    document.getElementById('preview_foto_edit').src = foto;

                    // Set action ke form khusus pelatihan
                    document.getElementById('editFormPelatihan').action = action;

                    // Tampilkan/sembunyikan field biaya berdasarkan status
                    toggleBiayaField(document.getElementById('edit_status'));
                }

                function formatAngkaRupiah(angka) {
                    let value = angka.toString().replace(/\D/g, '');
                    return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                }

                function toggleBiayaField(select) {
                    const status = select.value;

                    if (select.id === 'edit_status') {
                        const biayaDiv = document.getElementById('group_biaya_edit');
                        const biayaInput = document.getElementById('edit_biaya');

                        if (status === 'Gratis') {
                            biayaDiv.style.display = 'none';
                            biayaInput.removeAttribute('required');
                            biayaInput.value = '';
                        } else {
                            biayaDiv.style.display = 'block';
                            biayaInput.setAttribute('required', 'required');
                        }
                    }
                }

                // Jalankan toggle saat halaman dimuat (optional)
                document.addEventListener('DOMContentLoaded', function() {
                    toggleBiayaField(document.getElementById('edit_status'));
                });
            </script>
</body>

</html>
