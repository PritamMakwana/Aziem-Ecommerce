<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Shop;
use App\Models\User;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ConfirmedOrders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class FrontEndController extends Controller
{
    public function listShops($id = null)
    {

        if(!empty($id)){
            $query = Shop::with('category','shop_owner')->where('category_id',$id)->paginate(6);
            $category_id = $id;
        } else {
            $query = Shop::with('category','shop_owner')->paginate(6);
            $category_id = 0;
        }

        // dd($query);
        $category = Category::get();
        $offers = Offer::get();

        if (auth('customer')->check()) {
            // dd($a);
            $customer = auth('customer')->user();
            if ($customer) {
                //     // Check if $customer is not null
                if ($customer->has_seen_model != '2') {
                    // Perform actions for the first login
                    $customer->update(['has_seen_model' => auth('customer')->user()->has_seen_model+1]);
                    // $customer->has_seen_model = true;
                    // $customer->save();
                }
            }
        }

        return view('frontend.layouts.main_content', compact('query', 'category', 'offers','category_id'));
    }

    public function viewStore($id)
    {
        $fetch = Shop::with('category')->where('id', '=', $id)->first();
        $fetch_products = Product::with('category', 'shop')->where('shop_id', '=', $id)->paginate(6);
        return view('frontend.layouts.view-store', compact('fetch', 'fetch_products'));
    }

    public function homeShopOwner($id)
    {
        if (Auth::guard('shop_owner')->user()->id == $id) {
            $query = Shop::with('shop_owner')->where('so_id', $id)->first();
            $productCount = Product::where('shop_id', $query->id)->count();
            $customersCount = ConfirmedOrders::where('shop_id', $query->id)
                ->distinct('customer_id')
                ->count('customer_id');
            $receiptsCount = ConfirmedOrders::where('shop_id', $query->id)->distinct('order_id')
                ->count('order_id');

            // dd($query);
            // $category = Category::get();
            // $offers = Offer::get();
            return view('frontend.shop_owner.so-home', compact('query', 'productCount', 'customersCount', 'receiptsCount'));
        }
    }

    public function submitContactForm(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], [
            'name.required' => 'Name is required',
            'contact_no.required' => 'Phone number field cannot be empty.',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'message.required' => 'Message field cannot be empty'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $enquiry = new Enquiry();
        $enquiry->name = $request->input('name');
        $enquiry->phone = $request->input('contact_no');
        $enquiry->email = $request->input('email');
        $enquiry->message = $request->input('message');
        $insert = $enquiry->save();



        // Send the email
        $data = [
            'name' => $request->input('name'),
            'contact_no' => $request->input('contact_no'),
            'email' => $request->input('email'),
            'message_text' => $request->input('message'),
        ];

        $mail = Mail::send('emails.contact', $data, function ($message) use ($data){
            $users = User::find(1);
            $message->to($users->email)->subject('Contact Form Submission');
        });

        if ($insert) {
            // Show a success alert
            return redirect()->route('contact')->with('success', 'Your response was submitted successfully.');
        }
    }
}
