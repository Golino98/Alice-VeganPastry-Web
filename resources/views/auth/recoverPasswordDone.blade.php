@extends('layouts.master')
@section('title', 'Errore')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold"><p class="fw-bold-inline text-success">Ops!</h2>
                    <p class="fw-bold-personal mb-2">Perfetto, ti abbiamo inviato un'email per il recupero della password</p>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_N80Odj.json"  background="transparent"  speed="0.75"  style="width: 200px; height: auto;"  loop  autoplay></lottie-player>
                    <a class="btn btn-minus" role="button" onclick="history.go(-1)"><i class="bi bi-caret-left"></i> Torna indietro</a>
                    <a class="btn btn-log shadow" role="button" href="{{route('user.login')}}"><i class="bi bi-balloon"></i> Vai al login</a>
                </div>
            </div>
        </div>
    </section>
@endsection