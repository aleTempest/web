<?php

require_once 'credentials.php';

// Eliminar un vehículo
if (isset($_GET['delete_vehicle']))
{
	$id = $_GET['delete_vehicle'];
    $sql = "DELETE FROM vehicles WHERE id = $id";
    $conn->query($sql);
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
    $sql = "UPDATE vehicles
			SET brand = '$brand', 
			sub_brand = '$sub_brand', 
			type = '$v_type', 
			model = '$model', 
			color = '$color', 
			capacity = '$capacity', 
			year = STR_TO_DATE('$year', '%Y-%m-%d'), 
			origin = '$origin'
			WHERE id = $id";
    $conn->query($sql);
    header('Location: vehicle_list.php');
}

// Crear un nuevo vehículo
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
    // Inserta un nuevo vehículo
    $sql = "INSERT INTO vehicles VALUES (DEFAULT,UUID(),'$brand', '$sub_brand', '$v_type', '$model', '$color', $capacity, STR_TO_DATE('$year','%Y-%m-%d'), '$origin')";
    $conn->query($sql);
    header('Location: vehicle_list.php');
}

if (isset($_POST['create_item']))
{
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];
    $sql = "INSERT INTO catalog VALUES (DEFAULT,'$desc', $cost)";
    $conn->query($sql);
    header('Location: item_list.php');
}

if (isset($_GET['delete_item']))
{
    $id = $_GET['delete_item'];
    $sql = "DELETE FROM catalog WHERE id = $id";
    $conn->query($sql);
    header('Location: item_list.php');
}

if (isset($_POST['update_item']))
{
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $cost = $_POST['cost'];
    $sql = "UPDATE catalog SET cat_desc = '$desc', cost = $cost WHERE id = $id";
    $conn->query($sql);
    header('Location: item_list.php');
}

if (isset($_POST['create_service']))
{
    $id = $_POST['id']; // id del vehículo
    $id_catalog = $_POST['id_catalog'];
    $date = $_POST['s_date'];
    $sql = "INSERT INTO services (id_catalog, id_vehicle, service_date) VALUES ($id_catalog, $id, STR_TO_DATE('$date', '%Y-%m-%d'))";
    $conn->query($sql);
    header('Location: vehicle_view_list.php?id=' . $id);
}

if (isset($_GET['delete_service']))
{
    $id = $_GET['delete_service'];
    $v_id = $_GET['v_id'];
    $sql = "DELETE FROM services WHERE id = $id";
    $conn-> query($sql);
    header('Location: vehicle_view_list.php?id=' . $v_id);
}

if (isset($_POST['update_service'])) {
    $v_id = $_POST['v_id'];
    $s_id = $_POST['s_id'];
    $id_catalog = $_POST['id_catalog'];
    $date = $_POST['date'];
    $sql = "UPDATE services SET id_catalog = $id_catalog, service_date = '$date' WHERE id = $s_id";
    $conn->query($sql);
    header('Location: vehicle_view_list.php?id=' . $v_id);
}
