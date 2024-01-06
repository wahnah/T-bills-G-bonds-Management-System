<?php

namespace App\Listeners;

use App\Events\DepositReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SentDepositSlipRecievedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DepositReceived  $event
     * @return void
     */
    public function handle(DepositReceived $event)
    {
        $admin = User::where('role', 1)->first();

        if ($admin) {
            $admin->notify(new AdminNotification($event->deposit, $event->user));
        }
    }
}
