<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $ERRORE_LOG_CARRELLO = "devi essere loggato per accedere al carrello!";
    public function showCart()
    {
        session_start();
        if($this->checkIfLogged())
        {
            $dl = new DataLayer();
            $cart = $dl->getCart($_SESSION['loggedEmail']);
            $categories = $dl-> listCategory();
            return view('cart.personalCart')->with('cart',$cart)->with('categories',$categories);

        }else
        {
            return $this->returnError();
        }
    }

    public function addToCart(Request $req)
    {
        session_start();
        if($this->checkIfLogged())
        {
            $dl = new DataLayer();
            $dl->addToCart($_SESSION['loggedEmail'],$req->input('sweet_id'),$req->input('quantity'));
            
        }else
        {
            return $this->returnError();
        }
    }

    public function removeItem(Request $req)
    {
        session_start();
        if($this->checkIfLogged())
        {
            $dl = new DataLayer();
            $dl->removeItem($_SESSION['loggedEmail'],$req->input('id'));
            $cart = $dl->getCart($_SESSION['loggedEmail']);
            return redirect()->route('cart.carrello')->with('cart',$cart);
        }else
        {
            return $this->returnError();
        }
    }

    private function checkIfLogged()
    {
        if(isset($_SESSION['logged']))
        {
            return true;
        }else
        {
            return false;
        }
    }

    public function updateQuantity(Request $request)
    {
        session_start();
        $dl = new DataLayer();
        $dl->updateCart($_SESSION['loggedEmail'], $request->input('id'), $request->input('quantity'));
        return redirect()->route('cart.carrello');
    }

    private function returnError()
    {
        $_SESSION['errorMessage'] = $this->ERRORE_LOG_CARRELLO;
        return view('auth.authErrorPage');
    }
}
