<?php
require 'factory.php';

$vehicle_dao = createVehicleDao();

// Eliminar vechículo
if (isset($_GET['delete_vehicle']))
{
	$id = $_GET['delete_vehicle'];
	$vehicle_dao->deleteVehicleById($id);
	header('Location: vehicle_list.php');
}

// Actualizar vehículo
if (isset($_POST['update_vehicle']))
{
	$id = $_POST['id_vehicle'];
	$serial_number = $_POST['serial_number'];
	$brand = $_POST['brand'];
	$v_type = $_POST['v_type'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$capacity = $_POST['capacity'];
	$year = $_POST['year'];
	$origin = $_POST['origin'];
	$vehicle_dao->updateVehicleById($id,$serial_number,$brand,$v_type,$model,$color,$capacity,$year,$origin);
	header('Location: vehicle_list.php');
}
