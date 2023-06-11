<?php if (session_status() === PHP_SESSION_NONE) 
{
    session_start();
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toolkit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>

<script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.reflowhq.com/v2/toolkit.min.js"></script>
    <script src="/js/bs-init.js"></script>
    <script src="/js/bold-and-bright.js"></script>
</script>

<body>

<!-- Start: Navbar Centered Links -->

<nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container" ><a class="navbar-brand d-flex align-items-center" href="{{route('home')}}"  alt="">
            <img src="/img/logo/logo.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top">
            </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                @section('menu')
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle-split" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi fi-rr-pie"></i> Dolci</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('admin.insert')}}">Aggiungi</a></li>           
                        <li><a class="dropdown-item" href="#">Modifica</a></li>
                        <li><a class="dropdown-item" href="#">Rimuovi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('sweet.index')}}">Visualizzali tutti</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle-split" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi fi-rr-notebook"></i> Categorie</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Aggiungi</a></li>           
                        <li><a class="dropdown-item" href="#">Modifica</a></li>
                        <li><a class="dropdown-item" href="#">Rimuovi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('sweet.index')}}">Visualizzali tutti</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle-split" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fi fi-rr-grape"></i> Ingredienti</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Aggiungi</a></li>           
                        <li><a class="dropdown-item" href="#">Modifica</a></li>
                        <li><a class="dropdown-item" href="#">Rimuovi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('sweet.index')}}">Visualizzali tutti</a></li>
                    </ul>
                </li>
                @show
                </li>
            </ul>    
            <!-- Check if logged is true or false  -->
                @if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['privilege']) && $_SESSION['privilege']==1)
                <div class="btn-group">

                        <button class="btn btn-log" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{$_SESSION['loggedName']}} <i class="bi bi-list-nested"></i>
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('admin.control')}}"><i class="bi bi-pie-chart"></i> Pannello di controllo</a></li>
                            <li><a class="dropdown-item" href="{{route('user.modify')}}"><i class="bi bi-person-lines-fill"></i> Modifica profilo</a></li>
                            <li><a class="dropdown-item" href="{{route('user.logout')}}"><i class="bi bi-door-open"></i> Esci</a></li>
                        </ul>
                    </div>
                @else
                    <!-- Cambia a btn-primary per farlo tornare blu -->
                    <a class="btn btn-log shadow" role="button" href="{{route('user.login')}}"><i class="bi bi-balloon"></i> Accedi</a>
                @endif
        </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->
@yield('content')