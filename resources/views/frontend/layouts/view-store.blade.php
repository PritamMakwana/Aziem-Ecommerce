@extends('frontend.layouts.app')

@section('style')
<style>
section .infoCard {
    background: #002c8f;
    color: white;
    display: flex;
    padding: 40px;
    border: none;
    border-radius: 20px;
    width: 60rem;
    flex-direction: row;
    align-items: center;
    gap: 50px;
    @media (max-width:900px) {
        width: 40rem;
        @media (max-width:685px) {
            width: 30rem;
            @media (max-width:530px) {
                width: 22rem;
                flex-direction: column;
                @media (max-width:380px) {
                    width: 19.5em;
                }
            }
        }

    }
}

#card1 {
    display: flex;
    justify-content: center;
}

.card-img-to {
    /* width: 100%; */
    height: 300px;
    border: 20px solid #002c8f;
    border-radius: 20px !important;
}


.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
}


.subCard {
    width: 26rem;
    border-radius: 12px !important;
    border-color: #002c8fc9 !important;

    @media (max-width:500px) {
        width: 20rem;

        @media (max-width:380px) {
            width: 19rem;
        }
    }
}

.cards .card-text {
    color: rgb(105, 105, 107);
}

.card-content1 {
    display: flex;
    margin-bottom: 10px;
    align-items: center;
    gap: 10px;

}

.card-content2 {
    display: flex;
    align-items: baseline;
    margin-bottom: 10px;
    gap: 40px;

}

@media (max-width:500px) {
    .card-content2 h5 {
        font-size: medium;
    }
}

.card-content3 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 120px;

    @media (max-width:500px) {
        gap: 20px;

        @media (max-width:380px) {
            display: block;
        }
    }
}

@media (max-width:380px) {
    .input-group {
        margin-bottom: 10px;
    }
}

.input-group {
    width: auto;

}

@media (max-width:380px) {
    .input-group {
        width: 50% !important;

    }
}
</style>
@endsection
@section('content')


@include('frontend.customer.receipt')

<div class="container">
    <div style="margin-top: 20px;" class="row">
        <div class="col-lg-4">
            <div>
                <p style="font-weight: bold;"><a style="color: black;" href="{{ url('Stores') }}"><i
                            style="font-size:20px;" class="bi bi-arrow-left-circle"></i> Back
                    </a></p>
            </div>
        </div>

        <div class="col-lg-4">
            <div style="display: flex;justify-content:center;padding:10px">
                <h2 style="font-weight: bold;">Shop Details</h2>
            </div>
        </div>

        <div class="col-lg-4">

        </div>


    </div>

</div>

<section class="pt-3">
    <div id="card1">
        <div class="card infoCard">
            <div style="border: 1px solid white; border-radius: 20px;">
                <img class="card-img-to" style="border-radius: 20px !important;" src="{{ asset('Shop_images/' . $fetch->image) }}" alt="Card image cap" width="300px" height="350px">
            </div>
            <div class="card-body">
                {{-- <h3 class="card-title">Universal Shop</h3>
                <p class="card-text">jay@username.com</p>
                <p class="card-text">+91 8746273133</p>
                <p class="card-text">RSH Colony, Maharashtra la city, Loremcity....</p> --}}
                <h2 class="card-title" style="font-weight: bold;">{{ $fetch->name }}</h2>
                        <h5 class="category" style="font-weight:bold; font-style: oblique">Category:
                            {{ $fetch->category()->withTrashed()->first()->name ?? $fetch->category->name }}</h5>
                        <br>
                        <h6 class="card-text">{{ $fetch->email }}</h6>
                        <h6 class="card-text">{{ $fetch->mobile }}</h6>
                        <h6 class="card-text">{{ $fetch->address }}</h6>
                        <h6 class="card-text">{{ $fetch->offers()->withTrashed()->first()->offer_name ??
                            $fetch->offers->offer_name }}</h6>
{{--
                             <h6 class="card-text">
                                {{ auth('customer')->user()->offer }}</h6> --}}
            </div>
        </div>
    </div>

@php
$stringNumber =
$fetch->offers()->withTrashed()->first()->offer_name ?? $fetch->offers->offer_name;
$customer_riyals =  auth('customer')->user()->offer;
$shop_riyals = (int) preg_replace('/[^0-9]/', '', $stringNumber);
$enough_riyals = false;

