<?php
if(!defined('DB_SERVER')){
    require_once("../initialize.php");  // Make sure this points to the correct path
}

class DBConnection {
    private $host = DB_SERVER;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;

    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->conn->connect_error);
        }
    }

    public function __destruct(){
        if ($this->conn && $this->conn->ping()) {
            $this->conn->close();
        }
    }
}
?>
