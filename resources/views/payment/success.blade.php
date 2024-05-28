@extends('layouts.master')
@section('title', 'Pagamento completato')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold"><p class="fw-bold-inline text-success">Ordine completato!</h2>
                    <p class="fw-bold-personal mb-2">Appena possibile ti contatteremo, <br> così ti comunicheremo quando saranno pronti i tuoi dolci!</p>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_sb8d3ngn.json"  background="transparent" speed="1.5"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                    <a class="btn btn-log shadow" role="button" href="{{route('home')}}"><i class="bi bi-balloon"></i> Pagina iniziale</a>
                    <div><br></div>
                    <a class="btn btn-back" role="button" href="{{route('user.orders')}}"><i class="bi bi-bag-heart""></i> I miei ordini</a>
                </div>
            </div>
        </div>
    </section>
@endsection