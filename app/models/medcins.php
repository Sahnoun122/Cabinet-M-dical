<?php 
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

require_once '../models/users.php';

class Medcins extends User {
         
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    

    public function accepteRendezVous($id_rdv){
        try {
            $sql = "UPDATE  rendez_vous  SET  Statut = 'Accepté' WHERE  id_rdv = : id_rdv";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(": id_rdv", $id_rdv, PDO::PARAM_INT);
            $stmt->execute();
            header("location: ");
        } catch (PDOException $e) {
            return "Erreur lors de la confirmation d'Article : ". $e->getMessage();
        }
    }
    public function refusecours( $id_cours){
        try {
            $sql = "UPDATE  id_rdv SET  Statut = 'Refusé' WHERE  id_rdv = : id_rdv";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_rdv", $id_cours, PDO::PARAM_INT);
            $stmt->execute();
            header("location: ");
        } catch (PDOException $e) {
            return "Erreur lors de la Refuse d'Article : ". $e->getMessage();
        }
    }


}

?>