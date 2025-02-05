<?php
class DbConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '12345';
    private $database = 'cabinetMedical';
    private $port = '3030';

    protected $connection;

    public function __construct() {
        if (!isset($this->connection)) {
            $dsn = "pgsql:host={$this->host};dbname={$this->database} ; port ={$this->port}";
            try {
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                echo "connecte correctee ";
          } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
