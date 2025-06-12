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
                    <h4 class="fw-semibold">Data Pelatihan</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelatihanModal">+ Tambah
                        Pelatihan</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Mitra</th>
                                <th>Nama</th>
                                <th>Tempat</th>
                                <th>Tanggal</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelatihans as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $p->user->mitraProfile->nama_instansi ?? '-' }}</td>
                                    <td>{{ $p->nama_pelatihan }}</td>
                                    <td>{{ $p->tempat_pelatihan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M') }} -
                                        {{ \Carbon\Carbon::parse($p->tanggal_selesai)->format('d M Y') }}</td>
                                    <td>{{ $p->kota }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#lihat{{ $p->id }}"><i
                                                class="bi bi-eye"></i></button>
                                        <a href="#" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editPelatihanModal" data-id="{{ $p->id }}"
                                            data-nama_pelatihan="{{ $p->nama_pelatihan }}"
                                            data-deskripsi="{{ $p->deskripsi }}" data-mulai="{{ $p->tanggal_mulai }}"
                                            data-selesai="{{ $p->tanggal_selesai }}" data-kota="{{ $p->kota }}"
                                            data-tempat_pelatihan="{{ $p->tempat_pelatihan }}"
                                            data-biaya="{{ $p->biaya }}"
                                            data-foto="{{ asset('storage/' . $p->foto_pelatihan) }}"
                                            data-status="{{ $p->status }}"
                                            data-action="{{ route('admin.pelatihan.update', $p->id) }}"
                                            onclick="openEditPelatihanModal(this)">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form id="deleteForm-{{ $p->id }}"
                                            action="{{ route('admin.pelatihan.destroy', $p->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                onclick="confirmDelete({{ $p->id }})" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Lihat --}}
                                <div class="modal fade" id="lihat{{ $p->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Pelatihan</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{ $p->nama_pelatihan }}</h5>
                                                <p><strong>Tempat:</strong> {{ $p->tempat_pelatihan }}</p>
                                                <p><strong>Tanggal:</strong> {{ $p->tanggal_mulai }} -
                                                    {{ $p->tanggal_selesai }}</p>
                                                <p><strong>Deskripsi:</strong> {{ $p->deskripsi }}</p>
                                                <p><strong>Biaya:</strong> {{ $p->biaya ?? '-' }}</p>
                                                <p><strong>Kota:</strong> {{ $p->kota }}</p>
                                                <p><strong>Status:</strong> {{ $p->status }}</p>
                                                @if ($p->foto_pelatihan)
                                                    <img src="{{ asset('storage/' . $p->foto_pelatihan) }}"
                                                        class="img-fluid rounded mt-3" alt="Foto Pelatihan">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editPelatihanModal" tabindex="-1"
                                    aria-labelledby="editPelatihanModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="" id="editForm" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editPelatihanModalLabel">Edit
                                                        Sertifikasi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Tutup"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="edit_id">
                                                    <div class="mb-3">
                                                        <label for="edit_nama_pelatihan" class="form-label">Judul
                                                            Pelatihan</label>
                                                        <input type="text" class="form-control"
                                                            id="edit_nama_pelatihan" name="nama_pelatihan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_deskripsi"
                                                            class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" required></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_tanggal_mulai" class="form-label">Waktu
                                                                Mulai</label>
                                                            <input type="date" class="form-control"
                                                                id="edit_tanggal_mulai" name="tanggal_mulai" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="edit_tanggal_selesai" class="form-label">Waktu
                                                                Selesai</label>
                                                            <input type="date" class="form-control"
                                                                id="edit_tanggal_selesai" name="tanggal_selesai"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_kota" class="form-label">Kota</label>
                                                        <input type="text" class="form-control" id="edit_kota"
                                                            name="kota" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_tempat_pelatihan"
                                                            class="form-label">Tempat</label>
                                                        <input type="text" class="form-control"
                                                            id="edit_tempat_pelatihan" name="tempat_pelatihan"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_status" class="form-label">Status</label>
                                                        <select class="form-select" id="edit_status" name="status"
                                                            onchange="toggleBiayaField(this)" required>
                                                            <option value="">Pilih Status</option>
                                                            <option value="Gratis">Gratis</option>
                                                            <option value="Berbayar">Berbayar</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3" id="group_biaya_edit">
                                                        <label for="edit_biaya" class="form-label">Biaya (Rp)</label>
                                                        <input type="text" class="form-control" id="edit_biaya"
                                                            name="biaya" oninput="formatRupiah(this)">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_foto_pelatihan" class="form-label">Upload
                                                            Foto Baru
                                                            (Opsional)
                                                        </label>
                                                        <input type="file" class="form-control"
                                                            id="edit_foto_pelatihan" name="foto_pelatihan"
                                                            accept=".jpg,.jpeg,.png">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Modal Tambah --}}
            <div class="modal fade" id="pelatihanModal" tabindex="-1" aria-labelledby="pelatihanModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('admin.pelatihan.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="pelatihanModalLabel">Form Tambah Pelatihan
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_pelatihan" class="form-label">Judul
                                        Sertifikasi</label>
                                    <input type="text" class="form-control" id="nama_pelatihan"
                                        name="nama_pelatihan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="date" class="form-control" id="tanggal_mulai"
                                            name="tanggal_mulai" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_selesai" class="form-label">Waktu Selesai</label>
                                        <input type="date" class="form-control" id="tanggal_selesai"
                                            name="tanggal_selesai" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota Penyelenggaraan</label>
                                    <input type="text" class="form-control" id="kota" name="kota"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_pelatihan" class="form-label">Tempat
                                        Penyelenggaraan</label>
                                    <input type="text" class="form-control" id="tempat_pelatihan"
                                        name="tempat_pelatihan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status"
                                        onchange="toggleBiayaField(this)" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Gratis">Gratis</option>
                                        <option value="Berbayar">Berbayar</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="group_biaya_tambah">
                                    <label for="biaya" class="form-label">Biaya Pelatihan (Rp)</label>
                                    <input type="text" class="form-control" id="biaya" name="biaya"
                                        oninput="formatRupiah(this)">
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Upload Foto Sertifikasi</label>
                                    <input type="file" class="form-control" id="foto_pelatihan"
                                        name="foto_pelatihan" accept=".jpg,.jpeg,.png" required>
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
                function openEditPelatihanModal(button) {
                    const id = button.getAttribute('data-id');
                    const nama_pelatihan = button.getAttribute('data-nama_pelatihan');
                    const deskripsi = button.getAttribute('data-deskripsi');
                    const mulai = button.getAttribute('data-mulai');
                    const selesai = button.getAttribute('data-selesai');
                    const kota = button.getAttribute('data-kota');
                    const tempat_pelatihan = button.getAttribute('data-tempat_pelatihan');
                    const biaya = button.getAttribute('data-biaya');
                    const foto = button.getAttribute('data-foto');
                    const status = button.getAttribute('data-status');
                    const action = button.getAttribute('data-action');

                    document.getElementById('edit_nama_pelatihan').value = nama_pelatihan;
                    document.getElementById('edit_deskripsi').value = deskripsi;
                    document.getElementById('edit_tanggal_mulai').value = mulai;
                    document.getElementById('edit_tanggal_selesai').value = selesai;
                    document.getElementById('edit_kota').value = kota;
                    document.getElementById('edit_tempat_pelatihan').value = tempat_pelatihan;
                    document.getElementById('edit_status').value = status;
                    document.getElementById('edit_biaya').value = biaya ? formatAngkaRupiah(biaya) : '';
                    document.getElementById('preview_foto_edit').src = foto;
                    document.getElementById('editForm').action = action;

                    toggleBiayaField(document.getElementById('edit_status'));
                }

                function formatRupiah(input) {
                    let value = input.value.replace(/\D/g, '');
                    let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    input.value = formatted;
                }

                function formatAngkaRupiah(angka) {
                    let value = angka.toString().replace(/\D/g, '');
                    return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                }

                function toggleBiayaField(select) {
                    const status = select.value;
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

                document.addEventListener('DOMContentLoaded', function() {
                    toggleBiayaField(document.getElementById('edit_status'));
                });
            </script>

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
</body>

</html>
