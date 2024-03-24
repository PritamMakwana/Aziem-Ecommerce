@extends('frontend.layouts.app')
@section('content')
    <main>
        <section class="bg-LightBlue">
            <div class="container">
                <div class="d-flex align-items-center gap-2 p-1 p-sm-5">
                    <div>
                        <a href="{{ url('/so-home/' . $so) }}"><i style="font-size: 25px; margin-right:3px;"
                                class="bi bi-arrow-left-circle-fill"></i></a>
                    </div>
                    <img src="images/icons/left arrow.svg" alt="" />
                    <h3 class="mb-0">My Profile</h3>
                </div>
                <div class="position-relative" style="height: 8rem">
                    <div class="img__container rounded-circle d-grid position-absolute" style="top: 0px">
                        <img src="{{ asset('Shop_images/' . $owner->images) }}" alt="" class="rounded-circle" />
                    </div>
                    <div class="img__upload position-relative">
                        <h4> <span style="font-weight: 400;">Shop Id :</span> {{ $owner->owner_id }}</h4>
                        <div></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section 2 start -->
        <!-- section 2 start -->
        <form action="{{ url('/update_my_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="so_id" value="{{ $owner->id }}">
            <input type="hidden" name="shop_id" value="{{ $so }}">

            <div style="margin-top: 6rem;" class="container">

                <div class="row" style="margin-top:20px">
                    <div class="col-lg-5" style="margin-top:20px">
                        <div class="form-group" style="padding: 15px;">
                            <label for="inputShopname">Shop Name</label>
                            <input type="text" name="shop_name"
                                class="form-control @error('shop_name') is-invalid @enderror" id="inputShopname"
                                value="{{ $owner->shop_name }}" placeholder="Enter Shop Name">
                            @error('shop_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="inputShopname">Your Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="inputShopname" value="{{ $owner->name }}" placeholder="Enter Your Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="inputShopname">Contact No.</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="inputShopname" value="{{ $owner->phone }}" placeholder="Enter Contact No.">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="inputShopname">Offer</label>
                            <select name="offer" class="form-control @error('offer') is-invalid @enderror">
                                <option selected value="{{ $owner->offer }}">{{ $owner->offers()->withTrashed()->first()->offer_name ?? $owner->offers->offer_name }}</option>
                                @foreach ($offers as $offer)
                                    <option value="{{ $offer->id }}">{{ $offer->offer_name }}</option>
                                @endforeach
                            </select>
                            @error('offer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end -->

                    <div class="col-lg-2">

                    </div>
                    <!-- end -->

                    <div class="col-lg-5" style="padding: 15px;margin-top:20px">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="" value="{{ $owner->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enter Address</label>
                            <textarea name="address" class="form-control  @error('address') is-invalid @enderror" id="exampleFormControlTextarea1"
                                rows="3">{{ $owner->address }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-top:15px">
                            <label for="gender">Upload image of your Shop</label>
                        </div>
                        <div style="border: 1px dotted #5627ff;border-style:dashed;padding:15px;margin-top:15px"
                            class="file-drop-area">

                            <span class="choose-file-button">Choose files</span>
                            <span class="file-message">or drag and drop files here</span>
                            <input class="file-input @error('image') is-invalid @enderror" type="file" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $query->location }}" >
                        </div>

                    </div>
                    <!-- end -->
                </div>

                <div class="text-center" style="margin-top:4%;margin-bottom: 4%;">
                    <button type="submit" class="btn btn-primary" style="font-size: 22px;">
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
        <!-- section 2 end -->
        <!-- section 2 end  -->
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
