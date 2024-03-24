<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\ConfirmedOrders;
use App\Models\Shop;
use App\Models\UploadReceipts;
use Illuminate\Pagination\LengthAwarePaginator;

class MyCustomerController extends Controller
{
    public function myAccount($id)
    {
        if (Auth::guard('customer')->user()->id == $id) {
            $details = Customer::where('id', $id)->first();

            return view('frontend.customer.my_account', compact('details'));
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'profile_image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
        ]);

        $id = $request->id;

        $update = Customer::where('id', '=', $id)->first();

        if (isset($request->profile_image)) {
            // Upload Image to folder
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('Customer_images'), $imageName);
            $update->profile_image = $imageName;
        }
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->address = $request->address;
        $update->mobile = $request->mobile;
        $update->gender = $request->gender;

        $status = $update->save();

        if ($status) {
            $notification = array(
                'message' => 'Account Details Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect::back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return Redirect::back()->with($notification);
        }
    }

    public function myReceipts($id)
    {
        $user = Auth::guard('customer')->user();

        // Fetch all orders without eager loading
        $orders = ConfirmedOrders::where('customer_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group orders by shop_id and purchase time
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->shop_id . '_' . $order->order_id;
        });

        $shop = Shop::get();

        // Paginate the grouped orders
        $perPage = 6; // Set your desired number of cards per page

        // Get the current page from the URL query parameter 'page', default to 1
        $currentPage = request()->get('page', 1);

        // Use Laravel's built-in pagination method to paginate the grouped orders
        $paginatedOrders = new LengthAwarePaginator(
            $groupedOrders->forPage($currentPage, $perPage),
            $groupedOrders->count(),
            $perPage,
            $currentPage,
            ['path' => url("/my-receipts/{$id}")] // Specify the base path for pagination URLs
        );

        return view('frontend.customer.my-receipts', ['paginatedOrders' => $paginatedOrders, 'shop' => $shop]);
    }

    public function uploadReceipt(Request $request)
    {
        
        $request->validate([
            'shop_name' => 'required',
            'receipt_image' => 'required|mimes:jpeg,jpg,png|max:10000'
        ]);

        // Upload Image to folder
        $imageName = time() . '.' . $request->receipt_image->extension();
        $request->receipt_image->move(public_path('Receipts'), $imageName);

        $receipt = new UploadReceipts();
        $receipt->customer_id = $request->customer;
        $receipt->shop_id = $request->shop_name;

        $receipt->shop_id = $request->shop_name;
        $receipt->shop_id = $request->shop_name;

        $receipt->receipt = $imageName;

        $receipt->save();

        return redirect()->route('my-receipts', ['id' => $request->customer])->with('success', 'Receipt Uploaded Successfully!');
    }
}
