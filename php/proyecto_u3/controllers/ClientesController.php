<?php
require_once './models/clientes.php';

class ClientesController
{
    private Cliente $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }
    //Mostrar la lista de clientes
    public function index(): void
    {
        $clientes = $this->clienteModel->getClientes();
        include './views/clientes/index.php';
    }
    // Eliminar un cliente

    public function delete(): void
    {
        $id = $_GET['id'];
        $this->clienteModel->deleteCliente($id);
        header('Location: ./index.php?controller=ClientesController&action=index');
    }
    // Editar un cliente
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['cliente_name'];
            $apellido = $_POST['cliente_apellido'];
            $email = $_POST['cliente_email'];
            $phone = $_POST['cliente_telefono'];
            $this->clienteModel->updateCliente($id, $name, $apellido, $email, $phone);
            header("Location: ./index.php?controller=ClientesController&action=index");
        } else {
            $id = $_GET['id'];
            $cliente = $this->clienteModel->getClienteById($id);
            include './views/clientes/edit.php';
        }
    }
    // Agregar un nuevo cliente
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['cliente_name'];
            $apellido = $_POST['cliente_apellido'];
            $email = $_POST['cliente_email'];
            $phone = $_POST['cliente_telefono'];
            $this->clienteModel->addCliente( $name, $apellido, $email, $phone);
            header("Location: ./index.php?controller=ClientesController&action=index");
        } else {
            include './views/clientes/add.php';
        }
    }
}
