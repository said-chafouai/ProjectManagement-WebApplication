<?php
Class ManagerSujet{
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonction de manipulation de la table des sujets */
    public function fct_findAll(){ /* type tableau des sujets */
        $sujets = array();
        $result = $this->db->query("select * from sujet");
        
        foreach($result as $row){
            $sujets[] = new ClasseSujet($row);
        }
        return $sujets;
    }
    
    public function fct_findOne($id_sujet){ /* type ClasseSujet */
        $stmt = $this->db->prepare("select * from sujet where id_sujet=?");
        $stmt->execute([$id_sujet]);
        return $stmt->fetchAll();
    }
    
    public function fct_insert(ClasseSujet $sujet){ /* type boolean */
        $stmt = $this->db->prepare("insert into sujet(intitule_sujet, description_sujet, cin) values (?,?,?);");
        return($stmt->execute([$sujet->intitule_sujet,$sujet->description_sujet,$sujet->cin]));
    }
    
    public function fct_update(ClasseSujet $sujet){ /* type boolean */
        $stmt = $this->db->prepare("update sujet set intitule_sujet=?, description_sujet=? where id_sujet=?;");
        return $stmt->execute([$sujet->intitule_sujet,$sujet->description_sujet]);
    }
    
    public function fct_delete($id_sujet){ /* type boolean */
        $stmt = $this->db->prepare("delete from sujet where id_sujet=?;");
        return $stmt->execute([$id_sujet]);
    }
    /* # End.*/
}