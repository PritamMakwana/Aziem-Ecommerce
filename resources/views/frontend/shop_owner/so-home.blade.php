@extends('frontend.layouts.app')
@section('content')
@include('shop_owner.hold')

    <div>
        <div style="background-color: #c0dbff;">
            <div class="container">
                <div style="display: flex;justify-content:center;padding-top:40px;padding-bottom:60px">
                    <div class="card2">
                        <div style="margin:20px;border-color:none;border-radius:10px" class="car">
                            <h1 style="text-align: center;">Let your customers know your <span
                                    style="color: #004aad;">availability</span> </h1>
                            <p style="text-align: center;font-weight:600">Tap below to change its availablity</p>

                            <div style="display: flex;justify-content:center;margin-top:2rem;margin-bottom:5rem">
                                <div
                                    style="display: flex;flex-direction:row;background-color:white;padding:20px;border-radius:12px">
                                    <p style="font-weight: bold;padding-top:6px;font-size:18px">Come in ! We are</p>
                                    @if ($query->status)
                                        <a href="{{ url('update-status/' . $query->shop_owner->id) }}"
                                            style="margin-top:2px;background-color: #40fbb9;color:black;border-color:#40fbb9;margin-left:20px;margin-right:20px;font-weight:bold;width:120px"
                                            type="button" class="btn btn-primary btnco">Open Now</a>
                                        <i style="color: #004aad;padding-top:6px;font-size:20px"
                                            class="bi bi-arrow-down-up"></i>
                                    @else
                                        <a href="{{ url('update-status/' . $query->shop_owner->id) }}"
                                            style="margin-top:2px;background-color: #d09191;color:black;border-color:#40fbb9;margin-left:20px;margin-right:20px;font-weight:bold;width:120px"
                                            type="button" class="btn btn-primary btnco">Closed</a>
                                        <i style="color: #004aad;padding-top:6px;font-size:20px"
                                            class="bi bi-arrow-down-up"></i>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- counter section -->
        <div class="container">
            <div style="display: flex;justify-content:center">
                <div style="margin-top:-4rem" class="row">
                    <div style="background-color:whitesmoke;padding:20px;border-radius:10px;margin:10px" class="col">
                        <div class="background-color:white;margin-top:-5rem">
                            <p style="text-align: center;font-weight:bold">Total Products</p>
                            <h2 style="text-align: center;color:#004aad;font-weight:bold">{{ $productCount }}</h2>
                        </div>
                    </div>
                    <!-- 2nd -->
                    <div style="background-color:whitesmoke;padding:20px;border-radius:10px;margin:10px" class="col">
                        <div class="background-color:white;margin-top:-5rem">
                            <p style="text-align: center;font-weight:bold; white-space:nowrap;">Active Receipts</p>
                            <h2 style="text-align: center;color:#004aad;font-weight:bold">{{ $receiptsCount }}</h2>
                        </div>
                    </div>
                    <!-- 2 end -->
                    <!-- 2nd -->
                    <div style="background-color:whitesmoke;padding:20px;border-radius:10px;margin:10px" class="col">
                        <div class="background-color:white;margin-top:-5rem">
                            <p style="text-align: center;font-weight:bold; white-space:nowrap;">Total Customers</p>
                            <h2 style="text-align: center;color:#004aad;font-weight:bold">{{ $customersCount }}</h2>
                        </div>
                    </div>
                    <!-- 2 end -->

                </div>

            </div>




        </div>
        <!-- counter section end -->

        <!-- card row -->
        <div style="margin-top:4rem" class="container">
            <div class="row">
                <!-- col 1 -->
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div>
                        <img src="{{ asset('frontend/shop_owner/assets/86710851.png') }}" style="width: 100%;">
                    </div>
                    <div>
                        <h5 style="text-align: center;">Dont miss any opportunity to track your activity</h5>
                    </div>
                    {{-- <div style="display: flex;justify-content:center"><button
                            style="background-color: #5627ff;border-color:#5627ff" type="button"
                            class="btn btn-primary">Get Started for Free</button></div> --}}
                </div>
                <!-- col 1 end -->
                <!-- col 2 -->
                <div class="col-lg-9">
                    <div class="container">
                        <div style="display: flex;justify-content:center" class="row">
                            <!-- 1 col start -->
                            <div class="col-lg-5" style="margin:10px;">
                                <div style="padding:20px;background-color:#f8f6ff;border-radius:10px" class="card"
                                    style="width: auto;">
                                    <div> <img class="card-img-top" style="height: 40px;width:40px"
                                            src="{{ asset('frontend/shop_owner/assets/product-description.png') }}"
                                            alt="Card image cap"></div>
                                    <div class="card-body">
                                        <h6 class="card-title">Product List</h6>
                                        <p class="card-text" style="font-size:12px;">Tap to add/edit products that are
                                            available in your shop
                                        </p>
                                        <a href="{{ url('/product_list/' . $query->id) }}"
                                            style="color: #5500ff;border-color:#5500ff" class="btn btn-outline">View and
                                            edit products</a>
                                    </div>
                                </div>

                            </div>
                            <!-- 1 col end -->
                            <!-- 2 col start -->
                            <div class="col-lg-5" style="margin:10px">
                                <div style="padding:20px;background-color:#f8f6ff;border-radius:10px" class="card"
                                    style="width: auto;">
                                    <div> <img class="card-img-top" style="height: 40px;width:40px"
                                            src="{{ asset('frontend/shop_owner/assets/add-product.png') }}"
                                            alt="Card image cap"></div>
                                    <div class="card-body">
                                        <h6 class="card-title">Add New Products</h6>
                                        <p class="card-text" style="font-size:12px;">List out your newly available products
                                            in shop</p>
                                        <a href="{{ url('/new-product/' . $query->id) }}"
                                            style="color: #5500ff;border-color:#5500ff" class="btn btn-outline">Add
                                            Products</a>
                                    </div>
                                </div>

                            </div>
                            <!-- 2 col end -->

                            <!-- 3 col start -->
                            <div class="col-lg-5" style="margin:10px">
                                <div style="padding:20px;background-color:#f8f6ff;border-radius:10px" class="card"
                                    style="width: auto;">
                                    <div> <img class="card-img-top" style="height: 40px;width:40px"
                                            src="{{ asset('frontend/shop_owner/assets/order-list.png') }}"
                                            alt="Card image cap"></div>
                                    <div class="card-body">
                                        <h6 class="card-title">Order List</h6>
                                        <p class="card-text" style="font-size:12px;">Tap to view your Order List
                                        </p>
                                        <a href="{{ url('order-list/' . $query->id) }}"
                                            style="color: #5500ff;border-color:#5500ff" class="btn btn-outline">View
                                            Orders & Receipts</a>
                                    </div>
                                </div>

                            </div>
                            <!-- 3 col end -->


                            <!-- 4 col start -->
                            <div class="col-lg-5" style="margin:10px">
                                <div style="padding:20px;background-color:#f8f6ff;border-radius:10px" class="card"
                                    style="width: auto;">
                                    <div> <img class="card-img-top" style="height: 40px;width:40px"
                                            src="{{ asset('frontend/shop_owner/assets/customer.png') }}"
                                            alt="Card image cap"></div>
                                    <div class="card-body">
                                        <h6 class="card-title">Customers List</h6>
                                        <p class="card-text" style="font-size:12px;">Tap to view the list of your customer
                                        </p>
                                        <a href="{{ url('customer-list/' . $query->id) }}"
                                            style="color: #5500ff;border-color:#5500ff" class="btn btn-outline">View
                                            Customer List</a>
                                    </div>
                                </div>

                            </div>
                            <!-- 4 col end -->



                        </div>
                    </div>
                </div>

                <!-- col 2 end -->
            </div>
        </div>
        <!-- card row end -->
    </div>
@endsection
@section('script')
@if(auth('shop_owner')->check() && auth('shop_owner')->user()->hold == '1')
<script>
    $(document).ready(function() {
                $('#shop_hold').modal('show');
            });
</script>
@endif
@endsection
