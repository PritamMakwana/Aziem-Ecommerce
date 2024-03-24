<?php

namespace App\Http\Controllers;

use App\Mail\ShopOwnerOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopOwner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class ShopOwnerAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/so-home/';

    public function redirectTo()
    {
        $user = Auth::guard('shop_owner')->user();

        if ($user->approved) {
            return $this->redirectTo . $user->id;
        } else {
            Auth::guard('shop_owner')->logout();
            throw ValidationException::withMessages([
                'email' => ['Your account is not approved. Please wait until it is verified and approved by admin.'],
            ]);
        }
    }

    protected function guard()
    {
        return Auth::guard('shop_owner');
    }

    /**
     * Handle shop_owner registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // dd($request->all());
        // $imagesCount = count($request->file('images', []));

        // dd($imagesCount);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:shop_owners',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'nationality' => 'required',
            'city' => 'nullable', // Make city field optional
            'shop_name' => 'required',
            'shop_category' => 'required',
            'cr_number' => 'required',
            'offer' => 'required',
            'images' => 'required|mimes:jpeg,jpg,png|max:10000'
        ]);

        // Generate OTP
        $otp = Str::random(6);

        // Send OTP to user's email
        // Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($request) {
        //     $message->to($request->email)->subject('OTP Verification');
        // });

        // $admin_mail = config('mail.from.address');

        Mail::to($request->email)->send(new ShopOwnerOtp($otp));


        // Upload Image to folder
        $imageName = time() . '.' . $request->images->extension();
        $request->images->move(public_path('Shop_images'), $imageName);

        // Get the last customer ID from the database
        $lastSO = ShopOwner::orderBy('id', 'desc')->first();

        // Calculate the next customer ID
        $nextID = $lastSO ? $lastSO->id + 1 : 1;
        $ownerID = 'SO-' . str_pad($nextID, 3, '0', STR_PAD_LEFT);

        if (empty($request->city)) {
            $city = "No City";
        }else{
            $city = $request->city;
        }

        $request->session()->put('name', $request->name);
        $request->session()->put('email', $request->email);
        $request->session()->put('password', $request->password);
        $request->session()->put('phone', $request->phone);
        $request->session()->put('address', $request->address);
        $request->session()->put('nationality', $request->nationality);
        $request->session()->put('city', $city);
        $request->session()->put('shop_name', $request->shop_name);
        $request->session()->put('shop_category', $request->shop_category);
        $request->session()->put('cr_number', $request->cr_number);
        $request->session()->put('offer', $request->offer);
        $request->session()->put('images', $imageName);
        $request->session()->put('owner_id', $ownerID);

        // Store OTP and its expiration time in session
        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expiry', now()->addMinutes(3));

        // Redirect to OTP verification page
        return redirect()->route('otp.verify');

        // // Create the ShopOwner record
        // $shopOwner = ShopOwner::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'nationality' => $request->nationality,
        //     'city' => $request->city,
        //     'shop_name' => $request->shop_name,
        //     'shop_category' => $request->shop_category,
        //     'cr_number' => $request->cr_number,
        //     'offer' => $request->offer,
        //     'images' => $imageName
        // ]);

        // // Log in the customer after successful registration
        // Auth::guard('shop_owner')->login($shopOwner);

        // return redirect()->route('so-home', ['id' => Auth::guard('shop_owner')->user()->id]);
    }

    public function showOtpVerifyForm()
    {
        return view('shop_owner.otp-verify');
    }

    public function verifyOtp(Request $request)
    {
        // Verify OTP and complete registration
        if ($request->session()->get('otp') !== $request->otp) {
            throw ValidationException::withMessages(['otp' => 'Invalid OTP']);
        }

        // Check OTP expiry
        if (now() > $request->session()->get('otp_expiry')) {
            throw ValidationException::withMessages(['otp' => 'OTP has expired. Please resend OTP.']);
        }

        // Store user data and complete registration
        $shopOwner = ShopOwner::create([
            'name' => $request->session()->get('name'),
            'email' => $request->session()->get('email'),
            'password' => Hash::make($request->session()->get('password')),
            'phone' => $request->session()->get('phone'),
            'address' => $request->session()->get('address'),
            'nationality' => $request->session()->get('nationality'),
            'city' => $request->session()->get('city'),
            'shop_name' => $request->session()->get('shop_name'),
            'shop_category' => $request->session()->get('shop_category'),
            'cr_number' => $request->session()->get('cr_number'),
            'offer' => $request->session()->get('offer'),
            'images' => $request->session()->get('images'),
            'owner_id' => $request->session()->get('owner_id'),
        ]);

        // Clear OTP session data
        $request->session()->forget('otp');
        $request->session()->forget('otp_expiry');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('password');
        $request->session()->forget('phone');
        $request->session()->forget('address');
        $request->session()->forget('nationality');
        $request->session()->forget('city');
        $request->session()->forget('shop_name');
        $request->session()->forget('shop_category');
        $request->session()->forget('cr_number');
        $request->session()->forget('offer');
        $request->session()->forget('images');

        // Set a flag to indicate successful OTP verification
        $request->session()->put('otp_verified', true);

        return redirect()->route('show-success-modal'); // Redirect to the modal route

        // // Log in the shop owner after successful registration
        // Auth::guard('shop_owner')->login($shopOwner);

        // return redirect()->route('so-home', ['id' => Auth::guard('shop_owner')->user()->id]);
    }

    public function resendOtp(Request $request)
    {
        // Generate and send new OTP
        $newOtp = Str::random(6);

        // Send OTP to user's email
        // Mail::send('emails.otp', ['otp' => $newOtp], function ($message) use ($request) {
        //     $message->to($request->session()->get('email'))->subject('New OTP Verification');
        // });
        Mail::to($request->session()->get('email'))->send(new ShopOwnerOtp($newOtp));

        // Update session with new OTP and expiry time
        $request->session()->put('otp', $newOtp);
        $request->session()->put('otp_expiry', now()->addMinutes(3));

        return redirect()->route('otp.verify');
    }

    public function showSuccessModal()
    {
        // Check if OTP was successfully verified
        if (session('otp_verified')) {
            return view('shop_owner.success'); // Replace with the path to your modal view
        }
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
