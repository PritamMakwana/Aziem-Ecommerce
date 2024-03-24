<!-- Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="border: none;" class="modal-header">
                <button type="button" id="rcloseButton" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- row 1 -->
                <div style="margin-top: -10px;" class="row">
                    <div class="col-lg-4 col-sm-4" id="userInfo">
                        {{-- User details --}}
                    </div>
                    <div class="col-lg-4 col-sm-4"> </div>
                    <div style="display: flex;justify-content:flex-end;" class="col-lg-4 col-sm-4" id="dateInfo">
                        19 June
                    </div>
                </div>
                <!-- row 1 -->
                <!-- row 2 -->
                {{-- <div class="row">
                    <div style="margin-top: 20px;" class="col-lg-4">example@gmail.com</div>
                </div>

                <div class="row">
                    <div style="margin-top: 10px;" class="col-lg-4">+91 98745346576</div>
                </div> --}}

                {{-- <div class="row"> --}}
                {{-- <div style="margin-top: 10px;" class="col-lg-4">Mumbai, India</div>
                    <p id="product_id"></p> --}}
                {{-- </div> --}}

                <div class="row">
                    {{-- Address --}}
                    <div style="margin-top: 10px;" class="col-lg-6" id="userAddress">

                    </div>
                    <div style="margin-top: 10px;display:flex;justify-content:flex-end" class="col-lg-6">
                        <a  id="receiptbtndis" href="{{ url('download-receipt/' . $fetch->id) }}"
                            style="background-color:#e0e9f5;color:#004aad" type="button"class="btn btn-primary">Receipt
                            <i style="padding-left: 4px;" class="bi bi-download"></i></a>
                    </div>
                </div>
                <!-- row 2 -->

                <hr />

                <!-- table part -->
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"><span style="font-size: 16px;">Selected Items:</span></th>

                            <th scope="col"><span style="font-size: 16px;">Quantity</span></th>

                            <th scope="col" class="text-center"><span style="font-size: 16px;">Remove</span></th>
                        </tr>
                    </thead>
                    <tbody id="cartDetails">

                    </tbody>
                </table>
                <!-- table end -->

                <div style="background-color: #e3ebf6;border-radius:10px" id="offer">
                    {{-- <p style="color:#004aad;padding:40px;text-align:center">You get Discount of 100 Riyal on purchase of
                        listed item for this shop</p> --}}
                </div>

                <div class="row">
                    <div style="margin-top:20px" class="col">
                        <span style="font-size: 22px;font-weight:bold">Shop Details:</span>
                    </div>
                </div>
                <!-- row 1 -->
                <!-- row 2 -->
                <div class="row">
                    <div style="margin-top: 20px;" class="col-lg-4 col-sm-4" id="shopInfo">
                        {{-- <span style="font-size: 18px;font-weight:600">Universal Shop</span> --}}
                    </div>
                </div>
                <!-- row 2 -->
                <form action="{{ url('/confirm-order') }}" method="POST" id="confirmOrderForm">
                    @csrf
                    <div id="order"></div>
                    <div class="" style="color:#006eff;padding:10px;text-align:center; font-size:30px;">
                        <button type="submit" id="confirmOrderBtn" class="btn btn-primary btn-lg"
                            style="">Confirm
                            Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('rcloseButton').addEventListener('click', function (event) {
                location.reload();
  });
</script>
