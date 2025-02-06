<?php 
  require_once '../core/router.php';

  require_once '../app/controllers/medcinscontroller.php';

  require_once '../app/controllers/patientcontroller.php';

  require_once '../app/controllers/rendezvouscontroller.php';


  $route = new Router();

  if(isset($_GET["action"])){
    $action = $_GET["action"];
       switch($action){
        case 'register':
        require_once '../app/controllers/authcontroller.php';
        registercontroller();
            break;

        case 'login':
        require_once '../app/controllers/authcontroller.php';
        logincontroller();
                    break;
            
       }
    }
?>