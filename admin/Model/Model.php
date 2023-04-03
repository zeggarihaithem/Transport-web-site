<?php
    function ConnectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=transportDB", $username, $password);
            return $conn;
        }
        catch(Exception $e){
            //echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
     /******************************************************** */
     function login(){
        $conn=ConnectDB();
        $stmt = $conn->prepare("select * from `admin` where `user_name`=:user and `password`=:password");
        $stmt->bindValue('user', $_POST['user'], PDO::PARAM_STR);
        $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row)) {
            home();
        }else {
            echo "<script>
            alert('Invalid username and password !');
            window.location.href='././index.php';
            </script>";        }
        
    
      }
      /*********************************************************** */
    function getRecrutement(){
        $etat="non_recrute";
        $conn = ConnectDB();
        $sql = "SELECT * FROM transporteur where etat=? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$etat]);
        return $stmt; 
    }
    /******************************************************************** */
    function getMarchandise(){
        $conn = ConnectDB();
        $sql = "SELECT * FROM marchandise";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }
    /************************************************************************** */
    function getTrajet(){
        $conn = ConnectDB();
        $sql = "SELECT * FROM trajet";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }
    /************************************************************************** */
    function getNomClient($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM client where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom'];
    }
    /******************************************************************************* */
    function getPrenomClient($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM client where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['prenom'];
       
        
    }
    /********************************************************************************** */
    function getNomTransporteur($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM transporteur where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['nom'];
    }
    /********************************************************************************** */
    function getPrenomTransporteur($id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM transporteur where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['prenom'];
    }
    /**************************************************************** */
    function recruter($id){
        $etat = "recrute";
        $conn = ConnectDB();
        $sql = "UPDATE transporteur SET etat = ? where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$etat,$id]);
    }
    /***************************************************************** */ 
    function supprTransporteur($id){
        $conn = ConnectDB();
        $sql = "DELETE FROM transporteur where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id]);
    }
    /**************************************** */
    function traiterMarchandise($id){
        $etat="traité";
        $conn = ConnectDB();
        $sql = "UPDATE marchandise SET etat = ? where id=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$etat,$id]);
    }
?>