<?php
include_once '../professeurPages/Class_prof.php';
session_start();
if(empty($_SESSION['professeur'])){
    header('location:http://localhost/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php');
}
$prof=$_SESSION['professeur'];

try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=version1','root','',$pdo_options);
}
catch(Exception $e){
    die('Erruer : '.$e->getMessage());
}
$stmt2 = $bdd->prepare("select * from sujet where id_sujet=? ");
$stmt2->execute([$_POST['id_sujet']]);
$row2=$stmt2->fetch();

$stmt = $bdd->prepare("select * from professeur where cin=? ");
$stmt->execute([$prof->cin]);
$row=$stmt->fetch();

if(isset($_POST['cocher'])){
    $stmt1 = $bdd->prepare("update sujet set intitule_sujet = ? , description_sujet=? where id_sujet=? ");
    if($stmt1->execute([$_POST['intitule_sujet'],$_POST['description_sujet'],$_POST['id_sujet']])){
        echo "<script>alert('Le changemement est reussit');</script>";
        header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/professeurPages/modifier_projet.php");
        
        
    }
    
    
  
    
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

       <div class="wrapper">
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
                            <a href="modfier_prof.php">
                                <i class="pe-7s-user"></i>
                                <p>PORFILE</p>
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
                                <p>afficher les projets </p>
                            </a>
                        </li>
                             <li >
                            <a href="ajouter.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>ajouter  projet </p>
                            </a>
                        </li>
                        <li >
                            <a href="modifier_projet.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>modifier projet </p>
                            </a>
                        </li>
                    
                         <li >
                            <a href="page_supprimer.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>supprimer projet </p>
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
                                         <h1>modifier  projet</h1>
                                            <form  method="post" action="">
                                            <div class="form-group">intitule sujet<input class="form-control" type="text" name="intitule_sujet" value="<?php echo $row2['intitule_sujet'];?>"/></div>
                                            <div class="form-group">description sujet <input class="form-control" type="text" name="description_sujet" value="<?php echo $row2['description_sujet'];?>"/> </div>
                                           
                                                  <input type="hidden" name="id_sujet" value="<?php echo $row2['id_sujet'];?>">
                                                <input class="btn btn-success" type="submit" name="cocher" value="OK"/>
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
