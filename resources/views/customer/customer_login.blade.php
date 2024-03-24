<div class="modal fade" id="siginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST" action="{{ route('customer.login') }}" id="loginForm">
                        @csrf
                        <input type="hidden" name="view_store_login" value="1">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input style="border-radius: 8px;" type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
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
                                    id="password" placeholder="Enter Your Password here" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="bi bi-eye" id="signin-password-show"></i>
                                        <i class="bi bi-eye-slash" id="signin-password-hide" style="display: none;"></i>
                                    </span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div style="display:flex;justify-content:center">

                            <button
                                style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px;width:140px;padding:10px"
                                type="submit" id="submit-button" class="btn btn-primary">Sign in</button>


                        </div>


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
                    <a href="#" id="showRegisterModalLink" data-toggle="modal" data-target="#signupmodal"><span
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

{{-- @section('script') --}}
<script>
    // $(document).ready(function () {
    //     $('#Clogin').click(function () {
    //         $.ajax({
    //             type: 'POST',
    //             url: $('#loginForm').attr('action'),
    //             data: $('#loginForm').serialize()
    //             // success: function (response) {
    //             //     // Handle the response here (e.g., update a result div)
    //             //     // $('#result').html(response);
    //             // }
    //         });
    //     });
    // });

    // $(document).ready(function () {
    //     $('#submit-button').on('click', function () {
    //         // Trigger form submission
    //         $('#loginForm').submit();
    //     });
    // });

</script>
<script>
    // $(document).ready(function () {
    //     $('#submit-button').click(function () {
    //         var formData = $('#loginForm').serialize();

    //         $.ajax({
    //             url: "{{ route('customer.login') }}",
    //             type: "POST",
    //             data: formData,
    //             success: function (response) {
    //                 // Handle the success response here
    //                 console.log(response);
    //             },
    //             error: function (xhr, status, error) {
    //                 // Handle any errors here
    //                 console.log(error);
    //             }
    //         });
    //     });
    // });
//     $('#submit-button' ).submit(
//     function( e ) {
//         $.ajax( {
//             url: '{{ route('customer.login') }}',
//             type: 'POST',
//             data: new FormData( this ),
//             processData: false,
//             contentType: false,
//             success: function(result){
//                 console.log(result);
//             }
//         } );
//         e.preventDefault();
//     }
// );
</script>



{{-- @endsection --}}




{{-- @if ($errors->has('email'))
<script>
    console.log('error');
$('#siginmodal').modal('show');
</script> --}}
{{-- @endif --}}

{{-- @dd($errors) --}}
<script>
    // @if (count($errors) > 0)
// $(document).ready(function() {
//     $('#siginmodal').modal('show');
// });
// @endif
</script>
{{-- @endsection --}}

{{-- @dd($errors) --}}

    {{-- @if(count($errors) > 0)
    <script>
        // $('#siginmodal').modal('show');
    </script>
    @endif --}}
