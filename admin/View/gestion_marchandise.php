<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="././sources/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="././sources/Js.js"></script>
        <title>Transport</title>
    </head>
    
    <body class="pr-5 pl-5 ">
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
                    <li class="nav-item  mr-3">
                        <a class="nav-link" href="?action=getRecrutement">Gestion des recrutements<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#">Gestion des marchandises <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="?action=getListTrajet">Gestion des trajets</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto p-1">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="?action=logout"> Logout</a>
                        </li >
                    </ul>
                </span>
            </div>
        </nav>
        <br><br><br>
    
        
        <div class="col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>    
                        <td>Nom du client</td>
                        <td>Prénom du client</td>
                        <td>Description de marchandises</td>
                        <td>Lieu de départ</td>
                        <td>Lieu d'arrivée</td>
                        <td>Adresse de départ</td>
                        <td>Adresse d'arrivée</td>
                        <td>Date d'envoi</td>
                        <td>Date de dépot</td>
                        <td>Poids</td>
                        <td>Volume</td>
                        <td>demande spéciale</td>
                        <td>Etat</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php while ($r = $data->fetch()): 
                        $nom= getNomClient($r['client']);
                        $prenom = getPrenomClient($r['client']);
                        ?>
                        <script>
        $(document).ready(function(){
            $("#form<?= $r['id'] ?>").hide();
            $("#button<?= $r['id'] ?>").click(function(){
                $("#form<?= $r['id'] ?>").show()
                $("#button<?= $r['id'] ?>").hide();
            });
        });
    </script>
                        <tr>
                            <td><?php echo htmlspecialchars($nom) ?></td>
                            <td><?php echo htmlspecialchars($prenom) ?></td>
                            <td><?php echo htmlspecialchars($r['description']) ?></td>
                            <td><?php echo htmlspecialchars($r['lieu_depart']) ?></td>
                            <td><?php echo htmlspecialchars($r['lieu_arrive']) ?></td>
                            <td><?php echo htmlspecialchars($r['adresse_depart']) ?></td>
                            <td><?php echo htmlspecialchars($r['adresse_arrive']) ?></td>
                            <td><?php echo htmlspecialchars($r['date_envoi']) ?></td>
                            <td><?php echo htmlspecialchars($r['date_depot']) ?></td>
                            <td><?php echo htmlspecialchars($r['poid'])?></td>
                            <td><?php echo htmlspecialchars($r['volume'])?></td>
                            <td><?php echo htmlspecialchars($r['demande_spec'])?></td>
                            <td><?php echo htmlspecialchars($r['etat'])?></td>
                            <td >
                                <form id="form<?=$r['id']?>"action="?action=affecterMarchandise&id=<?=$r['id'] ?>"  method="POST" class="mt-4 shadow" >
                                    <input type="text" placeholder="ID du trajer" name="id_trajet" required>
                                    <input type="text" placeholder="tarif" name="prix" required>
                                    <button type="submit">Affecter</button>
                                </form>
                            </td>
                            <?php if($r['etat']=='non_traite'):?> 
                            <td><button id="button<?=$r['id']?>">Affecter</button></td>
                            <?php endif;?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>    
        </div> 
        <footer class="mt-2 border-top mb-5">
            <center>
                <div class="row">
                    <div class="col-12 col-md">
                        <ul class="listf p-1 d-flex mt-3">
                            <li class=" mr-3">
                                <a  href="?action=getRecrutement">Gestion des recrutements</a>
                            </li>
                            <li class=" active mr-3">
                                <a   href="#">Gestion des marchandises</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="?action=getListTrajet">Gestion des trajets</a>
                            </li>
                        </ul>
                        <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
                    </div>
                </div>    
            </center>
        </footer>
    </body>
</html>

