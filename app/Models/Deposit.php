<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'amount', 'status', 'deposit_slip'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
