<div class="modal fade" id="shop_signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        style="border-radius: 0%;" src="{{ asset('frontend/sign_in/assets/image26.png') }}" />
                </div>
            </div>

            <div class="modal-body">
                <hr style="  border: 1px solid #b4cbff;" />
                <h3 style="text-align: center;padding-left:10px;padding-right:10px"> Sign in your account</h3>
                <p style="text-align: center;padding-left:10px;padding-right:10px">Welcome back to Hikayat
                    Alref!"
                    We are thrilled to welcome you..!</p>
                <div style="padding: 25px;">
                    <form method="POST" action="{{ route('shop_owner.login') }}" id="so-login">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input style="border-radius: 8px;" type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="so-login-email"
                                aria-describedby="emailHelp" placeholder="Enter your Email here" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input style="border-radius: 8px;" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    id="so-login-password" placeholder="Enter Your Password here" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="bi bi-eye" id="login-password-show"></i>
                                        <i class="bi bi-eye-slash" id="login-password-hide" style="display: none;"></i>
                                    </span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div style="display:flex;justify-content:center"><button
                                style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px;width:140px;padding:10px"
                                type="submit" class="btn btn-primary">Sign in</button></div>
                    </form>

                    {{-- <div>
                        <h6 style="text-align: center;padding:20px;">Or</h6>
                    </div>
                    <h6 style="margin-top:-1rem" class="p2"><span
                            style="padding-left: 10px;padding-right:10px; margin-left:35%;">Continue with</span>
                    </h6> --}}
                </div>
                {{-- <div style="display:flex;justify-content:center"><button
                        style="background-color: #f8f6ff;color:#5627ff;border-color:#5627ff;border-radius:20px; "
                        type="submit" class="btn btn-primary"> <i class="bi bi-google"></i> Log in with
                        Google</button></div> --}}
                <p style="text-align: center;padding:10px;color:#808080">Don't have an account?
                    <a href="#" id="showSORegister" data-toggle="modal" data-target="#shop_register"><span
                            style="color: #5627ff;">Sign
                            up</span></a>
                </p>
                <p style="text-align: center;padding:10px;color:#808080">Don't have an account?
                    <a href="#" id="showRegisterModalLink" data-toggle="modal" data-target="#emailverify"><span
                            style="color: #5627ff;">Forget Password ?</span></a>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- @if(count($errors) > 0)
<script>
    $('#so-login').modal('show');
</script>
@endif --}}
