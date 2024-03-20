<?php
require 'factory.php';

$vehicle_dao = createVehicleDao();
$cat_dao = createCatalogDao();
$views_dao = createViewsDao();

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
	$brand = $_POST['brand'];
	$sub_brand = $_POST['sub_brand'];
	$v_type = $_POST['v_type'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$capacity = $_POST['capacity'];
	$year = $_POST['year'];
	$origin = $_POST['origin'];
	$vehicle_dao->updateVehicleById($id,$brand,$sub_brand,$v_type,$model,$color,$capacity,$year,$origin);
	header('Location: vehicle_list.php');
}

if (isset($_POST['create_vehicle']))
{
	$brand = $_POST['brand'];
	$sub_brand = $_POST['sub_brand'];
	$v_type = $_POST['v_type'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$capacity = $_POST['capacity'];
	$year = $_POST['year'];
	$origin = $_POST['origin'];
	$vehicle_dao->createVehicle($brand,$sub_brand,$v_type,$model,$color,$capacity,$year,$origin);
	header('Location: vehicle_list.php');
}

if (isset($_POST['create_item']))
{
	$desc = $_POST['desc'];
	$cost = $_POST['cost'];
	$cat_dao->createItem($desc,$cost);
	header('Location: item_list.php');
}

if (isset($_GET['delete_item']))
{
	$id = $_GET['delete_item'];
	$cat_dao->deleteItem($id);
	header('Location: item_list.php');
}

if (isset($_POST['update_item']))
{
	$id = $_POST['id'];
	$desc = $_POST['desc'];
	$cost = $_POST['cost'];
	$cat_dao->updateItem($id,$desc,$cost);
	header('Location: item_list.php');
}

if (isset($_POST['create_service']))
{
	$id = $_POST['id'];
	$desc = $_POST['desc'];
	$date = $_POST['s_date'];
	$views_dao->createService($desc,$id,$date);
	header('Location: vehicle_list.php');
}

if (isset($_GET['delete_service']))
{
	$id = $_GET['delete_service'];
	$views_dao->deleteService($id);
	header('Location: vehicle_list.php');
}
