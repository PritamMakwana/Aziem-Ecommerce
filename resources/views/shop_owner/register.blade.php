<div class="modal fade" id="shop_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <p style="text-align: center;padding-left:10px;padding-right:10px">Get Started with HikayatAlref, to get
                    surprising discounts..!</p>
                <div style="padding: 25px;">
                    <form method="POST" action="{{ route('shop_owner.register') }}" id="so-register"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="firstName">Your Name</label>
                                <input type="text" name="name" id="name" class="form-control" id="so-name"
                                    placeholder="Your Name">
                                <span class="invalid-feedback" role="alert" id="name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="so-email"
                                    placeholder="Enter your email">
                                <span class="invalid-feedback" role="alert" id="email_error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone"
                                    placeholder="Enter your phone number">
                                <span class="invalid-feedback" role="alert" id="phone_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="so-password"
                                        placeholder="Enter your password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bi bi-eye" id="password-show"></i>
                                            <i class="bi bi-eye-slash" id="password-hide" style="display: none;"></i>
                                        </span>
                                    </div>
                                    <span class="invalid-feedback" role="alert" id="password_error">
                                    </span>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password-confirm" placeholder="Confirm your password">
                                <span class="invalid-feedback" role="alert" id="confirm_password_error">
                            </div>
                            <div class="form-group">
                                <label for="nationality">Select your Nationality</label>
                                <select class="form-control" name="nationality" id="nationality">
                                    <option value="" selected>Select your Nationality</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="nationality_error">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="state">Select your State</label>
                                <select class="form-control" name="state" id="state">
                                    <option value="" selected>Select your State</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">Select your City</label>
                                <select class="form-control" name="city" id="city">
                                    <option value="" selected>Select your city</option>
                                </select>
                                <span class="invalid-feedback" role="alert" id="city_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Enter your address"></textarea>
                                <span class="invalid-feedback" role="alert" id="address_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="inputShopname">Shop Name</label>
                                <input type="text" name="shop_name" class="form-control" id="shop_name"
                                    placeholder="Shop Name">
                                <span class="invalid-feedback" role="alert" id="shop_name_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="shop_category">Shop Category</label>
                                <select class="form-control" name="shop_category" id="shop_category">
                                    <option selected value="">Select your Shop Category</option>
                                    @foreach ($category as $ctr)
                                        <option value="{{ $ctr->id }}">{{ $ctr->name }}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted"><span style="color:#5627ff">[
                                        Please select shop category carefully, you cannot change it later
                                        ]</span></small>
                                        <span class="invalid-feedback" role="alert" id="shop_category_error">
                                        </span>
                            </div>

                            <div class="form-group">
                                <label for="inputShopname">CR Number</label>
                                <input type="text" name="cr_number" class="form-control" id="cr_number"
                                    placeholder="Enter CR Number">
                                <span class="invalid-feedback" role="alert" id="cr_number_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="offer">Select an offer for your customer</label>
                                <select name="offer" class="form-control" id="offer">
                                    <option selected  value="">Select offer</option>
                                    @foreach ($offers as $offer)
                                        <option value="{{ $offer->id }}">{{ $offer->offer_name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert" id="offer_error">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="images">Upload image of your shop</label>
                            </div>
                            <div style="border: 1px dotted #5627ff;border-style:dashed" class="file-drop-area">
                                <input class="form-control" name="images" id="images" type="file">
                                <span class="invalid-feedback" role="alert" id="images_error">
                                </span>
                            </div>

                            <hr />
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="">
                                <label class="form-check-label" for="exampleCheck1">I authorize to contact me for
                                    opportunities</label>
                            </div>

                        </div>

                        <div style="display:flex;justify-content:center"><button
                                style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px; padding:10px"
                                type="submit" class="btn btn-primary">Create new account</button></div>
                    </form>
                    {{--
                    <div>
                        <h6 style="text-align: center;padding:20px;">Or</h6>
                    </div>
                    <h6 style="margin-top:-1rem" class="p2"><span
                            style="padding-left: 10px;padding-right:10px; margin-left:35%;">Continue
                            with</span> </h6> --}}
                </div>
                {{-- <div style="display:flex;justify-content:center;margin-bottom:1rem"><button
                        style="background-color: #f8f6ff;color:#5627ff;border-color:#5627ff;border-radius:20px; "
                        type="submit" class="btn btn-primary"> <i class="bi bi-google"></i> Log in with
                        Google</button></div> --}}
                {{-- <p style="text-align: center;padding:10px;color:#808080">Already a member? <span
                        style="color: #5627ff;"><a href="#" id="showSOSignin" data-toggle="modal"
                            data-target="#shop_signin"><span style="color: #5627ff;">Sign In</span></a></p> --}}
            </div>
        </div>
    </div>
</div>
