<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resell extends Model
{
    use HasFactory;

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



}
