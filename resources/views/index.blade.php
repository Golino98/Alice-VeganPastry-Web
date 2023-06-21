@extends('layouts.master')
@section('title', 'I nostri dolci')
<script type="text/javascript" src="js/number-sweets.js"></script>

@section('menu')

    <li class="nav-item"><a class="nav-link active" onclick="event.preventDefault();" href="{{route('sweet.index')}}">Home</a></li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-split" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"> I nostri dolci </a>
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

    <header class="bg-primary-gradient">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="fw-bold"><p class="fw-bold-inline text-success">Pasticceria Vegana</p> made in <p class="fw-bold-inline text-success">Vallecamonica</p></h1>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img class="rounded img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.5" src="/img/home/2.jpg"></div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img class="rounded img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4" src="/img/home/1.jpg"></div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-25%, 15%, 0);"><img class="rounded img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.7" src="/img/home/3.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Contattaci</p>
                    <p><br></p>
                    <h2 class="fw-bold">Le nostre <p class="fw-bold-inline text-success">informazioni</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div></div>
                    <div class="rounded img-fluid" style="height: 250px;background-image: url(/img/sweets/biscotto/cuori_marmellata.jpg);background-position: center;background-size: cover;"></div>
                    </div>
                    <div class="col-md-4 col-xl-4 d-flex justify-content-center justify-content-xl-start">
                    <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Telefono</h6>
                                <p class="text-muted mb-0">+39 345 828 1074</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                            <i class="bi bi-bank"></i></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Partita IVA</h6>
                                <p class="text-muted mb-0">04385700986</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                            <i class="bi bi-geo"></i></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Il nostro Bar</h6>
                                <p class="text-muted mb-0">Via Arca dei Salici, Darfo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End: Contact Details -->

@endsection