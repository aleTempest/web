<?php
require_once 'DAO.php';
require_once 'VehicleView.php';

class ViewsDao extends DAO
{
	public function getVehicleView(int $id): array
	{
		$sql = "SELECT * FROM vehicle_view WHERE vehicle_id = $id";
		$res = $this->conn->query($sql);
		$items = array();
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$id = $row['s_id'];
			$date = $row['service_date'];
			$desc = $row['cat_desc'];
			$cost = $row['cost'];
			$items[] = new VehicleView($id, $date, $desc, $cost);
		}
		return $items;
	}

	public function getVehicleViewSum(int $id): int
	{
		$sql = "SELECT SUM(cost) as total FROM vehicle_view WHERE vehicle_id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return $row['total'];
	}

	public function deleteService(int $id): void
	{
		$sql = "DELETE FROM services WHERE id = $id";
		$this->conn->query($sql);
	}

	public function createService(int $id_cat, int $id_vehicle, string $date): void
	{
		$sql = "INSERT INTO services (id_catalog, id_vehicle, service_date) VALUES ($id_cat, $id_vehicle, '$date')";
		$this->conn->query($sql);
	}
}
