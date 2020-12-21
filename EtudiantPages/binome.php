<?php 

include_once '../Classes/MailClasse.php';
require '../PHPMailer/vendor/autoload.php';
require 'menu/Classes.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:../connexion/connexion.php");
}
else{ 
    $etudiant = $_SESSION['etudiant'];    
    $bdd = fct_bdd();
    $stmt = $bdd->prepare("select * from etudiant where cne_binome IS NULL and mdp IS NOT NULL and cne!=?");
    $stmt->execute([$_SESSION['etudiant']->cne]);

    if(isset($_POST['binome'])){
        $cne_binome_choisit = $_POST['binome'];
        $managerEtudiant = new ManagerEtudiant(fct_bdd());
        $binome = $managerEtudiant->fct_findOne($cne_binome_choisit);
        $reciver = $binome['email'];
        $cc='';
        $subject = 'Binome';
        $body = '<strong>Ce message est automatique, merci de ne pas rèpondre</strong><br>'.
            'Mr(s) '.$_SESSION['etudiant']->nom.' '.$_SESSION['etudiant']->prenom.' vous a choisit comme <strong>binome</strong><br>'.
            '<br>'.
            'Merci de se connecter a votre espace dans la plateforme pour valider ou rejeter la demande<br>'.
            '<br><br>'.
            'Bien cordialement<br>'.
            'l\'administration de l\'ENSIAS';
        $managerEtudiant->fct_addBinome($_SESSION['etudiant']->cne, $binome['cne']);
        header("location:notification.php");
        MailClasse::fctsendMail($reciver, $cc,$subject, $body);


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
                                                        <i class="pe-7s-next-2"></i> Etudiants
                                                    </div>
                                                    <div class="panel-body">
                                                        <form action="" method="post">
                                                            <div class="table-responsive ">
                                                                <table class="table table-hover table-bordered">
                                                                    <thead>
                                                                        <th>Cocher</th>
                                                                        <th>Nom</th>
                                                                        <th>Prenom</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
    if($stmt->rowCount()>0){   
        foreach ($stmt as $row){
                                                                        ?>
                                                                        <tr>
                                                                            <td><input type="radio" name="binome" value="<?php echo $row['cne'];?>"></td>
                                                                            <td><?php echo $row['nom']?></td>
                                                                            <td><?php echo $row['prenom']?></td>
                                                                        </tr>

                                                                        <?php 
        }
    }
                                                                        ?>	
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <button type="submit" class="btn btn-success pull-right">Valider</button>
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

<?php
}
?>