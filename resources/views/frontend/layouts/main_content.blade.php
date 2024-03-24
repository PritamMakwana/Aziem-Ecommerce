@extends('frontend.layouts.app')
@section('content')
{{-- Customer --}}
@include('customer.customer_login')
@include('customer.customer_register')
@include('customer.success')
@include('customer.hold')

{{-- Shop Owner --}}
@include('shop_owner.login')
@include('shop_owner.register')

{{-- job --}}
@include('JOb.job')
@include('frontend.layouts.model-address')

<!-- hero section start -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" style="padding: 0.5% 1%;
              border-radius: 42px;opacity: 1;" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" style="padding: 0.5% 1%;
              border-radius: 42px;opacity: 1;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" style="padding: 0.5% 1%;
              border-radius: 42px;opacity: 1;" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    {{-- <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="hero-section">
                <div class="row">
                    <div class="col-md-6" style="padding: 4% 5%">
                        <h1 class="hero1 hero_heading">Hikayat Alref</h1>
                        <h4 class="hero hero_content1">
                            The hekayatalref Trading Est always strives to satisfy the
                            customer’s requests, meet his desires, and help them obtain
                            the most amazing discounts and basic offers.
                        </h4>
                        <h4 class="hero hero_content2">
                            تسعى مؤسسة حكاية الرف التجارية دائمًا إلى تلبية طلبات العميل
                            وتلبية رغباته ومساعدته في الحصول على أروع الخصومات والعروض
                            الأساسية.
                        </h4>
                        <div class="btn-container" style="display: flex;">
                            @guest('customer')
                            <button data-toggle="modal" data-target="#siginmodal" class="hero-button">Shop Now</button>
                            @else
                            <a href="#ShopNowC" class="hero-button">Shop Now</a>
                            @endguest
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img width="100%" src="frontend/hero/images/image-removebg-preview (1) 1.png" />
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- --}}
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">

                {{-- <div class="carousel-item active">
                    <div class="hero-section">
                        <div class="row">
                            <div class="col-md-6" style="padding: 4% 5%">
                                <h1 class="hero1 hero_heading">Hikayat Alref</h1>
                                <h4 class="hero hero_content1">
                                    The hekayatalref Trading Est always strives to satisfy the
                                    customer’s requests, meet his desires, and help them obtain
                                    the most amazing discounts and basic offers.
                                </h4>
                                <h4 class="hero hero_content2">
                                    تسعى مؤسسة حكاية الرف التجارية دائمًا إلى تلبية طلبات العميل
                                    وتلبية رغباته ومساعدته في الحصول على أروع الخصومات والعروض
                                    الأساسية.
                                </h4>
                                <div class="btn-container" style="display: flex;z-index: 5;">
                                    @guest('customer')
                                    <button data-toggle="modal" data-target="#siginmodal" class="hero-button">Shop
                                        Now</button>
                                    @else
                                    <a href="#ShopNowC" class="hero-button">Shop Now</a>
                                    @endguest
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img width="100%" src="frontend/hero/images/image-removebg-preview (1) 1.png" />
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="carousel-item active">
                    <img src="{{asset('frontend/hero/images/main.png')}}" alt="clothes" class="d-block"
                        style="width:100%">

                </div>

                <div class="carousel-item">
                    <img src="{{asset('frontend/hero/images/clothes.jpeg')}}" alt="clothes" class="d-block"
                        style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('frontend/hero/images/food.jpeg')}}" alt="food" class="d-block"
                        style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('frontend/hero/images/machine.jpeg')}}" alt="machine" class="d-block"
                        style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('frontend/hero/images/material.jpeg')}}" alt="material" class="d-block"
                        style="width:100%">
                </div>

            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
















        <!-- <div class="carousel-item">
                                                                                                  <img
                                                                                                    src="Images/Group 1000001950.png"
                                                                                                    class="d-block w-100"
                                                                                                    alt="..."
                                                                                                  />
                                                                                                </div> -->
        <!-- <div class="carousel-item">
                                                                                                  <img
                                                                                                    src="Images/Group 1000001950.png"
                                                                                                    class="d-block w-100"
                                                                                                    alt="..."
                                                                                                  />
                                                                                                </div> -->
        {{--
    </div> --}}
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                                    <span class="visually-hidden">Previous</span>
                                                                                                </button>
                                                                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                                    <span class="visually-hidden">Next</span>
                                                                                                </button> -->
</div>
<div style="
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: -30px;
          ">
    <div class="get-started">
        <h2>Get Started with HikayatAlref, to get surprising discounts
        </h2>
        <p>
            Having your own shop ? you want to grow your customer with us ? Let’s
            unleash power of shop owners site
        </p>
    </div>
</div>

