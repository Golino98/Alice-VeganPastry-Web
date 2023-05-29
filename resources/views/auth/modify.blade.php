<?php session_start();?>
@extends('layouts.master')
@section('title', 'Modifica')

@section('content')
@parent
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Bentornat<p class="fw-bold-inline text-success">ə</p></h2>
                    <p class="fw-bold-personal text-success mb-2">Modifica il tuo profilo vegano</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg>
                            </div>
                                <form id="modify-form" action="{{route('user.modify')}}" method="post">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="form-control" class="form-control" type="text" name = "name" placeholder="Username" value="<?php echo $_SESSION["loggedName"];?>">
                                        <label>Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name = "password" id="password" placeholder="Password">
                                        <label>Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name = "conf_password" id="conf_password" placeholder="Password">
                                        <label>Reinserisci la password</label>
                                    </div>
                                    <label for="Modify" class="btn btn-log">Salva le modifiche  <i class="bi bi-check2"></i></label>
                                    <input id="Modify" type="submit" value="Modify" hidden>
                                </form>
                                <!-- Add space between the two buttons -->
                                <div class="mb-2"></div>
                                <div>  
                                    <a href="{{route('home')}}" class="btn btn-back">Torna alla Home  <i class="bi bi-house"></i></a>
                                    </div>
                            </div>
                            </div>
                    </div>
                    <!-- Create a button to go back to the Home -->

            </div>
        </div>
    </section>
@endsection