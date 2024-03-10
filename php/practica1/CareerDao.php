<?php
require_once 'DAO.php';
require 'CareerDaoImpl.php';
require_once 'Career.php';

class CareerDao extends DAO implements CareerDaoImpl {
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	/**
	 * Obtiene todas las carreras almacenadas en la base de datos.
	 *
	 * @return array Arreglo de objetos de tipo Career.
	 */
	public function getAllCareers(): array
	{
		$careers = Array();
		$sql = "SELECT * FROM careers";
		$res = $this->conn->query($sql);
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			$career = new Career($row['id_career'],$row['name']);
			$careers[] = $career;
		}
		return $careers;
	}

	/**
	 * Obtiene una carrera específica por su ID.
	 *
	 * @param int $id ID de la carrera a obtener.
	 * @return Career Objeto de tipo Career.
	 */
	public function getCareer(int $id)
	{
		$sql = "SELECT * FROM careers WHERE id_career = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return new Career($row['id_career'],$row['name']);
	}

	/**
	 * Crea una nueva carrera en la base de datos.
	 *
	 * @param string $name Nombre de la carrera a crear.
	 */
	public function createCareer(string $name)
	{
		$sql = "INSERT INTO careers VALUES (DEFAULT,'$name')";
		$this->conn->query($sql);
	}

	/**
	 * Actualiza el nombre de una carrera existente en la base de datos.
	 *
	 * @param int $id   ID de la carrera a actualizar.
	 * @param string $name Nuevo nombre para la carrera.
	 */
	public function updateCareer(int $id, string $name)
	{
		$sql = "UPDATE careers SET name = '$name' WHERE id_career = $id";
		$this->conn->query($sql);
	}

	/**
	 * Elimina una carrera de la base de datos.
	 *
	 * @param int $id ID de la carrera a eliminar.
	 */
	public function deleteCareer(int $id)
	{
		$sql = "DELETE FROM careers WHERE id_career = $id";
		$this->conn->query($sql);
	}
}
