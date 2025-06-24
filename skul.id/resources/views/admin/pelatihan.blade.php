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
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
            /* Biar main konten mengisi ruang kosong */
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

        .pelatihan-table {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            width: 100%;
        }

        .pelatihan-table thead {
            background-color: #f1f3f5;
        }

        .pelatihan-table thead th {
            font-weight: 600;
            color: #343a40;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .pelatihan-table tbody tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.3s ease;
            background-color: #fff !important;
        }

        .pelatihan-table tbody tr:hover {
            transform: scale(1.02);
            background-color: #ffffff !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            color: #fff;
            z-index: 1;
            position: relative;
        }


        .pelatihan-table td,
        .pelatihan-table th {
            vertical-align: middle;
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
        }

        .pelatihan-table .btn-group .btn {
            padding: 0.3rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.375rem;
        }

        .pelatihan-table .badge {
            font-size: 0.7rem;
            padding: 0.35em 0.5em;
            border-radius: 0.375rem;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
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

        .pagination {
            display: flex;
            gap: 0.25rem;
        }

        .pagination .page-item {
            list-style: none;
        }

        .pagination .page-link {
            padding: 0.4rem 0.75rem;
            border: 1px solid #ddd;
            color: #0d6efd;
            background-color: #fff;
            border-radius: 0.25rem;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f8f9fa;
            color: #6c757d;
            pointer-events: none;
        }

        footer {
            width: auto;
            flex-shrink: 0;
            margin-left: 200px;
        }

        #tableLoading {
            min-height: 200px;
        }

        .fade {
            opacity: 0;
            transition: opacity 0.3s;
        }

        .show {
            opacity: 1;
        }

        .pelatihan-table-wrapper.fade {
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }
    </style>
</head>

