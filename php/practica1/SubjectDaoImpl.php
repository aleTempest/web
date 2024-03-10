<?php
interface SubjectDaoImpl {
    public function getSubject(int $id) : Subject;
    public function getAllSubjects() : Array;
    public function createSubject(string $name) : void;
    public function deleteSubject(int $id) : void;
    public function updateSubject(int $id, string $name) : Array;
    public function getSubjectByCareer(int $id_career) : Array;
}
