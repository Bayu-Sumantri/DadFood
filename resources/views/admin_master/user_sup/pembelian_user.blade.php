@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection


<div class="container-fluid pt-4 px-4">

    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;"><-- Form Pemesanan --></h6>
        <form action="{{ route('pemesanan_payment.update', $pemesanan->id) }}" method="post"
            enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-floating mb-3">
                <input type="number" name="total_pemesanan" class="form-control" id="floatingInput" placeholder="99999"
                    value="{{ old('total_pemesanan', $pemesanan->total_pemesanan) }}">
                <label for="floatingInput">Total Pembelian</label>
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="alamat_pengiriman" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px">{{ old('alamat_pengiriman', $pemesanan->alamat_pengiriman) }}</textarea>
                <label for="floatingTextarea2">Alamat Pengiriman</label>
            </div>

    </div>
</div>

<div class="container-fluid pt-4 px-4">

    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4" style="text-align: center;"><-- Form Pembayaran --></h6>
        <div class="form-floating mb-3">
            <input type="hidden" name="id_makanan" class="form-control" value="{{ $pemesanan->food->id }}">
            <input type="hidden" name="id_pemesanan" class="form-control" value="{{ $pemesanan->id }}">
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name="metode_pembayaran">
                <option id="metode" selected>Methode Pembayaran</option>
                <option value="dana" id="dana_muncul">Dana</option>
                <option value="bank" id="bank_muncul">Bank</option>
                <option value="COD" id="alamat_COD">COD(Cash On Delivery)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rekening" id="rekeningLabel" style="display: none">Nomor Rekening Bank:</label>
            <input type="text" class="form-control" id="bank_form_muncul" style="display: none;" name="rekening_bank"
                placeholder="Enter Your Rekening Bank">
        </div>
        <div class="form-floating">
            <textarea class="form-control" name="alamat_tujuan" placeholder="Leave a comment here" id="alamat_COD_muncul"
                style="display: none" style="height: 100px"></textarea>
            <label for="floatingTextarea2" id="alamat_COD_muncul" class="d-none">Alamat Pengiriman</label>
        </div>
        <div class="mb-3">
            <label for="telepon" id="teleponLabel" style="display: none">Nomor Telepon Dana:</label>
            <input type="text" class="form-control" id="dana_form_muncul" style="display: none;" name="nomor_dana"
                placeholder="Enter Your Number Dana">
        </div>



        <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

<script>
    $(document).ready(function() {
        let previouslySelectedForm = null;

        $("#dana_muncul").click(function() {
            if (previouslySelectedForm !== null) {
                $(previouslySelectedForm).hide("slow");
            }

            $("#dana_form_muncul").show("slow");
            previouslySelectedForm = $("#dana_form_muncul");
        });

        $("#bank_muncul").click(function() {
            if (previouslySelectedForm !== null) {
                $(previouslySelectedForm).hide("slow");
            }

            $("#bank_form_muncul").show("slow");
            previouslySelectedForm = $("#bank_form_muncul");
        });

        $("#alamat_COD").click(function() {
            if (previouslySelectedForm !== null) {
                $(previouslySelectedForm).hide("slow");
            }

            $("#alamat_COD_muncul").show("slow");
            previouslySelectedForm = $("#alamat_COD_muncul");
        });
    });
</script>
</body>
@endsection
