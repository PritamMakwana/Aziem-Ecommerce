<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function listOffers(Request $request)
    {
        $pagi = true;
        $data = Offer::orderByRaw(
            "CAST(SUBSTRING_INDEX(offer_name, ' ', 1) AS SIGNED) ASC"
        )->paginate(10);

        if ($request->has('view_deleted')) {
            $data = Offer::onlyTrashed()->get();
            $pagi = false;
        }

        return view('backend.offers.list-offers', compact('data', 'pagi'));
    }

    public function addOffer()
    {
        return view('backend.offers.add-offers');
    }

    public function insertOffer(Request $request)
    {
        $request->validate([
            'offer' => 'required',
        ], [
            'offer.required' => 'offer field is required.',
        ]);

        $offer_name = $request->offer . " Riyal";

        $offer_fetch = Offer::all();

        foreach ($offer_fetch as $value) {

            if ($value->offer_name == $offer_name) {
                $notification = array(
                    'message' => $offer_name . ' already exists !',
                    'alert-type' => 'error'
                );
                return redirect()->route('add-offer')->with($notification);
            }
        }




        $offers = new Offer();
        $offers->offer_name = $offer_name;
        $insert = $offers->save();

        if ($insert) {
            $notification = array(
                'message' => 'Offer Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers')->with($notification);
        }
    }


    public function editOffer($id)
    {
        $fetch = Offer::where('id', '=', $id)->first();

        $s = explode(" ", $fetch->offer_name);
        $offer_number = $s[0];

        return view('backend.offers.edit-offers', compact('fetch', 'offer_number'));
    }

    public function updateOffer(Request $request)
    {
        $request->validate([
            'offer' => 'required',
        ], [
            'offer.required' => 'Offer field is required.',
        ]);

        $id = $request->id;
        $offer_name = $request->offer . " Riyal";

        $offer_fetch = Offer::all();

        foreach ($offer_fetch as $value) {

            if ($value->offer_name == $offer_name) {
                $notification = array(
                    'message' => $offer_name . ' already exists !',
                    'alert-type' => 'error'
                );
                return redirect()->route('edit-offer', ['id' => $id])->with($notification);
            }
        }


        $update = Offer::where('id', '=', $id)->update([
            'offer_name' => $offer_name
        ]);

        if ($update) {
            $notification = array(
                'message' => 'Offer Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers')->with($notification);
        }
    }

    public function deleteOffer($id)
    {
        $del = Offer::where('id', '=', $id)->delete();

        if ($del) {
            $notification = array(
                'message' => 'Offer moved to Trash',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers')->with($notification);
        }
    }

    public function restoreOffer($id)
    {
        $restore = Offer::withTrashed()->find($id)->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Offer restored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        }
    }


    public function forceDeleteOffer($id)
    {
        $fdelete = Offer::where('id', '=', $id)->withTrashed()->forceDelete();

        if ($fdelete) {
            $notification = array(
                'message' => 'Offer Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        }
    }


    public function deleteAllOffer()
    {
        $delete_all = Offer::onlyTrashed()->forceDelete();

        if ($delete_all) {
            $notification = array(
                'message' => 'Deleted All Trashed Offers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        }
    }


    public function restoreAllOffer()
    {
        $restore = Offer::onlyTrashed()->restore();

        if ($restore) {
            $notification = array(
                'message' => 'Restored All Trashed Offers',
                'alert-type' => 'success'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went wrong. Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->route('list-offers', ['view_deleted' => 'DeletedOffers'])->with($notification);
        }
    }
}
