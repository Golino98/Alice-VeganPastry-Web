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


    // Associazione n...n fra Cake -> Ingredient
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'ingredient_sweet','ingredient_id','sweet_id');
    }

    //Associazione 1...n fra Cake -> Category
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_sweet','sweet_id','order_id');
    }
}
