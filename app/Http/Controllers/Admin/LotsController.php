<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lot;
use App\Models\Market;
use App\Models\Sec_type;
use App\Models\Auction;
use App\Models\Coupon;
use App\Services\Lot\DeleteService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $lots = Lot::with('user', 'category')
            ->orderByDesc('updated_at')
            ->paginate(10);
        return view('admin.lots.index', compact('lots'));
    }

    public function create()
    {
        $auctions = Auction::where('auctionDate', '>', now())
        ->get();
        $categories = Category::all();
        $markets = Market::all();
        $sec_types = Sec_type::all();
        $coupons = Coupon::all();
        return view('admin.lots.create', compact('auctions', 'categories', 'markets', 'sec_types', 'coupons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        DeleteService::delete($id);
        return redirect()->route('admin.lots.index')->with('success', 'Lot delete successfully.');
    }
}
