@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary" style="margin-top: 2%">
                            <div class="card-header">
                                @if(isset($customer))
                                <h3 class="card-title">Add Riyal for {{ $customer->first_name }}</h3>
                                @else
                                <h3 class="card-title">Add All Riyal</h3>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($customer))
                            <form method="POST" action="{{ url('insert-offer/' . $customer->id) }}">
                                @else
                                <form method="POST" action="{{ url('insert-offer-all') }}">
                                @endif

                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="offer">Offer</label>
                                        <input type="number" class="form-control @error('offer') is-invalid @enderror"
                                            id="offer" name="offer" placeholder="Enter Offer"
                                            value="{{ old('offer') }}">

                                        @error('offer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