if($shop_riyals <= $customer_riyals){
    $enough_riyals = false;
    // echo "riyals customer_riyals is big $customer_riyals";

}else {
    $enough_riyals = true;
    // echo "riyals shop_riyals big $shop_riyals";
}
@endphp



    <hr>

    <div style="margin-top: 30px;" class="container">

        @if($enough_riyals)
         <div class="alert alert-danger" role="alert">
            You will not be able to buy any product from this shop because your Riyals are not enough
          </div>
        @endif

        <h2 style="font-weight: bold;">Our Products</h2>
        <h4>Select what products you want to buy from this shop & get receipt for it.</h4>
    </div>

    <div class="cards" style="margin-top: 30px;margin-bottom: 30px;">

        @foreach ($fetch_products as $product)
        <form action="" method="POST" class="card-form" id="form_{{ $product->id }}">
        <div class="card subCard">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="shop_id" value="{{ $fetch->id }}">
            <div>
                <img style="width:100%;height:200px;border-top-right-radius:12px;border-top-left-radius:12px"
                    src="{{ asset('Product_images/' . $product->image) }}" alt="Card image cap">
            </div>
            <div class="card-body">

                <div class="card-content1">
                    <div>
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <div style="overflow-y:scroll;height:100px;">
                        <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>

                </div>
                <div class="card-content2">
                    <h5 style="font-size: 16px;">Quantities Avaiable : </h5>
                    <p class="card-text">{{ $product->quantity_available }} Pieces </p>
                </div>
                @if($enough_riyals == false)
                <div class="card-content3">

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-outline-info btn-number"
                                data-type="minus" data-field="">
                                <span class="fa fa-minus"></span>
                            </button>
                        </span>
                        <input type="number"  id="quantity_{{ $product->id }}" name="quantity"
                            class="form-control p-1 input-number font-weight-bold" value="0" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-outline-info btn-number"
                                data-type="plus" data-field="">
                                <span class="fa fa-plus"></span>
                            </button>
                        </span>
                    </div>

                    <div>
                        <button type="submit" id="" class="btn btn-primary btncart addToCart ms-2 mt-1" data-product-id="{{ $product->id }}" data-form-id="form_{{ $product->id }}">Add to Cart  <span class="fa fa-arrow-right ml-2"> </span></button>
                   </div>

                </div>
                @endif

            </div>
        </div>
        </form>
        @endforeach

        </div>

</section>


    {{-- margin-left:42%; --}}
    <center>
        <button type="button"
            style="display:none;font-size:23px;color:#004AAD;background-color:#BFECFF;border:#004AAD; margin-top:60px; margin-bottom:90px; "
            class="btn btn-primary receipt" id="generateSlipButton" data-toggle="modal"
            data-target="#receiptModal">Generate Slip <i class="bi bi-receipt"
                style="font-size: 24px; vertical-align: text-bottom;"></i></button>
    </center>

    <!-- Pagination Links -->
    @if ($fetch_products->hasPages())
    <div style="display: flex; justify-content: center; margin-top: 4rem;">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($fetch_products->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $fetch_products->previousPageUrl() }}">Previous</a>
                </li>
                @endif

                @php
                // Calculate the total number of pages
                $totalPages = ceil($fetch_products->total() / $fetch_products->perPage());
                @endphp

                @for ($i = 1; $i <= $totalPages; $i++) <li
                    class="page-item{{ $fetch_products->currentPage() == $i ? ' active' : '' }}">
                    <a class="page-link" href="{{ $fetch_products->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    @if ($fetch_products->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $fetch_products->nextPageUrl() }}">Next</a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                    @endif
            </ul>
        </nav>
    </div>
    @endif

