<?php 
require '../Fonction/connection_bdd.php';
require '../Classes/ClasseEtudiant.php';
require '../ClassesManager/ManagerCreneauxLibre.php';
require '../Classes/ClasseCreneauxLibre.php';
require '../ClassesManager/ManagerRendezVous.php';
require '../Classes/ClasseRendezVous.php';

session_start();
if(isset($_SESSION['etudiant'])){
    $etudiant = $_SESSION['etudiant'];
    $ManagerCreneauxLibre = new ManagerCreneauxLibre(fct_bdd());
    $creneaux = $ManagerCreneauxLibre->fct_findCreneaux();
    /* debut de traitement de la formule de choix de rendez-vous*/
    if(isset($_POST['creneau'])){/* le choix est fait */
        $managerRendezVous = new ManagerRendezVous(fct_bdd());
        $exist = false;
        foreach($creneaux as $creneau){
            if($creneau->id_creneau == $_POST['creneau']){
                $rendez_vous = $managerRendezVous->fct_semaineContientRendezVous($etudiant->cne, $creneau->semaine);
                if($rendez_vous)
                    $exist = true;
                break;
            }
        }
        if($exist){ /* vous avez deja choisit un redez vous cette semaine */
            echo "vous avez deja choisit un redez vous cette semaine";
        }
        else{ /* il n'a pas choisit cette semaine */ 
            echo "l'insertion a reussit";
            $rendezVous = ClasseRendezVous::contruct2("attente", $etudiant->cne, $_POST['creneau']);
            $managerRendezVous->fct_insert($rendezVous);
            header("Refresh:0");
            
        }
        
        
        
        
    }
    /**/
}
else{
    header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/accueil.php?erreur=$erreur");
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Page : pour choisir la date de rendez vous </h1>
	<form action="" method="post">
		<table>
			<tr>
				<th></th>
				<th>Semaine</th>
				<th>Jour</th>
				<th>Heure</th>
			</tr>	
<?php 
foreach ($creneaux as $creneau){
?>
			<tr>
				<td><input type="radio" name="creneau" value="<?php echo $creneau->id_creneau;?>"></td>
				<td><?php echo $creneau->semaine;?></td>
				<td><?php echo $creneau->jour;?></td>
				<td><?php echo $creneau->heure;?></td>
			</tr>

<?php 
}
?>	
		</table>
		<input type="submit" value="Valider">
	</form>

	
	
	

</body>
</html>