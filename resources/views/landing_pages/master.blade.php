<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    {{-- icon web --}}
    <link href="{{ asset('/home/images/favicon.png') }}" rel="icon">

    <title> BudheFood </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/home/css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('/home/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('/home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/home/css/responsive.css') }}" rel="stylesheet" />

    {{-- boostap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


</head>
<style type="text/css">
    .user {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    .btn-primary {
        font-size: 12px; /* Ubah ukuran font sesuai keinginan */
        padding: 5px 10px; /* Sesuaikan ukuran padding */
    }
</style>



<body>

    @include('sweetalert::alert')

    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('/home/images/hero-bg.jpg') }}" alt="">
        </div>
        @include('landing_pages.header')
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Fast Food Restaurant
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Order Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Fast Food Restaurant
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Order Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Fast Food Restaurant
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Order Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>

    @yield('landing_pages')


    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('/home/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                We Are BudheFood
                            </h2>
                        </div>
                        <p>
                            BudheFood is a Nusantara-style restaurant that offers ostentatiously good food at
                            competitive prices. This restaurant is designed with a gentle and healthy concept, making it
                            suitable for all members of the community.
                        </p>
                        <a href="{{ url('About') }}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Book A Table
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="{{ route('booking.store') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" class="form-control" name="name" placeholder="Your Name" />
                            </div>
                            <div>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email ?? '' }}" placeholder="masukan email kamu" />

                            </div>

                            <div>
                                <input type="hidden" class="form-control" name="user_id"
                                    value="{{ auth()->user()->id ?? '' }}" readonly />

                            </div>
                            <div>
                                <input type="number" class="form-control" name="number_phone"
                                    placeholder="Phone Number" />
                            </div>
                            <div>
                                <input type="number" class="form-control" name="guests"
                                    placeholder="How many persons?" />
                            </div>
                            <div>
                                <input type="datetime-local" name="tanggal_reservasi" class="form-control">
                            </div>
                            <div>
                                <input type="text" class="form-control" name="table_name"
                                    placeholder="Table Name" />
                            </div>
                            <div class="btn_box">
                                <button>
                                    Book Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    What Says Our Customers
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Moana Michell
                                </h6>
                                <p>
                                    magna aliqua
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('/home/images/client1.jpg') }}" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Mike Hamell
                                </h6>
                                <p>
                                    magna aliqua
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('/home/images/client2.jpg') }}" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->

    @include('landing_pages.footer')


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"
        integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            // $('.select2').select2()
            $('#inputHarga').maskMoney({
                thousands: '.',
                decimal: ',',
                precision: 0,
                allowZero: false,
                allowNegative: false,
            });
        })
    </script>

<!-- JavaScript untuk implementasi show more dan show less -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const limit = 50; // Batas karakter
        const textElement = document.getElementById('demoText');
        const originalText = textElement.innerText;

        // Cek apakah perlu tampilkan tombol show more
        if (originalText.length > limit) {
            const truncatedText = originalText.slice(0, limit) + '......';
            const showMoreBtn = createButton('Show more ↓', 'btn-primary', function () {
                textElement.innerText = originalText;
                showMoreBtn.style.display = 'none';
                showLessBtn.style.display = 'block';
            });

            // Sembunyikan teks asli dan tambahkan tombol show more
            textElement.innerText = truncatedText;
            textElement.insertAdjacentElement('afterend', showMoreBtn);

            // Buat tombol show less dan sembunyikan
            const showLessBtn = createButton('Show less ↑', 'btn-primary', function () {
                textElement.innerText = truncatedText;
                showMoreBtn.style.display = 'block';
                showLessBtn.style.display = 'none';
            });
            showLessBtn.style.display = 'none';
            textElement.insertAdjacentElement('afterend', showLessBtn);
        }

        // Fungsi untuk membuat tombol
        function createButton(text, className, clickHandler) {
            const button = document.createElement('button');
            button.innerText = text;
            button.className = 'btn ' + className;
            button.addEventListener('click', clickHandler);
            return button;
        }
    });
</script>

    <!-- jQery -->
    <script src="{{ asset('/home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('/home/js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('/home/js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
    <!-- boostap 5 js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">

</body>

</html>
