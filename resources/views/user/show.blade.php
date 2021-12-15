</div>
<div>
    {{-- Name --}}
    <p><strong>Nom d'utilisateur : </strong>{{$user->name}}</p>
</div>
<div>
    {{-- Email  --}}
    <p><strong>E-mail: </strong>{{$user->email}}</p>
</div>
{{$user->nbSeries()}}
<div>
    {{--Serie vu
    <p><strong> Séries vues</strong>
    @if(!empty($vu))
        <ul>
            @foreach($vu as $v)
                <li>
                    <tr>{{$v->id}}</tr>
                    <tr>{{$v->nom}}</tr>
                    <tr>{!!  $v->resume !!} </tr>
                </li>
            @endforeach
        </ul>
    @else
        <h3>aucune série</h3>
        @endif</p>
</div>
--}}

{{--
<div>
    <a href="{{route('series')}}">Retour à la page d'accueil</a>
</div>
--}}