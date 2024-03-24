@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 2%;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="">List Of All Customers</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                            <div>
                                @if (request()->has('view_deleted'))
                                <a href="{{ url('list-customers') }}" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">All Customers</span>
                                </a>
                                @if (count($data) > 0)
                                <a href="{{ url('delete-all-customers') }}" class="btn btn-danger" id="delete_all"
                                    style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Empty Trash</span>
                                </a>
                                <a href="{{ url('restore-all-customer') }}" class="btn btn-success"
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
                                <a href="{{ route('list-customers', ['view_deleted' => 'DeletedCustomers']) }}"
                                    class="btn btn-danger" style="float: right;">
                                    <i class="fa fa-trash"></i>
                                    <span style="font-family: 'Source Sans Pro', sans-serif;">Trash</span>
                                </a>
                                <a href="{{ url('add-riyal-all/') }}"
                                    class="btn btn-success" style="margin-right: 10px;">
                                    <i class="fa fa-plus"
                                        style="font-size:15px;color:rgb(23, 239, 23); margin-right:4px;"></i>Add All Riyal
                                </a>
                                @endif
                            </div><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Offer</th>
                                        <th>Access</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($data as $cust)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img src="{{ asset('Customer_images/' . $cust->profile_image) }}" width="30"
                                                height="30"></td>
                                        <td>{{ $cust->first_name }}</td>
                                        <td>{{ $cust->last_name }}</td>
                                        <td>{{ $cust->email }}</td>
                                        <td>{{ $cust->mobile }}</td>
                                        <td>{{ $cust->address }}</td>
                                        <td>{{ $cust->gender }}</td>
                                        <td>SAR {{ $cust->offer }}</td>
                                        <td><a
                                            href="{{url('customer_hold/' . $cust->id) }}"
                                            style="padding: 10px; border:2px; font-size:12px; white-space:nowrap; width:100%;"
                                            class="{{ $cust->hold ? 'btn btn-danger' : 'btn btn-success' }}">{{
                                            $cust->hold ? 'Hold' : 'Not Hold' }}</a>
                                        </td>
                                        {{-- <td class="text-center"> --}}
                                            {{-- <a href="{{ url('add-riyal/' . $cust->id) }}" class="btn btn-success"
                                                style="margin-right: 10px;">
                                                <i class="fa fa-plus"
                                                    style="font-size:15px;color:rgb(23, 239, 23); margin-right:4px;"></i>Add
                                                Riyal
                                            </a> --}}
                                            {{-- </td> --}}
                                        <td class="text-center">
                                            @if (request()->has('view_deleted'))
                                            <div class="action-buttons">
                                                <a href="{{ url('restore-customer/' . $cust->id) }}"
                                                    class="action-button" style="margin-right: 10px;">
                                                    <i class="fa fa-history"
                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                </a>
                                                <a href="{{ url('force-delete-customer/' . $cust->id) }}"
                                                    class="action-button" id="fdelete" style="margin-right: 10px;">
                                                    <i class="fa fa-trash" style="font-size:20px;color:red"></i>
                                                </a>
                                            </div>
                                            @else
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <a href="{{ url('add-riyal/' . $cust->id) }}"
                                                        class="btn btn-success" style="margin-right: 10px;">
                                                        <i class="fa fa-plus"
                                                            style="font-size:15px;color:rgb(23, 239, 23); margin-right:4px;"></i>Add
                                                        Riyal
                                                    </a>
                                                </div>

                                                <div class="action-buttons">
                                                    {{-- <a href="{{ url('edit-customer/' . $cust->id) }}"
                                                        class="action-button" style="margin-right: 10px;">
                                                        <i class="fa fa-edit"
                                                            style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                    </a> --}}
                                                    <a href="{{ url('delete-customer/' . $cust->id) }}" id="delete"
                                                        class="action-button">
                                                        <i class="fa fa-trash" style="font-size:20px;color:red"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="10" class="text-center">No Customers Found</td>
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
