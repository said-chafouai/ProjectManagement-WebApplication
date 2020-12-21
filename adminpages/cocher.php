 <form action="" method="post">
                                            <div class="from-group">email <input class="form-control"  name="email" placeholder="username" type="text"></div>
                                            <div class="from-group">new password <input class="form-control" name="mdp" placeholder="**********" type="password"></div>
                                           <div class="from-group" > <input type="submit" name ="submit" class="btn btn-success" value="Modifier"></div>
                                           
                                            
                                          </form>
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         if(isset($_POST['ancienne_mdp']) and isset($_POST['nouveau_mdp']) and isset($_POST['conf_nouveau_mdp'])){
    // si l'ancienne mdp est egale au mdp dans la bdd danc on va le changer
    if($_POST['ancienne_mdp'] == $_SESSION['etudiant']->mdp){
        $stmt = $bdd->prepare("update etudiant set mdp = ? where cne= ?");
        $stmt->execute([$_POST['nouveau_mdp'],$etudiant->cne]);
        echo "<script>alert('Le changemement est reussit');</script>";
    }
    else{
        echo "<script>alert('Mot de passe incorrecte');</script>";  
    }

}