<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'user_id', 'lot_id', 'interest', 'resell', 'faceValue'];

    /**
     * Get the user who made the purchase.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the purchased lot.
     */
    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }

    /**
     * Get the purchased lot sec_type.
     */
    public function sec_type()
    {
        return $this->belongsTo(Sec_type::class);
    }

}
