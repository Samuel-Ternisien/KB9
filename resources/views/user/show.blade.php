</div>
<div>
    {{-- Name --}}
    <p><strong>Nom d'utilisateur : </strong>{{$user->name}}</p>
</div>
<div>
    {{-- Email  --}}
    <p><strong>E-mail: </strong>{{$user->email}}</p>
</div>

    {{--Serie vu--}}
    <div>
    <p><strong> Séries vues</strong>
            <ul>
                @foreach($user->seen as $vu)
                    <li>
                        <tr>{{$vu->nom}}</tr>
                    </li>
                @endforeach
            </ul>


</div>



<div>
    <a href="{{route('/')}}">Retour à la page d'accueil</a>
</div>
