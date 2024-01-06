<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function store(Request $request)
{
    $user = auth()->user();
    // Validate the input
    $request->validate([
        'amount' => 'required|numeric',
        'deposit_slip' => 'required|image'
    ]);

    // Store the uploaded file in the storage folder
    $path = $request->file('deposit_slip')->store('public/deposit_slips');

    $deposit = new Deposit([
        'user_id' => auth()->user()->id,
        'amount' => $request->input('amount'),
        'status' => 'pending',
        'deposit_slip' => str_replace('public/', '', $path)
    ]);

    $deposit->save();

    // Send notification to admin
    Notification::route('mail', 'wanamuz05@gmail.com')->notify(new AdminNotification($deposit, $user));

    return redirect()->back()->with('success', 'Deposit submitted successfully.');
}


    public function viewAll()
    {
        $deposits = Deposit::where('user_id', auth()->user()->id)
        ->paginate(6);
        return view('transactions', compact('deposits'));

    }
}
