<?php
require_once './models/Product.php';

class ProductsController
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $products = $this->productModel->getProducts();
        include './views/products/index.php';
    }

    public function error(): void
    {
        $error = $_GET['msg'];
        include './views/error.php';
    }

    public function delete(): void
    {
        if ($this->productModel->productHasSales($_GET['id'])) {
            header('Location: ./index.php?controller=ProductsController&action=error&msg=El producto tiene ventas registradas');
            return;
        }
        $id = $_GET['id'];
        $this->productModel->deleteProduct($id);
        header('Location: ./index.php?controller=ProductsController&action=index');
    }

    public function edit(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $exists = $_POST['product_exists'];
            $img_url = $_POST['product_image'];

            $this->productModel->updateProduct($id, $name, $price, $exists, $img_url);
            header("Location: index.php?controller=ProductsController&action=index");
        } else {
            $id = $_GET['id'];
            $product = $this->productModel->getProductById($id);
            include './views/products/edit.php';
        }
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $img_url = $_POST['product_image'];
            $exists = $_POST['product_exists'];

            $this->productModel->addProduct($name, $price, $exists, $img_url);
            header("Location: index.php?controller=ProductsController&action=index");
        } else {
            include './views/products/add.php';
        }
    }
}
