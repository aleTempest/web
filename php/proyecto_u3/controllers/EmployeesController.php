<?php
require_once './models/Employee.php';
require_once './models/Sale.php';

class EmployeesController
{
    private Employee $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new Employee();
    }

    public function index(): void
    {
        $employees = $this->employeeModel->getEmployees();
        include './views/employees/index.php';
    }

    public function delete(): void
    {
        $salesModel = new Sale();
        // validar si el empleado tiene ventas
        if ($salesModel->employeeHasSales($_GET['id'])) {
            // en caso de tener ventas se muestra un error en pantalla
            header('Location: ./index.php?controller=EmployeesController&action=error&msg=El empleado tiene ventas registradas');
            return;
        }
        $id = $_GET['id'];
        $this->employeeModel->deleteEmployee($id);
        header('Location: ./index.php?controller=EmployeesController&action=index');
    }

    public function error(): void
    {
        $error = $_GET['msg'];
        include './views/error.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['employee_name'];
            $rfc = $_POST['rfc'];
            $email = $_POST['employee_email'];
            $phone = $_POST['employee_phone'];
            $this->employeeModel->updateEmployee($id, $name, $rfc, $email, $phone);
            header("Location: index.php");
        } else {
            $id = $_GET['id'];
            $employee = $this->employeeModel->getEmployeeById($id);
            include './views/employees/edit.php';
        }
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['employee_name'];
            $rfc = $_POST['rfc'];
            $email = $_POST['employee_email'];
            $phone = $_POST['employee_phone'];
            $this->employeeModel->addEmployee($name, $rfc, $email, $phone);
            header("Location: index.php");
        } else {
            include './views/employees/add.php';
        }
    }
}