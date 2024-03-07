<?php
class Student {
    private int $id;
    private int $id_career;
    private string $career_name;
    private string $name;
    private string $enrollment;
    private string $email;
    private int $age;

    public function __construct(int $id, int $id_career, string $name, string $enrollment, string $email, int $age, string $career_name) {
        $this->id = $id;
        $this->id_career = $id_career;
        $this->name = $name;
        $this->enrollment = $enrollment;
        $this->email = $email;
        $this->age = $age;
        $this->career_name = $career_name;
    }

    public function toMap(): Array {
        return Array(
            "enrollment" => $this->enrollment,
            "name" => $this->name,
            "email" => $this->email,
            "age" => $this->age,
            "career" => $this->career_name
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

    public function getCareerName(): string
    {
        return $this->career_name;
    }
}

