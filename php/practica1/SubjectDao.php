<?php
require_once 'DAO.php';
require_once 'SubjectDaoImpl.php';
require_once 'CareerDao.php';
include 'Subject.php';

class SubjectDao extends DAO implements SubjectDaoImpl {
	public function __construct(protected string $servername, protected string $username, protected string $password, protected string $dbname)
	{
		parent::__construct($servername,$username,$password,$dbname);
	}

	/**
	 * Obtiene una materia por su ID.
	 * 
	 * @param int $id El ID de la materia.
	 * @return Subject La materia obtenida.
	 */
	public function getSubject(int $id) : Subject
	{
		$sql = "SELECT * FROM subject WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return new Subject($row['id_subject'],$row['subject_name']);
	}

	/**
	 * Obtiene todas las materias.
	 * 
	 * @return array Un array de objetos Subject que representan todas las materias.
	 */
	public function getAllSubjects(): array
	{
		$sql = "SELECT * FROM subject";
		$res = $this->conn->query($sql);
		$subjects = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			$subject = new Subject($row['id_subject'],$row['subject_name']);
			$subjects[] = $subject;
		}
		return $subjects;
	}

	/**
	 * Crea una nueva materia en la base de datos.
	 * 
	 * @param string $name El nombre de la nueva materia.
	 * @return void
	 */
	public function createSubject(string $name): void {
		$sql = "INSERT INTO subject (id_subject, subject_name) VALUES (DEFAULT, '$name')";
		$this->conn->query($sql);
	}

	/**
	 * Elimina una materia de la base de datos por su ID.
	 * 
	 * @param int $id El ID de la materia a eliminar.
	 * @return void
	 */
	public function deleteSubject(int $id): void {
		// Prepara y ejecuta la consulta SQL para eliminar una materia por su ID.
		$sql = "DELETE FROM subject WHERE id_subject = $id";
		$this->conn->query($sql);
	}

	/**
	 * Elimina una materia de la base de datos y sus relaciones con las carreras.
	 * 
	 * @param int $id_subject El ID de la materia a eliminar.
	 * @param bool $omit Indica si se debe omitir la eliminación en cascada.
	 * @return void
	 */
	public function deleteSubjectCareer(int $id_subject, bool $omit): void {
		$sql1 = "DELETE FROM subject_career WHERE id_subject = $id_subject";
		$this->conn->query($sql1);
		$sql2 = "DELETE FROM subject WHERE id_subject = $id_subject";
		$this->conn->query($sql2);
	}

	/**
	 * Elimina las relaciones entre una materia y las carreras por el ID de la carrera.
	 * 
	 * @param int $id_career El ID de la carrera.
	 * @return void
	 */
	public function deleteSubjectCareerByCareer(int $id_career): void {
		$sql = "DELETE FROM subject_career WHERE id_career = $id_career";
		$this->conn->query($sql);
	}

	/**
	 * Actualiza el nombre de una materia en la base de datos por su ID.
	 * 
	 * @param int $id El ID de la materia a actualizar.
	 * @param string $name El nuevo nombre de la materia.
	 * @return array Un array de objetos Subject que representan las materias actualizadas.
	 */
	public function updateSubject(int $id, string $name): array {
		$sql = "UPDATE subject SET subject_name = '$name' WHERE id_subject = $id";
		$res = $this->conn->query($sql);
		$subjects = array();
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$subject = new Subject($row['id_subject'], $row['subject_name']);
			$subjects[] = $subject;
		}
		return $subjects;
	}

	/**
	 * Obtiene las materias asociadas a una carrera por su ID.
	 * 
	 * @param int $id_career El ID de la carrera.
	 * @return array Un array de objetos Subject que representan las materias asociadas a la carrera.
	 */
	public function getSubjectByCareer(int $id_career): array {
		$sql = "SELECT id_subject, subject_name FROM subject_career_view WHERE id_career = $id_career";
		$res = $this->conn->query($sql);
		$subjects = array();
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$subject = new Subject($row['id_subject'], $row['subject_name']);
			$subjects[] = $subject;
		}
		return $subjects;
	}

	/**
	 * Obtiene las carreras asociadas a una materia por su ID.
	 * 
	 * @param int $id_subject El ID de la materia.
	 * @return array Un array de objetos Career que representan las carreras asociadas a la materia.
	 */
	public function getCareersBySubject(int $id_subject): array {
		$sql = "SELECT id_career, career_name FROM subject_career_view WHERE id_subject = $id_subject";
		$res = $this->conn->query($sql);
		$careers = array();
		while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
			$career = new Career($row['id_career'], $row['career_name']); // Suponiendo que existe una clase Career para representar las carreras.
			$careers[] = $career;
		}
		return $careers;
	}

	/**
	 * Asocia una carrera a una materia en la base de datos.
	 * 
	 * @param int $id_subject El ID de la materia.
	 * @param int $id_career El ID de la carrera.
	 * @return void
	 */
	public function addCareer(int $id_subject, int $id_career): void {
		$sql = "INSERT INTO subject_career (id_subject, id_career) VALUES ($id_subject, $id_career)";
		$this->conn->query($sql);
	}

	public function getStudentSubjects(int $id): Array
	{
		$sql = "SELECT * FROM student_subject_score_view WHERE id = $id";
		$res = $this->conn->query($sql);
		$arr_aux = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$arr_aux[] = Array( // Esto debería ser un objeto pero no me dio tiempo a implementarlo.
				"id_subject" => $row['id_subject'],
				"subject_name" => $row['subject_name'],
				"score_id" => $row['score_id'],
				"score" => $row['score']
			);
		}
		return $arr_aux;
	}
}
