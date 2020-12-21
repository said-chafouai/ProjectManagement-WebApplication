<?php 
include_once '../adminpages/Class_admin.php';
session_start();
if(empty($_SESSION['admin'])){
    header('location:http://localhost/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php');
}
$admin=$_SESSION['admin'];

     
    try{
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=version1','root','',$pdo_options);
    }
    catch(Exception $e){
        die('Erruer : '.$e->getMessage());
    }
   

    
    

if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['admin']->mdp){
        $stmt = $bdd->prepare("update admin set mdp = ? ");
        $stmt->execute([$_POST['nouveau_mdp']]);
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
                            <a href="typography.html">
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
