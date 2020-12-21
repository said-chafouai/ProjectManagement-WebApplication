<?php
// connection a la bdd
include_once 'Fonction/connection_bdd.php';
$bdd = fct_bdd();

// recuperer les donnees pour tester l'existance du nouvelle membre
$result = $bdd->query('select * from etudiant');

// etat prend (no_exist,exit,nouveau)
/*
 * no_exit  : si il n'exist pas dans la bdd( n'est pas inserer pour l'admin.
 * exit     : il 'est deja inscrit mais il essaie de s'inscrire une nouvelle fois.
 * nouveau  : tous les conditions sont bons l'inscription va reussir.
 */
$etat='not_exist';
foreach ($result as $row){
    if($row['cne_etud']==$_POST['cne_cin'] and $row['nom_etud']==$_POST['nom'] and $row['prenom_etud']==$_POST['prenom']){
        $etat = 'reussit';
        if($row['etat_compte'] == true)
            $etat = 'exist';
        // si le compte existe c'est pas la peine de continu.
        break;        
    }   
}

if($etat == 'not_exist'){
    echo "dsl ces informations n'exites pas merci de verifier";
}
else if($etat == 'exist'){
    echo "ce compte est deja active";
}
else if($etat == 'reussit'){
    $stmt = $bdd->prepare("update etudiant set email_etud=:email, mdp_etud=:mdp, etat_compte=:etat_compte where cne_etud=:cne");
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":mdp", $mdp);
    $stmt->bindParam(":etat_compte",$etat_compte);
    $stmt->bindParam(":cne", $cne);
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $etat_compte = 1;
    $cne = $_POST['cne_cin'];
    $stmt->execute();
    echo "bienvenu inscription reussit";
}


