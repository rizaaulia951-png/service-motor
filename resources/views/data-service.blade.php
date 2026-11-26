<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juragan Service Motor | Data Service</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #172033;
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
            overflow-y: auto;
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
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #f59e0b;
            color: #172033;
        }

        .menu a i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .page-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .page-title i {
            color: #2563eb;
            margin-right: 8px;
        }

        .page-subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        .form-card,
        .table-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        .card-title {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #172033;
        }

        .card-title i {
            color: #2563eb;
            margin-right: 8px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-label i {
            color: #64748b;
            margin-right: 5px;
        }

        .form-control,
        .form-select {
            padding: 11px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.15);
        }

        .form-control[readonly],
        textarea[readonly] {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-save {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-save:hover {
            background: #0b5ed7;
            color: white;
        }

        .btn-update {
            background: #198754;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-update:hover {
            background: #157347;
            color: white;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: 0.2s;
        }

        .btn-back:hover {
            background: #5c636a;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
            color: #172033;
            border: none;
        }

        .btn-edit:hover {
            background: #d97706;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background: #b91c1c;
            color: white;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: #172033;
            color: white;
            white-space: nowrap;
            padding: 13px;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
            padding: 12px;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .table td .btn {
            white-space: nowrap;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .form-card,
            .table-card {
                padding: 18px;
            }

            .page-title {
                font-size: 23px;
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
                <i class="bi bi-tools"></i>
                Data Service
            </a>

            <a href="{{ route('pembayaran.index') }}"
               class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                <i class="bi bi-credit-card-fill"></i>
                Pembayaran Service
            </a>

        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="main">

        <h1 class="page-title">
            <i class="bi bi-tools"></i>
            {{ isset($dataEditService) ? 'Edit Data Service' : 'Data Service' }}
        </h1>

        <p class="page-subtitle">
            Kelola data pekerjaan dan riwayat perbaikan kendaraan pelanggan.
        </p>

        <!-- PESAN BERHASIL -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- PESAN GAGAL -->
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

        <!-- FORM DATA SERVICE -->
        <div class="form-card">

            @if(isset($dataEditService))

                <!-- FORM EDIT -->
                <div class="card-title">
                    <i class="bi bi-pencil-square"></i>
                    Form Edit Data Service
                </div>

                <form action="{{ route('data-service.update', $dataEditService->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-upc-scan"></i>
                                ID Servis Pelanggan
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $dataEditService->id_servis_pelanggan }}"
                                readonly
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-chat-left-text"></i>
                                Keluhan Kendaraan
                            </label>

                            <textarea
                                class="form-control"
                                rows="2"
                                readonly
                            >{{ $dataEditService->keluhan_kendaraan }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-clock"></i>
                                Estimasi Service
                            </label>

                            <input
                                type="text"
                                name="estimasi_service"
                                class="form-control"
                                value="{{ old('estimasi_service', $dataEditService->estimasi_service) }}"
                                placeholder="Contoh: 2 Jam"
                                required
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-person-gear"></i>
                                Nama Mekanik
                            </label>

                            <input
                                type="text"
                                name="nama_mekanik"
                                class="form-control"
                                value="{{ old('nama_mekanik', $dataEditService->nama_mekanik) }}"
                                placeholder="Masukkan nama mekanik"
                                required
                            >
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                <i class="bi bi-gear-wide-connected"></i>
                                Sparepart Pengganti
                            </label>

                            <textarea
                                name="sparepart_pengganti"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan sparepart yang diganti"
                                required
                            >{{ old('sparepart_pengganti', $dataEditService->sparepart_pengganti) }}</textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn-update">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('data-service.index') }}" class="btn-back ms-2">
                        <i class="bi bi-arrow-left-circle me-1"></i>
                        Kembali
                    </a>

                </form>

            @else

                <!-- FORM TAMBAH -->
                <div class="card-title">
                    <i class="bi bi-plus-circle-fill"></i>
                    Form Input Data Service
                </div>

                <form action="{{ route('data-service.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-upc-scan"></i>
                                ID Servis Pelanggan
                            </label>

                            <select
                                name="id_servis_pelanggan"
                                id="id_servis_pelanggan"
                                class="form-select"
                                required
                            >
                                <option value="">
                                    -- Pilih ID Servis Pelanggan --
                                </option>

                                @foreach($daftar as $item)
                                    <option
                                        value="{{ $item->id_servis_pelanggan }}"
                                        data-keluhan="{{ $item->keluhan_kendaraan }}"
                                        {{ old('id_servis_pelanggan') == $item->id_servis_pelanggan ? 'selected' : '' }}
                                    >
                                        ID: {{ $item->id_servis_pelanggan }}
                                        - Plat: {{ $item->no_plat_kendaraan }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-chat-left-text"></i>
                                Keluhan Kendaraan
                            </label>

                            <textarea
                                id="keluhan_kendaraan"
                                class="form-control"
                                rows="2"
                                placeholder="Keluhan akan muncul otomatis"
                                readonly
                            >{{ old('id_servis_pelanggan') ? optional($daftar->firstWhere('id_servis_pelanggan', old('id_servis_pelanggan')))->keluhan_kendaraan : '' }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-clock"></i>
                                Estimasi Service
                            </label>

                            <input
                                type="text"
                                name="estimasi_service"
                                class="form-control"
                                placeholder="Contoh: 2 Jam"
                                value="{{ old('estimasi_service') }}"
                                required
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <i class="bi bi-person-gear"></i>
                                Nama Mekanik
                            </label>

                            <input
                                type="text"
                                name="nama_mekanik"
                                class="form-control"
                                placeholder="Masukkan nama mekanik"
                                value="{{ old('nama_mekanik') }}"
                                required
                            >
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                <i class="bi bi-gear-wide-connected"></i>
                                Sparepart Pengganti
                            </label>

                            <textarea
                                name="sparepart_pengganti"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan sparepart yang diganti"
                                required
                            >{{ old('sparepart_pengganti') }}</textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn-save">
                        <i class="bi bi-save-fill me-1"></i>
                        Simpan Data Service
                    </button>

                </form>

            @endif

        </div>

        <!-- TABEL DATA SERVICE -->
        <div class="table-card">

            <div class="card-title">
                <i class="bi bi-table"></i>
                Data Service
            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Servis Pelanggan</th>
                            <th>No. Plat</th>
                            <th>Keluhan Kendaraan</th>
                            <th>Estimasi Service</th>
                            <th>Nama Mekanik</th>
                            <th>Sparepart Pengganti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($data as $index => $item)

                            @php
                                $pendaftaran = $daftar->firstWhere(
                                    'id_servis_pelanggan',
                                    $item->id_servis_pelanggan
                                );
                            @endphp

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $item->id_servis_pelanggan }}
                                    </span>
                                </td>

                                <td>
                                    {{ $pendaftaran->no_plat_kendaraan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->keluhan_kendaraan }}
                                </td>

                                <td>
                                    <i class="bi bi-clock-history text-secondary me-1"></i>
                                    {{ $item->estimasi_service }}
                                </td>

                                <td>
                                    <i class="bi bi-person-gear text-secondary me-1"></i>
                                    {{ $item->nama_mekanik }}
                                </td>

                                <td>
                                    {{ $item->sparepart_pengganti }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('data-service.edit', $item->id) }}"
                                           class="btn btn-edit btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('data-service.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus data service ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-delete btn-sm">
                                                <i class="bi bi-trash-fill"></i>
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada data service.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const pilihanServis = document.getElementById('id_servis_pelanggan');
        const kolomKeluhan = document.getElementById('keluhan_kendaraan');

        function tampilkanKeluhan() {

            if (!pilihanServis || !kolomKeluhan) {
                return;
            }

            const pilihan = pilihanServis.options[pilihanServis.selectedIndex];

            if (pilihan && pilihan.value !== '') {
                kolomKeluhan.value = pilihan.dataset.keluhan || '';
            } else {
                kolomKeluhan.value = '';
            }
        }

        if (pilihanServis) {
            pilihanServis.addEventListener('change', tampilkanKeluhan);
            tampilkanKeluhan();
        }
    </script>

</body>
</html>
