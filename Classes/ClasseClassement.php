<?php


class ClasseClassement{
    public $classement_sujet;
    public $id_sujet;
    public $cne;
    
    public function __construct(){

    }
    
    public static function construct2(array $row){
        $classement = new self();
        $classement->$classement_sujet = $row['classement_sujet'];
        $classement->$id_sujet = $row['id_sujet'];
        $classement->$cne_etud = $row['cne'];
        return $classement;
    }
    
    public static function construct3($classement_sujet, $id_sujet, $cne){
        $classement = new self();
        $classement->classement_sujet = $classement_sujet;
        $classement->id_sujet = $id_sujet;
        $classement->cne = $cne;
        return $classement;
    }
}

