<footer class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-3 col-lg-3 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"><img src="{{ asset('frontend/screen3/assets/logo.png') }}"
                                    class="img-fluid" alt="logo"></a>
                        </div>
                        @auth('shop_owner')
                        <div class="footer-text">
                            <p style="color:#a6bad5">"Unlock Your Shop's Potential: Join Us Today and Showcase Your
                                Products to a Global Audience!"</p>
                        </div>
                        @else
                        <div class="footer-text">
                            <p style="color:#a6bad5">Hikayet Arief give you discounts on products to buy from your
                                nearest store</p>
                        </div>
                        @endauth
                        <div class="footer-social-icon">
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 mb-30">

                    <ul style="list-style-type: none;  ">
                        <li class="footerlist" style="color:#a6bad5">Company</li>
                        @auth('shop_owner')
                        <li class="footerlist"><a href="{{ url('/product_list/' . $query->id) }}"
                                style="color: white">Product List</a></li>
                        <li class="footerlist"><a href="{{ url('customer-list/' . $query->id) }}"
                                style="color: white">Customer List</a></li>
                        <li class="footerlist"><a href="{{ url('order-list/' . $query->id) }}"
                                style="color: white">Order List</a></li>
                        @else
                        <li class="footerlist"><a href="{{ url('about') }}" style="color: white">About Us</a></li>
                        <li class="footerlist"><a  href="{{ url('/Stores') }}" style="color: white">Shop Categories</a></li>
                        <li class="footerlist"><a href="{{ url('contact') }}" style="color: white">Contact Us</a></li>
                        @guest('customer')
                        <li class="footerlist" style="white-space: nowrap"><a href="" style="color: white"
                                data-toggle="modal" data-target="#shop_signin">Register Your Shop</a></li>
                        @endguest
                        @endauth
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 mb-30">
                    <ul style="list-style-type: none;  ">
                        <li class="footerlist" style="color:#a6bad5">Services</li>
                        @auth('shop_owner')
                        <li class="footerlist" style="white-space: nowrap"><a
                                href="{{ url('/new-product/' . $query->id) }}" style="color: white">Add New Products</a>
                        </li>
                        @else
                        <li class="footerlist" style="white-space: nowrap"><a href="{{ url('customer-service') }}"
                                style="color: white">Customer Service</a></li>
                        <li class="footerlist" style="white-space: nowrap"><a href="{{ url('our-services') }}"
                                style="color: white">Our Service</a></li>
                        @endauth
                        {{-- <li class="footerlist">Languages</li> --}}
                    </ul>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-6 mb-30">
                    <ul style="list-style-type: none;  ">
                        <li class="footerlist" style="color:#a6bad5">Others</li>
                        {{-- <li class="footerlist">Privacy Policy</li> --}}
                        <li class="footerlist" style="white-space: nowrap">
                            <a href="{{ route('term-and-service') }}"
                            style="color: white">Term & Service</a></li>
                            {{-- Terms & Conditions --}}
                    </ul>
                </div>

                <div class="col-xl-3 col-lg-2 col-md-6 mb-30">
                    <ul style="list-style-type: none;  ">
                        <li class="footerlist" style="color:#a6bad5">To know more follow us on Social Media</li>
                        <li class="footerlist1">
                            <a target="_blank" href="http://twitter.com/hikayatalrif"><i
                                    style="font-size: 23px;margin:10px;color: white" class="bi bi-twitter"></i></a>
                            <a target="_blank" href="https://www.tiktok.com/@hikayat_alrif?_t=8dNk3Fr2hog&_r=1"><i
                                    style="font-size: 23px;margin:10px;color:white" class="bi bi-tiktok"></i></a>
                            <a target="_blank" href="https://instagram.com/hikayatalrif?igshid=NTc4MTIwNjQ2YQ=="><i
                                    style="font-size: 23px;margin:10px;color: white" class="bi bi-instagram"></i></a>
                            <a target="_blank" href="http://snapchat.com/add/hikayatalrif"><i
                                    style="font-size: 23px;margin:10px;color: white" class="bi bi-snapchat"></i></a>

                            <a target="_blank" href="mailto::       info@hekayatalrif.com"><i
                                    style="font-size: 23px;margin:10px;color: white" class="bi bi-envelope"></i></a>


                        </li>

                    </ul>
                </div>

            </div>


        </div>

    </div>



</footer>
</div>
<div class="container-fluid" style="background-color: #0b1c3f;margin-top:0.5px; ">

    <p style="color:white;text-align:center;padding:10px;margin-bottom:0px">© Copyright 2022, All Rights Reserved by
        Hikayat</p>
</div>
