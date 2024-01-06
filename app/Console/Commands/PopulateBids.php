<?php

namespace App\Console\Commands;
use App\Models\Bid;
use App\Models\Tbid;
use App\Models\Coupon;
use App\Models\Bill1;
use App\Models\Bond1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Command;

class PopulateBids extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate-bids';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the bids table with data from the t-bid table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Retrieve the bids from the t-bid table
        $tbids = Tbid::where('is_active', true)
        ->whereHas('lot', function ($query) {
        $query->where('end_time', '<', now());
        })
        ->get();
       //$tbids = Tbid::where('is_active', true)->get();

        foreach ($tbids as $tbid) {

        //DB::transaction(function () {
         //   Bid::where('user_id', Auth::id())
        //        ->where('lot_id', $this->request->lot)
        //        ->update(['is_active' => false]);

        $bonds = Bond1::all();
        $bills = Bill1::all();
        $coups = Coupon::all();
        $principle = $tbid->premium;
        $pricez = $tbid->bidtype;

        if ($pricez == 'competitiveTa') {
            $bondmultiple = 5000;
        } else {
            $bondmultiple = 1000;
        }

        $catid = $tbid->cat_id;

        if($catid == 1){

            $p = $tbid->duration;
            foreach ($bills as $bill) {

                if($bill->duration == $p){

                    $billp = $bill->bprice;
                }


            }


            if (!empty($principle)) {
                $futureValue = $principle;
                $principle = round($principle * $billp / 100 );
                $diff = $futureValue - $principle;
            } else {
                $principle = "";
            }

            $this->bid = new Bid;
            $this->bid->price = $principle;
            $this->bid->faceValue = $futureValue;
            $this->bid->discountValue = $diff;
            $this->bid->interest_rate = $tbid->yield_rate;
            $this->bid->lot_id = $tbid->lot_id;
            $this->bid->bidtype = $tbid->bidtype;
            $this->bid->user_id = $tbid->user_id;
            $this->bid->bprice = $billp;
            $this->bid->save();

        }else{

            $bb = $tbid->duration/365;
            foreach ($bonds as $bond) {
                if($bond->duration == $bb){

                    $bondp = $bond->bprice;
                }

            }
            if (!empty($principle)) {
                $futureValue = ($principle / $bondp * 100);
                $futureValue = round($futureValue / $bondmultiple) * $bondmultiple;
            } else {
                $futureValue = "";
            }

            // principle calculation
            $principle = $futureValue * $bondp / 100;

            //coupon rate calculation
            $secTy = $tbid->duration/365;

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
            $this->bid = new Bid;
                $this->bid->price = $principle;
                $this->bid->interest_rate = $tbid->yield_rate;
                $this->bid->lot_id = $tbid->lot_id;
                $this->bid->bidtype = $tbid->bidtype;
                $this->bid->faceValue = $futureValue;
                $this->bid->discountValue = $diff;
                $this->bid->totalCouponAmount = $netCoupTenor;
                $this->bid->user_id = $tbid->user_id;
                $this->bid->bprice = $bondp;
                $this->bid->save();


        }


       // });

       $tbid->delete();

    }

    // Delete the bids from the t-bid table
    //Tbid::truncate();

    $this->info('Bids table has been populated!');
    }
}
