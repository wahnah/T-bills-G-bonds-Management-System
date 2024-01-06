<?php

namespace App\Events;

use App\Models\Bid;
use App\Models\Tbid;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\Double;

class BidEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $lot_id;
    public int $bid_price;

    public int $unique_bids;

    public int $bid_interest;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tbid $bid)
    {
        $this->lot_id = $bid->lot_id;
        $this->bid_price = $bid->premium;
        $this->bid_interest = 0;
        $this->unique_bids = 0;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('Bid');
    }

    /**
     * Event name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'NewBid';
    }
}
