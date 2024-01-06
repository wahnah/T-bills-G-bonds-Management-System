<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\AllDepositsController;
use Illuminate\Support\Facades\Artisan;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/primary/primaryBonds', [\App\Http\Controllers\LotController::class, 'primaryBonds'])->name('markets.primaryBonds');
Route::get('/primary/primaryBills', [\App\Http\Controllers\LotController::class, 'primaryBills'])->name('markets.primaryBills');
Route::get('/secondary/secondaryBonds', [\App\Http\Controllers\LotController::class, 'secondaryBonds'])->name('markets.secondaryBonds');
Route::get('/secondary/secondaryBills', [\App\Http\Controllers\LotController::class, 'secondaryBills'])->name('markets.secondaryBills');
Route::get('/resell/{id}', [\App\Http\Controllers\LotController::class, 'resell'])->name('lots.resell');
Route::get('/couponscollected/{id}', [\App\Http\Controllers\LotController::class, 'estimateBondPrice'])->name('lots.estimateBondPrice');
Route::post('/resell/{id}', [\App\Http\Controllers\LotController::class, 'estimateBondPriceCalc'])->name('lots.estimateBondPriceCalc');
Route::any('storeResell', [\App\Http\Controllers\LotController::class, 'storeResell'])->name('lots.storeResell');
Route::any('/purchase/{id}', [\App\Http\Controllers\PurchaseController::class, 'purchase'])->name('purchase');
Route::post('/advisor/{id}', [\App\Http\Controllers\PurchaseController::class, 'advisor'])->name('advisor');
Route::post('/advisorBill/{id}', [\App\Http\Controllers\PurchaseController::class, 'advisorBill'])->name('advisorBill');

