@extends('layouts.app')

@section('content')
    C'est la page générale du site,
    <br />
    on doit y voir les dernières séries par exemple.
    aeregzer
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
@endsection
