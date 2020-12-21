<?php
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header('location:http://localhost/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php');
}
$admin=$_SESSION['admin'];
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>la PAGE DIRECTEUR</title>
      

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

       <div class="wrapper">
            <!--    alia_gauche-->
            <div class="sidebar" data-color="green" data-image="img/sidebar-5.jpg">
                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="admin.php" class="simple-text">
                            <?php echo $admin->nom.' '.$admin->prenom;?>
                        </a>
                    </div>

                   <ul class="nav">
                    <li>
                            <a href="admin.php">
                                <i class="pe-7s-graph"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                         <li>
                            <a href="modifier_amdin.php">
                                <i class="pe-7s-note2"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="ajouter_compte.php">
                                <i class="pe-7s-graph"></i>
                                <p>AJOUTER  UN COMPTE</p>
                            </a>
                        </li>
                        <li>
                            <a href="page_supprimer_compte.php">
                                <i class="pe-7s-user"></i>
                                <p>SUPPRIMER UN COMPTE</p>
                            </a>
                        </li>
                        <li>
                            <a href="page_modifier.php">
                                <i class="pe-7s-user"></i>
                                <p>MODIFIER UN COMPTE</p>
                            </a>
                        </li>
                       
                        <li >
                            <a href="test.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>LANCER TIRAGE</p>
                            </a>
                        </li>
                         <li >
                            <a href="statistiques.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>LES STATISTIQUES</p>
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


                           <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                       

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                       <div id="login">
                                         <h1>Suppression d'un compte </h1>
                                            <form  method="post" action="">
                                          
                                                <input  class=" btn btn-danger" type="submit"  value=" etudiant"/>
                                            </form>
                                            <form  method="post" action="">
                                          
                                                <input class=" btn btn-danger" type="submit"  value=" encadrant"/>
                                            </form>
                 
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
