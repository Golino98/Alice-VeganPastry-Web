<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
