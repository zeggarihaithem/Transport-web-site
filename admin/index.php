<?php
require('controleur/Controller.php');



if (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        login();
    }
    if ($_GET['action'] == 'getRecrutement') {
        home();
    }
    if ($_GET['action'] == 'getListMarchandise') {
        afficherMarchandise();
    }
    if ($_GET['action'] == 'getListTrajet') {
        afficherTrajet();
    }
    if ($_GET['action'] == 'logout') {
        logout();
    }
    if ($_GET['action'] == 'recruterTransporteur') {
        recruterTransporteur($_GET['id']);
    }
    if ($_GET['action'] == 'supprimerTransporteur') {
        supprimerTransporteur($_GET['id']);
    }
    if ($_GET['action'] == 'downloadCV') {
        downloadCV($_GET['lien']);
    }
    if ($_GET['action'] == 'affecterMarchandise') {
        affecterMarchandise($_GET['id']);
    }
}    
else {

    start();
}


