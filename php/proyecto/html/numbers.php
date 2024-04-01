<?php

require_once 'credentials.php';

function get_subject_count(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_subject) as total FROM subjects";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_career_count(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_career) as total FROM careers";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_student_count(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_student) as total FROM students";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_tutor_count(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_tutor) as total FROM tutors";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_tutoring(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_tutoring) as total FROM tutoring_sessions";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}

function get_consulting(): int
{
    global $conn;
    $sql = "SELECT COUNT(id_consulting) as total FROM consulting_sessions";
    $row = $conn->query($sql)->fetch_assoc();
    return $row['total'];
}
