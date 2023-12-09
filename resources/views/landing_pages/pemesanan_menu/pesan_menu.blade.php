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
                            @include('error.error')
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
                            <input type="hidden" name="id_makanan" value="{{ $food->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->check() && auth()->user()->id }}">
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
                                <input type="text" class="form-control" name="total_pemesanan" placeholder="Porsi" id="inputPorsi" oninput="validasiInput()">
                                <small id="warningMessage" style="color: red;"></small>
                            </div>
                            <div class="form-group">
                                <h5 class="card-title">Harga</h5>
                                <input type="text" class="form-control" id="inputHarga" value="{{ old('harga', $food->harga) }}"
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"
integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(function () {
  // Specify the IDs of the input fields
  const inputHargaIds = ['#inputHarga', '#inputporsi'];

  // Loop through each ID and apply maskMoney plugin
  for (let i = 0; i < inputHargaIds.length; i++) {
    $(inputHargaIds[i]).maskMoney({
      thousands: '.',
      decimal: ',',
      precision: 0,
      allowZero: false,
      allowNegative: false,
    });
  }
});


function validasiInput() {
        var inputPorsi = document.getElementById("inputPorsi").value;

        // Cek apakah input hanya mengandung angka
        if (!/^\d+$/.test(inputPorsi)) {
            document.getElementById("warningMessage").innerHTML = "Mohon masukkan jumlah porsi dalam bentuk angka.";
            document.getElementById("inputPorsi").value = "";  // Menghapus input jika terdapat huruf
        } else {
            document.getElementById("warningMessage").innerHTML = "";  // Menghapus pesan peringatan jika input valid
        }
    }

</script>


<script>
        //harga total
        document.addEventListener('DOMContentLoaded', function () {
        const totalPemesananInput = document.querySelector('input[name="total_pemesanan"]');
        const hargaInput = document.getElementById('inputHarga');

        totalPemesananInput.addEventListener('input', function () {
            const totalPemesanan = parseInt(totalPemesananInput.value) || 0;

            if (totalPemesanan > 0) {
                const hargaPerPorsi = parseFloat("{{ $food->harga }}") || 0;
                const totalHarga = totalPemesanan * hargaPerPorsi;
                hargaInput.value = formatCurrency(totalHarga);
            } else {
                // Jika porsi dihapus atau dikosongkan, reset nilai harga ke nilai semula
                hargaInput.value = formatCurrency(parseFloat("{{ $food->harga }}") || 0);
            }
        });

        // Function to format currency (you can modify this based on your needs)
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }
    });
</script>

<!-- boostap 5 js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">

</html>
