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
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;"><-- Menu BudheFood --></h6>
        <form action="{{ route('Promo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="nama_makanan" class="form-control" id="floatingInput" placeholder="abcd">
                <label for="floatingInput">nama makanan </label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar Makanan</label>
                <input class="form-control bg-dark" type="file" id="formFile" name="gambar_makanan">
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="deskripsi_lengkap" class="form-control" id="floatingInput"
                    placeholder="abcd">
                <label for="floatingInput">Deskripsi Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="deskripsi_singkat" class="form-control" id="floatingInput"
                    placeholder="abcd">
                <label for="floatingInput">Deskripsi Singkat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="harga_sebelumnya" class="form-control" id="floatingInput" placeholder="99999">
                <label for="floatingInput">Harga normal</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="harga_final" class="form-control" id="floatingInput" placeholder="99999">
                <label for="floatingInput">Harga Promo</label>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>
            <a href="{{ route('menu_promo') }}" class="btn btn-info" style="margin: 5px;">Edit Promo</a>

        </form>
    </div>
</div>
@endsection
