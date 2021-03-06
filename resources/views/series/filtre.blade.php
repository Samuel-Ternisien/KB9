<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/catalogue.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>KB9</title>



    <style>


    </style>
</head>
<body>
<header>
    <div class="header-back"></div>
    <div class="header-back-shadow"></div>
    <div class="header-top">
        <div class="header-nav-g">
            <a href="{{route('catalogue')}}" class="header-lien-cat" >Catalogue</a>
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

<div class="container-serie" >
    @if(!empty($series))
        @for($i=0; $i < count($series); $i++)
            <a class="serie"  href="{{route("serie",['id'=>$series[$i]->id])}}" style="background-image: url({{'../' . $series[$i]->urlImage}}" alt="{{$series[$i]->nom}}";>
                <h3 class="film-titre">{{$series[$i]->nom}}</h3>
                <h3 class="film-langue">{{$series[$i]->langue}}</h3>
                <h3 class="film-genre">{{$series[$i]->genre}}</h3>
                @auth
                    <p class="film-vu">{{\Illuminate\Support\Facades\Auth::user()->aVuUneSerie($series[$i]->id) ? "D??j?? vu" : "A voir"}}</p>
                @endauth
            </a>
        @endfor
    @else
        <h3>Aucune s??rie trouv?? !</h3>
    @endif
</div>


</body>

</html>