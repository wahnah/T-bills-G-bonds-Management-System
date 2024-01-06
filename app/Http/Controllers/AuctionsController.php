<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Lot;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $auctions = Auction::where('cat_id', 1)
        ->where('auctionDate', '>', now())
        ->get();

        $auctionz = Auction::where('cat_id', 2)
        ->where('auctionDate', '>', now())
        ->get();

        return view('auction', compact('auctions', 'auctionz'));
    }





    /**
     * Display the specified resource.
     *
     * @param Auction $auction
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $auction = Auction::find($id);

        $lotIds = Lot::where('auction_id', $auction->id)
            ->orderByDesc('updated_at')
            ->pluck('id');

        $lots = Lot::whereIn('id', $lotIds)
            ->paginate(6);

        return view('lots.all', compact('lots'));
    }
}
