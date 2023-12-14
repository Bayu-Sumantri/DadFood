@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">


        <h6 class="mb-4">Transaksi Users</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">MAKANAN</th>
                        <th scope="col">NO PEMESANAN</th>
                        <th scope="col">PEMBAYARAN</th>
                        <th scope="col">NO PEMBAYARAN</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">TANGGAL PEMBAYARAN</th>
                        <th scope="col">CETAK RESI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($pembelian as $row)
                            <th scope="row">
                                {{ $loop->iteration + $pembelian->perpage() * ($pembelian->currentPage() - 1) }}</th>
                            <td>{{ $row->food->nama_makanan }}</td>
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
                            <td>{{ $row->pemesanan->total_pemesanan }}</td>
                            <td>{{ $row->food->harga }}</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('resi_pembelian', $row->id) }}" class="btn btn-info" target="_blank"><i class="fas fa-print"></i></a></td>

							</form></td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" style="text-align: center">Anda belum melakukan transaksi!!!</td>
                    </tr>
                @endforelse
            </tbody>

            </table>
            {{ $pembelian->links() }}
        </div>

    </div>




</div>
@endsection
