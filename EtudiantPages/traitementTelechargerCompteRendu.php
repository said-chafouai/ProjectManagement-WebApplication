<?php
include_once '../Classes/ClasseEtudiant.php';
include_once '../Classes/ClasseCompteRendu.php';
include_once '../Fonction/connection_bdd.php';
include_once '../ClassesManager/ManagerCompteRendu.php';
include_once '../ClassesManager/ManagerEtudiant.php';

session_start();
if(empty($_SESSION['etudiant'])){
    header("location:../connexion/connexion.php");
}

if(!isset($_POST['submit'])){
    $etudiant = $_SESSION['etudiant'];
    echo "bonjour";
    $targetfolder = "Compte_Rendu/";
    
    $targetfolder = $targetfolder . basename( $_FILES['fileToUpload']['name']) ;
    
    $ok=1;
    
    $file_type=$_FILES['fileToUpload']['type'];
    
    if ($file_type=="application/pdf") {
        
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder)) {
            echo "good";
            $etudiantManager = new ManagerEtudiant(fct_bdd());
            $crManager = new ManagerCompteRendu(fct_bdd());
            $cin = $etudiantManager->fct_findEncadrant($etudiant->cne);
            $date_cr = date("Y-m-d H:i:s");
            $cr = ClasseCompteRendu::construct3($date_cr, $targetfolder, $cin, $etudiant->cne);
            $crManager->fct_insert($cr);
            echo "<script>alert('le fichier est charge avec succes')</script>";
        }
        else {
            echo "Problem uploading file";
        }
    }
    else {
        echo "You should only update pdf files";
    }
}



?>