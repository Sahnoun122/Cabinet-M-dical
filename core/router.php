<?php 

require_once '../app/controllers/authcontroller.php';


$dsn = 'mysql:host=localhost;dbname=your_database';
$username = 'username';
$password = 'password';
$dbConnection = new DbConnection($dsn, $username, $password);
$db = $dbConnection->getConnection();

$user = new User($db);

class Router {
    private $controller;

    public function __construct($db) {
        $this->controller = new Usercontroller($db);
    }

    public function runAction($action) {    
        $validActions = ['register', 'login']; 
        if (in_array($action, $validActions)) {
            $this->controller->$action($_GET["action"]);
        } else {
            return $this->controller->registercontroller();  
        }
    }

    public function getAction($action) {
        $result = $this->runAction($action);
    }
}



