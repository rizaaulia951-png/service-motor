<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juragan Service Motor | Pembayaran Service</title>

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

        .form-control[readonly] {
            background: #f1f5f9;
            color: #475569;
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .form-check-label {
            cursor: pointer;
        }

        .btn-save {
            background: #2563eb;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-save:hover {
            background: #1d4ed8;
            color: white;
        }

        .btn-update {
            background: #16a34a;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-update:hover {
            background: #15803d;
            color: white;
        }

        .btn-back {
            background: #64748b;
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
            background: #475569;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
            color: #172033;
            border: none;
        }

        .btn-edit:hover {
            background: #d97706;
            color: #172033;
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
            <i class="bi bi-credit-card-fill"></i>
            Pembayaran Service
        </h1>

        <p class="page-subtitle">
            Kelola transaksi pembayaran servis kendaraan pelanggan.
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


        <!-- FORM PEMBAYARAN -->
        <div class="form-card">

            @if(isset($dataEditPembayaran))

                <!-- FORM EDIT PEMBAYARAN -->
                <div class="card-title">
                    <i class="bi bi-pencil-square"></i>
                    Form Edit Pembayaran
                </div>

                <form action="{{ route('pembayaran.update', $dataEditPembayaran->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <!-- ID PEMBAYARAN -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                <i class="bi bi-receipt"></i>
                                ID Pembayaran
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $dataEditPembayaran->id }}"
                                readonly
                            >

                        </div>


                        <!-- ID SERVIS -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                <i class="bi bi-upc-scan"></i>
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
                                        {{ old('id_servis_pelanggan', $dataEditPembayaran->id_servis_pelanggan) == $item->id_servis_pelanggan ? 'selected' : '' }}
                                    >
                                        ID Servis: {{ $item->id_servis_pelanggan }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- JUMLAH BIAYA -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                <i class="bi bi-cash-stack"></i>
                                Jumlah Biaya Servis (Rp)
                            </label>

                            <input
                                type="number"
                                name="jumlah_biaya_servis"
                                class="form-control"
                                min="0"
                                step="0.01"
                                value="{{ old('jumlah_biaya_servis', $dataEditPembayaran->jumlah_biaya_servis) }}"
                                required
                            >

                        </div>


                        <!-- JENIS PEMBAYARAN -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label d-block">
                                <i class="bi bi-wallet2"></i>
                                Jenis Pembayaran
                            </label>

                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="jenis_pembayaran"
                                    id="cash_edit"
                                    value="Cash/Tunai"
                                    {{ old('jenis_pembayaran', $dataEditPembayaran->jenis_pembayaran) == 'Cash/Tunai' ? 'checked' : '' }}
                                    required
                                >

                                <label class="form-check-label" for="cash_edit">
                                    Cash / Tunai
                                </label>

                            </div>

                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="jenis_pembayaran"
                                    id="non_tunai_edit"
                                    value="Non Tunai"
                                    {{ old('jenis_pembayaran', $dataEditPembayaran->jenis_pembayaran) == 'Non Tunai' ? 'checked' : '' }}
                                >

                                <label class="form-check-label" for="non_tunai_edit">
                                    Non Tunai
                                </label>

                            </div>

                        </div>


                        <!-- KETERANGAN -->
                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                <i class="bi bi-chat-left-text"></i>
                                Keterangan
                            </label>

                            <textarea
                                name="keterangan"
                                class="form-control"
                                rows="3"
                                placeholder="Masukkan keterangan pembayaran"
                            >{{ old('keterangan', $dataEditPembayaran->keterangan) }}</textarea>

                        </div>

                    </div>


                    <button type="submit" class="btn-update">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('pembayaran.index') }}" class="btn-back ms-2">
                        <i class="bi bi-arrow-left-circle me-1"></i>
                        Kembali
                    </a>

                </form>

            @else

                <!-- FORM TAMBAH PEMBAYARAN -->
                <div class="card-title">
                    <i class="bi bi-plus-circle-fill"></i>
                    Form Pembayaran Service
                </div>

                <form action="{{ route('pembayaran.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <!-- ID SERVIS -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                <i class="bi bi-upc-scan"></i>
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
                                <i class="bi bi-cash-stack"></i>
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
                                <i class="bi bi-wallet2"></i>
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
                                <i class="bi bi-chat-left-text"></i>
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
                        <i class="bi bi-save-fill me-1"></i>
                        Simpan Pembayaran
                    </button>

                </form>

            @endif

        </div>


        <!-- TABEL PEMBAYARAN -->
        <div class="table-card">

            <div class="card-title">
                <i class="bi bi-table"></i>
                Data Pembayaran Service
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

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $item->id }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->id_servis_pelanggan }}
                                </td>

                                <td>
                                    <i class="bi bi-cash text-success me-1"></i>
                                    Rp {{ number_format($item->jumlah_biaya_servis, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if($item->jenis_pembayaran == 'Cash/Tunai')
                                        <span class="badge bg-success">
                                            <i class="bi bi-cash me-1"></i>
                                            Cash / Tunai
                                        </span>
                                    @else
                                        <span class="badge bg-primary">
                                            <i class="bi bi-credit-card me-1"></i>
                                            Non Tunai
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->keterangan ?? '-' }}
                                </td>

                                <td>
                                    <i class="bi bi-calendar-event text-secondary me-1"></i>
                                    {{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}
                                </td>

                                <!-- TOMBOL AKSI -->
                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('pembayaran.edit', $item->id) }}"
                                           class="btn btn-edit btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pembayaran.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus data pembayaran ini?')">

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
                                    Belum ada data pembayaran.
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

</body>
</html>
