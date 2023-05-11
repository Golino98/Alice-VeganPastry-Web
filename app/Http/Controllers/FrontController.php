<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
