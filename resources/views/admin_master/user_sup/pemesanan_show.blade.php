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
                        <th scope="col">Payment</th>
                        <th scope="col">Hapus</th>
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
                            <td>{{ $row->food->harga }}</td>
                            <td>{{ $row->alamat_pengiriman }}</td>
                            <td>{{ $row->total_pemesanan }}</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                <form method="post"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus Pemesanan, {{ $row->food->nama_makanan }}?..')"
                                    action="{{ route('Pemesanan.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('Pemesanan.edit', $row->id) }}"
								class="btn btn-info"><i class="far fa-edit"></i></a>
							</td>
							<td>
								<button type="submit" class="btn btn-danger"><i
									class="fa fa-trash"></i></button>

								</td>
							</form></td>

                    </tr>
                    @endforeach

            </table>
        </div>

    </div>




</div>
@endsection
