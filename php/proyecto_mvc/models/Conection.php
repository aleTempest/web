<?php
class Conn
{
    private $host = "db";
    private $user = "ale";
    private $password = "elaina";
    private $database = "proyecto_u3";

    public function connect(): mysqli
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error" . $conn->connect_error);
        }
        return $conn;
    }
}
