<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    // Crea una variabile privata non modificabile
    private $MESSAGGIO_ERRORE = "non hai i privilegi necessari per accedere a questa pagina!"; 
    public function insert()
     {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.addCategory')->with('categories', $categories);
        }
        else
        {
           return $this->returnErrorPage();
        }
     }

     public function retrieve()
     {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $categories = $dl->listCategory();
            return view('admin.modifyCategory')->with('categories', $categories);
        }
        else
        {
           return $this->returnErrorPage();
        }
     }

     public function modify($id)
     {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $category = $dl->getCategoryById($id);
            return view('admin.modifySpecificCategory')->with('category', $category);
        }
        else
        {
           return $this->returnErrorPage();
        }
     }

     public function saveModification(Request $request)
     {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $dl->modifyCategory($request->input('id'), $request->input('name'));
            return redirect()->route('admin.control');
        }
        else
        {
           return $this->returnErrorPage();
        }
     }

     public function remove($id)
     {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $dl->deleteCategory($id);
            return redirect()->route('admin.control');
        }
        else
        {
           return $this->returnErrorPage();
        }
     }

    public function save(Request $request)
    {
        session_start();
        if($this->checkPrivilege())
        {
            $dl = new DataLayer();
            $dl->addCategory($request->input('name'));
            return view('admin.adminControlSystem');
        }
        else
        {
           return $this->returnErrorPage();
        }
    }

    private function checkPrivilege()
    {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && $_SESSION['privilege'] == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function returnErrorPage()
    {
        $_SESSION['errorMessage'] = $this->MESSAGGIO_ERRORE;
        return view('auth.authErrorPage');
    }
}
