<?php 
    if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") { // user authentifier
        $user_id= $_SESSION['sess_user_id'];
        $nom = $_SESSION['sess_user_name'];
        $prenom = $_SESSION['sess_prenom'];
        $email = $_SESSION['sess_email'] ;
        $type=$_SESSION['sess_type'] ;
        $msg=  $_SESSION['sess_errormsg'] ;
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="././sources/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="././sources/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="././sources/Js.js"></script>
        <title>Transport</title>
    </head>
    <body class="pr-5 pl-5">
        <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
            <div class="mr-auto mb-auto mt-auto">
                <a href="#"> <img src="././images/Logo.png" alt="Logo" class="logo " /></a>
            </div>
            <div class="d-flex mb-auto mt-auto">
                <a href="https://www.facebook.com/" target="_blank"> <img src="././images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
                <a href="https://www.linkedin.com/" target="_blank"> <img src="././images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
                <a href="https://www.gmail.com/" target="_blank"> <img src="././images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto p-1">
                    <li class="nav-item active mr-3">
                         <a class="nav-link" href="././index.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  mr-3">
                         <a class="nav-link" href="View/inscription.php">Recrutement </a>
                    </li>
                    <li class="nav-item  mr-3">
                         <a class="nav-link" href="View/Blog.php">Blog </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="View/a_propos.php">à propos</a>
                    </li>
                </ul>
                
            </div>
        </nav>
        <center>
            <div id="demo" class="carousel slide mt-5 mb-5  " data-ride="carousel"  data-interval="3000" >
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="././images/transport1.png" alt="traduction1" >
                    </div>
                    <div class="carousel-item">
                        <img src="././images/transport2.png" alt="traduction2" width="1100" height="500">
                    </div>
                <div class="carousel-item">
                        <img src="././images/transport3.png" alt="traduction3" width="1100" height="500">
                </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </center>
        <hr/>
        <div class="row ">
            <div class="col-sm-6">
                <button type="button" class="btn myButton btn-block mt-3 " id="login"><span style="color: white;">Connexion</span></button>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn myButton btn-block mt-3 " id="Registre"><span style="color: white;">Devenir Un Client</span></button>
            </div>
        </div>
        <center>
            <h5 class="p-3" style="color: red;">
                <?php
                    if (isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                ?>
            </h5>
        </center>
        <form action="?action=login" method="post" id="loginForm" class="mt-4 shadow">
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="uname" required>
            
                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                
                <label for="choix"><b>Vous etes : </b></label>
                <INPUT TYPE="radio" name= "choix" VALUE="client" CHECKED> Client
                <INPUT TYPE="radio" NAME= "choix" VALUE="transporteur ">Transporteur 
            
                <div class="clearfix">
                    <button type="button" class="cancelbtn" id="cancelForm2">Annuler</button>
                    <button type="submit" class="signupbtn">Connecter</button>
                </div>
                
            </div>
        </form>
        <form action="?action=signup"  method="POST" class="mt-4 shadow" id="RegistreForm">
            <div class="container">
                <h1>S'inscrire</h1>
                <p>Veuillez remplir ce formulaire pour créer un compte.</p>
                <hr>
                <label for="nom"><b>Nom </b></label>
                <input type="text" placeholder="Votre Nom" name="nom" required>

                <label for="prenom"><b>Prénom </b></label>
                <input type="text" placeholder="Votre Prenom" name="prenom" required>

                <label for="adresse"><b>Adresse </b></label>
                <input type="text" placeholder="Votre Adresse" name="adresse" required>

                <label for="telephone"><b>Telephone </b></label>
                <input type="text" placeholder="Votre Telephone" name="telephone" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Votre Email" name="email" required>
          
                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Votre Password" name="psw" required>
          
                <p>En créant un compte, vous acceptez nos <a href="#" style="color:dodgerblue">Conditions et confidentialité</a>.</p>
          
                <div class="clearfix">
                    <button type="button" class="cancelbtn" id="cancelForm1">Annuler</button>
                    <button type="submit" class="signupbtn">Terminer</button>
                </div>
            </div>
        </form>
        <footer class="mt-2 border-top mb-5">
            <center>
                <div class="row">
                    <div class="col-12 col-md">
                        <ul class="listf p-1 d-flex mt-3">
                            <li class=" active mr-3">
                                <a  href="././index.php"> Accueil</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="View/inscription.php">Recrutement</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="View/Blog.php">Blog</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="View/a_propos">à propos</a>
                            </li>
                        </ul>
                        <img src="././././assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                        <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
                    </div>
                </div>
          </center>
        </footer>
    </body >
</html>