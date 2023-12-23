@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection


@include('sweetalert::alert')

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">


        <h6 class="mb-4">Booking All</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">TABLE NAME</th>
                        <th scope="col">DATE RESERVASI</th>
                        <th scope="col">DELETE</th>
                        <th scope="col">PRINT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse ($booking as $row)
                            <th scope="row">
                                {{ $loop->iteration + $booking->perpage() * ($booking->currentPage() - 1) }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->table_name }}</td>
                            <td>
                                {{ $row->tanggal_reservasi }}
                            </td>
                            <td>
                                <form method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus Bokingan anda {{ $row->name }}, ?..')"
                                    action="{{ route('booking.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <a href="{{ route('cetakPDF_booking', $row->id) }}" target="_blank" class="btn btn-info">
                                    <i class="fa fa-print"></i>
                                </a>
                        </td>

                    </tr>
                    @empty
                        <tr>
                            <td colspan="11" style="text-align: center">Anda belum melakukan Booking!!!</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>




</div>
@endsection
