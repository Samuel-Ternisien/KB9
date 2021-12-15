<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <a href="{{ url('/') }}">
        Ma super appli
    </a>
</header>
<!-- Authentication Links -->
<nav>
@section('connection')
    @guest
        <a class="header-lien" href="{{ route('login') }}">Login</a>
        <a class="header-lien" href="{{ route('register') }}">Register</a>
    @else
            Bonjour {{ Auth::user()->name }}
        @if (Auth::user())
            <a href="#">Des liens spécifiques pour utilisateurs connectés..</a>
        @endif
        <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endguest
    @endsection
</nav>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
</body>
</html>
