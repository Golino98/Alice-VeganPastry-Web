<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class FrontController extends Controller

{
    public function getHome()
    {
        $dl = new DataLayer();
        $categories = $dl->listCategory();

        if (isset($_SESSION['logged'])) 
        {
            return view('index')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('categories', $categories);
        } else 
        {
            return view('index')->with('logged', false)->with('categories', $categories);
        }
    }
}
