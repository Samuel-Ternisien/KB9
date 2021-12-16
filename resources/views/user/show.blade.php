<div class="header-top">
    <a href="#" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
    <div class="ins-log">
        @guest
            <a class="header-lien" href="{{ route('login') }}">Login</a>
            <a class="header-lien" href="{{ route('register') }}">Register</a>
        @else
            @if (Auth::user()->id!=$user->id)
                <a href="{{route("profile",['id'=>Auth::user()->id])}}" class="header-g">Profil</a>
            @endif
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>
                {{-- Name --}}
                @if (Auth::user()->id == $user->id)
                    Bonjour {{ Auth::user()->name }}
                    <a href="{{route("profile",['id'=>Auth::user()->id])}}">Profil</a>
                    <p><strong>Nom d'utilisateur : </strong>{{$user->name}}</p>
    </div>
    <div>
        {{-- Email  --}}
        <p><strong>E-mail: </strong>{{$user->email}}</p>
    </div>
    @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </div>
</div>
<div>


    {{--Serie vu--}}
    <div>
    <p><strong> Séries vues</strong>
            <ul>
                @foreach($seen as $vu)
                    <li>
                        <tr>{{$vu->nom}}</tr>
                    </li>
                @endforeach
            </ul>

    </div>
    <div>
        <p><strong>Nombre d'heures vues: {{$count}}</strong></p>
    </div>


{{--
<div>
    <a href="{{('./')}}">Retour à la page d'accueil</a>
</div>
--}}
