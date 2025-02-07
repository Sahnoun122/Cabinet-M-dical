<?php 

include_once 'C:/laragon/www/cabinetmedical/core/database.php';
class User{
    
    protected  $id_user;
    protected   $nom;
    protected $prenom;
    protected $email;
    protected  $Password;
    protected $role;

    private $db;
    
    public function __construct($db) {
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

    
        public function register($nom, $prenom, $email, $password, $role, $specialite) {
            try {
                $allowedRoles = ['patient', 'medecin'];
                if (!in_array($role, $allowedRoles)) {
                    throw new InvalidArgumentException("Rôle invalide fourni.");
                }
    
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new InvalidArgumentException("Adresse email invalide.");
                }
    
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
                $this->db->beginTransaction();
    
                $sqlUser = "INSERT INTO users (nom, prenom, email, password, role, specialite) VALUES (:nom, :prenom, :email, :password, :role, :specialite)";
                $stmtUser = $this->db->prepare($sqlUser);
                $stmtUser->execute([
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':email' => $email,
                    ':password' => $hashedPassword,
                    ':role' => $role,
                    ':specialite' => $specialite
                ]);
    
                $userId = $this->db->lastInsertId();
    
                $this->db->commit();
            
            } catch (InvalidArgumentException $e) {
                $this->db->rollBack();
                throw new Exception("Échec de l'inscription : " . $e->getMessage());
            } catch (PDOException $e) {
                $this->db->rollBack();
                throw new Exception("Erreur de la base de données : " . $e->getMessage());
            } catch (Exception $e) {
                $this->db->rollBack();
                throw new Exception("Échec de l'inscription. Veuillez réessayer.");
            }
        }
    
    
    
        
            public function login($email, $password) {
                try {
                    $sql = "SELECT id_user, email, password, role, nom FROM users WHERE email = :email";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute([':email' => $email]);
                    if ($stmt->rowCount() > 0) {
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        if (password_verify($password, $user['password'])) {
                            return [
                                'id_user' => $user['id_user'],
                                'email' => $user['email'],
                                'role' => $user['role'],
                                'nom' => $user['nom'],
                            ];
                        } else {
                            throw new Exception('Password Incorrect!');
                        }
                    }
                } catch (Exception $e) {
                    throw  $e;
                }
            }    
}


?>