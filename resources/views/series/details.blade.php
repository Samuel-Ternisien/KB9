<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/details.css">
    <title>{{$series[0]->nom}}</title>
</head>
<body>
<header>
    <div class="header-back"></div>
    <div class="header-back-shadow"></div>
    <div class="header-top">
        <div class="header-nav-g">
            <a href="{{route('/')}}" class="header-lien-cat" >Accueil</a>
        </div>
        <a href="{{route("/")}}" id="lien-logo"><img src="../img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            @guest
                <a class="header-lien-cat" href="{{ route('login') }}">Login</a>
                <a class="header-lien-cat" href="{{ route('register') }}">Register</a>
            @else
                @if (Auth::user())
                    <a class="header-lien-cat" href="{{route("profile",['id'=>Auth::user()->id])}}">Profil</a>
                @endif
                <a class="header-lien-cat" href="{{ route('logout') }}"
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
<div class="cont-info-serie">
    @if(!empty($series))
        @foreach($series as $serie)
    <img src="../{{$serie->urlImage}}" alt="" class="img-info-serie">
    <div class="info-info-serie">
        <h2>{{$serie->nom}}</h2>
        <p>{!!$serie->resume!!}</p>
        <p>Genre : {{$serie->genre}}</p>
        <p>VO : {{$serie->langue}}</p>
        <p>Date de sortie : {{$serie->premiere}}</p>
        <p>Nombre d'épisode : {{$episode_nb}}</p>
        <p>Nombre de saison : {{$saison_nb}}</p>
        <p>Note : 8/10</p>
    </div>
</div>
@endforeach
 @endif
@if($series[0]->avis!=null)
<h2 class="avis-redac">Avis de la rédaction</h2>


<div class="contain-avis-redac">
    <p class="avis-redac-cont">{!! $series[0]-> avis!!}}</p>
</div>
@endif

<h2 class="avis-redac">liste des épisodes</h2>
@for($i=1; $i < $saison_nb+1; $i++)
<p class="saison-episode-serie">Saison : {{$i}}</p>
<div class="container-episode-serie" >
@foreach($episode as $episodes)
    @if($episodes->saison == $i)

    <a class="episode-serie"  href="#" style="background-image: url({{'../' . $episodes->urlImage}}">
        <h3 class="episode-serie-nb">épisode {{$episodes->numero}}</h3>
        <h3 class="episode-serie-titre">{{$episodes->nom}}</h3>
    </a>


    @endif
@endforeach
</div>
@endfor


</body>
</html>