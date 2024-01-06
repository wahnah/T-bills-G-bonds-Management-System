<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Tbid;
use App\Models\User;
use App\Models\Lot;
use App\Models\Auction;
use App\Models\Sec_type;


class PdfController extends Controller
{

    public function generatePdf()
{
    //$bids = Tbid::all();


    $bids = Tbid::where('is_active', true)
        ->get();

    $zipFile = 'application-form-pdfs.zip';
    Storage::delete($zipFile);
    $zip = new \ZipArchive();
    $zip->open(storage_path('app/' . $zipFile), \ZipArchive::CREATE);

    foreach ($bids as $tbid) {

        $userId = $tbid->user_id;
        $lotId = $tbid->lot_id;


        $lot = Lot::find($lotId);
        $user = User::find($userId);



        $ad = $lot->auctionDate;

        $auction =  Auction::where('auctionDate', $ad)->first();
        $secTy = Sec_Type::where('id', $lot->sec_type_id)->first();


        $cat = $tbid->cat_id;
        $bit = $tbid->bidtype;

        if($cat == 2){
            $duration = $secTy->duration/365;
        }else{
            $duration = $secTy->duration;
        }
        if ($auction) {
            $name = $user->name;
                    $name_parts = explode(" ", $name);
                    $initial = substr($name_parts[0], 0, 1);
                    $new_name = $initial . ". " . $name_parts[1];

        $data = [
            'date' => $tbid->created_at,
            'auction_date' => $lot->auctionDate,
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'signature' => $new_name,
            'nrc' => $user->nrc,
            'csd' => $user->csd,
            'facevalue' => $tbid->premium,
            'issueNo' => $auction->issueNo,
            'maturity' => $lot->maturityDate,
            'duration' => $duration,
            'yield'=>$tbid->yield_rate,
            //'date' => $bid->date,
            //'issue_number' => $bid->issue_number,
            //'premium' => $bid->premium,
            //'mode_of_payment' => $bid->mode_of_payment,
            //'multiple' => $bid->multiple,
            //'sectors' => $bid->sectors,
            //'name' => $bid->name,
            //'address' => $bid->address,
            //'telephone' => $bid->telephone,
            //'nrc' => $bid->nrc,
            //'signatures' => [
            //    [
            //        'name' => $bid->signature_1_name,
            //        'signature' => $bid->signature_1_image,
            //    ],
            //    [
            //        'name' => $bid->signature_2_name,
            //        'signature' => $bid->signature_2_image,
            //    ],
            //],
        ];}else
        {dd($auction);}


        if ($cat == 1 && $bit == "competitiveTa") {
            // code to execute when the first condition is true
            $html = view('admin.pdfs.ontender.tbill', compact('data'))->render();
         } else if ($cat == 1 && $bit == "noncompetitiveTa") {
            // code to execute when the first condition is false and this condition is true
            $html = view('admin.pdfs.offtender.tbill', compact('data'))->render();
         } else if ($cat == 2 && $bit == "competitiveTa") {
            // code to execute when both of the first two conditions are false and this condition is true
            $html = view('admin.pdfs.ontender.gbond', compact('data'))->render();
         } else {
            $html = view('admin.pdfs.offtender.gbond', compact('data'))->render();
            // code to execute when all three of the previous conditions are false
            // this would be when $cat == 2 and $bit == "non competitive"
         }


        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Generate a unique file name for this PDF file
        $pdfFile = 'application form ' . $tbid->id . '.pdf';

        // Save the generated PDF to storage
        Storage::put($pdfFile, $dompdf->output());

        // Add the PDF file to the zip archive
        $zip->addFile(storage_path('app/' . $pdfFile), $pdfFile);
    }

    $zip->close();

    return Storage::download($zipFile);
}



    public function index()
    {
        //$tbids = Tbid::all();
        $tbids = Tbid::where('is_active', true)
        ->get();
        return view('admin.pdfs.tbids', compact('tbids'));

    }

    public function lgurantee()
    {
        $tbids = Tbid::where('is_active', true)->get();

        $zipFile = 'guarantee-pdfs.zip';
        Storage::delete($zipFile);
        $zip = new \ZipArchive();
        $zip->open(storage_path('app/' . $zipFile), \ZipArchive::CREATE);

        foreach ($tbids as $tbid) {
            $userId = $tbid->user_id;
            $lotId = $tbid->lot_id;

            // Use the sum method to compute the sum of premiums for this user
            $premiumSum = Tbid::where('user_id', $userId)->where('is_active', true)->sum('premium');

            $lot = Lot::find($lotId);

            $ad = $lot->auctionDate;

            $auction =  Auction::where('auctionDate', $ad)->first();
            $secTy = Sec_Type::where('id', $lot->sec_type_id)->first();


            $cat = $tbid->cat_id;
            $bit = $tbid->bidtype;

            if($cat == 2){
                $duration = $secTy->duration/365;
                $type = 'Government Bond';
            }else{
                $duration = $secTy->duration;
                $type = 'Treasury Bill';
            }

            //$lot = Lot::find($lotId);
            $user = User::find($userId);
            $balance = $user->balance;

            // Compare the premium sum with the user's balance and generate the PDF if necessary
            if ($premiumSum <= $balance) {
                if ($auction) {
                    $name = $user->name;
                    $name_parts = explode(" ", $name);
                    $initial = substr($name_parts[0], 0, 1);
                    $new_name = $initial . ". " . $name_parts[1];
                $data = [
                    'date' => $tbid->created_at,
                    'auction_date' => $lot->auctionDate,
                    'name' => $user->name,
                    'signature' => $new_name,
                    'address' => $user->address,
                    'nrc' => $user->nrc,
                    'csd' => $user->csd,
                    'duration' => $duration,
                    'facevalue' => $tbid->premium,
                    'issueNo' => $auction->issueNo,
                    'type' => $type,
                    //'email' => $user->email,
                    //'facevalue' => $tbid->premium,
                    //'mode_of_payment' => $bid->mode_of_payment,
                    //'multiple' => $bid->multiple,
                    //'sectors' => $bid->sectors,
                    //'name' => $bid->name,
                    //'address' => $bid->address,
                    //'telephone' => $bid->telephone,
                    //'nrc' => $bid->nrc,
                    //'signatures' => [
                    //    [
                    //        'name' => $bid->signature_1_name,
                    //        'signature' => $bid->signature_1_image,
                    //    ],
                    //    [
                    //        'name' => $bid->signature_2_name,
                    //        'signature' => $bid->signature_2_image,
                    //    ],
                    //],
                ];}else{
                    dd($auction);
                }


                $html = view('admin.pdfs.letter', compact('data'))->render();

                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Generate a unique file name for this PDF file
                $pdfFile = 'letter of gurantee' . $tbid->id . '.pdf';

                // Save the generated PDF to storage
                Storage::put($pdfFile, $dompdf->output());

                // Add the PDF file to the zip archive
                $zip->addFile(storage_path('app/' . $pdfFile), $pdfFile);
            }
        }

        $zip->close();

        return Storage::download($zipFile);
    }
}



