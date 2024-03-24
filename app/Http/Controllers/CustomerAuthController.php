<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/Stores';

    // Use the 'customer' guard for customer authentication
    protected function guard()
    {
        return Auth::guard('customer');
    }

    /**
     * Handle customer registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {


        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'register-email' => 'required|string|email|max:255|unique:customers,email',
            'register-password' => 'required|string|min:8|confirmed',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'gender' => 'required',
            'profile_image' => 'required|mimes:jpeg,jpg,png|max:10000'
        ]);

        // Upload Image to folder
        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('Customer_images'), $imageName);

        // Get the last customer ID from the database
        $lastCustomer = Customer::orderBy('id', 'desc')->first();

        // Calculate the next customer ID
        $nextID = $lastCustomer ? $lastCustomer->id + 1 : 1;
        $customerID = 'CS-' . str_pad($nextID, 3, '0', STR_PAD_LEFT);

        // Create a new customer record
        $customer = Customer::create([
            'customer_id' => $customerID,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('register-email'),
            'password' => Hash::make($request->input('register-password')),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'profile_image' => $imageName,
        ]);

        // dd($customer);

        // Log in the customer after successful registration
        Auth::guard('customer')->login($customer);

        return redirect()->route('Stores');
    }

    // Show the login form
    // public function showLoginForm()
    // {
    //     return view('customer.customer_login');
    // }

    // Logout the customer
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('Stores'); // Redirect to the desired page after logout
    }
}
