<?php

namespace App\Services\Lot;

use App\Http\Requests\StoreResellRequest;
use App\Models\Lot;
use App\Models\Resell;
use App\Models\Auction;
use App\Models\LotImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mews\Purifier\Facades\Purifier;
use DateTime;

class StoreResellService
{
    private StoreResellRequest $request;

    public function __construct(StoreResellRequest $request)
    {
        $this->request = $request;
    }



    /**
     * Store a new lot.
     */
    public function storeLotResell()
    {
        $resells = new Resell;
        $resells->seller_id = Auth::id();
        $this->saveLotResell($resells);

    }


    /**
     * Save lot in the storage.
     * @param Lot $lot
     */
    private function saveLotResell(Resell $resells)
    {
        $lotId = $this->request->lot;
        $cat = Lot::where('id', $lotId)->first();
        $resells->lot_id = $lotId;
        $resells->seller_id = $this->request->user;
        $resells->price = $this->request->price;
        $resells->value = $this->request->fval;
        $resells->maturityDate = $this->request->maturity;
        $resells->totalCouponAmount = $this->request->tcoup;
        $resells->category_id = $cat->category_id;
        $resells->purchase_id = $this->request->purchase;
        $resells->save();
    }

}