<div class="container">
    @guest('customer')
    @guest('shop_owner')
    <div class="login-buttons">
        <div class="row"
            style="display: flex;align-items: center;justify-content: center;text-align: center;margin-top: 20px;">
            <div class="col-lg-3" style="margin: 15px;">
                <button type="button"
                    style="width:280px;font-size:20px;background-color:#5627ff;border:#5627ff;border-radius:16px;"
                    class="btn btn-primary" data-toggle="modal" data-target="#siginmodal">Continue as
                    Customer <i class="bi bi-arrow-up-right" style="font-size: 20px; padding-bottom:10px;"></i>
                </button>
            </div>
            <div class="col-lg-3" style="margin: 15px;">
                <button type="button"
                    style="width:280px;font-size:20px;background-color:#5627ff;border:#5627ff;border-radius:16px;"
                    class="btn btn-primary" data-toggle="modal" data-target="#shop_signin">Continue as Shop
                    Owner <i class="bi bi-arrow-up-right" style="font-size: 20px; padding-bottom:10px;"></i></button>
            </div>
            <div class="col-lg-3" style="margin: 15px;">
                <button type="button"
                    style="width:280px;font-size:20px;background-color:#5627ff;border:#5627ff;border-radius:16px;"
                    class="btn btn-primary" data-toggle="modal" data-target="#siginjobmodal">Job registration<i
                        class="bi bi-arrow-up-right" style="font-size: 20px; padding-bottom:10px;"></i></button>
            </div>
        </div>
    </div>
    @endguest
    @endguest
</div>
<section id="shop-categories"></section>
<div style="margin: 22px;background-color:#ffeaeaff;border-radius:10px;padding:20px">
    <p style="text-align: center;font-weight:600">The hekayatalref Trading Est always strives to satisfy the
        customer’s
        requests, meet his desires, and help them obtain the most amazing discounts and basic offers. Under this
        application, we collected all the shops that meet the customer’s needs at the lowest cost.
        The discounts may reach to be equal to the value of their bill in the store, which we always strive to
        satisfy
        the
        customer.</p>
</div>


{{-- <div class="container">
    <div class="row">

        <div class="col-lg-7">
            <h1 class="heroheading">
                Get Started with HikayatAlref, to get surprising discounts
            </h1>
            <p class="heropara">
                It is a long established fact that a reader will be distracted by the readable content of a page
                when
                looking at be d
            </p>
            @auth('customer')
            @php
            $customerFirstName = Auth::guard('customer')->user()->first_name;
            @endphp
            <h1 class="" style="color: #0638b5; font-size: 40px; font-weight: 700;">
                Hello, {{ $customerFirstName }}
            </h1>
            @endauth
            @auth('shop_owner')
            <h1 class="" style="color: #0638b5;font-size: 40px;font-weight: 700;">Welcome Shop Owner!</h1>
            @endauth
            @guest('customer')
            @guest('shop_owner')
            <div class="login-buttons">
                <div class="row">
                    <div class="col-lg-5" style="margin: 5px;">
                        <button type="button" style="width:280px;font-size:20px;background-color:#5627ff;border:#5627ff"
                            class="btn btn-primary" data-toggle="modal" data-target="#siginmodal">Continue as
                            Customer <i class="bi bi-arrow-up-right" style="font-size: 20px; padding-bottom:10px;"></i>
                        </button>
                    </div>
                    <div class="col-lg-5" style="margin: 5px;">
                        <button type="button"
                            style="width:280px;font-size:20px;background-color:#5627ff;border:#5627ff;"
                            class="btn btn-primary" data-toggle="modal" data-target="#shop_signin">Continue as Shop
                            Owner <i class="bi bi-arrow-up-right"
                                style="font-size: 20px; padding-bottom:10px;"></i></button>
                    </div>
                </div>
            </div>
            @endguest
            @endguest
        </div>
        <div class="col-lg-5 col-sm-12">
            <div style="display: flex;justify-items:center">
                <img class="heroimg" src="{{ asset('frontend/screen2/assets/scanToPay.png') }}" />
            </div>
        </div>
    </div>
</div> --}}
<!-- hero section end -->
<!-- new section -->
@auth('customer')
<div class="container my-5">
    <div class="p-4  text-white" style="background-color: #002C8F; position: relative; border-radius: 22px;">
        <img style="position: absolute; right: 10vw; top: 0;"
            src="{{ asset('frontend/screen2/assets/riyal_black.png') }}" alt="black" class="img-fluid">
        <img style="position: absolute; left: 0; top: -20px;"
            src="{{ asset('frontend/screen2/assets/riyal_backdrop.png') }}" alt="black" class="img-fluid">
        <div class="d-flex flex-column flex-md-row align-items-center">
            <div class="mb-3 mb-md-0">
                <h3 style="font-weight: 700;" class="mb-0">Riyals in your account..! <img
                        src="{{ asset('frontend/screen2/assets/riyal.png') }}" alt="riyal"
                        style="width: 60px; height: 60px;" class="riyal-mob-icon"></h3>
                <p style="font-weight: 600;">Dear customer, we provide you gifts and discounts equal to the value of
                    your bill when you make the purchase from the stores that are registered in the application.</p>
            </div>
            <div class="bg-white  p-4 text-center ml-md-auto" style="border-radius: 12px;">
                <h5 style="font-weight: 500; color:#727272;" class="text-secondary mb-2 mb-md-3">You have riyals..!
                </h5>
                <div class="d-flex align-items-center justify-content-center">
                    <h3 style="font-weight: 800;" class="text-primary mb-0 me-2">
                        {{ Auth::guard('customer')->user()->offer }}
                    </h3>
                    <img src="{{ asset('frontend/screen2/assets/riyal.png') }}" alt="riyal"
                        style="width: 40px; height: 40px;object-fit: none;">
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
<!-- new section emd -->
<div class="container" id="ShopNowC">
    <div style="font-size: 18px;font-weight:500">Shop Categories</div>
    <div class="row">

        <div style="margin: 5px; justify-content:center" class="col">
            <a href="{{route('Stores')}}" class="button-three category-filter"  style="width:100%; white-space:nowrap; overflow:hidden;
            {{$category_id == 0 ? 'color:white !important;background-color:#002c8fc9 !important; border:2px solid white !important;': 'border:2px solid #002c8fc9 !important;'}}">All</a>
        </div>

        @foreach ($category as $ctr)
        <div style="margin: 5px; justify-content:center" class="col">
                <a href="{{route('Stores',['id' => $ctr->id ])}}" class="button-three category-filter"  style="width:100%; white-space:nowrap; overflow:hidden;
                {{$category_id == $ctr->id ? 'color:white !important;background-color:#002c8fc9 !important; border:2px solid white !important;': 'border:2px solid #002c8fc9 !important;'}}">{{ $ctr->name }}</a>
        </div>
        @endforeach



        {{-- @foreach ($category as $ctr)
        <div style="margin: 5px; justify-content:center" class="col">
            <button class="button-three category-filter" data-category-id="{{ $ctr->id }}"
                style="width:100%; white-space:nowrap; overflow:hidden;">{{ $ctr->name }}</button>
        </div>
        @endforeach --}}
    </div>

