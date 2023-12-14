@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection


<div class="container-fluid pt-4 px-4">

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Button trigger modal -->
    <a href="{{ url('create_user') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
        User
    </a>



    <!-- <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"> -->
    <div class="bg-secondary rounded h-100 p-4">


        <h6 class="mb-4">Users Active</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gmail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Email Verified</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Update At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($user as $row)
                            <th scope="row">{{ $loop->iteration + $user->perpage() * ($user->currentPage() - 1) }}
                            </th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>

                                @foreach ($row->getRoleNames() as $role)
                                    {{ $role }}
                                @endforeach

                                {{-- coe ini sama aja dengan di atas beda nya pakai foreach
                                    dan kalo pakai code ini ada tanda [""] kalau di atas tidak 
                                {{ $row->getRolenames() }} --}}
                            </td>
                            @if ($row->email_verified_at)
                                <td>{{ $row->email_verified_at }}</td>
                            @else
                                <td>Tidak Ada</td>
                            @endif
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>{{ $row->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="post"
                                    onsubmit="return confirm('Apakah anda yakin akan menghapus, {{ $row->name }}?..')"
                                    action="{{ route('delate.destroy', [$row->id]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('user.edit', $row->id) }}" class="btn btn-info"><i
                                            class="far fa-edit"></i></a>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                            </td>
                            </form>
                            </td>
                    </tr>
                    @endforeach

            </table>
            {{ $user->appends(Request::all())->links() }}
        </div>

        <!-- </form> -->

    </div>


</div>
@endsection
