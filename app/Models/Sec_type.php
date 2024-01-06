<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sec_type extends Model
{
    use HasFactory;

    /**
     * Get sec_type lots.
     */
    public function lots()
    {
        return $this->hasMany(Lot::class);
    }
}
