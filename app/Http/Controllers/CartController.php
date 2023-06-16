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
        if(isset($_SESSION['logged']))
        {
            $dl = new DataLayer();
            $cart = $dl->getCart($_SESSION['loggedEmail']);
            $categories = $dl-> listCategory();
            return view('cart.personalCart')->with('cart',$cart)->with('categories',$categories);

        }else
        {
            $_SESSION['errorMessage'] = $this->ERRORE_LOG_CARRELLO;
            return view('auth.authErrorPage');
        }
    }
}
