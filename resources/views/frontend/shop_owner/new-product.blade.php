@extends('frontend.layouts.app')
@section('content')
    <div>

        <!-- section 1 start -->
        <div style="background-color: #f4f7ff;">
            <div class="container">
                <div style="padding: 10px;padding-top:2rem">
                    <h5><a style="color: black;" href="{{ url('/so-home/' . $shop->so_id) }}"><i
                                class="bi bi-arrow-left-circle-fill"></i> Back</a>
                    </h5>
                </div>
                <div style="padding-bottom:50px;">
                    <h1 style="text-align: center;">Add <span style="color: #407bff;">Shop Product's</span> </h1>
                    <p style="text-align: center;">Add new products that you want to register on this app</p>

                </div>
            </div>
        </div>
        <!-- section 1 end -->

        <!-- section 2 start -->

        <form action="{{ url('/create-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row" style="margin-top:20px">
                    <div class="col-lg-5" style="margin-top:20px">
                        <div class="form-group" style="padding: 15px;">
                            <label for="category">Product Category</label>
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option selected value="none" disabled>Select Category</option>
                                @foreach ($category_data as $ctr)
                                    <option value="{{ $ctr->id }}">{{ $ctr->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Product Name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity Available"
                                class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="padding: 15px;">
                            <label for="inputShopname">Your Shop ID</label>
                            <input class="form-control" id="inputShopname" placeholder="Enter Your Shop ID"
                                value="{{ $shop->id }}" disabled>
                            <input type="hidden" name="shop" value="{{ $shop->id }}">
                        </div>

                    </div>
                    <!-- end -->

                    <div class="col-lg-2">

                    </div>
                    <!-- end -->

                    <div class="col-lg-5" style="padding: 15px;margin-top:20px">
                        <div class="form-group" style='padding: 15px;'>
                            <label for="description">Product Description</label>
                            <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-top:15px;padding: 15px;">
                            <label for="gender">Upload image of your product</label>
                            <div style="border: 1px dotted #5627ff;border-style:dashed;padding:15px;margin-top:15px"
                            class="file-drop-area">

                            <span class="choose-file-button">Choose files</span>
                            <span class="file-message">or drag and drop files here</span>
                            <input class="file-input @error('image') is-invalid @enderror" type="file" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <hr class="mt-5 mb-4" />
                <div class="text-center" style="margin-bottom: 4%;">
                    <button type="submit" class="btn btn-primary" style="font-size: 22px;">
                        Add Product
                    </button>
                </div>
            </div>
            <!-- section 2 end -->
        </form>
    </div>
@endsection
@section('script')
    <!-- script for upload file -->
    <script>
        $(document).on('change', '.file-input', function() {


            var filesCount = $(this)[0].files.length;

            var textbox = $(this).prev();

            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }
        });
    </script>
@endsection
