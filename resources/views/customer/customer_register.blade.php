<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div style="border-radius: 20px;" class="modal-content">
            <div style="background-color:#e8efff;border-top-left-radius:20px;border-top-right-radius:20px"
                class="modal-heade">

                <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div style="background-color:#e8efff" class="modal-body">
                <div style="display: flex;justify-content:center;margin-top:-2rem;background-color:#e8efff"><img
                        style="border-radius: 0%;" src="{{ asset('frontend/sign_in/assets/image26.png') }}" /></div>
            </div>

            <div class="modal-body">
                <hr style="  border: 1px solid #b4cbff;" />
                <h3 style="text-align: center;padding-left:10px;padding-right:10px"> Create New Account</h3>
                <p style="text-align: center;padding-left:10px;padding-right:10px">Get Started with HikayatAlref, to
                    get surprising discounts..!</p>
                <div style="padding: 25px;">
                    <form method="POST" action="{{ route('customer.register') }}" id="registerForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        value="{{ old('first_name') }}" placeholder="Your First Name">
                                    <span class="invalid-feedback" id="first_name_error" role="alert">
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        name="last_name" id="last_name" value="{{ old('last_name') }}"
                                        placeholder="Your Last Name">
                                    <span class="invalid-feedback" role="alert" id="last_name_error">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="register-email" value="{{ old('register-email') }}"
                                    class="form-control @error('register-email') is-invalid @enderror"
                                    id="register-email" placeholder="Enter your email">
                                <span class="invalid-feedback" role="alert" id="register-email_error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Phone</label>
                                <input type="tel" name="mobile" value="{{ old('mobile') }}"
                                    class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                    placeholder="Enter your phone number">
                                <span class="invalid-feedback" id="mobile_error" role="alert">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="customer_address"
                                    placeholder="Enter your address">{{ old('address') }}</textarea>
                                <span class="invalid-feedback" id="customer_address_error" role="alert">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="register-password"
                                        class="form-control @error('register-password') is-invalid @enderror"
                                        id="register-password" placeholder="Enter your password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bi bi-eye" id="signup-password-show"></i>
                                            <i class="bi bi-eye-slash" id="signup-password-hide"
                                                style="display: none;"></i>
                                        </span>
                                    </div>
                                    <span class="invalid-feedback" id="register-password_error" role="alert">
                                    </span>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="register-password-confirm">Confirm Password</label>
                                <input id="register-password-confirm" type="password" class="form-control"
                                    name="register-password_confirmation" placeholder="Re-enter your password">
                                <span class="invalid-feedback" role="alert" id="confirm_register-password_error">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control  @error('gender') is-invalid @enderror" name="gender"
                                    id="cgender">
                                    <option selected disabled value="">Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="invalid-feedback" id="cgender_error" role="alert">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="profile_image">Profile Picture</label>
                                <input type="file" name="profile_image"
                                    class="form-control @error('profile_image') is-invalid @enderror"
                                    id="profile_image">
                                <span class="invalid-feedback" id="profile_image_error" role="alert">
                                </span>
                            </div>
                            <hr />
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I authorize to contact me for
                                    opportunities</label>
                            </div>

                        </div>

                        <div style="display:flex;justify-content:center;"><button
                                style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px;padding:10px; white-space:nowrap"
                                type="submit" class="btn btn-primary">Create new account</button></div>
                    </form>

                    {{-- <div>
                        <h6 style="text-align: center;padding:20px;">Or</h6>
                    </div>
                    <h6 style="margin-top:-1rem" class="p2"><span
                            style="padding-left: 10px;padding-right:10px; margin-left:35%;">Continue with</span> </h6> --}}
                </div>
                {{-- <div style="display:flex;justify-content:center"><button
                        style="background-color: #f8f6ff;color:#5627ff;border-color:#5627ff;border-radius:20px; "
                        type="submit" class="btn btn-primary"> <i class="bi bi-google"></i> Log in with
                        Google</button></div> --}}
                {{-- <p style="text-align: center;padding:10px;color:#808080">Don't have an account <span
                        style="color: #5627ff;">Sign up</span></p> --}}
            </div>
        </div>
    </div>
</div>
