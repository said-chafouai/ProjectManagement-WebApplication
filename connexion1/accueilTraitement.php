<?php
    include_once '../Classes/ClasseEtudiant.php';
	$bdd = null;
	$bdd = new PDO('mysql:host=localhost;dbname=version1','root','');
	if($bdd){
	    // cette varaiable va contenir (admin,professeur,etudiant) selon la presonne qui veut se connecter
		$personne;
		// connecter un boolean (true : connexion reusssit, false : connexion a echoue).
		$connecter=false;
		$etudiant;
		$admin;
		$professeur;
		if(isset($_POST['login']) and isset($_POST['mdp'])){
		    // recuperer les donnees de l'admin pour savoir est ce que c'est lui qui veut se connecter
			$result = $bdd->query('SELECT * from admin');
			foreach($result as $row) {
				if($row['email']==$_POST['login'] and $row['mdp']==$_POST['mdp']){
					$connecter=true;
					$personne='admin';
					break;
				}

			}
			if(!$connecter){
				$result = $bdd->query('SELECT * from etudiant');
				foreach($result as $row) {
					if($row['cne']==$_POST['login'] and $row['mdp']==$_POST['mdp']){
					    $etudiant = ClasseEtudiant::construct2($row['cne'], $row['nom'], $row['prenom'], $row['email'], $row['etat_compte'], $row['cin'], $row['mdp']);
						$connecter=true;
						$personne='etudiant';
						break;
					}
				}
			}
			
			if(!$connecter){
			    $result = $bdd->query('SELECT * from professeur');
			    foreach($result as $row) {
			        if($row['cin']==$_POST['login'] and $row['mdp']==$_POST['mdp']){
			            $connecter=true;
			            $personne='professeur';
			            break;
			        }
			    }
			}
			
			if($connecter){
				session_start();
				// la personne qui veut se connecter est'un admin.
				if($personne == 'admin'){
				    header('location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/AdminPages/accueilAdmin.php');
				}
				// la personne qui veut se connecter est un etudiant.
				else if($personne == 'etudiant'){
				    $_SESSION['etudiant'] = $etudiant;
					header('location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/EtudiantPages/notification.php');
				}
				// la personne qui veut se connecter est un professeur.
				else if($personne == 'professeur'){
				    header('location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/ProfesseurPages/accueilProfesseur.php');
				}
			}
			else{
				echo "erreur";
				$erreur="impossible de se connecter";
				header("location:http://localhost:82/pfa/eclipse_work_space/pfa_eclipse/pfa_interface/sign_in/sign_in.php?erreur=$erreur");
			}
		}
	}
?>



