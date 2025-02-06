
<?php

include_once '../models/users.php';
include_once './core/database.php';


class Usercontroller{
    private $user ;
    public function __construct()
    {
        $this->user= new User(null, null );
    }


    public function registercontroller() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            }
            try {
                $userId = $this->user->register($nom, $prenom, $email, $password, $role);
                header('Location:../views/auth/connecter.php');
                exit();
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
         
    }
    
    public function logincontroller(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $Motdepasse = $_POST['password'];
        
            try {
                $user = $this->user->login($email, $Motdepasse);
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['email'] = $user['Email'];
                $_SESSION['Nom']=$user['Nom'];
                $_SESSION['role'] = $user['role'];
        
                if ($user['role'] === 'patient') {
        
                    header('Location:C:../views/patients/dashbordpatients.php');
        
                } else if( $user['role'] === 'medecin') {
        
                    header('Location:../views/medcins/dashbordmedcins.php');
        
                }
                exit();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

}



?>



