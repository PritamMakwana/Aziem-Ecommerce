<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProducts(Request $request)
    {
        $pagi = true;
        $products = Product::with('category', 'shop')->paginate(10);

        if ($request->has('view_deleted')) {
            $products = Product::with('category', 'shop')->onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.products.list-products', compact('products', 'pagi'));
    }

    public function addProduct()
    {
        $category_data = Category::get();
        $shop_data = Shop::get();
        return view('backend.products.add-product', compact('category_data', 'shop_data'));
    }

    public function insertProduct(Request $request)
    {
        $request->validate(
            [
                'category' => 'required',
                'name' => 'required',
                'shop' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:10000'
            ],
            [
                'category.required' => 'Category field is required.',
                'name.required' => 'Product Name field is required.',
                'shop.required' => 'Shop Name field is required.',
                'description.required' => 'Description field is required.',
                'quantity.required' => 'Quantity field is required.',
                'image.required' => 'Image field is required.',
                'image.mimes' => 'The image must be a valid JPEG, JPG, or PNG file.',
                'image.max' => 'The image must not exceed 10MB in size.',
            ]
        );


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

        $insert = $prod->save();

        if ($insert) {
            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products')->with($notification);
        }
    }

    public function editProduct($id)
    {
        $data = Product::with('category', 'shop')->where('id', '=', $id)->first();
        $category_data = Category::get();
        $shop_data = Shop::get();

        return view('backend.products.edit-product', compact('data', 'category_data', 'shop_data'));
    }

    public function updateProduct(Request $request)
    {
        $request->validate(
            [
                'category' => 'required',
                'name' => 'required',
                'shop' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:10000'
            ],
            [
                'category.required' => 'Category field is required.',
                'name.required' => 'Product Name field is required.',
                'shop.required' => 'Shop Name field is required.',
                'description.required' => 'Description field is required.',
                'quantity.required' => 'Quantity field is required.',
                'image.required' => 'Image field is required.',
                'image.mimes' => 'The image must be a valid JPEG, JPG, or PNG file.',
                'image.max' => 'The image must not exceed 10MB in size.',
            ]
        );

        $id = $request->id;

        $update = Product::where('id', '=', $id)->first();

        if (isset($request->image)) {
            // Upload Image to folder
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Product_images'), $imageName);
            $update->image = $imageName;
        }
        $update->product_name = $request->name;
        $update->category_id = $request->category;
        $update->shop_id = $request->shop;
        $update->description = $request->description;
        $update->quantity_available = $request->quantity;

        $status = $update->save();

        if ($status) {
            $notification = array(
                'message' => 'Product Details Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products')->with($notification);
        }
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            $notification = array(
                'message' => 'Product not found',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products')->with($notification);
        }

        $delete = $product->delete();

        if ($delete) {
            $notification = array(
                'message' => 'Product moved to Trash Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products')->with($notification);
        }
    }

    public function restoreProduct($id)
    {
        $restore = Product::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Product restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        }
    }

    public function restoreAllProduct()
    {
        $restore = Product::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Products',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        }
    }

    public function forceDeleteProduct($id)
    {
        $product = Product::withTrashed()->find($id);
        $imageFileName = $product->image;
        $imagePath = public_path('Product_images/' . $imageFileName);

        // Delete the image file
        if ($imageFileName && File::exists($imagePath)) {
            File::delete($imagePath);
        }


        $fdelete = $product->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        }
    }

    public function deleteAllProduct()
    {
        $trashedProducts = Product::onlyTrashed()->get();

        // Iterate over trashed products
        foreach ($trashedProducts as $product) {
            $imageFileName = $product->image;
            $imagePath = public_path('Product_images/' . $imageFileName);

            // Delete the image file
            if ($imageFileName && File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $delete_all = Product::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Products',
                'alert-type' => 'success'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-products', ['view_deleted' => 'DeletedProducts'])->with($notification);
        }
    }
}
