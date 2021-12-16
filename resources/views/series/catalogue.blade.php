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
    <div class="header-back">
    </div>
    <div class="header-back-shadow">
    </div>

    <div class="header-top">
        <div class="header-nav">
            <a href="{{route('catalogue')}}" class="header-lien" >Catalogue</a>
        </div>
        <a href="{{route('/')}}" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            <a href="{{route('login')}}" class="header-lien" >Connexion</a>
            <a href="{{route('register')}}" class="header-lien" >Inscription</a>
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
            @foreach($series as $serie)

                <a class="serie"  href="{{route("serie",['id'=>$serie->id])}}" style="background-image: url({{$serie->urlImage}}" alt="{{$serie->nom}}";>

                    <h3 class="film-titre">{{$serie->nom}}</h3>
                    <h3 class="film-langue">{{$serie->langue}}</h3>
                    <h3 class="film-genre">{{$serie->genre}}</h3>
                    <h3 class="film-saison">{{$serie->saison_nb}}</h3>
                    <p class="film-vu">Vous avez vu cette série</p>
                </a>
            @endforeach
    @else
        <h3>aucune série</h3>
    @endif
</div>


</body>
</html>