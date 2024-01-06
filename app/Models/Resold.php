<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resold extends Model
{
    use HasFactory;
    protected $fillable = ['lot_id', 'seller_id', 'price','buyer_id', 'category_id'];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
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
