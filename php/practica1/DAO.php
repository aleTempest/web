<?php
abstract class DAO {
    protected $conn;
    public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname) {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
