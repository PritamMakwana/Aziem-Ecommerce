@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="margin-top: 2%;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="">List Of Uploaded Receipts</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                                {{-- <div>
                                    @if (request()->has('view_deleted'))
                                        <a href="{{ url('list-customers') }}" class="btn btn-primary">
                                            <i class="fa fa-arrow-left"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">All Customers</span>
                                        </a>
                                        @if (count($data) > 0)
                                            <a href="{{ url('delete-all-customers') }}" class="btn btn-danger"
                                                id="delete_all" style="float: right;">
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
                                        <a href="{{ url('add-customer') }}" class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">Add Customer</span>
                                        </a>
                                        <a href="{{ route('list-customers', ['view_deleted' => 'DeletedCustomers']) }}"
                                            class="btn btn-danger" style="float: right;">
                                            <i class="fa fa-trash"></i>
                                            <span style="font-family: 'Source Sans Pro', sans-serif;">Trash</span>
                                        </a>
                                    @endif
                                </div><br> --}}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="">Receipts</th>
                                            <th style="white-space: nowrap;">Shop Name</th>
                                            <th style="white-space: nowrap;">Customer Name</th>
                                            <th style="width:20%;">Status</th>
                                            {{-- <th class="text-center">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) > 0)
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($data as $rec)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <img id="receiptImg" alt="{{ $rec->receipt }}"
                                                            src="{{ asset('Receipts/' . $rec->receipt) }}" width="50"
                                                            height="50">
                                                    </td>
                                                    {{-- <td>{{ $rec->shop->name }}</td> --}}
                                                    <td>{{ $rec->shop()->withTrashed()->first()->name ?? $rec->shop->name }}
                                                    </td>
                                                    <td>
                                                        {{ $rec->customer->first_name }} {{ $rec->customer->last_name }}
                                                    </td>
                                                    <td><a id="{{ $rec->approved ? '' : 'approve-receipt' }}"
                                                            href="{{ $rec->approved ? '#' : url('approve-receipt/' . $rec->id) }}"
                                                            style="padding: 10px; border:2px; font-size:12px; white-space:nowrap; width:100%;"
                                                            class="{{ $rec->approved ? 'btn btn-success' : 'btn btn-danger' }}">{{ $rec->approved ? 'Approved' : 'Not Approved' }}</a>
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        @if (request()->has('view_deleted'))
                                                            <div class="action-buttons">
                                                                <a href="{{ url('restore-customer/' . $cust->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-history"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('force-delete-customer/' . $cust->id) }}"
                                                                    class="action-button" id="fdelete"
                                                                    style="margin-right: 10px;">
                                                                    <i class="fa fa-trash"
                                                                        style="font-size:20px;color:red"></i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="action-buttons">
                                                                <a href="{{ url('edit-customer/' . $cust->id) }}"
                                                                    class="action-button" style="margin-right: 10px;">
                                                                    <i class="fa fa-edit"
                                                                        style="font-size:20px;color:rgb(23, 239, 23)"></i>
                                                                </a>
                                                                <a href="{{ url('delete-customer/' . $cust->id) }}"
                                                                    id="delete" class="action-button">
                                                                    <i class="fa fa-trash"
                                                                        style="font-size:20px;color:red"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No Receipts Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

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

@section('style')
    <style>
        /* Style the Image Used to Trigger the Modal */
        #receiptImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #receiptImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("receiptImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endsection
