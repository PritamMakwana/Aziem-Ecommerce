@extends('frontend.layouts.app')
@section('content')
    <main>
        <section class="bg-LightBlue">
            <div class="container">
                <div class="d-flex align-items-center gap-2 p-1 p-sm-5">
                    <a href="{{ url()->previous() }}"><i style="font-size: 25px; margin-right:3px;"
                            class="bi bi-arrow-left-circle-fill"></i></a>
                    <h3 class="mb-0">{{ $product->product_name }}</h3>
                </div>
                <div class="position-relative" style="height: 8rem">
                    <div class="img__container rounded-circle d-grid position-absolute" style="top: 0px">
                        <img src="{{ asset('Product_images/' . $product->image) }}" alt="" class="rounded-circle" />
                    </div>
                </div>
            </div>
        </section>
        <section class="ProductDetails mt-5 pt-5">
            <form action="{{ url('update_product_details') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="container">
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-10 col-md-8 col-xl-6 mx-auto">
                            <label for="ProductName" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="ProductName" placeholder="" value="{{ $product->product_name }}" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-10 col-md-8 col-xl-6 mx-auto">
                            <label for="ProductQuantity" class="form-label">Product Quantity :</label>
                            <div class="row">
                                <div class="col-lg-4" style="width:60%;">
                                    <div class="input-group" style="">
                                        <span class="input-group-btn">
                                            <button type="button" style="border: 3px solid #e0e9f5"
                                                class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                                                <!-- <span class="glyphicon glyphicon-minus"></span> -->
                                                <i class="bi bi-dash"></i>
                                            </button>
                                        </span>
                                        <input style="background-color: #e0e9f5" type="number" id="quantity"
                                            name="quantity"
                                            class="form-control input-number @error('quantity') is-invalid @enderror"
                                            value="{{ $product->quantity_available }}" min="1"  />
                                        <span class="input-group-btn">
                                            <button type="button" style="border: 3px solid #e0e9f5"
                                                class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                                <!-- <span class="glyphicon glyphicon-plus"></span> -->
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-10 col-md-8 col-xl-6 mx-auto">
                            <label for="ProductDescription" class="form-label">Product Description :</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="ProductDescription"
                                rows="4">{{ $product->description }}</textarea>
                        </div>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-10 col-md-8 col-xl-6 mx-auto">
                            <div class="form-group" style="margin-top:15px">
                                <label for="gender">Upload/Change Image of your Product</label>
                            </div>
                            <div style="border: 1px dotted #5627ff;border-style:dashed;padding:15px;margin-top:15px"
                                class="file-drop-area">

                                <span class="choose-file-button">Choose files</span>
                                <span class="file-message">or drag and drop files here</span>
                                <input class="file-input @error('image') is-invalid @enderror" type="file"
                                    name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5 mb-4" />
                    <div class="text-center" style="margin-bottom: 4%;">
                        <button class="btn bg-Purple text-light px-5 py-2">
                            Update Details
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
@section('script')
    <!-- script for upload file -->
    <script>
        $(document).on('change', '.file-input', function() {


            var filesCount = $(this)[0].files.length;

            var textbox = $(this).prev();

            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var quantity = 0;
            $(".quantity-right-plus").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($("#quantity").val());

                // If is not undefined

                $("#quantity").val(quantity + 1);

                // Increment
            });

            $(".quantity-left-minus").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($("#quantity").val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $("#quantity").val(quantity - 1);
                }
            });
        });
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
