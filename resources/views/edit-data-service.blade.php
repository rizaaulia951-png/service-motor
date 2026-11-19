<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Servis | Service Motor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            max-width: 850px;
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

        .form-label {
            font-weight: 600;
        }

        .form-control {
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

    <div class="sidebar">

        <div class="brand">🔧 Service Motor</div>

        <div class="menu">

            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('daftar-service.index') }}">
                📋 Daftar Servis
            </a>

            <a href="{{ route('pelanggan.index') }}">
                👤 Data Pelanggan
            </a>

            <a href="{{ route('kendaraan.index') }}">
                🏍️ Data Kendaraan
            </a>

            <a href="{{ route('data-service.index') }}" class="active">
                🛠️ Riwayat Servis
            </a>

            <a href="{{ route('pembayaran.index') }}">
                💳 Pembayaran
            </a>

        </div>
    </div>


    <div class="main">

        <h1 class="page-title">Edit Riwayat Servis</h1>

        <p class="page-subtitle">
            Perbarui informasi pekerjaan dan perbaikan kendaraan.
        </p>

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

            <h5 class="mb-4">🛠️ Form Edit Riwayat Servis</h5>

            <form action="{{ route('data-service.update', $data->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">ID Servis Pelanggan</label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $data->id_servis_pelanggan }}"
                        readonly
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Keluhan Kendaraan</label>

                    <textarea class="form-control" rows="3" readonly>{{ $data->keluhan_kendaraan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estimasi Service</label>

                    <input
                        type="text"
                        name="estimasi_service"
                        class="form-control"
                        value="{{ old('estimasi_service', $data->estimasi_service) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Mekanik</label>

                    <input
                        type="text"
                        name="nama_mekanik"
                        class="form-control"
                        value="{{ old('nama_mekanik', $data->nama_mekanik) }}"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Sparepart Pengganti</label>

                    <textarea
                        name="sparepart_pengganti"
                        class="form-control"
                        rows="3"
                        required
                    >{{ old('sparepart_pengganti', $data->sparepart_pengganti) }}</textarea>
                </div>

                <button type="submit" class="btn-save">
                    💾 Simpan Perubahan
                </button>

                <a href="{{ route('data-service.index') }}"
                   class="btn btn-secondary ms-2">
                    ↩️ Kembali
                </a>

            </form>

        </div>

    </div>

</body>
</html>
