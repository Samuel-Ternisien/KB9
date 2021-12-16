<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/errorstyle.css">
    <title>Erreur 404</title>
</head>
<body>


<header>
    <div class="header-back">
    </div>
    <div class="header-back-shadow">
    </div>

    <div class="header-top">
        <a href="{{route("/")}}" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            <a href="{{route('login')}}" class="header-lien" >Connexion</a>
            <a href="{{route('register')}}" class="header-lien" >Inscription</a>
        </div>
    </div>

</header>

<div class="erreur">
    <h1>ERREUR</h1> <img src="img/er.svg" alt="">
</div>



<footer class="footer-accueil">
    <div class="footer-accueil-cont" >
        <p class="footer-accueil-droit">Tous droits réservés à KB9</p>

    </div>

</footer>

</body>
</html>