<?php
require_once 'VehicleDao.php';
require_once 'CatalogDao.php';

$servername = "db";
$username = "ale";
$password = "elaina";
$dbname = "practica2";

function createVehicleDao()
{
	global $servername, $username, $password, $dbname;
	return new VehicleDao($servername,$username,$password,$dbname);
}

function createCatalogDao()
{
	global $servername, $username, $password, $dbname;
	return new CatalogDao($servername,$username,$password,$dbname);
}
