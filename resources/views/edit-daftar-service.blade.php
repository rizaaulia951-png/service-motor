<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Daftar Servis | Service Motor</title>

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
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            max-width: 900px;
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
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>

            <a href="{{ route('daftar-service.index') }}" class="active">
                📋 Daftar Servis
            </a>

            <a href="{{ route('pelanggan.index') }}">👤 Data Pelanggan</a>

            <a href="{{ route('kendaraan.index') }}">🏍️ Data Kendaraan</a>

            <a href="{{ route('data-service.index') }}">🛠️ Riwayat Servis</a>

            <a href="{{ route('pembayaran.index') }}">💳 Pembayaran</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="mb-4">
            <h2 class="fw-bold">Edit Daftar Servis</h2>
            <p class="text-secondary">
                Ubah informasi pendaftaran servis pelanggan.
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

            <h5 class="fw-bold mb-4">Form Edit Pendaftaran Servis</h5>

            <form action="{{ route('daftar-service.update', $data->id_servis_pelanggan) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">ID Servis</label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $data->id_servis_pelanggan }}"
                        readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>

                    <select name="id_pelanggan" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>

                        @foreach($pelanggan as $p)
                            <option value="{{ $p->id_pelanggan }}"
                                {{ old('id_pelanggan', $data->id_pelanggan) == $p->id_pelanggan ? 'selected' : '' }}>
                                {{ $p->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Plat Kendaraan</label>

                    <select name="no_plat_kendaraan" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>

                        @foreach($kendaraan as $k)
                            <option value="{{ $k->no_plat_kendaraan }}"
                                {{ old('no_plat_kendaraan', $data->no_plat_kendaraan) == $k->no_plat_kendaraan ? 'selected' : '' }}>
                                {{ $k->no_plat_kendaraan }} - {{ $k->nama_pemilik }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keluhan Kendaraan</label>

                    <textarea
                        name="keluhan_kendaraan"
                        class="form-control"
                        rows="4"
                        required>{{ old('keluhan_kendaraan', $data->keluhan_kendaraan) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Tanggal Servis</label>

                    <input
                        type="date"
                        name="tanggal_servis"
                        class="form-control"
                        value="{{ old('tanggal_servis', \Carbon\Carbon::parse($data->tanggal_servis)->format('Y-m-d')) }}"
                        required>
                </div>

                <button type="submit" class="btn btn-warning fw-bold">
                    💾 Simpan Perubahan
                </button>

                <a href="{{ route('daftar-service.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>
        </div>

    </div>

</body>
</html>
