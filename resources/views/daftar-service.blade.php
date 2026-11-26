<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juragan Service Motor | Daftar Service</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #263248;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #172033;
            color: white;
            padding: 25px 18px;
            z-index: 1000;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand i {
            color: #f59e0b;
            font-size: 26px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            transition: .2s;
        }

        .menu a i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: #f59e0b;
            color: #172033;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-icon {
            width: 55px;
            height: 55px;
            min-width: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ede9fe;
            color: #7c3aed;
            border-radius: 12px;
            font-size: 27px;
        }

        .form-card,
        .table-card {
            background: white;
            border: 1px solid #edf0f4;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .form-card {
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control,
        .form-select {
            padding: 11px 12px;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.12);
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 9px 15px;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-primary {
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-success {
            background: #198754;
            border-color: #198754;
        }

        .btn-secondary {
            background: #6c757d;
            border-color: #6c757d;
        }

        .btn-warning {
            background: #f59e0b;
            border-color: #f59e0b;
            color: #172033;
        }

        .btn-warning:hover {
            background: #d97706;
            border-color: #d97706;
            color: white;
        }

        .table {
            margin-bottom: 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 13px 12px;
        }

        .table thead th {
            background: #172033;
            color: white;
            border-color: #344054;
            font-weight: 600;
            white-space: nowrap;
        }

        .table thead th i {
            margin-right: 5px;
            color: #fbbf24;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .service-count {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffe69c;
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-buttons .btn {
            white-space: nowrap;
        }

        .empty-icon {
            font-size: 40px;
            color: #adb5bd;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 5px;
            }

            .menu a {
                margin-bottom: 5px;
                font-size: 13px;
                padding: 10px;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .form-card,
            .table-card {
                padding: 17px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .action-buttons {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 420px) {
            .menu {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">
            <i class="bi bi-tools"></i>
            <span>Juragan Service Motor</span>
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                Halaman Utama
            </a>

            <a href="{{ route('pelanggan.index') }}"
               class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                Data Pelanggan
            </a>

            <a href="{{ route('kendaraan.index') }}"
               class="{{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
                <i class="bi bi-bicycle"></i>
                Data Kendaraan
            </a>

            <a href="{{ route('daftar-service.index') }}"
               class="{{ request()->routeIs('daftar-service.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check-fill"></i>
                Daftar Service
            </a>

            <a href="{{ route('data-service.index') }}"
               class="{{ request()->routeIs('data-service.*') ? 'active' : '' }}">
                <i class="bi bi-wrench-adjustable"></i>
                Data Service
            </a>

            <a href="{{ route('pembayaran.index') }}"
               class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                <i class="bi bi-credit-card-fill"></i>
                Pembayaran Service
            </a>

        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- HEADER -->
        <div class="mb-4">
            <div class="page-heading">
                <div class="page-icon">
                    <i class="bi bi-clipboard-check-fill"></i>
                </div>

                <div>
                    <h2 class="fw-bold mb-1">
                        {{ isset($dataEditDaftarService) ? 'Edit Daftar Servis' : 'Daftar Servis' }}
                    </h2>

                    <p class="text-secondary mb-0">
                        Kelola pendaftaran servis dan keluhan kendaraan pelanggan.
                    </p>
                </div>
            </div>
        </div>

        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Data gagal disimpan atau diperbarui!
                </strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM TAMBAH / EDIT -->
        <div class="form-card">

            @if(isset($dataEditDaftarService))

                <!-- FORM EDIT -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-pencil-square fs-4 text-warning"></i>
                    <h5 class="fw-bold mb-0">Form Edit Pendaftaran Servis</h5>
                </div>

                <p class="text-secondary mb-4">
                    Perbarui informasi pendaftaran servis kendaraan pelanggan.
                </p>

                <form action="{{ route('daftar-service.update', $dataEditDaftarService->id_servis_pelanggan) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ID Servis</label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $dataEditDaftarService->id_servis_pelanggan }}"
                                   readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pelanggan</label>

                            <select name="id_pelanggan" class="form-select" required>
                                <option value="">-- Pilih Pelanggan --</option>

                                @foreach($pelanggan as $p)
                                    <option value="{{ $p->id_pelanggan }}"
                                        {{ old('id_pelanggan', $dataEditDaftarService->id_pelanggan) == $p->id_pelanggan ? 'selected' : '' }}>
                                        {{ $p->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Plat Kendaraan</label>

                            <select name="no_plat_kendaraan" class="form-select" required>
                                <option value="">-- Pilih Kendaraan --</option>

                                @foreach($kendaraan as $k)
                                    <option value="{{ $k->no_plat_kendaraan }}"
                                        {{ old('no_plat_kendaraan', $dataEditDaftarService->no_plat_kendaraan) == $k->no_plat_kendaraan ? 'selected' : '' }}>
                                        {{ $k->no_plat_kendaraan }} - {{ $k->nama_pemilik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Servis</label>

                            <input type="date"
                                   name="tanggal_servis"
                                   class="form-control"
                                   value="{{ old('tanggal_servis', \Carbon\Carbon::parse($dataEditDaftarService->tanggal_servis)->format('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Keluhan Kendaraan</label>

                            <textarea name="keluhan_kendaraan"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan keluhan kendaraan..."
                                      required>{{ old('keluhan_kendaraan', $dataEditDaftarService->keluhan_kendaraan) }}</textarea>
                        </div>

                    </div>

                    <div class="d-flex gap-2 flex-wrap mt-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('daftar-service.index') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i>
                            Kembali
                        </a>
                    </div>

                </form>

            @else

                <!-- FORM TAMBAH -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-clipboard-plus-fill fs-4 text-primary"></i>
                    <h5 class="fw-bold mb-0">Form Pendaftaran Servis</h5>
                </div>

                <p class="text-secondary mb-4">
                    Masukkan informasi pelanggan dan kendaraan yang akan diservis.
                </p>

                <form action="{{ route('daftar-service.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pelanggan</label>

                            <select name="id_pelanggan" class="form-select" required>
                                <option value="">-- Pilih Pelanggan --</option>

                                @foreach($pelanggan as $p)
                                    <option value="{{ $p->id_pelanggan }}"
                                        {{ old('id_pelanggan') == $p->id_pelanggan ? 'selected' : '' }}>
                                        {{ $p->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Plat Kendaraan</label>

                            <select name="no_plat_kendaraan" class="form-select" required>
                                <option value="">-- Pilih Kendaraan --</option>

                                @foreach($kendaraan as $k)
                                    <option value="{{ $k->no_plat_kendaraan }}"
                                        {{ old('no_plat_kendaraan') == $k->no_plat_kendaraan ? 'selected' : '' }}>
                                        {{ $k->no_plat_kendaraan }} - {{ $k->nama_pemilik }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Keluhan Kendaraan</label>

                            <textarea name="keluhan_kendaraan"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan keluhan kendaraan..."
                                      required>{{ old('keluhan_kendaraan') }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Servis</label>

                            <input type="date"
                                   name="tanggal_servis"
                                   class="form-control"
                                   value="{{ old('tanggal_servis') }}"
                                   required>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-circle-fill"></i>
                        Tambah Servis
                    </button>

                </form>

            @endif

        </div>

        <!-- TABEL DAFTAR SERVIS -->
        <div class="table-card">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-table fs-4 text-primary"></i>
                    <h5 class="fw-bold mb-0">Data Pendaftaran Servis</h5>
                </div>

                <span class="service-count">
                    <i class="bi bi-clipboard-check-fill me-1"></i>
                    Total: {{ $data->count() }} Servis
                </span>

            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">

                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i>No</th>
                            <th><i class="bi bi-person-fill"></i>Pelanggan</th>
                            <th><i class="bi bi-bicycle"></i>Nomor Plat</th>
                            <th><i class="bi bi-chat-left-text-fill"></i>Keluhan Kendaraan</th>
                            <th><i class="bi bi-calendar-event-fill"></i>Tanggal Servis</th>
                            <th><i class="bi bi-gear-fill"></i>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $item->pelanggan->nama_lengkap ?? 'Pelanggan tidak ditemukan' }}
                                </td>

                                <td>{{ $item->no_plat_kendaraan }}</td>

                                <td>{{ $item->keluhan_kendaraan }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_servis)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('daftar-service.edit', $item->id_servis_pelanggan) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('daftar-service.destroy', $item->id_servis_pelanggan) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data servis ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-5">
                                    <div class="empty-icon">
                                        <i class="bi bi-clipboard-x"></i>
                                    </div>

                                    <h5>Belum ada data pendaftaran servis</h5>

                                    <p class="mb-0">
                                        Silakan isi formulir pendaftaran servis untuk menambahkan data.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
