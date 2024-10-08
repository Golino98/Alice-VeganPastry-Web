<?php session_start(); ?>

@extends('layouts.master')
@section('title', 'I nostri dolci')

<script type="text/javascript" src="js\number-sweets.js"></script>
<script type="text/javascript" src="js\add-to-cart.js"></script>

@section('menu')
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-split active" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"> I nostri dolci </a>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li><a class="dropdown-item" href="{{route('sweet.show', ['category' => $category->name])}}">{{$category->name}}</a></li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('sweet.index')}}">Scoprili tutti!</a></li>
        </ul>
    </li>
@endsection

@section('content')
    @parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">I nostri <p class="fw-bold-inline text-success">dolci </p></h2>
                    <p class="text-muted">Guarda e compra i nostri dolci, <text class="text-success"> cruelty free </text>al 100%.&nbsp;</p>
                </div>
            </div>            
        </div>     
        
        @if(count($sweets) == 0)
            <div class="container py-5">
                <div class="row mb-4 mb-lg-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2 class="fw-bold">Non ci sono dolci in questa categoria!</h2>
                    </div>
                </div>            
            </div>
        @else
        @foreach ($sweets as $sweet)
        <section class="py-5">
            <div class="container py-5">
                <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
                    <div class="reflow-product"> 
                        <div class="ref-media">
                            <div class="ref-preview">
                                <img class="ref-image active" src="<?php echo "img/sweets/{$sweet->category->name}/{$sweet->image}"; ?>"  data-reflow-preview-type="image"/>
                            </div>
                        </div>
                            <div class="ref-product-data">
                                <div>
                                <h2 class="ref-name">{{$sweet->name}}</h2>
                                <div class="ref-categories">
                                    <span class="ref-category"> {{$sweet->category->name}} </span>
                                </div>
                                
                                <div class ="ref-description">
                                    {{$sweet->description}}
                                </div>
                                <strong class="ref-price ref-on-sale">€ {{$sweet->price}}</strong>
                                <span data-reflow-type="add-to-cart" data-reflow-shoppingcart-url="shopping-cart.html" data-reflow-addtocart-text data-reflow-product="589605485" data-reflow-variant="199976733_s">            
                                    <div class="reflow-add-to-cart ref-product-controls">
                                            <span data-reflow-variant="199976733_s" data-reflow-product="589605485" data-reflow-max-qty="20" data-reflow-quantity="1">
                                                <form id="addToCartForm{{$sweet->id}}" action="{{ route('cart.carrello', ['sweet_id' => $sweet->id])}}" method="POST" enctype="multipart/form-data">
                                                <div class ="ref-quantity-widget">                                                    
                                                    <button type="button" class="btn btn-back" onclick="decrease({{$sweet->id}})">-</button>    
                                                        <input type="number" id='quantity{{$sweet->id}}' name="quantity" value=0 min=0 max=20 onfocus="this.value=''"/>
                                                    <button type="button" class="btn btn-log" onclick="increase({{$sweet->id}})">+</button>
                                                </div>
                                            </span>
                                            <br>
                                            @if(isset($_SESSION['logged']))
                                            @csrf
                                            <button type="submit" class="ref-button" id="liveAlertBtn{{$sweet->id}}" onclick="addToCart(event, {{$sweet->id}}, true);">
                                                <i class="bi bi-cart3"></i> Aggiungi al carrello
                                            </button>
                                            <div id="liveAlertPlaceholder{{$sweet->id}}"></div>
                                        </form>
                                            @else
                                                <a class="btn btn-annulla" href={{route('user.login')}}><i class="bi bi-cart3"></i> Accedi per poter aggiungere al carrello </a>     
                                            @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
        @endif
    </section>
@endsection