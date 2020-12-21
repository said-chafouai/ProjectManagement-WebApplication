<?php 
include_once '../professeurPages/Class_prof.php';
session_start();
if(empty($_SESSION['professeur'])){
    header('location:http://localhost/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php');
}
$prof=$_SESSION['professeur'];
?>
<?php

if (isset ($_POST['valider']))
{

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, "version1");
$id_creneau=$_POST['id_creneau']; 
$semaine=$_POST['semaine'];
$jour=$_POST['jour'];
$heure=$_POST['heure'];
$cin=$_POST['cin'];

$sql = 'INSERT INTO creneauxlibre  VALUES("'.$id_creneau.'","'.$semaine.'","'.$jour.'","'.$heure.'","'.$cin.'")';
if($con->query($sql)==TRUE){
    ?>

    <script>alert('la creation du creneau libre a reussi ')</script>
      <?php
    }
    else {
        ?>

    <script>alert('la creation du creneau libre n'a pas reussi')</script>
      <?php
        
    }
    $con->close();
}



?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>la PAGE ENCADRANT</title>
      

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="CSS/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Table core CSS    -->
        <link href="CSS/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--     Fonts and icons     -->
        <link href="CSS/pe-icon-7-stroke.css" rel="stylesheet" /> <!--fonte obligatoire-->
    </head>
    <body>
 <class="wrapper">
            <!--    alia_gauche-->
            <div class="sidebar" data-color="blue" data-image="img/sidebar-5.jpg">
                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="page_prof.php" class="simple-text">
                            <?php echo $prof->nom.' '.$prof->prenom;?>
                        </a>
                    </div>

                    <ul class="nav">
                     <li>
                            <a href="page_prof.php">
                                <i class="pe-7s-graph"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li>
                            <a href="afficher.php">
                                <i class="pe-7s-graph"></i>
                                <p>LES BINOMES</p>
                            </a>
                        </li>
                        <li>
                            <a href="date_disponibilite.php">
                                <i class="pe-7s-user"></i>
                                <p>les RENDEZ_VOUS</p>
                            </a>
                        </li>
                          <li >
                            <a href="affichier_PFA.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>les projets </p>
                            </a>
                        </li>
                     
                        <li >
                            <a href="nom_PFA.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>importer les projets </p>
                            </a>
                        </li>
                    
                 
                      
                    </ul>
                </div>
            </div>


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

         

               <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                        </nav>
                        <p class="copyright">
                            &copy; 2019 <a href="">ENSIAS-theme</a>
                        </p>
                    </div>
                </footer>

            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="JS/jquery.3.2.1.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="JS/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
