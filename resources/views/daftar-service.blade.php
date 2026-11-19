<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Motor | Daftar Servis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #172033;
            color: white;
            padding: 25px 18px;
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

        .form-card {
            background: white;
            border: none;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 25px;
        }

        .table-card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            margin-top: 25px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control,
        .form-select {
            padding: 11px;
            border-radius: 8px;
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

        .table th {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="brand">🔧 Service Motor</div>

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

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="mb-4">
            <h2 class="fw-bold">Daftar Servis</h2>
            <p class="text-secondary">
                Kelola pendaftaran servis dan keluhan kendaraan pelanggan.
            </p>
        </div>

        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

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

        <!-- FORM TAMBAH SERVIS -->
        <div class="form-card">
            <h5 class="fw-bold mb-4">Form Pendaftaran Servis</h5>

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

                        <textarea
                            name="keluhan_kendaraan"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan keluhan kendaraan..."
                            required>{{ old('keluhan_kendaraan') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Servis</label>

                        <input
                            type="date"
                            name="tanggal_servis"
                            class="form-control"
                            value="{{ old('tanggal_servis') }}"
                            required>
                    </div>

                </div>

                <button type="submit" class="btn btn-warning fw-bold mt-2">
                    + Tambah Servis
                </button>
            </form>
        </div>

        <!-- TABEL DAFTAR SERVIS -->
        <div class="table-card">

            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <h5 class="fw-bold">Data Pendaftaran Servis</h5>

                <span class="badge bg-warning text-dark">
                    Total: {{ $data->count() }} Servis
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Nomor Plat</th>
                            <th>Keluhan Kendaraan</th>
                            <th>Tanggal Servis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $item->pelanggan->nama_lengkap ?? 'Pelanggan tidak ditemukan' }}
                                </td>

                                <td>{{ $item->no_plat_kendaraan }}</td>

                                <td>{{ $item->keluhan_kendaraan }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_servis)->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('daftar-service.edit', $item->id_servis_pelanggan) }}"
                                           class="btn btn-warning btn-sm">
                                            ✏️ Edit
                                        </a>

                                        <form
                                            action="{{ route('daftar-service.destroy', $item->id_servis_pelanggan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data servis ini?')">

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
                                <td colspan="6" class="text-center text-secondary py-4">
                                    Belum ada data pendaftaran servis.
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
