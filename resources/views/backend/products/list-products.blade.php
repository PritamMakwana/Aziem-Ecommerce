@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 2%;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="">List Of All Products</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                                <div>
                                    @if (request()->has('view_deleted'))
                                        <a href="{{ url('list-products') }}" class="btn btn-primary">
                                            <i class="fa fa-arrow-left"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">All Products</span>
                                        </a>
                                        @if (count($products) > 0)
                                            <a href="{{ url('delete-all-product') }}" class="btn btn-danger" id="delete_all"
                                                style="float: right;">
                                                <i class="fa fa-trash"></i>
                                                <span style="font-family: 'Source Sans Pro', sans-serif;">Empty Trash</span>
                                            </a>
                                            <a href="{{ url('restore-all-product') }}" class="btn btn-success"
                                                style="float: right; margin-right:10px;">
                                                <i class="fa fa-history"></i>
                                                <span style="font-family: 'Source Sans Pro', sans-serif;">Restore All</span>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ url('add-product') }}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">Add Product</span>
                                        </a>
                                        <a href="{{ route('list-products', ['view_deleted' => 'DeletedProducts']) }}"
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
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Shop Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th class="text-center" style="width: 8%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($products) > 0)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($products as $prod)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td><img src="{{ asset('Product_images/' . $prod->image) }}"
                                                            width="30" height="30"></td>
                                                    <td>{{ $prod->product_name }}</td>
                                                    <td>{{ $prod->category()->withTrashed()->first()->name ?? $prod->category->name }}
                                                    </td>
                                                    <td>{{ $prod->shop()->withTrashed()->first()->name ?? $prod->shop->name }}
                                                    </td>
                                                    <td>{{ $prod->description }}</td>
                                                    <td class="text-center">{{ $prod->quantity_available }}</td>
                                                    <td class="text-center">
                                                        @if (request()->has('view_deleted'))
                                                            <div class="action-buttons">
                                                                <a href="{{ url('restore-product/' . $prod->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-history"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('force-delete-product/' . $prod->id) }}"
                                                                    class="action-button" id="fdelete"
                                                                    style="margin-right: 10px;">
                                                                    <i class="fa fa-trash"
                                                                        style="font-size:20px;color:red"></i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="action-buttons">
                                                                <a href="{{ url('edit-product/' . $prod->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-edit"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('delete-product/' . $prod->id) }}"
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
                                                <td colspan="8" class="text-center">No Products Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                    <!-- Pagination Links -->



                    @if($pagi == true)

                    @if ($products->hasPages())
                    <div style="display: flex; justify-content: center; margin-top: 4rem;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if ($products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
                                </li>
                                @endif

                                @php
                                // Calculate the total number of pages
                                $totalPages = ceil($products->total() / $products->perPage());
                                @endphp

                                @for ($i = 1; $i <= $totalPages; $i++) <li
                                    class="page-item{{ $products->currentPage() == $i ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor

                                    @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
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
