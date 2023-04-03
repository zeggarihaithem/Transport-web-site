<?php
require('controleur/Controller.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup'){
        Signup();
    }
    if ($_GET['action'] == 'login') {
        login();
    }
    if ($_GET['action'] == 'logout'){
        Logout();
    }
    if ($_GET['action'] == 'validerMarchandise'){
        validerMarchandise($_GET['user_id']);
    }
    if ($_GET['action'] == 'ajouterTransporteur'){
        ajouterTransporteur();
    }
    if ($_GET['action'] == 'validerTrajet'){
        validerTrajet($_GET['user_id']);
    }
    if ($_GET['action'] == 'consulterClient'){
        consulterClient($_GET['id']);
    }
    if ($_GET['action'] == 'retourClient'){
        retourClient();
    }
    if ($_GET['action'] == 'consulterTransporteur'){
       consulterTransporteur($_GET['id']);
    }
    if ($_GET['action'] == 'retourTransporteur'){
        retourTransporteur();
    }
}
else {

    home();
}
?>
