<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Edit Transaksi
    </title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

    <style>

        .form-page {
            padding: 50px 0;
        }

        .form-card {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,.08);
        }

        .form-card h1 {
            color: #155e34;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }

        .form-group textarea {
            min-height: 100px;
        }

        .error {
            color: #b02a37;
            font-size: 13px;
            margin-top: 5px;
        }

        .info {
            background: #fff3cd;
            color: #664d03;
            padding: 15px;
            border-radius: 7px;
            margin-bottom: 25px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-save {
            background: #168244;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-cancel {
            background: #eee;
            color: #333;
            padding: 12px 22px;
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


<section class="form-page">

    <div class="container">

        <div class="form-card">

            <h1>
                Edit Transaksi Setoran
            </h1>


            <div class="info">

                <strong>
                    Perhatian:
                </strong>

                Jika transaksi diubah,
                saldo nasabah akan dihitung ulang
                berdasarkan data terbaru.

            </div>


            <form
                action="{{ route('transaksi.update', $transaksi->id) }}"
                method="POST">

                @csrf

                @method('PUT')


                <div class="form-group">

                    <label>
                        Nasabah *
                    </label>

                    <select
                        name="nasabah_id"
                        required>

                        @foreach($nasabahs as $nasabah)

                            <option
                                value="{{ $nasabah->id }}"
                                {{ old('nasabah_id', $transaksi->nasabah_id) == $nasabah->id ? 'selected' : '' }}>

                                {{ $nasabah->nomor_nasabah }}
                                -
                                {{ $nasabah->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Jenis Sampah *
                    </label>

                    <select
                        name="jenis_sampah_id"
                        required>

                        @foreach($jenisSampahs as $jenis)

                            <option
                                value="{{ $jenis->id }}"
                                {{ old('jenis_sampah_id', $transaksi->jenis_sampah_id) == $jenis->id ? 'selected' : '' }}>

                                {{ $jenis->nama_sampah }}
                                -
                                {{ $jenis->kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Tanggal *
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $transaksi->tanggal->format('Y-m-d')) }}"
                        required>

                </div>


                <div class="form-group">

                    <label>
                        Berat Sampah (Kg) *
                    </label>

                    <input
                        type="number"
                        name="berat"
                        value="{{ old('berat', $transaksi->berat) }}"
                        min="0.01"
                        step="0.01"
                        required>

                </div>


                <div class="form-group">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan">{{ old('keterangan', $transaksi->keterangan) }}</textarea>

                </div>


                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-save">

                        Simpan Perubahan

                    </button>


                    <a
                        href="{{ route('transaksi.index') }}"
                        class="btn-cancel">

                        Batal

                    </a>

                </div>


            </form>

        </div>

    </div>

</section>


</body>

</html>