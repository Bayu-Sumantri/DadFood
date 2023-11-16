<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- boostap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Pemesanan</title>

    <style>
        body {
            font-family: sans-serif;
            background-color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            margin-bottom: 20px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            background-color: #000000;
            color: #ffffff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #008CBA;
        }

        .svg-bg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-image: url("/home/svg/background.svg");
        }

        .img-center {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body class="svg-bg">

    <div class="container">
        <div class="row">
            <form action="{{ route('buat_pemesanan') }}" method="POST">
                @csrf
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">
                                <center>Makanan {{ old('nama_makanan', $food->nama_makanan) }}</center>
                            </h2>
                            <div class="form-group">
                                {{-- <img src="{{ asset('/home/images/f4.png') }}" alt="Pizza, Burger, and Pizza"
                                    class="img-fluid img-center" disabled> --}}

                                @if ($food->gambar_makanan)
                                    <img class="img-fluid img-box img-center"
                                        src="{{ \Illuminate\Support\Facades\Storage::url($food->gambar_makanan) }}"
                                        alt="Pizza, Burger, and Pizza" disabled>
                                @else
                                    <p>Images Tidak ada</p>
                                @endif
                            </div>
                            <input type="text" name="id_makanan" value="{{ $food->id }}">
                            <input type="text" name="user_id" value="{{ auth()->check() && auth()->user()->id }}">
                            <div class="form-group">
                                <h5 class="card-title">Deskripsi Singkat</h5>
                                <input type="text" class="form-control" placeholder="Deskripsi Singkat" disabled
                                    value="{{ old('deskripsi_singkat', $food->deskripsi_singkat) }}">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Deskripsi Lengkap</h5>
                                <textarea class="form-control text"
                                    data-config='{ "type": "text", "element": "p", "limit": 100, "more": "show more ↓", "less": "show less ↑"}'
                                    rows="3" placeholder="Deskripsi Lengkap" disabled> {{ old('deskripsi_lengkap', $food->deskripsi_lengkap) }} </textarea>
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Alamat Tujuan</h5>
                                <input type="text" class="form-control" name="alamat_pengiriman"
                                    placeholder="Jl. icikiwir no4 rt8/rw04 no33">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Porsi</h5>
                                <input type="number" class="form-control" name="total_pemesanan" placeholder="Porsi">
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Harga</h5>
                                <input type="number" class="form-control" value="{{ old('harga', $food->harga) }}"
                                    placeholder="Harga" disabled>
                                <input type="hidden" class="form-control" name="status" value="Pending"
                                    placeholder="pending" disabled>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




</body>

<!-- boostap 5 js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">

</html>
