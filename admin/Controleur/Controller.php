<?php
    require('././Model/Model.php');
    
    function start(){
     require('././View/login_admin.php');
    }
    /*************************************** */
    function home(){  
        $data=getRecrutement();
        require('././View/gestion_recrutement.php');
    }
    /************************************ */
    function afficherMarchandise(){
        $data=getMarchandise();
        require('././View/gestion_marchandise.php');
    }
    /**************************************** */
    function afficherTrajet(){
        $data=getTrajet();
        require('././View/gestion_Trajet.php');
    }
    /***************************************** */
    function logout(){
        header('location:../index');
    }
    /******************************************* */
    function recruterTransporteur($id){
        recruter($id);
        home();
    }
    /******************************************* */
    function supprimerTransporteur($id){
        supprTransporteur($id);
        home();
    }
    /********************************************** */
    function affecterMarchandise($id){
        traiterMarchandise($id);
        afficherMarchandise();
    }
?>