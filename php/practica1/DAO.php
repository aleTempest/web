<?php
require_once 'objects.php';

interface studentDaoImpl {
    public function getAllStudents() : array;
    public function getStudent(int $id) : Student;
    public function createStudent(int $career, string $name, string $enrollment, string $email, int $age);
    public function updateStudent(int $career, string $name, string $enrollment, string $email, int $age);
    public function deleteStudent(int $id);
}

interface careerDaoImpl {
    public function getAllCareers() : array;
    public function getCareer(int $id);
    public function createCareer(string $name);
    public function updateCareer(string $name);
    public function deleteCareer(int $id);
}

// Esta clase es para interactuar con la base de datos, tanto consultas como DML
abstract class DAO {
    protected $conn;
    // Se realiza la conexión a la base de datos dentro del constructor
    public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname) {
        // TODO validar si password y dbname son nulo o no
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

class CareerDao extends DAO {
    public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname) {
        parent::__construct($servername,$username,$password,$dbname);
    }
}

class StudentDao extends DAO implements studentDaoImpl {
    public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname) {
        parent::__construct($servername,$username,$password,$dbname);
    }

    // Esta función hace fetch a la base de datos y crea objetos de tipo 'Student' para almacenarlos en un array y
    // después devolverlos
    public function getAllStudents(): array
    {
        $students = array();
        $sql = "SELECT * FROM students";
        $res = $this->conn->query($sql);
        // Recorrer fila por fila en el resultado de la query
        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
            $student = new Student($row['id_career'],$row['name'],$row['enrollment'],$row['email'],intval($row['age']));
            $students[] = $student;
        }
        return $students;
    }

    public function getStudent(int $id): Student
    {
        $sql = "SELECT * FROM students WHERE id = $id";
        $row = $this->conn->query($sql)->fetch_assoc();
        return new Student(
            $row['id_career'],
            $row['enrollment'],
            $row['name'],
            $row['email'],
            $row['age']
        );
    }

    public function createStudent(int $career, string $name, string $enrollment, string $email, int $age): void
    {
        $sql = "INSERT INTO students (name,id_career,enrollment,email,age) VALUES ('$name',$career,'$enrollment','$email',$age)";
        $this->conn->query($sql);
    }

    public function updateStudent(int $career, string $name, string $enrollment, string $email, int $age): void
    {
        $sql = "UPDATE students SET name = '$name', enrollment = '$enrollment', email = '$email', age = $age";
        $this->conn->query($sql);
    }

    public function deleteStudent(int $id)
    {
        $sql = "DELETE FROM students WHERE id = $id";
    }
}

$var = new StudentDAO("db","ale","elaina","unidad2");
// $var->updateStudent(1,"Ale","test","test",20);
$students = $var->getAllStudents();
foreach ($students as $student) {
    echo $student;
}
?>