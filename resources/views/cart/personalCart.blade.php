@extends('layouts.master')
@section('title', 'Il mio carrello')

@php
    use App\Models\Sweet;
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $cartItem)
                    @php
                        $sweet = Sweet::find($cartItem->sweet_id);
                    @endphp
                    <tr>
                        <td>{{ $sweet->name }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                    </tr>
                    @endforeach
            @else
                <p class="fw-bold-personal text-success mb-2">Il tuo carrello è vuoto!</p>
            @endif
            </tbody>
            </table>
        </div>
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection
