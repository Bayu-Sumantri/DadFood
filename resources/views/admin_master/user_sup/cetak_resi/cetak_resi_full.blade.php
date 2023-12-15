<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resi Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h3> Transaksi Lunas</h3>
    </hr>
    <table style="width:100%">
        <thead>
            <tr>
                <td bgcolor="red" width="5%">Nama</td>
                <td bgcolor="yellow" width="5%" class="center">Produk</td>
                <td bgcolor="yellow" width="5%" class="center">Total Pembelian</td>
                <td bgcolor="yellow" width="5%" class="center">Harga</td>
                <td bgcolor="yellow" width="5%" class="center">Harga Total</td>
                <td bgcolor="red" width="5%" class="center">Alamat Pemesanan</td>
                <td bgcolor="red" width="5%" class="center">Status</td>
                <td bgcolor="red" width="5%" class="center">Create At</td>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $pembelian->pemesanan->user->name }}</td>
                <td>{{ $pembelian->food->nama_makanan }}</td>
                <td>{{ $pembelian->pemesanan->total_pemesanan }} Porsi</td>
                <td>Rp{{ number_format($pembelian->food->harga, 2, ',', '.') }}</td>
                <td>Rp{{ number_format($pembelian->pemesanan->total_pemesanan * $pembelian->food->harga, 2, ',', '.') }}
                </td>
                <td>{{ $pembelian->pemesanan->alamat_pengiriman }}</td>
                <td>
                    @if ($pembelian->status === 'menunggu')
                        <div class="badge bg-info text-wrap" style="width: 6rem;">
                            {{ $pembelian->status }}
                        </div>
                    @elseif($pembelian->status === 'perjalanan')
                        <div class="badge bg-warning text-wrap" style="width: 6rem;">
                            {{ $pembelian->status }}
                        </div>
                    @elseif($pembelian->status === 'selesai')
                        <div class="badge bg-success text-wrap" style="width: 6rem;">
                            {{ $pembelian->status }}
                        </div>
                    @else
                        <!-- Handle other status conditions if needed -->
                        <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                            Unknown Status
                        </div>
                    @endif
                </td>
                <td>{{ $pembelian->created_at }}</td>
            </tr>

        </tbody>
    </table>
    <br>
    <p align="right">
        Date : {{ $pembelian->created_at }} </br>
        Personal In Charge</br>

        @if (Auth::check())
            <span class="hidden-xs" fontsize=15>{{ Auth::user()->level }}</span>
        @endif
        </br>
        </br>

        </br>
        </br>
        @if (Auth::check())
            <span class="hidden-xs">({{ Auth::user()->name }} {{ auth()->user()->getRoleNames()->first() }})</span>
        @endif
</body>

{{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hargaElement = document.getElementById('harga');
            const totalPembelianElement = document.getElementById('total_pembelian');
            const hasilPerkalianElement = document.getElementById('total_harga');

            // Mengambil nilai harga dan total pembelian dari elemen HTML
            const harga = parseFloat(hargaElement.textContent) || 0;
            const totalPembelian = parseInt(totalPembelianElement.textContent) || 0;

            // Melakukan perkalian
            const hasilPerkalian = harga * totalPembelian;

            // Menampilkan hasil perkalian di elemen HTML
            hasilPerkalianElement.textContent = formatCurrency(hasilPerkalian);

            // Function to format currency (you can modify this based on your needs)
            function formatCurrency(amount) {
                return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
            }
        });
    </script> --}}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>
