@extends('frontend.layouts.app')
@section('content')
<!-- section 1 start -->
<div style="background-color: #f4f7ff;">
    <div class="container">
        <div style="padding: 10px;padding-top:2rem">
            <h5><a style="color: black" href="{{ url('/so-home/' . $so) }}"><i class="bi bi-arrow-left-circle-fill"></i>
                    Back</a></h5>
        </div>
        <div>
            <h1 style="text-align: center;"><span style="color: #407bff;">Order</span> List</h1>
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                <!-- search row start -->
                <div style="display: flex;justify-content:center;margin-top:4rem;padding-bottom:4rem" class="row">
                    {{-- <div class="col-lg-2"></div> --}}
                    <div style="display: flex;justify-content:flex-center;margin-top:1rem;" class="col-lg-4">
                        <div class="input-box search-bar-order">
                            <i style="color: blue;padding-bottom:5px;margin-left:10px;font-size:20px;" class="bi bi-search"></i>
                            <input type="text" id="searchInput" placeholder="Search here..." />
                        </div>
                    </div>

                    <div style="display: flex;justify-content:center;margin-top:1rem;margin-right:10px;" class="col-10 col-sm-4  col-lg-2">
                        <div style="display:flex;justify-content:flex-end;background-color: white !important;"
                            class="col-lg-12 order-list-icon-s">
                            <select name="status"
                                type="button" class="btn btn-primary order-list-search-s" style="text-align: center" >

                                <option value="" {{ !isset($selectedStatus) ? 'selected' : '' }}> Status</option>
                                <option value="0" {{ isset($selectedStatus) && $selectedStatus==='0' ? 'selected' : ''
                                    }}> Pending
                                </option>
                                <option value="1" {{ isset($selectedStatus) && $selectedStatus==='1' ? 'selected' : ''
                                    }}> Purchased
                                </option>
                            </select>
                            <i style="font-size: 30px;margin-top:4px;margin-right:25%;" class="bi bi-filter"></i>
                        </div>
                    </div>

                    <div style="display: flex;justify-content:center;margin-top:1rem;" class="col-10 col-sm-4  col-lg-2">
                        <div  style="display:flex;justify-content:flex-end;background-color: white !important;"
                             class=" col-lg-12 order-list-icon">
                            <select name="sort_date"  type="button" class="btn btn-primary order-list-search" >
                                <option value="" {{ !isset($selectedDateRange) ? 'selected' : '' }}>Date</option>
                                <option value="today" {{ isset($selectedDateRange) && $selectedDateRange==='today'
                                    ? 'selected' : '' }}>
                                    Today</option>
                                <option value="last_7_days" {{ isset($selectedDateRange) &&
                                    $selectedDateRange==='last_7_days' ? 'selected' : '' }}>
                                    Last 7 days</option>
                                <option value="this_month" {{ isset($selectedDateRange) &&
                                    $selectedDateRange==='this_month' ? 'selected' : '' }}>
                                    This Month</option>
                                <option value="last_month" {{ isset($selectedDateRange) &&
                                    $selectedDateRange==='last_month' ? 'selected' : '' }}>
                                    Last Month</option>

                            </select>
                            <i style="font-size: 30px;margin-top:4px;margin-right:25%;" class="bi bi-filter"></i>
                        </div>
                    </div>

                    <div class="col-lg-2 d-flex align-items-center" style="display: flex;justify-content:center;margin-top:1rem">
                        <button
                            style="border-radius: 12px !important;padding:12px 20px;font-weight: 600;font-size: 14px;"
                            class="button btn btn-primary" type="submit">SEARCH</button>
                    </div>



                </div>
                <!-- search row end -->
            </form>

        </div>
    </div>
</div>
<!-- section 2 end -->

<div class="container">
    <div style="margin-top: 40px;">
        <!-- card -->
        <div>
            <div class="row">
                @foreach ($paginatedOrders as $groupKey => $orders)
                @php
                $item = $orders->first(); // Get the first order in the group
                @endphp
                <div class="col-lg-4" style="margin-top: 20px; margin-bottom:10px;">
                    <div class="card" style="border-radius:12px; padding:0px; width:22rem;">
                        <div style="margin:10px;background-color:#ebf1f8;border-radius:8px">
                            <div class="row">
                                <div style="margin:10px;display:flex;justify-content:center" class="col-lg-3">
                                    <img class="shop_image"
                                        style="padding-top:10px; padding-right:8px; padding-left:15px; padding-bottom:10px; border-radius: 20px;"
                                        src="{{ asset('Shop_images/' . $item->shop->image) }}">
                                </div>
                                <div style="padding:2px;" class="col-lg-5">
                                    <a style="color: black; white-space:nowrap; text-align:center;"
                                        href="{{ url('shop-receipt/' . $item->order_id) }}" class="unishopt">{{
                                        $item->shop->name }}</a>
                                    <p class="unishopp">{{ $item->shop->address }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <div class="p-btn-cen"
                                        style="display: flex;justify-content:center; margin-top:15px;">
                                        @if ($item->status)
                                        <button
                                            style="background-color: #a0ffe3;border-color:#a0ffe3;color:black;font-size:12px;margin-top:10px;margin-bottom:5px; margin-right:20px;"
                                            type="button" class="btn btn-primary">Purchased</button>
                                        @else
                                        <button
                                            style="background-color: #f4a108;border-color:#f4a108;color:black;font-size:12px;margin-top:10px;margin-bottom:5px;margin-right:20px;"
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
                                        <th scope="row"><span style="font-weight: 500;">{{
                                                $order->product()->withTrashed()->first()->product_name ??
                                                $order->product->product_name }}</span>
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
                        <div class="row d-flex justify-content-between mb-3 ms-2 me-2">
                            <div class="w-50 d-flex justify-content-strat d-flex align-items-center"><span
                                    style="color:#2162b8">{{ date('d-M-Y', strtotime($item->created_at)) }}</span>
                            </div>
                            <div class="w-50 d-flex justify-content-end"> <a
                                    href="{{ route('generate-shop-receipt', ['order_id' => $item->order_id]) }}"
                                    style="background-color:#e0e9f5;color:#004aad" type="button"
                                    class="btn btn-primary">Receipt <i style="padding-left: 4px;"
                                        class="bi bi-download"></i></a></div>
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
                            <a class="page-link" href="{{ $paginatedOrders->url($i) }}">{{ $i }}</a>
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
@endsection

@section('script')
@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000 // Set the time duration for the alert to automatically close (in milliseconds)
            });
        });
</script>
@endif

<script>
    $(document).ready(function() {
        const searchInput = $('#searchInput');
        const cards = $('.card'); // Assuming each card has the 'card' class

        searchInput.on('input', function() {
            const searchText = searchInput.val().toLowerCase().trim();

            cards.each(function() {
                const cardText = $(this).text().toLowerCase();

                if (cardText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
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
            width: auto;
            height: auto;
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
