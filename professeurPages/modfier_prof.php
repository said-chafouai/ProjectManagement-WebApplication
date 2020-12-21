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





if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['professeur']->mdp){
        $stmt = $bdd->prepare("update professeur set mdp = ? where cin=? ");
        $stmt->execute([$_POST['nouveau_mdp'],$prof->cin]);
        echo "<script>alert('Le changemement est reussit');</script>";
    }
    else{
        echo "<script>alert('Mot de passe incorrecte');</script>";
    }
    
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Admin</title>

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
                            <a href="">
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
                                          <h2>modfier compte </h2>
                                         <form method="post" action="" id="changer_mdp">
                                                <div class="form-group">
                                                    Ancienne mot de passe
                                                    <input class="form-control" type="password" name="ancienne_mdp">  
                                                </div>


                                                <div class="form-group">
                                                    Nouveau mot de passe
                                                    <input class="form-control" type="password" name="nouveau_mdp"> 
                                                </div>


                                                <div class="form-group">
                                                    Confirmation de mot de passe
                                                    <input class="form-control" type="password" name="conf_nouveau_mdp"> 
                                                </div>


                                                <div class="form-group"></div>
                                                <input class="btn btn-success" type="submit" value="Valider">     


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
    <script src="JS/jquery-1.11.1.js"></script>
    <script src="JS/jquery.validate.js"></script>   
    <script type="text/javascript">

        $( document ).ready( function () {
            $( "#changer_mdp" ).validate( {
                rules: {
                    ancienne_mdp : {
                        required : true
                    },
                    nouveau_mdp : {
                        required : true
                    },
                    conf_nouveau_mdp : {
                        required : true,
                        equalTo : "#changer_mdp input[name='nouveau_mdp']"
                    }
                },
                messages: {
                    conf_nouveau_mdp : {
                        equalTo : "la Confirmation est incorrecte"
                    }
                    
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the help-block class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
        } );

    </script>

</html>
