<?php

/**
 * Clase abstracta DAO para interactuar con la base de datos.
 */
abstract class DAO
{
	/**
	 * @var mysqli $conn La conexión a la base de datos.
	 */
	protected $conn;

	/**
	 * Constructor de la clase DAO.
	 * 
	 * @param string $servername El nombre del servidor de la base de datos.
	 * @param string $username El nombre de usuario para acceder a la base de datos.
	 * @param string $password La contraseña para acceder a la base de datos.
	 * @param string $dbname El nombre de la base de datos a la que se desea conectar.
	 */
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		// Se establece la conexión con la base de datos 
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}

	/**
	 * Obtiene el último ID insertado en la base de datos.
	 * 
	 * @return int El último ID insertado.
	 */
	public function getLastInsertedId(): int
	{
		$sql = "SELECT LAST_INSERT_ID() as id";
		$res = $this->conn->query($sql)->fetch_assoc();
		return $res['id'];
	}
}
