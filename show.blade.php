<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Detail Transaksi
    </title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

    <style>

        .detail-page {
            padding: 60px 0;
        }

        .detail-card {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,.08);
        }

        .detail-header {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
            margin-bottom: 25px;
        }

        .detail-header h1 {
            color: #155e34;
        }

        .icon {
            width: 80px;
            height: 80px;
            margin: auto auto 15px;
            background: #e4f5e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .total {
            color: #168244;
            font-size: 22px;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            background: #168244;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
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

    </div>

</nav>


<section class="detail-page">

    <div class="container">

        <div class="detail-card">


            <div class="detail-header">

                <div class="icon">
                    ♻️
                </div>

                <h1>
                    Detail Setoran Sampah
                </h1>

                <p>
                    {{ $transaksi->tanggal->format('d F Y') }}
                </p>

            </div>


            <div class="detail-row">

                <strong>
                    Nasabah
                </strong>

                <span>

                    {{ $transaksi->nasabah->nama }}

                    <br>

                    <small>
                        {{ $transaksi->nasabah->nomor_nasabah }}
                    </small>

                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Jenis Sampah
                </strong>

                <span>
                    {{ $transaksi->jenisSampah->nama_sampah }}
                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Kategori
                </strong>

                <span>
                    {{ $transaksi->jenisSampah->kategori }}
                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Berat
                </strong>

                <span>

                    {{ number_format($transaksi->berat, 2, ',', '.') }}
                    Kg

                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Harga / Kg
                </strong>

                <span>

                    Rp
                    {{ number_format($transaksi->harga_per_kg, 0, ',', '.') }}

                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Total Setoran
                </strong>

                <span class="total">

                    Rp
                    {{ number_format($transaksi->total, 0, ',', '.') }}

                </span>

            </div>


            <div class="detail-row">

                <strong>
                    Keterangan
                </strong>

                <span>
                    {{ $transaksi->keterangan ?? '-' }}
                </span>

            </div>


            <a
                href="{{ route('transaksi.index') }}"
                class="back">

                ← Kembali

            </a>


        </div>

    </div>

</section>


</body>

</html>