Route::middleware('auth')->group(function () {

    //Route::get('/dashboard', function () {
        //return view('dashboard');
    //})->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\ProfileController::class, 'totalInvest'])->name('dashboard');

    Route::get('/slip', function () {
        return view('deposit');
    })->name('slip');
    Route::resource('profile', App\Http\Controllers\ProfileController::class)->only('edit', 'update');
    Route::resource('lots', App\Http\Controllers\LotController::class);
    //Route::resource('auc', App\Http\Controllers\AuctionsController::class); estimateBondPrice
    Route::get('billauction', [App\Http\Controllers\AuctionsController::class, 'billcat']);
    Route::get('bondauction', [App\Http\Controllers\AuctionsController::class, 'bondcat']);
    Route::get('resell/bidform/{id}', [App\Http\Controllers\LotController::class, 'viewSecBidForm'])->name('resellz');
    Route::get('myresells', [App\Http\Controllers\LotController::class, 'indexResell'])->name('lots.myresells');
    Route::get('/myresells/{resell}', [App\Http\Controllers\LotController::class, 'resellShow'])->name('lots.resellShow');
    Route::get('/myresells/{resell}/bid/{bid}/accept', [App\Http\Controllers\BidController::class, 'acceptBid'])->name('resell.acceptBid');
    Route::get('/myBids', [App\Http\Controllers\BidController::class, 'allBids'])->name('myBids');
    Route::get('/deletemyresell/{resell}', [App\Http\Controllers\BidController::class, 'deleteResell'])->name('resell.deleteResell');
    Route::get('/deletebid/{id}', [App\Http\Controllers\BidController::class, 'deletebid'])->name('deleteBid');
    Route::get('layouts', App\Http\Controllers\CustomAdminViewController::class);
    Route::get('/getBondPrices', [App\Http\Controllers\CalculatorController::class, 'bondpp'])->name('getBondPrices');
    Route::get('/getBillPrices', [App\Http\Controllers\CalculatorController::class, 'billpp'])->name('getBillPrices');
    Route::delete('lot-images/{id}', [App\Http\Controllers\LotImageController::class, 'destroy'])->name('lot-images.destroy');
    Route::post('deposits', [\App\Http\Controllers\DepositController::class, 'store'])->name('deposit.store');
    Route::post('profile/add-money', [App\Http\Controllers\ProfileController::class, 'topUpBalance'])->name('profile.addMoney');
    Route::post('bid', [App\Http\Controllers\BidController::class, 'store'])->name('bid');
    Route::post('resellbid', [App\Http\Controllers\BidController::class, 'populateReBids'])->name('resellbid');
    Route::post('bond', [App\Http\Controllers\CalculatorController::class, 'bondKwachaPrice']);
    Route::post('coupon', [App\Http\Controllers\CalculatorController::class, 'couponPayment']);
    Route::post('advisorBond', [App\Http\Controllers\CalculatorController::class, 'advisor']);
    Route::post('advisorBill', [App\Http\Controllers\CalculatorController::class, 'advisorBill']);
    Route::post('bill', [App\Http\Controllers\CalculatorController::class, 'billKwachaPrice']);
    Route::get('/transactions', [\App\Http\Controllers\DepositController::class, 'viewAll'])->name('transactions');
    Route::get('/auction', [\App\Http\Controllers\AuctionsController::class, 'index'])->name('auction');
    Route::get('/auction/{id}', [\App\Http\Controllers\AuctionsController::class, 'show'])->name('auction.show');
    Route::get('/auctiondel/{id}', [\App\Http\Controllers\Admin\AuctionsController::class, 'destroy'])->name('auction.destroy');
    Route::any('auctions/create', [\App\Http\Controllers\Admin\AuctionsController::class, 'store'])->name('auctions.store');
    Route::get('/awardnotice/{lot_id}', [\App\Http\Controllers\AwardPdfController::class, 'downloadPDF']);

    //Route::get('generatePdf', [\App\Http\Controllers\Admin\PdfController::class, 'generatePdf'])->name('pdfs.generatePdf');
    //Route::post('prices/bill1/{id}', [\App\Http\Controllers\Admin\PricesController::class, 'bill1'])->name('prices.bill1');
    //Route::post('prices/bond1/{id}', [\App\Http\Controllers\Admin\PricesController::class, 'bond1'])->name('prices.bond1');
    //Route::any('/admin/deposits/show/{id}', [\App\Http\Controllers\Admin\AllDepositsController::class, 'showDeposit'])->name('show');
    //Route::any('deposits/depo', [\App\Http\Controllers\Admin\AllDepositsController::class, 'depo'])->name('deposits.depo');
    //Route::post('deposits/depo', [\App\Http\Controllers\Admin\AllDepositsController::class, 'updateDeposit'])->name('admin.deposits.updatedeposit');
   // Route::get('/tools', function () {
        //return view('tools');
    //})->name('tools');
    //Route::get('/tools', [App\Http\Controllers\CalculatorController::class, 'bondpp'])->name('tools');
    Route::get('/primary', function () {
        return view('markets.primary');
    })->name('markets.primary');
    Route::get('/secondary', function () {
        return view('markets.secondary');
    })->name('markets.secondary');
    Route::get('/tools', function () {
        return view('tools');
    })->name('tools');
    Route::get('/bankTrans', function () {
        return view('bankTrans');
    })->name('bankTrans');

    Route::get('run-command-populate-bids', function () {
        Artisan::call('populate-bids');
        return redirect()->route('admin.pdfs.view')->with('success', 'Bids table populated successfully!');
    })->name('run-populate-bids');

    Route::get('run-command-sell-lot', function () {
        Artisan::call('sell-lots');
        return redirect()->route('admin.pdfs.view')->with('success', 'User potifolios updated with successful bids!');
    })->name('run-sell-lots');
    Route::get('mail', [App\Http\Controllers\Controller::class, 'send_basic_mail'])->name('mail');

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['isadmin']
    ], function () {
        Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->only('index', 'edit', 'update');
        Route::resource('lots', \App\Http\Controllers\Admin\LotsController::class)->only('index', 'create', 'destroy');
        Route::resource('deposits', \App\Http\Controllers\Admin\AllDepositsController::class)->only('updateDeposit');
        Route::get('deposits/depo', [\App\Http\Controllers\Admin\AllDepositsController::class, 'depo'])->name('deposits.depo');
        Route::get('deposits/depo/{id}', [\App\Http\Controllers\Admin\AllDepositsController::class, 'showDeposit'])->name('deposits.show');
        Route::put('deposits/depo/{id}', [\App\Http\Controllers\Admin\AllDepositsController::class, 'updateDeposit'])->name('deposits.update');
        Route::resource('auctions', \App\Http\Controllers\Admin\AuctionsController::class)->only('index', 'create', 'destroy');
        Route::resource('prices', \App\Http\Controllers\Admin\PricesController::class)->only('index','edit', 'edit1');
        Route::post('prices/bill1/{id}', [\App\Http\Controllers\Admin\PricesController::class, 'bill1'])->name('prices.bill1');
        Route::post('prices/bond1/{id}', [\App\Http\Controllers\Admin\PricesController::class, 'bond1'])->name('prices.bond1');
        Route::get('prices/bill1/{id}/edit1', [\App\Http\Controllers\Admin\PricesController::class, 'edit1'])->name('prices.edit1');
        Route::get('pdfs/tbids', [\App\Http\Controllers\Admin\PdfController::class, 'index'])->name('pdfs.view');
        Route::get('generatePdf', [\App\Http\Controllers\Admin\PdfController::class, 'generatePdf'])->name('pdfs.generatePdf');
        Route::get('letter', [\App\Http\Controllers\Admin\PdfController::class, 'lgurantee'])->name('pdfs.letter');
        //Route::post('prices/bond1/{id}/edit', [\App\Http\Controllers\Admin\PricesController::class, 'edit'])->name('prices.edit');

        Route::get('/resold', [\App\Http\Controllers\Admin\Resells::class, 'index'])->name('resold');
    });
});

require __DIR__ . '/auth.php';
