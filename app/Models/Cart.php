<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    public $timestamps = false;


    // un cart deve può avere molti dolci
    public function sweets()
    {
        return $this->belongsToMany(Sweet::class, 'cart_sweet', 'cart_id', 'sweet_id');
    }

    //Ogni carrello appartiene ad un solo utente
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}