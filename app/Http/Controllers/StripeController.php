<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DataLayer;
use App\Models\Sweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Recupera la lista degli item dal form
        $cartItems = json_decode($request->input('cartItems'));

        // Crea un array di lineItems per i dolci nel carrello
        $lineItems = [];

        foreach ($cartItems as $item) {
            $sweet = Sweet::find($item->sweet_id);

            $lineItems[] = [
                'price_data' => [
                    'currency' => config('stripe.currency'),
                    'product_data' => [
                        'name' => $sweet->name,
                    ],
                    'unit_amount' => $sweet->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => config('stripe.payment_method_types'),
            'locale' => config('stripe.language'),
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('cart.carrello'),
        ]);

        return redirect()->to($session->url);
    }

    public function success()
    {
        session_start();
        $dl = new DataLayer();
        $categories = $dl->listCategory();
        $dl->insertOrder($_SESSION['loggedEmail']);
        $dl->deleteCart($_SESSION['loggedEmail']);
        return view('payment.success')->with('categories', $categories);
    }
}
