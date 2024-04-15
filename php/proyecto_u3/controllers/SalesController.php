<?php
require_once './models/Sale.php';
require_once './models/Product.php';
require_once './models/Employee.php';

class SalesController
{
    private Sale $saleModel;

    public function __construct()
    {
        $this->saleModel = new Sale();
    }

    public function index(): void
    {
        $sales = $this->saleModel->getSales();
        include './views/sales/index.php';
    }

    public function top(): void
    {
        $products = $this->saleModel->getTop(5);
        include './views/sales/top.php';
    }

    public function today(): void
    {
        $sales = $this->saleModel->getSalesByToday();
        include './views/sales/index.php';
    }

    public function dateRange(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['range_filter'])) {
                $start = $_POST['start'];
                $end = $_POST['end'];
                $sales = $this->saleModel->getSalesByRange($start, $end);
                include './views/sales/index.php';
            }
        } else {
            include './views/sales/date_range_form.php';
        }
    }

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->saleModel->deleteSale($id);
        header('Location: ./index.php?controller=SalesController&action=index');
    }

    public function edit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_sale = $_POST['id'];
            $id_employee = $this->saleModel->getEmployeeIdBySaleId($id_sale);
            $this->saleModel->deleteSales($id_sale); // resetear ventas
            if (isset($_POST['products']) && is_array($_POST['products'])) {
                if (isset($_POST['product_ids'], $_POST['products']) && is_array($_POST['product_ids']) && is_array($_POST['products'])) {
                    $id_employee = $_POST['id_employee'];
                    $product_ids = $_POST['product_ids'];
                    $quantities = $_POST['products'];
                    $this->saleModel->addSale($id_employee, '');
                    $id_sale = $this->saleModel->getLastInserted();

                    if (count($product_ids) === count($quantities)) {
                        $num_products = count($product_ids);
                        for ($i = 0; $i < $num_products; $i++) {
                            $id_producto = $product_ids[$i];
                            $cantidad = $quantities[$i];
                            for ($j = 0; $j < $cantidad; $j++) {
                                $this->saleModel->addProductSale($id_sale, $id_producto);
                            }
                        }
                        header("Location: index.php?controller=SalesController&action=index");
                    } else {
                        echo 'Error con los arrays';
                    }
                }
            }
        } else {
            $id = $_GET['id'];
            $id_employee = $this->saleModel->getEmployeeIdBySaleId($id);
            $employeeModel = new Employee();
            $employees = $employeeModel->getEmployees();
            $productModel = new Product();
            $products_old = $this->saleModel->getSalesById($id);
            $products_new = $productModel->getProducts();
            include './views/sales/edit.php';
        }
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['products']) && is_array($_POST['products'])) {
                if (isset($_POST['product_ids'], $_POST['products']) && is_array($_POST['product_ids']) && is_array($_POST['products'])) {
                    $id_employee = $_POST['id_employee'];
                    $product_ids = $_POST['product_ids'];
                    $quantities = $_POST['products'];
                    $this->saleModel->addSale($id_employee, '');
                    $id_sale = $this->saleModel->getLastInserted();

                    if (count($product_ids) === count($quantities)) {
                        $num_products = count($product_ids);
                        for ($i = 0; $i < $num_products; $i++) {
                            $id_producto = $product_ids[$i];
                            $cantidad = $quantities[$i];
                            for ($j = 0; $j < $cantidad; $j++) {
                                $this->saleModel->addProductSale($id_sale, $id_producto);
                            }
                        }
                        header("Location: index.php?controller=SalesController&action=index");
                    } else {
                        echo 'Error con los arrays';
                    }
                }
            }
        } else {
            $productModel = new Product();
            $employeeModel = new Employee();
            $employees = $employeeModel->getEmployees();
            $products = $productModel->getProducts();
            include './views/sales/add.php';
        }
    }
}
