<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = false;

    // Un ordine è associato ad un utente
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    // molti ordini possono avere molti dolci
    public function sweets()
    {
        return $this->belongsToMany(Sweet::class, 'order_sweet', 'order_id', 'sweet_id');
    }
}
