<?php 
  require_once '../core/router.php';

  require_once '../app/controllers/medcinscontroller.php';

  require_once '../app/controllers/patientcontroller.php';

  require_once '../app/controllers/rendezvouscontroller.php';
  require_once '../app/controllers/authcontroller.php';
  require_once '../app/controllers/authcontroller.php';


  $route = new Router();
  $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  $segments = explode('/', $url);
  $controller = $segments[2] ;
  echo $controller;
  $lastSegment = end($segments); 
  if(isset($controller)){
       switch($controller){
        case 'register':
            $user = new Usercontroller();
            $user->registercontroller();
            echo 'register';
            break;
        case 'registerView':
            require_once("C:/laragon/www/cabinetmedical/app/views/auth/register.php");
            echo 'registerView';
            break;
            
            case 'login':
                echo 'login';
            break;
            
       }
    }
?>