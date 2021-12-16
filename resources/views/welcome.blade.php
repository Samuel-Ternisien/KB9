@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>KB9</title>
</head>
<body>
<header>


    <div id="dvImage" style="position: absolute;
        width: 100%;
        height: 100vh;
        background-position: center;
        background-size: cover;
        filter: brightness(60%);
        filter: grayscale(20%);
        filter: opacity(80%) ;
        z-index: -1;">
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        var images = ["arcane.jpg","breakbad.jpg","loki.jpg","snk.png","squidgame.jpg"];
        $(function () {
            var i = 0;
            $("#dvImage").css("background-image", "url(img/carousel/" + images[i] + ")");
            setInterval(function () {
                i++;
                if (i == images.length) {
                    i = 0;
                }
                $("#dvImage").fadeOut("slow", function () {
                    $(this).css("background-image", "url(img/carousel/" + images[i] + ")");
                    $(this).fadeIn("slow");
                });
            }, 5000);
        });
    </script>
    <div class="header-back-shadow"></div>


    <div class="header-top">
        <div class="header-nav-g">
            <a href="{{route('catalogue')}}" class="header-lien-cat" >Catalogue</a>
        </div>
        <a href="#" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            @guest
                <a class="header-lien" href="{{ route('login') }}">Login</a>
                <a class="header-lien" href="{{ route('register') }}">Register</a>
            @else
                @if (Auth::user())
                    Bonjour {{ Auth::user()->name }}
                    <a href="{{route("profile",['id'=>Auth::user()->id])}}">Profil</a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>
    </div>
</header>


<h2 id="sorties">dernières sorties</h2>
<div class="container-card">
@if(!empty($series))
    @foreach($series as $serie)
        <a class="card" id="img" style="background-image: url({{$serie->urlImage}});" href="{{route("serie",['id'=>$serie->id])}}">
            <h3 class="titre-film">{{$serie->nom}}</h3>
        </a>
    @endforeach
@else
    <h3>aucune série</h3>
@endif

</div>


<footer class="footer-accueil">
    <div class="footer-accueil-cont" >
        <p class="footer-accueil-droit">Tous droits réservés à KB9</p>

        <a href="#"><img src="img/youtube.png" alt="" id="ytb"></a>
    </div>

</footer>

</body>
</html>