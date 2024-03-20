<?php
require_once 'DAO.php';
require_once 'Vehicle.php';

class VehicleDao extends DAO
{
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	/**
	 * Crea un objeto a partir de una consulta en la base de datos
	 *
	 * @param Array $row fila de la tabla consultada
	 * @return Un objeto Vehicle directamente creado con los resultados de la consulta
		* */
	private function createFromRow(Array $row) : Vehicle
	{
		$id = $row['id'];
		$serial_number = $row['serial_number'];
		$brand = $row['brand'];
		$sub_brand = $row['sub_brand'];
		$v_type = $row['type'];
		$model = $row['model'];
		$color = $row['color'];
		$capacity = $row['capacity'];
		$year = $row['year'];         			
		$origin = $row['origin'];       			
		return new Vehicle(
			$id,$serial_number,$brand,$sub_brand,$v_type,$model,$color,$capacity,$year,$origin
		);
	}

	/** 
	 * Hace una consulta a la base de datos y obtiene todas las filas de la tabla
	 *
	 * @return Array una colección de objetos de tipo Vehicle
		* */
	public function getAllVehicles() : Array
	{
		$sql = "SELECT * FROM vehicles";
		$res = $this->conn->query($sql);
		$items = Array();

		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$items[] = $this->createFromRow($row);
		}
		return $items;
	}

	/**
	 * Hace una consulta a la base de datos y obtiene un vehículo en específico
	 * a través del id
	 *
	 * @param int $id El id para la consulta a la base de datos
	 * @return Un objeto de tipo Vehicle
		* */
	public function getVehicleById(int $id) : Vehicle
	{
		$sql = "SELECT * FROM vehicles WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return $this->createFromRow($row);
	}

	/**
	 * Elimina un vehículo de la base de datos mediante su id.
	 *
	 * @param int $id El id del vehículo a eliminar.
	 * @return void
	 */
	public function deleteVehicleById(int $id) : void
	{
		$sql = "DELETE FROM vehicles WHERE id = $id";
		$this->conn->query($sql);
	}

	/**
	 * Actualiza los datos de un vehículo en la base de datos mediante su id.
	 *
	 * @param int $id El id del vehículo a actualizar.
	 * @param string $brand La marca del vehículo.
	 * @param string $v_type El tipo de vehículo.
	 * @param string $model El modelo del vehículo.
	 * @param string $color El color del vehículo.
	 * @param int $capacity La capacidad del vehículo.
	 * @param string $year El año de fabricación del vehículo.
	 * @param string $origin El origen del vehículo.
	 * @return void
	 */
	public function updateVehicleById(int $id, string $brand, string $sub_brand, string $v_type, string $model, string $color, int $capacity, string $year, string $origin) : void
	{
		$sql = "UPDATE vehicles 
			SET brand = '$brand', 
			sub_brand = '$sub_brand', 
			type = '$v_type', 
			model = '$model', 
			color = '$color', 
			capacity = $capacity, 
			year = STR_TO_DATE('$year', '%Y-%m-%d'), 
			origin = '$origin' 
			WHERE id = $id";
		$this->conn->query($sql);
	}

	/**
	 * Crea un nuevo vehículo en la base de datos.
	 *
	 * @param string $brand La marca del vehículo.
	 * @param string $v_type El tipo de vehículo.
	 * @param string $model El modelo del vehículo.
	 * @param string $color El color del vehículo.
	 * @param int $capacity La capacidad del vehículo.
	 * @param string $year El año de fabricación del vehículo.
	 * @param string $origin El origen del vehículo.
	 * @return void
	 */
	public function createVehicle(string $brand, string $sub_brand, string $v_type, string $model, string $color, int $capacity, string $year, string $origin) : void
	{
		$sql = "INSERT INTO vehicles VALUES (DEFAULT,UUID(),'$brand', '$sub_brand','$v_type','$model','$color',$capacity,STR_TO_DATE('$year','%Y-%m-%d'),'$origin')";
		$this->conn->query($sql);
	}
}
