<?php
require_once './models/Conection.php';

class Product
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function getProducts(): mysqli_result
    {
        $query = "SELECT * FROM productos";
        return $this->conn->connect()->query($query);
    }

    public function getProductsQuantity(): mysqli_result
    {
        $query = "SELECT * FROM venta_cantidad_view";
        return $this->conn->connect()->query($query);
    }

    public function getProductById(int $id): array
    {
        $query = "SELECT * FROM productos WHERE id_producto = $id";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }

    public function deleteProduct(int $id): void
    {
        $query = "DELETE FROM productos WHERE id_producto = $id";
        $this->conn->connect()->query($query);
    }

    public function updateProduct(int $id, string $name, float $price, bool $exists, string $img_url): void
    {
        $query = "UPDATE productos SET nombre = '$name', precio = $price, existencia = $exists, img_url = '$img_url' WHERE id_producto = $id";
        $this->conn->connect()->query($query);
    }

    public function addProduct(string $name, float $price, bool $exists, string $img_url): void
    {
        $query = "INSERT INTO productos (nombre, precio, existencia, img_url) VALUES ('$name', $price, $exists, '$img_url')";
        $this->conn->connect()->query($query);
    }

    public function productHasSales(int $id): bool
    {
        $query = "SELECT * FROM venta_cantidad_view WHERE id_producto = $id";
        return $this->conn->connect()->query($query)->num_rows > 0;
    }
}
