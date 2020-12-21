<?php 
require 'menu/Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/connexion/connexion.php");
}
// j'ai stocker l'etudiant connecter dans un objet de type etudiant dans la session.
$etudiant = $_SESSION['etudiant'];
$bdd=fct_bdd();

if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['etudiant']->mdp){
        $stmt = $bdd->prepare("update etudiant set mdp = ? where cne= ?");
        $stmt->execute([$_POST['nouveau_mdp'],$etudiant->cne]);
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

        <title>Profil</title>

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
                                    <div class="header">
                                        <h3 class="title">Profile</h3>
                                        <p>Changer votre mot de passe </p>
                                    </div>
                                    <div class="content">
                                        <div class="content table-responsive table-full-width">
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
                    // Add the `help-block` class to the error element
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

    </script> <!-- Connexion -->

</html>
