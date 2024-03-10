<?php
require_once 'DAO.php';
require 'Student.php';
require 'StudentDaoImpl.php';

class StudentDao extends DAO implements StudentDaoImpl {
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	/**
	 * Retorna un arreglo con objetos de tipo Student en base a los alumnos registrados en la base de datos en la tabla
	 * students
	 * @return Array<Student>
	 **/
	public function getAllStudents(): Array
	{
		$students = array();
		$sql = "SELECT * FROM students_career_view";
		$res = $this->conn->query($sql);
		// Recorrer fila por fila en el resultado de la query
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			$student = new Student($row['id'], $row['id_career'],$row['name'],$row['enrollment'],$row['email'],intval($row['age']),$row['career_name']);
			$students[] = $student;
		}
		return $students;
	}

	/**
	 * Obtiene un estudiante por su ID.
	 *
	 * @param int $id El ID del estudiante a recuperar.
	 * @return Student El objeto Student correspondiente al ID proporcionado.
	 */
	public function getStudent(int $id): Student
	{
		$sql = "SELECT * FROM students_career_view WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return new Student(
			$row['id'],
			$row['id_career'],
			$row['enrollment'],
			$row['name'],
			$row['email'],
			$row['age'],
			$row['id_career']
		);
	}

	/**
	 * Crea un nuevo estudiante en la base de datos.
	 * @param int $id_career El ID de la carrera del estudiante.
	 * @param string $name El nombre del estudiante.
	 * @param string $enrollment El número de matrícula del estudiante.
	 * @param string $email El correo electrónico del estudiante.
	 * @param int $age La edad del estudiante.
	 * @return void
	 */
	public function createStudent(int $id_career, string $name, string $enrollment, string $email, int $age): void
	{
		$sql = "INSERT INTO students (name,id_career,enrollment,email,age) VALUES ('$name',$id_career,'$enrollment','$email',$age)";
		$this->conn->query($sql);
	}

	/**
	 * Actualiza los detalles de un estudiante en la base de datos.
	 *
	 * @param int $id_career El ID de la carrera del estudiante.
	 * @param string $name El nombre actualizado del estudiante.
	 * @param string $enrollment El número de matrícula actualizado del estudiante.
	 * @param string $email El correo electrónico actualizado del estudiante.
	 * @param int $age La edad actualizada del estudiante.
	 * @return void
	 */
	public function updateStudent(int $id, int $id_career, string $name, string $enrollment, string $email, int $age): void
	{
		$sql = "UPDATE students SET name = '$name', enrollment = '$enrollment', email = '$email', age = $age, id_career = $id_career WHERE id = $id";
		$this->conn->query($sql);
	}

	/**
	 * Elimina un estudiante de la base de datos por su ID.
	 *
	 * @param int $id El ID del estudiante a eliminar.
	 * @return void
	 */
	public function deleteStudent(int $id): void
	{
		$sql = "DELETE FROM students WHERE id = $id";
		$this->conn->query($sql);
	}
}

/*$dao = new StudentDAO("db","ale","elaina","unidad2");
$students = $dao->getAllStudents();
foreach ($students as $student) {
		echo nl2br($student . "\n");
}*/
