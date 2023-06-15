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
        <!-- Start: Hero Clean Reverse -->
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="fw-bold">Pasticceria Vegana made in Vallecamonica</h1>
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
        </div><!-- End: Hero Clean Reverse -->

        <!-- Start: Features Cards -->
        <!-- <div class="container bg-primary-gradient py-5">
                <section>
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">DA INSERIRE</p>
                    <h3 class="fw-bold">Cosa possiamo fare per te</h3>
                </div>
            </div>
            <div class="py-5 p-lg-5">
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <div class="col mb-5">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Lorem ipsum dolor sit&nbsp;</h5>
                                <p class="text-muted card-text mb-4">Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p>
                                <button class="btn btn-log shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Lorem ipsum dolor sit&nbsp;</h5>
                                <p class="text-muted card-text mb-4">Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p><button class="btn btn-log shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div> -->
        <!-- End: Features Cards -->
        <!-- Start: Features Cards -->
        <!-- <section>
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
                    <div class="col mb-4">
                        <div class="card bg-primary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-primary card-text mb-2">Fully Managed</p>
                                <h5 class="fw-bold card-title mb-3">Lorem ipsum dolor sit&nbsp;nullam et quis ad cras porttitor</h5><button class="btn btn-log btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-info-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-info card-text mb-2">Fully Managed</p>
                                <h5 class="fw-bold card-title mb-3">Lorem ipsum dolor sit&nbsp;nullam et quis ad cras porttitor</h5><button class="btn btn-log btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End: Features Cards -->
    
    <!-- Start: Contact Details -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Contattaci</p>
                    <h2 class="fw-bold">Come trovarci</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <!-- Start: Success Example -->
                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Nome"></div><!-- End: Success Example -->
                            <!-- Start: Error Example -->
                            <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div><!-- End: Error Example -->
                            <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Dicci qualcosa!"></textarea></div>
                            <div><button class="btn btn-log shadow d-block w-100" type="submit"><i class="bi bi-send"></i> Invia</button></div>
                        </form>
                    </div>
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