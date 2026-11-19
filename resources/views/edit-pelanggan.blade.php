<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan | Service Motor</title>

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

        .content-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            max-width: 850px;
        }

        .page-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff3cd;
            border-radius: 12px;
            font-size: 27px;
            margin-bottom: 15px;
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
            <a href="{{ route('pelanggan.index') }}" class="active">👤 Data Pelanggan</a>
            <a href="{{ route('kendaraan.index') }}">🏍️ Data Kendaraan</a>
            <a href="{{ route('data-service.index') }}">🛠️ Riwayat Servis</a>
            <a href="{{ route('pembayaran.index') }}">💳 Pembayaran</a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- HEADER -->
        <div class="mb-4">
            <h2 class="fw-bold">Edit Data Pelanggan</h2>
            <p class="text-secondary">
                Perbarui informasi pelanggan bengkel Service Motor.
            </p>
        </div>

        <!-- FORM EDIT -->
        <div class="content-card">

            <div class="page-icon">✏️</div>

            <h5 class="fw-bold mb-1">Formulir Edit Pelanggan</h5>

            <p class="text-secondary mb-4">
                Silakan ubah informasi pelanggan sesuai kebutuhan.
            </p>

            <!-- NOTIFIKASI ERROR -->
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

            <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">

                @csrf
                @method('PUT')

                <!-- ID PELANGGAN -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">ID Pelanggan</label>
                    <input
                        type="text"
                        class="form-control"
                        value="{{ $pelanggan->id_pelanggan }}"
                        readonly>
                </div>

                <!-- NAMA LENGKAP -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input
                        type="text"
                        name="nama_lengkap"
                        class="form-control"
                        value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}"
                        placeholder="Masukkan nama lengkap"
                        required>
                </div>

                <!-- NOMOR HP -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor HP</label>
                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        value="{{ old('no_hp', $pelanggan->no_hp) }}"
                        placeholder="Masukkan nomor HP"
                        required>
                </div>

                <!-- ALAMAT -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat Pelanggan</label>
                    <textarea
                        name="alamat_pelanggan"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan alamat pelanggan"
                        required>{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}</textarea>
                </div>

                <!-- PEKERJAAN -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Pekerjaan</label>
                    <input
                        type="text"
                        name="pekerjaan"
                        class="form-control"
                        value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}"
                        placeholder="Masukkan pekerjaan"
                        required>
                </div>

                <!-- TOMBOL -->
                <div class="d-flex gap-2 flex-wrap">

                    <button type="submit" class="btn btn-success">
                        💾 Simpan Perubahan
                    </button>

                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>
