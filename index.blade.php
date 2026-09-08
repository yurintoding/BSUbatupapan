<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Transaksi - Bank Sampah Batupapan
    </title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

    <style>

        .admin-page {
            padding: 50px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            color: #155e34;
            margin-bottom: 5px;
        }

        .btn-add {
            background: #168244;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .table-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,.07);
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
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f5faf6;
        }

        .total {
            color: #168244;
            font-weight: bold;
        }

        .action {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn-small {
            padding: 7px 11px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-detail {
            background: #e5f1ff;
            color: #1765a8;
        }

        .btn-edit {
            background: #fff3cd;
            color: #856404;
        }

        .btn-delete {
            background: #f8d7da;
            color: #842029;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 14px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

    </style>

</head>


<body>


<nav class="navbar">

    <div class="container nav-content">

        <a href="/" class="logo">

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
                <a href="/">
                    Beranda
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

        </ul>

    </div>

</nav>


<section class="admin-page">

    <div class="container">


        <div class="page-header">

            <div>

                <h1>
                    Transaksi Setoran Sampah
                </h1>

                <p>
                    Catat setoran sampah masyarakat
                    Bank Sampah Kelurahan Batupapan.
                </p>

            </div>


            <a
                href="{{ route('transaksi.create') }}"
                class="btn-add">

                + Tambah Setoran

            </a>

        </div>


        @if(session('success'))

            <div class="alert-success">

                {{ session('success') }}

            </div>

        @endif


        <div class="table-card">

            @if($transaksis->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Tanggal</th>

                            <th>Nasabah</th>

                            <th>Jenis Sampah</th>

                            <th>Berat</th>

                            <th>Harga/Kg</th>

                            <th>Total</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($transaksis as $transaksi)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $transaksi->tanggal->format('d-m-Y') }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $transaksi->nasabah->nama }}
                                    </strong>

                                    <br>

                                    <small>
                                        {{ $transaksi->nasabah->nomor_nasabah }}
                                    </small>

                                </td>

                                <td>
                                    {{ $transaksi->jenisSampah->nama_sampah }}
                                </td>

                                <td>
                                    {{ number_format($transaksi->berat, 2, ',', '.') }}
                                    Kg
                                </td>

                                <td>
                                    Rp
                                    {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}
                                </td>

                                <td>

                                    <span class="total">

                                        Rp
                                        {{ number_format($transaksi->total, 0, ',', '.') }}

                                    </span>

                                </td>

                                <td>

                                    <div class="action">

                                        <a
                                            href="{{ route('transaksi.show', $transaksi->id) }}"
                                            class="btn-small btn-detail">

                                            Detail

                                        </a>


                                        <a
                                            href="{{ route('transaksi.edit', $transaksi->id) }}"
                                            class="btn-small btn-edit">

                                            Edit

                                        </a>


                                        <form
                                            action="{{ route('transaksi.destroy', $transaksi->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus transaksi ini? Saldo nasabah akan disesuaikan.')">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-small btn-delete">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">

                    <h3>
                        Belum Ada Transaksi
                    </h3>

                    <p>
                        Silakan tambahkan transaksi setoran.
                    </p>

                </div>

            @endif

        </div>

    </div>

</section>


</body>

</html>