<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BudheFood | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('/admin/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @include('admin_master.sidebar')


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="{{ url('dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="{{ url('#') }}" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="{{ url('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if (auth()->user()->Profile)
                                <img class="rounded-circle"
                                    src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->Profile) }}"
                                    alt="" style="width: 40px; height: 40px;">
                            @else
                                <img class="rounded-circle" src="{{ asset('/admin/img/user.jpg') }}" alt=""
                                    style="width: 40px; height: 40px;">
                            @endif
                            <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ url('profil') }}" class="dropdown-item">My Profile</a>
                            <a href="{{ url('#') }}" class="dropdown-item">Settings</a>
                            <a href="{{ url('#') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            @yield('admin_master')


            @include('admin_master.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="{{ url('#') }}" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/admin/js/main.js') }}"></script>
</body>

</html>
