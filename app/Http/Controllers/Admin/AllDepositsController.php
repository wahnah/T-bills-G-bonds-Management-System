<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\User;
use App\Notifications\SuccessDepositNotification;
use App\Notifications\RejectedDepositNotification;
use Illuminate\Support\Facades\Notification;

class AllDepositsController extends Controller
{

    public function depo()
    {
        $deposits = Deposit::where('status', 'pending')->get();
        return view('admin.deposits.deposits', compact('deposits'));

    }

    public function showDeposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        return view('admin.deposits.show', compact('deposit'));
    }

    public function updateDeposit(Request $request, $id)
    {

        $uzer = $request->input('user_id');
        $amountt = $request->input('amount');
        $stat = $request->input('status');
        $user = User::find($uzer);

        $email = $user->email;

        $deposit = Deposit::find($id);

        if($stat == 'approved'){

        // find the deposit by ID
        $deposit->user_id = $uzer;
        $deposit->amount = $amountt;
        $deposit->status = $stat;
        $deposit->update();

        // update the user balance
        User::find($uzer)->increment('balance', $amountt);



        Notification::route('mail', $email)->notify(new SuccessDepositNotification($deposit, $user));

        }else{

        $deposit->status = $stat;
        $deposit->update();

        Notification::route('mail', $email)->notify(new RejectedDepositNotification($deposit, $user));

        }

        // redirect back to the deposits index page with a success message
        return redirect()->route('admin.deposits.depo')->with('success', 'Deposit updated successfully.');

    }

}
