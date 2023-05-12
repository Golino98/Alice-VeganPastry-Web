<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = ['name'];
    public $tiemstamps = false;
    
    // Associazione 1...n fra Category -> Sweet
    public function sweets()
    {
        return $this->hasMany(Sweet::class,'id','id');
    }
}
