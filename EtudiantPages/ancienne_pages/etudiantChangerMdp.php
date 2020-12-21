<?php 
require 'menu/Classes.php';

session_start();

// j'ai stocker l'etudiant connecter dans un objet de type etudiant dans la session.
if(isset($_SESSION['etudiant'])){
    $bdd=fct_bdd();
    
    if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
        // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
        if($_POST['ancienne_mdp'] == $_SESSION['etudiant']->mdp){
            $stmt = $bdd->prepare("update etudiant set mdp_etud = :nouveau_mdp where cne_etud=:cne");
            $stmt->bindParam(":nouveau_mdp", $nouveau_mdp);
            $stmt->bindParam(":cne", $cne);
            
            $nouveau_mdp = $_POST['nouveau_mdp'];
            $cne = $_SESSION['etudiant']->cne;
            $stmt->execute();
            echo "<script>alert('Good');</script>";
        }
        else{
            echo "<script>alert('Mot de passe incorrecte');</script>";  
        }
        
    }
}
else{
    header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/accueil.php?erreur=$erreur");
}





?>


<!DOCTYPE html>
<html>
<head>
	<title>Etudiant Changer le mot de passe</title>
</head>
<body>
	<h1>Etudiant : Changer le mot de passe</h1>
	<form method="post" action="etudiantChangerMdp.php" >
		<table>
			<tr>
				<td>Ancienne mot de passe</td>
				<td><input type="password" name="ancienne_mdp"></td>
			</tr>		
			<tr>
				<td>Nouveau mot de passe</td>
				<td><input type="password" name="nouveau_mdp"></td>
			</tr>		
			<tr>
				<td>Confirmation de mot de passe</td>
				<td><input type="password" name="conf_nouveau_mdp"></td>
			</tr>		
			<tr>
				<td><input type="submit" value="Valider"></td>
			</tr>		
		</table>
	
	
	</form>

</body>
</html>