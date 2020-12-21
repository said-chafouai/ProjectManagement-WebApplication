<?php

class ClasseRendezVous{
    public $statut_rv;
    public $cne;
    public $id_creneau;
    
    public static function contruct1(array $row){
        $instance = new self();
        $instance->statut_rv  = $row['statut_rv'];
        $instance->cne = $row['statut_rv'];
        $instance->id_creneau = $row['statut_rv'];
        return $instance;
    }
    
    public static function contruct2($statut_rv,$cne,$id_creneau){
        $instance = new self();
        $instance->statut_rv  = $statut_rv;
        $instance->cne = $cne;
        $instance->id_creneau = $id_creneau;
        return $instance;
    }
}

