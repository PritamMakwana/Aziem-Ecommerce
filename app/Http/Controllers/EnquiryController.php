<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Notification;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $notification = Notification::where('section','enquiry')->first();
        $notification->number = Enquiry::count();
        $notification->save();

        $data = Enquiry::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.enquiry.list-enquiry', compact('data'));
    }

    public function destroy($id)
    {
        $Enquiry = Enquiry::find($id);
        $Enquiry->delete();
        $notification = array(
            'message' => 'Enquiry deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
