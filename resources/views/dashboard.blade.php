<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Juragan Service Motor | Halaman Utama</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            font-family: Arial, sans-serif;
            color: #172033;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #172033;
            color: white;
            padding: 25px 18px;
            overflow-y: auto;
            z-index: 1000;
        }

        /* BRAND */
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
            font-size: 30px;
        }

        /* MENU SIDEBAR */
        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 9px;
            transition: .2s;
            font-size: 16px;
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

        /* MAIN CONTENT */
        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h2 {
            font-size: 28px;
            font-weight: 700;
            color: #172033;
        }

        /* HERO BANNER */
        .hero-banner {
            min-height: 220px;
            border-radius: 18px;
            margin-bottom: 25px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            overflow: hidden;
            color: white;
            background:
                linear-gradient(90deg, rgba(23,32,51,.96) 0%, rgba(23,32,51,.85) 48%, rgba(23,32,51,.20) 100%),
                url('https://onroad.co.in/assets/images/packages/premium-service.png');
            background-size: cover;
            background-position: center;
            box-shadow: 0 5px 18px rgba(23,32,51,.13);
        }

        .hero-content {
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-block;
            background: rgba(245,158,11,.2);
            color: #fbbf24;
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 13px;
        }

        .hero-content h3 {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hero-content p {
            color: #e2e8f0;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        .hero-decoration {
            font-size: 90px;
            color: rgba(255,255,255,.8);
            padding-right: 25px;
        }

        /* STATISTIC CARDS */
        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 21px;
            background: white;
            box-shadow: 0 3px 13px rgba(15,23,42,.05);
            height: 100%;
            transition: .25s;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(15,23,42,.10);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            right: -25px;
            top: -25px;
            background: var(--soft-color);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
            background: var(--soft-color);
            color: var(--accent-color);
        }

        .stat-number {
            font-size: 29px;
            font-weight: bold;
            margin-top: 17px;
            color: #172033;
            position: relative;
            z-index: 1;
        }

        .stat-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .stat-description {
            display: block;
            margin-top: 7px;
            font-size: 12px;
            color: #64748b;
            position: relative;
            z-index: 1;
        }

        .stat-line {
            width: 38px;
            height: 4px;
            border-radius: 10px;
            background: var(--accent-color);
            margin-top: 14px;
        }

        .blue {
            --accent-color: #2563eb;
            --soft-color: #dbeafe;
        }

        .green {
            --accent-color: #16a34a;
            --soft-color: #dcfce7;
        }

        .purple {
            --accent-color: #9333ea;
            --soft-color: #f3e8ff;
        }

        .orange {
            --accent-color: #ea580c;
            --soft-color: #ffedd5;
        }

        .cyan {
            --accent-color: #0891b2;
            --soft-color: #cffafe;
        }

        .yellow {
            --accent-color: #ca8a04;
            --soft-color: #fef9c3;
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            padding: 23px;
            border-radius: 15px;
            margin-top: 27px;
            box-shadow: 0 3px 13px rgba(15,23,42,.05);
        }

        .table-title {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 20px;
        }

        .table-title-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .table-title h5 {
            font-weight: bold;
            margin: 0;
        }

        .table-title small {
            color: #64748b;
            font-size: 12px;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            white-space: nowrap;
            background: #172033 !important;
            color: white !important;
            font-size: 13px;
            font-weight: 600;
            padding: 15px 13px;
            border: none;
        }

        .table thead th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .table thead th:last-child {
            border-radius: 0 8px 8px 0;
        }

        .table thead th i {
            margin-right: 5px;
            color: #fbbf24;
        }

        .table tbody td {
            white-space: nowrap;
            padding: 14px 13px;
            font-size: 13px;
            color: #475569;
            border-bottom: 1px solid #edf0f4;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .service-id {
            color: #2563eb;
            font-weight: bold;
        }

        .status-badge {
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-selesai {
            background: #dcfce7;
            color: #15803d;
        }

        .status-diproses {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-menunggu {
            background: #fef3c7;
            color: #a16207;
        }

        /* FOOTER */
        .footer {
            color: #94a3b8;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .hero-banner {
                min-height: 190px;
                padding: 23px;
            }

            .hero-content h3 {
                font-size: 22px;
            }

            .hero-decoration {
                display: none;
            }

            .stat-number {
                font-size: 25px;
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
                <i class="bi bi-wrench-adjustable-circle-fill"></i>
                Data Service
            </a>

            <a href="{{ route('pembayaran.index') }}"
               class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                <i class="bi bi-wallet-fill"></i>
                Pembayaran Service
            </a>

        </div>
    </div>


    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- HEADER -->
        <div class="page-heading">

            <h2>
                <i class="bi bi-speedometer2 text-primary me-2"></i>
                Halaman Utama
            </h2>

            <p class="text-secondary mb-0">
                Selamat datang di sistem manajemen servis motor.
            </p>

        </div>


        <!-- HERO BANNER -->
        <div class="hero-banner">

            <div class="hero-content">

                <span class="hero-label">
                    <i class="bi bi-stars me-1"></i>
                    SISTEM MANAJEMEN BENGKEL
                </span>

                <h3>Selamat Datang di Toko Juragan Service Motor</h3>

                <p>
                    Kelola data pelanggan, kendaraan, pendaftaran servis,
                    pengerjaan mekanik, dan pembayaran dalam satu sistem
                    yang mudah dan terintegrasi.
                </p>

            </div>

            <div class="hero-decoration">
                <i class="bi bi-gear-wide-connected"></i>
            </div>

        </div>


        <!-- STATISTIK -->
        <div class="row g-3">

            <!-- TOTAL SERVIS -->
            <div class="col-md-4">
                <div class="stat-card blue">

                    <div class="stat-top">
                        <div class="stat-title">Total Servis</div>
                        <div class="stat-icon">
                            <i class="bi bi-clipboard-data-fill"></i>
                        </div>
                    </div>

                    <div class="stat-number">
                        {{ $totalDaftarServis }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-list-check me-1"></i>
                        Seluruh pendaftaran servis
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>


            <!-- SERVIS SELESAI -->
            <div class="col-md-4">
                <div class="stat-card green">

                    <div class="stat-top">
                        <div class="stat-title">Servis Selesai</div>
                        <div class="stat-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                    </div>

                    <div class="stat-number">
                        {{ count(array_unique($idServisSelesai)) }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-check2-all me-1"></i>
                        Sudah melakukan pembayaran
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>


            <!-- TOTAL PELANGGAN -->
            <div class="col-md-4">
                <div class="stat-card purple">

                    <div class="stat-top">
                        <div class="stat-title">Total Pelanggan</div>
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>

                    <div class="stat-number">
                        {{ $totalPelanggan }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-person-check-fill me-1"></i>
                        Pelanggan terdaftar
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>


            <!-- TOTAL KENDARAAN -->
            <div class="col-md-4">
                <div class="stat-card orange">

                    <div class="stat-top">
                        <div class="stat-title">Total Kendaraan</div>
                        <div class="stat-icon">
                            <i class="bi bi-bicycle"></i>
                        </div>
                    </div>

                    <div class="stat-number">
                        {{ $totalKendaraan }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-motorcycle me-1"></i>
                        Kendaraan terdaftar
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>


            <!-- TOTAL PEMBAYARAN -->
            <div class="col-md-4">
                <div class="stat-card cyan">

                    <div class="stat-top">
                        <div class="stat-title">Total Pembayaran</div>
                        <div class="stat-icon">
                            <i class="bi bi-wallet-fill"></i>
                        </div>
                    </div>

                    <div class="stat-number">
                        {{ $totalPembayaran }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-receipt me-1"></i>
                        Transaksi pembayaran
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>


            <!-- TOTAL PENDAPATAN -->
            <div class="col-md-4">
                <div class="stat-card yellow">

                    <div class="stat-top">
                        <div class="stat-title">Total Pendapatan</div>
                        <div class="stat-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                    </div>

                    <div class="stat-number" style="font-size: 22px;">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </div>

                    <small class="stat-description">
                        <i class="bi bi-graph-up-arrow me-1"></i>
                        Akumulasi pembayaran
                    </small>

                    <div class="stat-line"></div>

                </div>
            </div>

        </div>


        <!-- TABEL SERVIS TERBARU -->
        <div class="table-card">

            <div class="table-title">

                <div class="table-title-icon">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div>
                    <h5>Servis Terbaru</h5>
                    <small>Daftar pendaftaran servis terbaru</small>
                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i>No</th>
                            <th><i class="bi bi-upc-scan"></i>ID Servis</th>
                            <th><i class="bi bi-person-fill"></i>Pelanggan</th>
                            <th><i class="bi bi-bicycle"></i>No. Plat</th>
                            <th><i class="bi bi-chat-left-text-fill"></i>Keluhan</th>
                            <th><i class="bi bi-calendar-event-fill"></i>Tanggal</th>
                            <th><i class="bi bi-info-circle-fill"></i>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($servisTerbaru as $index => $item)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <span class="service-id">
                                        #{{ $item->id_servis_pelanggan }}
                                    </span>
                                </td>

                                <td>
                                    <i class="bi bi-person-circle text-secondary me-1"></i>
                                    {{ $item->pelanggan->nama_lengkap ?? '-' }}
                                </td>

                                <td>
                                    <span class="fw-semibold text-dark">
                                        {{ $item->no_plat_kendaraan }}
                                    </span>
                                </td>

                                <td>
                                    {{ $item->keluhan_kendaraan }}
                                </td>

                                <td>
                                    <i class="bi bi-calendar3 text-secondary me-1"></i>
                                    {{ $item->tanggal_servis
                                        ? \Carbon\Carbon::parse($item->tanggal_servis)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>

                                    @if (in_array($item->id_servis_pelanggan, $idServisSelesai))

                                        <span class="status-badge status-selesai">
                                            <i class="bi bi-check-circle-fill"></i>
                                            Selesai
                                        </span>

                                    @elseif (in_array($item->id_servis_pelanggan, $idServisDiproses))

                                        <span class="status-badge status-diproses">
                                            <i class="bi bi-arrow-repeat"></i>
                                            Diproses
                                        </span>

                                    @else

                                        <span class="status-badge status-menunggu">
                                            <i class="bi bi-hourglass-split"></i>
                                            Menunggu
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-secondary py-5">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Belum ada data servis.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>


        <!-- FOOTER -->
        <div class="text-center footer mt-4 mb-3">

            <i class="bi bi-tools me-1"></i>
            © {{ date('Y') }} Juragan Service Motor |
            Sistem Manajemen Servis Motor

        </div>

    </div>

</body>
</html>
