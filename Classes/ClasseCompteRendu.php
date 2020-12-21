<?php

class ClasseCompteRendu{
    public $date_cr;
    public $fichier;
    public $cin;
    public $cne;
    
    public static function construct2(array $row){
        $cr = new self();
        $cr->date_cr = $row['date_cr'];
        $cr->fichier = $row['fichier'];
        $cr->cin = $row['cin'];
        $cr->cne = $row['cne'];
        return $cr;
    }
    
    public static function construct3($date_cr, $fichier, $cin, $cne){
        $cr = new self();
        $cr->date_cr = $date_cr;
        $cr->fichier = $fichier;
        $cr->cin = $cin;
        $cr->cne = $cne;
        return $cr;
    }
    
}