@extends('layouts.adminMaster')
@section('title', 'Modifica dolce nel database')


@section('content')
@parent
@foreach ($sweets as $sweet)
        <section class="py-5">
            <div class="container py-5">
                <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
                    <div class="reflow-product"> 
                        <div class="ref-media">
                            <div class="ref-preview">
                                <img class="ref-image active" src="<?php echo "/img/sweets/".strtolower($sweet->category->name)."/{$sweet->image}"; ?>"  data-reflow-preview-type="image"/>
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
                                    <a href="{{route('admin.modifySweetId', ['id' => $sweet->id])}}" class="ref-button">Modifica</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection