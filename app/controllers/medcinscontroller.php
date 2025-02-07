<?php 

include_once 'C:/laragon/www/cabinetmedical/app/models/medcins.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class MedcinsController{
    private $user;

    public function __construct($db) {
        $this->user = new Medcins($db);
    }

  public function InfoMedcinsController(){
    
  }
    
}


?>