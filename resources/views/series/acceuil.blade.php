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
                    <img src="{{$serie->urlImage}}" alt="{{$serie->nom}}">
                        <button class="btn btn-default btn-rounded btn-condensed btn-sm pull-right" data-toggle="modal" data-target="#addModal"><span class="fa fa-pencil"></span></button>
                    </a>
                </tr>
            </li>
        @endforeach
    </ul>
@else
    <h3>aucune série</h3>
@endif
</body>
</html>