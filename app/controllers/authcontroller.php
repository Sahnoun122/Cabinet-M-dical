
<?php

include_once 'C:/laragon/www/cabinetmedical/app/models/users.php';
include_once 'C:/laragon/www/cabinetmedical/core/database.php';



class Usercontroller {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

        public function registerController() {
            echo 'registerController is working';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $role = isset($_POST['role']) ? $_POST['role'] : '';
                $specialite = isset($_POST['specialite']) ? $_POST['specialite'] : '';
    
                try {
                    $this->user->register($nom, $prenom, $email, $password, $role, $specialite);
                    header('Location:loginViews');
                    exit();
                } catch (Exception $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
        }
    
    
        public function logincontroller() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $Motdepasse = $_POST['password'];
    
                try {
                    echo "rkjnfjr";

                    $user = $this->user->login($email, $Motdepasse);
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['Nom'] = $user['nom'];
                    $_SESSION['role'] = $user['role'];
    
                    if ($user['role'] === 'patient') {
                        header('Location:app/views/patients/dashbordpatients.php');
                    } else if ($user['role'] === 'medecin') {
                        header('Location:app/views/medcins/dashbordmedcins.php');
                    }
                    exit();
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        }
}



?>



