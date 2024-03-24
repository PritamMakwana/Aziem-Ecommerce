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
                            <h3 class="card-title">Update Offer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ url('update-offer') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $fetch->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Offer</label>
                                    <input type="text" class="form-control @error('offer') is-invalid @enderror"
                                        id="name" name="offer" placeholder="Enter Offer in Riyal" value="{{ $offer_number }}"
                                        onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">

                                    @error('offer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
