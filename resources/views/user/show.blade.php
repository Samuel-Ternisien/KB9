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
                @foreach($seen as $vu)
                    <li>
                        <tr>{{$vu}}</tr>
                    </li>
                @endforeach
            </ul>


</div>


{{--
<div>
    <a href="{{('./')}}">Retour à la page d'accueil</a>
</div>
--}}
