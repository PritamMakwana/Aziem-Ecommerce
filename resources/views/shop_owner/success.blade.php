@extends('frontend.layouts.app')
@section('content')
    <!-- Modal -->
    <div class="container">
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
                            style="border-radius: 0%;" src="{{ asset('success/assets/image26.png') }}" />
                    </div>
                </div>


                <div class="modal-body">
                    <hr style="  border: 1px solid #b4cbff;margin-top:-10px;margin:10px" />
                    <div style="display: flex;justify-content:center;margin-top:2rem; "><img style="border-radius: 0%;"
                            src="{{ asset('success/assets/store.png') }}" /></div>
                    <h3 style="color:#407bff;padding:10px;text-align:center">Congratulations...!</h3>
                    <h5 style="color:#000000;padding:10px;text-align:center;">Your shop has been registered successfully..!
                    </h5>
                    <p style="color:#4d4d4d;padding:10px;text-align:center;">Now, you will be redirected to home screen. You
                        have
                        to register your products with uploading their photos</p>

                    <div style="background-color: #edf3ff;border-radius:20px">
                        <div style="display: flex;justify-content:center;padding:10px;margin-top:15px">
                            <h4>Info</h4>
                        </div>
                        <div style="display: flex;justify-content:center;">
                           <hr style="width: 80%;" class="m-0 p-0 text-center" />
                        </div>
                        <div style="display: flex;justify-content:center;padding-right:20px;padding-left:20px;">
                            <p>Dear shop owner,
                                we thank you for your desire to participate with us in the application, and we inform you
                                that the
                                subscription is free for stores only. We take a percentage of the customer’s invoice (the
                                customer)
                                after he buys from your shop, amounting to (15%), and you must provide a discount according
                                to your
                                desire, starting from (50) riyals to ( 1000) And you can stipulate that the discount is
                                valid if the
                                invoice has a value like the invoice to be , according to your desire, and that this
                                discount is in
                                favor of our customer (customer) who comes to your shop and makes the purchase.</p>
                        </div>
                        <div></div>
                    </div>
                    <div style="display:flex;justify-content:center; margin-top:15px;"><a href="{{ route('Stores') }}"
                            style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px; padding:10px;margin-bottom:1rem"
                            type="button" class="btn btn-primary">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script> --}}
@endsection
