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
    public function index()
    {
        $dl = new DataLayer();
        $sweets = $dl->listSweets();
        return view('sweet.sweets')->with('sweets', $sweets);
    }
}
