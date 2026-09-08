<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Tambah Setoran Sampah
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
            margin-bottom: 8px;
        }

        .form-card > p {
            margin-bottom: 30px;
            color: #666;
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
            resize: vertical;
        }

        .error {
            color: #b02a37;
            font-size: 13px;
            margin-top: 5px;
        }

        .info-box {
            background: #f0f8f2;
            border: 1px solid #d5ead9;
            padding: 18px;
            border-radius: 8px;
            margin-top: 25px;
        }

        .calculation {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }

        .calc-box {
            background: white;
            padding: 15px;
            border-radius: 7px;
            border: 1px solid #ddd;
        }

        .calc-box small {
            color: #777;
            display: block;
            margin-bottom: 5px;
        }

        .calc-box strong {
            font-size: 18px;
            color: #155e34;
        }

        .total-box {
            background: #155e34;
            color: white;
        }

        .total-box small,
        .total-box strong {
            color: white;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
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

        @media(max-width: 700px) {

            .calculation {
                grid-template-columns: 1fr;
            }

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
                Tambah Setoran Sampah
            </h1>

            <p>
                Masukkan data setoran sampah nasabah.
                Total akan dihitung otomatis.
            </p>


            <form
                action="{{ route('transaksi.store') }}"
                method="POST">

                @csrf


                <!-- NASABAH -->

                <div class="form-group">

                    <label>
                        Nasabah *
                    </label>

                    <select
                        name="nasabah_id"
                        required>

                        <option value="">
                            -- Pilih Nasabah --
                        </option>

                        @foreach($nasabahs as $nasabah)

                            <option
                                value="{{ $nasabah->id }}"
                                {{ old('nasabah_id') == $nasabah->id ? 'selected' : '' }}>

                                {{ $nasabah->nomor_nasabah }}
                                -
                                {{ $nasabah->nama }}

                            </option>

                        @endforeach

                    </select>


                    @error('nasabah_id')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- JENIS SAMPAH -->

                <div class="form-group">

                    <label>
                        Jenis Sampah *
                    </label>

                    <select
                        name="jenis_sampah_id"
                        id="jenis_sampah_id"
                        required>

                        <option value="">
                            -- Pilih Jenis Sampah --
                        </option>

                        @foreach($jenisSampahs as $jenis)

                            <option
                                value="{{ $jenis->id }}"
                                data-harga="{{ $jenis->harga_per_kg }}"
                                {{ old('jenis_sampah_id') == $jenis->id ? 'selected' : '' }}>

                                {{ $jenis->nama_sampah }}
                                -
                                {{ $jenis->kategori }}

                            </option>

                        @endforeach

                    </select>


                    @error('jenis_sampah_id')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- TANGGAL -->

                <div class="form-group">

                    <label>
                        Tanggal Setoran *
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}"
                        required>

                    @error('tanggal')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- BERAT -->

                <div class="form-group">

                    <label>
                        Berat Sampah (Kg) *
                    </label>

                    <input
                        type="number"
                        name="berat"
                        id="berat"
                        value="{{ old('berat') }}"
                        min="0.01"
                        step="0.01"
                        placeholder="Contoh: 5"
                        required>

                    @error('berat')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PERHITUNGAN -->

                <div class="info-box">

                    <strong>
                        Perhitungan Setoran
                    </strong>


                    <div class="calculation">


                        <div class="calc-box">

                            <small>
                                Harga / Kg
                            </small>

                            <strong id="harga">
                                Rp0
                            </strong>

                        </div>


                        <div class="calc-box">

                            <small>
                                Berat
                            </small>

                            <strong id="berat_tampil">
                                0 Kg
                            </strong>

                        </div>


                        <div class="calc-box total-box">

                            <small>
                                Total Setoran
                            </small>

                            <strong id="total">
                                Rp0
                            </strong>

                        </div>


                    </div>

                </div>


                <!-- KETERANGAN -->

                <div class="form-group"
                     style="margin-top:25px;">

                    <label>
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        placeholder="Keterangan tambahan">{{ old('keterangan') }}</textarea>

                </div>


                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn-save">

                        Simpan Setoran

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


<script>

    const jenisSelect =
        document.getElementById('jenis_sampah_id');

    const beratInput =
        document.getElementById('berat');

    const hargaElement =
        document.getElementById('harga');

    const beratElement =
        document.getElementById('berat_tampil');

    const totalElement =
        document.getElementById('total');


    function formatRupiah(angka)
    {
        return new Intl.NumberFormat(
            'id-ID',
            {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }
        ).format(angka);
    }


    function hitungTotal()
    {
        const selected =
            jenisSelect.options[
                jenisSelect.selectedIndex
            ];

        const harga =
            parseFloat(
                selected.dataset.harga || 0
            );

        const berat =
            parseFloat(
                beratInput.value || 0
            );

        const total =
            harga * berat;


        hargaElement.textContent =
            formatRupiah(harga);


        beratElement.textContent =
            berat.toLocaleString('id-ID')
            + ' Kg';


        totalElement.textContent =
            formatRupiah(total);
    }


    jenisSelect.addEventListener(
        'change',
        hitungTotal
    );


    beratInput.addEventListener(
        'input',
        hitungTotal
    );


    hitungTotal();

</script>


</body>

</html>