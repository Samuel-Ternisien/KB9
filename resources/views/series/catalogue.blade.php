<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/catalogue.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>KB9</title>



    <style>


    </style>
</head>
<body>
<header>
    <div class="header-top">
        <div class="header-nav-g">
            <a href="{{route('catalogue')}}" class="header-lien-cat" >Catalogue</a>
        </div>
        <a href="{{route("/")}}" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
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

<form action="" class="tout-search">
    <input type="text" placeholder="Une idée de série ?" class="search" name="">
    <select name="" class="selector-genre">
        <option value="">Vous voulez quel style de séries ?</option>
        <option value="">genre 1</option>
        <option value="">genre 2</option>
        <option value="">genre 3</option>
        <option value="">genre 4</option>
        <option value="">genre 5</option>
        <option value="">genre 6</option>
    </select>
    <input type="submit" class="submit-search" value="chercher">
</form>
<div class="container-serie" >
    @if(!empty($series))
            @for($i=0; $i < $series; $i++)

                <a class="serie"  href="{{route("serie",['id'=>$series->id])}}" style="background-image: url({{$serie->urlImage}}" alt="{{$series->nom}}";>

                    <h3 class="film-titre">{{$series->nom}}</h3>
                    <h3 class="film-langue">{{$series->langue}}</h3>
                    <h3 class="film-genre">{{$series->genre}}</h3>
                    <p class="film-vu">Vous avez vu cette série</p>
                </a>
            @endfor
    @else
        <h3>aucune série</h3>
    @endif
</div>


</body>
</html>