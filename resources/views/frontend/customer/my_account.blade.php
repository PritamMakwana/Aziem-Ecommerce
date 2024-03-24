@extends('frontend.layouts.app')
@section('content')
    <div>
        <div style="background-color: #ebf1f8;">
            <div class="container">
                <div style="padding: 10px;">
                    <h5><a href="{{ url('Stores') }}" style="color: black"><i class="bi bi-arrow-left-circle-fill"></i>
                            Back</a></h5>
                </div>


                <div style="display: flex;justify-content:center;padding-top:40px;padding-bottom:60px">
                    <div class="card2">
                        <div style="margin:20px;border-color:none;border-radius:10px" class="car">
                            <div style="display: flex;justify-content:center"><img
                                    src="{{ asset('Customer_images/' . $details->profile_image) }}" height="120px"
                                    width="120px" style="margin:20px;border-color:none;border-radius:100px" /></div>
                            <h5 style="padding-top:20px;padding-left:30px;padding-right:20px;text-align:center">Customer ID
                                :
                                <span style="font-weight:bold;">{{ $details->customer_id }}</span>
                            </h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- form section -->
        <div style="padding: 20px;" class="container">
            <h2>Account Details</h2>
            <br>
            <br>
            <form action="{{ url('update-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $details->id }}">
                <div class="form-group style="padding: 15px;">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        id="first_name" value="{{ $details->first_name }}" placeholder="Your First Name">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        id="last_name" value="{{ $details->last_name }}" placeholder="Your Last Name">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="register-email" value="{{ $details->email }}"
                        class="form-control is-invalid" id="" placeholder="Enter your email" disabled>
                    <span class="invalid-feedback" role="alert">
                        <strong>You cannot change your email address</strong>
                    </span>
                </div>
                <div class="form-group">
                    <label for="mobile">Phone</label>
                    <input type="tel" name="mobile" value="{{ $details->mobile }}"
                        class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                        placeholder="Enter your phone number">
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                        placeholder="Enter your address">{{ $details->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control  @error('gender') is-invalid @enderror" name="gender" id="gender"
                        required>
                        <option selected value="{{ $details->gender }}">{{ $details->gender }}</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profile_image">Profile Picture</label>
                    <input type="file" name="profile_image"
                        class="form-control @error('profile_image') is-invalid @enderror" id="profile_image">
                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div style="display: flex;justify-content:center; padding:20px;">
                    <button style="margin: 15px;width:180px;background-color:#5627ff;border-color:#5627ff" type="submit"
                        class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
        <!-- form end -->
    </div>
@endsection
