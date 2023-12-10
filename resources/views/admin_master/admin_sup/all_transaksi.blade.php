@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">


    @include('sweetalert::alert')


        <h6 class="mb-4">Pembelian Users</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NO PEMESANAN</th>
                        <th scope="col">PEMBAYARAN</th>
                        <th scope="col">NO PAY</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">PORSI</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">TANGGAL PAY</th>
                        <th scope="col">RESPON</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pembelian as $row)
                            <th scope="row">
                                {{ $loop->iteration + $pembelian->perpage() * ($pembelian->currentPage() - 1) }}</th>
                            <td>{{ $row->pemesanan->user->name }}</td>
                            <td>{{ $row->id_pemesanan }}</td>
                            <td>{{ $row->metode_pembayaran }}</td>
                            <td>
                                @if ($row->metode_pembayaran === 'dana')
                                    {{ $row->nomor_dana }}
                                @elseif ($row->metode_pembayaran === 'bank')
                                    {{ $row->rekening_bank }}
                                @elseif ($row->metode_pembayaran === 'COD')
                                    {{ $row->alamat_tujuan }}
                                @endif
                            </td>
                            <td id="harga">{{ $row->food->harga }}</td>
                            <td id="total_pembelian">{{ $row->pemesanan->total_pemesanan }}</td>
                            <td>
                                @if($row->status === 'menunggu')
                                    <div class="badge bg-info text-wrap" style="width: 6rem;">
                                        {{ $row->status }}
                                    </div>
                                @elseif($row->status === 'perjalanan')
                                    <div class="badge bg-warning text-wrap" style="width: 6rem;">
                                        {{ $row->status }}
                                    </div>
                                @elseif($row->status === 'selesai')
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $row->status }}
                                    </div>
                                @else
                                    <!-- Handle other status conditions if needed -->
                                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                                        Unknown Status
                                    </div>
                                @endif
                            </td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                    <a href="{{ route('pembelian.edit', $row->id) }}"
								class="btn btn-info"><i class="far fa-edit"></i></a>
							</td>

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
