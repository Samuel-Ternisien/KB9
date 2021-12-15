<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('./ressources/css/welcome.css') }}" rel="stylesheet" type="text/css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>KB9</title>



    <style>
        #img{
            background-size: cover;
            background-position: center;
        }

        @media screen and (min-width: 800px) {

            body{
                margin: 0 auto;
                background-color: #263F73;
                font-family: 'Poppins', sans-serif;
            }





            .header-back{
                position: absolute;
                width: 100%;
                height: 100vh;
                background-image: url(../img/loki.jpg);
                background-position: center;
                background-size: cover;
                filter: brightness(60%);
                filter: grayscale(20%);
                filter: opacity(80%) ;
                z-index: -1;

            }



            .header-back-shadow{
                position: absolute;
                width: 100%;
                height: 100vh;
                box-shadow: inset 0 100px 100px -30px #000000;
                z-index: -1;

            }

            #logo{
                width: 150px;
                margin-top: 20px;

            }

            #lien-logo{
                margin-left: 43% ;

            }


            .ins-log{
                position: absolute;
                right: 0;
                top: 30px;
                text-decoration: none;
                width: 20%;
                text-align: center;

            }

            .header-lien{
                font-size: 20px;
                margin-right: 5%;
                text-decoration: none;
                color: white;

            }

            .header-lien:hover{
                text-decoration: underline 5px #F25D27;

            }


            #sorties{
                text-transform: uppercase;
                padding-top: 30px;
                padding-bottom: 20px;

                background-color: #F23005;
                color: white;
                margin-top: 87.4vh;
                text-align: center;
                border-bottom: solid 20px #F25D27;
            }




            .container-card {
                position: absolute;
                height: 50vh;
                width: 90%;
                top: 120vh;
                display: flex;
                margin-left: 5%;
            }


            .card {
                display: flex;
                height: 70vh;
                width: 70%;
                background-color: #17141d;
                border-radius: 10px;
                /*   margin-left: -50px; */

                transition: 0.4s ease-out;
                position: relative;
                left: 0px;
                box-shadow: inset 0 100px 100px -30px #000000;


            }


            .card:not(:first-child) {
                margin-left: -50px;
            }

            .card:hover {
                transform: translateY(-20px);
                transition: 0.4s ease-out;
            }

            .card:hover ~ .card {
                position: relative;
                left: 50px;
                transition: 0.4s ease-out;
            }

            .titre-film{
                color: white;
                font-weight: 300;
                position: absolute;
                left: 20px;
                top: 15px;
            }


            .footer-accueil{
                padding-top: 30px;
                padding-bottom: 20px;

                background-color: #1c2e55;
                color: white;
                margin-top: 87.4vh;

            }


            .footer-accueil-droit{
                margin-left: 20px;
            }

            .footer-accueil-cont{
                top: 120vh;
                display: flex;
                margin-left: 10%;
            }


            .rs{
                margin-left: 50%;
            }

            #ytb{
                position: absolute;
                width: 70px;
                right: 10%;

            }

        }



        @media screen and (max-width: 800px) {

            body{
                margin: 0 auto;
                background-color: #263F73;
                font-family: 'Poppins', sans-serif;
            }



            .header-back{
                position: absolute;
                width: 100%;
                height: 100vh;
                background-image: url(../img/loki.jpg);
                background-position: center;
                background-size: cover;
                filter: brightness(60%);
                filter: grayscale(20%);
                filter: opacity(80%) ;
                z-index: -1;

            }



            .header-back-shadow{
                position: absolute;
                width: 100%;
                height: 100vh;
                box-shadow: inset 0 100px 100px -30px #000000;
                z-index: -1;

            }

            #logo{
                width: 150px;
                margin-top: 20px;

            }

            #lien-logo{
                margin-left: 2% ;

            }


            .ins-log{
                position: absolute;
                right: 0;
                top: 35px;
                text-decoration: none;
                width: 20%;
                text-align: center;
                margin-right: 20px

            }

            .header-lien{
                margin-right: 5%;
                text-decoration: none;
                color: white;
            }


            #sorties{
                text-transform: uppercase;
                padding-top: 30px;
                padding-bottom: 20px;

                background-color: #F23005;
                color: white;
                margin-top: 87.4vh;
                text-align: center;
                border-bottom: solid 20px #F25D27;
            }









            .container-card {
                position: absolute;
                height: 50vh;
                width: 80%;
                top: 120vh;
                display: flex;
                margin-left: 10%;
            }


            .card {
                display: flex;
                height: 50vh;
                width: 70%;
                background-color: #17141d;
                border-radius: 10px;
                /*   margin-left: -50px; */
                transition: 0.4s ease-out;
                position: relative;
                left: 0px;
                background-size: cover;
                background-position: center;
                box-shadow: inset 0 100px 100px -30px #000000;


            }


            .card:not(:first-child) {
                margin-left: -50px;
            }

            .card:hover {
                transform: translateY(-20px);
                transition: 0.4s ease-out;
            }

            .card:hover ~ .card {
                position: relative;
                left: 50px;
                transition: 0.4s ease-out;
            }

            .titre-film {
                color: white;
                font-weight: 300;
                position: absolute;
                left: 20px;
                top: 15px;
                font-size: 0.7rem;
            }




            .footer-accueil{
                padding-top: 30px;
                padding-bottom: 20px;

                background-color: #1c2e55;
                color: white;
                margin-top: 87.4vh;

            }


            .footer-accueil-droit{
                margin-left: 20px;
            }

            .footer-accueil-cont{
                top: 120vh;
                display: flex;
                margin-left: 10%;
            }


            .rs{
                margin-left: 50%;
            }

            #ytb{
                position: absolute;
                width: 70px;
                right: 10%;

            }

        }

    </style>
</head>
<body>
<header>
    <div class="header-back">
    </div>
    <div class="header-back-shadow">
    </div>

    <div class="header-top">
        <a href="#" id="lien-logo"><img src="img/KB9.svg" alt="" id="logo"></a>
        <div class="ins-log">
            <a href="#" class="header-lien" >Connexion</a>
            <a href="#" class="header-lien" >Inscription</a>
        </div>
    </div>

</header>


<h2 id="sorties">dernières sorties</h2>
<div class="container-card">
@if(!empty($series))
    @foreach($series as $serie)
        <img alt="serie" src="{{$serie->urlImage}}">
        <a class="card" id="img" href="#">
            <h3 class="titre-film">{{$serie->nom}}</h3>
        </a>
    @endforeach
@else
    <h3>aucun smartphone</h3>
@endif

</div>


<footer class="footer-accueil">
    <div class="footer-accueil-cont" >
        <p class="footer-accueil-droit">Tout droits réservé à KB9</p>

        <a href="#"><img src="img/youtube.png" alt="" id="ytb"></a>
    </div>

</footer>

</body>
</html>