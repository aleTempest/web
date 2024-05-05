<?php

require_once '../config/database.php';

class Connection
{
    public function connect(): mysqli
    {
        global $host, $user, $password, $database;
        $conn = new mysqli($host, $user, $password, $database);
        if ($conn->connect_error) {
            die("Error" . $conn->connect_error);
        }
        return $conn;
    }
}