@extends('frontend.layouts.app')
@section('content')
    @php
        $item = $orders->first();
    @endphp
    @include('frontend.shop_owner.confirmation', ['item' => $item])
    <div>
        <!-- section 1 start -->
        <div style="background-color: #f4f7ff;">
            <div class="container">
                <div style="padding: 10px;padding-top:2rem">
                    <h5><a href="{{ url()->previous() }}" style="color: black"><i class="bi bi-arrow-left-circle-fill"></i>
                            Back</a></h5>
                </div>
                <div style="padding-bottom:50px;">
                    <h1 style="text-align: center;"><span style="color: #407bff;">Order</span> List</h1>
                </div>
            </div>
        </div>
        <!-- section 1 end -->

        <div class="container">

            <h2>{{ $item->customer->first_name }}'s <span style="color: #004aad;">Receipt</span></h2>

            <div style="margin-top: 40px;">
                <!-- card 1 -->
                <div>

                    <div class="row">

                        <div class="col-lg-5" style="margin-top: 20px;">
                            <div class="card" style="border-radius:12px; padding:10px; height:auto;">
                                <div style="margin:10px;background-color:#ebf1f8;border-radius:8px">
                                    <div class="row">

                                        <div style="margin:10px;display:flex;justify-content:center" class="col-lg-3">
                                            <img style="padding:10px" src="{{ asset('Shop_images/' . $item->shop->image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                        <div style="padding:2px; " class="col-lg-5">
                                            <h5 class="unishopt">{{ $item->shop->name }}</h5>
                                            <p class="unishopp">{{ $item->shop->address }}</p>
                                        </div>
                                        <div style="padding-right:20px" class="col-lg-3">
                                            <div style="display: flex;justify-content:center">
                                                @if ($item->status)
                                                    <button
                                                        style="background-color: #a0ffe3;border-color:#a0ffe3;color:black;font-size:12px;margin-top:10px;margin-bottom:5px "
                                                        type="button" class="btn btn-primary">Purchased</button>
                                                @else
                                                    <button
                                                        style="background-color: #f4a108;border-color:#f4a108;color:black;font-size:12px;margin-top:10px;margin-bottom:5px "
                                                        type="button" class="btn btn-primary">Pending</button>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- second row start -->
                                <!-- table part -->
                                <div style="padding: 20px;">
                                    <table class="table table-sm">
                                        <!-- <thead>
                                                                                                                                                                                   <tr>
                                                                                                                                                                                     <th scope="col"><span style="font-size: 16px;">Selected Items:</span></th>

                                                                                                                                                                                     <th scope="col"><span style="font-size: 16px;">Quantity</span></th>
                                                                                                                                                                                   </tr>
                                                                                                                                                                                 </thead> -->
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <th scope="row"><span
                                                            style="font-weight: 500;">{{ $order->product()->withTrashed()->first()->product_name ?? $order->product->product_name }}</span>
                                                    </th>
                                                    <td>{{ $order->quantity }} item</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table end -->
                                <!-- third row -->
                                <div class="row">
                                    <div style="padding-left:30px" class="col-lg-6"><span
                                            style="color:#2162b8">{{ date('d-M-Y', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <div style="padding-right:20px;padding-bottom:10px;display:flex;justify-content:flex-end"
                                        class="col-lg-6">
                                        {{-- <button style="background-color:#e0e9f5;color:#004aad"
                                            type="button" class="btn btn-primary">Reciept <i
                                                class="bi bi-arrow-down"></i></button> --}}
                                    </div>
                                </div>
                                <!-- third row end-->

                            </div>
                        </div>

                        <!-- card 1 end -->





                        <div class="col-lg-2"></div>

                        <!-- pop up -->
                        <div class="col-lg-5">

                            <!-- Modal -->
                            <div style="margin-top: 1rem;">
                                <div>
                                    <div class="modal-content">
                                        <div style="border: none;" class="modal-header">


                                        </div>
                                        <div class="modal-body">
                                            <!-- row 1 -->
                                            <div style="margin-top: -10px;" class="row">
                                                <div class="col-lg-4 col-sm-4">
                                                    <h5>{{ $item->customer->first_name }}{{ $item->customer->last_name }}
                                                    </h5>
                                                </div>
                                                <div class="col-lg-4 col-sm-4"> </div>
                                                <div style="display: flex;justify-content:flex-end"
                                                    class="col-lg-4 col-sm-4">
                                                    {{ date('d-M-Y', strtotime($item->created_at)) }}</div>
                                            </div>
                                            <!-- row 1 -->
                                            <!-- row 2 -->
                                            <div class="row">

                                                <div style="margin-top: 20px;" class="col-lg-4">
                                                    {{ $item->customer->email }}</div>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-4">
                                                    {{ $item->customer->mobile }}</div>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-6">
                                                    {{ $item->customer->address }}</div>
                                                <div style="margin-top: 10px;display:flex;justify-content:flex-end"
                                                    class="col-lg-6"> <a
                                                        href="{{ route('generate-shop-receipt', ['order_id' => $item->order_id]) }}"
                                                        style="background-color:#e0e9f5;color:#004aad" type="button"
                                                        class="btn btn-primary">Receipt <i style="padding-left: 4px;"
                                                            class="bi bi-download"></i></a>
                                                </div>
                                            </div>
                                            <!-- row 2 -->

                                            <hr />

                                            <!-- table part -->
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"><span style="font-size: 16px;">Selected
                                                                Items:</span></th>

                                                        <th scope="col"><span style="font-size: 16px;">Quantity</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <th scope="row"><span
                                                                    style="font-weight: 500;">{{ $order->product()->withTrashed()->first()->product_name ?? $order->product->product_name }}</span>
                                                            </th>
                                                            <td>{{ $order->quantity }} item</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- table end -->

                                            <div style="background-color: #e3ebf6;border-radius:10px">
                                                <p style="color:#004aad;padding:40px;text-align:center">You get Discount of
                                                    {{ $item->shop->offers()->withTrashed()->first()->offer_name ?? $item->shop->offers->offer_name }} on purchase of listed item for
                                                    this
                                                    shop</p>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top:20px" class="col"><span
                                                        style="font-size: 22px;font-weight:bold">Shop Details:</span></div>

                                            </div>
                                            <!-- row 1 -->
                                            <!-- row 2 -->
                                            <div class="row">

                                                <div style="margin-top: 20px;" class="col-lg-4"><span
                                                        style="font-size: 18px;font-weight:600; white-space:nowrap;">{{ $item->shop->name }}</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-12">
                                                    {{ Auth::guard('shop_owner')->user()->name }}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-12">
                                                    {{ $item->shop->mobile }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-4">{{ $item->shop->email }}
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div style="margin-top: 10px;" class="col-lg-8">
                                                    {{ $item->shop->address }}</div>

                                            </div>
                                            <!-- row 2 -->

                                        </div>
                                        <div class="modal-footer">
                                            @if ($item->status)
                                                <div style="margin-top: 10px;margin-bottom:20px;display:flex;justify-content:flex-center"
                                                    class="col-lg-12"> <button style="color:white;width:100%"
                                                        type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#confirmation" disabled>Purchased </button></div>
                                            @else
                                                <div style="margin-top: 10px;margin-bottom:20px;display:flex;justify-content:flex-center"
                                                    class="col-lg-12"> <button
                                                        style="background-color:#004aad;color:white;width:100%"
                                                        type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#confirmation">Proceed </button></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- pop up end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 10000 // Set the time duration for the alert to automatically close (in milliseconds)
                });
            });
        </script>
    @endif
