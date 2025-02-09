<?php 

include_once 'C:/laragon/www/cabinetmedical/core/database.php';
include_once __DIR__ . '/users.php'; 


class Medcins extends User {
         
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }


    
                public function voirStatistique(){
                            $sql = 
                            "SELECT 
                        u.Nom, 
                        u.Prenom, 
                        u.specialite, 
                        r.date_creation
                    FROM 
                        rendez_vous r
                    JOIN 
                        users u ON u.id_user = r.id_medcins
                    WHERE 
                        r.Statut IN ('Soumis', 'Accepté', 'Refusé');
                    ;";

                    $stmt = $this->db->prepare($sql);

                    if ($stmt->execute()) {
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                    var_dump($stmt->errorInfo());
                    return false;
                    }
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
    public function refuseRendezVous( $id_rdv){
        try {
            $sql = "UPDATE  id_rdv SET  Statut = 'Refusé' WHERE  id_rdv = : id_rdv";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_rdv", $id_rdv, PDO::PARAM_INT);
            $stmt->execute();
            header("location: ");
        } catch (PDOException $e) {
            return "Erreur lors de la Refuse d'Article : ". $e->getMessage();
        }
    }


}

?>