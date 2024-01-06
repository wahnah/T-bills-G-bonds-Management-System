<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Category;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $auctions = Auction::with('category')
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('admin.auctions.index', compact('auctions'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.auctions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'issueNo' => 'required|string',
            'auctionDate' => 'required|date',
            'cat_id' => 'required|numeric',
        ]);


        $date = $request->input('auctionDate');
        $d = \Carbon\Carbon::parse($date)->subDays(3)->toDateString();

        $auction = new Auction([
            'issueNo' => $request->input('issueNo'),
            'auctionDate' => $d,
            'cat_id' => $request->input('cat_id'),

        ]);

        $auction->save();


        return redirect()->back()->with('success', 'Auction date set successfully.');
    }

/**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $auction = Auction::findOrFail($id);
        $auction->delete();
        return redirect()->route('admin.auctions.index')->with('success', 'auction delete successfully.');
    }
}
