<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    /**
     * Get market lots.
     */
    public function lots()
    {
        return $this->hasMany(Lot::class);
    }
}
