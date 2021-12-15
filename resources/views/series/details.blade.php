<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de série</title>
</head>
<body>
@if(!empty($series))
    @foreach($series as $serie)
        <a href="#">
            <img src="../{{$serie->urlImage}}" alt="{{$serie->nom}}">
        </a>
    @endforeach
@else
    <h3>Série non trouvé</h3>
@endif
</body>
</html>