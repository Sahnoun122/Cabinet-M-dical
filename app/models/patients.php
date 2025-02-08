<?php 
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

require_once __DIR__ . '/../models/users.php';



class Patient extends User{
       
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function PrendreRendezVous($id_medcins, $date_rendezVous) {
        $sql = "INSERT INTO rendez_vous (id_patients, id_medcins, Statut, date_creation) 
                VALUES (:id_patients, :id_medcins, :Statut, :date_creation)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_patients' => $_SESSION['user_id'], // Assuming you have the patient's ID stored in the session
            ':id_medcins' => $id_medcins,
            ':Statut' => 'Soumis',
            ':date_creation' => $date_rendezVous
        ]);
        return $stmt->rowCount() > 0;
    }
}




?>