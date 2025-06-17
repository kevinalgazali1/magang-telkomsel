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

        .modal-content {
            border-radius: 1rem;
            overflow: hidden;
        }

        .detail th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
        }

        .img-fluid {
            max-height: 250px;
            object-fit: cover;
        }

        /* WebKit (Chrome, Safari, Edge) */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            /* Warna default semi-transparan */
            border-radius: 4px;
            border: none;
        }

        /* Hilangkan panah (scrollbar buttons) */
        ::-webkit-scrollbar-button {
            display: none;
        }

        /* Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
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
                    <h4 class="fw-semibold">Data Sertifikasi</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah
                        Sertifikasi</button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

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
                                        <button class="btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $s->id }}" title="Edit"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <form action="{{ route('admin.sertifikasi') }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="{{ $s->id }}">
                                            <button type="button" class="btn-icon text-danger" title="Hapus"
                                                onclick="confirmDelete('{{ $s->id }}')">
                                                <i class="bi bi-trash-fill"></i>
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
            </div>

            {{-- Modal Tambah --}}
            <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('admin.sertifikasi') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="action" value="store">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Sertifikasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Judul Sertifikasi</label>
                                    <input type="text" class="form-control" name="judul_sertifikasi" required>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="tanggal_mulai" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="tanggal_selesai" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Biaya</label>
                                    <input type="number" class="form-control" name="biaya">
                                </div>
                                <div class="mb-3">
                                    <label>Kota</label>
                                    <input type="text" class="form-control" name="kota" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tempat</label>
                                    <input type="text" class="form-control" name="tempat" required>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Foto Sertifikasi</label>
                                    <input type="file" class="form-control" name="foto_sertifikasi" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach ($sertifikasis as $s)
                <div class="modal fade" id="modalLihat{{ $s->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content shadow-lg rounded-4">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Detail Sertifikasi</h5>
                            </div>
                            <div class="modal-body px-4 py-4">
                                <div class="row g-4">
                                    {{-- Kolom Kiri: Detail Sertifikasi --}}
                                    <div class="col-lg-6">
                                        @if ($s->foto_sertifikasi)
                                            <div class="mb-3">
                                                <img src="{{ asset('storage/' . $s->foto_sertifikasi) }}"
                                                    alt="Foto Sertifikasi"
                                                    class="img-fluid rounded-3 shadow-sm border w-100"
                                                    style="max-height: 280px; object-fit: cover;">
                                            </div>
                                        @endif

                                        <h4 class="fw-bold mb-2">{{ $s->judul_sertifikasi }}</h4>

                                        {{-- Scrollable Deskripsi --}}
                                        <div class="mb-3">
                                            <div style="max-height: 180px; overflow-y: auto;">
                                                <p class="mb-0" style="white-space: pre-line;">
                                                    {!! nl2br(e($s->deskripsi)) !!}</p>
                                            </div>
                                        </div>

                                    </div>


                                    {{-- Kolom Kanan: Daftar Peserta --}}
                                    <div class="col-lg-6">

                                        <div class="mb-2"><strong>📍 Lokasi:</strong> {{ $s->tempat }},
                                            {{ $s->kota }}
                                        </div>
                                        <div class="mb-2"><strong>📅 Tanggal:</strong> {{ $s->tanggal_mulai }} s/d
                                            {{ $s->tanggal_selesai }}</div>
                                        <div class="mb-2">
                                            <strong>📌 Status:</strong>
                                            <span
                                                class="badge bg-{{ $s->status == 'Aktif' ? 'success' : 'secondary' }}">
                                                {{ $s->status }}
                                            </span>
                                        </div>
                                        <div class="mb-2">
                                            <strong>💳 Harga Sertifikasi:</strong>
                                            @php
                                                $rawBiaya = str_replace('.', '', $s->biaya); // Hapus titik dari string
                                                $cleanBiaya = is_numeric($rawBiaya) ? (int) $rawBiaya : 0;
                                            @endphp

                                            {{ $cleanBiaya > 0 ? 'Rp ' . number_format($cleanBiaya, 0, ',', '.') : 'Gratis' }}

                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                                            <h5 class="fw-semibold mb-0">👥 Peserta Terdaftar</h5>

                                            {{-- Tombol Download --}}
                                            <button id="btnDownloadPeserta" data-id="{{ $s->id }}"
                                                class="btn btn-sm btn-outline-success d-flex align-items-center">
                                                <i class="bi bi-download me-1"></i> Download
                                            </button>
                                        </div>

                                        @if ($s->daftarSertifikasis && $s->daftarSertifikasis->count())
                                            <div class="table-responsive border rounded-3"
                                                style="max-height: 350px; overflow: auto;">
                                                <table
                                                    class="table table-sm table-bordered align-middle mb-0 small text-nowrap">
                                                    <thead class="table-light sticky-top">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>No HP</th>
                                                            <th>Sekolah</th>
                                                            <th>Jurusan</th>
                                                            <th>Gender</th>
                                                            <th>Tgl Lahir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($s->daftarSertifikasis as $peserta)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="text-truncate" style="max-width: 120px;">
                                                                    {{ $peserta->nama_lengkap }}</td>
                                                                <td class="text-truncate" style="max-width: 150px;">
                                                                    {{ $peserta->email }}</td>
                                                                <td>{{ $peserta->no_hp }}</td>
                                                                <td class="text-truncate" style="max-width: 100px;">
                                                                    {{ $peserta->asal_sekolah }}</td>
                                                                <td>{{ $peserta->jurusan }}</td>
                                                                <td>{{ $peserta->jenis_kelamin }}</td>
                                                                <td>{{ $peserta->tanggal_lahir }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p class="text-muted mt-2">Belum ada peserta yang mendaftar.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-end bg-light py-3">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Loop untuk Modal Edit --}}
            @foreach ($sertifikasis as $s)
                <div class="modal fade" id="modalEdit{{ $s->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel{{ $s->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content edit-modal-content">
                            <form method="POST" action="{{ route('admin.sertifikasi') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="{{ $s->id }}">

                                <div class="modal-header border-0">
                                    <h5 class="modal-title fw-semibold text-primary-emphasis">
                                        <i class="bi bi-pencil-square me-2"></i>Edit Sertifikasi
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <div class="row gx-4 gy-3">
                                        <!-- Left Section -->
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Judul Sertifikasi</label>
                                                <input type="text" class="form-control edit-input"
                                                    name="judul_sertifikasi" value="{{ $s->judul_sertifikasi }}"
                                                    required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control edit-input" name="deskripsi" rows="4" required>{{ $s->deskripsi }}</textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tanggal Mulai</label>
                                                    <input type="date" class="form-control edit-input"
                                                        name="tanggal_mulai" value="{{ $s->tanggal_mulai }}"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Tanggal Selesai</label>
                                                    <input type="date" class="form-control edit-input"
                                                        name="tanggal_selesai" value="{{ $s->tanggal_selesai }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Section -->
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Kota</label>
                                                <input type="text" class="form-control edit-input" name="kota"
                                                    value="{{ $s->kota }}" required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Tempat</label>
                                                <input type="text" class="form-control edit-input" name="tempat"
                                                    value="{{ $s->tempat }}" required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Status Sertifikasi</label>
                                                <select class="form-select edit-input" name="status"
                                                    onchange="toggleBiayaField({{ $s->id }})" required>
                                                    <option value="Berbayar"
                                                        {{ $s->status == 'Berbayar' ? 'selected' : '' }}>Berbayar
                                                    </option>
                                                    <option value="Gratis"
                                                        {{ $s->status == 'Gratis' ? 'selected' : '' }}>Gratis</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3" id="edit_biaya_wrapper_{{ $s->id }}">
                                                <label class="form-label">Biaya (Rp)</label>
                                                <input type="number" class="form-control edit-input" name="biaya"
                                                    value="{{ preg_replace('/\D/', '', $s->biaya) }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Upload Foto Sertifikasi (Opsional)</label>
                                                <input type="file" class="form-control edit-input"
                                                    name="foto_sertifikasi" accept=".jpg,.jpeg,.png"
                                                    onchange="previewImage(this, 'preview_foto_{{ $s->id }}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function toggleBiayaField(id) {
            const status = document.querySelector(`#modalEdit${id} select[name="status"]`).value;
            const biayaWrapper = document.getElementById(`edit_biaya_wrapper_${id}`);
            if (status === "Gratis") {
                biayaWrapper.style.display = 'none';
            } else {
                biayaWrapper.style.display = 'block';
            }
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Sertifikasi?',
                text: "Data sertifikasi yang dihapus tidak dapat dikembalikan.",
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
                    form.action = "{{ route('admin.sertifikasi') }}";

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
        document.addEventListener('DOMContentLoaded', function() {
            const downloadBtn = document.getElementById('btnDownloadPeserta');

            if (downloadBtn) {
                downloadBtn.addEventListener('click', function() {
                    const sertifikasiId = this.getAttribute('data-id');

                    if (sertifikasiId) {
                        // Trigger download CSV
                        window.location.href = `/public/sertifikasi/${sertifikasiId}/peserta/export`;
                    }
                });
            }
        });
    </script>
</body>


</html>
