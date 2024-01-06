<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellBid extends Model
{
    use HasFactory;

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id');
    }
}
