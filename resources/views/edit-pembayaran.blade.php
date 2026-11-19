<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembayaran | Service Motor</title>

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

        .form-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            max-width: 850px;
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

            <a href="{{ route('data-service.index') }}">
                🛠️ Riwayat Servis
            </a>

            <a href="{{ route('pembayaran.index') }}" class="active">
                💳 Pembayaran
            </a>

        </div>
    </div>


    <!-- KONTEN UTAMA -->
    <div class="main">

        <h1 class="page-title">Edit Pembayaran</h1>

        <p class="page-subtitle">
            Perbarui informasi transaksi pembayaran servis kendaraan.
        </p>


        <!-- PESAN ERROR -->
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


        <!-- FORM EDIT -->
        <div class="form-card">

            <h5 class="mb-4">
                💳 Form Edit Pembayaran
            </h5>

            <form action="{{ route('pembayaran.update', $data->id) }}" method="POST">

                @csrf
                @method('PUT')


                <!-- ID PEMBAYARAN -->
                <div class="mb-3">

                    <label class="form-label">
                        ID Pembayaran
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $data->id }}"
                        readonly
                    >

                </div>


                <!-- ID SERVIS -->
                <div class="mb-3">

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
                                {{ old('id_servis_pelanggan', $data->id_servis_pelanggan) == $item->id_servis_pelanggan ? 'selected' : '' }}
                            >
                                ID Servis: {{ $item->id_servis_pelanggan }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- JUMLAH BIAYA -->
                <div class="mb-3">

                    <label class="form-label">
                        Jumlah Biaya Servis (Rp)
                    </label>

                    <input
                        type="number"
                        name="jumlah_biaya_servis"
                        class="form-control"
                        min="0"
                        step="0.01"
                        value="{{ old('jumlah_biaya_servis', $data->jumlah_biaya_servis) }}"
                        required
                    >

                </div>


                <!-- JENIS PEMBAYARAN -->
                <div class="mb-3">

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
                            {{ old('jenis_pembayaran', $data->jenis_pembayaran) == 'Cash/Tunai' ? 'checked' : '' }}
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
                            {{ old('jenis_pembayaran', $data->jenis_pembayaran) == 'Non Tunai' ? 'checked' : '' }}
                        >

                        <label class="form-check-label" for="non_tunai">
                            Non Tunai
                        </label>

                    </div>

                </div>


                <!-- KETERANGAN -->
                <div class="mb-4">

                    <label class="form-label">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan keterangan pembayaran"
                    >{{ old('keterangan', $data->keterangan) }}</textarea>

                </div>


                <!-- TOMBOL -->
                <button type="submit" class="btn-save">
                    💾 Simpan Perubahan
                </button>

                <a href="{{ route('pembayaran.index') }}"
                   class="btn btn-secondary ms-2">
                    ↩️ Kembali
                </a>

            </form>

        </div>

    </div>

</body>
</html>
