<?php session_start();?>
@extends('layouts.master')
@section('title', 'Registrati')

@section('content')
@parent     
    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Benvenut<p class="fw-bold-inline text-success">ə</p></h2>
                    <p class="fw-bold-personal text-success mb-2">Crea il tuo profilo vegano</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                                <form id="register-form" action="{{route('user.registration')}}" method="post">
                                    @csrf
                                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Username"></div>
                                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                    <div class="mb-3"><input class="form-control" type="password" name="password" id="password" placeholder="Password"></div>
                                    <div class="mb-3"><input class="form-control" type="password" name="conf_password" id="confirm_password" placeholder="Reinserisci la password"></div>
                                    <label for="Register" class="btn btn-log"><i class="bi-check-lg"></i> Registrati</label>
                                    <input id="Register" type="submit" value="Register" hidden>
                                </form>
                            <p class="text-muted-personal">Hai già un profilo?&nbsp;<a href="{{route('user.login')}}">Accedi</a></p>
                        </div>
                </div>
            </div>
        </div>
    </section><!-- Start: Footer Multi Column -->
@endsection