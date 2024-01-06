<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = ['issueNo', 'auctionDate', 'cat_id'];



    /**
     * Get coupon lots.
     */
    public function lots()
    {
        return $this->hasMany(Lot::class);
    }

    /**
     * Get the category the lot belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
