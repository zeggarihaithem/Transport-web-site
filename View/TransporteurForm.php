<?php 
    session_start();
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
        <link href="../sources/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../sources/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="../sources/Js.js"></script>
        <title>Transport</title>
    </head>
    <script>
        $(document).ready(function(){
            $("#form_march").hide();
            $("#addMarch").click(function(){
                $("#form_march").show();
            });
            $("#buttonAnnuler").click(function(){
                $("#form_march").hide();
            });
        });
    </script>    
    <body class="pr-5 pl-5">
        <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
            <div class="mr-auto mb-auto mt-auto">
                <a href="#"> <img src="../images/Logo.png" alt="Logo" class="logo " /></a>
            </div>
            <div class="d-flex mb-auto mt-auto">
                <a href="https://www.facebook.com/" target="_blank"> <img src="../images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
                <a href="https://www.linkedin.com/" target="_blank"> <img src="../images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
                <a href="https://www.gmail.com/" target="_blank"> <img src="../images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
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
                         <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="inscription.php">Recrutement</a>
                    </li>
                    <li class="nav-item  mr-3">
                         <a class="nav-link" href="Blog.php">Blog </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="a_propos.php">à propos</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php 
                        if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != ""){ // user authentifier
                    ?>
                    <ul class="navbar-nav mr-auto p-1">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="../index?action=logout"> Logout</a>
                        </li >
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="../index?action=consulterTransporteur&id=<?= $_SESSION['sess_user_id'] ?>">Profile(<?= $nom ?>)</a>
                        </li>
                    </ul>
                    <?php } ?>
                </span>
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
                        <img src="../images/transport1.png" alt="traduction1" >
                    </div>
                    <div class="carousel-item">
                        <img src="../images/transport2.png" alt="traduction2" width="1100" height="500">
                    </div>
                <div class="carousel-item">
                        <img src="../images/transport3.png" alt="traduction3" width="1100" height="500">
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
        <center>
            <div class="col-sm-6">
                <button type="button" class="btn myButton btn-block mt-3 " id="addMarch"><span style="color: white;">Ajouter un trajet </span></button>
            </div>
           
        </center>    
        <form action="../index.php?action=validerTrajet&user_id=<?= $user_id ?>" class="shadow" id="form_march" method="POST" enctype="multipart/form-data">
            <div class="container">
                <h1>Annoncer votre trajet</h1>
                <hr>
                <label for="depart"><b>Lieu de départ</b></label>
                <input type="text" placeholder="Votre lieu de départ" name="depart" required>
                <label for="arrivee"><b>Lieu d'arrivée</b></label>
                <input type="text" placeholder="Votre lieu d'arrivée" name="arrivee" required>

                <label for="arret"><b>Lieux d’arrêts</b></label>
                <input type="text" placeholder="Votre lieux d’arrêts entre le départ et l’arrivée" name="arret" required>

                <label for="date_depart"><b>Date de départ</b></label>
                <input type="text" placeholder="12-12-2012" name="date_depart" required>              
                    
                <label for="date_retour"><b>Date de retour (optionnelle)</b></label>
                <input type="text" placeholder="12-12-2012" name="date_retour"> 
                 
                <label for="freq"><b>Fréquence de voyage</b></label>
                <input type="text" placeholder="1" name="freq" required>

                <label for="moyen"><b>Moyen de transport</b></label>
                <input type="text" placeholder="votre moyen de transport" name="moyen" required>
                 
                <label for="poid"><b>Poids marchandises pouvant être transportés(KG)</b></label>
                <input type="text" placeholder="1000" name="poid" required>

                <label for="volume"><b>Volume marchandises pouvant être transportés(m3)</b></label>
                <input type="text" placeholder="1000" name="volume" required>

                <label for="kelo"><b>Combien de kilomètres acceptez-vous de dévier de votre voyage</b></label>
                <input type="text" placeholder="Votre demande" name="kelo" >
                    
                  
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn myButton btn-block mt-3" id="buttonAnnuler" ><span style="color: white;">Annuler</span></button>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn myButton btn-block mt-3 " ><span style="color: white;">Valider</span></button>
                    </div>
                </div>
                
            </div>
            
        </form>
         
       
        
         
        <footer class="mt-2 border-top mb-5">
            <center>
                <div class="row">
                    <div class="col-12 col-md">
                        <ul class="listf p-1 d-flex mt-3">
                            <li class=" active mr-3">
                                <a  href="#index.php"> Accueil</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="inscription.php">Recrutement</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="Blog.php">Blog</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="a_propos">à propos</a>
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