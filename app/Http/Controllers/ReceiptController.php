<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Shop;
use App\Models\ShopOwner;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\ConfirmedOrders;
use PDF;

class ReceiptController extends Controller
{
    public function downloadReceipt($shop_id)
    {
        $user = Auth::guard('customer')->user();
        $cartItems = Cart::with('product', 'shop')->where('customer_id', $user->id)->where('shop_id', $shop_id)->get();
        $date = date('d-M-Y');

        $data = [
            'user' => $user,
            'cartItems' => $cartItems,
            'date' => $date,
        ];

        $pdf = PDF::loadView('receipt_pdf', $data);

        return $pdf->download('Hikayat_receipt.pdf');
    }

    public function downloadCardReceipt($order_id)
    {
        $orders = ConfirmedOrders::with(['shop', 'product'])
            ->where('order_id', $order_id)
            ->get();

        $user = Auth::guard('customer')->user();


        $data = [
            'date' => $orders->first()->created_at->format('d-M-Y'),
            'cartItems' => $orders,
            'user' => $user,
        ];

        $pdf = PDF::loadView('receipt_pdf', $data);

        return $pdf->download('Hikayat_receipt_' . $order_id . '.pdf');
    }

    public function downloadShopReceipt($order_id)
    {
        $orders = ConfirmedOrders::with(['shop', 'product'])
            ->where('order_id', $order_id)
            ->get();

        $user = ConfirmedOrders::with('customer')->where('order_id',$order_id)->first();

        $data = [
            'date' => $orders->first()->created_at->format('d-M-Y'),
            'cartItems' => $orders,
            'user' => $user,
        ];

        $pdf = PDF::loadView('shop_receipt_pdf', $data);

        return $pdf->download('Hikayat_receipt_' . $order_id . '.pdf');
    }

    public function getShopRiyalReceipt($id)
    {
      $shop = Shop::where('id','=',$id)->first();
      $Riyal = Offer::where('id','=',$shop->offer)->first();
        return response()->json($Riyal->offer_name);
    }
}
