<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Service | Service Motor</title>

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

        <h1 class="page-title">Pembayaran Service</h1>

        <p class="page-subtitle">
            Kelola transaksi pembayaran servis kendaraan pelanggan.
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


        <!-- FORM PEMBAYARAN -->
        <div class="form-card">

            <div class="card-title">
                💳 Form Pembayaran Service
            </div>

            <form action="{{ route('pembayaran.store') }}" method="POST">

                @csrf

                <div class="row">

                    <!-- ID SERVIS -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            ID Servis Pelanggan
                        </label>

                        <select
                            name="id_servis_pelanggan"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih ID Servis Pelanggan --
                            </option>

                            @foreach($dataService as $item)

                                <option
                                    value="{{ $item->id_servis_pelanggan }}"
                                    {{ old('id_servis_pelanggan') == $item->id_servis_pelanggan ? 'selected' : '' }}
                                >
                                    ID Servis: {{ $item->id_servis_pelanggan }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- JUMLAH BIAYA -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jumlah Biaya Servis (Rp)
                        </label>

                        <input
                            type="number"
                            name="jumlah_biaya_servis"
                            class="form-control"
                            placeholder="Contoh: 150000"
                            min="0"
                            step="0.01"
                            value="{{ old('jumlah_biaya_servis') }}"
                            required
                        >

                    </div>


                    <!-- JENIS PEMBAYARAN -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label d-block">
                            Jenis Pembayaran
                        </label>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="jenis_pembayaran"
                                id="cash"
                                value="Cash/Tunai"
                                {{ old('jenis_pembayaran', 'Cash/Tunai') == 'Cash/Tunai' ? 'checked' : '' }}
                                required
                            >

                            <label class="form-check-label" for="cash">
                                Cash / Tunai
                            </label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="jenis_pembayaran"
                                id="non_tunai"
                                value="Non Tunai"
                                {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}
                            >

                            <label class="form-check-label" for="non_tunai">
                                Non Tunai
                            </label>

                        </div>

                    </div>


                    <!-- KETERANGAN -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan keterangan pembayaran (opsional)"
                        >{{ old('keterangan') }}</textarea>

                    </div>

                </div>


                <button type="submit" class="btn-save">
                    💾 Simpan Pembayaran
                </button>

            </form>

        </div>


        <!-- TABEL PEMBAYARAN -->
        <div class="table-card">

            <div class="card-title">
                📋 Data Pembayaran Service
            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Pembayaran</th>
                            <th>ID Servis Pelanggan</th>
                            <th>Jumlah Biaya Servis</th>
                            <th>Jenis Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($data as $index => $item)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>{{ $item->id }}</td>

                                <td>{{ $item->id_servis_pelanggan }}</td>

                                <td>
                                    Rp {{ number_format($item->jumlah_biaya_servis, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if($item->jenis_pembayaran == 'Cash/Tunai')
                                        <span class="badge bg-success">
                                            Cash / Tunai
                                        </span>
                                    @else
                                        <span class="badge bg-primary">
                                            Non Tunai
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->keterangan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}
                                </td>

                                <!-- TOMBOL AKSI -->
                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('pembayaran.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm">
                                            ✏️ Edit
                                        </a>

                                        <form action="{{ route('pembayaran.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus data pembayaran ini?')">

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
                                    Belum ada data pembayaran.
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
