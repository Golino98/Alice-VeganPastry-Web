<?php session_start(); ?>
@extends('layouts.master')
@section('title', 'I nostri dolci')

<script type="text/javascript" src="js\number-sweets.js"></script>

@section('menu')
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-split active" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"> I nostri dolci </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('sweet.show', ['category' => 'torta'])}}">Torte</a></li>           
            <li><a class="dropdown-item" href="{{route('sweet.show', ['category' => 'biscotto'])}}">Biscotti</a></li>
            <li><a class="dropdown-item" href="{{route('sweet.show', ['category' => 'cupcake'])}}">Cupcake</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" onclick="event.preventDefault();" href="{{ route('sweet.index')}}">Scoprili tutti!</a></li>
        </ul>
    </li>
@endsection

@section('content')
    @parent
    <!-- Inserimento interfacciamento con Database -->
    <section class="py-5">
        <!-- Start: Team -->
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">I nostri dolci</h2>
                    <p class="text-muted">Guarda e compra i nostri dolci, cruelty free al 100%.&nbsp;</p>
                </div>
            </div>            
        </div>

        @foreach ($sweets as $sweet)
        <?php $_SESSION['sweetId'] = $sweet->id; ?>
        <section class="py-5">
            <div class="container py-5">
                <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
                    <div class="reflow-product"> 
                        <div class="ref-media">
                            <div class="ref-preview">
                                <img class="ref-image active" src="<?php echo "img/sweets/{$sweet->category->name}/{$sweet->image}"; ?>"  data-reflow-preview-type="image"/>
                            </div>
                            <div class="ref-product-data">
                                <div>
                                <h2 class="ref-name"> {{$sweet->name}}</h2>
                                <div class="ref-categories">
                                    <span class="ref-category"> {{$sweet->category->name}} </span>
                                </div>
                                <div class ="ref-description">
                                    {{$sweet->description}}
                                </div>
                                <strong class="ref-price ref-on-sale">€ {{$sweet->price}}</strong>
                                <span data-reflow-type="add-to-cart" data-reflow-shoppingcart-url="shopping-cart.html" data-reflow-addtocart-text data-reflow-product="589605485" data-reflow-variant="199976733_s">
                                    <form id="modify-form" action="{{route('order.store')}}" method="post">
                                    <div class="reflow-add-to-cart ref-product-controls">
                                            <span data-reflow-variant="199976733_s" data-reflow-product="589605485" data-reflow-max-qty="20" data-reflow-quantity="1">
                                                <div class ="ref-quantity-widget">                                                    
                                                    <button type="button" class="btn-minus"  onclick="decrease({{$sweet->id}})">-</button>    
                                                        <input type="number" id='valueSweets{{$sweet->id}}' name="quantity" value=0 min=0 max=20 onfocus="this.value=''"/>
                                                    <button type="button" class="btn-plus" onclick="increase({{$sweet->id}})">+</button>
                                            </span>
                                        </div>
                                        @csrf
                                        <label for="Modify" class="ref-button">Aggiungi al carrello  <i class="bi bi-check2"></i></label>
                                        <input id="Modify" type="submit" value="Modify" hidden>
                                    </form>
                                </span>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </section><!-- Start: Footer Multi Column -->
@endsection