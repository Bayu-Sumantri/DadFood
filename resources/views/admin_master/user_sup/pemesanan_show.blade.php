@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

@include('sweetalert::alert')


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
                        <th scope="col">Payment</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemesanan as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->user->email }}</td>
                            <td>{{ $row->food->nama_makanan }}</td>
                            <td>{{ $row->food->deskripsi_singkat }}</td>
                            <td>Rp{{ number_format($row->food->harga, 2, ",", ".") }}</td>
                            <td>{{ $row->alamat_pengiriman }}</td>
                            <td id="total_pembelian">{{ $row->total_pemesanan }} Porsi</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                @if (!$row->pembayaran?->metode_pembayaran)
                                    <a href="{{ route('Pemesanan.edit', $row->id) }}" class="btn btn-info">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <form method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus Pemesanan, {{ $row->food->nama_makanan }}?..')"
                                    action="{{ route('Pemesanan.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" style="text-align: center">Anda belum melakukan pemesanan!!!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

     {{-- <script>
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
    </script> --}}




</div>
@endsection
