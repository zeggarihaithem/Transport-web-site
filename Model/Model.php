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
    function Signup(){
        session_start();
        $conn = ConnectDB();
        $sql = "SELECT * FROM client WHERE e_mail=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['email']]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) {
            echo "<script>
            alert('Ce Email est déja utilisé  !');
            window.location.href='././index.php';
            </script>";
        }else{
            $sql = "INSERT INTO client ( nom , prenom , adresse, telephone , e_mail , password ) VALUES (?,?,?,?,?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $_POST['nom'], $_POST['prenom'],$_POST['adresse'],$_POST['telephone'],$_POST['email'],$_POST['psw']]);
            $_SESSION['sess_user_id']   = $conn->lastInsertId();
            $_SESSION['sess_user_name'] =  $_POST['nom'];
            $_SESSION['sess_prenom'] = $_POST['prenom'];
            $_SESSION['sess_email'] = $_POST['email'];
            $_SESSION['sess_type'] = "client";
            $_SESSION['sess_errormsg']="";
            header('location:View/ClientForm.php');
        }
    }
    /************************************************************ */
    function login(){
        session_start();
        $conn = ConnectDB();
        if($_POST['choix']=="client"){
            $stmt = $conn->prepare("select * from `client` where `e_mail`=:email and `password`=:password");
            $stmt->bindValue('email', $_POST['uname'], PDO::PARAM_STR);
            $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {
                $_SESSION['sess_user_id']   = $row['id'];
                $_SESSION['sess_user_name'] = $row['nom'];
                $_SESSION['sess_prenom'] = $row['prenom'];
                $_SESSION['sess_email'] = $row['e_mail'];
                $_SESSION['sess_type'] = "client";
                $_SESSION['sess_errormsg']="";
                header('location:View/ClientForm.php');
            }else {
                echo "<script>
                alert('Invalid username and password !');
                window.location.href='././index.php';
                </script>";
            }
        }
        if($_POST['choix']=="transporteur "){
            $stmt = $conn->prepare("select * from `transporteur` where `e_mail`=:email and `password`=:password");
            $stmt->bindValue('email', $_POST['uname'], PDO::PARAM_STR);
            $stmt->bindValue('password', $_POST['psw'], PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)) {
                if($row['etat']=="recrute"){
                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_user_name'] = $row['nom'];
                    $_SESSION['sess_prenom'] = $row['prenom'];
                    $_SESSION['sess_email'] = $row['e_mail'];
                    $_SESSION['sess_type'] = "transporteur";
                    $_SESSION['sess_errormsg']="";
                    header('location:View/TransporteurForm.php');
                }else{
                    echo "<script>
                    alert('Vous n\'êtes pas recruté !');
                    window.location.href='././index.php';
                    </script>";
                }
            }else {
                echo "<script>
                alert('Invalid username and password !');
                window.location.href='././index.php';
                </script>";
            }
        }
    }
    /********************************************** */
    function validerMarchandise($user_id){
        $target_dir = "sources/file/";
        $target_file = "null";
        $total = count($_FILES['file']['name']);
        $cond = true;
        for( $i=0 ; $i < $total ; $i++ ) {
            $imageFileType = strtolower(pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $cond = false;
            }
        }
        if($cond == false){
           echo "<script>
            alert('Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.');
            window.location.href='View/ClientForm.php';
            </script>";
        }else{
            $conn = ConnectDB();
            $sql = "INSERT INTO marchandise ( client , description , lieu_depart , lieu_arrive , adresse_depart , adresse_arrive , date_envoi , date_depot ,poid,volume,demande_spec ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([ $user_id, $_POST['description'],$_POST['depart'], $_POST['arrivee'],$_POST['adress_depart'],$_POST['adress_arrivee'],$_POST['date_envoi'],$_POST['date_depart'],$_POST['poid'],$_POST['volume'],$_POST['special']]);
            $id_marchandise = $conn->lastInsertId();
            for($i=0 ; $i < $total ; $i++ ) {
                $target_file = $target_dir . uniqid() . '.'.pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file) ;
                $sql = "INSERT INTO file ( id_marchandise , url) VALUES (?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$id_marchandise,$target_file]);
            }    
            echo "<script>
            alert('Votre marchandise a été ajoutée.');
            window.location.href='View/ClientForm.php';
            </script>";
        }   
        
    } 
    /**********************************************/ 
    function ajouterTransporteur(){
        
            
        $conn = ConnectDB();
        $sql = "SELECT * FROM transporteur WHERE e_mail=?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $_POST['email']]);
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($row)) {
            echo "<script>
            alert('Ce Email est déja utilisé  !');
            window.location.href='View/inscription.php';
            </script>";
        }else{
            $target_dir = "sources/cv/";
            $target_file = "null";
            $imageFileType = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
            if($imageFileType != "pdf") {
                echo "<script>
                alert('Seuls les fichiers PDF sont autorisés.');
                window.location.href='View/inscription.php';
                </script>";
            }else{
                $target_file = $target_dir . uniqid() . '.'.pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
                if(!move_uploaded_file($_FILES['cv']['tmp_name'], $target_file)){
                    echo "<script>
                    alert('Nous n\'avons pas pu traiter votre demande  !');
                    window.location.href='././index.php';
                    </script>";
                }else{
                    $sql = "INSERT INTO transporteur ( nom , prenom , adresse, telephone , e_mail , password ,cv) VALUES (?,?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([ $_POST['nom'], $_POST['prenom'],$_POST['adresse'],$_POST['telephone'],$_POST['email'],$_POST['psw'],$target_file]);
                    echo "<script>
                    alert('Merci d\'avoir créé un compte, vos informations sont en cours d\'étude.  !');
                    window.location.href='././index.php';
                    </script>";
                }
                
                
            }
           
        }
    } 
    /**************************************** */
    function validerTrajet($user_id){
        $conn = ConnectDB();
        $sql = "INSERT INTO trajet ( transporteur , lieu_depart , lieu_arrive	 , lieux_arret , date_depart , date_retour , freq , moyen ,poid,volume,kelo ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([ $user_id, $_POST['depart'],$_POST['arrivee'], $_POST['arret'],$_POST['date_depart'],$_POST['date_retour'],$_POST['freq'],$_POST['moyen'],$_POST['poid'],$_POST['volume'],$_POST['kelo']]);
        echo "<script>
        alert('Votre trajet a été ajouté.');
        window.location.href='View/TransporteurForm.php';
        </script>";
    }
    /***************************************** */
    function getMarchandise($user_id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM marchandise WHERE client =? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt; 
    }
    /********************************************** */
    function getTrajet($user_id){
        $conn = ConnectDB();
        $sql = "SELECT * FROM trajet WHERE transporteur =? ";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt; 
    }
?>