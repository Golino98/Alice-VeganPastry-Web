<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function insert()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.addCategory')->with('categories', $categories);
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
            $dl->addCategory($request->input('name'));
            return view('admin.adminControlSystem');
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
    }
}
