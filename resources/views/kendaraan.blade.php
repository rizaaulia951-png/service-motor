<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan | Service Motor</title>

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

        .content-card,
        .form-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 15px;
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

        <!-- HEADER -->
        <div class="mb-4">
            <h2 class="fw-bold">Data Kendaraan</h2>
            <p class="text-secondary">
                Kelola data kendaraan pelanggan bengkel Service Motor.
            </p>
        </div>

        <!-- NOTIFIKASI BERHASIL -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- NOTIFIKASI GAGAL -->
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

        <!-- FORM TAMBAH KENDARAAN -->
        <div class="form-card mb-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Tambah Kendaraan</h5>

                <button class="btn btn-primary"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#formKendaraan">
                    + Tambah Kendaraan
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

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            💾 Simpan Kendaraan
                        </button>

                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <!-- TABEL DATA KENDARAAN -->
        <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h5 class="fw-bold mb-0">Daftar Kendaraan</h5>

                <span class="badge bg-warning text-dark fs-6">
                    Total: {{ $kendaraan->count() }} kendaraan
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nomor Plat</th>
                            <th>Jenis Kendaraan</th>
                            <th>No. STNK</th>
                            <th>Tahun Pembuatan</th>
                            <th>Nama Pemilik</th>
                            <th>Warna</th>
                            <th>Tanggal Ditambahkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($kendaraan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->no_plat_kendaraan }}</td>
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
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('kendaraan.edit', $data->id) }}"
                                           class="btn btn-warning btn-sm">
                                            ✏️ Edit
                                        </a>

                                        <form action="{{ route('kendaraan.destroy', $data->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus kendaraan ini?')">

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
                                <td colspan="10" class="text-center text-secondary py-5">
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
