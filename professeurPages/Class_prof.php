<?php
class Class_prof{
    public $cin;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $etat_compte;
    
    
    public static  function construct1($cin,$nom,$prenom,$email,$mdp,$etat_compte)
    {
        $professeur= new self();
        $professeur->cin=$cin;
        $professeur->nom=$nom;
        $professeur->prenom=$prenom;
        $professeur->email=$email;
        $professeur->mdp=$mdp;
        $professeur->etat_compte=$etat_compte;
        return $professeur;
    }
}
