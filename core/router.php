<?php 

require_once '../app/controllers/authcontroller.php';




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


