@section('style')
<style>
    .navbar-toggler:focus,
.navbar-toggler:active {
    outline: 0;
}

/* hide close when burger shown */
.navbar-toggler.collapsed .close-icon {
    display: none;
}

.navbar-toggler:not(.collapsed) .navbar-toggler-icon {
    display: inline;
}
</style>
@endsection
<nav style=" position: fixed; top: 0; left: 0; right: 0; z-index: 1000; box-shadow: 0px 15px 20px -15px #3431314e;"
    class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/Stores') }}"><img
                src="{{ asset('frontend/screen2/assets/logo.png') }}" /></a>
        <button class="navbar-toggler" style="margin-right: 15px;" id="menuc" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
            aria-label="Toggle navigation">
            <span id="menu" class="navbar-toggler-icon "></span>
        </button>
        {{-- <button class="navbar-toggler collapsed border-0" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
            <div class="close-icon py-1">✖</div>
        </button> --}}
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ml-auto my-2 my-lg-0  align-items-center">
                @auth('shop_owner')
                    <li class="nav-item">
                        <a href="{{ url('/so-home/' . Auth::guard('shop_owner')->user()->id) }}" class="nav-link  "
                            aria-current="page">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('/Stores') }}" class="nav-link  " aria-current="page">Home</a>
                    </li>
                @endauth
                @auth('customer')
                    <li class="nav-item">
                        <a href="{{ url('my-receipts/' . Auth::guard('customer')->user()->id) }}" class="nav-link">Your
                            Receipts</a>
                    </li>
                @endauth
                @auth('shop_owner')
                    {{-- <li class="nav-item">
                    <a href="{{ url('order-list/' . Auth::guard('shop_owner')->user()->id) }}" class="nav-link">Order
                        List</a>
                </li> --}}
                @endauth

                {{-- @auth('shop_owner')
                <li class="nav-item">
                    <a href="{{ url('my_profile/' . Auth::guard('shop_owner')->user()->id) }}" class="nav-link ">My
                        Profile</a>
                </li>
                @endauth --}}
                {{-- @auth('customer')
                <li class="nav-item">
                    <a href="{{ url('my-account/' . Auth::guard('customer')->user()->id) }}" class="nav-link ">My
                        Account</a>
                </li>
                @endauth --}}
                {{-- @auth('customer')
                <li class="nav-item">
                    <i style="font-size: 24px; color:grey;" class="bi bi-bell-fill"></i>
                </li>
                @endauth --}}
                @auth('customer')
                    <li class="nav-item dropdown" style="display: flex;flex-direction:row;">
                        <i style="font-size: 22px;margin-left: 7px;margin-top: 6px; color:grey" class="bi bi-person-circle"></i>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            {{ Auth::guard('customer')->user()->first_name }}
                            {{ Auth::guard('customer')->user()->last_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ url('my-account/' . Auth::guard('customer')->user()->id) }}" class="nav-link ">
                                <i style="font-size: 24px;margin-right:5px;" class="bi bi-person-circle"></i>
                                My Account</a>
                            <a class="" style="color: black" href="{{ route('customer.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="font-size: 24px;margin-left: 5px; margin-right:5px;"
                                    class="bi bi-box-arrow-left"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

                @auth('shop_owner')
                    <li class="nav-item dropdown" style="display: flex;flex-direction:row;">
                        <i style="font-size: 22px;margin-left: 7px; color:grey;margin-top: 6px;" class="bi bi-person-circle"></i>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('shop_owner')->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ url('my_profile/' . Auth::guard('shop_owner')->user()->id) }}" class="nav-link ">
                                <i style="font-size: 24px;margin-right:5px;" class="bi bi-person-circle"></i>
                                My Profile</a>
                            <a class="" style="color: black;" href="{{ route('shop_owner.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i style="font-size: 24px;margin-left: 7px; margin-right:5px;"
                                    class="bi bi-box-arrow-left"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('shop_owner.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

                @guest('customer')
                    @guest('shop_owner')
                        <li class="nav-item" style="display: flex;flex-direction:row;">
                            <i style="font-size: 22px;margin-left: 7px; color:grey;margin-top: 6px;" class="bi bi-person-circle"></i>
                            <a class="nav-link" id="login_link" data-toggle="modal" data-target="#siginmodal"
                                style="cursor: pointer">
                                Get Started</a>
                        </li>
                    @endguest
                @endguest
                {{-- @auth('customer')
                <li class="nav-item">
                    <a class="" style="color: black" href="{{ route('customer.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i style="font-size: 24px;margin-left: 7px;" class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endauth --}}
                {{-- @auth('shop_owner')
                <li class="nav-item">
                    <a class="" style="color: black;" href="{{ route('shop_owner.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i style="font-size: 24px;margin-left: 7px;" class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('shop_owner.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endauth --}}
                {{-- <i style="font-size: 22px;margin-left: 7px; color:grey" class="bi bi-globe me-2"></i> --}}
                <li class="nav-item" style="display: flex;flex-direction:row;">

                    <i style="font-size: 22px;margin-left: 7px; color:grey;margin-top:6px;" class="bi bi-globe me-2"></i>
                    {{-- <select class="nav-link changeLanguage">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English
                        </option>
                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                    </select> --}}
                    <div id="google_translate_element" style="font-size: 1.2rem;">

                        <li class="nav-item" id="h-navbar" style="display: flex;flex-direction:row;">
                            <a class="nav-link"  href="{{ url('/about') }}"
                                style="cursor: pointer">
                                About Us</a>
                        </li>
                        <li class="nav-item" id="h-navbar" style="display: flex;flex-direction:row;">
                            <a class="nav-link" href="{{ url('/customer-service') }}"
                                style="cursor: pointer">
                                Customer Service</a>
                        </li>
                        <li class="nav-item" id="h-navbar" style="display: flex;flex-direction:row;">
                            <a class="nav-link" href="{{ url('/our-services') }}"
                                style="cursor: pointer">
                                Our Services</a>
                        </li>
                        <li class="nav-item" id="h-navbar" style="display: flex;flex-direction:row;">
                            <a class="nav-link"  href="{{ url('/contact') }}"
                                style="cursor: pointer">
                                Contact Us</a>
                        </li>

                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>

@auth('customer')
    <div class="container-fluid ">
        <div class="navbar-phone">
        <div style="background-color: #004aadff;" class="row">
            <div style="text-align:center;color:white; padding:10px" class="col-3">
                <a id="fontnav" style="color: white" href="{{ url('/about') }}">About Us</a>
            </div>
            <div style="text-align:center;color:white; padding:10px" class="col-3">
                <a id="fontnav" style="color: white" href="{{ url('/customer-service') }}">Customer
                    Service</a>
            </div>
            <div style="text-align:center;color:white; padding:10px" class="col-3">
                <a id="fontnav" style="color: white" href="{{ url('/our-services') }}">Our Services</a>
            </div>
            <div style="text-align:center;color:white; padding:10px" class="col-3">
                <a id="fontnav" style="color: white" href="{{ url('/contact') }}">Contact Us</a>
            </div>
        </div>
        </div>
    </div>
@endauth

@guest('customer')
    @guest('shop_owner')
        <div class="container-fluid ">
            <div class="navbar-phone">
            <div style="background-color: #004aadff;" class="row" >
                <div style="text-align:center;color:white; padding:10px" class="col-3">
                    <a id="fontnav" style="color: white" href="{{ url('/about') }}">About Us</a>
                </div>
                <div style="text-align:center;color:white; padding:10px" class="col-3">
                    <a id="fontnav" style="color: white" href="{{ url('/customer-service') }}">Customer
                        Service</a>
                </div>
                <div style="text-align:center;color:white; padding:10px" class="col-3">
                    <a id="fontnav" style="color: white" href="{{ url('/our-services') }}">Our Services</a>
                </div>
                <div style="text-align:center;color:white; padding:10px" class="col-3">
                    <a id="fontnav" style="color: white" href="{{ url('/contact') }}">Contact Us</a>
                </div>
            </div>
            </div>
        </div>
    @endguest
@endguest
