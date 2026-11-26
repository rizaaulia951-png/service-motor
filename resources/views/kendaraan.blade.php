<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kendaraan | Juragan Service Motor</title>

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
            font-size: 22px;
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
            background: #e0f2fe;
            color: #0284c7;
            border-radius: 12px;
            font-size: 27px;
        }

        .content-card,
        .form-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            border: 1px solid #edf0f4;
        }

        .form-label {
            color: #344054;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 12px;
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

        .btn-warning {
            background: #f59e0b;
            border-color: #f59e0b;
            color: #172033;
        }

        .btn-warning:hover {
            background: #d98700;
            border-color: #d98700;
            color: white;
        }

        .btn-success {
            background: #198754;
            border-color: #198754;
        }

        .btn-secondary {
            background: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary {
            background: #0d6efd;
            border-color: #0d6efd;
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

        .vehicle-count {
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

            .content-card,
            .form-card {
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
                    <i class="bi bi-bicycle"></i>
                </div>

                <div>
                    <h2 class="fw-bold mb-1">
                        {{ isset($dataEditKendaraan) ? 'Edit Data Kendaraan' : 'Data Kendaraan' }}
                    </h2>

                    <p class="text-secondary mb-0">
                        {{ isset($dataEditKendaraan)
                            ? 'Perbarui informasi kendaraan pelanggan.'
                            : 'Kelola data kendaraan pelanggan Juragan Service Motor.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- NOTIFIKASI BERHASIL -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- NOTIFIKASI GAGAL -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- VALIDASI -->
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Data gagal disimpan!
                </strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM CARD -->
        <div class="form-card mb-4">

            @if(isset($dataEditKendaraan))

                <!-- FORM EDIT KENDARAAN -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-pencil-square fs-4 text-warning"></i>
                    <h5 class="fw-bold mb-0">Form Edit Kendaraan</h5>
                </div>

                <p class="text-secondary mb-4">
                    Silakan perbarui informasi kendaraan pelanggan.
                </p>

                <form action="{{ route('kendaraan.update', $dataEditKendaraan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor Plat Kendaraan</label>
                        <input
                            type="text"
                            name="no_plat_kendaraan"
                            class="form-control"
                            value="{{ old('no_plat_kendaraan', $dataEditKendaraan->no_plat_kendaraan) }}"
                            placeholder="Contoh: BL 1234 AB"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-select" required>
                            <option value="">-- Pilih Jenis Kendaraan --</option>

                            <option value="Matic"
                                {{ old('jenis_kendaraan', $dataEditKendaraan->jenis_kendaraan) == 'Matic' ? 'selected' : '' }}>
                                Matic
                            </option>

                            <option value="Manual Transmisi"
                                {{ old('jenis_kendaraan', $dataEditKendaraan->jenis_kendaraan) == 'Manual Transmisi' ? 'selected' : '' }}>
                                Manual Transmisi
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor STNK</label>
                        <input
                            type="text"
                            name="no_stnk"
                            class="form-control"
                            value="{{ old('no_stnk', $dataEditKendaraan->no_stnk) }}"
                            placeholder="Masukkan nomor STNK"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun Pembuatan</label>
                        <input
                            type="number"
                            name="tahun_pembuatan"
                            class="form-control"
                            value="{{ old('tahun_pembuatan', $dataEditKendaraan->tahun_pembuatan) }}"
                            min="1900"
                            max="{{ date('Y') }}"
                            placeholder="Contoh: 2022"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pemilik</label>
                        <input
                            type="text"
                            name="nama_pemilik"
                            class="form-control"
                            value="{{ old('nama_pemilik', $dataEditKendaraan->nama_pemilik) }}"
                            placeholder="Masukkan nama pemilik kendaraan"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Warna Kendaraan</label>
                        <input
                            type="text"
                            name="warna_kendaraan"
                            class="form-control"
                            value="{{ old('warna_kendaraan', $dataEditKendaraan->warna_kendaraan) }}"
                            placeholder="Contoh: Hitam"
                            required>
                    </div>

                    <div class="d-flex gap-2 mt-4 flex-wrap">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i>
                            Kembali
                        </a>
                    </div>

                </form>

            @else

                <!-- FORM TAMBAH KENDARAAN -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle-fill fs-4 text-primary"></i>
                        <h5 class="fw-bold mb-0">Tambah Kendaraan</h5>
                    </div>

                    <button class="btn btn-primary"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#formKendaraan">
                        <i class="bi bi-plus-circle-fill"></i>
                        Tambah Kendaraan
                    </button>

                </div>

                <div class="collapse {{ $errors->any() ? 'show' : '' }}" id="formKendaraan">
                    <hr>

                    <form action="{{ route('kendaraan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor Plat Kendaraan</label>
                            <input
                                type="text"
                                name="no_plat_kendaraan"
                                class="form-control"
                                value="{{ old('no_plat_kendaraan') }}"
                                placeholder="Contoh: BL 1234 AB"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-select" required>
                                <option value="">-- Pilih Jenis Kendaraan --</option>

                                <option value="Matic"
                                    {{ old('jenis_kendaraan') == 'Matic' ? 'selected' : '' }}>
                                    Matic
                                </option>

                                <option value="Manual Transmisi"
                                    {{ old('jenis_kendaraan') == 'Manual Transmisi' ? 'selected' : '' }}>
                                    Manual Transmisi
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor STNK</label>
                            <input
                                type="text"
                                name="no_stnk"
                                class="form-control"
                                value="{{ old('no_stnk') }}"
                                placeholder="Masukkan nomor STNK"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tahun Pembuatan</label>
                            <input
                                type="number"
                                name="tahun_pembuatan"
                                class="form-control"
                                value="{{ old('tahun_pembuatan') }}"
                                min="1900"
                                max="{{ date('Y') }}"
                                placeholder="Contoh: 2022"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Pemilik</label>
                            <input
                                type="text"
                                name="nama_pemilik"
                                class="form-control"
                                value="{{ old('nama_pemilik') }}"
                                placeholder="Masukkan nama pemilik kendaraan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Warna Kendaraan</label>
                            <input
                                type="text"
                                name="warna_kendaraan"
                                class="form-control"
                                value="{{ old('warna_kendaraan') }}"
                                placeholder="Contoh: Hitam"
                                required>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i>
                                Simpan Kendaraan
                            </button>

                            <button type="reset" class="btn btn-secondary">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Reset
                            </button>
                        </div>

                    </form>
                </div>

            @endif

        </div>

        <!-- TABEL DATA KENDARAAN -->
        <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-table fs-4 text-primary"></i>
                    <h5 class="fw-bold mb-0">Daftar Kendaraan</h5>
                </div>

                <span class="vehicle-count">
                    <i class="bi bi-bicycle me-1"></i>
                    Total: {{ $kendaraan->count() }} kendaraan
                </span>

            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">

                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i>No</th>
                            <th><i class="bi bi-card-list"></i>ID</th>
                            <th><i class="bi bi-credit-card-2-front-fill"></i>Nomor Plat</th>
                            <th><i class="bi bi-bicycle"></i>Jenis Kendaraan</th>
                            <th><i class="bi bi-file-earmark-text-fill"></i>No. STNK</th>
                            <th><i class="bi bi-calendar-fill"></i>Tahun Pembuatan</th>
                            <th><i class="bi bi-person-fill"></i>Nama Pemilik</th>
                            <th><i class="bi bi-palette-fill"></i>Warna</th>
                            <th><i class="bi bi-calendar-event-fill"></i>Tanggal Ditambahkan</th>
                            <th><i class="bi bi-gear-fill"></i>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($kendaraan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->id }}</td>
                                <td class="fw-semibold">{{ $data->no_plat_kendaraan }}</td>
                                <td>{{ $data->jenis_kendaraan }}</td>
                                <td>{{ $data->no_stnk }}</td>
                                <td>{{ $data->tahun_pembuatan }}</td>
                                <td>{{ $data->nama_pemilik }}</td>
                                <td>{{ $data->warna_kendaraan }}</td>

                                <td>
                                    {{ $data->created_at ? $data->created_at->format('d-m-Y H:i') : '-' }}
                                </td>

                                <!-- AKSI EDIT DAN HAPUS -->
                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('kendaraan.edit', $data->id) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('kendaraan.destroy', $data->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus kendaraan ini?')">

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
                                <td colspan="10" class="text-center text-secondary py-5">
                                    <div class="empty-icon">
                                        <i class="bi bi-bicycle"></i>
                                    </div>

                                    <h5>Belum ada data kendaraan</h5>

                                    <p class="mb-0">
                                        Silakan klik tombol Tambah Kendaraan untuk memasukkan data.
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
