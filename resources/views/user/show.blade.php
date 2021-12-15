</div>
<div>
    {{-- Name --}}
    <p><strong>Nom d'utilisateur : </strong>{{$user->name}}</p>
</div>
<div>
    {{-- Email  --}}
    <p><strong>E-mail: </strong>{{$user->email}}</p>
</div>
<div>
    {{--Serie vu --}}
    <p><strong> Séries vues</strong>
        <ul>
            {{$vu=$user->seen()}}
        {{$vu->nom}}

        </ul>
</div>

{{--
<div>
    <a href="{{route('series')}}">Retour à la page d'accueil</a>
</div>
--}}