<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\UploadReceipts;

class MyReceiptController extends Controller
{
    public function listReceipts()
    {
        $notification = Notification::where('section','receipts')->first();
        $notification->number = UploadReceipts::count();
        $notification->save();

        $data = UploadReceipts::with(['customer', 'shop'])->paginate(10);
        return view('backend.receipts.list-receipts', compact('data'));
    }

    public function approveReceipt($id)
    {
        $receipt = UploadReceipts::where('id', $id)->first();

        if ($receipt->approved != 1) {
            if ($receipt) {
                $approved = $receipt->update([
                    'approved' => true
                ]);
            }

            if ($approved) {
                $notification = array(
                    'message' => 'Receipt was Verified and Approved',
                    'alert-type' => 'success'
                );
                return redirect()->route('list-receipts')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something went wrong. Please try again!',
                    'alert-type' => 'error'
                );
                return redirect()->route('list-receipts')->with($notification);
            }
        }
    }
}
