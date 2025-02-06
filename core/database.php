<?php
class DbConnection {
    private $host = 'localhost';          
    private $username = 'postgres';      
    private $password = '12345';          
    private $database = 'cabinetMedical'; 
    private $port = '3030';               

    protected $db;

    public function __construct() {
        if (!isset($this->db)) {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database}";
            try {
                $this->db = new PDO($dsn, $this->username, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }
        } else {
            echo "Connected correctly"; 
        }
    }

    public function getConnection() {
        return $this->db;
    }
}

$db = new DbConnection();

var_dump($db);

?>