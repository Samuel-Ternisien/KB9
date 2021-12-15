@extends('layouts.app')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
</head>
<body>
<h2>KB9</h2>
@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
@endsection
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