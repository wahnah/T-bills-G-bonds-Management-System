<?php

namespace App\Listeners;

use App\Events\LotPurchasedEvent;
use App\Mail\Purchases\LotBought;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NotifyBuyer
{
    /**
     * Handle the event.
     *
     * @param  LotPurchasedEvent  $event
     * @return void
     */
    public function handle(LotPurchasedEvent $event)
    {
        //Mail::to($event->buyer)
            //->send(new LotBought($event->lot, $event->purchase->price));
            Notification::route('mail', $event->buyer->email)->notify(new LotBought($event->lot, $event->buyer, $event->purchase->price));
    }
}
