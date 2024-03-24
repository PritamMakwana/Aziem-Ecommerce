<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopOwner;
use App\Models\Product;
use App\Models\Customer;
use App\Models\JobRegistration;
use App\Models\Offer;
use App\Models\UploadReceipts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryCount = Category::count();
        $shopCount = Shop::count();
        $productCount = Product::count();
        $customerCount = Customer::count();
        $shopOwnerCount = ShopOwner::count();
        $jobCount = JobRegistration::count();
        $receipts = UploadReceipts::count();
        $offers = Offer::count();

        return view('backend.layouts.dashboard', compact('categoryCount', 'shopCount', 'productCount', 'customerCount', 'shopOwnerCount', 'jobCount', 'offers','receipts'));
    }

}
