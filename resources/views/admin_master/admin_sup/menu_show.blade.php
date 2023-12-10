@extends('admin_master.admin_master')
@section('admin_master')
@section('tittle')
    Dashboard
@endsection



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Image Zoom on Hover with Card and Text</title>


    <style type="text/css">
        * {
            box-sizing: border-box
        }

        body {
            font-family: system-ui;
            margin: 0
        }

        p {
            font-size: 1.1rem;
            line-height: 150%;
            font-weight: 300;
            margin-top: 0;
            margin-bottom: 0;
            line-clamp: initial;
            -webkit-line-clamp: initial;
            transition-property: -webkit-line-clamp, line-clamp;
            transition-duration: 300;
            transition-timing-function: ease-out;
            overflow: hidden
        }

        .wrapper {
            display: justify;
            justify-content: center;
            align-items: center;
        }

        .card {
            /*            background: #191C24;*/
            padding: 24px;
            border-radius: 13px;
            position: relative;
            max-width: 280px;
            margin: 0 12px;
            box-shadow: 0 1px 10px 0 hsl(224, 18%, 12%);


            & button {
                background: none;
                border: none;
                padding: 0;
                margin-top: 12px;
                color: teal;
                transition: opacity .2s ease-out;
                cursor: pointer;
            }

            ;

            & a {
                display: inline-block;
                font-size: 18px;
                line-height: 1;
                text-decoration-line: none;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 3px;
                margin-bottom: 12px;
                color: inherit;
                transition: color .2s ease-out;

                &:hover {
                    color: teal;
                }
            }
        }

        .clamp-two {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
        }

        .card-price {
            display: flex;
            justify-content: space-between;
        }


        .price-new {
            color: red;
        }
    </style>




    <div class="container-fluid pt-4 px-4">

        <div class="bg-secondary rounded h-100 p-4">

            <style type="text/css">
                .img-wrap {
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position-y: 30%;
                    margin-bottom: 1rem;
                    border-radius: 5px;
                }
            </style>

            <div class="row">
                @foreach ($food as $row)
                    <div class="col-md-4"> <!-- Tambahkan class "col-md-4" untuk mengatur lebar card -->
                        <div class="card">
                            <img class="img-wrap"
                                src="{{ \Illuminate\Support\Facades\Storage::url($row->gambar_makanan) }}"
                                alt="Food">
                            <a href="{{ url('edit_menu', $row->id) }}">{{ $row->nama_makanan }}</a>
                            <p class="text"
                                data-config='{ "type": "text", "element": "div", "limit": 80, "more": "show more ↓", "less": "show less ↑"}'>
                                {{ $row->deskripsi_lengkap }}
                            </p>
                            <p>{{ $row->deskripsi_singkat }}</p>
                            <!-- <button class="reveal">Show more</button> -->
                            <div class="card-price">
                                <span class="price-new">Rp{{ $row->harga }}</span>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                @endforeach
            </div>

            </div>
        </div>






    {{ $food->appends(Request::all())->links() }}


    <script src="https://cdn.jsdelivr.net/gh/tomik23/show-more@master/docs/showMore.min.js"></script>
    <script type="text/javascript">
        // 		const revealButtons = document.querySelectorAll(".reveal")
        // const revealButtonsArray = Array.from(revealButtons)
        // const revealButtonSibling = revealButtonsArray[0].previousElementSibling

        // revealButtonsArray.forEach( () => {
        //   revealButtonsArray[0].addEventListener("click", () => {
        //     if(revealButtonSibling.classList.contains("clamp-two")) {
        //       revealButtonSibling.classList.remove("clamp-two");
        //       revealButtonsArray.textContent = "Show less"
        //     } else {
        //       revealButtonSibling.classList.add("clamp-two");
        //       revealButtonsArray.textContent = "Show more"
        //     }
        //   })
        // })

        new ShowMore('.text');
    </script>
@endsection
</body>

</html>
