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
        session_start();

        if (isset($_SESSION['logged'])) 
        {
            return view('index')->with($_SESSION['logged'], true)->with('loggedName', $_SESSION['loggedName'])->with('categories', $categories);
        } else 
        {
            // Crea la variabile $_SESSION['logged']
            return view('index')->with('categories', $categories);
            
        }
    }
}
