<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;

class SweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     // TODO chiedere al profe come prendere in ingresso il nome della categoria per fare un filtering

    // public function index($category)
    // {
    //     $dl = new DataLayer();
    //     $sweets = $dl->listSweet($category);
    //     return view('sweet.sweets')->with('sweets', $sweets);
    // }

    public function index()
    {
        $dl = new DataLayer();
        $sweets = $dl->listSweet();
        return view('sweet.sweets')->with('sweets', $sweets);
    }
}
