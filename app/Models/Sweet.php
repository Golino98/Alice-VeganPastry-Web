<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sweet extends Model
{
    use HasFactory;

    protected $table = 'sweets';

    public $timestamps = false;
    protected $fillable = ['name','description', 'price','image'];

    //Associazione 1...n fra Cake -> Category
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    // molti dolci possono far parte di molti ordini
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_sweet', 'sweet_id', 'order_id');
    }    
}