@endsection --}}

@section('style')
    <style>
        .card2 {
            width: 800px;
            border-color: blue;
        }

        .unishopt {
            padding-left: 5px;
            padding-top: 7px;
            font-size: 18px;

        }

        @media only screen and (max-width: 600px) {
            .unishopt {
                padding-left: 5px;
                font-size: 18px;
                text-align: center;
            }
        }

        .unishopp {
            padding-left: 5px;
            font-size: 12px
        }

        @media only screen and (max-width: 600px) {
            .unishopp {
                padding-left: 5px;
                font-size: 12px;
                text-align: center;
            }
        }

        .input-box {
            position: relative;
            height: 60px;
            max-width: 600px;
            width: 100%;
            background: #fff;
            margin: 0 20px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .input-box i,
        .input-box .button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .input-box i {
            left: 20px;
            font-size: 30px;
            color: #707070;
        }

        .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 18px;
            font-weight: 400;
            border: none;
            padding: 0 155px 0 65px;
            background-color: transparent;
        }

        .input-box .button {
            right: 20px;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            background-color: #5627ff;
            cursor: pointer;
        }

        .input-box .button:active {
            transform: translateY(-50%) scale(0.98);
        }

        /* Responsive */
        @media screen and (max-width: 500px) {
            .input-box {
                height: 66px;
                margin: 0 8px;
            }

            .input-box i {
                left: 12px;
                font-size: 25px;
            }

            .input-box input {
                padding: 0 112px 0 50px;
            }

            .input-box .button {
                right: 12px;
                font-size: 14px;
                padding: 8px 18px;
            }
        }
    </style>
@endsection
@section('script')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endsection
