<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
// connection a la bdd
include_once '../Fonction/connection_bdd.php';
$bdd = fct_bdd();

if(isset($_POST['cne'])){
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
    if($row['cne']==$_POST['cne'] and $row['nom']==$_POST['nom'] and $row['prenom']==$_POST['prenom']){
        $etat = 'reussit';
        if($row['etat_compte'] == true){
                // si le compte existe c'est pas la peine de continu.
                break; 
                $etat = 'exist';
        }
       
    }   
}

if($etat == 'not_exist'){
    echo "<script>alert('desole ces informations n'exites pas merci de verifier')</script>";
}
else if($etat == 'exist'){
    echo "<script>alert('ce compte est deja active');</script>";
}
else if($etat == 'reussit'){
    $stmt = $bdd->prepare("update etudiant set email=:email, mdp=:mdp, etat=:etat_compte where cne=:cne");
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":mdp", $mdp);
    $stmt->bindParam(":etat_compte",1);
    $stmt->bindParam(":cne", $cne);
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $etat_compte = 1;
    $cne = $_POST['cne'];
    $stmt->execute();

    echo "<script>alert('inscription reussit');</script>";
}
}


$result = $bdd->query('select * from professeur');

// etat prend (no_exist,exit,nouveau)
/*
 * no_exit  : si il n'exist pas dans la bdd( n'est pas inserer pour l'admin.
 * exit     : il 'est deja inscrit mais il essaie de s'inscrire une nouvelle fois.
 * nouveau  : tous les conditions sont bons l'inscription va reussir.
 */
if(isset($_POST['cin'])){
    $etat='not_exist';
foreach ($result as $row){
    if($row['cin']==$_POST['cin'] and $row['nom']==$_POST['nom'] and $row['prenom']==$_POST['prenom']){
        $etat = 'reussit';
        if($row['etat_compte'] == true)
            $etat = 'exist';
        // si le compte existe c'est pas la peine de continu.
        break;        
    }   
}

if($etat == 'not_exist'){
     echo "<script>alert('desole ces informations n'exites pas merci de verifier');</script>";
}
else if($etat == 'exist'){
    echo "<script>alert('ce compte est deja active');</script>";

}
else if($etat == 'reussit'){
    $stmt = $bdd->prepare("update professeur set email=:email, mdp=:mdp, etat=:etat_compte where cin=:cin");
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":mdp", $mdp);
    $stmt->bindParam(":etat_compte",1);
    $stmt->bindParam(":cin", $cne);
    
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $etat_compte = 1;
    $cin = $_POST['cin'];
    $stmt->execute();
    echo "<script>alert('bienvenu inscription reussit');</script>";
}
}
?>


</body>
</html>
