<?php 

include_once 'C:/laragon/www/cabinetmedical/app/models/patients.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class PatientController{
    private $user;

    public function __construct($db) {
        $this->user = new Patient($db);
    }


     public function PrenRendezVous(){
          
     }
  
    
}


?>