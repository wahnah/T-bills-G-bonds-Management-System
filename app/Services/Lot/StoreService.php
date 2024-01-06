<?php

namespace App\Services\Lot;

use App\Http\Requests\StoreLotRequest;
use App\Models\Lot;
use App\Models\Resell;
use App\Models\Auction;
use App\Models\LotImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mews\Purifier\Facades\Purifier;
use DateTime;

class StoreService
{
    private StoreLotRequest $request;

    public function __construct(StoreLotRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Store a new lot.
     */
    public function storeLot()
    {
        $lot = new Lot;
        $lot->user_id = Auth::id();
        $this->saveLot($lot);
        $this->saveImages($lot->id);
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
     * Update an existing lot.
     * @param int $id
     */
    public function updateLot(int $id)
    {
        $lot = Lot::findOrFail($id);

       // Gate::authorize('edit-lot', $lot);

        $this->saveLot($lot);
       // $this->saveImages($lot->id);
    }

    /**
     * Save lot in the storage.
     * @param Lot $lot
     */
    private function saveLot(Lot $lot)
    {
        $lot->name = $this->request->title;
        $lot->description = $this->request->description;
        $lot->sec_type_id = $this->request->sec_type;
        $lot->market_id = $this->request->market;
        $lot->start_price = $this->request->price;
        $lot->competitiveTa = $this->request->price * 0.9;
        $lot->noncompetitiveTa = $this->request->price * 0.1;
        //$lot->auctionDate = $lot->auction->auctionDate;
        $lot->auction_id = $this->request->auctionDate;
        $auction = Auction::find($lot->auction_id);
        //$lot->auctionDate = $auction->auctionDate;
        //$aucDate = new DateTime($auction->auctionDate);
        //$lot->maturityDate = \Carbon\Carbon::parse($aucDate->format('Y-m-d'))->addDays($lot->sec_type->duration)->toDateString();
       // $lot->status = $this->request->for_sale ? 'sale' : 'draft';
        //$lot->end_time = \Carbon\Carbon::now()->addMinutes(3);
        $lot->auctionDate = $auction->auctionDate;
        $aucDate = new DateTime($auction->auctionDate);
        $lot->maturityDate = \Carbon\Carbon::parse($aucDate->format('Y-m-d'))->addDays($lot->sec_type->duration)->toDateString();
        $lot->status = $this->request->for_sale ? 'sale' : 'draft';
        $auctionDateTime = \Carbon\Carbon::parse($auction->auctionDate)->startOfDay();
        $now = \Carbon\Carbon::now();
        $Difference = $now->diff($auctionDateTime);
        $min = $Difference->i + ($Difference->h * 60) + ($Difference->days * 1440);
        $lot->end_time = \Carbon\Carbon::now()->addMinutes($min);

        if ($lot->sec_type_id <= 4) {
            $lot->category_id = 1;
        } else {
            $lot->category_id = 2;
            $lot->coupon_id = $this->request->couponRate;
        }
        $lot->save();
    }

    /**
     * Save lot in the storage.
     * @param Lot $lot
     */
    private function saveLotResell(Resell $resells)
    {
        $resells->lot_id = $this->request->lot;
        $resells->seller_id = $this->request->user;
        $resells->price = $this->request->price;
        $resells->value = $this->request->fval;
        $resells->maturityDate = $this->request->maturity;
        $resells->totalCouponAmount = $this->request->tcoup;
        $resells->save();
    }

    /**
     * Save images for the lot.
     * @param int $lotId
     */
    private function saveImages(int $lotId)
    {
        if (!empty($this->request->image)) {
            foreach ($this->request->image as $image) {
                $lotImage = new LotImage;
                $lotImage->path = $image->store('lots/' . $lotId, 'public');
                $lotImage->lot_id = $lotId;
                $lotImage->save();
            }
        }
    }
}
