<?php

namespace App\Http\Controllers;

use App\Events\BidEvent;
use App\Services\MakeBidService;
use Illuminate\Http\RedirectResponse;
use App\Models\ResellBid;
use App\Models\Resell;
use App\Models\Resold;
use App\Models\Bid;
use App\Models\User;
use App\Models\Tbid;
use App\Models\Lot;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SecondaryPurchaseNotification;
use App\Notifications\SecondarySaleNotification;
use Illuminate\Support\Facades\Notification;

class BidController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param MakeBidService $service
     * @return RedirectResponse
     */
    public function store(MakeBidService $service)
    {
        event(new BidEvent($service->bid));
        return back()->with('success', 'Your bid is accepted.');
    }



    public function populateReBids(Request $request){
        $buyer_id = Auth::id();
        $resell = Resell::findOrFail($request->resell);
        $bid_amount = $request->resbid;

        $sumAllUserActiveBids = Bid::where('user_id', Auth::id())->where('is_active', true)->sum('price');


        $buyer_balance = User::where('id', $buyer_id)->value('balance');
         if ($bid_amount > $buyer_balance || !(Auth::user()->balance >= (int)$bid_amount + $sumAllUserActiveBids)) {
            return back()->with('error', 'Insufficient balance.');
        }
         $rebid = new ResellBid();
        $rebid->resell_id = $resell->id;
        $rebid->buyer_id = $buyer_id;
        $rebid->price = $bid_amount;
        $rebid->save();
         return back()->with('success', 'Your bid is accepted.');
    }

    public function acceptBid(Request $request, $resell, $bid)
    {

        $resell = Resell::findOrFail($resell);
        $bid = ResellBid::findOrFail($bid);
        $lot = Lot::findOrFail($resell->lot_id);
        $user = Auth::user();
        $purchase = Purchase::findOrFail($resell->purchase_id);


    // Update the buyer's balance in the bids table
    $buyer = User::find($bid->buyer_id)->decrement('balance', $bid->price);

    // Update the owner's balance in the resells table
    $owner = User::find($resell->seller_id)->increment('balance', $bid->price);


    $interest = 0;
    $resid = 1;

    // Step 4: Create a new purchase record
    Purchase::create([
        'user_id' => $bid->buyer_id,
        'lot_id' => $resell->lot_id,
        'price' => $bid->price,
        'faceValue' => $purchase->faceValue,
        'interest' => $interest,
        'resell' => $resid,
    ]);


    Resold::create([
        'lot_id' => $resell->lot_id,
        'seller_id' => $resell->seller_id,
        'buyer_id' => $bid->buyer_id,
        'category_id' =>$resell->lot->category_id,
        'price' => $bid->price,
    ]);

    // Send email notifications to the buyer and the owner
    $buyerEmail = User::find($bid->buyer_id)->email;
    $ownerEmail = User::find($resell->seller_id)->email;
    //Mail::to($buyerEmail)->send(new PurchaseNotification($lot->name));
    //Mail::to($ownerEmail)->send(new SaleNotification($lot->name));

    // Send notification to admin
    Notification::route('mail', $buyerEmail)->notify(new SecondaryPurchaseNotification($lot));
    Notification::route('mail', $ownerEmail)->notify(new SecondarySaleNotification($lot));

    // Delete purchase for owner
    $purchase->delete();

    // Delete the resell and all associated bids
    $resell->delete();
    $relatedBids = ResellBid::where('resell_id', $resell->id)->get();
    foreach ($relatedBids as $relatedBid) {
        $relatedBid->delete();
    }

    $resells = Resell::where('seller_id', Auth::id())
    ->orderByDesc('updated_at')
    ->paginate(6);

    return view('lots.allResells', compact('resells'));

    }

    public function deleteResell($resell)
    {
        $resell = Resell::findOrFail($resell);
        $resell->delete();

        $resells = Resell::where('seller_id', Auth::id())
            ->orderByDesc('updated_at')
            ->paginate(6);
        return view('lots.allResells', compact('resells'));

    }


    public function allBids(){

        $tbids = Tbid::where('user_id', Auth::id())
        ->where('is_active', true)
        ->get();

        return view('myBids', compact('tbids'));
    }


    public function deletebid($id){

        $bid = Tbid::findOrFail($id);
        $bid->delete();


        $tbids = Tbid::where('user_id', Auth::id())
        ->where('is_active', true)
        ->get();

        return view('myBids', compact('tbids'));

    }
}
