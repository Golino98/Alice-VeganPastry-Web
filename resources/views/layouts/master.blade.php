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
            <span>Alice VeganPastry</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                @section('menu')
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-split" href="{{ route('sweet.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"> I nostri dolci </a>
                    <ul class="dropdown-menu">
                    @if(isset($categories))
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('sweet.show', ['category' => $category->name])}}">{{$category->name}}</a></li>
                    @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('sweet.index')}}">Scoprili tutti!</a></li>
                        @endif
                    </ul>
                </li>

                @show
                </li>
            </ul>
            <!-- Check if logged is true or false  -->
            @if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['privilege']) && $_SESSION['privilege']==0)
                <div class="btn-group">
                    <button class="btn btn-log" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{$_SESSION['loggedName']}} <i class="bi bi-list-nested"></i>
                </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('cart.carrello')}}"><i class="bi bi-cart3"></i> Il mio carrello</a></li>
                        <li><a class="dropdown-item" href="{{route('user.orders')}}"><i class="bi bi-bag-heart"></i> I miei ordini</a></li>
                        <li><a class="dropdown-item" href="{{route('user.modify')}}"><i class="bi bi-person-lines-fill"></i> Modifica profilo</a></li>
                        <li><a class="dropdown-item" href="{{route('user.logout')}}"><i class="bi bi-door-open"></i> Esci</a></li>
                    </ul>
                </div>
            @elseif(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['privilege']) && $_SESSION['privilege']==1)
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

<footer class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
        <table class="table  table-borderless">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Come e dove trovarci</th>
                            <th scope="col">I nostri social</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><i class="bi bi-geo-alt"></i><a href="https://www.google.it/maps/place/River+Oglio+bike+bar/@45.9003982,10.2071018,17z/data=!3m1!4b1!4m6!3m5!1s0x4783d1662433c493:0xf0bb4baae9c9cb24!8m2!3d45.9003982!4d10.2096767!16s%2Fg%2F11h4lmsq03?entry=ttu"> Google Maps</a></td>
                            <td><i class="bi bi-instagram"></i><a href="https://www.instagram.com/alice.veganpastry/"> VeganPastry</a></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class="bi bi-instagram"></i><a href="https://www.instagram.com/pellegrinellialice/"> Alice</a></td>
                            <td></td>
                            <td></td><td></td>
                        </tr>
                    </tbody>
                </table>
            <hr>
            <div class="text-center mb-0">
                <!-- Create a centered paragraph -->
                <p class="text-center mb-0">© 2023 Alice VeganPastry. All rights reserved.</p>                
            </div>
        </div>
    </footer><!-- End: Footer Multi Column -->
</body>
</html>