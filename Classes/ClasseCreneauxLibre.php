<?php

class ClasseCreneauxLibre{
    public $id_creneau;
    public $semaine;
    public $jour;
    public $heure;
    public $cin;
    
    public static function construct1(array $row){
        $instance = new self();
        $instance->id_creneau = $row['id_creneau'];
        $instance->semaine = $row['semaine'];
        $instance->jour = $row['jour'];
        $instance->heure = $row['heure'];
        $instance->cin = $row['cin'];
        return $instance;
    }
}

