@extends('frontend.layouts.app')
@section('content')
    <main style="padding:8px;">
        <section class="page__location">
            <div class="container">
                <div class="d-flex gap-2 p-1 p-sm-5">
                    <div>
                        <a href="{{ url('/so-home/' . $so) }}"><i style="font-size: 25px; margin-right:3px;"
                                class="bi bi-arrow-left-circle-fill"></i></a>
                    </div>
                    <div>
                        <h3>Product List</h3>
                        <p>Select the product that you want to edit</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 g-4 my-1">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="cardset">
                                <div style="padding: 20px;" class="row">
                                    <div class="col-lg-3">
                                        <img style="height: 140px;width:120px"
                                            src="{{ asset('Product_images/' . $product->image) }}" alt="" />
                                    </div>
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="d-flex justify-content-between mb-2 flex-wrap">
                                                <h4 class="mb-0">{{ $product->product_name }}</h4>
                                                <div class="d-flex align-items-center gap-4">
                                                    <a href="{{ url('/product_details/' . $product->id) }}"
                                                        class="btn btn-link p-0 border-0 color-Purple text-decoration-none">
                                                        Edit <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="{{ url('/product_delete/' . $product->id) }}" id="delete"
                                                        class="btn btn-link p-0 border-0 text-danger text-decoration-none">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <p>Quantity : <span class="fw-bolder">{{ $product->quantity_available }}</span>
                                            </p>
                                            <p style="height:130px;overflow-y:scroll">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
@section('style')
    <style>
        .cardset {
            width: 34rem;
            height: 260px;
            background-color: #f1f5fa;
            border-radius: 10px;
        }

        @media only screen and (max-width: 600px) {
            .cardset {
                width: auto;
                height: auto;
                background-color: #f1f5fa;
                border-radius: 10px;
            }
        }
    </style>
@endsection
@section('script')
    <script>
        let all_height = [];
        let card_height;
        let product__details = document.querySelectorAll('.product');
        let max_height = () => {
            all_height = [];
            product__details.forEach((card) => {
                all_height.push(card.offsetHeight);
                // console.log(...all_height);
            })
            card_height = Math.max(...all_height);
            product__details.forEach((card) => {
                card.style.height = `${card_height}px`;
            })
        }
        window.addEventListener("resize", () => {
            // console.log('hello');
            location.reload();
            max_height();
            // console.log(card_height);
            // console.log(...all_height);
        })
        max_height();
    </script>
@endsection
@section('style')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ----------------------------Utility classes-------------------------- */
        .color-Purple {
            color: #5500ff !important;
        }

        .bg-Purple {
            background: #5500ff !important;
        }

        .bg-LightBlue {
            background: #407bff0f;
        }

        .nav-link {
            color: black;
        }

        .heroheading {
            color: #0638b5;
            font-size: 40px;
            font-weight: 700;
            padding-left: 10px;
            padding-top: 170px;
            padding-right: 10px;
            padding-bottom: 10px;
        }

        @media only screen and (max-width: 600px) {
            .heroheading {
                color: #0638b5;
                font-size: 28px;
                font-weight: 700;
                padding-left: 10px;
                padding-top: 30px;
                padding-right: 10px;
                padding-bottom: 10px;
            }
        }

        .heroimg {
            padding-top: 33px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
        }

        @media only screen and (max-width: 600px) {
            .heroimg {
                height: 300px;
                width: 300px;
            }
        }

        .heropara {
            color: #000000;
            padding-left: 10px;
            padding-top: 20px;
            padding-right: 10px;
            padding-bottom: 10px;
            font-size: 18px;
        }

        @media only screen and (max-width: 600px) {
            .heropara {
                color: #000000;
                padding-left: 10px;
                padding-top: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                font-size: 16px;
            }
        }

        .signuptext {
            text-align: center;
            margin-top: 70px;
            padding-left: 10px;
            padding-top: 10px;
        }

        .btn:hover {
            color: #0638b5;
        }

        /* ------------------------- Product-list page ---------------------------- */
        .page__location {
            background: #407bff0f;
        }

        .product {
            border: 0.5px solid #004bad28;
            background: #004bad0e;
        }

        .product>img {
            width: 142px;
            height: 180px;
            border-radius: 4px;
        }

        /* ------------------------- Product-details page ---------------------------- */
        .img__container {
            width: 190px;
            height: 190px;
            place-content: center;
            border-bottom: 1px solid #004AAD;
        }

        .img__container img {
            width: 155px;
            height: 155px;
            place-items: center;
        }

        .img__upload {
            width: fit-content;
            left: 230px;
            bottom: -70px;
        }

        @media screen and (max-width:500px) {
            .img__upload {
                left: 0px;
                bottom: -210px;
            }

            .ProductDetails>.container {
                margin-top: 6rem;
            }

        }
    </style>
@endsection
