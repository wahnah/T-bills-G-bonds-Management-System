<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BondPrice;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    public function bondKwachaPrice(Request $request)
    {
        $c = $request->input('c');
        $i = $request->input('i');
        $n = $request->input('n');

        $p = 0;

        for ($x = 1; $x <= $n; $x++) {


            if ($x == $n) {

                $p += (($c / 2) + 100) / pow((1 + ($i / 2)), $x);

            } else {

                $p += ($c / 2) / pow((1 + ($i / 2)), $x);

            }

        }

        return redirect('/tools')->with('p','Your Bond Kwacha Price is : ZMK '.$p);
    }


    public function couponPayment(Request $request){

        $fv = $request->input('fv');
        $cr = $request->input('cr');
        $nd = $request->input('nd');

        $cp = 0;

        $cp = $fv * ($cr / 100) * ($nd / 365);


        return redirect('/tools')->with('cp','Coupon Payment is : ZMK '.$cp);
    }


    public function billKwachaPrice(Request $request){


        $ii = $request->input('ii');
        $nn = $request->input('nn');

        $pp = 0;

        $pp = (1 / (1 + (($nn / 365) + $ii))) * 100;

        return redirect('/tools')->with('pp','Your Tresuary-Bill Kwacha Price is : ZMK '.$pp);
    }

    public function bondpp (Request $request)
    {
        $duration = $request->query('bondduration');
        $bondPrices = DB::table('bondPrice')->where('duration', $duration)->get();

        $optionsHtml = '';
        foreach ($bondPrices as $bond) {
            $optionsHtml .= '<option value="' . $bond->bprice . '">' . $bond->tenderNo .' '. $bond->bprice .  '</option>';
        }

        return $optionsHtml;
    }


    public function advisor(Request $request)
    {

        $coups = Coupon::all();
        $sprinciple = $request->input('principle');
        $bondmultiple = $request->input('res');
        $bondp = $request->input('bondp');
        $duration =$request->input('bondduration');

        if (!empty($sprinciple)) {
            $futureValue = ($sprinciple / $bondp * 100);
            $futureValue = round($futureValue / $bondmultiple) * $bondmultiple;
        } else {
            $futureValue = "";
        }

        // principle calculation
        $principle = round($futureValue * $bondp / 100);

        //coupon rate calculation
        $secTy = $duration;

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
                $semiAnCoup = round($netCoupTenor / $numofcoup);



                //total gain
                $diff = $futureValue - $principle;
                $totalGain = $diff + $netCoupTenor;

                    $result = $futureValue;


            }
        }

        //return view('bidSubmission', compact('futureValue', 'principle', 'netCrate', 'semiAnCoup', 'totalGain'));
        return redirect('/tools')->with([
            'sprinciple' => $sprinciple,
            'bondp' => $bondp,
            'duration' => $duration,
            'futureValue' => $futureValue,
            'principle' => $principle,
            'netCrate' => $netCoupTenor,
            'semiAnCoup' => $semiAnCoup,
            'totalGain' => $totalGain,
        ]);
    }

    public function billpp (Request $request)
    {
        $duration = $request->query('billduration');
        $billPrices = DB::table('billPrice')->where('duration', $duration)->get();

        $optionsHtml = '';
        foreach ($billPrices as $bill) {
            $optionsHtml .= '<option value="' . $bill->bprice . '">' . $bill->tenderNo .' '. $bill->bprice . '</option>';
        }

        return $optionsHtml;
    }

    public function advisorBill(Request $request)
    {
        $coups = Coupon::all();
        $tprinciple = $request->input('principle');
        $billp = $request->input('billp');

        if (!empty($tprinciple)) {
            $estimatedfValue = round($tprinciple * $billp / 100 );
        } else {
            $estimatedfValue = "";
        }




        //return view('billbid', compact('estimatedfValue'));
        return redirect('/tools')->with([
            'tprinciple' => $tprinciple,
            'estimatedfValue' => $estimatedfValue,

        ]);

        }
}
