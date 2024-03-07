<?php
interface StudentDaoImpl {
    public function getAllStudents() : Array;
    public function getStudent(int $id) : Student;
    public function createStudent(int $id_career, string $name, string $enrollment, string $email, int $age);
    public function updateStudent(int $id, int $id_career, string $name, string $enrollment, string $email, int $age);
    public function deleteStudent(int $id);
}
