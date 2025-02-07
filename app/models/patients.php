<?php 
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

require_once __DIR__ . '/../models/users.php';



class Patient extends User{
       

    public function PrendreRendezVous($pdo, $id_medcins, $id_patients, $date_rendezVous) {
        $sql = "INSERT INTO rendez_vous (id_patients, id_medcins, Statut, date_creation) 
                VALUES (:id_patients, :id_medcins, :Statut, :date_creation)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id_patients' => $id_medcins,
            ':id_medcins' => $id_patients,
            ':Statut' => 'Soumis',
            ':date_creation' => $date_rendezVous
        ]);
        return $stmt->rowCount() > 0;
    }
};



?>