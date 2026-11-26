<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pelanggan | Juragan Service Motor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #263248;
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
            z-index: 1000;
        }

        .brand {
            font-size: 22px;
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
            transition: .2s;
        }

        .menu a i {
            font-size: 18px;
            width: 22px;
            text-align: center;
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

        .page-heading {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-icon {
            width: 55px;
            height: 55px;
            min-width: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff3cd;
            color: #d18a00;
            border-radius: 12px;
            font-size: 27px;
        }

        .content-card,
        .form-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            border: 1px solid #edf0f4;
        }

        .form-label {
            color: #344054;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.12);
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 9px 15px;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-warning {
            background: #f59e0b;
            border-color: #f59e0b;
            color: #172033;
        }

        .btn-warning:hover {
            background: #d98700;
            border-color: #d98700;
            color: white;
        }

        .btn-success {
            background: #198754;
            border-color: #198754;
        }

        .btn-secondary {
            background: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary {
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .table {
            margin-bottom: 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 13px 12px;
        }

        .table thead th {
            background: #172033;
            color: white;
            border-color: #344054;
            font-weight: 600;
            white-space: nowrap;
        }

        .table thead th i {
            margin-right: 5px;
            color: #fbbf24;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .customer-count {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffe69c;
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-buttons .btn {
            white-space: nowrap;
        }

        .empty-icon {
            font-size: 40px;
            color: #adb5bd;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .brand {
                margin-bottom: 20px;
            }

            .menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 5px;
            }

            .menu a {
                margin-bottom: 5px;
                font-size: 13px;
                padding: 10px;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .content-card,
            .form-card {
                padding: 17px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .action-buttons {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 420px) {
            .menu {
                grid-template-columns: 1fr;
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
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door-fill"></i>
                Halaman Utama
            </a>

            <a href="{{ route('pelanggan.index') }}" class="active">
                <i class="bi bi-people-fill"></i>
                Data Pelanggan
            </a>

            <a href="{{ route('kendaraan.index') }}">
                <i class="bi bi-bicycle"></i>
                Data Kendaraan
            </a>

            <a href="{{ route('daftar-service.index') }}">
                <i class="bi bi-clipboard-check-fill"></i>
                Daftar Service
            </a>

            <a href="{{ route('data-service.index') }}">
                <i class="bi bi-wrench-adjustable"></i>
                Data Service
            </a>

            <a href="{{ route('pembayaran.index') }}">
                <i class="bi bi-credit-card-fill"></i>
                Pembayaran Service
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- HEADER -->
        <div class="mb-4">
            <div class="page-heading">
                <div class="page-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div>
                    @if(isset($dataEdit))
                        <h2 class="fw-bold mb-1">Edit Data Pelanggan</h2>
                        <p class="text-secondary mb-0">
                            Perbarui informasi pelanggan Juragan Service Motor.
                        </p>
                    @else
                        <h2 class="fw-bold mb-1">Data Pelanggan</h2>
                        <p class="text-secondary mb-0">
                            Kelola data pelanggan Juragan Service Motor.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Data gagal disimpan atau diperbarui!
                </strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM EDIT PELANGGAN -->
        @if(isset($dataEdit))

            <div class="form-card mb-4">

                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-pencil-square fs-4 text-warning"></i>
                    <h5 class="fw-bold mb-0">Formulir Edit Pelanggan</h5>
                </div>

                <p class="text-secondary mb-4">
                    Silakan ubah informasi pelanggan sesuai kebutuhan.
                </p>

                <form action="{{ route('pelanggan.update', $dataEdit->id_pelanggan) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ID Pelanggan</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $dataEdit->id_pelanggan }}"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text"
                               name="nama_lengkap"
                               class="form-control"
                               value="{{ old('nama_lengkap', $dataEdit->nama_lengkap) }}"
                               placeholder="Masukkan nama lengkap"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nomor HP</label>
                        <input type="text"
                               name="no_hp"
                               class="form-control"
                               value="{{ old('no_hp', $dataEdit->no_hp) }}"
                               placeholder="Masukkan nomor HP"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat Pelanggan</label>
                        <textarea name="alamat_pelanggan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan alamat pelanggan"
                                  required>{{ old('alamat_pelanggan', $dataEdit->alamat_pelanggan) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text"
                               name="pekerjaan"
                               class="form-control"
                               value="{{ old('pekerjaan', $dataEdit->pekerjaan) }}"
                               placeholder="Masukkan pekerjaan"
                               required>
                    </div>

                    <div class="d-flex gap-2 flex-wrap">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save-fill"></i>
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i>
                            Kembali
                        </a>
                    </div>

                </form>
            </div>

        @else

            <!-- FORM TAMBAH PELANGGAN -->
            <div class="form-card mb-4">

                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-person-plus-fill fs-4 text-primary"></i>
                        <h5 class="fw-bold mb-0">Tambah Pelanggan</h5>
                    </div>

                    <button class="btn btn-primary"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#formPelanggan">
                        <i class="bi bi-plus-circle-fill"></i>
                        Tambah Pelanggan
                    </button>
                </div>

                <div class="collapse {{ $errors->any() ? 'show' : '' }}" id="formPelanggan">
                    <hr>

                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text"
                                   name="nama_lengkap"
                                   class="form-control"
                                   value="{{ old('nama_lengkap') }}"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor HP</label>
                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   value="{{ old('no_hp') }}"
                                   placeholder="08xxxxxxxxxx"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Pelanggan</label>
                            <textarea name="alamat_pelanggan"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan alamat pelanggan"
                                      required>{{ old('alamat_pelanggan') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text"
                                   name="pekerjaan"
                                   class="form-control"
                                   value="{{ old('pekerjaan') }}"
                                   placeholder="Masukkan pekerjaan"
                                   required>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i>
                                Simpan Pelanggan
                            </button>

                            <button type="reset" class="btn btn-secondary">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        @endif

        <!-- TABEL DATA PELANGGAN -->
        <div class="content-card">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-table fs-4 text-primary"></i>
                    <h5 class="fw-bold mb-0">Daftar Pelanggan</h5>
                </div>

                <span class="customer-count">
                    <i class="bi bi-people-fill me-1"></i>
                    Total: {{ $pelanggan->count() }} pelanggan
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">

                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i>No</th>
                            <th><i class="bi bi-card-list"></i>ID Pelanggan</th>
                            <th><i class="bi bi-person-fill"></i>Nama Lengkap</th>
                            <th><i class="bi bi-telephone-fill"></i>No. HP</th>
                            <th><i class="bi bi-geo-alt-fill"></i>Alamat Pelanggan</th>
                            <th><i class="bi bi-briefcase-fill"></i>Pekerjaan</th>
                            <th><i class="bi bi-calendar-event-fill"></i>Tanggal Ditambahkan</th>
                            <th><i class="bi bi-gear-fill"></i>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pelanggan as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->id_pelanggan }}</td>
                                <td class="fw-semibold">{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->alamat_pelanggan }}</td>
                                <td>{{ $data->pekerjaan }}</td>

                                <td>
                                    {{ $data->created_at ? $data->created_at->format('d-m-Y H:i') : '-' }}
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <a href="{{ route('pelanggan.edit', $data->id_pelanggan) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('pelanggan.destroy', $data->id_pelanggan) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus pelanggan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-secondary py-5">
                                    <div class="empty-icon">
                                        <i class="bi bi-person-x"></i>
                                    </div>
                                    <h5>Belum ada data pelanggan</h5>
                                    <p class="mb-0">
                                        Silakan klik tombol Tambah Pelanggan untuk memasukkan data.
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
