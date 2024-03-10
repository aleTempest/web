<?php
require_once 'StudentDao.php';
require_once 'CareerDao.php';
require_once 'SubjectDao.php';

$servername = "db";
$username = "ale";
$password = "elaina";
$dbname = "unidad2";

function createStudentDao() : StudentDao {
	global $servername, $username, $password, $dbname;
	return new StudentDao($servername,$username,$password,$dbname);
}

function createCareerdao() : CareerDao {
	global $servername, $username, $password, $dbname;
	return new CareerDao($servername,$username,$password,$dbname);
}

function createSubjectDao() : SubjectDao {
	global $servername, $username, $password, $dbname;
	return new SubjectDao($servername,$username,$password,$dbname);
}
