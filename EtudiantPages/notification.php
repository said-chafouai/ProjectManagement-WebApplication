<?php
require 'menu/Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:../connexion/connexion.php");
}
    $etudiants = array() ;
    $etudiant = new ClasseEtudiant();
    $etudiant = $_SESSION['etudiant'];
    /* voir si il'a deja un binome */
    $managerEtudiant = new ManagerEtudiant(fct_bdd());
    $etudiantRow = $managerEtudiant->fct_findBinome($etudiant->cne);
    if($etudiantRow){ /* il a deja un binome */
        
    }/**/
    else{ /* voir est ce qui'il y'a une demande d'avoir binome*/
        $etudiants = $managerEtudiant->fct_findBinomeDemande($etudiant->cne);
            /* on teste si il 'a appuyer sur valider ou rejeter */
            /* section pour rejeter */
            if(isset($_POST['rejeter'])){
                echo "vous avez choisit rejeter".$_POST['cne']."<br>";
                $managerEtudiant->fct_rejeterBinome($_POST['cne']);
                header('location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/accueilEtudiant.php');
                
                
            }elseif (isset($_POST['valider'])){
                $managerEtudiant->fct_addBinome($etudiant->cne, $_POST['cne']);
            }
        }
    
    
    
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Notification</title>

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
                                Deconnexion
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
                                                        <i class="pe-7s-next-2"></i> demandes
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="" method="post">
                                                            <div class="table-responsive ">
                                                                <table class="table table-hover table-bordered">
                                                                    <thead>
                                                                        <th>Nom</th>
                                                                        <th>PRENOM</th>
                                                                        <th>Valider/Rejeter</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            if(sizeof($etudiants) > 0){ /* il y'a une demande d'un binome */
                                                                                foreach ($etudiants as $etudiantIn){
                                                                                    echo "<tr>";
                                                                                        echo "<form method='post' action=''>";
                                                                                            echo "<td>".$etudiantIn['nom']."</td>";
                                                                                            echo "<td>".$etudiantIn['prenom']."</td>";
                                                                                            echo "<input type='hidden' name='cne' value=".$etudiantIn['cne']." >";
                                                                                            echo "<td><input class='btn btn-danger' type='submit' name='rejeter' value='Rejeter'> <input class='btn btn-success' type='submit' name='valider' value='valider'></td>";
                                                                                        echo "</form>";
                                                                                    echo "</tr>";
                                                                                }
                                                                            }
                                                                        ?>  
                                                                    </tbody>
                                                                </table>
                                                            </div>  
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

</html>