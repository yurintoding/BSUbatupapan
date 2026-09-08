<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard - Bank Sampah Batupapan
    </title>


    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}">


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <ul class="nav-menu">
        <li>

    <a href="{{ route('penarikan.index') }}">

        Penarikan

    </a>
    <ul class="nav-menu">

    <ul class="nav-menu">

    <li>
        <a href="{{ route('dashboard') }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="{{ route('nasabah.index') }}">
            Nasabah
        </a>
    </li>

    <li>
        <a href="{{ route('jenis-sampah.index') }}">
            Jenis Sampah
        </a>
    </li>

    <li>
        <a href="{{ route('transaksi.index') }}">
            Transaksi
        </a>
    </li>

    <li>
        <a href="{{ route('penarikan.index') }}">
            💵 Penarikan Saldo
        </a>
    </li>

    <li>
        <a href="{{ route('laporan.index') }}">
            📊 Laporan
        </a>
    </li>

</ul>
    <style>

        body {
            background: #f5f7f6;
        }


        /* ==============================
           DASHBOARD
        ============================== */

        .dashboard {
            padding: 40px 0 70px;
        }


        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }


        .dashboard-header h1 {
            color: #155e34;
            margin-bottom: 5px;
        }


        .dashboard-header p {
            color: #666;
        }


        .dashboard-date {
            background: white;
            padding: 12px 18px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }


        /* ==============================
           STATISTIK
        ============================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 20px;

            margin-bottom: 25px;
        }


        .stat-card {
            background: white;

            padding: 22px;

            border-radius: 12px;

            box-shadow:
                0 3px 15px rgba(0,0,0,.06);

            display: flex;

            align-items: center;

            gap: 15px;
        }


        .stat-icon {
            width: 55px;

            height: 55px;

            min-width: 55px;

            border-radius: 12px;

            background: #e5f5e9;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 26px;
        }


        .stat-content small {
            display: block;

            color: #777;

            margin-bottom: 5px;
        }


        .stat-content strong {
            font-size: 22px;

            color: #155e34;
        }


        /* ==============================
           CONTENT GRID
        ============================== */

        .content-grid {
            display: grid;

            grid-template-columns:
                2fr 1fr;

            gap: 20px;

            margin-bottom: 25px;
        }


        .card {
            background: white;

            padding: 25px;

            border-radius: 12px;

            box-shadow:
                0 3px 15px rgba(0,0,0,.06);
        }


        .card-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;
        }


        .card-header h2 {
            color: #155e34;

            font-size: 20px;
        }


        .card-header a {
            color: #168244;

            font-weight: bold;

            font-size: 14px;
        }


        .chart-container {
            position: relative;

            height: 320px;
        }


        /* ==============================
           JENIS SAMPAH
        ============================== */

        .waste-list {
            display: flex;

            flex-direction: column;

            gap: 15px;
        }


        .waste-item {
            display: flex;

            justify-content: space-between;

            align-items: center;

            padding-bottom: 12px;

            border-bottom: 1px solid #eee;
        }


        .waste-name {
            font-weight: 600;
        }


        .waste-weight {
            color: #168244;

            font-weight: bold;
        }


        /* ==============================
           TRANSAKSI
        ============================== */

        .table-card {
            overflow-x: auto;
        }


        table {
            width: 100%;

            border-collapse: collapse;
        }


        th {
            background: #155e34;

            color: white;

            padding: 14px;

            text-align: left;

            font-size: 14px;
        }


        td {
            padding: 14px;

            border-bottom:
                1px solid #eee;

            font-size: 14px;
        }


        tr:hover {
            background: #f6fbf7;
        }


        .badge {
            display: inline-block;

            padding: 5px 9px;

            border-radius: 20px;

            background: #e5f5e9;

            color: #155e34;

            font-size: 12px;

            font-weight: bold;
        }


        .money {
            color: #168244;

            font-weight: bold;
        }


        .btn-detail {
            background: #e5f1ff;

            color: #1765a8;

            padding: 7px 11px;

            border-radius: 5px;

            font-size: 12px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media(max-width: 1000px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }


            .content-grid {
                grid-template-columns: 1fr;
            }

        }


        @media(max-width: 600px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }


            .dashboard-header {
                flex-direction: column;

                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


<!-- ==============================
     NAVBAR
============================== -->

<nav class="navbar">

    <div class="container nav-content">


        <a
            href="{{ route('dashboard') }}"
            class="logo">


            <div class="logo-icon">
                ♻
            </div>


            <div class="logo-text">

                <h3>
                    BANK SAMPAH BATUPAPAN
                </h3>

                <span>
                    Kelurahan Batupapan
                </span>

            </div>


        </a>


        <ul class="nav-menu">

            <li>

                <a
                    href="{{ route('dashboard') }}">

                    Dashboard

                </a>

            </li>


            <li>

                <a
                    href="{{ route('nasabah.index') }}">

                    Nasabah

                </a>

            </li>


            <li>

                <a
                    href="{{ route('jenis-sampah.index') }}">

                    Jenis Sampah

                </a>

            </li>


            <li>

                <a
                    href="{{ route('transaksi.index') }}">

                    Transaksi

                </a>

            </li>

        </ul>


    </div>

</nav>


<!-- ==============================
     DASHBOARD
============================== -->

<section class="dashboard">

    <div class="container">


        <!-- HEADER -->

        <div class="dashboard-header">

            <div>

                <h1>
                    Dashboard Bank Sampah
                </h1>

                <p>
                    Kelurahan Batupapan
                </p>

            </div>


            <div class="dashboard-date">

                📅

                {{ now()->translatedFormat('d F Y') }}

            </div>

        </div>


        <!-- ==============================
             STATISTIK
        ============================== -->

        <div class="stats-grid">


            <!-- NASABAH -->

            <div class="stat-card">

                <div class="stat-icon">
                    👥
                </div>


                <div class="stat-content">

                    <small>
                        Total Nasabah
                    </small>

                    <strong>
                        {{ number_format($totalNasabah, 0, ',', '.') }}
                    </strong>

                </div>

            </div>


            <!-- JENIS SAMPAH -->

            <div class="stat-card">

                <div class="stat-icon">
                    ♻️
                </div>


                <div class="stat-content">

                    <small>
                        Jenis Sampah
                    </small>

                    <strong>
                        {{ number_format($totalJenisSampah, 0, ',', '.') }}
                    </strong>

                </div>

            </div>


            <!-- TRANSAKSI -->

            <div class="stat-card">

                <div class="stat-icon">
                    🧾
                </div>


                <div class="stat-content">

                    <small>
                        Total Transaksi
                    </small>

                    <strong>
                        {{ number_format($totalTransaksi, 0, ',', '.') }}
                    </strong>

                </div>

            </div>


            <!-- BERAT -->

            <div class="stat-card">

                <div class="stat-icon">
                    ⚖️
                </div>


                <div class="stat-content">

                    <small>
                        Sampah Terkumpul
                    </small>

                    <strong>

                        {{ number_format($totalBerat, 2, ',', '.') }}

                        Kg

                    </strong>

                </div>

            </div>


        </div>


        <!-- ==============================
             STATISTIK KEUANGAN
        ============================== -->

        <div class="stats-grid">


            <!-- SALDO -->

            <div class="stat-card">

                <div class="stat-icon">
                    💰
                </div>


                <div class="stat-content">

                    <small>
                        Total Saldo Nasabah
                    </small>

                    <strong>

                        Rp
                        {{ number_format($totalSaldo, 0, ',', '.') }}

                    </strong>

                </div>

            </div>


            <!-- NILAI SETORAN -->

            <div class="stat-card">

                <div class="stat-icon">
                    💵
                </div>


                <div class="stat-content">

                    <small>
                        Nilai Setoran
                    </small>

                    <strong>

                        Rp
                        {{ number_format($totalNilaiSetoran, 0, ',', '.') }}

                    </strong>

                </div>

            </div>


        </div>


        <!-- ==============================
             GRAFIK
        ============================== -->

        <div class="content-grid">


            <div class="card">

                <div class="card-header">

                    <h2>
                        Grafik Setoran Sampah
                    </h2>

                </div>


                <div class="chart-container">

                    <canvas
                        id="setoranChart">
                    </canvas>

                </div>

            </div>


            <!-- JENIS SAMPAH -->

            <div class="card">

                <div class="card-header">

                    <h2>
                        Sampah Terbanyak
                    </h2>

                    <a
                        href="{{ route('jenis-sampah.index') }}">

                        Lihat Semua

                    </a>

                </div>


                <div class="waste-list">


                    @forelse(
                        $sampahPerJenis->take(6)
                        as $item
                    )

                        <div class="waste-item">


                            <div class="waste-name">

                                {{ $item->jenisSampah->nama_sampah }}

                            </div>


                            <div class="waste-weight">

                                {{ number_format(
                                    $item->total_berat,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                                Kg

                            </div>


                        </div>


                    @empty

                        <p
                            style="color:#777;">

                            Belum ada data
                            setoran sampah.

                        </p>

                    @endforelse


                </div>

            </div>


        </div>


        <!-- ==============================
             TRANSAKSI TERBARU
        ============================== -->

        <div class="card table-card">


            <div class="card-header">

                <h2>
                    Transaksi Terbaru
                </h2>


                <a
                    href="{{ route('transaksi.index') }}">

                    Lihat Semua →

                </a>

            </div>


            <table>

                <thead>

                    <tr>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Nasabah
                        </th>

                        <th>
                            Jenis Sampah
                        </th>

                        <th>
                            Berat
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse(
                        $transaksiTerbaru
                        as $transaksi
                    )


                        <tr>


                            <td>

                                {{ $transaksi->tanggal
                                    ->format('d-m-Y') }}

                            </td>


                            <td>

                                <strong>

                                    {{ $transaksi
                                        ->nasabah
                                        ->nama }}

                                </strong>

                                <br>

                                <small>

                                    {{ $transaksi
                                        ->nasabah
                                        ->nomor_nasabah }}

                                </small>

                            </td>


                            <td>

                                <span class="badge">

                                    {{ $transaksi
                                        ->jenisSampah
                                        ->nama_sampah }}

                                </span>

                            </td>


                            <td>

                                {{ number_format(
                                    $transaksi->berat,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                                Kg

                            </td>


                            <td class="money">

                                Rp

                                {{ number_format(
                                    $transaksi->total_harga,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <td>

                                <a
                                    href="{{ route(
                                        'transaksi.show',
                                        $transaksi->id
                                    ) }}"
                                    class="btn-detail">

                                    Detail

                                </a>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="6"
                                style="text-align:center;">

                                Belum ada transaksi.

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>


        </div>


    </div>

</section>


<!-- ==============================
     CHART
============================== -->

<script>

    const grafikData = @json($grafikSetoran);


    const labels = grafikData.map(
        item => item.bulan
    );


    const beratData = grafikData.map(
        item => parseFloat(item.total_berat)
    );


    const nilaiData = grafikData.map(
        item => parseFloat(item.total_nilai)
    );


    const ctx =
        document
            .getElementById('setoranChart')
            .getContext('2d');


    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: labels,

            datasets: [

                {

                    label:
                        'Sampah Terkumpul (Kg)',

                    data: beratData,

                    borderWidth: 1

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    display: true

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    title: {

                        display: true,

                        text: 'Kilogram'

                    }

                }

            }

        }

    });

</script>


</body>

</html>