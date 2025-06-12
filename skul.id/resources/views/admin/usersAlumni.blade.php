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

        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 30px;
        }

        .nav-title {
            font-weight: 600;
            font-size: 18px;
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
            <div class="topbar d-flex justify-content-between align-items-center">
                <span class="nav-title">{{ $title ?? 'Dashboard' }}</span>
                <span class="text-muted">Hi, Admin</span>
            </div>

            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold">Data Users (Alumni Siswa)</h4>
                    <a href="{{ route('export.alumni.csv') }}" class="btn btn-success">
                        ⬇ Download Data Alumni (CSV)
                    </a>

                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Tahun Kelulusan</th>
                                <th>Asal Sekolah</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($profiles as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->tahun_kelulusan ?? '-' }}</td>
                                    <td>{{ $p->asal_sekolah }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>{{ $p->status_saat_ini }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $p->id }}">Edit</button>
                                        <form action="{{ route('admin.usersalumni') }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <button onclick="return confirm('Yakin hapus data ini?')"
                                                class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="modalEdit{{ $p->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.usersalumni') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <!-- Form input fields tetap sama -->
                                                        <div class="col-md-6">
                                                            <label class="form-label">Nama Lengkap</label>
                                                            <input type="text" name="nama_lengkap"
                                                                class="form-control" value="{{ $p->nama_lengkap }}"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">NIK</label>
                                                            <input type="text" name="nik" class="form-control"
                                                                value="{{ $p->nik }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tahun Kelulusan</label>
                                                            <input type="number" name="tahun_kelulusan"
                                                                class="form-control"
                                                                value="{{ $p->tahun_kelulusan }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Asal Sekolah</label>
                                                            <input type="text" name="asal_sekolah"
                                                                class="form-control" value="{{ $p->asal_sekolah }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" class="form-select" required>
                                                                <option value="">-- Pilih --</option>
                                                                <option value="Laki-laki"
                                                                    {{ $p->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    {{ $p->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status Saat Ini</label>
                                                            <input type="text" name="status_saat_ini"
                                                                class="form-control"
                                                                value="{{ $p->status_saat_ini }}">
                                                        </div>
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
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Data alumni belum ada.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            {{-- Modal Tambah --}}
            <div class="modal fade" id="modalTambah" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('admin.usersalumni') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" value="store">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah User</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">NIK</label>
                                        <input type="text" name="nik" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tahun Kelulusan</label>
                                        <input type="number" name="tahun_kelulusan" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status Saat Ini</label>
                                        <input type="text" name="status_saat_ini" class="form-control">
                                    </div>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
