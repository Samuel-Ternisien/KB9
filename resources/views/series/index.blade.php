<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de série</title>
</head>
<body>
<h2>Liste des série disponible</h2>
@if(!empty($series))
    <ul>
        @foreach($series as $serie)
            <li>
                <tr>{{$serie->id}}</tr>
                <tr>{{$serie->nom}}</tr>
                <tr>{!!  $serie->resume !!} </tr>
            </li>
        @endforeach
    </ul>
@else
    <h3>aucune série</h3>
@endif
</body>
</html>