</div>

<!-- cards section start -->
<div class="container">

    <!-- row start -->
    <div style="margin-top: 40px;margin-bottom:20px;" class="row view-store-center">

        @foreach ($query as $shp)
        <!-- col start 1 -->
        <div class="col-lg-4 col-md-6 col-sm-6" style="margin-top: 2%;"
            data-shop-category="{{ $shp->category()->withTrashed()->first()->id ?? $shp->category->id }}">
            <div class="card" style="width:auto;">
                @auth('customer')
                @if ($shp->status)
                <a href="{{ url('view-store/' . $shp->id) }}"><img class="card-img-top"
                        src="{{ asset('Shop_images/' . $shp->image) }}" alt="Card image cap" width="220px"
                        height="220px"></a>
                @else
                <img class="card-img-top" src="{{ asset('Shop_images/' . $shp->image) }}" alt="Card image cap"
                    width="220px" height="220px">
                @endif
                @else
                @if ($shp->status)
                <a href="" data-toggle="modal" data-target="#siginmodal"><img class="card-img-top"
                        src="{{ asset('Shop_images/' . $shp->image) }}" alt="Card image cap" width="220px"
                        height="220px"></a>
                @else
                <img class="card-img-top" src="{{ asset('Shop_images/' . $shp->image) }}" alt="Card image cap"
                    width="220px" height="220px">
                @endif
                @endauth
                <div style="display: flex;justify-content:flex-end;margin-top:-45px;margin-right:8px">
                    @if ($shp->status)
                    <button class="button-on">Open Now</button>
                    @else
                    <button class="button-off">Closed</button>
                    @endif
                </div>
                <div class="card-body">
                    @auth('customer')
                    @if ($shp->status)
                    <a style="color:black" href="{{ url('view-store/' . $shp->id) }}">
                        <h5 class="card-title">{{ $shp->name }}</h5>
                    </a>
                    @else
                    <h5 class="card-title">{{ $shp->name }}</h5>
                    @endif
                    @else
                    @if ($shp->status)
                    <a style="color:black" href="" data-target="#siginmodal" data-toggle="modal">
                        <h5 class="card-title">{{ $shp->name }}</h5>
                    </a>
                    @else
                    <h5 class="card-title">{{ $shp->name }}</h5>
                    @endif
                    @endauth
                    <p class="card-text"><span class="shopch">Address :</span> <span class="shopcp">{{ $shp->address
                            }}</span></p>

                    <p class="card-text" style="white-space: nowrap"><span class="shopch">Email :</span> <span
                            class="shopcp">{{ $shp->email }}</span></p>

                    <p class="card-text"><span class="shopch">Contact :</span> <span class="shopcp">{{ $shp->mobile
                            }}</span></p>

