<?php 

include_once 'C:/laragon/www/cabinetmedical/app/models/medcins.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class MedcinsController{
    private $user;

    public function __construct($db) {
        $this->user = new Medcins($db);
    }

public function voirStatistiqueController(){
      
}

public function accepterRendezvousController(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_rdv'], $_POST['action'])) {
        $id_rdv = $_POST['id_rdv'];
        $action = $_POST['action'];
        $this->user ->accepteRendezVous($id_rdv);
        $_SESSION['message'] = "cours has been updated.";
        header("Location:../views/dashbordadmin.php");
        exit;
    }
    
}

public function refuseRendezvousController(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_rdv'], $_POST['actions'])) {
        $id_rdv = $_POST['id_rdv'];
        $action = $_POST['actions'];
        $this->user ->refuseRendezVous( $id_rdv);
        $_SESSION['message'] = "cours has been rejecte.";
    
        header("Location:../views/dashbordadmin.php");
        exit;
    }
}
    
}


?>