<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ConfirmedOrders;

class OrderController extends Controller
{
    public function listConfirmOrder(Request $request)
    {

        $notification = Notification::where('section','orders')->first();
        $notification->number = ConfirmedOrders::count();
        $notification->save();


        $pagi = true;
        $data = ConfirmedOrders::with('product','shop','customer')->paginate(10);

        // dd($data);

        if ($request->has('view_deleted')) {
            $data = ConfirmedOrders::onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.orders.list-orders', compact('data','pagi'));

    }

    public function deleteOrder($id)
    {
        $del = ConfirmedOrders::where('id', '=', $id)->delete();

        if ($del) {
            $notification = array(
                'message' => 'Order moved to Trash',
                'alert-type' => 'success'
            );
            return redirect()->route('list-confirm-order')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-confirm-order')->with($notification);
        }
    }

    public function restoreOrder($id)
    {
        $restore = ConfirmedOrders::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Order restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        }
    }

    public function restoreAllOrder()
    {
        $restore = ConfirmedOrders::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Orders',
                'alert-type' => 'success'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        }
    }

    public function forceDeleteOrder($id)
    {
        $fdelete = ConfirmedOrders::where('id', '=', $id)->withTrashed()->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Order Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        }
    }

    public function deleteAllOrder()
    {
        $delete_all = ConfirmedOrders::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Orders',
                'alert-type' => 'success'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-confirm-order', ['view_deleted' => 'DeletedConfirmOrder'])->with($notification);
        }
    }
}
