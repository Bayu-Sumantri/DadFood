@extends('admin_master.admin_master')
@section('admin_master')

@section('tittle')
Dashboard
@endsection


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;">{{ old('nama_makanan', $food->nama_makanan) }}</h6>
            <form action="{{ route('edit_menuFood', $food->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method ('patch')
            <div class="form-floating mb-3">
                <input type="text" name="deskripsi_lengkap" class="form-control" id="floatingInput"
                placeholder="abcd" value="{{ old('deskripsi_lengkap', $food->deskripsi_lengkap) }}">
                <label for="floatingInput">Deskripsi Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="deskripsi_singkat" class="form-control" id="floatingInput"
                placeholder="abcd" value="{{ old('deskripsi_singkat', $food->deskripsi_singkat) }}">
                <label for="floatingInput">Deskripsi Singkat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="harga" class="form-control" id="floatingInput"
                placeholder="99999" value="{{ old('harga', $food->harga) }}">
                <label for="floatingInput">Harga</label>
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>  
        </form>
    </div>
</div>


@endsection