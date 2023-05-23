<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\DataLayer;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        $dl = new DataLayer();
        session_start();
        $id = $dl->getUserId($_SESSION['loggedEmail']);

        try
        {
            
        }
        catch(\Exception $e)
        {
            
        }
    }
}
