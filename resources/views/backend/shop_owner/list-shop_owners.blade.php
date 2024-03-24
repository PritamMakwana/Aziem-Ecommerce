@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 2%;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="">List Of All Shop Owners</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                            <div>
                                @if (request()->has('view_deleted'))
                                <a href="{{ url('list-shop_owners') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">All Shop Owners</span>
                                </a>
                                @if (count($data) > 0)
                                <a href="{{ url('delete-all-shop-owners') }}" class="btn btn-danger " id="delete_all"
                                    style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Empty Trash</span>
                                </a>
                                <a href="{{ url('restore-all-shop-owners') }}" class="btn btn-success"
                                    style="float: right; margin-right:10px;">
                                    <i class="fa fa-history"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Restore All</span>
                                </a>
                                @endif
                                @else
                                {{-- <a href="{{ url('add-customer') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Add Customer</span>
                                </a> --}}
                                <a href="{{ route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners']) }}"
                                    class="btn btn-danger" style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Trash</span>
                                </a>
                                @endif
                            </div><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width:100%">Images</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Nationality</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th style="white-space: nowrap;">Shop Name</th>
                                        <th style="white-space: nowrap;">Shop Category</th>
                                        <th>CR Number</th>
                                        <th>Offer</th>
                                        <th>Access</th>
                                        @if (!request()->has('view_deleted'))
                                        <th style="width:20%;">Status</th>
                                        @endif

                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($data as $so)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img src="{{ asset('Shop_images/' . $so->images) }}" width="30" height="30">
                                        </td>
                                        <td>{{ $so->name }}</td>
                                        <td>{{ $so->email }}</td>
                                        <td>{{ $so->phone }}</td>
                                        <td>{{ $so->nationality }}</td>
                                        <td>{{ $so->city }}</td>
                                        <td>{{ $so->address }}</td>
                                        <td>{{ $so->shop_name }}</td>
                                        <td>{{ $so->category->name }}</td>
                                        <td>{{ $so->cr_number }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $so->offers()->withTrashed()->first()->offer_name ??
                                            $so->offers->offer_name }}
                                        </td>
                                        <td><a
                                            href="{{url('shop_hold/' . $so->id) }}"
                                            style="padding: 10px; border:2px; font-size:12px; white-space:nowrap; width:100%;"
                                            class="{{ $so->hold ? 'btn btn-danger' : 'btn btn-success' }}">{{
                                            $so->hold ? 'Hold' : 'Not Hold' }}</a>
                                        </td>

                                        @if (!request()->has('view_deleted'))
                                        <td><a id="{{ $so->approved ? '' : 'approve' }}"
                                                href="{{ $so->approved ? '#' : url('approve-so/' . $so->id) }}"
                                                style="padding: 10px; border:2px; font-size:12px; white-space:nowrap; width:100%;"
                                                class="{{ $so->approved ? 'btn btn-success' : 'btn btn-danger' }}">{{
                                                $so->approved ? 'Approved' : 'Not Approved' }}</a>
                                        </td>
                                        @endif

                                        <td class="text-center">
                                            @if (request()->has('view_deleted'))
                                            <div class="action-buttons">
                                                <a href="{{ url('restore-shop-owner/' . $so->id) }}"
                                                    class="action-button" style="margin-right: 10px;">
                                                    <i class="fa fa-history"
                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                </a>
                                                <a href="{{ url('force-delete-shop-owner/' . $so->id) }}"
                                                    class="action-button" id="fdelete" style="margin-right: 10px;">
                                                    <i class="fa fa-trash" style="font-size:20px;color:red"></i>
                                                </a>
                                            </div>
                                            @else
                                            <div class="action-buttons">
                                                {{-- <a href="{{ url('edit-customer/' . $cust->id) }}"
                                                    class="action-button" style="margin-right: 10px;">
                                                    <i class="fa fa-edit"
                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                </a> --}}
                                                <a href="{{ url('delete-shop-owner/' . $so->id) }}" id="delete"
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
                                        <td colspan="14" class="text-center">No Shop Owners Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

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


                        <!-- /.card-body -->
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
