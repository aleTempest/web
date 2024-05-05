<?php

require_once '../models/UserModel.php';

class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Esta función valida si el usuario ha iniciado sesión o no
     **/
    public function validateCredentials(): bool
    {
        $user_model = new UserModel();
        if ($user_model->userExists($_SESSION['username'], $_SESSION['password'])) {
            return true;
        }
        return false;
    }

    public function index(): void
    {
        $users = $this->userModel->getUsers();
        include '../views/users/index.php';
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validar que ningun campo esté vacío
            if (!empty($username) && !empty($password)) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                // Validar que el usuario exista en la base de datos
                if ($this->validateCredentials()) {
                    $_SESSION['ok'] = true; // flag para validar la sesión
                }
            }
            include '../views/dashboard.php';
        } else include '../views/login.php';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $enrollment = $_POST['enrollment'];
            $type = $_POST['type'] == 0 ? 'student' : 'teacher';

            if ($this->userModel->createUser($username, $password, $email, $enrollment, $phone, $date, $type))
                echo 'usuario agregado';
            else echo 'error';
            // TODO validar si el usuario ya existe
        } else include '../views/register.php';
    }

    public function delete(): void
    {
        // TODO validar que no se pueda eliminar el usuario de la sesión
        $id = $_GET['id'];
        if ($this->userModel->deleteUser($id)) echo 'usuario eliminado';
        else echo 'error';
    }

    public function update(): void
    {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $enrollment = $_POST['enrollment'];
            $type = $_POST['type'];

        } else {
            $user = $this->userModel->getUser($id);
            include '../views/users/update.php';
        }
    }
}
