<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de série</title>
</head>
<body>
@if(!empty($series))
    <ul>
    @foreach($series as $serie)
        <li>
            <tr>
                <a href="#">
                    <img src="../{{$serie->urlImage}}" alt="{{$serie->nom}}">
                </a>
            </tr>
            <tr>Nom : {{$serie->nom}}</tr>
            <tr>Genre : {{$serie->genre}}</tr>
            <tr>VO :{{$serie->langue}}</tr>
            <tr>Date de sortie :{{$serie->premiere}}</tr>
            <tr>Note : {{$serie->note}}</tr>
            <tr>{!!  $serie->resume !!} </tr>
            <tr>Nombre d'épisodes : {{$episode_nb}}</tr>
            <tr>Nombre de saison : {{$saison_nb}}</tr>
            <ul>
            @foreach($episode as $episodes)
                <li>
                    <tr>
                        Episode {{$episodes->nom}}
                    </tr>
                </li>
            </ul>
            @endforeach
        </li>
    @endforeach
    </ul>
@else
    <h3>Série non trouvé</h3>
@endif
</body>
</html>