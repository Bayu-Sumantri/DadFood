@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">


        <h6 class="mb-4">Pemesanan Users</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Makanan</th>
                        <th scope="col">Description</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pemesanan as $row)
                            <th scope="row">
                                {{ $loop->iteration + $pemesanan->perpage() * ($pemesanan->currentPage() - 1) }}</th>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->user->email }}</td>
                            <td>{{ $row->food->nama_makanan }}</td>
                            <td>{{ $row->food->deskripsi_singkat }}</td>
                            <td id="harga">{{ $row->food->harga }}</td>
                            <td>{{ $row->alamat_pengiriman }}</td>
                            <td id="total_pembelian">{{ $row->total_pemesanan }} Porsi</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
							</form></td>

                    </tr>
                    @endforeach

            </table>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hargaElement = document.getElementById('harga');
            const totalPembelianElement = document.getElementById('total_pembelian');
            const hasilPerkalianElement = document.getElementById('harga');

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
    </script>





</div>
@endsection
