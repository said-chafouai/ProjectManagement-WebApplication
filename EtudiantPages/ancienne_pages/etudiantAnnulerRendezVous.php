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
    $managerRendezVous = new ManagerRendezVous(fct_bdd());
    $CreneauxChoisit = $managerRendezVous->fct_findAllByUser($etudiant->cne);
    if(isset($_POST['creneau'])){ /* il a choisit un rendez vous a annuler */
        $managerRendezVous->fct_delete($etudiant->cne, $_POST['creneau']);
        header("Refresh:0");
    }
    
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
	<h1>Page : pour Annuler le rendez vous </h1>
	<form action="" method="post">
		<table>
			<tr>
				<th></th>
				<th>Semaine</th>
				<th>Jour</th>
				<th>Heure</th>
			</tr>	
<?php 
foreach ($CreneauxChoisit as $Creneau){
?>
			<tr>
				<td><input type="radio" name="creneau" value="<?php echo $Creneau->id_creneau;?>"></td>
				<td><?php echo $Creneau->semaine;?></td>
				<td><?php echo $Creneau->jour;?></td>
				<td><?php echo $Creneau->heure;?></td>
			</tr>

<?php 
}
?>	
		</table>
		<input type="submit" value="Valider">
	</form>
	
	

</body>
</html>