<a class="btn btn-primary" id="addresmodel" href='https://www.google.com/maps/search/?api=1&query={{$shp->address}}' target="_blank">address</a>


                    @auth('customer')
                    @if ($shp->status)
                    <p class="shopcl"><a href="{{ url('view-store/' . $shp->id) }}" id="viewStoreLink">View
                            Store
                            <i style="color: #004aad;font-size:18px" class="bi bi-arrow-right-circle"></i></a>
                    </p>
                    @else
                    <p class="shopcl" style="margin-top: 10px;"><strong style="color: red; padding:10px;">Store
                            is
                            closed</strong></p>
                    @endif
                    @else
                    @if ($shp->status)
                    <p class="shopcl" style="margin-top: 10px;"><a href="" data-toggle="modal" data-target="#siginmodal"
                            id="viewStoreLink">View Store <i style="color: #004aad;font-size:18px"
                                class="bi bi-arrow-right-circle"></i></a>
                    </p>
                    @else
                    <p class="shopcl" style="margin-top: 10px;"><strong style="color: red; padding:10px;">Store
                            is
                            closed</strong></p>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        <!-- col end1 -->
        @endforeach
    </div>
    {{-- <i style="color: #004aad;font-size:18px" class="bi <i class="fa fa-location-arrow" aria-hidden="true"></i> --}}

    <!-- row end -->

    <!-- Pagination Links -->
    @if ($query->hasPages())
    <div style="display: flex; justify-content: center; margin-top: 4rem;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($query->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $query->previousPageUrl() }}">Previous</a>
                </li>
                @endif

                @php
                // Calculate the total number of pages
                $totalPages = ceil($query->total() / $query->perPage());
                @endphp

                @for ($i = 1; $i <= $totalPages; $i++) <li
                    class="page-item{{ $query->currentPage() == $i ? ' active' : '' }}">
                    <a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    @if ($query->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $query->nextPageUrl() }}">Next</a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                    @endif
            </ul>
        </nav>
    </div>
    @endif

    <div class="container" style="margin-top:50px;margin-bottom:50px;">
        <div style="border: 1px solid #004AAD;border-radius:10px;margin:10px">
            <h2 style="text-align:center;color:#004AAD;padding-top:20px">About HikayatAlref</h2>
            <p
                style="text-align:center;padding-left:30px;padding-right:30px;padding-top:20px;padding-bottom:20px;font-weight:600">
                Countryside Story Trading Est provides integrated services for projects and commercial companies. It
                was
                established in the city of Al-Khobar, Kingdom of Saudi Arabia, according to the system of trading
                commercial
                in
                Saudi Arabia. It works to provide consultancy and integrated development solutions
                (marketing/financial/administrative) in the Kingdom of Saudi Arabia and the Arab world, and to
                provide
                marketing
                and development plans with Implementation within a trained staff for these tasks, and the company
                methodology is
                adopted to achieve guaranteed and satisfactory results for customers and reward individuals by
                giving
                them
                offers and gifts equal to what was purchased from the shops that fall within the participants in the
                marketing
                plans of the company.

            </p>
        </div>
    </div>
</div>
<!-- card section end -->
@endsection

@section('script')
@if(auth('customer')->check() && auth('customer')->user()->hold == '1')
<script>
    $(document).ready(function() {
                    $('#customer_hold').modal('show');
            });
</script>
@endif


{{-- @section('script') --}}
{{-- @if ($errors->has('email'))
<script>
    console.log('error');
$('#siginmodal').modal('show');
</script> --}}
{{-- @endif --}}

{{-- @dd($errors) --}}
<script>
    // @if (count($errors) > 0)
$(document).ready(function() {
    $('#siginmodal').modal('show');
});
// @endif
</script>


@if (session('successJob'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('successJob') }}',
                    text: 'You will hear from us soon',
                    showConfirmButton: false,
                    timer: 5000 // Set the time duration for the alert to automatically close (in milliseconds)
                });
            });
</script>
@endif


@if (auth('customer')->check() && auth('customer')->user()->has_seen_model != '2')
<!-- Display your model here -->
{{-- @auth('customer') --}}

<script>
    $(document).ready(function() {
                // Check if the user is logged in (you will need your own logic for this)
                var isLoggedIn = true; // Change this to your actual login status check

                if (isLoggedIn) {
                    $('#customer_success').modal('show'); // Show the modal
                }

                // Close customer_success_modal when its close button is clicked
                $('#customer_success .close').click(function() {
                    $('#customer_success').modal('hide');
                });
            });
