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
                <tr>{{$serie->id}}</tr>
                <tr>{{$serie->nom}}</tr>
                <tr>{!!  $serie->resume !!} </tr>
            </li>
        @endforeach
    </ul>
@else
    <h3>Erreur : Aucune série</h3>
@endif
</body>
<footer class="footer-accueil">
    <div class="footer-accueil-cont" >
        <p class="footer-accueil-droit">Tous droits réservés à KB9</p>

        <a href="#"><img src="img/youtube.png" alt="" id="ytb"></a>
    </div>

</footer>
</html>