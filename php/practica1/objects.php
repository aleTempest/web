<?php
class Student {
    private int $id;
    private string $name;
    private string $enrollment;
    private string $email;
    private int $age;

    public function __construct(int $id, string $name, string $enrollment, string $email, int $age) {
        $this->id = $id;
        $this->name = $name;
        $this->enrollment = $enrollment;
        $this->email = $email;
        $this->age = $age;
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
}

class career {
    private string $name;
    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }
}
?>