<?php 
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

require_once __DIR__ . '/../models/users.php';



class Patient extends User{
       
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    
    public function getMedcins() {
        $sql = "SELECT nom, prenom, specialite FROM users WHERE role = 'medecin'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

  public function PrendreRendezVous($id_medcins, $date_rendezVous) {
    if (!is_numeric($_SESSION['id_patients']) || !is_numeric($id_medcins)) {
        throw new Exception("Invalid ID format");
    }

    $sql = "INSERT INTO rendez_vous (id_patients, id_medcins, Statut, date_creation) 
            VALUES (:id_patients, :id_medcins, :Statut, :date_creation)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':id_patients' => (int)$_SESSION['id_user'], 
        ':id_medcins' => (int)$id_medcins, 
        ':Statut' => 'Soumis',
        ':date_creation' => $date_rendezVous
    ]);
    return $stmt->rowCount() > 0;
}

}




?>