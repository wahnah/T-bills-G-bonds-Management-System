<?php

namespace App\Listeners;

use App\Events\LotPurchasedEvent;
use App\Mail\Purchases\LotSold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;


class NotifySeller
{
    /**
     * Handle the event.
     *
     * @param  LotPurchasedEvent  $event
     * @return void
     */
    public function handle(LotPurchasedEvent $event)
    {
        //Mail::to($event->lot->user)
            //->send(new LotSold($event->lot, $event->buyer, $event->purchase->price));
            //notify(new LotSold($event->lot, $event->buyer, $event->purchase->price));
            Notification::route('mail', $event->lot->user->email)->notify(new LotSold($event->lot, $event->buyer, $event->purchase->price));
    }
}
