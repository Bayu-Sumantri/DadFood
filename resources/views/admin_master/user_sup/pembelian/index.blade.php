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
                        <th scope="col">MAKANAN</th>
                        <th scope="col">NO PEMESANAN</th>
                        <th scope="col">PEMBAYARAN</th>
                        <th scope="col">NO PEMBAYARAN</th>
                        <th scope="col">HARGA</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">TANGGAL PEMBAYARAN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pembelian as $row)
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
                            <td>{{ $row->food->harga }}</td>
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
							</form></td>

                    </tr>
                    @endforeach

            </table>
        </div>

    </div>




</div>
@endsection
