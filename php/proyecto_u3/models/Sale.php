<?php
require_once './models/Conection.php';

class Sale
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Conn();
    }

    public function getSales(): mysqli_result
    {
        $query = "SELECT * FROM venta_fecha_view";
        return $this->conn->connect()->query($query);
    }

    public function getSalesById(int $id): mysqli_result
    {
        $query = "SELECT * FROM venta_cantidad_view WHERE id_venta = $id";
        return $this->conn->connect()->query($query);
    }

    public function deleteSale(int $id): void
    {
        $query = "DELETE FROM venta  WHERE id_venta = $id";
        $this->conn->connect()->query($query);
    }

    public function deleteSales(int $id): void
    {
        $query = "DELETE FROM venta_producto WHERE id_venta = $id";
        $this->conn->connect()->query($query);
    }

    public function updateSale(int $id, string $name, float $price, bool $exists, string $img_url): void
    {
        $query = "UPDATE ventas SET nombre = '$name', precio = $price, existencia = $exists, img_url = '$img_url' WHERE id_venta = $id";
        $this->conn->connect()->query($query);
    }

    public function addSale(int $id_employee, string $sale_date): void
    {
        // si la fecha esta vacía se inserta un valor por defecto
        $date = empty($sale_date) ? 'DEFAULT' : $sale_date;
        $query = "INSERT INTO venta (id_empleado, fecha) VALUES ($id_employee, $date)";
        $this->conn->connect()->query($query);
    }

    public function addProductSale(int $id_venta, int $id_product): void
    {
        $query = "INSERT INTO venta_producto (id_venta, id_producto) VALUES ($id_venta, $id_product)";
        $this->conn->connect()->query($query);
    }

    public function getLastInserted(): int
    {
        $query = "SELECT MAX(id_venta) as id FROM venta";
        return $this->conn->connect()->query($query)->fetch_assoc()['id'];
    }

    public function getSalesByToday(): mysqli_result
    {
        $query = "SELECT * FROM venta_fecha_view WHERE fecha = CURDATE()";
        return $this->conn->connect()->query($query);
    }

    public function getSalesByRange(string $start, string $end): mysqli_result
    {
        $query = "SELECT * FROM venta_fecha_view WHERE fecha BETWEEN '$start' AND '$end'";
        return $this->conn->connect()->query($query);
    }

    public function getTop(int $limit): mysqli_result
    {
        $query = "SELECT nombre_producto, SUM(cantidad) as cantidad FROM venta_cantidad_view GROUP BY nombre_producto ORDER BY cantidad DESC LIMIT 5";
        return $this->conn->connect()->query($query);
    }

    public function employeeHasSales(int $id): bool
    {
        $query = "SELECT * FROM empleado_venta_view WHERE id_empleado = $id";
        return $this->conn->connect()->query($query)->num_rows > 0;
    }

    public function getEmployeeIdBySaleId(int $id): int
    {
        $query = "SELECT id_empleado FROM venta WHERE id_venta = $id";
        return $this->conn->connect()->query($query)->fetch_assoc()['id_empleado'];
    }
}