</script>
{{-- @endauth --}}
{{-- View password --}}
@endif

<script>
    const passwordInput = document.getElementById('so-password');
        const passwordShow = document.getElementById('password-show');
        const passwordHide = document.getElementById('password-hide');

        passwordShow.addEventListener('click', function() {
            passwordInput.type = 'text';
            passwordShow.style.display = 'none';
            passwordHide.style.display = 'inline';
        });

        passwordHide.addEventListener('click', function() {
            passwordInput.type = 'password';
            passwordHide.style.display = 'none';
            passwordShow.style.display = 'inline';
        });
</script>

<script>
    const loginPasswordInput = document.getElementById('so-login-password');
        const loginPasswordShow = document.getElementById('login-password-show');
        const loginPasswordHide = document.getElementById('login-password-hide');

        loginPasswordShow.addEventListener('click', function() {
            loginPasswordInput.type = 'text';
            loginPasswordShow.style.display = 'none';
            loginPasswordHide.style.display = 'inline';
        });

        loginPasswordHide.addEventListener('click', function() {
            loginPasswordInput.type = 'password';
            loginPasswordHide.style.display = 'none';
            loginPasswordShow.style.display = 'inline';
        });
</script>

{{-- Customer password view --}}
<script>
    const signupPasswordInput = document.getElementById('register-password');
        const signupPasswordShow = document.getElementById('signup-password-show');
        const signupPasswordHide = document.getElementById('signup-password-hide');

        signupPasswordShow.addEventListener('click', function() {
            signupPasswordInput.type = 'text';
            signupPasswordShow.style.display = 'none';
            signupPasswordHide.style.display = 'inline';
        });

        signupPasswordHide.addEventListener('click', function() {
            signupPasswordInput.type = 'password';
            signupPasswordHide.style.display = 'none';
            signupPasswordShow.style.display = 'inline';
        });
</script>

<script>
    const signinPasswordInput = document.getElementById('password');
        const signinPasswordShow = document.getElementById('signin-password-show');
        const signinPasswordHide = document.getElementById('signin-password-hide');

        signinPasswordShow.addEventListener('click', function() {
            signinPasswordInput.type = 'text';
            signinPasswordShow.style.display = 'none';
            signinPasswordHide.style.display = 'inline';
        });

        signinPasswordHide.addEventListener('click', function() {
            signinPasswordInput.type = 'password';
            signinPasswordHide.style.display = 'none';
            signinPasswordShow.style.display = 'inline';
        });
</script>

