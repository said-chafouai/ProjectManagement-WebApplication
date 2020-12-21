<?php
require '../Classes/ClasseEtudiant.php';
require '../ClassesManager/ManagerEtudiant.php';
require '../Fonction/connection_bdd.php';

session_start();
if(isset($_SESSION['etudiant'])){
    $etudiant = new ClasseEtudiant();
    $etudiant = $_SESSION['etudiant'];
    echo 'Bonjour '.$etudiant->nom.' '.$etudiant->prenom.'<br>';
    /* voir si il'a deja un binome */
    $managerEtudiant = new ManagerEtudiant(fct_bdd());
    $etudiantRow = $managerEtudiant->fct_findBinome($etudiant->cne);
    if($etudiantRow){
        echo "vous avez deja un binome<br>";
    }/**/
    else{ /* voir est ce qui'il y'a une demande d'avoir binome*/
        $etudiants = $managerEtudiant->fct_findBinomeDemande($etudiant->cne);
        $taille = sizeof($etudiants);
        if($taille > 0){ /* il y'a une demande d'un binome */
            foreach ($etudiants as $etudiantIn){
                echo "<form method='post' action=''>";
                echo "mr <strong>".$etudiantIn['nom']." ".$etudiantIn['prenom']."</strong> vous a choisit comme binome merci de valider ou rejeter la demande
                    <input type='hidden' name='cne' value=".$etudiantIn['cne']." >
                   <input type='submit' name='rejeter' value='rejeter'> <input type='submit' name='valider' value='valider'><br/>";
                echo "</form>";
            }
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
        else{
            echo "y'a pas de binome pour l'instant<br>";
        }
    }
    
    
    
   
}
else{
    echo 'echec';
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Accueil Etudiant</title>
</head>
<body>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantChangerMdp.php">* Changer le mot de passe	</a><br>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantChoisirRendezVous.php">*Choisir le rendez-vous</a><br>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantAnnulerRendezVous.php">*Annuler le rendez-vous</a><br>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantImporterCompteRendu.php">#Importer un compte rendu</a><br>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantClasserSujets.php">*Classer les sujets</a><br>
	<a href="http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/etudiantChoisirBinome.php">*Choisir binome</a><br>
</body>
</html>
