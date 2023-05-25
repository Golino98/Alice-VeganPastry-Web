<?php session_start(); ?>
@extends('layouts.master')
@section('title', 'I nostri dolci')

<script type="text/javascript" src="js\number-sweets.js"></script>
<script type="text/javascript" src="js\add-to-cart.js"></script>

@section('menu')
    @parent
    
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
        <section class="py-5">
            <div class="container py-5">
                <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
                    <div class="reflow-product"> 
                        <div class="ref-media">
                            <div class="ref-preview">
                            <?php $path = "img/sweets/{$sweet->category->name}/{$sweet->image}"; ?>
                                <img class="ref-image active" src="<?php echo $path ?>"  data-reflow-preview-type="image"/>
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
                                    <div class="reflow-add-to-cart ref-product-controls">
                                            <span data-reflow-variant="199976733_s" data-reflow-product="589605485" data-reflow-max-qty="20" data-reflow-quantity="1">
                                                <div class ="ref-quantity-widget">                                                    
                                                    <button type="button" class="btn-minus"  onclick="decrease({{$sweet->id}})">-</button>    
                                                        <input type="number" id='valueSweets{{$sweet->id}}' value=0 min=0 max=20 onfocus="this.value=''"/>
                                                    <button type="button" class="btn-plus" onclick="increase({{$sweet->id}})">+</button>
                                                    </div>
                                            </span>
                                            @if(isset($_SESSION['logged']) && $_SESSION['logged'] == true)
                                                <a class="ref-button" id="liveAlertBtn{{$sweet->id}}" onclick="addToCart(true,{{$sweet->id}})"><i class="bi bi-cart3"></i> Aggiungi al carrello</a>     
                                                <div id="liveAlertPlaceholder{{$sweet->id}}"></div>
                                            @else
                                                <a class="ref-button" id="liveAlertBtn{{$sweet->id}}" onclick="addToCart(false,{{$sweet->id}})"><i class="bi bi-cart3"></i> Aggiungi al carrello</a>     
                                                <div id="liveAlertPlaceholder{{$sweet->id}}"></div>
                                            @endif
                                    </div>        
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </section><!-- Start: Footer Multi Column -->
@endsection