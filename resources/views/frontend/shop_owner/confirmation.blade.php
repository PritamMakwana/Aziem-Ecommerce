<!-- Modal -->
<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div style="border-radius: 20px;" class="modal-content">
            <div style=" border-top-left-radius:20px;border-top-right-radius:20px" class="modal-heade">

                <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <!-- <div style="background-color:#e8efff" class="modal-body">
    <div style="display: flex;justify-content:center;margin-top:-2rem;background-color:#e8efff" ><img style="border-radius: 0%;" src="./assets/image 26 (1).png" /></div>
  </div> -->

            <div class="modal-body">
                <!-- <hr style="  border: 1px solid #b4cbff;" /> -->
                <h3 style="text-align: center;padding-left:10px;padding-right:10px;color:#407bff">Confirmation</h3>

                <div style="padding: 25px;">
                    <form method="POST" action="{{ url('confirm-amount') }}">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                        <input type="hidden" name="order_id" value="{{ $item->order_id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enter Total Amount <span style="color: red">*</span></label>
                            <input style="border-radius: 8px;" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" name="total_amount"
                                placeholder="Enter total amount" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Riyal Discount Amount</label>
                            <input style="border-radius: 8px;" type="text" name="" class="form-control"
                                id="exampleInputPassword1" value="{{ $item->shop->offers()->withTrashed()->first()->offer_name ??$item->shop->offers->offer_name }}" disabled>
                        </div>
                        <input type="hidden" name="discount_amount" value="{{ $item->shop->offers()->withTrashed()->first()->offer_name ?? $item->shop->offers->offer_name }}">
                        <div style="display:flex;justify-content:center"><button
                                style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px;width:auto;padding:10px"
                                type="submit" class="btn btn-primary">Make as Complete</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
