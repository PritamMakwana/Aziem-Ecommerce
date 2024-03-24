@extends('frontend.layouts.app')
@section('content')
    @include('frontend.customer.upload_receipt', [
        'shop' => $shop,
        'customer' => Auth::guard('customer')->user()->id,
    ])
    <div class="container">
        <div style="padding: 10px;">
            <h5><a style="color: black" href="{{ url('Stores') }}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></h5>
        </div>
        <div>
            <h2 style="text-align: center;">Your Receipts</h2>

        </div>

        <div style="display: flex;justify-content:center">
            <div class="card2">
                <div style="margin:20px;border-color:#004aad;border-radius:10px" class="card">
                    <h5 style="padding-top:20px;padding-left:30px;padding-right:20px;">Upload Your purchased receipts & Get
                        discount..!</h5>
                    <p style="padding-top:0px;padding-left:30px;padding-right:20px;color:#676767">If You have any receipts
                        from
                        registered shops then you can upload it here & get discounts accordingly</p>
                    <div style="padding:20px;display:flex;justify-content:center"><button
                            style="background-color: #5500ff;border-color:#5500ff;" type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#upload">Upload
                            Receipts</button></div>
                </div>
            </div>

        </div>
        <div class="container">
            <div style="margin-top: 40px;">
                <!-- card -->
                <div style="display:flex;justify-content:center">
                    <div  class="row">
                        @foreach ($paginatedOrders as $groupKey => $orders)
                            @php
                                $item = $orders->first(); // Get the first order in the group
                            @endphp
                            <div class="col-lg-4" style="margin-top: 20px;margin-bottom:10px;">
                                <div class="card" style="border-radius:12px; padding:0px; width:auto;">
                                    <div style="margin:10px;background-color:#ebf1f8;border-radius:8px" >
                                        <div class="row">
                                            <div style="margin:10px;display:flex;justify-content:center;" class="col-lg-3">
                                                <img class="shop_image"
                                                    style="padding-top:10px; padding-right:8px; padding-left:15px; padding-bottom:10px; border-radius: 20px;"
                                                    {{-- src="{{ asset('Shop_images/' . $item->shop->image) }}" width="auto"
                                                    height="100px" /> --}}
                                                     src="{{ asset('Shop_images/' . $item->shop->image) }}" width="auto"
                                                    height="100px" />
                                            </div>
                                            <div style="text-align: center;" class="col-lg-5 text-break">
                                                <h5 class="unishopt">{{ $item->shop->name }}</h5>
                                                <p class="unishopp">{{ $item->shop->address }}</p>
                                            </div>
                                            <div class="col-lg-3 " >
                                                <div class="p-btn-cen" style="display: flex;justify-content:center; margin-top:15px;">
                                                    @if ($item->status)
                                                        <button
                                                            style="background-color: #a0ffe3;border-color:#a0ffe3;color:black;font-size:12px;margin-top:10px;margin-bottom:5px;
                                                            margin-right:27px;"
                                                            type="button" class="btn btn-primary">Purchased</button>
                                                    @else
                                                        <button
                                                            style="background-color: #f4a108;border-color:#f4a108;color:black;font-size:12px;margin-top:10px;margin-bottom:5px;
                                                            margin-right:20px;"
                                                            type="button" class="btn btn-primary">Pending</button>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- second row start -->
                                    <!-- table part -->
                                    <div style="padding: 20px; height:170px;">
                                        <table class="table table-sm">
                                            <tbody>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($orders as $order)
                                                    @if ($count > 2)
                                                        <tr>
                                                            <th scope="row">....</th>
                                                            <td>....</td>
                                                        </tr>
                                                    @break

                                                @else
                                                    <tr>
                                                        <th scope="row"><span
                                                                style="font-weight: 500;">{{ $order->product()->withTrashed()->first()->product_name ?? $order->product->product_name }}</span>
                                                        </th>
                                                        <td>{{ $order->quantity }} item</td>
                                                    </tr>
                                                @endif
                                                @php
                                                    $count++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- table end -->
                                <!-- third row -->
                                <div class="row d-flex justify-content-between mb-3 " style="margin:3px;">
                                    <div class="w-50 d-flex justify-content-strat d-flex align-items-center">
                                        <span
                                            style="color:#2162b8">{{ date('d-M-Y', strtotime($item->created_at)) }}</span>
                                    </div>
                                    <div  class="w-50 d-flex justify-content-end  ">
                                        <a href="{{ route('generate-receipt', ['order_id' => $item->order_id]) }}"
                                            style="background-color:#e0e9f5;color:#004aad;" type="button"
                                            class="btn btn-primary">Receipt<i style="padding-left: 4px;"
                                                class="bi bi-download"></i></a>
                                    </div>
                                </div>
                                <!-- third row end-->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- card end -->

            <!-- Pagination Links -->
            @if ($paginatedOrders->hasPages())
                <div style="display: flex; justify-content: center; margin-top: 4rem;">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($paginatedOrders->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $paginatedOrders->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif

                            @for ($i = 1; $i <= $paginatedOrders->lastPage(); $i++)
                                <li class="page-item{{ $paginatedOrders->currentPage() == $i ? ' active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $paginatedOrders->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if ($paginatedOrders->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $paginatedOrders->nextPageUrl() }}">Next</a>
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
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .unishopt {
        padding-left: 5px;
        padding-top: 7px;
        font-size: 18px;
    }

    @media only screen and (max-width: 600px) {
        .status_button {
            padding-right: 50px;
        }
    }

    @media only screen and (max-width: 600px) {

        .unishopt,
        .unishopp {
            display: flex;
            justify-content: center;
            margin-left: 20px;
            font-size: 18px;
            text-align: center;
        }
    }

    .shop_image {
        width: 100px;
        height: 100px;
        padding: 12px;
    }

    @media only screen and (max-width: 600px) {
        .shop_image {
            width: 100% !important;
            height: auto !important;;
            padding: 10px;
        }
    }

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

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                text: 'You will be notified once admin approves your receipt',
                showConfirmButton: false,
                timer: 5000 // Set the time duration for the alert to automatically close (in milliseconds)
            });
        });
    </script>
@endif
@endsection
