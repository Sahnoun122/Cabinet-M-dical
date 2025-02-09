<?php 

include_once 'C:/laragon/www/cabinetmedical/app/models/medcins.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';

class MedcinsController{
    private $user;

    public function __construct($db) {
        $this->user = new Medcins($db);
    }


    
     

public function accepterRendezvousController(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cours'], $_POST['action'])) {
        $id_cours = $_POST['id_cours'];
        $action = $_POST['action'];
        $admin ->acceptercours($id_cours);
        $_SESSION['message'] = "cours has been updated.";
        header("Location:../views/dashbordadmin.php");
        exit;
    }
    
}

public function refuseRendezvousController(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_cours'], $_POST['actions'])) {
        $id_cours = $_POST['id_cours'];
        $action = $_POST['actions'];
        $admin ->refusecours( $id_cours);
        $_SESSION['message'] = "cours has been rejecte.";
    
        header("Location:../views/dashbordadmin.php");
        exit;
    }
}
    
}


?>