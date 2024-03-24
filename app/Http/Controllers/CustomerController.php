<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function listCustomers(Request $request)
    {
        $notification = Notification::where('section','customers')->first();
        $notification->number = Customer::count();
        $notification->save();

        $pagi = true;
        $data = Customer::paginate(10);

        if ($request->has('view_deleted')) {
            $data = Customer::onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.customers.list-customers', compact('data','pagi'));
    }

    public function addRiyal($id)
    {
        $customer = Customer::where('id', '=', $id)->first();
        return view('backend.customers.add-riyal', compact('customer'));
    }

    public function insertOffer(Request $request, $id)
    {
        $request->validate([
            'offer' => 'required'
        ],[
            'offer.required' => 'The Offer field is required.'
        ]
    );

        $existriyal = Customer::where('id', $id)->first();


        $insert = Customer::where('id', $id)->update([
            'offer' => $existriyal->offer + $request->offer
        ]);

        if ($insert) {
            $notification = array(
                'message' => 'Offer added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers')->with($notification);
        }
    }

    public function addRiyalAll()
    {
        return view('backend.customers.add-riyal');
    }


    public function insertOfferAll(Request $request)
    {
        $request->validate([
            'offer' => 'required'
        ],[
            'offer.required' => 'The Offer field is required.'
        ]
    );

        $insert =  Customer::query()->update(['offer' => DB::raw("offer + $request->offer")]);


        if ($insert) {
            $notification = array(
                'message' => 'Riyal added  Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers')->with($notification);
        }
    }


    public function deleteCustomer($id)
    {
        $del = Customer::where('id', '=', $id)->delete();

        if ($del) {
            $notification = array(
                'message' => 'Customer moved to Trash',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers')->with($notification);
        }
    }

    public function restoreCustomer($id)
    {
        $restore = Customer::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Customer restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        }
    }


    public function forceDeleteCustomer($id)
    {
        $fdelete = Customer::where('id', '=', $id)->withTrashed()->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Customer Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        }
    }


    public function deleteAllCustomer()
    {
        $delete_all = Customer::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Customers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        }
    }


    public function restoreAllCustomer()
    {
        $restore = Customer::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Customers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers', ['view_deleted' => 'DeletedCustomer'])->with($notification);
        }
    }

    public function customerHold($id){
        $customer = Customer::where('id', $id)->first();

        if ($customer->hold == 1) {
               $customer->update([
                    'hold' => 0
                ]);
        }else{
            $customer->update([
                'hold' => 1
            ]);
        }

        if ($customer) {
            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-customers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-customers')->with($notification);
        }

    }

}