{{-- </div> //dddddddddd --}}
<!-- card list end -->
@endsection

@section('style')
<style>
    /* .card-img-top {
                                                        border: black !important;
                                                    } */
</style>
@endsection

@section('script')
<script>
    let all_height = [];
        let card_height;
        let product__details = document.querySelectorAll('.product-details');
        let max_height = () => {
            all_height = [];
            product__details.forEach((card) => {
                all_height.push(card.offsetHeight);
                // console.log(...all_height);
            })
            card_height = Math.max(...all_height);
            product__details.forEach((card) => {
                card.style.height = `${card_height}px`;
            })
        }
        window.addEventListener("resize", () => {
            // console.log('hello');
            // location.reload();
            max_height();
            // console.log(card_height);
            // console.log(...all_height);
        })
        max_height();
</script>

<script>

// $(document).ready( () => {

// let quantity = 0;

// $('.quantity-right-plus').click( (e) => {
//     e.preventDefault();
//     quantity = parseInt($('#quantity').val());
//     $('#quantity').val(quantity + 1);
// });

// $('.quantity-left-minus').click( (e) => {
//     e.preventDefault();
//     quantity = parseInt($('#quantity').val());
//     if (quantity > 0) {
//         $('#quantity').val(quantity - 1);
//     }
// });

// });

// $(document).ready( () => {

// let quantity = 0;

// $('.quantity-right-plus').click( (e) => {
//     e.preventDefault();
//     quantity = parseInt($('#quantity').val());
//     $('#quantity').val(quantity + 1);
// });

// $('.quantity-left-minus').click( (e) => {
//     e.preventDefault();
//     quantity = parseInt($('#quantity').val());
//     if (quantity > 0) {
//         $('#quantity').val(quantity - 1);
//     }
// });

// });


    $(document).ready(function() {

            // Handle quantity increment and decrement
            $('.quantity-right-plus').click(function(e) {
                var inputField = $(this).closest('.card').find('.input-number');
                var quantity = parseInt(inputField.val());

                inputField.val(quantity + 1);
            });

            $('.quantity-left-minus').click(function(e) {
                var inputField = $(this).closest('.card').find('.input-number');
                var quantity = parseInt(inputField.val());

                if (quantity > 0) {
                    inputField.val(quantity - 1);
                }
            });

            // Handle add to cart button
            // $('.btncart').click(function(e) {
            //     var button = $(this);
            //     var buttonState = button.data('added');

            //     if (buttonState) {
            //         button.html("Add to Cart");
            //         button.data('added', false);
            //         button.removeClass("btncart2");
            //         button.addClass("btncart");
            //     } else {
            //         button.html("Added");
            //         button.data('added', true);
            //         button.removeClass("btncart");
            //         button.addClass("btncart2");
            //     }
            // });
        });
</script>

<script>
    // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Get a reference to the Confirm Order button
            const confirmOrderBtn = document.getElementById('confirmOrderBtn');

            // Attach a click event listener to the Confirm Order button
            confirmOrderBtn.addEventListener('click', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Show the success Swal alert for order confirmation
                Swal.fire({
                    title: 'Order Confirmed!',
                    text: 'Your order has been confirmed successfully.',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    // If the user clicks "OK," submit the form
                    if (result.isConfirmed) {
                        const form = document.getElementById('confirmOrderForm');
                        form.submit();
                    }
                });
            });
        });
</script>

