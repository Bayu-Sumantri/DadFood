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
            <select class="form-select" aria-label="Default select example" name="metode_pembayaran" id="metode_pembayaran">
                <option value="default" selected>Methode Pembayaran</option>
                <option value="dana">Dana</option>
                <option value="bank">Bank</option>
                <option value="COD">COD (Cash On Delivery)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rekening" id="rekeningLabel" style="display: none">Nomor Rekening Bank:</label>
            <input type="text" class="form-control" id="bank_form_muncul" style="display: none;" name="rekening_bank" placeholder="Enter Your Rekening Bank">
        </div>

        <div class="form-floating">
            <textarea class="form-control" name="alamat_tujuan" placeholder="Leave a comment here" id="alamat_COD_muncul" style="display: none; height: 100px"></textarea>
            <label for="alamat_COD_muncul_label" class="d-none">Alamat Pengiriman</label>
        </div>

        <div class="mb-3">
            <label for="telepon" id="teleponLabel" style="display: none">Nomor Telepon Dana:</label>
            <input type="text" class="form-control" id="dana_form_muncul" style="display: none;" name="nomor_dana" placeholder="Enter Your Number Dana">
        </div>


        <div class="form-floating mb-3">
            <input type="hidden" name="status" class="form-control" id="floatingInput" placeholder="99999" value="menunggu" readonly disabled>
        </div>



        <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>
        </form>
    </div>
</div>

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        let previouslySelectedForm = null;

        $("#metode_pembayaran").change(function() {
            if (previouslySelectedForm !== null) {
                previouslySelectedForm.hide("slow");
            }

            let selectedValue = $(this).val();

            if (selectedValue === "dana") {
                $("#dana_form_muncul").show("slow");
                previouslySelectedForm = $("#dana_form_muncul");
            } else if (selectedValue === "bank") {
                $("#bank_form_muncul").show("slow");
                previouslySelectedForm = $("#bank_form_muncul");
            } else if (selectedValue === "COD") {
                $("#alamat_COD_muncul").show("slow");
                previouslySelectedForm = $("#alamat_COD_muncul");
            }
        });
    });
</script>

</body>
@endsection
