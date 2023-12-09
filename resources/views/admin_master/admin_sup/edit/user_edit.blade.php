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

    <form action="{{ route('user.update', $user->id) }}" method="post">
        @method ('patch')
        @csrf
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">New Account</h6>
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nama"
                    value="{{ old('name', $user->name) }}">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="level" id="floatingSelect"
                    aria-label="Floating label select example">
                    @if ($user->level === 'admin')
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                    @else
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    @endif
                </select>
                <label for="floatingSelect">Role Account</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

</div>
@endsection