<script>
    $(document).ready(function() {
            // Handle add to cart button (using class instead of id)
            $('.addToCart').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var formId = button.data('form-id');
                var formData = $('#' + formId).serialize();

                // Get the selected quantity from the input field
                var selectedQuantity = parseInt($('#quantity_' + button.data('product-id')).val());

                // Get the available quantity from the card
                var availableQuantity = parseInt(button.closest('.card').find('.quantity_available')
                    .text());

                if (selectedQuantity > availableQuantity) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Selected quantity is more than available quantity. Please try again.',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                    });
                    return; // Stop further execution
                }

                // If the condition is not met, continue with the AJAX request
                $.ajax({
                    type: "POST",
                    url: "{{ url('/cart/add') }}",
                    data: formData,
                    success: function(response) {
                        // Handle the server response
                        if (response.success) {
                            // Update the cart count on the UI
                            var cartCountElement = $('#cartCount');
                            var cartCount = parseInt(cartCountElement.text());
                            cartCountElement.text(cartCount + 1);

                            // Update the button state (optional)
                            button.html(
                                '  Added <i class="bi bi-check2-circle me-2 ms-1"></i> ');
                            button.removeClass("btncart");
                            button.addClass("btncart2");

                            $('#generateSlipButton').show();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
</script>

<script>


</script>

<script>
    $(document).ready(function() {
            // Handle "Generate Slip" button click
            $('#generateSlipButton').click(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/cart/' . $fetch->id) }}", // fetch cart data
                    success: function(response) {
                        console.log(response);

                        // Extract the cartItems and user from the response
                        var cartItems = response[0];
                        var user = response[1];
                        var date = response[2];

                        var formattedDate = moment(date).format("DD-MMM-YYYY");
                        // console.log(formattedDate);

                        displayCartDetails(cartItems);
                        displayUserInfo(user);
                        displayShopDetails(cartItems);
                        displayDate(formattedDate);
                        displayOffer(user);
                        confirmOrder(cartItems[0].shop_id);

                        // Trigger the receipt modal to open
                        // $('#receiptModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            function confirmOrder(shop_id) {
                var orderContainer = $('#order');

                var orderHtml = '<input type="hidden" name="shop_id" value="' + shop_id + '">';
                orderContainer.append(orderHtml);
            }

            function displayOffer(user) {
                var offerContainer = $('#offer');

                offerContainer.empty();

                var offerHtml = '<p style="color:#004aad;padding:40px;text-align:center">You get Discount of ' +
                    user.offer + ' Riyal on purchase of listed item for this shop</p>';

                offerContainer.append(offerHtml);
            }

            function displayDate(formattedDate) {
                var dateContainer = $('#dateInfo');

                // Clear the existing content in the container
                dateContainer.empty();

                // Build the HTML to display the user information
                var dateHtml = '<p style="font-weight:bold;">' + formattedDate + '</p>';

                // Append the userHtml to the userInfoContainer
                dateContainer.append(dateHtml);
            }

            // Function to display the fetched cart data on the page
            function displayCartDetails(cartItems) {
                var cartDetailsContainer = $('#cartDetails');

                // Clear the existing content in the container
                cartDetailsContainer.empty();

                // Loop through the cartItems and build the HTML to display the data
                cartItems.forEach(function(cartItem) {
                    // Assuming cartItem is an object with properties like product_id, quantity, etc.
                    var cartHtml = '<tr><th scope="row"><span style="font-weight: 500;">' + cartItem.product
                        .product_name + '</span></th>';
                    cartHtml += '<td>' + cartItem.quantity +
                        ' items</td><td class="text-center"><a href="" class="delete-cart-item" data-cart-id="' +
                        cartItem.id +
                        '"><i class="bi bi-dash-circle-fill" style="font-size:20px;color:red"></i></a></td></tr>';

                    // Append the cartHtml to the cartDetailsContainer
                    cartDetailsContainer.append(cartHtml);
                });

                // Add click event listener to delete items
                $('.delete-cart-item').on('click', function(e) {
                    e.preventDefault();
                    var cartItemId = $(this).data('cart-id');
                    deleteCartItem(cartItemId);

                    const cartDetails = document.getElementById("cartDetails");
                    const myButton = document.getElementById("confirmOrderBtn");
                    const receiptbtndis = document.getElementById("receiptbtndis");

                        // Check if cartDetails is empty and disable the button if it is
                     if (cartDetails.children.length === 1) {
                         myButton.disabled = true;
                         receiptbtndis.style.pointerEvents = "none";
                        }
                });
            }

            // Function to delete a cart item
            function deleteCartItem(cartItemId) {
                var currentRow = $('a[data-cart-id="' + cartItemId + '"]').closest('tr'); // Get the current row

                // Send an AJAX request to delete the cart item
                $.ajax({
                    url: '/cart/delete/' + cartItemId,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the deleted cart item from the table row
                            currentRow.remove(); // Remove the current row
                        } else {
                            // Handle errors or display a message if needed
                        }
                    },
                    error: function(error) {
                        // Handle errors
                    }
                });
            }

            // Function to display user information on the page
            function displayUserInfo(user) {
                // Assuming your user details container has the ID "userInfo"
                var userInfoContainer = $('#userInfo');

                // Clear the existing content in the container
                userInfoContainer.empty();

                // Build the HTML to display the user information
                var userHtml = '<h5 style="font-weight:bold;">' + user.first_name + ' ' + user.last_name + '</h5>';
                userHtml += '<p>' + user.email + '</p>';
                userHtml += '<p>' + user.mobile + '</p>';
                userHtml += '<p>' + user.address + '</p>';

                // Append the userHtml to the userInfoContainer
                userInfoContainer.append(userHtml);
            }

            function displayShopDetails(cartItems) {
                var shopInfoContainer = $('#shopInfo');
                // Clear the existing content in the container
                shopInfoContainer.empty();

                // Check if cartItems is not empty and if the first item has the shop property
                if (cartItems.length > 0 && cartItems[0].hasOwnProperty('shop')) {
                    // Build the HTML to display the shop information
                    var shopHtml = '<span style="font-size: 18px;font-weight:600">' + cartItems[0].shop.name +
                        '</span>';
                    shopHtml += '<p>' + cartItems[0].shop.email + '</p>';
                    shopHtml += '<p>' + cartItems[0].shop.mobile + '</p>';
                    shopHtml += '<p>' + cartItems[0].shop.address + '</p>';

                    // Append the userHtml to the userInfoContainer
                    shopInfoContainer.append(shopHtml);
                } else {
                    // If there's no shop information, display an appropriate message or handle it as you see fit
                    shopInfoContainer.text('No shop information available.');
                }
            }
        });
</script>

<script type="text/JavaScript" src=" https://MomentJS.com/downloads/moment.js"></script>
@endsection
