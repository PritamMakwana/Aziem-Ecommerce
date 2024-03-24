<!DOCTYPE html>
<html>

<head>
    <title>HikayatAlref - Receipt</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Receipt</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Date - <span class="gray-color">{{ $date }}</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
            {{-- <img src="https://techsolutionstuff.com/frontTheme/assets/img/logo_200_60_dark.png" alt="Logo"> --}}
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Shop Details</th>
                <th class="w-50">Customer Details</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <h3>{{ $cartItems[0]->shop->name }}</h3>
                        <p>{{ $cartItems[0]->shop->email }}</p>
                        <p>{{ $cartItems[0]->shop->mobile }}</p>
                        <p>{{ $cartItems[0]->shop->address }}</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->mobile }}</p>
                        <p>{{ $user->address }}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    {{-- <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Shipping Method</th>
            </tr>
            <tr>
                <td>Cash On Delivery</td>
                <td>Free Shipping - Free Shipping</td>
            </tr>
        </table>
    </div> --}}
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Product Name</th>
                <th class="w-50">Quantity</th>
            </tr>
            @foreach ($cartItems as $item)
                <tr align="center">
                    <td>{{ $item->product()->withTrashed()->first()->product_name ?? $item->product->product_name }}
                    </td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <p style="color:#004aad;padding:10px;text-align:center">You get Discount of {{ $user->offer }}
                        Riyal on purchase of
                        listed item for this shop</p>
                    {{-- <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Tax (18%)</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>$7600</p>
                            <p>$400</p>
                            <p>$8000.00</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div> --}}
                </td>
            </tr>
        </table>
    </div>

</html>
