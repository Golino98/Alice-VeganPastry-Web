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

     public function retrieve()
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.modifyCategory')->with('categories', $categories);
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
            $category = $dl->getCategoryById($id);
            return view('admin.modifySpecificCategory')->with('category', $category);
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
            $dl->modifyCategory($request->input('id'), $request->input('name'));
            return redirect()->route('admin.control');
        }
        else
        {
            $_SESSION['errorMessage'] = "non hai i privilegi necessari per accedere a questa pagina!";
            return view('auth.authErrorPage');
        }
     }

     public function remove($id)
     {
        session_start();
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            $dl = new DataLayer();
            $dl->deleteCategory($id);
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
