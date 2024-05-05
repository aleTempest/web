<?php


require_once 'Connection.php';

class UserModel
{
    private Connection $conn;
    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function userExists(string $username, string $password): bool
    {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
        return $this->conn->connect()->query($query)->num_rows > 0;
    }

    /*
     * Obtener todos los usuarios de la tabla `users`
     * */
    public function getUsers(): \mysqli_result|bool
    {
        $query = "SELECT * FROM users";
        return $this->conn->connect()->query($query);
    }

    /*
     * Obtener un usuario de la tabla `users`, limitado a un solo resultado
     * */
    public function getUser(int $id): array
    {
        $query = "SELECT * FROM users WHERE id_user = $id LIMIT 1";
        return $this->conn->connect()->query($query)->fetch_assoc();
    }

    /*
     * Crear un nuevo usuario
     * */
    public function createUser(
        string $username, string $password, string $email, string $enrollment, string $phoneNumber, string $date,
        string $type
    ): bool
    {
        $query = "
            INSERT INTO users (id_user,username, password, enrollment, phone_number, email, birth, type) VALUES 
                (DEFAULT,'$username', '$password', '$enrollment', '$phoneNumber', '$email', '$date', '$type')
            ";
        return $this->conn->connect()->query($query);
    }

    /*
     * Actualizar un nuevo usuario por id
     * */
    public function updateUser(
        int $id, string $username, string $password, string $email, string $enrollment, string $phoneNumber,
        string $date, bool $type
    ): bool
    {
        $query = "
            UPDATE users SET 
                username = '$username', password = '$password', email = '$email', enrollment = '$enrollment', 
                phone_number = '$phoneNumber', date = '$date', type = '$type'
            WHERE id = $id
            ";
        return $this->conn->connect()->query($query);
    }

    /*
     * Eliminar un nuevo usuario por id
     * */
    public function deleteUser(int $id): bool
    {
        $query = "DELETE FROM users WHERE id_user = $id";
        return $this->conn->connect()->query($query);
    }
}