<?php

Class ManagerEtudiant{
    
    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }
    /* ## start : fonctions de manipulation de la table des etudiant */
    public function fct_findAll(){ /* type tableau des etudiants */
        $etudiants = array();
        $result = $this->db->query("select * from etudiant");
        
        foreach($result as $row){
            $etudiants = ClasseEtudiant::construct3($row);
        }
        return $etudiants;
    }
    
    public function fct_findBinomeDemande($cne){ /* type etudiants: pour trouver le binome si il existe */
        $stmt = $this->db->prepare("select * from etudiant where cne_binome=?");
        $stmt->execute([$cne]);
        return $stmt->fetchAll();
    }
    
    public function fct_findBinome($cne){ /* type etudiant connecte */
        $stmt = $this->db->prepare("select b.* from etudiant b
                                    where b.cne_binome= (select e.cne from etudiant e
                                                         where e.cne = ?
                                                         and e.cne_binome=b.cne);");
        $stmt->execute([$cne]);       
        return $stmt->fetch();
    }
    
    public function fct_addBinome($cne,$cne_binome){/* type boolean */
        $stmt = $this->db->prepare("update etudiant set cne_binome=? where cne=?");
        return($stmt->execute([$cne_binome,$cne]));
    }
    
    public function fct_rejeterBinome($cne_binome){/* type boolean */
        $stmt = $this->db->prepare("update etudiant set cne_binome=null where cne=?");
        return($stmt->execute([$cne_binome]));
    }
    
    public function fct_findEncadrant($cne){ /* il va retourner le cin de professeur */
        $stmt = $this->db->prepare("select p.* from professeur p,etudiant e where e.cne=? and e.cin=p.cin;");
        $stmt->execute([$cne]);
        $row = $stmt->fetch();
        return $row['cin'];
        
    }
    
    public function fct_findOne($cne){ /* type etudiant */
        $stmt = $this->db->prepare("select * from etudiant where cne=?");
        $stmt->execute([$cne]);
        return $stmt->fetch();
    }
    
    public function fct_insertByAdmin(ClasseEtudiant $etudiant){ /* type boolean */
        $stmt = $this->db->prepare("insert into etudiant(cne, nom, prenom) values(?, ?, ?);");
        return($stmt->execute([$etudiant->cne,$etudiant->nom,$etudiant->prenom]));
    }
    
    public function fct_deleteByAdmin($cne){ /* type boolean */
        $stmt = $this->db->prepare("delete from etudiant where cne=?;");
        return $stmt->execute([$cne]);
    }
    /* # End.*/
    
}