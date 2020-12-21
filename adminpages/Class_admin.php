<?php
class Class_admin{
    public $id_admin;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public static  function construct1($id_admin,$nom,$prenom,$email,$mdp)
    {
        $admin= new self();
        $admin->id_admin=$id_admin;
        $admin->nom=$nom;
        $admin->prenom=$prenom;
        $admin->email=$email;
        $admin->mdp=$mdp;
        return $admin;
    }
}