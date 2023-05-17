<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredient';
    protected $fillable = ['name'];
    public $timestamps = false;

    // Associazione n...n fra Ingredient -> Sweet
    public function sweets()
    {
        return $this->belongsToMany(Sweet::class,'ingredient_sweet','sweet_id','ingredient_id');
    }
}