<script>
    $(document).ready(function() {
            // Flag to track validation errors
            var hasErrors = false;

            // Function to validate name field
            $('#name').on('blur', validateName);

            // Function to validate email field
            $('#so-email').on('blur', validateEmail);

            // Function to validate phone field
            $('#phone').on('blur', validatePhone);

            // Function to validate password field
            $('#so-password').on('blur', validatePassword);

            // Function to validate password confirmation field
            $('#password-confirm').on('blur', validatePasswordConfirmation);

            // Function to validate other required fields and select fields
            $('#nationality, #state, #city, #address, #shop_name, #shop_category, #cr_number, #offer, #images').on(
                'blur change', validateField);

            // Form submission handler
            $('#so-register').on('submit', function(e) {
                // Reset the flag
                hasErrors = false;

                // Trigger blur event on all fields to perform validation
                $('#name, #so-email, #phone, #so-password, #password-confirm, #nationality, #state, #city, #address, #shop_name, #shop_category, #cr_number, #offer, #images')
                    .trigger('blur');

                // Prevent form submission if there are validation errors
                if (hasErrors) {
                    e.preventDefault();
                }
            });

            // Validation functions
            function validateName() {
                var name = $('#name').val();
                if (name === '') {
                    $('#name').addClass('is-invalid');
                    $('#name_error').text('Name is required');
                    hasErrors = true;
                } else {
                    $('#name').removeClass('is-invalid');
                    $('#name_error').text('');
                }
            }

            function validateEmail() {
                var email = $('#so-email').val();
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                if (email === '') {
                    $('#so-email').addClass('is-invalid');
                    $('#email_error').text('Email is required');
                    hasErrors = true;
                } else if (!emailPattern.test(email)) {
                    $('#so-email').addClass('is-invalid');
                    $('#email_error').text('Invalid email format');
                    hasErrors = true;
                } else {
                    $('#so-email').removeClass('is-invalid');
                    $('#email_error').text('');
                }
            }

            function validatePhone() {
                var phone = $('#phone').val();
                var phonePattern = /^\d{10}$/;

                if (phone === '') {
                    $('#phone').addClass('is-invalid');
                    $('#phone_error').text('Phone number is required');
                    hasErrors = true;
                } else if (!phonePattern.test(phone)) {
                    $('#phone').addClass('is-invalid');
                    $('#phone_error').text('Invalid phone number (10 digits required)');
                    hasErrors = true;
                } else {
                    $('#phone').removeClass('is-invalid');
                    $('#phone_error').text('');
                }
            }

            function validatePassword() {
                var password = $('#so-password').val();

                if (password === '') {
                    $('#so-password').addClass('is-invalid');
                    $('#password_error').text('Password is required');
                    hasErrors = true;
                } else if (password.length < 8) {
                    $('#so-password').addClass('is-invalid');
                    $('#password_error').text('Password must be at least 8 characters');
                    hasErrors = true;
                } else {
                    $('#so-password').removeClass('is-invalid');
                    $('#password_error').text('');
                }
            }

            function validatePasswordConfirmation() {
                var password = $('#so-password').val();
                var confirmPassword = $('#password-confirm').val();

                if (confirmPassword !== password) {
                    $('#so-password, #password-confirm').addClass('is-invalid');
                    $('#password_error, #confirm_password_error').text('Passwords do not match');
                    hasErrors = true;
                } else {
                    if (password === '' || confirmPassword === '') {

                        if (password === '') {
                            $('#so-password').addClass('is-invalid');
                            $('#password_error').text('Password is required');
                            hasErrors = true;
                        }

                        if (confirmPassword === '') {
                            $('#password-confirm').addClass('is-invalid');
                            $('#confirm_password_error').text('Confirm Password is required');
                            hasErrors = true;
                        }

                    } else {

                        if (password.length < 8) {
                            $('#so-password').addClass('is-invalid');
                            $('#password_error').text('Password must be at least 8 characters');
                            $('#password-confirm').removeClass('is-invalid');
                            $('#confirm_password_error').text('');
                            hasErrors = true;
                        } else {
                            $('#so-password').removeClass('is-invalid');
                            $('#password-confirm').removeClass('is-invalid');
                            $('#password_error').text('');
                        }
                    }
                }
            }

            function validateField() {
                var fieldValue = $(this).val();
                var fieldName = $(this).attr('id');
                if (fieldValue === '') {
                    $(this).addClass('is-invalid');
                    $('#' + fieldName + '_error').text(fieldName.charAt(0).toUpperCase() + fieldName.slice(1) +
                        ' is required');
                    hasErrors = true;
                } else {
                    $(this).removeClass('is-invalid');
                }
            }
        });

        // Customer Registration
        $(document).ready(function() {
            // Flag to track validation errors
            var hasErrors = false;

            // Function to validate email field
            $('#register-email').on('blur', validateEmail);

            // Function to validate phone field
            $('#mobile').on('blur', validatePhone);

            // Function to validate password field
            $('#register-password').on('blur', validatePassword);

            // Function to validate password confirmation field
            $('#register-password-confirm').on('blur', validatePasswordConfirmation);

            $('#cgender').on('blur change ', validatecGender);

            // Function to validate other required fields and select fields
            $('#first_name, #last_name, #customer_address, #profile_image').on('blur change', validateField);

            // Form submission handler
            $('#registerForm').on('submit', function(e) {
                // Reset the flag
                hasErrors = false;

                // Trigger blur event on all fields to perform validation
                $('#register-email, #mobile, #register-password, #register-password-confirm, #first_name, #last_name, #customer_address, #cgender, #profile_image')
                    .trigger('blur');

                // Prevent form submission if there are validation errors
                if (hasErrors) {
                    e.preventDefault();
                }
            });

            // Validation functions
            function validateEmail() {
                var email = $('#register-email').val();
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                if (email === '') {
                    $('#register-email').addClass('is-invalid');
                    $('#register-email_error').text('Email is required');
                    hasErrors = true;
                } else if (!emailPattern.test(email)) {
                    $('#register-email').addClass('is-invalid');
                    $('#register-email_error').text('Invalid email format');
                    hasErrors = true;
                } else {
                    $('#register-email').removeClass('is-invalid');
                    $('#register-email_error').text('');
                }
            }

            function validatePhone() {
                var phone = $('#mobile').val();
                var phonePattern = /^\d{10}$/;

                if (phone === '') {
                    $('#mobile').addClass('is-invalid');
                    $('#mobile_error').text('Phone number is required');
                    hasErrors = true;
                } else if (!phonePattern.test(phone)) {
                    $('#mobile').addClass('is-invalid');
                    $('#mobile_error').text('Invalid phone number (10 digits required)');
                    hasErrors = true;
                } else {
                    $('#mobile').removeClass('is-invalid');
                    $('#mobile_error').text('');
                }
            }

            function validatePassword() {
                var password = $('#register-password').val();

                if (password === '') {
                    $('#register-password').addClass('is-invalid');
                    $('#register-password_error').text('Password is required');
                    hasErrors = true;
                } else if (password.length < 8) {
                    $('#register-password').addClass('is-invalid');
                    $('#register-password_error').text('Password must be at least 8 characters');
                    hasErrors = true;
                } else {
                    $('#register-password').removeClass('is-invalid');
                    $('#register-password_error').text('');
                }
            }

            function validatePasswordConfirmation() {
                var password = $('#register-password').val();
                var confirmPassword = $('#register-password-confirm').val();

                if (confirmPassword !== password) {
                    $('#register-password, #register-password-confirm').addClass('is-invalid');
                    $('#register-password_error, #confirm_register-password_error').text('Passwords do not match');
                    hasErrors = true;
                } else {
                    // $('#register-password').removeClass('is-invalid');
                    // $('#register-password-confirm').removeClass('is-invalid');
                    // $('#register-password_error').text('');

                    if (password === '' || confirmPassword === '') {

                        if (password === '') {
                            $('#register-password').addClass('is-invalid');
                            $('#register-password_error').text('Password is required');
                            hasErrors = true;
                        }

                        if (confirmPassword === '') {
                            $('#register-password-confirm').addClass('is-invalid');
                            $('#confirm_register-password_error').text('Confirm Password is required');
                            hasErrors = true;
                        }

                    } else {

                        if (password.length < 8) {
                            $('#register-password').addClass('is-invalid');
                            $('#password_error').text('Password must be at least 8 characters');
                            $('#register-password-confirm').removeClass('is-invalid');
                            $('#confirm_register-password_error').text('');
                            hasErrors = true;
                        } else {
                            $('#register-password').removeClass('is-invalid');
                            $('#register-password-confirm').removeClass('is-invalid');
                            $('#register-password_error').text('');
                        }
                    }



                }
            }

            function validatecGender() {
                var gender = $('#cgender').val();
                // alert(gender);
                if (gender === 'Select your gender' || gender === null) {
                    $('#cgender').addClass('is-invalid');
                    $('#cgender_error').text('Gender is required');
                    hasErrors = true;
                } else {
                    $('#cgender').removeClass('is-invalid');
                    $('#cgender_error').text('');
                }
            }

            function validateField() {
                var fieldValue = $(this).val();
                var fieldName = $(this).attr('id');
                if (fieldValue === '') {
                    $(this).addClass('is-invalid');
                    $('#' + fieldName + '_error').text(fieldName.charAt(0).toUpperCase() + fieldName.slice(1) +
                        ' is required');
                    hasErrors = true;
                } else {
                    $(this).removeClass('is-invalid');
                }
            }
        });

        //Job Registation

        $(document).ready(function() {
            // Flag to track validation errors
            var hasErrors = false;

            // Function to validate name field
            $('#jname').on('blur', validateName);

            // Function to validate email field
            $('#jemail').on('blur', validateEmail);

            // Function to validate phone field
            $('#jmobile').on('blur', validatePhone);

            //Function to validate field nationality
            $('#jnationality').on('blur', validateNationality);

            //Function to validate field specialization
            $('#jspecialization').on('blur', validateSpecialization);

            // Function to validate Gender field
            $('#jgender').on('blur change ', validateGender);

            // Function to validate Gender field
            $('#cv_file').on('blur change ', validateCvFile)


            // Form submission handler
            $('#siginjobmodal').on('submit', function(e) {
                // Reset the flag
                hasErrors = false;

                // Trigger blur event on all fields to perform validation
                $('#jname, #jemail, #jmobile, #jnationality, #jspecialization, #nationality, #jgender, #cv_file')
                    .trigger('blur');

                // Prevent form submission if there are validation errors
                if (hasErrors) {
                    e.preventDefault();
                }
            });

            // Validation functions
            function validateName() {
                var name = $('#jname').val();
                if (name === '') {
                    $('#jname').addClass('is-invalid');
                    $('#jname_error').text('Name is required');
                    hasErrors = true;
                } else {
                    $('#jname').removeClass('is-invalid');
                    $('#jname_error').text('');
                }
            }

            function validateNationality() {
                var name = $('#jnationality').val();
                if (name === '') {
                    $('#jnationality').addClass('is-invalid');
                    $('#jnationality_error').text('Nationality is required');
                    hasErrors = true;
                } else {
                    $('#jnationality').removeClass('is-invalid');
                    $('#jnationality_error').text('');
                }
            }

            function validateSpecialization() {
                var name = $('#jspecialization').val();
                if (name === '') {
                    $('#jspecialization').addClass('is-invalid');
                    $('#jspecialization_error').text('Specialization is required');
                    hasErrors = true;
                } else {
                    $('#jspecialization').removeClass('is-invalid');
                    $('#jspecialization_error').text('');
                }
            }

            function validateEmail() {
                var email = $('#jemail').val();
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

                if (email === '') {
                    $('#jemail').addClass('is-invalid');
                    $('#jemail_error').text('Email is required');
                    hasErrors = true;
                } else if (!emailPattern.test(email)) {
                    $('#jemail').addClass('is-invalid');
                    $('#jemail_error').text('Invalid email format');
                    hasErrors = true;
                } else {
                    $('#jemail').removeClass('is-invalid');
                    $('#jemail_error').text('');
                }
            }

            function validatePhone() {
                var phone = $('#jmobile').val();
                var phonePattern = /^\d{10}$/;

                if (phone === '') {
                    $('#jmobile').addClass('is-invalid');
                    $('#jmobile_error').text('Phone number is required');
                    hasErrors = true;
                } else if (!phonePattern.test(phone)) {
                    $('#jmobile').addClass('is-invalid');
                    $('#jmobile_error').text('Invalid phone number (10 digits required)');
                    hasErrors = true;
                } else {
                    $('#jmobile').removeClass('is-invalid');
                    $('#jmobile_error').text('');
                }
            }

            function validateGender() {
                var gender = $('#jgender').val();
                if (gender === 'Select your gender' || gender === null) {
                    $('#jgender').addClass('is-invalid');
                    $('#jgender_error').text('Gender is required');
                    hasErrors = true;
                } else {
                    $('#jgender').removeClass('is-invalid');
                    $('#jgender_error').text('');
                }
            }

            function validateCvFile() {
                var allowedMimes = ['application/pdf'];
                var file = $('#cv_file')[0].files[0];
                if (!file) {
                    $('#cv_file').addClass('is-invalid');
                    $('#cv_file_error_req').text('File is required.');
                    $('#cv_file_error').text('');
                    hasErrors = true;
                } else if (allowedMimes.indexOf(file.type) === -1) {
                    $('#cv_file').addClass('is-invalid');
                    $('#cv_file_error').text('Invalid file type. Please upload a PDF file.');
                    $('#cv_file_error_req').text('');
                    hasErrors = true;
                } else {
                    $('#cv_file').removeClass('is-invalid');
                    $('#cv_file_error_req').text('');
                    $('#cv_file_error').text('');
                }
            }

        });
