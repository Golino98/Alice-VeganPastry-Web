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
        $categories = $dl->listCategory();
        return view('sweet.sweets')->with('sweets', $sweets)->with('categories', $categories);
    }
    public function show($id)
    {
        $dl = new DataLayer();
        $sweets = $dl->listSweetByCategoryName($id);
        $categories = $dl->listCategory();
        return view ('sweet.sweets')->with('sweets', $sweets)->with('categories', $categories);
    }
    public function insert()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.addSweet')->with('categories', $categories);
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
     }

     public function retrieve()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $sweets = $dl->listSweet();
            $categories = $dl->listCategory();
            return view('admin.modifySweet')->with('sweets', $sweets)->with('categories', $categories);
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
     }

     public function modify($id)
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $sweet = $dl->getSweetById($id);
            $categories = $dl->listCategory();
            return view('admin.modifySpecificSweet')->with('sweet', $sweet)->with('categories', $categories);
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
     }

     public function saveModification(Request $request)
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $dl->modifySweet($request->input('id'), $request->input('name'), $request->input('category'), $request->input('price'), $request->input('description'));
            return redirect()->route('admin.control');
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

    public function remove(Request $request)
    {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $dl->deleteSweet($request->input('id'));
            return redirect()->route('admin.control');
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
    }
        
}
