 <!-- Modal -->
 <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div style="border-radius: 20px;" class="modal-content">
             <div style="border-top-left-radius:20px;border-top-right-radius:20px" class="modal-heade">

                 <button style="padding: 20px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>

             </div>
             <div class="modal-body">

             </div>

             <div class="modal-body">

                 <h5 style="text-align: center;padding-left:10px;padding-right:10px">Select the Shop from registered
                 </h5>

                 <div style="padding: 25px;">
                     <form method="POST" action="{{ url('upload-receipt') }}" enctype="multipart/form-data">
                         <input type="hidden" name="customer" value="{{ $customer }}">
                         @csrf
                         <div class="form-group">
                             <select name="shop_name" id="shop"
                                 class="form-control @error('shop_name') is-invalid @enderror">
                                 <option selected value="none" disabled>Select Shop Name</option>
                                 @foreach ($shop as $shp)
                                     <option value="{{ $shp->id }}">{{ $shp->name }}</option>
                                 @endforeach
                             </select>
                             @error('shop_name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>

                         <div class="form-group">
                            <label>Riyal</label>
                            <input type="text" name="riyal" id="riyal"
                                class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Total Amount</label>
                            <input type="number" name="total_amount"
                                class="form-control" min="1">
                                  @error('total_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                         <div class="form-group">
                             <div style="display: flex;justify-content:center"><label for="gender"
                                     style="text-align: center;">Upload photo of your Receipt</label></div>
                         </div>
                         <div style="border: 1px dotted #5627ff;border-style:dashed" class="file-drop-area">

                             <span class="choose-file-button">Choose files</span>
                             <span class="file-message">or drag and drop files here</span>
                             <input name="receipt_image" class="file-input @error('receipt_image') is-invalid @enderror"
                                 type="file">
                             @error('receipt_image')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                         <hr />
                 </div>
                 <div style="display:flex;justify-content:center"><button
                         style="background-color: #5627ff;color:white;border-color:#5627ff;border-radius:8px; padding:10px;margin-bottom:1rem"
                         type="submit" class="btn btn-primary">Upload</button></div>
                 </form>
             </div>
         </div>
     </div>
 </div>

@if(count($errors) > 0)
<script>
    $('#upload').modal('show');
</script>
@endif



<script>
    $(document).ready(function () {
        $('#shop').change(function () {
            var selectedValue = $(this).val();

            $.ajax({
                // url: '/get-shop-riyal-receipt/' + selectedValue,
                url:'{{ route("get-shop-riyal-receipt", ["id" => ":value"]) }}'
                    .replace(':value', selectedValue),
                type: 'GET',
                success: function (data) {
                     $('#riyal').val(data)
                }
            });
        });
    });
</script>
