<!-- Modal -->
<div class="modal fade" id="shop_hold" data-bs-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div style="border-radius: 20px;" class="modal-content">
            <div style="background-color:#e8efff;border-top-left-radius:20px;border-top-right-radius:20px"
                class="modal-heade">

                <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>

            </div>
            <div style="background-color:#e8efff" class="modal-body">
                <div style="display: flex;justify-content:center;margin-top:-2rem;background-color:#e8efff"><img
                        style="border-radius: 0%;" src="{{ asset('frontend/sign_in/assets/image26.png') }}" /></div>
            </div>


            <div class="modal-body">
                <hr style="  border: 1px solid #b4cbff;margin-top:-10px;margin:10px" />
                {{-- <h2 style="padding:10px;text-align:center">Congratulations...!</h2> --}}
                <h4 style="color:#407bff;padding:0px;text-align:center">your account temporarily blocked please contact admin</h4>
                {{-- <div style="display: flex;justify-content:center;margin-top:2rem; "><img style="border-radius: 0%;"
                        src="{{ asset('frontend/sign_in/assets/cash.png') }}"></div> --}}


                <p style="color:#4d4d4d;padding:10px;text-align:center;">Dear customer,<br />
                    we thank you for requesting to join us in our application, and your enjoyment of the most wonderful
                    ideas,
                    and that when you subscribe, you will have an account with us, and through it you can save yourself
                    the
                    financial exchange, as we give you gifts and discounts equal to the value of your bill when you make
                    the
                    purchase from the stores that are registered in the application.</p>

                    <center>
                    <a href="{{ route('shop_owner.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger" >Logout</a>
                    </center>
            </div>
        </div>
    </div>
</div>
