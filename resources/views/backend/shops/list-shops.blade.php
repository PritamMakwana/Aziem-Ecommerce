@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 2%;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="">List Of All Shops</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                                <div>
                                    @if (request()->has('view_deleted'))
                                        <a href="{{ url('list-shops') }}" class="btn btn-primary">
                                            <i class="fa fa-arrow-left"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">All Shops</span>
                                        </a>
                                        @if (count($query) > 0)
                                            <a href="{{ url('delete-all-shop') }}" class="btn btn-danger" id="delete_all"
                                                style="float: right;">
                                                <i class="fa fa-trash"></i>
                                                <span style="font-family: 'Source Sans Pro', sans-serif;">Empty Trash</span>
                                            </a>
                                            <a href="{{ url('restore-all-shop') }}" class="btn btn-success"
                                                style="float: right; margin-right:10px;">
                                                <i class="fa fa-history"></i>
                                                <span style="font-family: 'Source Sans Pro', sans-serif;">Restore All</span>
                                            </a>
                                        @endif
                                    @else
                                        {{-- <a href="{{ url('add-shop') }}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">Add Shop</span>
                                        </a> --}}
                                        <a href="{{ route('list-shops', ['view_deleted' => 'DeletedShops']) }}"
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
                                            <th>Image</th>
                                            <th>Shop Owner</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th class="text-center">Status</th>
                                            <th>Mobile</th>
                                            <th>Offer</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($query) > 0)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($query as $shp)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td><img src="{{ asset('Shop_images/' . $shp->image) }}" width="30"
                                                            height="30"></td>
                                                    <td>{{ $shp->shop_owner->name }}</td>
                                                    <td>{{ $shp->name }}</td>
                                                    <td>{{ $shp->category()->withTrashed()->first()->name ?? $shp->category->name }}
                                                    </td>
                                                    <td>{{ $shp->address }}</td>
                                                    <td>{{ $shp->email }}</td>
                                                    <td class="text-center">
                                                        <label class="switch">
                                                            <input type="checkbox" class="status-toggle"
                                                                data-shop-id="{{ $shp->id }}"
                                                                @if ($shp->status) checked @endif>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>
                                                    <td>{{ $shp->mobile }}</td>
                                                    <td>{{$shp->offers()->withTrashed()->first()->offer_name ?? $shp->offers->offer_name }}</td>
                                                    <td class="text-center">
                                                        @if (request()->has('view_deleted'))
                                                            <div class="action-buttons">
                                                                <a href="{{ url('restore-shop/' . $shp->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-history"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('force-delete-shop/' . $shp->id) }}"
                                                                    class="action-button" id="fdelete"
                                                                    style="margin-right: 10px;">
                                                                    <i class="fa fa-trash"
                                                                        style="font-size:20px;color:red"></i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="action-buttons">
                                                                <a href="{{ url('edit-shop/' . $shp->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-edit"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('delete-shop/' . $shp->id) }}"
                                                                    id="delete" class="action-button">
                                                                    <i class="fa fa-trash"
                                                                        style="font-size:20px;color:red"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="11" class="text-center">No Shops Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                            @if($pagi == true)

                            @if ($query->hasPages())
                            <div style="display: flex; justify-content: center; margin-top: 4rem;">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        @if ($query->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                        @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $query->previousPageUrl() }}">Previous</a>
                                        </li>
                                        @endif

                                        @php
                                        // Calculate the total number of pages
                                        $totalPages = ceil($query->total() / $query->perPage());
                                        @endphp

                                        @for ($i = 1; $i <= $totalPages; $i++) <li
                                            class="page-item{{ $query->currentPage() == $i ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $query->url($i) }}">{{ $i }}</a>
                                            </li>
                                            @endfor

                                            @if ($query->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $query->nextPageUrl() }}">Next</a>
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
