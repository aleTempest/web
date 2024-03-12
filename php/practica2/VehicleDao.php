<?php
require_once 'DAO.php';
require_once 'Vehicle.php';

class VehicleDao extends DAO
{
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	public function getAllVehicles() : Array
	{
		$sql = "SELECT * FROM vehicles";
		$res = $this->conn->query($sql);
		$items = Array();

		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$id = $row['id'];
			$serial_number = $row['serial_number'];
			$brand = $row['brand'];
			$v_type = $row['type'];
			$model = $row['model'];
			$color = $row['color'];
			$capacity = $row['capacity'];
			$year = $row['year'];         			
			$origin = $row['origin'];       			
			$vehicle = new Vehicle(
				$id,$serial_number,$brand,$v_type,$model,$color,$capacity,$year,$origin
			);
			$items[] = $vehicle;
		}
		return $items;
	}

	public function getVehicleById(int $id) : Vehicle
	{
		$sql = "SELECT * FROM vehicles WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		$id = $row['id'];
		$serial_number = $row['serial_number'];
		echo $serial_number;
		$brand = $row['brand'];
		$v_type = $row['type'];
		$model = $row['model'];
		$color = $row['color'];
		$capacity = $row['capacity'];
		$year = $row['year'];         			
		$origin = $row['origin'];       			
		return new Vehicle(
			$id,$serial_number,$brand,$v_type,$model,$color,$capacity,$year,$origin
		);
	}

	public function deleteVehicleById(int $id) : void
	{
		$sql = "DELETE FROM vehicles WHERE id = $id";
		$this->conn->query($sql);
	}

	public function updateVehicleById(int $id, string $brand, string $v_type, string $model, string $color, int $capacity, string $year, string $origin) : void
	{
		$sql = "UPDATE vehicles SET v_type = 'brand = '$brand', $v_type', model = '$model', color = '$color', capacity = $capacity, year = STR_TO_DATE('$year', '%m-%d-%Y'), origin = '$origin' WHERE id = $id";
		$this->conn->query($sql);
	}
}
