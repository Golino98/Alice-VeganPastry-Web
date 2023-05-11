<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    public function getHome()
    {
        session_start();

        //Controllo se non è settato il valore logged
        if (!isset($_SESSION['logged'])) {
            return view('index')->with('logged', false);
        } else {
            return view('index')->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
        }
    }
}