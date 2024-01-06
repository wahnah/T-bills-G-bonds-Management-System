<?php

namespace App\Http\Controllers;

use App\Events\LotPurchasedEvent;
use App\Http\Resources\PurchaseResource;
use App\Models\Lot;
use App\Models\Purchase;
use App\Models\BondPrice;
use App\Models\BillPrice;
use App\Models\Sec_type;
use App\Models\Coupon;
use App\Services\PurchaseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{


    /**
     * Get user purchases with lot and seller name.
     *
     * @return AnonymousResourceCollection
     */
    public function getUserPurchases()
    {
        return PurchaseResource::collection(Purchase::with('lot:id,user_id,name,sec_type_id,auctionDate', 'lot.user:id,name', 'lot.sec_type:id,name,duration')
        ->where('user_id', auth('sanctum')->id())
        ->whereHas('lot.sec_type', function($query) {
            $query->where('duration', '>', 365);
        })
        ->where('resell','=',0)
        ->orderByDesc('created_at')
        ->paginate(5));
    }

public function getShortTermPurchases()
    {
        return PurchaseResource::collection(Purchase::with('lot:id,user_id,name,sec_type_id,auctionDate', 'lot.user:id,name', 'lot.sec_type:id,name,duration')
        ->where('user_id', auth('sanctum')->id())
        ->whereHas('lot.sec_type', function($query) {
                $query->where('duration', '<', 365);
            })
            ->where('resell','=',0)
            ->orderByDesc('created_at')
            ->paginate(5));
    }


    public function yourSecondaryPurchases()
    {
        return PurchaseResource::collection(Purchase::with('lot:id,user_id,name,sec_type_id,auctionDate', 'lot.user:id,name', 'lot.sec_type:id,name,duration')
        ->where('user_id', auth('sanctum')->id())
        ->where('resell','=',1)
            ->orderByDesc('created_at')
            ->paginate(5));
    }

    public function purchase(PurchaseService $exampleService, int $id, Request $request)
    {


        $lot = Lot::findOrFail($id);
        $bondp = BondPrice::all();
        $billp = BillPrice::all();
        $pricez = $request->input('selectedAmount');

        if ($pricez == 'competitiveTa') {
            $result = 5000;
        } else {
            $result = 1000;
        }
        $exampleService->exampleMethod($pricez);

        $catid = $lot->sec_type->cat_id;

        if($catid == 1){

            return view('billAdvisor', compact('lot' ,'billp', 'result'));

        }else{

            return view('advisor', compact('lot','bondp', 'result'));
        }


    }

    public function advisor(Request $request, int $id)
    {
        $lot = Lot::findOrFail($id);
        $coups = Coupon::all();
        $principle = $request->input('principle');
        $bondmultiple = $request->input('bondmultiple');
        $bondp = $request->input('bondp');

        if (!empty($principle)) {
            $futureValue = ($principle / $bondp * 100);
            $futureValue = round($futureValue / $bondmultiple) * $bondmultiple;
        } else {
            $futureValue = "";
        }

        // principle calculation
        $principle = $futureValue * $bondp / 100;

        //coupon rate calculation
        $secTy = $lot->sec_type->duration/365;

        foreach ($coups as $coup) {
            if($coup->tenor == $secTy){

                $rate = $coup->couponR;
                $tax = 1 - 0.15;
                $crate = $rate / 100;

                // net coupon payment for just 1 year
                $netCrate = $futureValue * $crate * $tax;

                $numofcoup = $coup->tenor * 2;

                //net coupon payment for whole tenor
                $netCoupTenor = $coup->tenor * $netCrate;

                //net semi annual coupon payment
                $semiAnCoup = $netCoupTenor / $numofcoup;



                //total gain
                $diff = $futureValue - $principle;
                $totalGain = $diff + $netCoupTenor;


            }
        }




        return view('bidSubmission', compact('futureValue', 'principle', 'netCrate', 'semiAnCoup', 'totalGain', 'lot'));
    }



    public function advisorBill(Request $request, int $id)
    {
        $lot = Lot::findOrFail($id);
        $coups = Coupon::all();
        $principle = $request->input('principle');
        $billp = $request->input('billp');

        if (!empty($principle)) {
            $estimatedfValue = round($principle * 100 / $billp );
        } else {
            $estimatedfValue = "";
        }




        return view('billbid', compact('estimatedfValue', 'lot'));

        }






}
