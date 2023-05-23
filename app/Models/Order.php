<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function sweets()
    {
        return $this->belongsToMany(Sweet::class, 'order_sweet', 'sweet_id', 'order_id');
    }

    //Ogni ordine appartiene ad un solo utente
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
