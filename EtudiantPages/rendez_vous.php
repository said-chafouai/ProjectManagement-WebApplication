<?php 
    
    require 'menu/Classes.php';
    session_start();
    if(empty($_SESSION['etudiant'])){
        header("location:../connexion/connexion.php");
    }
    $etudiant = $_SESSION['etudiant'];
    $managerRendezVous = new ManagerRendezVous(fct_bdd());
    $CreneauxChoisit = $managerRendezVous->fct_findAllByUser($etudiant->cne);
    $ManagerCreneauxLibre = new ManagerCreneauxLibre(fct_bdd());
    $creneaux = $ManagerCreneauxLibre->fct_findCreneaux();
    /* debut de traitement de la formule de choix de rendez-vous*/
    if(isset($_POST['ajouter_rv'])){
        if(isset($_POST['creneau'])){/* le choix est fait */
        $managerRendezVous = new ManagerRendezVous(fct_bdd());
        $exist = false;
        foreach($creneaux as $creneau){
            if($creneau->id_creneau == $_POST['creneau']){
                $rendez_vous = $managerRendezVous->fct_semaineContientRendezVous($etudiant->cne, $creneau->semaine);
                if($rendez_vous)
                    $exist = true;
                break;
            }
        }
        if($exist){ /* vous avez deja choisit un rendez vous cette semaine */

            echo "<script>alert('vous avez deja choisit un redez vous cette semaine')</script>";
            
        }
        else{ /* il n'a pas choisit cette semaine */ 
            echo "<script>alert('l'insertion a reussit')</script>";
            $rendezVous = ClasseRendezVous::contruct2("attente", $etudiant->cne, $_POST['creneau']);
            $managerRendezVous->fct_insert($rendezVous);
            header("Refresh:0; url=rendez_vous.php");
            
        }
    }
        
        
    }
    if(isset($_POST['supprimer_rv'])){
        if(isset($_POST['creneau'])){ /* il a choisit un rendez vous a annuler */
        $managerRendezVous->fct_delete($etudiant->cne, $_POST['creneau']);
        echo "<script>alert('la supprission a reussit')</script>";
        header("Refresh:0 url=rendez_vous.php");
    }
    }



?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>ENSIAS Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Table core CSS    -->
        <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--     Fonts and icons     -->
        <link href="css/pe-icon-7-stroke.css" rel="stylesheet" /> <!--fonte obligatoire-->
    </head>
    <body>

        <div class="wrapper">
    <!-- ## start  : inclure le menu -->
        <?php
            $nomPage = basename(__FILE__);
            require 'menu/menu.php'; 
        ?>
    <!-- # End. -->


            <div class="main-panel"> <!-- body --> 
                <!-- ## Start : inchengeable -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="deconnexion.php">
                                        <p>Deconnexion</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg hidden-md"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- # End.        -->


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs  nav-justified">
                                            <li class="active"> <a data-toggle="tab" href="#indexe" >Choisir rendez_vous</a></li>
                                            <li><a data-toggle="tab" href="#nonIndexe">Annuler rendez_vous</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="indexe">
                                                <br>
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <i class="pe-7s-next-2"></i> Disponibilite d'encadrant
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="" method="post">

                                                            <div class="table-responsive "> 
                                                                <table class="table table-hover table-bordered">
                                                                    <thead>
                                                                        <th></th>
                <th>Semaine</th>
                <th>Jour</th>
                <th>Heure</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
foreach ($creneaux as $creneau){
?>
            <tr>
                <td><input type="radio" name="creneau" value="<?php echo $creneau->id_creneau;?>"></td>
                <td><?php echo $creneau->semaine;?></td>
                <td><?php echo $creneau->jour;?></td>
                <td><?php echo $creneau->heure;?></td>
            </tr>

<?php 
}
?>  
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                                    <input class="btn btn-primary" type="submit" name="ajouter_rv" value="Valider">
    </form> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nonIndexe">
                                                <br>
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-group  fa-fw"></i> Rendez_vous choisit 
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="" method="post">

                                                            <div class="table-responsive "> 
                                                                <table class="table table-hover table-bordered">
                                                                    <thead>
                                                                        <th></th>
                <th>Semaine</th>
                <th>Jour</th>
                <th>Heure</th>
                                                                        </thead>
                                                                    <tbody>
                                                                        <?php 
foreach ($CreneauxChoisit as $Creneau){
?>
            <tr>
                <td><input type="radio" name="creneau" value="<?php echo $Creneau->id_creneau;?>"></td>
                <td><?php echo $Creneau->semaine;?></td>
                <td><?php echo $Creneau->jour;?></td>
                <td><?php echo $Creneau->heure;?></td>
            </tr>

<?php 
}
?>  
                                                                        </tbody>
                                                                </table>
                                                                </div>
                                                                    <input class="btn btn-primary" type="submit" name="supprimer_rv" value="Valider">
    </form> 

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                        </nav>
                        <p class="copyright">
                            &copy; 2019 <a href="">ENSIAS-theme</a>, tous droit résèrve
                        </p>
                    </div>
                </footer>


            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
 