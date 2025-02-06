<?php 

include_once 'C:/laragon/www/cabinetmedical/core/database.php';
class User{
    
    protected  $id_user;
    protected   $nom;
    protected $prenom;
    protected $email;
    protected  $Password;
    protected $role;

    protected $db;
        
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getIduser(){
        return $this->id_user;
    }
    public function getNom(){
        return $this->nom;
    } 
    public function getPrenom(){
        return $this->prenom;
    } 
  
    public function getEmail(){
        return $this->email;
    } 
    public function getPassword(){
        return $this->Password;
    }
    public function getRole(){
        return $this->role;
    }

    public function setNom( $nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
 
    public function setEmail( $email){
        $this->email = $email;
    }
    public function setPassword( $Password){
        $this->Password = password_hash($Password,PASSWORD_DEFAULT);
    }

        public function register($nom, $prenom, $email, $password, $role) {
            try {
                $allowedRoles = ['patient', 'medecin'];
                if (!in_array($role, $allowedRoles)) {
                    throw new Exception("Invalid role provided.");
                }
                $this->db->beginTransaction();
    
                $password = password_hash($password, PASSWORD_BCRYPT);
    
                $sqlUser = "INSERT INTO users (nom, prenom, email, password, role) VALUES (:nom, :prenom, :email, :password, :role)";
                $stmtUser = $this->db->prepare($sqlUser);
                $stmtUser->execute([
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':password' => $password,
                    ':role' => $role
                ]);
    
                $userId = $this->db->lastInsertId();
    
                $this->db->commit();
                return $userId;
            } catch (Exception $e) {
                $this->db->rollBack();
                throw new Exception("Registration failed. Please try again.");
            }
        }
 

    public function login($email, $password) {
        try {
            $sql = "SELECT id_user, email, password, Role, nom FROM users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':email' => $email]);
            // $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password,$user['password'])){
                    return [
                            'id_user' => $user['id_user'],
                            'email' => $user['email'],
                            'role' => $user['Role'],
                            'nom' => $user['nom'],
                    ];
                }else{
                    throw new Exception('Password Incorrect !');
                }
            }

            
        } catch (Exception $e) {
            throw $e;
        }
    }
}


?>