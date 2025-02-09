<?php 

include_once 'C:/laragon/www/cabinetmedical/app/models/medcins.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class MedcinsController{
    private $user;

    public function __construct($db) {
        $this->user = new Medcins($db);
    }

//   public function InfoMedcinsController(){
//     $medcinss = $this->user->getMedcins();
//     ob_start();
//     require_once __DIR__ . '/../views/patients/dashbordpatients.php';
//     return ob_get_clean();
//   }
    
}


?>