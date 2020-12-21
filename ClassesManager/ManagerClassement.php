<?php


class ManagerClassement{
    
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonction de manipulation de la table des Classements */
    public function fct_findAll(){ /* type tableau des classment */
        $classements = array();
        $result = $this->db->query("select * from classement_sujets");
        
        foreach($result as $row){
            $classements[] = new ClasseClassement($row);
        }
        return $classements;
    }
    
    public function fct_findAllByUser($cne){ /* type ClasseSujet */
        $stmt = $this->db->prepare("select * from classement_sujets where cne=?");
        $stmt->execute([$cne]);
        return $stmt->fetchAll();
    }
    
    public function fct_insert(ClasseClassement $classement){ /* type boolean */
        $stmt = $this->db->prepare("insert into classement_sujets(classement_sujet, id_sujet, cne) values (?,?,?);");
        return($stmt->execute([$classement->classement_sujet,$classement->id_sujet,$classement->cne]));
    }
    
    public function fct_update(ClasseClassement $classement){ /* type boolean */
        $stmt = $this->db->prepare("update classement_sujets set classement_sujet=? where id_sujet=? and cne=?;");
        return $stmt->execute([$classement->classement_sujet,$classement->id_sujet,$classement->cne]);
    }
    /* # End.*/
    
}

