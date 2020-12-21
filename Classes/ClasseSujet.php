<?php


class ClasseSujet{
    public $id_sujet;
    public $intitule_sujet;
    public $description_sujet;
    public $cin;
    
    public function __construct(array $row){
        $this->id_sujet = $row['id_sujet'];
        $this->intitule_sujet = $row['intitule_sujet'];
        $this->description_sujet = $row['description_sujet'];
        $this->cin = $row['cin'];
    }
}

