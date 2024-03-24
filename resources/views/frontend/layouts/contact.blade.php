@extends('frontend.layouts.app')
@section('content')
    <!-- heading start -->
    <div class="container">
        <div style="margin-top: 20px;" class="row">
            <div class="col-lg-4">
                <div> <a href="{{ url('/Stores') }}" style="font-weight: bold;color:black;font-size:20px;"><i
                            style="font-size:20px;" class="bi bi-arrow-left-circle"></i> Back</a></div>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div style="display: flex;justify-content:center;padding:10px;margin-top:40px">
                    <h1 style="font-weight: bold;"> </h1>
                </div>
                <p style="text-align: center;font-size:25px;font-weight:500"> </p>
            </div>

        </div>

    </div>
    <!-- heading end -->

    <div style="  box-shadow: 0 0 15px -2px #444444;;border-radius:20px" class="container">
        <h2 style="text-align:center;color:#004AAD;padding-top:20px;font-weight:bold">Contact Us</h2>
        <p style="font-size: 26px;color:#407bffff;text-align:center"> For projects and commercial companies</p>

        <div class="row">
            <div class="col-lg-6">
                <img style="width: 100%;height:auto;padding:20px"
                    src="{{ asset('frontend/contactus/images/image 41.png') }}" />
            </div>
            <div class="col-lg-6">
                <div style="padding: 20px;margin-top:50px">
                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contact_no">Contact No.</label>
                            <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                                id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
                            @error('contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="display: flex; justify-content: center">
                            <button
                                style="background-color: #5627ffff; border-color: #5627ffff; width: 70%; font-size: 17px"
                                type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <div class="container">
        <div style="border: 1px solid #004AAD;border-radius:10px;margin:0px;margin-top:30px;margin-bottom:30px;">
            <h2 style="text-align:center;color:#004AAD;padding-top:20px">About HikayatAlref</h2>
            <p
                style="text-align:center;padding-left:30px;padding-right:30px;padding-top:20px;padding-bottom:20px;font-weight:600">
                Countryside Story Trading Est provides integrated services for projects and commercial companies. It was
                established in the city of Al-Khobar, Kingdom of Saudi Arabia, according to the system of trading commercial
                in Saudi Arabia. It works to provide consultancy and integrated development solutions
                (marketing/financial/administrative) in the Kingdom of Saudi Arabia and the Arab world, and to provide
                marketing and development plans with Implementation within a trained staff for these tasks, and the company
                methodology is adopted to achieve guaranteed and satisfactory results for customers and reward individuals
                by giving them offers and gifts equal to what was purchased from the shops that fall within the participants
                in the marketing plans of the company.</p>
        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    text: 'You will hear from us soon',
                    showConfirmButton: false,
                    timer: 5000 // Set the time duration for the alert to automatically close (in milliseconds)
                });
            });
        </script>
    @endif
@endsection
