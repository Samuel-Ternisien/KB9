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
    <div class="header-back">
    </div>
    <div class="header-back-shadow">
    </div>

    <div class="header-top">
        <a href="#" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            @yield('connection ')
            <a href="#" class="header-lien" >Connexion</a>
            <a href="#" class="header-lien" >Inscription</a>
        </div>
    </div>

</header>


<h2 id="sorties">dernières sorties</h2>
<div class="container-card">
@if(!empty($series))
    @foreach($series as $serie)
        <a class="card" id="img" style="background-image: url({{$serie->urlImage}});" href="#">
            <h3 class="titre-film">{{$serie->nom}}</h3>
        </a>
    @endforeach
@else
    <h3>aucun smartphone</h3>
@endif

</div>


<footer class="footer-accueil">
    <div class="footer-accueil-cont" >
        <p class="footer-accueil-droit">Tout droits réservé à KB9</p>

        <a href="#"><img src="img/youtube.png" alt="" id="ytb"></a>
    </div>

</footer>

</body>
</html>