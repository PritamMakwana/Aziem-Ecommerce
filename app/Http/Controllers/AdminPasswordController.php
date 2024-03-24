<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminPasswordController extends Controller
{
    public function adminOtpPage()
    {
        $emailExists = User::where('id', '=', 1)->first();

        $email = $emailExists->email;

        if ($emailExists) {
            $this->GenrateOtp($emailExists);
        } else {
            return redirect('/admin-otp-page')->with('message', 'Email does not exist.');
        }
    return view('auth.forget-password.send-otp', compact('email'));
    }


    public function GenrateOtp($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        $Userotp = User::where('id', '=', 1)->first();
        $Userotp->otp = $otp;
        $Userotp->save();

        $data['email'] = $user->email;
        $data['title'] = 'OTP Verification';

        $data['body'] = 'Your OTP is:- ' . $otp;

        Mail::send('auth.forget-password.forget-pwd-otp-mail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function adminSendOtpData(Request $request)
    {

        $request->validate([
            'otp' => 'required'
        ],[
            'otp.required' => 'The otp field is required.'
        ]
    );

        $user =  User::where('id', '=', 1)->first();

        if ($user->otp == $request->otp) {
            $notification = array(
                'message' => 'OTP has been verified',
                'alert-type' => 'success'
            );
            return redirect()->route('admin-forget-pwd-page')->with($notification);
        } else {
            $notification = array(
                'message' => 'You entered wrong OTP',
                'alert-type' => 'error'
            );
            return redirect()->route('admin-otp-page')->with($notification);
        }

    }

    public function adminForgetPwdPage()
    {
        return view('auth.forget-password.forget-pwd-page');
    }

    public function adminForgetPwdData(Request $request)
    {
        // Validate the request data
    $request->validate([
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
    ]);

    $user = User::find(1);

    // dd($user);

    $user->password = Hash::make($request->password);
    $user->save();

    $notification = array(
        'message' => 'Password updated successfully.',
        'alert-type' => 'success'
    );

    return redirect()->route('login')->with($notification);

    }
}
