@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top: 2%;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="">List Of Job Registration</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow-x: auto; max-width: 100%;">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Nationality</th>
                                        <th>Specialization</th>
                                        <th>Gender</th>
                                        <th class="text-center">Download CV</th>

                                        {{-- <th style="width: 70%;">Name</th>
                                        <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($data as $job)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->email }}</td>
                                        <td>{{ $job->mobile }}</td>
                                        <td>{{ $job->nationality }}</td>
                                        <td>{{ $job->specialization }}</td>
                                        <td>{{ $job->gender }}</td>
                                        {{-- <td>{{ $job->cv_file }}</td> --}}
                                        <td class="text-center"><a href="{{ url('/job/download/' . $job->id) }}" ><i  class="fa fa-download"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Job Registration Found</td>
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
