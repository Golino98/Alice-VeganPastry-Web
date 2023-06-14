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
    public function insert()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.addToDb')->with('categories', $categories);
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
     }

    public function save(Request $request)
    {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $dl->addSweet($request->input('name'), $request->input('category'), $request->input('price'), $request->input('description'), $request->input('image'));
            return redirect()->route('admin.control');
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
    }
}
