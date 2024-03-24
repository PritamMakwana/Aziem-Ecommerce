@extends('frontend.layouts.app')
@section('content')
    <div>

        <!-- section 1 start -->
        <div style="background-color: #f4f7ff;">
            <div class="container">
                <div style="padding: 10px;padding-top:2rem">
                    <h5><a style="color: black" href="{{ url('/so-home/' . $so) }}"><i
                                class="bi bi-arrow-left-circle-fill"></i>
                            Back</a></h5>
                </div>
                <div style="padding-bottom:50px;">
                    <h1 style="text-align: center;"><span style="color: #407bff;"> Customer </span> List </h1>


                </div>
            </div>
        </div>
        <!-- section 1 end -->

        <!-- section 2 start -->
        <div style="overflow-x:auto;margin-top:4rem" class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product List</th>
                        <th scope="col">Discount Amount</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Receipts ID</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($paginatedOrders as $groupKey => $orders)
                        @php
                            $item = $orders->first(); // Get the first order in the group
                        @endphp
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->customer->first_name }} {{ $item->customer->last_name }}</td>
                            <td>
                                @foreach ($orders as $item)
                                    {{ $item->product()->withTrashed()->first()->product_name ?? $item->product->product_name }}
                                    - {{ $item->quantity }} <br>
                                @endforeach
                            </td>
                            <td>{{ $item->discount_amount }} Riyals</td>
                            <td>{{ $item->total_amount }} Riyal</td>
                            <td> AZ - {{ $item->order_id }} <br>
                                <a href="{{ route('generate-shop-receipt', ['order_id' => $item->order_id]) }}"
                                    style="background-color:#e0e9f5;color:#004aad;margin:5px" type="button"
                                    class="btn btn-primary">Receipt <i class="bi bi-arrow-down"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- section 2 end -->

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
@endsection
