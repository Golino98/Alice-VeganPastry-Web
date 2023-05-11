<?php

namespace App\Models;

class DataLayer
{
    public function listSweets()
    {
        $sweets = Sweet::orderBy('name','asc')->get();
        return $sweets;
    }
}