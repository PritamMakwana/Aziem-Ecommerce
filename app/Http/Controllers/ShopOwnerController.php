<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\ShopOwner;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ConfirmedOrders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopOwnerController extends Controller
{
    public function listShopOwners(Request $request)
    {
        $notification = Notification::where('section','shop_owners')->first();
        $notification->number = ShopOwner::count();
        $notification->save();

        $pagi = true;
        $data = ShopOwner::with(['category:id,name', 'offers:id,offer_name'])->paginate(10);
        // dd($data);

        if ($request->has('view_deleted')) {
            $data = ShopOwner::with(['category:id,name', 'offers:id,offer_name'])->onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.shop_owner.list-shop_owners', compact('data', 'pagi'));
    }

    public function approveShopOwner($id)
    {
        $shop_owner = ShopOwner::where('id', $id)->first();

        if ($shop_owner->approved != 1) {
            if ($shop_owner) {
                $approved = $shop_owner->update([
                    'approved' => true
                ]);
            }

            $name = $shop_owner->shop_name;
            $category = $shop_owner->shop_category;
            $address = $shop_owner->address;
            $email = $shop_owner->email;
            $mobile = $shop_owner->phone;
            $images = $shop_owner->images;
            $offer = $shop_owner->offer;

            $shp = new Shop();
            $shp->name = $name;
            $shp->category_id = $category;
            $shp->address = $address;
            $shp->email = $email;
            $shp->mobile = $mobile;
            $shp->image = $images;
            $shp->so_id = $id;
            $shp->offer = $offer;

            $insert = $shp->save();

            if ($approved) {
                $notification = array(
                    'message' => 'Shop Owner Approved',
                    'alert-type' => 'success'
                );
                return redirect()->route('list-shop_owners')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something went wrong. Please try again!',
                    'alert-type' => 'error'
                );
                return redirect()->route('list-shop_owners')->with($notification);
            }
        }

        return redirect()->route('list-shop_owners');
    }

    public function changeStatus($id)
    {
        $shop = Shop::where('so_id', '=', $id)->first();

        if ($shop->status) {
            $shop->update([
                'status' => false,
            ]);
        } else {
            $shop->update([
                'status' => true,
            ]);
        }

        return redirect()->route('so-home', ['id' => $id]);
    }

    public function productList($id)
    {
        $products = Product::where('shop_id', $id)->get();
        $query = Shop::with('shop_owner')->where('id', $id)->first();
        $so = $query->so_id;

        return view('frontend.shop_owner.product-list', compact('products', 'so', 'query'));
    }

    public function delProduct($id)
    {
        $product = Product::find($id);
        // $imageFileName = $product->image;
        // $imagePath = public_path('Product_images/' . $imageFileName);

        // Delete the image file
        // if ($imageFileName && File::exists($imagePath)) {
        //     File::delete($imagePath);
        // }


        $fdelete = $product->delete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    public function productDetails($id)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $product = Product::findOrFail($id);
        return view('frontend.shop_owner.product-details', compact('product', 'query'));
    }

    public function newProduct($id)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $shop = Shop::where('id', $id)->first();
        $category_data = Category::get();
        return view('frontend.shop_owner.new-product', compact('shop', 'category_data', 'query'));
    }

    public function createProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'shop' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000'
        ], [
            "category.required"  => "Category is required",
            "name.required" => "Product Name is required",
            "description.required" => "Description Field Is Required",
            "quantity.required" => "Quantity Field Is Required",
            "image.required" => "Image Is Required"
        ]);

        // Upload Image to folder
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('Product_images'), $imageName);

        $name = $request->name;
        $category = $request->category;
        $shop = $request->shop;
        $description = $request->description;
        $quantity = $request->quantity;

        $prod = new Product();
        $prod->product_name = $name;
        $prod->category_id = $category;
        $prod->shop_id = $shop;
        $prod->description = $description;
        $prod->quantity_available = $quantity;
        $prod->image = $imageName;

        // dd($prod);
        $insert = $prod->save();

        if ($insert) {
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product-list', ['id' => $shop])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('product-list', ['id' => $shop])->with($notification);
        }
    }

    public function myProfile($id)
    {
        if (Auth::guard('shop_owner')->user()->id == $id) {
            $shop_owner = Auth::guard('shop_owner')->user()->id;
            $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
            $owner = ShopOwner::with('offers')->where('id', $id)->first();
            $shop = Shop::where('so_id', $id)->first();
            $so = $shop->id;
            $offers = Offer::get();

            return view('frontend.shop_owner.my-profile', compact('so', 'owner', 'query', 'offers'));
        }
    }

    public function updateMyProfile(Request $request)
    {

        $request->validate([
            'shop_name' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:10',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
            'offer' => 'required'
        ], [
            'shop_name.required' => 'The shop name field is required.',
            'name.required' => 'The name field is required.',
            'address.required' => 'The address field is required.',
            'phone.required' => 'The phone field is required.',
            'phone.digits' => 'The phone field must be exactly 10 digits.',
            'image.mimes' => 'The image must be a valid jpeg, jpg, or png file.',
            'image.max' => 'The image size must not exceed 10 MB.',
            'offer.required' => 'The offer field is required.'
        ]);

        $shop_id = $request->shop_id;
        $owner_id = $request->so_id;

        $update_shop = Shop::where('id', '=', $shop_id)->first();
        $update_so = ShopOwner::where('id', $owner_id)->first();

        if (isset($request->image)) {
            // Upload Image to folder
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Shop_images'), $imageName);
            $update_shop->image = $imageName;
            $update_so->images = $imageName;
        }
        $update_shop->name = $request->shop_name;
        $update_shop->address = $request->address;
        $update_shop->mobile = $request->phone;
        $update_shop->offer = $request->offer;
        $update_shop->location = $request->location;

        $update_so->name = $request->name;
        $update_so->shop_name = $request->shop_name;
        $update_so->address = $request->address;
        $update_so->phone = $request->phone;
        $update_so->offer = $request->offer;

        $status1 = $update_shop->save();
        $status2 = $update_so->save();

        if ($status1 && $status2) {
            $notification = array(
                'message' => 'Shop Details Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('my-profile', ['id' => $owner_id])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('my-profile', ['id' => $owner_id])->with($notification);
        }
    }

    public function orderList($id)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $user = Auth::guard('shop_owner')->user();
        $so = $user->id;
        // $items = ConfirmedOrders::with('product', 'shop')->where('customer_id', $user->id)->get();

        $orders = ConfirmedOrders::with('product', 'shop')
            ->where('shop_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group orders by shop_id and purchase time
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->shop_id . '_' . $order->order_id;
        });

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
            ['path' => url("/order-list/{$id}")] // Specify the base path for pagination URLs
        );

        return view('frontend.shop_owner.order-list', ['paginatedOrders' => $paginatedOrders, 'so' => $so, 'shop_id' => $id, 'query' => $query]);
    }

    public function shopReceipt($order_id)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $user = Auth::guard('shop_owner')->user();
        $so = $user->id;
        $orders = ConfirmedOrders::with(['customer', 'shop', 'product'])
            ->where('order_id', $order_id)
            ->get();
        $time = Carbon::now()->format('d-M-Y');

        return view('frontend.shop_owner.shop_receipt', compact('orders', 'so', 'time', 'query'));
    }

    public function confirmAmount(Request $request)
    {
        $order_id = $request->order_id;
        $shop_id = $request->shop_id;
        $discount = $request->discount_amount;

        // Use regular expressions to match and extract the integer
        $pattern = '/(\d+)\s+Riyal/';

        if (preg_match($pattern, $discount, $matches)) {
            $integerValue = (int)$matches[1];
        }
        // dd($integerValue);

        // Retrieve the ordered products and their quantities
        $orderedProducts = ConfirmedOrders::with('product')->where('order_id', $order_id)->get();

        // Update customer wallet
        $find_customer = ConfirmedOrders::with('customer')->where('order_id', $order_id)->first();
        $cust_id = $find_customer->customer->id;
        $customer = Customer::where('id', $cust_id)->first();

        // Calculate the new offer
        $newOffer = $customer->offer - $integerValue;

        if ($newOffer >= 0) {
            // Update the customer's offer
            // dd($newOffer);
            $customer->update(['offer' => $newOffer]);
        } else {
            // The customer's offer is insufficient
            return redirect()->back()->with('error', "Order cannot be completed because of insufficient funds in customer wallet.");
        }

        // Loop through ordered products and update quantity_available
        foreach ($orderedProducts as $orderedProduct) {
            $product = $orderedProduct->product;
            $quantityOrdered = $orderedProduct->quantity; // Assuming there's a 'quantity' column in ConfirmedOrders

            // Calculate the new quantity_available
            $newQuantityAvailable = $product->quantity_available - $quantityOrdered;
            // dd($product, $quantityOrdered, $newQuantityAvailable);

            // Update the quantity_available in the products table
            $product->update(['quantity_available' => $newQuantityAvailable]);
        }

        $orders = ConfirmedOrders::where('order_id', $order_id)->update([
            'total_amount' => $request->total_amount,
            'discount_amount' => $integerValue,
            'status' => 1,
        ]);

        return redirect()->route('order-list', ['id' => $shop_id])->with('success', 'Order Confirmed');
    }

    public function customerList($id)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $user = Auth::guard('shop_owner')->user();
        $so = $user->id;

        $orders = ConfirmedOrders::with('customer', 'product', 'shop')
            ->where('shop_id', $id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group orders by shop_id and purchase time
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->shop_id . '_' . $order->order_id;
        });

        // Paginate the grouped orders
        $perPage = 5; // Set your desired number of cards per page

        // Get the current page from the URL query parameter 'page', default to 1
        $currentPage = request()->get('page', 1);

        // Use Laravel's built-in pagination method to paginate the grouped orders
        $paginatedOrders = new LengthAwarePaginator(
            $groupedOrders->forPage($currentPage, $perPage),
            $groupedOrders->count(),
            $perPage,
            $currentPage,
            ['path' => url("/customer-list/{$id}")] // Specify the base path for pagination URLs
        );

        return view('frontend.shop_owner.customer-list', ['paginatedOrders' => $paginatedOrders, 'so' => $so, 'query' => $query]);
    }

    public function updateProductDetails(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
        ], [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
            'quantity.required' => 'The quantity field is required.',
            'image.mimes' => 'The image must be a JPEG, JPG, or PNG file.',
            'image.max' => 'The image size must not exceed 10 MB.'
        ]);

        $id = $request->id;

        $update = Product::where('id', '=', $id)->first();

        if (isset($request->image)) {
            // Upload Image to folder
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Product_images'), $imageName);
            $update->image = $imageName;
        }
        $update->product_name = $request->name;
        $update->description = $request->description;
        $update->quantity_available = $request->quantity;

        $status = $update->save();

        if ($status) {
            $notification = array(
                'message' => 'Product Details Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product-details', ['id' => $id])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('product-details', ['id' => $id])->with($notification);
        }
    }

    // public function search(Request $request)
    // {
    //     $status = $request->input('status'); // Get selected status filter
    //     $dateRange = $request->input('sort_date'); // Get selected date range filter
    //     $shop_id = $request->shop_id;

    //     $user = Auth::guard('shop_owner')->user();
    //     $so = $user->id;
    //     // $items = ConfirmedOrders::with('product', 'shop')->where('customer_id', $user->id)->get();

    //     // $orders = ConfirmedOrders::with('product', 'shop')
    //     //     ->where('shop_id', $shop_id)
    //     //     ->where('status', $status)
    //     //     ->orderBy('created_at', 'desc')
    //     //     ->get();

    //     $orders = ConfirmedOrders::with('product', 'shop')
    //         ->where('shop_id', $shop_id)
    //         ->when($status !== null, function ($query) use ($status) {
    //             return $query->where('status', $status);
    //         })
    //         ->when($dateRange !== null, function ($query) use ($dateRange) {
    //             switch ($dateRange) {
    //                 case 'today':
    //                     return $query->whereDate('created_at', now());
    //                 case 'last_7_days':
    //                     return $query->whereDate('created_at', '>', now()->subDays(7));
    //                 case 'this_month':
    //                     return $query->whereMonth('created_at', now()->month);
    //                 case 'last_month':
    //                     return $query->whereMonth('created_at', now()->subMonth()->month);
    //                     // Add more date range cases as needed
    //                 default:
    //                     return $query;
    //             }
    //         })
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Group orders by shop_id and purchase time
    //     $groupedOrders = $orders->groupBy(function ($order) {
    //         return $order->shop_id . '_' . $order->order_id;
    //     });

    //     return view('frontend.shop_owner.order-list', [
    //         'groupedOrders' => $groupedOrders,
    //         'so' => $so, 'shop_id' => $shop_id,
    //         'selectedStatus' => $status,
    //         'selectedDateRange' => $dateRange,
    //     ]);
    // }

    public function search(Request $request)
    {
        $shop_owner = Auth::guard('shop_owner')->user()->id;
        $query = Shop::with('shop_owner')->where('so_id', $shop_owner)->first();
        $status = $request->input('status'); // Get selected status filter
        $dateRange = $request->input('sort_date'); // Get selected date range filter
        $shop_id = $request->shop_id;

        $user = Auth::guard('shop_owner')->user();
        $so = $user->id;

        $orders = ConfirmedOrders::with('product', 'shop')
            ->where('shop_id', $shop_id)
            ->when($status !== null, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($dateRange !== null, function ($query) use ($dateRange) {
                switch ($dateRange) {
                    case 'today':
                        return $query->whereDate('created_at', now());
                    case 'last_7_days':
                        return $query->whereDate('created_at', '>', now()->subDays(7));
                    case 'this_month':
                        return $query->whereMonth('created_at', now()->month);
                    case 'last_month':
                        return $query->whereMonth('created_at', now()->subMonth()->month);
                        // Add more date range cases as needed
                    default:
                        return $query;
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Group orders by shop_id and purchase time
        $groupedOrders = $orders->groupBy(function ($order) {
            return $order->shop_id . '_' . $order->order_id;
        });

        // Paginate the grouped orders
        $perPage = 6; // Set your desired number of items per page

        // Get the current page from the URL query parameter 'page', default to 1
        $currentPage = request()->get('page', 1);

        // Use Laravel's built-in pagination method to paginate the grouped orders
        $paginatedOrders = new LengthAwarePaginator(
            $groupedOrders->forPage($currentPage, $perPage),
            $groupedOrders->count(),
            $perPage,
            $currentPage,
            ['path' => url('search')] // Use the named route for the search
        );

        return view('frontend.shop_owner.order-list', [
            'paginatedOrders' => $paginatedOrders,
            'so' => $so,
            'shop_id' => $shop_id,
            'selectedStatus' => $status,
            'selectedDateRange' => $dateRange,
            'query' => $query
        ]);
    }



    public function deleteShopOwner($id)
    {
        $shop_owner = ShopOwner::where('id', $id)->first();

        if ($shop_owner->approved == 1) {
            // if ($shop_owner) {
               $shop_owner->update([
                    'approved' => false
                ]);
            // }
        }

        // dd($shop_owner);

        $del = ShopOwner::where('id', '=', $id)->delete();





        if ($del) {
            $notification = array(
                'message' => 'Offer moved to Trash',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners')->with($notification);
        }
    }

    public function restoreShopOwner($id)
    {
        $restore = ShopOwner::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Offer restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        }
    }


    public function forceDeleteShopOwner($id)
    {
        $fdelete = ShopOwner::where('id', '=', $id)->withTrashed()->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Offer Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        }
    }


    public function deleteAllShopOwners()
    {
        $delete_all = ShopOwner::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Offers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        }
    }


    public function restoreAllShopOwners()
    {
        $restore = ShopOwner::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Offers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners', ['view_deleted' => 'DeletedShopOwners'])->with($notification);
        }
    }

    public function shopHold($id){
        $shop_owner = ShopOwner::where('id', $id)->first();

        if ($shop_owner->hold == 1) {
               $shop_owner->update([
                    'hold' => 0
                ]);
        }else{
            $shop_owner->update([
                'hold' => 1
            ]);
        }

        if ($shop_owner) {
            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shop_owners')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shop_owners')->with($notification);
        }

    }

}
