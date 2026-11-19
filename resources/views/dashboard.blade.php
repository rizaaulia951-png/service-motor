<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Service Motor | Halaman Utama</title>

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

        .stat-card {
            border: none;
            border-radius: 14px;
            padding: 22px;
            background: white;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            height: 100%;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 16px rgba(0,0,0,.08);
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
            color: #172033;
        }

        .stat-icon {
            font-size: 27px;
            margin-bottom: 12px;
        }

        .table-card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            margin-top: 25px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        .table thead th {
            white-space: nowrap;
        }

        .table tbody td {
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
                padding: 20px;
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
                🏠 Halaman Utama
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

            <h2 class="fw-bold">Halaman Utama</h2>

            <p class="text-secondary mb-0">
                Selamat datang di sistem manajemen servis motor.
            </p>

        </div>


        <!-- STATISTIK: 3 KOTAK ATAS DAN 3 KOTAK BAWAH -->
        <div class="row g-3">

            <!-- TOTAL SERVIS -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">📋</div>

                    <div class="text-secondary">
                        Total Servis
                    </div>

                    <div class="stat-number">
                        {{ $totalDaftarServis }}
                    </div>

                    <small class="text-success">
                        Seluruh pendaftaran servis
                    </small>

                </div>
            </div>


            <!-- SERVIS SELESAI -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">✅</div>

                    <div class="text-secondary">
                        Servis Selesai
                    </div>

                    <div class="stat-number">
                        {{ count(array_unique($idServisSelesai)) }}
                    </div>

                    <small class="text-success">
                        Sudah melakukan pembayaran
                    </small>

                </div>
            </div>


            <!-- TOTAL PELANGGAN -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">👤</div>

                    <div class="text-secondary">
                        Total Pelanggan
                    </div>

                    <div class="stat-number">
                        {{ $totalPelanggan }}
                    </div>

                    <small class="text-secondary">
                        Pelanggan terdaftar
                    </small>

                </div>
            </div>


            <!-- TOTAL KENDARAAN -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">🏍️</div>

                    <div class="text-secondary">
                        Total Kendaraan
                    </div>

                    <div class="stat-number">
                        {{ $totalKendaraan }}
                    </div>

                    <small class="text-secondary">
                        Kendaraan terdaftar
                    </small>

                </div>
            </div>


            <!-- TOTAL PEMBAYARAN -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">💳</div>

                    <div class="text-secondary">
                        Total Pembayaran
                    </div>

                    <div class="stat-number">
                        {{ $totalPembayaran }}
                    </div>

                    <small class="text-secondary">
                        Transaksi pembayaran
                    </small>

                </div>
            </div>


            <!-- TOTAL PENDAPATAN -->
            <div class="col-md-4">
                <div class="stat-card">

                    <div class="stat-icon">💰</div>

                    <div class="text-secondary">
                        Total Pendapatan
                    </div>

                    <div class="stat-number" style="font-size: 22px;">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </div>

                    <small class="text-success">
                        Akumulasi pembayaran
                    </small>

                </div>
            </div>

        </div>


        <!-- TABEL SERVIS TERBARU -->
        <div class="table-card">

            <div class="mb-3">

                <h5 class="fw-bold mb-0">
                    Servis Terbaru
                </h5>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>ID Servis</th>
                            <th>Pelanggan</th>
                            <th>No. Plat</th>
                            <th>Keluhan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($servisTerbaru as $index => $item)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{ $item->id_servis_pelanggan }}
                                </td>

                                <td>
                                    {{ $item->pelanggan->nama_lengkap ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->no_plat_kendaraan }}
                                </td>

                                <td>
                                    {{ $item->keluhan_kendaraan }}
                                </td>

                                <td>
                                    {{ $item->tanggal_servis
                                        ? \Carbon\Carbon::parse($item->tanggal_servis)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>

                                    @if (in_array($item->id_servis_pelanggan, $idServisSelesai))

                                        <span class="badge bg-success">
                                            Selesai
                                        </span>

                                    @elseif (in_array($item->id_servis_pelanggan, $idServisDiproses))

                                        <span class="badge bg-primary">
                                            Diproses
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Menunggu
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-secondary py-4">
                                    Belum ada data servis.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>


        <!-- FOOTER -->
        <div class="text-center text-secondary mt-4 mb-3">

            <small>
                © {{ date('Y') }} Service Motor |
                Sistem Manajemen Servis Motor
            </small>

        </div>

    </div>

</body>
</html>
