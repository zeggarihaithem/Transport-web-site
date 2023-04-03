<?php
    require('././Model/Model.php');
    
    function home()
    {    
        session_start();
        require('././View/View.php');

    }
    /************************************ */
    function logout(){
        session_start();
        $_SESSION['sess_user_id']   = "";
        $_SESSION['sess_user_name'] = "";
        $_SESSION['sess_prenom'] ="";
        $_SESSION['sess_email'] = "";
        if(empty($_SESSION['sess_user_id'])) header("location: ././index.php");
        
    }
    /****************************************** */
    function consulterClient($user_id){
        $data = getMarchandise($user_id);
        require('././View/showMarchandise.php');
    }
    /******************************************* */
    function retourClient(){
        header('location:View/ClientForm.php');
    }
    /************************************************* */
     
    function consulterTransporteur($user_id){
        $data = getTrajet($user_id);
        require('././View/showTrajet.php');
    }
    /******************************************* */
    function retourTransporteur(){
        header('location:View/TransporteurForm.php');
    }
?>    