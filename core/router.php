<?php 

require_once '../app/controllers/authcontroller.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $url);
$controller = $segments[2] ;
echo $controller;
$lastSegment = end($segments); 


class Router{

    private $controller;
    public function __construct(){
        $this->controller = new  Usercontroller();
    }
    
    public function runAction($action){    
        $validActions = [ 'register', 'login']; 
        if (in_array($action, $validActions)) {
            $this->controller->$action($_GET["action"]);
        } else {
          return  $this->controller->registercontroller();  
        }
    }
    
    public function getAction($action){

        $result =  $this->runAction($action);
      

    }


}


