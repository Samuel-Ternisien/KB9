<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="header-top">
        <div class="header-nav-g">
            <a href="{{route('/')}}" class="header-lien-cat" >Accueil</a>
        </div>
        <a href="{{route("/")}}" id="lien-logo"><img src="../img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            @guest
                <a class="header-lien" href="{{ route('login') }}">Login</a>
                <a class="header-lien" href="{{ route('register') }}">Register</a>
            @else
                @if (Auth::user())
                    <a class="header-lien" href="{{route("profile",['id'=>Auth::user()->id])}}">Profil</a>
                @endif
                <a class="header-lien" href="{{ route('logout') }}"
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

<div class="pos-avatar">
    <div class="contain-avatar">
        <img src="img/avatar2.png" alt="" class="avatar-img">
        <h3 class="nom-user">{{$user->name}}</h3>
        <h3 class="mail-user">Adresse mail : {{$user->email}}</h3>
        <form action="" class="lien-gp">
            <input type="hidden" value="" name="">
            <!--Si tu veux envoyer des valeurs met tes variables dans le type hidden-->
            <input type="submit" value="modifier le profil" class="lien-aff-gp">
        </form>
    </div>
</div>


<h2 id="serie-vu-user">Séries que {{$user->name}} a vu</h2>





<div class="container-serie" >

    @foreach($seen as $vu)
        <a class="serie"  href="{{route('serie',$vu->id)}}" style="background-image: url(../{{$vu->urlImage}});
    ">
            <h3 class="film-titre">{{$vu->nom}}</h3>
            <p class="film-vu">Vous avez vu cette série</p>
        </a>
    @endforeach

</div>


<h2 id="com-vu-user">Commentaires de {{$user->name}}</h2>
<div class="contain-com">
    @if($comments!=null)
    @foreach($comments as $com)
        <div class="com-header">
            <img src="../{{$user->avatar}}" alt="" class="avatar-com">
            <div class="header-com-info">
                <h3 class="nom-com">{{$user->name}}</h3>
                <p class="titre-serie-header-com">a commenté sur {{\App\Models\Serie::find($com->serie_id)->nom}}</p>
            </div>
            <div class="div-com">
                <p class="com">{!! $com->content !!}
                </p>
            </div>
        </div>

    @endforeach
    @endif
    @if($comments==null)
        <div class="div-com">
            <p class="com">Aucun commentaire
            </p>
        </div>
        @endif

</div>

</body>
</html>