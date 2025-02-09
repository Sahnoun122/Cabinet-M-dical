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
            $id_medcins = $_POST['id_rdv'];
            $reservation_date = $_POST['reservation_date'];

            try {
                $this->user->PrendreRendezVous($id_medcins, $reservation_date);
                header('Location:rendezVousMedcins');
                exit();
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
}

