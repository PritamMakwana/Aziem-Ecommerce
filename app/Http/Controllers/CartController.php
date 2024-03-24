<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ConfirmedOrders;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function viewCart($id)
    {
        $user = Auth::guard('customer')->user();
        $cartItems = Cart::with('product', 'shop')->where('customer_id', $user->id)->where('shop_id', $id)->where('payment_status', false)->get();
        $date = Carbon::now();

        return [$cartItems, $user, $date];
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_id' => 'required|integer', // Ensure product_id is provided and an integer
            'quantity' => 'required|integer|min:1', // Ensure quantity is provided and a positive integer
        ]);

        $user = Auth::guard('customer')->user();

        // Check if the product is already in the cart
        $cartItem = Cart::where('customer_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update the quantity of the existing cart item
            $cartItem->update(['quantity' => $request->quantity]);
        } else {
            // Create a new cart item
            $cartItem = Cart::create([
                'customer_id' => $user->id,
                'product_id' => $request->product_id,
                'shop_id' => $request->shop_id,
                'quantity' => $request->quantity,
            ]);
        }

        // Get the updated cart count
        $cartCount = Cart::where('customer_id', $user->id)->count();

        // Return the updated cart count
        return response()->json(['success' => true, 'cartCount' => $cartCount]);
        // return redirect()->back();
    }

    public function confirmOrder(Request $request)
    {
        // dd($request->all());
        $shop_id = $request->shop_id;

        Cart::where('shop_id', $shop_id)->update([
            'payment_status' => true,
        ]);

        $items = Cart::where('shop_id', $shop_id)->where('payment_status', true)->get();

        $order_id = Str::uuid(); // Generate a unique UUID for the order_id

        if ($items->count() > 0) {
            $confirmedOrderData = $items->map(function ($item) use ($order_id) {
                return [
                    'order_id' => $order_id, // Use the same order_id for all items in this group
                    'shop_id' => $item->shop_id,
                    'product_id' => $item->product_id,
                    'customer_id' => $item->customer_id,
                    'quantity' => $item->quantity,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            });

            ConfirmedOrders::insert($confirmedOrderData->toArray());

            Cart::where('shop_id', $shop_id)->where('payment_status', true)->delete();
        }

        return redirect()->route('my-receipts', ['id' => Auth::guard('customer')->user()->id]);
    }

    public function deleteCartItem($cartItemId)
    {
        $cartItem = Cart::find($cartItemId);
        // dd($cartItem);
        $delete = $cartItem->delete();
        if ($delete) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
