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
                        <img src="./img/{{$serie->urlImage}}" alt="{{$serie->nom}}">
                    </a>
                </tr>
            </li>
        @endforeach
    </ul>
@else
    <h3>Série non trouvé</h3>
@endif
</body>
</html>