<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataLayer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrdersOfUser()
    {
        session_start();
        $dl = new DataLayer();
        $orders = $dl->getOrders();
        return view('order.userList')->with('orders', $orders)->with('categories', $dl->listCategory());
    }
       public function modifyStatus(Request $req)
    {
        $order = Order::find($req->order_id);
        $order->status = $req->status;
        $order->save();
        return redirect()->route('admin.control');
    }

    public function listByStatus($status)
    {
        $orders = Order::where('status', $status)->get();
        return view('admin.adminControlSystem', ['orders' => $orders]);
    }
}
