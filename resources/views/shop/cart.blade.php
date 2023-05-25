<?php session_start();?>
@extends('layouts.master')
@section('title', 'Il mio carrello')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Benvenut<p class="fw-bold-inline text-success">ə</p></h2>
                    <p class="fw-bold-personal text-success mb-2">Entra nel tuo dolce profilo vegano</p>
                </div>
            </div>
            @foreach($orders as $order)
                ciao    
            @endforeach
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection