<?php


include_once 'C:/laragon/www/cabinetmedical/app/models/patients.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class PatientController {
    private $user;

    public function __construct($db) {
        $this->user = new Patient($db);
    }

    public function InfoMedcinsController() {
        $medcinss = $this->user->getMedcins(); // Fetch doctors from the database
        require_once __DIR__ . '/../views/patients/dashbordpatients.php';
    }

    public function RendezVousController() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_patients = isset($_POST['id_patients']) ? $_POST['id_patients'] : null;
            $reservation_date = $_POST['reservation_date'];
    
            if ($id_patients === null) {
                throw new Exception("Patient ID not provided");
            }
    
            try {
                $this->user->PrendreRendezVous($id_patients, $reservation_date);
                header('Location:rendezVousMedcins');
                exit();
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
    
}

