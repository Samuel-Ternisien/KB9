<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de série</title>
</head>
<body>
@if(!empty($series))
    <ul>
        <li>
            <tr>
                <a href="#">
                    <img src="{{$series->urlImage}}" alt="{{$series->nom}}">
                </a>
            </tr>
        </li>
    </ul>
@else
    <h3>aucune série</h3>
@endif
</body>
</html>