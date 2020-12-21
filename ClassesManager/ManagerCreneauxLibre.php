<?php

class ManagerCreneauxLibre{
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonction de manipulation de la table des sujets */
    /* fonction qui return les creneaux avant de les choisir comme rendez_vous */
    public function fct_findCreneaux(){ /* type tableau des creneaux */
        $creneaux = array();
        $result = $this->db->query("select cl.* from creneauxlibre cl,etudiant e
                                    where id_creneau not in (select distinct id_creneau from rendez_vous)
                                    and cl.cin=e.cin
                                    order by semaine;"
                                    );
        
        foreach($result as $row){
            $creneaux[] = ClasseCreneauxLibre::construct1($row);
        }
        return $creneaux;
    }
    
    public function fct_insert(ClasseCreneauxLibre $creneaux){ /* type boolean */
        $stmt = $this->db->prepare("insert into creneauxLibre(semaine, jour, heure,cin) values(?,?,?,?);");
        return($stmt->execute([$creneaux->semaine,$creneaux->jour,$creneaux->heure,$creneaux->cin]));
    }
    
    public function fct_delete($id_creneau){ /* type boolean */
        $stmt = $this->db->prepare("delete from creneauxLibrecreneauxLibre where id_creneau=?;");
        return $stmt->execute([$id_creneau]);
    }
    
    public function fct_creneauDejaChoisit($id_creneau){
        $stmt = $this->db->prepare("select * from rendez_vous where id_creneau=?;");
        $stmt->execute([$id_creneau]);
        return $stmt->fetch();
    }
    /* # End.*/
}