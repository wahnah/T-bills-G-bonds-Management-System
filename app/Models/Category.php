<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get category lots.
     */
    public function lots()
    {
        return $this->hasMany(Lot::class);
    }


     /**
     * Get category auctions.
     */
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }
}
