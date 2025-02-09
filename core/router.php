<?php 

require_once '../app/controllers/authcontroller.php';
require_once '../app/controllers/medcinscontroller.php';
require_once '../app/controllers/patientcontroller.php';




$dsn = 'mysql:host=localhost;dbname=your_database';
$username = 'username';
$password = 'password';
$dbConnection = new DbConnection($dsn, $username, $password);
$db = $dbConnection->getConnection();

$user = new User($db);

class Router {
    private $controllers = [];

    public function __construct($db) {
        $this->controllers['user'] = new UserController($db);
        $this->controllers['medcins'] = new MedcinsController($db);
        $this->controllers['patients'] = new PatientController($db);


    }

    public function runAction($controllerName, $action) {
        if (isset($this->controllers[$controllerName])) {
            $controller = $this->controllers[$controllerName];
            $validActions = ['register', 'login', 'rendezVousMedcins' , 'rendezVous' ,'accepterRefuser' ,'voirStatistique'];
            if (method_exists($controller, $action) && in_array($action, $validActions)) {
                return $controller->$action($_GET["action"]);
            } else {
                return $controller->defaultAction(); // Action par défaut 
            }
        } else {
            throw new Exception("Controller not found.");
        }
    }

    public function getAction($controllerName, $action) {
        $this->runAction($controllerName, $action);
    }
}




