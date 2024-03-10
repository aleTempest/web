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

	public function getSubject(int $id) : Subject
	{
		$sql = "SELECT * FROM subject WHERE id = $id";
		$row = $this->conn->query($sql)->fetch_assoc();
		return new Subject($row['id_subject'],$row['subject_name']);
	}

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

	public function createSubject(string $name): void
	{
		$sql = "INSERT INTO subject (id_subject, subject_name) VALUES (DEFAULT,'$name')";
		$this->conn->query($sql);
	}

	public function deleteSubject(int $id): void
	{
		$sql = "DELETE FROM subject WHERE id_subject = $id";
		$this->conn->query($sql);
	}

	public function updateSubject(int $id, string $name): Array
	{
		$sql = "UPDATE subject SET name = '$name' WHERE id = $id";
		$res = $this->conn->query($sql);
		$subjects = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) 
		{
			$subject = new Subject($row['id_subject'],$row['subject_name']);
			$subjects[] = $subject;
		}
		return $subjects;
	}

	public function getSubjectByCareer(int $id_career) : Array
	{
		$sql = "SELECT id_subject,subject_name FROM subject_career_view WHERE id_career = $id_career";
		$res = $this->conn->query($sql);
		$subjects = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) 
		{
			$subject = new Subject($row['id_subject'],$row['subject_name']);
			$subjects[] = $subject;
		}
		return $subjects;
	}

	public function getSubjectByCareerName(string $career_name) : void
	{
		$sql = "SELECT id_subject,subject_name FROM subject_career_view WHERE career_name = '$career_name'";
		$this->conn->query($sql);
	}

	public function getCareersBySubject(int $id_subject) : Array
	{
		$sql = "SELECT id_career,career_name FROM subject_career_view WHERE id_subject = $id_subject";
		$res = $this->conn->query($sql);
		$careers = Array();
		while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$career = new Career($row['id_career'],$row['career_name']);
			$careers[] = $career;
		}
		return $careers;
	}
}
