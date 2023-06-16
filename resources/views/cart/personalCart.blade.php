<?php session_start();?>
@extends('layouts.master')
@section('title', 'Il mio carrello')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Il mio <p class="fw-bold-inline text-success">carrello</p></h2>
                    <p class="fw-bold-personal text-success mb-2">Qui puoi revisionare ciò che vuoi comprare prima di pagare!</p>
                </div>
            </div>            
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection