<?php
require_once 'DAO.php';
require_once 'Catalog.php';

class CatalogDao extends DAO
{
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	private function catalogFactory(Array $row) : Catalog
	{
		$id = $row['id'];
		$desc = $row['cat_desc'];
		$cost = $row['cost'];
		return new Catalog($id,$desc,$cost);
	}

	public function getItem(int $id) : Catalog
	{
		$sql = "SELECT * FROM catalog WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return $this->catalogFactory($row);
	}

	public function getAllItems() : Array
	{
		$sql = "SELECT * FROM catalog";
		$res = $this->conn->query($sql);
		$items = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$items[] = $this->catalogFactory($row);
		}
		return $items;
	}

	public function createItem(string $desc, float $cost) : void
	{
		$sql = "INSERT INTO catalog VALUES (DEFAULT,'$desc',$cost)";
		$this->conn->query($sql);
	}

	public function deleteItem(int $id) : void
	{
		$sql = "DELETE FROM catalog WHERE id = $id";
		$this->conn->query($sql);
	}

	public function updateItem(int $id, string $desc, float $cost) : void
	{
		$sql = "UPDATE catalog SET cat_desc = '$desc', cost = $cost WHERE id = $id";
		$this->conn->query($sql);
	}
}
