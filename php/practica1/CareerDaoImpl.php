<?php
interface careerDaoImpl {
    public function getAllCareers() : Array;
    public function getCareer(int $id);
    public function createCareer(string $name);
    public function updateCareer(int $id, string $name);
    public function deleteCareer(int $id);
}
