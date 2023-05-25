<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;

class SweetController extends Controller
{   
    public function index()
    {
        $dl = new DataLayer();
        $sweets = $dl->listSweet();
        return view('sweet.sweets')->with('sweets', $sweets);
    }
    public function show($id)
    {
        $dl = new DataLayer();
        $sweets = $dl->listSweetByCategoryName($id);
        return view ('sweet.sweets')->with('sweets', $sweets);
    }
}
