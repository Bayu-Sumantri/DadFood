@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">User's</p>
                    <h6 class="mb-0">{{ $total_users }} Active</h6>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-tv fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">AnimeKu</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
