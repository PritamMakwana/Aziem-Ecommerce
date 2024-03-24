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
                            <h2 class="">List Of All Enquiry</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto; max-width: 100%;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone no.</th>
                                        <th>Message</th>
                                        <th class="text-center" style="width: 8%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($data) > 0)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($data as $eq)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $eq->name }}</td>
                                        <td>{{ $eq->email }}</td>
                                        <td>{{ $eq->phone }}</td>
                                        <td class="description-cell">
                                            <div class="truncate-text">{{$eq->message}}</div>
                                            <div class="full-text">{{$eq->message}}</div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary m-1" href="mailto::{{$eq->email}}" role="button"><i class="fas fa-envelope"></i></a>
                                            <a class="btn btn-danger m-1" id="fdelete" href="{{route('enquiry.delete',$eq->id)}}" role="button"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">No Enquiry Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <!-- Pagination Links -->




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
