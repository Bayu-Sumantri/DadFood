@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection



<div class="container-fluid pt-4 px-4">

    <div class="bg-secondary rounded h-100 p-4">


        <h3 class="text-center">Update Respon </h3>


        <p class="text-start">Before modifying the delivery status, please verify that the new address is accurate and
            complete. This includes checking the address line, country. You can also verify the address by calling the
            customer or using a mapping service.</p>


        <form action="{{ route('all_transaksi.update', $pembelian->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-floating mb-3">
                <!-- HTML structure for selecting status -->
                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example">
                    <option value="menunggu" @if ($pembelian->status === 'menunggu') selected @endif>menunggu</option>
                    <option value="perjalanan" @if ($pembelian->status === 'perjalanan') selected @endif>perjalanan</option>
                    <option value="selesai" @if ($pembelian->status === 'selesai') selected @endif>selesai</option>
                </select>

                <label for="floatingSelect">Role Account</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>


    </div>
</div>


@endsection
