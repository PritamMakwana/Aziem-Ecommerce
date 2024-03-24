<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('frontend/screen2/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav style=" box-shadow: 0px 15px 20px -15px #3431314e;  " class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('frontend/screen2/assets/logo.png') }}" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ml-auto my-2 my-lg-0  ">
                    <li class="nav-item">
                        <a class="nav-link  " aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Your Receipt</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ">About Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "><i class="bi bi-globe"></i> Select Language</a>
                    </li>
                    <li class="nav-item">
                        <i style="font-size: 24px;" class="bi bi-bell-fill"></i>
                    </li>
                    <li class="nav-item">
                        <i style="font-size: 24px;margin-left: 7px;" class="bi bi-person-circle"></i>
                        @auth('customer')
                            {{ Auth::guard('customer')->user()->first_name }}
                            {{ Auth::guard('customer')->user()->last_name }}
                            {{-- @dd(Auth); --}}
                        @else
                            Log in
                        @endauth
                    </li>
                    @auth('customer')
                        <li class="nav-item">
                            <a class="" href="{{ route('customer.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="font-size: 24px;margin-left: 7px;" class="bi bi-box-arrow-left"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    @auth('shop_owner')
                        <li class="nav-item">
                            <a class="" href="{{ route('shop_owner.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="font-size: 24px;margin-left: 7px;" class="bi bi-box-arrow-left"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('shop_owner.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Your Cart</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->product_name }}</td>
                        <td>${{ $cartItem->product->price }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $cartItem->product_id) }}">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('Stores') }}" class="btn btn-secondary">Continue Shopping</a>
            <!-- You can add a checkout button here and process the order -->
        </div>
    </div>

    {{-- Footer --}}
    <div>
        <footer class="footer-section">
            <div class="container">



                <div class="footer-content pt-5 pb-5">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 mb-50">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('frontend/screen2/assets/logo.png') }}"
                                            class="img-fluid" alt="logo"></a>
                                </div>
                                <div class="footer-text">
                                    <p>Hikayet Arief give you discounts on products to buy from your nearest store</p>
                                </div>
                                <div class="footer-social-icon">

                                    <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                    <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                    <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 mb-30">

                            <ul style="list-style-type: none;  ">
                                <li class="footerlist">Company</li>
                                <li class="footerlist">About</li>
                                <li class="footerlist">Shop Categories</li>
                                <li class="footerlist">Register Your Shop</li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                            <ul style="list-style-type: none;  ">
                                <li class="footerlist">Company</li>
                                <li class="footerlist">About</li>
                                <li class="footerlist">Shop Categories</li>
                                <li class="footerlist">Register Your Shop</li>
                            </ul>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                            <ul style="list-style-type: none;  ">
                                <li class="footerlist">Others</li>
                                <li class="footerlist1"> <i style="font-size: 23px;margin:10px"
                                        class="bi bi-twitter"></i>
                                    <i style="font-size: 23px;margin:10px" class="bi bi-facebook"></i> <i
                                        style="font-size: 23px;margin:10px" class="bi bi-instagram"></i>
                                </li>
                                <li class="footerlist1">Term's & Conditions</li>
                                <li class="footerlist1">Log Out <i style="font-size: 19px;margin:6px"
                                        class="bi bi-box-arrow-right"></i></li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>



        </footer>
    </div>
    <div class="container-fluid" style="background-color: #0b1c3f;margin-top:0.5px">

        <p style="color:white;text-align:center;padding:10px;margin-bottom:-10px">copyright 2023, all right reserved
        </p>
    </div>

</body>

</html>
