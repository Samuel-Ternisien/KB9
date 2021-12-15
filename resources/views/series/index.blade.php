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
                <tr>{{$serie->fabricant}}</tr>
                <tr>{{$smartphone->systeme}} </tr>
                <tr>{{$smartphone->connectique}}</tr>
                <tr><a href="{{route(' smartphone.show',$smartphone->id)}}">Information compléte</a></tr>
            </li>
        @endforeach
    </ul>
@else
    <h3>aucun smartphone</h3>
@endif
</body>
</html>