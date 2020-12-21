<?php

class ManagerRendezVous{
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonction de manipulation de la table des Rendez_Vous */
    /* fonction qui return les creneaux avant de les choisir comme rendez_vous */
    public function fct_findAll(){ /* type tableau des creneaux */
        $rendezVouss = array();
        $result = $this->db->query("select * from rendez_vous;");
        
        foreach($result as $row){
            $rendezVouss[] = ClasseRendezVous::construct1($row);
        }
        return $rendezVouss;
    }
    
    public function fct_findAllByUser($cne){ /* type rendez_vous choisit mais des creneaux qui vont retourner*/
        $creneaux= array();
        $stmt = $this->db->prepare("select * from creneauxLibre cl,rendez_vous rv
                                    where rv.cne=? 
                                    and rv.statut_rv='attente'
                                    and cl.id_creneau = rv.id_creneau;");
        $stmt->execute([$cne]);
        $result = $stmt->fetchAll();
        foreach($result as $row){
            $creneaux[] = ClasseCreneauxLibre::construct1($row);
        }
        return $creneaux;
        
    }
    
    public function fct_semaineContientRendezVous($cne,$semaine){/* rendez_vous */
        $stmt= $this->db->prepare("select * from rendez_vous rv,creneauxlibre cl
                                    where rv.id_creneau=cl.id_creneau
                                    and rv.cne=?
                                    and cl.semaine=?;");
        $stmt->execute([$cne,$semaine]);
        return $stmt->fetch();        
    }
    
    public function fct_insert(ClasseRendezVous $rendezVous){ /* type boolean */
        $stmt = $this->db->prepare("insert into rendez_vous(statut_rv, cne, id_creneau) values(?,?,?);");
        return($stmt->execute([$rendezVous->statut_rv,$rendezVous->cne,$rendezVous->id_creneau]));
    }
    
    public function fct_delete($cne,$id_creneau){ /* type boolean */
        $stmt = $this->db->prepare("delete from rendez_vous where cne=? and id_creneau=?;");
        return $stmt->execute([$cne,$id_creneau]);
    }
    /* # End.*/
}

