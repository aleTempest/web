<?php
class SubjectStudent {
    private int $id;
    private int $id_student;
    private int $id_career;
    private float $score;

    /**
     * @param int $id
     * @param int $id_student
     * @param int $id_career
     * @param float $score
     */
    public function __construct(int $id, int $id_student, int $id_career, float $score)
    {
        $this->id = $id;
        $this->id_student = $id_student;
        $this->id_career = $id_career;
        $this->score = $score;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdStudent(): int
    {
        return $this->id_student;
    }

    public function getIdCareer(): int
    {
        return $this->id_career;
    }

    public function getScore(): float
    {
        return $this->score;
    }
}