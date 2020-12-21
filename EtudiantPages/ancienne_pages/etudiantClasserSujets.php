<?php 

include_once '../ClassesManager/ManagerClassement.php';
include_once '../ClassesManager/ManagerSujet.php';

include_once '../Classes/ClasseEtudiant.php';
include_once '../Classes/ClasseSujet.php';
include_once '../Classes/ClasseClassement.php';

include_once '../Fonction/connection_bdd.php';

session_start();
if($_SESSION['etudiant']){/* connexion ok */
    $etudiant = new ClasseEtudiant();
    $etudiant = $_SESSION['etudiant'];
    $sujets = array();
    $managerSujet = new ManagerSujet(fct_bdd());
    $sujets = $managerSujet->fct_findAll();

    /* btn valider clicker */
    $donneSaisit = true;
    foreach($sujets as $sujet){
        if(empty($_POST[$sujet->id_sujet])){
            $donneSaisit = false;
        }
    }
    if($donneSaisit){ /* tous les classement sont remplits*/ 
        $classements = array();
        $managerClassement = new ManagerClassement(fct_bdd());
        $classements = $managerClassement->fct_findAllByUser($etudiant->cne);
        $taille = sizeof($classements);
        if($taille == 0){ /* la permiere fois qui va classer les sujets (insert) */
            foreach($sujets as $sujet){
                $classement = ClasseClassement::construct3($_POST[$sujet->id_sujet],$sujet->id_sujet,$etudiant->cne);
                $managerClassement->fct_insert($classement);
            }  
        }
        else{ /* il veut changer le classement donc (update) */
            foreach($sujets as $sujet){
                $classement = ClasseClassement::construct3($_POST[$sujet->id_sujet],$sujet->id_sujet,$etudiant->cne);
                $managerClassement->fct_update($classement);
            }  
        }
    }
    else{ /* des inputs sont vides */
        echo "vous avez oublier une";
    }

}
else { /* connexion refuse */
    header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/accueil.php?erreur=$erreur");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Page : pour classer les sujets </h1>
	
	<h3>bonjour <?php echo $etudiant->nom." ".$etudiant->prenom; ?></h3>
	
	<form action="" method="post">
		<table border="1">
			<tr>
				<th>Intitule de sujet</th>
				<th>Desctiption de sujet</th>
				<th>Classemnt</th>
			</tr>
		
<?php 
foreach ($sujets as $sujet){
?>
			<tr>
				<td><?php echo $sujet->intitule_sujet;?></td>
				<td><?php echo $sujet->description_sujet;?></td>
				<td><input type="number" min="1" max="<?php echo sizeof($sujets);?>" name="<?php echo $sujet->id_sujet;?>" value="<?php echo $sujet->id_sujet;?>"></td>
			</tr>

<?php 
}
?>	
		</table>
		<input type="submit" value="Valider">
	</form>
	
	
	

</body>
</html>