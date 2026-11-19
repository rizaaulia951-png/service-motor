<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan | Service Motor</title>

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
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            max-width: 900px;
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
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('daftar-service.index') }}">📋 Daftar Servis</a>
            <a href="{{ route('pelanggan.index') }}">👤 Data Pelanggan</a>
            <a href="{{ route('kendaraan.index') }}" class="active">🏍️ Data Kendaraan</a>
            <a href="{{ route('data-service.index') }}">🛠️ Riwayat Servis</a>
            <a href="{{ route('pembayaran.index') }}">💳 Pembayaran</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="mb-4">
            <h2 class="fw-bold">Edit Data Kendaraan</h2>
            <p class="text-secondary">
                Perbarui informasi kendaraan pelanggan.
            </p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Data gagal diperbarui!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">

            <h5 class="fw-bold mb-4">Form Edit Kendaraan</h5>

            <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Plat Kendaraan</label>
                    <input
                        type="text"
                        name="no_plat_kendaraan"
                        class="form-control"
                        value="{{ old('no_plat_kendaraan', $kendaraan->no_plat_kendaraan) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" class="form-select" required>
                        <option value="">-- Pilih Jenis Kendaraan --</option>
                        <option value="Matic"
                            {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Matic' ? 'selected' : '' }}>
                            Matic
                        </option>
                        <option value="Manual Transmisi"
                            {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Manual Transmisi' ? 'selected' : '' }}>
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
                        value="{{ old('no_stnk', $kendaraan->no_stnk) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tahun Pembuatan</label>
                    <input
                        type="number"
                        name="tahun_pembuatan"
                        class="form-control"
                        value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}"
                        min="1900"
                        max="{{ date('Y') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pemilik</label>
                    <input
                        type="text"
                        name="nama_pemilik"
                        class="form-control"
                        value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Warna Kendaraan</label>
                    <input
                        type="text"
                        name="warna_kendaraan"
                        class="form-control"
                        value="{{ old('warna_kendaraan', $kendaraan->warna_kendaraan) }}"
                        required>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success">
                        💾 Simpan Perubahan
                    </button>

                    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
