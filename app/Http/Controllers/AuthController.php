<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use Illuminate\Http\Request;
use Redirect;

class AuthController extends Controller
{
    //Apro la vista
    public function authentication()
    {
        //Sottocartella auth, view auth
        return view('auth.auth');
    }

    public function login(Request $req)
    {
        //Creo una funzione php per salvare lo stato in quanto http è stateless
        session_start();

        //Guardo i due campi nella form auth.blade.php, sono username e password
        $dl = new DataLayer();
        if($dl->validUser($req->input('email'), $req->input('password')))
        {
            //Se l'utente è valido lo salvo nella sessione
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $dl->getUserName($req->input('email'));
            $_SESSION['email'] = $req->input('email');


            // Se l'utente è valido lo ridirezione alla rotta book.index
            return Redirect::to(route('sweet.index'));
        }
        return view('auth.authErrorPage');
    }

    //Creazione del metodo logout
    public function logout()
    {
        session_start();
        session_destroy();
        
        return Redirect::to(route('home'));
    }

    public function registration(Request $req) {
        $dl = new DataLayer();        
        $dl->addUser($req->input('name'), $req->input('password'), $req->input('email'));
        return Redirect::to(route('user.login'));
    }
}
