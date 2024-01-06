<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bond1;
use App\Models\Bill1;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $bills = Bill1::all();
        $bonds = Bond1::all();
        return view('admin.prices.index', compact('bills', 'bonds'));
    }


    public function edit($id)
    {
        $bond = Bond1::findOrFail($id);
        return view('admin.prices.edit', compact('bond'));
    }


    public function edit1($id)
    {
        $bill = Bill1::findOrFail($id);
        return view('admin.prices.edit1', compact('bill'));
    }


    public function bond1(Request $request, int $id)
    {
        // Validate the input
        $request->validate([
            'bprice' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        ]);

        $price = $request->input('bprice');


        $bond = Bond1::find($id);

        // find the bond by ID
        $bond->bprice = $price;
        $bond->update();


        // redirect back to the price index page with a success message
        return redirect()->route('admin.prices.index')->with('success', 'Price updated successfully.');
    }

    public function bill1(Request $request, int $id)
    {
        // Validate the input
        $request->validate([
            'bprice' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        ]);

        $price = $request->input('bprice');


        $bond = Bill1::find($id);

        // find the bond by ID
        $bond->bprice = $price;
        $bond->update();


        // redirect back to the price index page with a success message
        return redirect()->route('admin.prices.index')->with('success', 'Price updated successfully.');

    }
}
