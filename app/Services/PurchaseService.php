<?php

namespace App\Services;

use App\Events\LotPurchasedEvent;
use App\Models\Bid;
use App\Models\Lot;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    private Purchase $purchase;
    private Lot $lot;
    private ?Bid $bid = null;
    private String $value;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Save the purchase to the storage. If there are no bids, return the lot to draft.
     *
     * @param Lot $lot
     */
    public function save(Lot $lot)
    {
        $this->lot = $lot;

        $awardedBids = $this->auctionWinnerBid();

        if (!empty($awardedBids)) {
            foreach ($awardedBids as $awardedBid) {
                $this->bid = $awardedBid['bid'];

                $this->purchase = new Purchase;
                $this->purchase->lot_id = $this->lot->id;
                $this->purchase->user_id = $this->bid->user_id;
                $this->purchase->price = $this->bid->price;
                $this->purchase->interest = $this->bid->interest_rate;
                $this->purchase->faceValue = $this->bid->faceValue;
                $this->purchase->discountValue = $this->bid->discountValue;
                $this->purchase->totalCouponAmount = $this->bid->totalCouponAmount;
                $this->purchase->bprice = $this->bid->bprice;
                $this->purchase->save();

                $this->confirmLotPurchase();
                event(new LotPurchasedEvent($this->purchase));
            }
        } else {
            $this->setLotStatus('draft');
        }
    }





    /**
     * Make a purchase.
     */
    private function confirmLotPurchase()
    {
        DB::transaction(function () {

            $this->setLotStatus('sold');

            $this->setAllBidsInactive();

            $this->paymentProcess();
        });
    }

    public function exampleMethod($value)
    {
        $this->value = $value;
    }

    /**
     * Get the maximum lot bid.
     *
     * @return Bid|null
     */
    private function auctionWinnerBid(): ?array
    {
        $bids = Bid::where('lot_id', $this->lot->id)
                   ->orderBy('bidtype', 'asc')
                   ->orderBy('interest_rate', 'asc')
                   ->orderBy('price', 'desc')
                   ->get();

        $awardedBids = [];
        $bidTypeArray = [];
        $currentBidType = null;

        foreach ($bids as $bid) {
            // Check if we've moved on to a new bid type
            if ($bid->bidtype !== $currentBidType) {

                // If so, set the current bid type
                $currentBidType = $bid->bidtype;

                // Check if the bid type array already exists for this bid type
                if (!array_key_exists($currentBidType, $bidTypeArray)) {
                    // If not, initialize the array for this bid type and reset the issue amount
                    $issue_amount = $this->lot->$currentBidType;
                    $bidTypeArray[$currentBidType] = [];

                }else{

                    $currentBidType = null;
                    continue;

                }
            }

            // Calculate the awarded amount for this bid
            $awardedAmount = $bid->price;

            // Decrease the remaining issue amount
            $issue_amount -= $awardedAmount;

            // Add the bid and awarded amount to the array
            $awardedBids[] = [
                'bid' => $bid
            ];

            // Add the bid to the corresponding bid type array
            $bidTypeArray[$currentBidType][] = $bid;

            // Stop looping if the remaining issue amount is 0
            if ($issue_amount <= 0) {
                // Reset the current bid type
                $currentBidType = null;
            }
        }

        return $awardedBids;

    }





    /**
     * Set a new lot status.
     *
     * @param string $status
     */
    private function setLotStatus(string $status)
    {
        $this->lot->update(['status' => $status]);
    }

    /**
     * Store lot purchase.
     */
    private function storePurchase()
    {
        $this->purchase->lot_id = $this->lot->id;
        $this->purchase->user_id = $this->bid->user_id;
        $this->purchase->price = $this->bid->price;
        $this->purchase->save();
    }

    /**
     * Set all bids for this lot inactive.
     */
    private function setAllBidsInactive()
    {
        Bid::where('lot_id', $this->lot->id)->update(['is_active' => false]);
    }

    /**
     * Increase the seller's balance and decrease the buyer's balance.
     */
    private function paymentProcess()
    {
        User::find($this->bid->user_id)->decrement('balance', $this->bid->price);

        User::find($this->lot->user_id)->increment('balance', $this->bid->price);
    }
}
