@extends('landing_pages.master')
@section('tittle')
    Home
@endsection

@section('landing_pages')
    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Our Menu Promo
                    </h2>
                </div>

                <div class="row">
                    @foreach ($promo->take(3) as $row)
                        <div class="col-md-4  ">

                            <div class="box ">
                                <div class="img-box">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($row->gambar_makanan) }}"
                                        alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $row->nama_makanan }}
                                    </h5>
                                    <h6>
                                        <span>20%</span> Off
                                    </h6>
                                    <a href="{{ url('') }}">
                                        Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                            xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                                c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                                C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                                c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                                C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                                c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

    </section>

    <!-- end offer section -->

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>


            <div class="filters-content">
                <div class="row grid">
                    @foreach ($food as $row)
                        <div class="col-sm-6 col-lg-4 all nasi_goreng" {{ $row->categories }}>
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($row->gambar_makanan) }}"
                                            alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $row->nama_makanan }}
                                        </h5>
                                        <p class="text text-break" id="demoText">
                                            {{ $row->deskripsi_lengkap }}
                                        </p>
                                        <div class="options">
                                            <h6 id="inputHarga">
                                                Rp.{{ $row->harga }}
                                            </h6>
                                            <a href="{{ route('pemesanan_food', $row->id) }}" target="_blank">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 456.029 456.029"
                                                    style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                                        c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                                        C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                                        c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                                        C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                                        c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="btn-box">
                <a href="{{ url('Menu') }}">
                    View More
                </a>
            </div>
        </div>

        <script>
            const filtersMenu = document.querySelector(".filters_menu");
            const filtersContent = document.querySelector(".filters-content");

            filtersMenu.addEventListener("click", function(event) {
                const li = event.target;
                const category = li.getAttribute("data-filter");

                filtersContent.querySelectorAll(".box").forEach(function(box) {
                    box.classList.remove("active");
                });

                box.classList.add("active");
            });
        </script>
    </section>
@endsection

<!-- end food section -->
