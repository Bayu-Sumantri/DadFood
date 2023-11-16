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

    <form action="{{ route('Users.store') }}" method="post">
        @csrf
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">New Account</h6>
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="AnimeKu">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput"
                    placeholder="Creator AnimeKu">
                <label for="floatingInput">Email Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingInput"
                    placeholder="Studio AnimeKu">
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="level" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <label for="floatingSelect">Role Account</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

</div>
@endsection
