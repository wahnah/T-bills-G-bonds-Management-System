<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Auction;
use App\Models\Sec_type;
use App\Models\Lot;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class AwardPdfController extends Controller
{
    public function downloadPDF($lot_id)
    {
       // $lot_id = $request->query('');
       $owner_id = request('owner_id');


       $purchase = Purchase::where('lot_id', $lot_id)
       ->where('user_id', $owner_id)
       ->first();

       $lot = Lot::find($lot_id);

        $ad = $lot->auctionDate;

        $auction =  Auction::where('auctionDate', $ad)->first();
        $secTy = Sec_type::where('id', $lot->sec_type_id)->first();


                $duration = $secTy->duration . 'days';


            if ($auction) {
       $data = [
        'securityName' => $purchase->lot->name,
        'settlementDate' => $purchase->lot->auctionDate,
        'maturityDate'  => $purchase->lot->maturityDate,
        'name' => $purchase->user->name,
        'csd' => $purchase->user->csd,
        'price' => $purchase->price,
        'faceValue' => $purchase->faceValue,
        'discount' => $purchase->discountValue,
        'bprice' => $purchase->bprice,
        'issueNo' => $auction->issueNo,
        'duration' => $duration,
        'address' => $purchase->user->address,
        ];
    }else{
        $data = [
            'securityName' => $purchase->lot->name,
            'settlementDate' => $purchase->lot->auctionDate,
            'maturityDate'  => $purchase->lot->maturityDate,
            'name' => $purchase->user->name,
            'csd' => $purchase->user->csd,
            'price' => $purchase->price,
            'faceValue' => $purchase->faceValue,
            'discount' => $purchase->discountValue,
            'bprice' => $purchase->bprice,
           'issueNo' => $auction->issueNo,
            'duration' => $duration,
            ];
    }

        //dd($data);

        $html = view('awardnotice', compact('data'))->render();

                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Generate a unique file name for this PDF file
                $pdfFile = 'your award notice' . $lot->id . '.pdf';

                // Save the generated PDF to storage
                Storage::put($pdfFile, $dompdf->output());


        return Storage::download($pdfFile);

    }
}
