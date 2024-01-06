<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lot;
use App\Models\Market;
use App\Models\Purchase;
use App\Models\Sec_type;
use App\Models\Coupon;
use App\Models\Auction;
use App\Models\Resell;
use App\Models\ResellBid;
use App\Services\Lot\DeleteService;
use App\Services\Lot\StoreService;
use App\Services\Lot\StoreResellService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $lots = Lot::where('user_id', Auth::id())
            ->with('images')
            ->orderByDesc('updated_at')
            ->paginate(6);
        return view('lots.all', compact('lots'));
    }


    public function indexResell()
    {
        $resells = Resell::where('seller_id', Auth::id())
            ->orderByDesc('updated_at')
            ->paginate(6);
        return view('lots.allResells', compact('resells'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreService $service
     * @return RedirectResponse
     */
    public function store(StoreService $service)
    {
        $service->storeLot();
        return redirect()->route('lots.index')->with('success', 'Lot created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreResellService $service
     * @return RedirectResponse
     */
    public function storeResell(StoreResellService $service)
    {
        $service->storeLotResell();
        return redirect()->route('lots.myresells')->with('success', 'Lot created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Lot $lot
     * @return Application|Factory|View
     */
    public function resell(Lot $id)
    {
        $lot = $id;
        $purchase = Purchase::where('lot_id', $lot->id)->first();
        $user = $purchase->user_id;
        $value = $purchase->faceValue;
        $price = $purchase->price;
        $totalC =$purchase->totalCouponAmount;
        $maturity = $purchase->lot->maturityDate;
        //$name = $purchase->lot->name;
        //$description = $purchase->lot->description;
        //$sec_types = $purchase->lot->sec_type_id;
        //$markets = $purchase->lot->market_id;
        return view('lots.resell', compact('lot', 'user', 'value', 'purchase', 'price', 'maturity', 'totalC'));
    }

    /**
     * Display the specified resource.
     *
     * @param Lot $lot
     * @return Application|Factory|View
     */
    public function show(Lot $lot)
    {
        //Gate::authorize('show-lot', $lot);

        $purchase = Purchase::where('lot_id', $lot->id)->first();

       // if(Auth::id() == $purchase->user->id){
        return view('lots.one', compact('lot', 'purchase'));
     //   }else{
      //      return view('expired', compact('lot'));
      //  }
    }


    public function resellShow(Resell $resell)
    {
        //Gate::authorize('show-lot', $lot);
        //$purchase = Purchase::where('lot_id', $lot->id)->first();
        $bids = ResellBid::where('resell_id', $resell->id)->get();
        return view('lots.resellone', compact('bids', 'resell'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lot $lot
     * @return Application|Factory|View
     */
    public function edit(Lot $lot)
    {
        $categories = Category::all();
        $markets = Market::all();
        $coupons = Coupon::all();
        $auctions = auction::all();
        $sec_types = Sec_type::all();
        Gate::authorize('edit-lot', $lot);
        return view('lots.edit', compact('lot', 'categories', 'markets', 'sec_types', 'coupons', 'auctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreService $service
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreService $service, int $id)
    {
        $service->updateLot($id);
        return redirect()->route('lots.show', $id)->with('success', 'Lot update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        DeleteService::delete($id);
        return redirect()->route('lots.index')->with('success', 'Lot delete successfully.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function primaryBonds()
    {
        $lots = Lot::where('status', 'sale')
            ->where('end_time', '>', now())
            ->where('market_id', 1)
            ->where('category_id', 2)
            ->with('user', 'category', 'bids')
            ->orderByDesc('updated_at')
            ->paginate(6);
        return view('markets.primaryBonds', compact('lots'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function primaryBills()
    {
        $lots = Lot::where('status', 'sale')
            ->where('end_time', '>', now())
            ->where('market_id', 1)
            ->where('category_id', 1)
            ->with('user', 'category', 'bids')
            ->orderByDesc('updated_at')
            ->paginate(6);
        return view('markets.primaryBills', compact('lots'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function secondaryBonds()
    {

        $resells = Resell::where('category_id', 2)
            ->where('seller_id', '!=', auth()->id())
            ->paginate(6);
       // $lots = Lot::where('status', 'sale')
           // ->where('market_id', 2)
           // ->where('category_id', 2)
            //->with('user', 'category', 'bids')
            //->orderByDesc('updated_at')
            //->paginate(6);
        return view('markets.secondaryBonds', compact('resells'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function secondaryBills()
{
    $resells = Resell::where('category_id', 1)
        ->where('seller_id', '!=', auth()->id())
        ->paginate(6);
    return view('markets.secondaryBills', compact('resells'));
}


    public function viewSecBidForm($id)
    {

        $resell = Resell::where('id', $id)->first();

        // Check if the authenticated user is the same as the Resell record's user
    if (Auth::id() == $resell->seller_id) {

        $bids = ResellBid::where('resell_id', $id)->get();
        return view('lots.resellone', compact('bids', 'resell'));

    } else {
        // If they don't match, redirect to a different page (or show an error message)
        return view('secbid', compact('resell'));
    }
    }

    public function estimateBondPrice(Lot $id){

        $lot = $id;


        return view('lots.couponsCollected', compact('lot'));

    }

    public function estimateBondPriceCalc(Lot $id, Request $request){

        $lot = $id;
        $auser = Auth::id();

        $noCoupons = $request->input('noCoups');

        $purchase = Purchase::where('lot_id', $lot->id)
        ->where('user_id', $auser)->first();
        $user = $purchase->user_id;
        $value = $purchase->faceValue;
        $price = $purchase->price;
        $totalC =$purchase->totalCouponAmount;
        $maturity = $purchase->lot->maturityDate;

        $duration = $purchase->lot->sec_type->duration;


        $nocouponT = round(($duration / 365) / 0.5);

        $coupsixm = round($totalC / $nocouponT);

        $totalCPayReceived = round($coupsixm * $noCoupons);

        $diff = round($totalC - $totalCPayReceived);

        $estimatedPrice = round($value + $diff);







        return view('lots.resell', compact('lot', 'user', 'value', 'purchase', 'price', 'maturity', 'totalC', 'estimatedPrice', 'noCoupons'));
    }
}
