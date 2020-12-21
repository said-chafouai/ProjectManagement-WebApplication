<?php 

require '../PHPMailer/vendor/autoload.php';
include_once '../Classes/ClasseEtudiant.php';
include_once '../Fonction/connection_bdd.php';
include_once '../Classes/MailClasse.php';
require '../ClassesManager/ManagerEtudiant.php';
session_start();
if(isset($_SESSION['etudiant'])){  
    $bdd = fct_bdd();
    $stmt = $bdd->prepare("select * from etudiant where cne_binome IS NULL and cne!=?");
    $stmt->execute([$_SESSION['etudiant']->cne]);
    
    
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Etudiant Choisir binome</title>
</head>
<body>
	<h1>Etudiant : Choisir binome</h1>
	<form action="etudiantChoisirBinome.php" method="post">
		<table border="1">
			<tr>
				<th></th>
				<th>Nom</th>
				<th>Prenom</th>
			</tr>
		
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
		</table>
		<input type="submit" value="Valider">
	</form>


</body>
</html>

<?php 
}

?>

<!-- traitement après le choix de binome  -->
<?php

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
    //MailClasse::fctsendMail($reciver, $cc,$subject, $body);
    
    
}






?>

