<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/details.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="header-back">
    </div>
    <div class="header-back-shadow">
    </div>

    <div class="header-top">
        <div class="header-nav-g">
            <a href="#" class="header-lien-cat" >Catalogue</a>
        </div>
        <a href="#" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            <a href="#" class="header-lien" >Connexion</a>
            <a href="#" class="header-lien" >Inscription</a>
        </div>
    </div>

</header>
@if(!empty($series))
    @foreach($series as $serie)

        <div class="cont-info-serie">
            <img src="../{{$serie->urlImage}}" alt="{{$serie->nom}}" alt="" class="img-info-serie">
            <div class="info-info-serie">
                <h2>{{$serie->nom}}</h2>
                <p>{!! $serie->resume!!}    </p>
                <p>Genre : {{$serie->genre}}</p>
                <p>VO : {{$serie->langue}}</p>
                <p>Date de sortie : {{$serie->premiere}}</p>
                <p>Nombre d'épisode : {{$episode_nb}}</p>
                <p>Nombre de saison : {{$saison_nb}}</p>
                <p>Note : {{$serie->note}}</p>
            </div>
        </div>
        <h2 class="avis-redac">Avis de la rédaction</h2>

        <div class="contain-avis-redac">
            <p class="avis-redac-cont">La série télévisée américaine Pretty Little Liars a été produite par Warner Horizon Télévision et  Alloy Entertainment. Elle a été diffusée sur Netflix en France du 23 janvier 2011 au 30 septembre  2017. Cette série comporte un total de 7 saisons. La série est une adaptation de la série littéraire  Les Menteuses de Sara Shepard.
                Le scénario est principalement centré sur un mystère, le rythme est soutenu et les révélations  aussi nombreuses que les questions nouvelles. Les 4 héroïnes de la série ont des intrigues  différentes, le but de la série est de tisser les intrigues secondaires spécifiques à chaque  personnage avec l'intrigue principale. Dans Pretty Little Liars, il est question de 4 femmes  lycéennes tenaillées par un mystérieux « A », qui semble connaître leurs secrets les plus  inavouables. Un an après la disparition de leur amie Alisson qui est considérée « morte » dans sa  propre maison, le mystérieux « A » leur fait du chantage. Le principal problème de cette série est  que le scénario et les situations sont souvent prévisibles et redondantes. Malheureusement, les  actions sont souvent les mêmes et à la fin de chaque épisode l’intrigue retombe au point de  départ. Le ton est décalé et cette série un mélange entre « Gossip Girl » et « Desperate  Housewives ». Le montage à une lignée précise tout au long des saisons, mais est la même sur  tous les épisodes et fini même par en devenir long et lassant. Cette première impression se  confirme au fur et à mesure que la série progresse à cause des 7 saisons qui alourdissent  davantage cet aspect technique. Le scénario et le format sont beaucoup trop long pour une  intrigue qui est restreinte. La série développe et installe une ambiance lourde, inquiétante sans  pour autant miser sur des grands effets horrifiques ou une progression tonitruante. Malgré que la  production tente d’impliquer les spectateurs dans la série, cet aspect n’est pas réussi. Au  contraire, Pretty Little Liars prend son temps pour faire grimper une tension lourde. Cette  approche lente peut désarçonner et empêcher de totalement s’impliquer dans les enjeux de la  série, d’autant plus que les protagonistes ne provoquent pas tant d’émotions à cause de la  répétition du montage. Quant à la lumière, elle semble instaurer une aura lourde et pesante grâce  à l’utilisation de tons sombres et ternes surtout lorsque le mystérieux « A » apparait à l’écran.  Néanmoins, pas beaucoup de jeux de lumières importants et de contrastes sont instaurés  puisque l’effet de lumière est quasiment la même dans tous les épisodes. C’est ainsi à cause de  ce problème et du montage que les téléspectateurs ne sont pas entrainés dans l’intrigue de la  série.
                Le scénario n’est pas amateur de gaieté et même si la production a essayé de façonner une  intrigue intéressante, elle n’est pas bien exploitée surtout que le format de la série est trop long.  De plus, la lumière est trop homogène ce qui provoque moins d’impact pour les téléspectateurs.
            </p>

        </div>
        @for($i=1; $i < $saison_nb+1; $i++)
            <tr>Saison : {{$i}}</tr>
            <ul>
                @foreach($episode as $episodes)
                    @if($episodes->saison == $i)
                        <li>
                            <tr>
                                {{$episodes->nom}}
                                @if (Auth::user())

                                    <h2 class="avis-redac">liste des épisodes</h2>
                                    <p class="saison-episode-serie">saison 1</p>
                                    <div class="container-episode-serie" >

                                        <a class="episode-serie"  href="#" style="background-image: url(img/test/medium_landscape_380_950349.jpg);">
                                            <h3 class="episode-serie-nb">épisode 1</h3>
                                            <h3 class="episode-serie-titre">The Crocodile's Dilemma</h3>

                                            <p></p>
                                            <p class="episode-film-vu">Vous avez vu cette série</p>
                                        </a>

                                    </div>
                                @endif
                            </tr>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endfor




</body>
<form action={{'create'}} method="POST">
    <div class="form-group">
        <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
        @error('message')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>
</body>
</html>