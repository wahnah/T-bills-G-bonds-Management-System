<?php

namespace App\Services;

use App\Http\Requests\StoreBidRequest;
use App\Models\Tbid;
use App\Models\Bid;
use App\Models\Lot;
use App\Models\Coupon;
use App\Models\Bill1;
use App\Models\Bond1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MakeBidService
{
    public Tbid $bid;
    private StoreBidRequest $request;
    private Lot $lot;

    public function __construct(StoreBidRequest $request)
    {
        $this->request = $request;
        $this->lot = Lot::findOrFail($request->lot);
        $this->storeBid();
    }

    /**
     * Save the bid to the storage
     */
    private function storeBid()
    {
        Gate::authorize('store-bid', $this->lot);


        DB::transaction(function () {
            Tbid::where('user_id', Auth::id())
                 ->where('lot_id', $this->request->lot)
                 ->update(['is_active' => false]);

        $pricez = $this->request->bidtype;

        if ($pricez == 'competitiveTa') {
            $bondmultiple = 5000;
        } else {
            $bondmultiple = 1000;
        }

        $catid = $this->lot->sec_type->cat_id;

        $p = $this->lot->sec_type->duration;

        $this->bid = new Tbid;
        $this->bid->premium = $this->request->bid;
        $this->bid->yield_rate = $this->request->bid1;
        $this->bid->lot_id = $this->request->lot;
        $this->bid->multiple = $bondmultiple;
        $this->bid->bidtype = $this->request->bidtype;
        $this->bid->cat_id = $catid;
        $this->bid->duration = $p;
        $this->bid->user_id = Auth::id();
        $this->bid->save();

        });


      /**  DB::transaction(function () {
            *Bid::where('user_id', Auth::id())
            *    ->where('lot_id', $this->request->lot)
             *   ->update(['is_active' => false]);

       * $bonds = Bond1::all();
        *$bills = Bill1::all();
        *$coups = Coupon::all();
        *$principle = $this->request->bid;
        *$pricez = $this->request->bidtype;

        *if ($pricez == 'competitiveTa') {
         *   $bondmultiple = 5000;
        *} else {
         *   $bondmultiple = 1000;
        *}

        *$catid = $this->lot->sec_type->cat_id;

        *if($catid == 1){

         *   $p = $this->lot->sec_type->duration;
          *  foreach ($bills as $bill) {

           *     if($bill->duration == $p){

            *        $billp = $bill->bprice;
             *   }


            *}


            *if (!empty($principle)) {
             *   $principle = round($principle * 100 / $billp );
            *} else {
             *   $principle = "";
            *}

            *$this->bid = new Bid;
            *$this->bid->price = $principle;
            *$this->bid->interest_rate = $this->request->bid1;
            *$this->bid->lot_id = $this->request->lot;
            *$this->bid->bidtype = $this->request->bidtype;
            *$this->bid->user_id = Auth::id();
            *$this->bid->save();

        *}else{

         *   $bb = $this->lot->sec_type->duration/365;
          *  foreach ($bonds as $bond) {
           *     if($bond->duration == $bb){

             *       $bondp = $bond->bprice;
            *    }

            *}
            *if (!empty($principle)) {
             *   $futureValue = ($principle / $bondp * 100);
              *  $futureValue = round($futureValue / $bondmultiple) * $bondmultiple;
            *} else {
             *   $futureValue = "";
            *}

            // principle calculation
            *$principle = $futureValue * $bondp / 100;

            //coupon rate calculation
            *$secTy = $this->lot->sec_type->duration/365;

            *foreach ($coups as $coup) {
             *   if($coup->tenor == $secTy){

              *      $rate = $coup->couponR;
               *     $tax = 1 - 0.15;
                *    $crate = $rate / 100;

                    // net coupon payment for just 1 year
                 *   $netCrate = $futureValue * $crate * $tax;

                  *  $numofcoup = $coup->tenor * 2;

                   * //net coupon payment for whole tenor
                    *$netCoupTenor = $coup->tenor * $netCrate;

                    //net semi annual coupon payment
                    *$semiAnCoup = $netCoupTenor / $numofcoup;



                    //total gain
                    *$diff = $futureValue - $principle;
                    *$totalGain = $diff + $netCoupTenor;


                *}

            *}
            *   $this->bid->price = $principle;
             *   $this->bid->interest_rate = $this->request->bid1;
              *  $this->bid->lot_id = $this->request->lot;
               * $this->bid->bidtype = $this->request->bidtype;
                *$this->bid->faceValue = $futureValue;
                *$this->bid->discountValue = $diff;
                *$this->bid->totalCouponAmount = $netCoupTenor;
                *$this->bid->user_id = Auth::id();
                *$this->bid->save();


        *}


        *});*/
    }
}