</script>
@endsection
@section('style')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap");

    .hero-section {
        background-image: url(frontend/hero/images/30929417_7727047\ 1.png);
    }

    .hero {
        font-family: Manrope;
        line-height: 104px;
        letter-spacing: 0em;
    }

    .hero_heading {
        font-size: 4rem;
        font-weight: 800;
    }

    .hero_content1 {
        font-size: 1.4rem;
        font-weight: 700;
        line-height: 44px;
        letter-spacing: 0em;
        color: #004aad;
        text-align: left;
    }

    .hero_content2 {
        font-size: 1.4rem;
        font-weight: 500;
        color: #407bff;
        line-height: 41px;
        letter-spacing: 0em;
        text-align: right;
    }

    /* Customize the carousel indicators */
    .hero-button {
        border-radius: 42px;
        border: none;
        background-color: #5627ff;
        padding: 2% 4%;
        color: white;
        margin-top: 5%;
    }

    .carousel-indicators {
        bottom: 20px;
        /* Adjust the position as needed */
    }

    .carousel-indicators button {
        background-color: #007bff;
        /* Change the background color */
        padding: 0.5% 1%;
        border-radius: 42px;
    }

    .carousel-indicators .active {
        background-color: #f5b932;
        /* Change the active indicator color */
        padding: 0.5% 1%;
        border-radius: 42px;
    }

    /* Customize the carousel navigation buttons */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #007bff;
        /* Change the arrow color */
    }

    /* Optionally, change the color of the text labels (Previous and Next) */
    .carousel-control-prev,
    .carousel-control-next {
        color: #007bff;
        /* Change the text color */
    }

    .get-started {
        background-color: #002c8f;
        padding: 1%;
        border-radius: 22px;
        color: white;
        width: 80%;
        z-index: 99;
    }

    .get-started h2 {
        font-family: Manrope;
        font-weight: 700;
        font-size: 2.4rem;

        letter-spacing: 0em;
        text-align: center;
    }

    .get-started p {
        font-family: Manrope;
        font-size: 1rem;
        font-weight: 400;

        letter-spacing: 0em;
        text-align: center;
    }

    @media(max-width:470px) {
        .get-started {
            width: 100%;
        }

        .get-started h2 {
            font-size: 1.4rem;
        }

        .get-started p {
            font-size: 0.7rem;
        }
    }

    /* new 20-10  */
    .carousel-indicators button {
        visibility: hidden !important;
    }

    .riyal-mob-icon{
        width: 60px;
        height: 60px;
    }

    @media only screen and (max-width: 600px) {
    .riyal-mob-icon{
        width: 50px;
        height: 50px;
    }
}

</style>
@endsection
