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
            <br>
            @for($i=1; $i < $saison_nb+1; $i++)
                <tr>Saison : {{$i}}</tr>
                <ul>
                    @foreach($episode as $episodes)
                        @if($episodes->saison == $i)
                            <li>
                                <tr>
                                    {{$episodes->nom}}
                                    @if (Auth::user())

                                        <a href="{{ url('/seen/' . $episodes->id . '/' . Auth::user()->id) }}" class="btn btn-xs btn-info pull-right">Deja vu</a>
                                    @endif
                                </tr>
                            </li>
                        @endif
                    @endforeach
                </ul>

            @endfor

        </li>
    @endforeach
    </ul>
@else
    <h3>Série non trouvé</h3>
@endif
</body>
</html>