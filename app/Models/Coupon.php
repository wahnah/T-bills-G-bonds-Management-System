<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    /**
     * Get coupon lots.
     */
    public function lots()
    {
        return $this->hasMany(Lot::class);
    }

}
