@extends('backend.layouts.app')

@section('style')
<style>
    .truncate-text {
        max-width: 200px;
        /* Adjust the width as needed */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition-delay: 1s;
    }

    .full-text {
        display: none;
    }

    .description-cell:hover .truncate-text {
        display: none;
    }

    .description-cell:hover .full-text {
        display: inline;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 2%;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="">List Of All Orders</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                            <div>
                                @if (request()->has('view_deleted'))
                                <a href="{{ url('list-confirm-order') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">All Orders</span>
                                </a>
                                @if (count($data) > 0)
                                <a href="{{ url('delete-all-confrim-orders') }}" class="btn btn-danger" id="delete_all"
                                    style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Empty Trash</span>
                                </a>
                                <a href="{{ url('restore-all-confrim-orders') }}" class="btn btn-success"
                                    style="float: right; margin-right:10px;">
                                    <i class="fa fa-history"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Restore All</span>
                                </a>
                                @endif
                                @else
                                {{-- <a href="{{ url('add-category') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Add Category</span>
                                </a> --}}
                                <a href="{{ route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder']) }}"
                                    class="btn btn-danger" style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Trash</span>
                                </a>
                                @endif
                            </div><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>ID</th> --}}
                                        <th>Order Id</th>
                                        <th>Customer Id</th>
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Quantity</th>
                                        <th>Discount Riyal</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>

                                        {{-- <th style="width: 70%;">Name</th> --}}
                                        <th class="text-center" style="width: 8%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($data) > 0)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($data as $ctr)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        {{-- <td>{{ $ctr->id }}</td> --}}
                                        <td>{{ $ctr->order_id }}</td>
                                        <td>{{ $ctr->customer()->withTrashed()->first()->customer_id ??
                                            $ctr->customer->customer_id}}</td>
                                        <td>{{
                                            $ctr->customer()->withTrashed()->first()->first_name." ".
                                            $ctr->customer()->withTrashed()->first()->last_name ??
                                            $ctr->customer->first_name." ".$ctr->customer->last_name}}</td>
                                        <td>{{
                                            $ctr->product()->withTrashed()->first()->product_name ??
                                            $ctr->product->product_name}}</td>

                                        <td class="description-cell">
                                            <div class="truncate-text">{{
                                                $ctr->product()->withTrashed()->first()->description ??
                                                $ctr->product->description}}</div>
                                            <div class="full-text">{{
                                                $ctr->product()->withTrashed()->first()->description ??
                                                $ctr->product->description}}</div>
                                        </td>
                                        <td>{{ $ctr->quantity }}</td>
                                        <td>{{ $ctr->discount_amount }}</td>
                                        <td>{{ $ctr->total_amount }}</td>
                                        <td>{{ $ctr->created_at }}</td>



                                        <td class=" text-center">
                                            @if (request()->has('view_deleted'))
                                            <div class="action-buttons">
                                                <a href="{{ url('restore-confrim-order/' . $ctr->id) }}"
                                                    class="action-button" style="margin-right: 10px;">
                                                    <i class="fa fa-history"
                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                </a>
                                                <a href="{{ url('force-delete-confrim-order/' . $ctr->id) }}"
                                                    class="action-button" id="fdelete" style="margin-right: 10px;">
                                                    <i class="fa fa-trash" style="font-size:20px;color:red"></i>
                                                </a>
                                            </div>
                                            @else
                                            <div class="action-buttons">
                                                <a href="{{ url('delete-confrim-order/' . $ctr->id) }}" id="delete"
                                                    class="action-button">
                                                    <i class="fa fa-trash" style="font-size:20px;color:red"></i>
                                                </a>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center">No Order Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- Pagination Links -->



                        @if($pagi == true)

                        @if ($data->hasPages())
                        <div style="display: flex; justify-content: center; margin-top: 4rem;">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    @if ($data->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                                    </li>
                                    @endif

                                    @php
                                    // Calculate the total number of pages
                                    $totalPages = ceil($data->total() / $data->perPage());
                                    @endphp

                                    @for ($i = 1; $i <= $totalPages; $i++) <li
                                        class="page-item{{ $data->currentPage() == $i ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                        </li>
                                        @endfor

                                        @if ($data->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
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

                        @endif




                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection
