<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $issueDate = \Carbon\Carbon::parse($this->lot->auctionDate)->addDays(6)->format('Y-m-d');

        $maturityDate = \Carbon\Carbon::parse($issueDate)->addDays($this->lot->sec_type->duration)->format('Y-m-d');

// generate an array of dates that are every 182 days until the maturity date, only if tenure is more than 365 days
$dateArray = [];
if ($this->lot->sec_type->duration > 365) {
    $date = \Carbon\Carbon::parse($this->lot->auctionDate)->addDays(183);
    while ($date->lessThan($maturityDate)) {
        $dateArray[] = $date->format('Y-m-d');
        $date->addDays(183);
    }
}

// join the dates array with a comma or show 'N/A'
$dateString = count($dateArray) > 0 ? implode(', ', $dateArray) : 'N/A';

        return [
            'lot_id' => $this->lot_id,
            'owner_id' => $this->user_id,
            'lot_name' => $this->lot->name,
            'price' => $this->price,
            'seller' => $this->lot->user->name,
            'interest' => $this->interest,
            'tenure' => $this->lot->sec_type->duration,
            'coupon' => $dateString,
            'maturity' => $maturityDate,
            'created_at' => $issueDate,
            'faceValue' => $this->faceValue,
            'discountValue' => $this->discountValue,
            'totalCouponPay' => $this->totalCouponAmount,
        ];
    }
}
