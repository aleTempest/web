<?php
class Student {
    private int $id;
    private int $id_career;
    private string $name;
    private string $enrollment;
    private string $email;
    private int $age;

    public function __construct(int $id, int $id_career, string $name, string $enrollment, string $email, int $age) {
        $this->id = $id;
        $this->id_career = $id_career;
        $this->name = $name;
        $this->enrollment = $enrollment;
        $this->email = $email;
        $this->age = $age;
    }

    public function toMap(): Array {
        return Array(
            "enrollment" => $this->enrollment,
            "name" => $this->name,
            "email" => $this->email,
            "age" => $this->age
        );
    }

    public function __toString(): string
    {
        return  $this->enrollment . "," . $this->name . "," . $this->email . "," . $this->age;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getEnrollment() : string {
        return $this->enrollment;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getAge() : int {
        return $this->age;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdCareer(): int
    {
        return $this->id_career;
    }
}

