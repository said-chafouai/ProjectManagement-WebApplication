<?php


class ClasseEtudiant{
    public $cne;
    public $nom;
    public $prenom;
    public $email;
    public $etat_compte;
    public $cin;
    public $cne_binome;
    public $mdp;
   
    function __construct() {
        
    }
    
    public static function construct3(array $row){
        $instance = new self();
        $instance->cne = $row['cne'];
        $instance->nom = $row['nom'];
        $instance->prenom = $row['prenom'];
        $instance->email = $row['email'];
        $instance->etat_compte = $row['etat_compte'];
        $instance->cin = $row['cin'];
        $instance->cne_binome = $row['cne_binome'];
        $instance->mdp = $row['mdp'];
        return $instance;
    }
    
    public static function construct2($cne, $nom, $prenom, $email, $etat_compte, $cin, $mdp){
        $instance = new self();
        $instance->cne = $cne;
        $instance->nom = $nom;
        $instance->prenom = $prenom;
        $instance->email = $email;
        $instance->etat_compte = $etat_compte;
        $instance->cin = $cin;
        $instance->mdp = $mdp; 
        return $instance;
    }
    
}

