<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Servis | Service Motor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background: #172033;
            color: white;
            padding: 25px 18px;
            overflow-y: auto;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .menu a {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
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

        .page-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 5px;
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
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            padding: 11px;
            border-radius: 8px;
        }

        .btn-save {
            background: #f59e0b;
            color: #172033;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #d97706;
            color: white;
        }

        .table th {
            background: #172033;
            color: white;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-warning {
            color: #172033;
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
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="brand">
            🔧 Service Motor
        </div>

        <div class="menu">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('daftar-service.index') }}"
               class="{{ request()->routeIs('daftar-service.*') ? 'active' : '' }}">
                📋 Daftar Servis
            </a>

            <a href="{{ route('pelanggan.index') }}"
               class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                👤 Data Pelanggan
            </a>

            <a href="{{ route('kendaraan.index') }}"
               class="{{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
                🏍️ Data Kendaraan
            </a>

            <a href="{{ route('data-service.index') }}"
               class="{{ request()->routeIs('data-service.*') ? 'active' : '' }}">
                🛠️ Riwayat Servis
            </a>

            <a href="{{ route('pembayaran.index') }}"
               class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                💳 Pembayaran
            </a>

        </div>
    </div>


    <!-- KONTEN UTAMA -->
    <div class="main">

        <h1 class="page-title">Riwayat Servis</h1>

        <p class="page-subtitle">
            Kelola data pekerjaan dan riwayat perbaikan kendaraan pelanggan.
        </p>


        <!-- PESAN BERHASIL -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <!-- PESAN GAGAL -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <!-- VALIDASI -->
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Data gagal disimpan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- FORM DATA SERVICE -->
        <div class="form-card">

            <div class="card-title">
                🛠️ Form Input Riwayat Servis
            </div>

            <form action="{{ route('data-service.store') }}" method="POST">

                @csrf

                <div class="row">

                    <!-- ID SERVIS PELANGGAN -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- KELUHAN KENDARAAN -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- ESTIMASI SERVICE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Estimasi Service
                        </label>

                        <input
                            type="text"
                            name="estimasi_service"
                            class="form-control"
                            placeholder="Contoh: Rp150.000"
                            value="{{ old('estimasi_service') }}"
                            required
                        >

                    </div>


                    <!-- NAMA MEKANIK -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
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


                    <!-- SPAREPART -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
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
                    💾 Simpan Riwayat Servis
                </button>

            </form>

        </div>


        <!-- TABEL RIWAYAT SERVICE -->
        <div class="table-card">

            <div class="card-title">
                📋 Data Riwayat Servis
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
                                    {{ $item->id_servis_pelanggan }}
                                </td>

                                <td>
                                    {{ $pendaftaran->no_plat_kendaraan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->keluhan_kendaraan }}
                                </td>

                                <td>
                                    {{ $item->estimasi_service }}
                                </td>

                                <td>
                                    {{ $item->nama_mekanik }}
                                </td>

                                <td>
                                    {{ $item->sparepart_pengganti }}
                                </td>

                                <!-- TOMBOL AKSI -->
                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('data-service.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm">
                                            ✏️ Edit
                                        </a>

                                        <form action="{{ route('data-service.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus riwayat servis ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                🗑️ Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada data riwayat servis.
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
            const pilihan = pilihanServis.options[pilihanServis.selectedIndex];

            if (pilihan && pilihan.value !== '') {
                kolomKeluhan.value = pilihan.dataset.keluhan || '';
            } else {
                kolomKeluhan.value = '';
            }
        }

        pilihanServis.addEventListener('change', tampilkanKeluhan);

        tampilkanKeluhan();
    </script>

</body>
</html>
