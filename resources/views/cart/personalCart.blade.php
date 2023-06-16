@extends('layouts.master')
@section('title', 'Il mio carrello')

@php
    use App\Models\Sweet;
    $totalPrice = 0;
@endphp

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Il mio <p class="fw-bold-inline text-success">carrello</p></h2>
            @if(isset($cart))            
                        <p class="fw-bold-personal text-success mb-2">Revisiona ciò che vuoi comprare prima di pagare!</p>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Nome dolce</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Prezzo al pezzo</th>
                    <th scope="col">Azioni</th>
                    <th scope="col">Prezzo totale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $cartItem)
                    @php
                        $sweet = Sweet::find($cartItem->sweet_id);
                        $subtotal = $sweet->price * $cartItem->quantity;
                        $totalPrice += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $sweet->name }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $sweet->price}} €</td>
                        <td> 
                            <button type="submit" class="btn btn-block btn-log"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-block btn-minus"><i class="bi bi-trash3"></i></button>
                        </td>
                        <td>{{ $subtotal }} €</td>
                    </tr>
                    @endforeach
            @else
                <p class="fw-bold-personal text-success mb-2">Il tuo carrello è vuoto!</p>
            @endif

            <tr>
                <td colspan ="3"></td>
                <td></td>
                <td colspan="1">
                    <hr class="total-separator">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="fw-bold">Totale</td>
                <td class="fw-bold">{{ $totalPrice }} €</td>
            </tr>
            <tr>
                <td colspan ="4"></td>
                <td colspan="1">
                    <!-- Inserire del codice per il post in modo tale che mi faccia andare alla pagina di checkout (paypal/stripe) -->
                    <a href="#" class="btn btn-block btn-annulla">Checkout</a>
                </td>
                </tbody>
            </table>
        </div>
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection