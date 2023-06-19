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
                    @if(!($cart->isEmpty()))
                        <h2 class="fw-bold">Il mio <p class="fw-bold-inline text-success">carrello</p></h2>
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
                                <th scope="col">Elimina</th>
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
                                    <td>{{ $sweet->price }} €</td>
                                    <td> 
                                        <button type="button" class="btn btn-back" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $cartItem->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                        <div class="modal fade" id="deleteModal{{ $cartItem->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $cartItem->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $cartItem->id }}">Eliminazione</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare <p class="fw-bold-inline text-success"><?php echo strtolower("$sweet->name (x$cartItem->quantity)");?></p> dal carrello?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-annulla" data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('cart.removeItem') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$cartItem->id}}">
                                                            <button type="submit" class="btn btn-back">Elimina</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $subtotal }} €</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"></td>
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
                                <td colspan="4"></td>
                                <td colspan="1">
                                    <!-- Inserire del codice per il post in modo tale che mi faccia andare alla pagina di checkout (paypal/stripe) -->
                                    <form action="{{route('checkout')}}" method="POST">
                                        @csrf
                                        <!-- Passa in maniera nascosta la lista degli item come JSON serializzato -->
                                        <input type="hidden" name="cartItems" value="{{ json_encode($cart) }}">
                                        <button type="submit" class="btn btn-block btn-annulla">Checkout</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <h2 class="fw-bold">Il tuo <p class="fw-bold-inline text-success">carrello</p> è <text class ="fw-bold-inline text-success">vuoto!</h2>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_qh5z2fdq.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;"  loop  autoplay></lottie-player>
                @endif
            </div>
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection
