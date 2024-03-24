<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    public function listShops(Request $request)
    {
        $notification = Notification::where('section','shops')->first();
        $notification->number = Shop::count();
        $notification->save();


        $pagi = true;
        $query = Shop::with('category', 'offers:id,offer_name', 'shop_owner')->paginate(10);
        // dd($query);
        if ($request->has('view_deleted')) {
            $query = Shop::with('category', 'offers:id,offer_name', 'shop_owner')->onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.shops.list-shops', compact('query','pagi'));
    }

    public function addShop()
    {
        $category_data = Category::get();
        return view('backend.shops.add-shop', compact('category_data'));
    }

    public function insertShop(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'mobile' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
        ], [
            'category.required' => 'The category field is required.',
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'address.required' => 'The address field is required.',
            'mobile.required' => 'The mobile field is required.',
            'image.mimes' => 'The image must be a JPEG, JPG, or PNG file.',
            'image.max' => 'The image must not exceed 10MB in size.'
        ]);

        // Upload Image to folder
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('Shop_images'), $imageName);

        $name = $request->name;
        $category = $request->category;
        $address = $request->address;
        $email = $request->email;
        $mobile = $request->mobile;

        $shp = new Shop();
        $shp->name = $name;
        $shp->category_id = $category;
        $shp->address = $address;
        $shp->email = $email;
        $shp->mobile = $mobile;
        $shp->image = $imageName;

        $insert = $shp->save();

        if ($insert) {
            $notification = array(
                'message' => 'Shop Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops')->with($notification);
        }
    }

    public function editShop($id)
    {
        $fetch_shop = Shop::with('category')->where('id', '=', $id)->first();
        // $fetch_shop = Shop::where('id', '=', $id)->first();
        $category_data = Category::get();

        return view('backend.shops.edit-shop', compact('fetch_shop', 'category_data'));
    }

    public function updateShop(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'mobile' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000'
        ], [
            'category.required' => 'The category field is required.',
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'address.required' => 'The address field is required.',
            'mobile.required' => 'The mobile field is required.',
            'image.mimes' => 'The image must be a JPEG, JPG, or PNG file.',
            'image.max' => 'The image must not exceed 10MB in size.'
        ]);

        $id = $request->id;

        $update = Shop::where('id', '=', $id)->first();

        if (isset($request->image)) {
            // Upload Image to folder
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Shop_images'), $imageName);
            $update->image = $imageName;
        }
        $update->name = $request->name;
        $update->category_id = $request->category;
        $update->address = $request->address;
        $update->email = $request->email;
        $update->mobile = $request->mobile;

        $status = $update->save();

        if ($status) {
            $notification = array(
                'message' => 'Shop Details Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops')->with($notification);
        }
    }
    public function deleteShop($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            $notification = array(
                'message' => 'Shop not found',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops')->with($notification);
        }

        $delete = $shop->delete();

        if ($delete) {
            $notification = array(
                'message' => 'Shop moved to Trash Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops')->with($notification);
        }
    }

    public function restoreShop($id)
    {
        $restore = Shop::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Shop restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        }
    }

    public function restoreAllShop()
    {
        $restore = Shop::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Shops',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        }
    }

    public function forceDeleteShop($id)
    {
        $shop = Shop::withTrashed()->find($id);
        $imageFileName = $shop->image;
        $imagePath = public_path('Shop_images/' . $imageFileName);

        // Delete the image file
        if ($imageFileName && File::exists($imagePath)) {
            File::delete($imagePath);
        }


        $fdelete = $shop->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Shop Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        }
    }

    public function deleteAllShop()
    {
        $trashedShops = Shop::onlyTrashed()->get();

        // Iterate over trashed shops
        foreach ($trashedShops as $shop) {
            $imageFileName = $shop->image;
            $imagePath = public_path('Shop_images/' . $imageFileName);

            // Delete the image file
            if ($imageFileName && File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $delete_all = Shop::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Shops',
                'alert-type' => 'success'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-shops', ['view_deleted' => 'DeletedShops'])->with($notification);
        }
    }

    public function updateStatus(Request $request, $shop)
    {
        $updateStatus = Shop::where('id', '=', $shop)->update([
            'status' => $request->input('status')
        ]);

        return response()->json(['message' => 'Status updated successfully']);
    }
}
