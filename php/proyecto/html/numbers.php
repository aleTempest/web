<?php
require_once 'credentials.php';

function get_subject_count() : int
{
    global $conn;
    $sql = "SELECT COUNT(id_subject) as total FROM subjects";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_career_count() : int
{
    global $conn;
    $sql = "SELECT COUNT(id_career) as total FROM careers";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}