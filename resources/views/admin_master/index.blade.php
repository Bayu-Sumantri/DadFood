@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

<div class="container-fluid pt-3 px-3">
    <div class="row g-4">



        @role('admin')
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{ route('Users.index') }}" class="mb-2">User's</a>
                    <h6 class="mb-0">{{ $total_users }} Active</h6>

                </div>
            </div>
        </div>
        @endrole



        @role('admin')
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-tv fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{ route('menu_show') }}" class="mb-2">Food Total</a>
                    <h6 class="mb-0">{{ $total_food }} Food</h6>

                </div>
            </div>
        </div>
        @endrole



        @role('admin')
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-tv fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{ route('promomenu') }}" class="mb-2">Promo Total</a>
                    <h6 class="mb-0">{{ $total_promo }} Food</h6>

                </div>
            </div>
        </div>
        @endrole



        {{-- @role('user') --}}
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-box fa-3x text-primary"></i>
                {{-- <i class="fas-regular fa-square-check fa-3x text-primary"></i> --}}
                <div class="ms-3">
                    <a href="{{ route('pemesanan_show') }}" class="mb-2">Total Pemesanan</a>
                    <h6 class="mb-0">{{ $total_pemesanan }} Pemesanan</h6>

                </div>
            </div>
        </div>
        {{-- @endrole --}}



        {{-- @role('user') --}}
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-table fa-3x text-primary"></i>
                <div class="ms-3">
                    <a href="{{ route('booking') }}" class="mb-2">Total Booking</a>
                    <h6 class="mb-0">{{ $total_booking }} Booking</h6>

                </div>
            </div>
        </div>
        {{-- @endrole --}}


    </div>
</div>
@endsection