<body>

    <div class="d-flex">
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

        <div class="flex-grow-1">

            <div class="topbar d-flex justify-content-between align-items-center bg-primary text-light p-3">
                <span class="nav-title">{{ $title ?? 'Dashboard' }}</span>
                <span class="text-light">Hi, Admin</span>
            </div>

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
                                    <h6 class="text-muted mb-1">Total Pelatihan</h6>
                                    <h3 class="mb-0 fw-bold">{{ $totalPelatihan ?? 0 }}</h3>
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
                                    <h3 class="mb-0 fw-bold">{{ $persentaseUserTerdaftar ?? 0 }}%</h3>
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
                                    <h3 class="mb-0 fw-bold">{{ $totalPelatihanSelesai ?? 0 }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form method="GET" action="" class="mb-4 px-4">
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label class="form-label fw-medium text-secondary small mb-1">Cari Nama Pelatihan</label>
                        <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                            name="search" value="{{ request('search') }}" placeholder="Nama Pelatihan">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-medium text-secondary small mb-1">Nama Mitra</label>
                        <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                            name="mitra" value="{{ request('mitra') }}" placeholder="Nama Mitra">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-medium text-secondary small mb-1">Kota</label>
                        <input type="text" class="form-control rounded-3 shadow-sm border border-light-subtle"
                            name="kota" value="{{ request('kota') }}" placeholder="Kota">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-medium text-secondary small mb-1">Status</label>
                        <select class="form-select rounded-3 shadow-sm border border-light-subtle" name="status">
                            <option value="">Semua</option>
                            <option value="Berbayar" {{ request('status') == 'Berbayar' ? 'selected' : '' }}>Berbayar
                            </option>
                            <option value="Gratis" {{ request('status') == 'Gratis' ? 'selected' : '' }}>Gratis
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-end mb-3">
                    <div class="col-md-7">
                        <label class="form-label fw-medium text-secondary small mb-1">Rentang Tanggal Mulai</label>
                        <div class="input-group shadow-sm rounded-3 border border-light-subtle overflow-hidden">
                            <input type="date" class="form-control border-0" name="tanggal_mulai"
                                value="{{ request('tanggal_mulai') }}">
                            <span class="input-group-text bg-body-tertiary border-0 text-secondary small">s/d</span>
                            <input type="date" class="form-control border-0" name="tanggal_selesai"
                                value="{{ request('tanggal_selesai') }}">
                        </div>
                    </div>

                    <div class="col-md-5 text-end d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-search me-1"></i> Terapkan
                        </button>
                        <a href="{{ route('admin.pelatihan') }}"
                            class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-arrow-clockwise me-1"></i> Reset
                        </a>
                        <a href="#" class="btn btn-success rounded-pill px-4 shadow-sm">
                            <i class="bi bi-download me-1"></i> CSV
                        </a>
                        <button type="button" class="btn btn-outline-primary rounded-pill px-4 shadow-sm"
                            data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="bi bi-plus-circle me-1"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive pelatihan-table-wrapper">
                <div id="tableLoading" class="d-none text-center py-5">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <table class="table pelatihan-table table-hover align-middle mb-0" id="pelatihanTable">
                    <thead class="table-light text-center text-uppercase small">
                        <tr>
                            <th>No</th>
                            <th>Mitra</th>
                            <th>Nama Pelatihan</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Kota</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelatihans as $i => $p)
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $p->user->mitraProfile->nama_instansi ?? '-' }}</div>
                                    <div class="text-muted small">{{ $p->user->email ?? '-' }}</div>
                                </td>
                                <td class="pelatihan-name">
                                    <div class="fw-semibold">{{ $p->nama_pelatihan }}</div>
                                    <div class="text-muted small">{{ Str::limit($p->deskripsi, 40) }}</div>
                                </td>
                                <td class="text-center">{{ $p->tempat_pelatihan }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M') }} -
                                    {{ \Carbon\Carbon::parse($p->tanggal_selesai)->format('d M Y') }}
                                </td>
                                <td class="text-center">{{ $p->kota }}</td>
                                <td class="text-center pelatihan-status">
                                    <span
                                        class="badge-soft {{ $p->status == 'Gratis' ? 'badge-aktif' : 'badge-nonaktif' }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#lihat{{ $p->id }}">
                                                    <i class="bi bi-eye me-2"></i> Lihat
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $p->id }}">
                                                    <i class="bi bi-pencil me-2"></i> Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger"
                                                    onclick="confirmDelete('{{ $p->id }}')">
                                                    <i class="bi bi-trash me-2"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            {{-- Modal Lihat --}}
                            <div class="modal fade" id="lihat{{ $p->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content shadow-lg rounded-4">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Detail Pelatihan</h5>
                                        </div>
                                        <div class="modal-body px-4 py-4">
                                            <div class="row g-4">

                                                {{-- Kolom Kiri: Foto & Deskripsi --}}
                                                <div class="col-lg-6">
                                                    @if ($p->foto_pelatihan)
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $p->foto_pelatihan) }}"
                                                                alt="Foto Pelatihan"
                                                                class="img-fluid rounded-3 shadow-sm border w-100"
                                                                style="max-height: 280px; object-fit: cover;">
                                                        </div>
                                                    @endif

                                                    <h4 class="fw-bold mb-2">{{ $p->nama_pelatihan }}</h4>

                                                    <div class="mb-3">
                                                        <div style="max-height: 180px; overflow-y: auto;">
                                                            <p class="mb-0" style="white-space: pre-line;">
                                                                {!! nl2br(e($p->deskripsi)) !!}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Kolom Kanan: Informasi Pelatihan --}}
                                                <div class="col-lg-6">
                                                    <div class="mb-2"><strong>📍 Tempat:</strong>
                                                        {{ $p->tempat_pelatihan }}, {{ $p->kota }}</div>
                                                    <div class="mb-2"><strong>📅 Tanggal:</strong>
                                                        {{ $p->tanggal_mulai }} s/d {{ $p->tanggal_selesai }}</div>
                                                    <div class="mb-2">
                                                        <strong>📌 Status:</strong>
                                                        <span
                                                            class="badge bg-{{ $p->status == 'Berbayar' ? 'warning' : 'success' }}">
                                                            {{ $p->status }}
                                                        </span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <strong>💳 Biaya:</strong>
                                                        @php
                                                            $rawBiaya = str_replace('.', '', $p->biaya);
                                                            $cleanBiaya = is_numeric($rawBiaya) ? (int) $rawBiaya : 0;
                                                        @endphp
                                                        {{ $cleanBiaya > 0 ? 'Rp ' . number_format($cleanBiaya, 0, ',', '.') : 'Gratis' }}
                                                    </div>

                                                    {{-- Daftar Peserta --}}
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-3 mt-5">
                                                        <h5 class="fw-semibold mb-0">👥 Peserta Terdaftar</h5>

                                                        {{-- Tombol Download Peserta --}}
                                                        <button
                                                            class="btn btn-sm btn-outline-success">Download</button>
                                                    </div>

                                                    @if ($p->daftarPelatihans && $p->daftarPelatihans->count())
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
                                                                    @foreach ($p->daftarPelatihans as $peserta)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td class="text-truncate"
                                                                                style="max-width: 120px;">
                                                                                {{ $peserta->nama_lengkap }}</td>
                                                                            <td class="text-truncate"
                                                                                style="max-width: 150px;">
                                                                                {{ $peserta->email }}</td>
                                                                            <td>{{ $peserta->no_hp }}</td>
                                                                            <td class="text-truncate"
                                                                                style="max-width: 100px;">
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
                                                        <p class="text-muted mt-2">Belum ada peserta yang mendaftar.
                                                        </p>
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


                            {{-- Modal Edit --}}
                            <div class="modal fade" id="edit{{ $p->id }}" tabindex="-1"
                                aria-labelledby="editPelatihanModalLabel{{ $p->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content edit-modal-content">
                                        <form action="{{ route('admin.pelatihan') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="id" value="{{ $p->id }}">

                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-semibold text-primary-emphasis">
                                                    <i class="bi bi-pencil-square me-2"></i> Edit Pelatihan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row gx-4 gy-3">
                                                    <!-- Left Column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Judul Pelatihan</label>
                                                            <input type="text" class="form-control edit-input"
                                                                name="nama_pelatihan"
                                                                value="{{ $p->nama_pelatihan }}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control edit-input" name="deskripsi" rows="4" required>{{ $p->deskripsi }}</textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Tanggal Mulai</label>
                                                                <input type="date" class="form-control edit-input"
                                                                    name="tanggal_mulai"
                                                                    value="{{ $p->tanggal_mulai }}" required>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Tanggal Selesai</label>
                                                                <input type="date" class="form-control edit-input"
                                                                    name="tanggal_selesai"
                                                                    value="{{ $p->tanggal_selesai }}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Right Column -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Kota</label>
                                                            <input type="text" class="form-control edit-input"
                                                                name="kota" value="{{ $p->kota }}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Tempat</label>
                                                            <input type="text" class="form-control edit-input"
                                                                name="tempat_pelatihan"
                                                                value="{{ $p->tempat_pelatihan }}" required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="form-label">Status Pelatihan</label>
                                                            <select class="form-select edit-input" name="status"
                                                                onchange="toggleEditBiaya({{ $p->id }})"
                                                                required id="edit_status{{ $p->id }}">
                                                                <option value="Berbayar"
                                                                    {{ $p->status == 'Berbayar' ? 'selected' : '' }}>
                                                                    Berbayar</option>
                                                                <option value="Gratis"
                                                                    {{ $p->status == 'Gratis' ? 'selected' : '' }}>
                                                                    Gratis</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group mb-3"
                                                            id="edit_biaya_wrapper{{ $p->id }}"
                                                            style="{{ $p->status == 'Gratis' ? 'display:none;' : '' }}">
                                                            <label class="form-label">Biaya (Rp)</label>
                                                            <input type="text" class="form-control edit-input"
                                                                name="biaya" value="{{ $p->biaya }}"
                                                                oninput="formatRupiah(this)">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Upload Foto Pelatihan
                                                                (Opsional)
                                                            </label>
                                                            <input type="file" class="form-control edit-input"
                                                                name="foto_pelatihan" accept=".jpg,.jpeg,.png">
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

                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="fw-semibold text-muted">Data tidak ditemukan</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2 px-4 mb-5">
                    <div class="small text-muted">
                        Showing
                        <strong>{{ $pelatihans->firstItem() ?? 0 }}</strong>
                        to
                        <strong>{{ $pelatihans->lastItem() ?? 0 }}</strong>
                        of
                        <strong>{{ $pelatihans->total() }}</strong>
                        entries
                    </div>

                    <nav>
                        <ul class="pagination mb-0">
                            {{-- Previous Page Link --}}
                            @if ($pelatihans->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $pelatihans->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($pelatihans->getUrlRange(1, $pelatihans->lastPage()) as $page => $url)
                                @if ($page == $pelatihans->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span>
                                    </li>
                                @elseif ($page == 1 || $page == $pelatihans->lastPage() || abs($page - $pelatihans->currentPage()) <= 1)
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @elseif ($page == 2 || $page == $pelatihans->lastPage() - 1)
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($pelatihans->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $pelatihans->nextPageUrl() }}"
                                        rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahPelatihanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0">
                    <!-- Informasi / Ilustrasi -->
                    <div
                        class="col-md-5 d-none d-md-flex bg-light flex-column justify-content-center align-items-center p-4">
                        <h5 class="text-primary fw-bold">Tambah Pelatihan Baru</h5>
                        <p class="text-muted text-center px-3">
                            Tambahkan program pelatihan baru untuk mendukung pengembangan keterampilan alumni.
                        </p>
                    </div>
                    <!-- Form -->
                    <div class="col-md-7 bg-white">
                        <form action="{{ route('admin.pelatihan') }}" method="POST" enctype="multipart/form-data"
                            class="p-4" id="tambahPelatihanAdminForm">
                            @csrf
                            <div class="modal-header border-0 pb-0">
                                <h5 class="modal-title fw-bold" id="modalTambahPelatihanLabel">
                                    <i class="bi bi-journal-plus me-2 text-primary"></i>Tambah Pelatihan
                                </h5>
                            </div>
                            <div class="modal-body overflow-auto" style="max-height: 65vh;">
                                <div class="mb-3">
                                    <label for="nama_pelatihan" class="form-label">Judul Pelatihan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                        <input type="text" class="form-control" id="nama_pelatihan"
                                            name="nama_pelatihan" placeholder="Contoh: Pelatihan Public Speaking"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                        placeholder="Jelaskan pelatihan ini secara singkat..." required></textarea>
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
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="kota" class="form-label">Kota Penyelenggaraan</label>
                                        <input type="text" class="form-control" id="kota" name="kota"
                                            placeholder="Contoh: Jakarta" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tempat_pelatihan" class="form-label">Tempat
                                            Penyelenggaraan</label>
                                        <input type="text" class="form-control" id="tempat_pelatihan"
                                            name="tempat_pelatihan" placeholder="Contoh: Balai Pertemuan" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Pelatihan</label>
                                    <select class="form-select" id="status" name="status" required
                                        onchange="toggleBiayaPelatihanAdmin()">
                                        <option value="Berbayar">Berbayar</option>
                                        <option value="Gratis" selected>Gratis</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="biayaPelatihanAdminGroup">
                                    <label for="biaya" class="form-label">Biaya Pelatihan (Rp)</label>
                                    <input type="number" class="form-control" id="biaya" name="biaya"
                                        placeholder="Contoh: 100000">
                                </div>
                                <div class="mb-3">
                                    <label for="foto_pelatihan" class="form-label">Upload Foto Pelatihan</label>
                                    <input type="file" class="form-control" id="foto_pelatihan"
                                        name="foto_pelatihan" accept=".jpg,.jpeg,.png" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Pelatihan</button>
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
        filterForm.addEventListener('submit', function() {
            tableWrapper.classList.add('fade');
            setTimeout(() => {
                tableWrapper.classList.add('d-none');
                tableLoading.classList.remove('d-none');
                tableLoading.classList.add('show');
            }, 300);
        });

        function filterTable() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const status = document.getElementById('statusFilter').value.toLowerCase();
            const table = document.getElementById('pelatihanTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const name = rows[i].querySelector('.pelatihan-name')?.innerText.toLowerCase() || '';
                const stat = rows[i].querySelector('.pelatihan-status')?.innerText.toLowerCase() || '';

                const matchName = name.includes(input);
                const matchStatus = !status || stat.includes(status);

                rows[i].style.display = (matchName && matchStatus) ? '' : 'none';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const statusFilter = document.getElementById("statusFilter");
            const table = document.getElementById("pelatihanTable");
            const tbody = table.querySelector("tbody");
            const rows = tbody.querySelectorAll("tr");

            window.filterTable = function() {
                const searchValue = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;
                let nomor = 1;

                rows.forEach(function(row) {
                    const namaPelatihanCell = row.querySelector(".pelatihan-name");
                    const statusCell = row.querySelector(".pelatihan-status");

                    const namaPelatihan = namaPelatihanCell ? namaPelatihanCell.textContent
                        .toLowerCase() : "";
                    const status = statusCell ? statusCell.textContent.trim() : "";

                    const matchSearch = namaPelatihan.includes(searchValue);
                    const matchStatus = !statusValue || status === statusValue;

                    if (matchSearch && matchStatus) {
                        row.style.display = "";
                        row.querySelector("td").textContent = nomor++; // Reset nomor kolom No (pertama)
                    } else {
                        row.style.display = "none";
                    }
                });
            };
        });

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

        function toggleBiayaPelatihanAdmin() {
            const status = document.getElementById('status').value;
            const biayaGroup = document.getElementById('biayaPelatihanAdminGroup');
            biayaGroup.style.display = (status === 'Berbayar') ? 'block' : 'none';
        }
        window.addEventListener('DOMContentLoaded', toggleBiayaPelatihanAdmin);

        document.addEventListener("DOMContentLoaded", function() {
            const filterForm = document.querySelector('form[method="GET"]');
            const tableWrapper = document.querySelector('.pelatihan-table-wrapper');
            const tableLoading = document.getElementById('tableLoading');

            filterForm.addEventListener('submit', function() {
                tableWrapper.classList.add('fade');
                setTimeout(() => {
                    tableLoading.classList.remove('d-none');
                    tableLoading.classList.add('show');
                }, 300);
            });
        });
    </script>
</body>

</html>
