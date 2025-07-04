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

                <div class="container-fluid content py-4 px-0">
                    <div class="row g-4 mb-2 px-4">
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 rounded-3 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-primary bg-opacity-10 text-primary rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-bar-chart-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Total Loker</h6>
                                        <h3 class="mb-0 fw-bold">{{ $totalLoker ?? 0 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 rounded-3 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-success bg-opacity-10 text-success rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-people-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Pengguna Terdaftar</h6>
                                        <h3 class="mb-0 fw-bold">{{ $persentaseLokerTerdaftar ?? 0 }}%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow-sm border-0 rounded-3 h-100">
                                <div class="card-body d-flex align-items-center gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-info bg-opacity-10 text-info rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-check-circle fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-muted mb-1">Pelatihan Selesai</h6>
                                        <h3 class="mb-0 fw-bold">0</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="GET" action="" class="mb-4 px-4">
                    <div class="row g-3 mb-3">

                        {{-- Nama Perusahaan / Lowongan --}}
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Nama Mitra</label>
                            <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                                name="mitra" value="{{ request('mitra') }}"
                                placeholder="Contoh: PT Mitra, Staff, Makassar">
                        </div>

                        {{-- Nama Mitra --}}
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-muted">Nama Perusahaan</label>
                            <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                                name="nama_perusahaan" value="{{ request('nama_perusahaan') }}"
                                placeholder="Contoh: PT Mitra Skul">
                        </div>

                        {{-- Lokasi --}}
                        <div class="col-md-2">
                            <label class="form-label fw-semibold small text-muted">Lokasi</label>
                            <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                                name="lokasi" value="{{ request('lokasi') }}" placeholder="Contoh: Makassar">
                        </div>

                        {{-- Tipe --}}
                        <div class="col-md-2">
                            <label class="form-label fw-semibold small text-muted">Tipe Kerja</label>
                            <select class="form-select" name="tipe">
                                <option value="">Semua Tipe</option>
                                <option value="Full Time" {{ request('tipe') == 'Full Time' ? 'selected' : '' }}>Full
                                    Time</option>
                                <option value="Part Time" {{ request('tipe') == 'Part Time' ? 'selected' : '' }}>Part
                                    Time</option>
                                <option value="Remote" {{ request('tipe') == 'Remote' ? 'selected' : '' }}>Remote
                                </option>
                            </select>
                        </div>

                        {{-- Status Lowongan --}}
                        <div class="col-md-2">
                            <label class="form-label fw-semibold small text-muted">Status Lowongan</label>
                            <select class="form-select" name="status">
                                <option value="">Semua Status</option>
                                <option value="buka" {{ request('status') == 'buka' ? 'selected' : '' }}>Buka
                                </option>
                                <option value="tutup" {{ request('status') == 'tutup' ? 'selected' : '' }}>Tutup
                                </option>
                            </select>
                        </div>

                        {{-- Tombol --}}
                        <div class="col d-flex justify-content-end gap-2 align-items-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-search me-1"></i> Terapkan
                            </button>
                            <a href="{{ route('admin.loker') }}"
                                class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-arrow-clockwise me-1"></i> Reset
                            </a>
                            <a href="{{ route('admin.pelatihan.export', request()->query()) }}"
                                class="btn btn-success rounded-pill px-4 shadow-sm">
                                <i class="bi bi-file-earmark-excel me-1"></i> Excel
                            </a>
                            <button type="button" class="btn btn-outline-primary rounded-pill px-4 shadow-sm"
                                data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-plus-circle me-1"></i> Tambah
                            </button>
                        </div>
                    </div>
                </form>


                <div class="table-responsive">
                    <table class="table pelatihan-table table-hover align-middle mb-0" id="pelatihanTable">
                        <thead class="table-light text-center text-uppercase small">
                            <tr>
                                <th>No</th>
                                <th>Mitra</th>
                                <th>Perusahaan</th>
                                <th>Posisi</th>
                                <th>Peserta</th>
                                <th>Sekolah</th>
                                <th>Jurusan</th>
                                <th>Bekerja</th>
                                <th>Tidak Bekerja</th>
                                <th>Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lokers as $index => $l)
                                <tr class="text-center">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="fw-semibold">{{ $l->user->mitraProfile->nama_instansi ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="pelatihan-name">
                                        <div class="fw-semibold">{{ $l->nama_perusahaan }}</div>
                                    </td>
                                    <td class="text-center">{{ $l->posisi }}</td>
                                    <td class="text-center">{{ $l->daftarLoker->count() }}</td>
                                    <td class="text-center">{{ $l->jumlah_asal_sekolah }}</td>
                                    <td class="text-center">{{ $l->jumlah_jurusan }}</td>
                                    <td class="text-center">{{ $l->jumlah_bekerja_dan_usaha }}</td>
                                    <td class="text-center">{{ $l->jumlah_tidak_bekerja }}</td>
                                    <td class="text-center">{{ $l->jumlah_kuliah }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" data-bs-auto-close="outside">
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#lihat{{ $l->id }}">
                                                        <i class="bi bi-eye me-2"></i> Lihat
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $l->id }}">
                                                        <i class="bi bi-pencil me-2"></i> Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item text-danger"
                                                        onclick="confirmDelete('{{ $l->id }}')">
                                                        <i class="bi bi-trash me-2"></i> Hapus
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
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
                                                            oninput="formatRupiah(this)" value="{{ $l->gaji }}">
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

            <nav>
                <ul class="pagination mb-0">
                    {{-- Previous Page Link --}}
                    @if ($lokers->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $lokers->previousPageUrl() }}"
                                rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($lokers->getUrlRange(1, $lokers->lastPage()) as $page => $url)
                        @if ($page == $lokers->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span>
                            </li>
                        @elseif ($page == 1 || $page == $lokers->lastPage() || abs($page - $lokers->currentPage()) <= 1)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == 2 || $page == $lokers->lastPage() - 1)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($lokers->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $lokers->nextPageUrl() }}"
                                rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </nav>

            {{-- Modal Tambah --}}
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLokerLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                        <div class="row g-0">

                            <!-- Ilustrasi Kiri -->
                            <div
                                class="col-md-5 d-none d-md-flex bg-light flex-column justify-content-center align-items-center p-4">
                                <h5 class="text-primary fw-bold">Tambah Lowongan Kerja</h5>
                                <p class="text-muted text-center px-3">
                                    Tambahkan informasi lowongan pekerjaan baru untuk alumni sesuai kebutuhan mitra
                                    perusahaan.
                                </p>
                            </div>

                            <!-- Form Tambah -->
                            <div class="col-md-7 bg-white">
                                <form action="{{ route('admin.loker.store') }}" method="POST"
                                    enctype="multipart/form-data" class="p-4" id="formTambahLoker">
                                    @csrf
                                    <input type="hidden" name="action" value="store">

                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold" id="modalTambahLokerLabel">
                                            <i class="bi bi-briefcase-fill me-2 text-primary"></i>Tambah Loker
                                        </h5>
                                    </div>

                                    <div class="modal-body overflow-auto" style="max-height: 65vh;">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Perusahaan</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                <input type="text" name="nama_perusahaan" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Posisi</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="bi bi-person-badge"></i></span>
                                                <input type="text" name="posisi" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Tipe Kerja</label>
                                                <select name="tipe" class="form-select" required>
                                                    <option value="">Pilih Tipe</option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Remote">Remote</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Pendidikan Minimal</label>
                                            <select name="pendidikan" class="form-select" required>
                                                <option value="">Pilih Pendidikan</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Rentang Gaji (Rp)</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" id="gaji_min_view"
                                                        placeholder="Minimum" required
                                                        oninput="syncGaji(this, 'min')">
                                                    <input type="hidden" name="gaji_min" id="gaji_min">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="gaji_max_view"
                                                        placeholder="Maksimum" required
                                                        oninput="syncGaji(this, 'max')">
                                                    <input type="hidden" name="gaji_max" id="gaji_max">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat tentang pekerjaan..."
                                                required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Upload Gambar</label>
                                            <input type="file" name="gambar" class="form-control"
                                                accept=".jpg,.jpeg,.png" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function syncGaji(input, type) {
                    // Hilangkan karakter non-digit
                    let raw = input.value.replace(/\D/g, '');
                    let formatted = new Intl.NumberFormat('id-ID').format(raw);
                    input.value = formatted;

                    // Set ke input hidden
                    if (type === 'min') {
                        document.getElementById('gaji_min').value = raw;
                    } else if (type === 'max') {
                        document.getElementById('gaji_max').value = raw;
                    }
                }
            </script>
            <script>
                document.getElementById('formTambahLoker').addEventListener('submit', function(e) {
                    const min = parseInt(document.getElementById('gaji_min').value || '0');
                    const max = parseInt(document.getElementById('gaji_max').value || '0');

                    if (min > max) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Rentang Gaji Tidak Valid',
                            text: 'Gaji minimum tidak boleh lebih besar dari gaji maksimum.',
                        });
                    }
                });
            </script>
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
                        title: 'Hapus Loker?',
                        text: "Data loker yang dihapus tidak dapat dikembalikan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Buat form dinamis & submit
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = "{{ route('admin.loker') }}";

                            form.innerHTML = `
                          @csrf
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="id" value="${id}">
                        `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }

                function confirmTambah() {
                    Swal.fire({
                        title: 'Simpan Loker?',
                        text: "Pastikan semua informasi sudah lengkap dan benar.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Simpan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('tambahForm').submit();
                        }
                    });
                }

                function confirmEdit() {
                    Swal.fire({
                        title: 'Perbarui Loker?',
                        text: "Pastikan semua data sudah benar.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#0d6efd',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, perbarui!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('editForm').submit();
                        }
                    });
                }

                function formatRupiah(input) {
                    let value = input.value.replace(/\D/g, '');
                    input.value = new Intl.NumberFormat('id-ID').format(value);
                }

                function formatRupiah(input) {
                    let value = input.value.replace(/\D/g, ''); // Hapus semua karakter non-digit
                    let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambah titik setiap 3 digit dari belakang
                    input.value = formatted;
                }
            </script>
</body>

</html>
