<?php 
require 'menu/Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){ 
    header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php");
}
/* connexion ok */
$etudiant = new ClasseEtudiant();
$etudiant = $_SESSION['etudiant'];
$sujets = array();
$managerSujet = new ManagerSujet(fct_bdd());
$sujets = $managerSujet->fct_findAll();

/* btn valider clicker */
$donneSaisit = true;
foreach($sujets as $sujet){
    if(empty($_POST[$sujet->id_sujet])){
        $donneSaisit = false;
    }
}
if($donneSaisit){ /* tous les classement sont remplits*/ 
    $classements = array();
    $managerClassement = new ManagerClassement(fct_bdd());
    $classements = $managerClassement->fct_findAllByUser($etudiant->cne);
    $taille = sizeof($classements);
    if($taille == 0){ /* la permiere fois qui va classer les sujets (insert) */
        foreach($sujets as $sujet){
            $classement = ClasseClassement::construct3($_POST[$sujet->id_sujet],$sujet->id_sujet,$etudiant->cne);
            $managerClassement->fct_insert($classement);
        }  
    }
    else{ /* il veut changer le classement donc (update) */
        foreach($sujets as $sujet){
            $classement = ClasseClassement::construct3($_POST[$sujet->id_sujet],$sujet->id_sujet,$etudiant->cne);
            $managerClassement->fct_update($classement);
        }  
    }
}
?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Classer les sujets</title>

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

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <i class="pe-7s-next-2"></i> Sujets
                                                </div>
                                                <div class="panel-body">
                                                    <form action="" method="post" id="classement">
                                                        <div class="table-responsive ">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <th>Intitule</th>
                                                                    <th>Description</th>
                                                                    <th>Classement</th>
                                                                </thead>
                                                                <tbody>  
                                                                    <?php 
                                                                    foreach ($sujets as $sujet){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $sujet->intitule_sujet;?></td>
                                                                        <td><?php echo $sujet->description_sujet;?></td>
                                                                        <td><input class="form-control" type="number" min="1" max="<?php echo sizeof($sujets);?>" name="<?php echo $sujet->id_sujet;?>" value="<?php echo $sujet->id_sujet;?>"></td>
                                                                    </tr>

                                                                    <?php 
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                        <input class="btn btn-success pull-right" type="submit" value="Valider">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nonIndexe">
                                                <br>
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-group  fa-fw"></i> panel 1 
                                                    </div>
                                                    <div class="panel-body">

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

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/jquery.validate.js"></script>   
    
</html>
