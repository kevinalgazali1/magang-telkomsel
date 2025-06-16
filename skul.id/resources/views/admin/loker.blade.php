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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-auto">
                    @csrf
                    <a href="#" class="nav-link d-flex align-items-center text-danger fw-semibold mb-4"
                        onclick="confirmLogout(event)">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah
                        Loker</button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
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
                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                            data-bs-target="#modalLihat{{ $l->id }}">Lihat</button>
                                        <button class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $l->id }}">Edit</button>
                                        <form action="{{ route('admin.loker') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="{{ $l->id }}">
                                            <button onclick="return confirm('Yakin hapus loker ini?')"
                                                class="btn btn-sm btn-danger">Hapus</button>
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
                                <div class="modal fade" id="modalEdit{{ $l->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.loker') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="id" value="{{ $l->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Loker</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Nama Perusahaan</label>
                                                        <input type="text" name="nama_perusahaan"
                                                            class="form-control" value="{{ $l->nama_perusahaan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Posisi</label>
                                                        <input type="text" name="posisi" class="form-control"
                                                            value="{{ $l->posisi }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Lokasi</label>
                                                        <input type="text" name="lokasi" class="form-control"
                                                            value="{{ $l->lokasi }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Tipe</label>
                                                        <input type="text" name="tipe" class="form-control"
                                                            value="{{ $l->tipe }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Pendidikan</label>
                                                        <input type="text" name="pendidikan" class="form-control"
                                                            value="{{ $l->pendidikan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gaji</label>
                                                        <input type="text" name="gaji" class="form-control"
                                                            value="{{ $l->gaji }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control" rows="3">{{ $l->deskripsi }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Ganti Gambar (opsional)</label>
                                                        <input type="file" name="gambar" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success">Update</button>
                                                    <button class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
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
            <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('admin.loker') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="action" value="store">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Loker</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Posisi</label>
                                    <input type="text" name="posisi" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tipe</label>
                                    <input type="text" name="tipe" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Pendidikan</label>
                                    <input type="text" name="pendidikan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Gaji</label>
                                    <input type="text" name="gaji" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Simpan</button>
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function confirmLogout() {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin logout?',
                        text: "Anda akan keluar dari akun ini.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, logout!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logout-form').submit();
                        }
                    });
                }
            </script>
</body>

</html>
