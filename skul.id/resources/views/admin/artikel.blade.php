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

            <!-- Page Content -->
            <main class="container-fluid py-5 px-4">

                <!-- Header + Button -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-semibold">Manajemen Artikel</h3>
                    <a href="#" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal"
                        data-bs-target="#tambahArtikelModal">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Artikel
                    </a>
                </div>

                {{-- Modal Artikel --}}
                @foreach ($artikel as $item)
                    <!-- Modal -->
                    <div class="modal fade" id="artikelModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="artikelModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div>
                                        <h5 class="modal-title" id="artikelModalLabel{{ $item->id }}">
                                            {{ $item->judul }}</h5>
                                        <small class="text-muted">Ditulis oleh {{ $item->penulis }}</small>
                                        <br>
                                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $item->gambar_artikel) }}"
                                        alt="Gambar Artikel {{ $item->judul }}" class="img-fluid mb-3 rounded">
                                    {!! nl2br(e($item->isi)) !!}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Tabel Artikel -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-4">Daftar Lengkap Artikel</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Tanggal</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($artikel as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->penulis }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-outline-primary" title="Lihat"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#artikelModal{{ $item->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-warning"
                                                    title="Edit" data-bs-toggle="modal"
                                                    data-bs-target="#editArtikelModal{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form id="deleteForm-{{ $item->id }}"
                                                    action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="confirmDelete({{ $item->id }})" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Belum ada artikel yang
                                                tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="tambahArtikelModal" tabindex="-1" aria-labelledby="tambahArtikelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahArtikelModalLabel">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis Artikel</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Artikel</label>
                            <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="gambar_artikel" class="form-label">Gambar Artikel</label>
                            <input class="form-control" type="file" id="gambar_artikel" name="gambar_artikel"
                                accept="image/*">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($artikel as $item)
        <!-- Modal Edit Artikel -->
        <div class="modal fade" id="editArtikelModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="editArtikelModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('admin.artikel.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editArtikelModalLabel{{ $item->id }}">Edit Artikel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="judul{{ $item->id }}" class="form-label">Judul Artikel</label>
                                <input type="text" class="form-control" id="judul{{ $item->id }}"
                                    name="judul" value="{{ $item->judul }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="penulis{{ $item->id }}" class="form-label">Penulis Artikel</label>
                                <input type="text" class="form-control" id="penulis{{ $item->id }}"
                                    name="penulis" value="{{ $item->penulis }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="isi{{ $item->id }}" class="form-label">Isi Artikel</label>
                                <textarea class="form-control" id="isi{{ $item->id }}" name="isi" rows="5" required>{{ $item->isi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar_artikel{{ $item->id }}" class="form-label">Gambar
                                    Artikel</label>
                                <input class="form-control" type="file" id="gambar_artikel{{ $item->id }}"
                                    name="gambar_artikel" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Bootstrap JS -->
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
                text: "Data sertifikasi akan dihapus permanen!",
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
