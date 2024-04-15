<?php
class Conn
{
    private $host = "localhost";
    //private $user = "root";
    //private $password = "";    
    private $user = "ale";
    private $password = "ela";
    private $database = "cine";

    public function connect(): mysqli
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error" . $conn->connect_error);
        }
        return $conn;
    }
}
