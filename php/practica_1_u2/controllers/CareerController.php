<?php
require_once '../models/CareerModel.php';

class CareerController
{
    private CareerModel $careerModel;

    public function __construct()
    {
        $this->careerModel = new CareerModel();
    }

    public function index(): void
    {
        $careers = $this->careerModel->getCareers();
        include '../views/careers/index.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['career_name'];
            if ($this->careerModel->createCareer($name)) {
                echo 'asies';
            } else {
                echo 'error';
            }
        } else {
            include '../views/careers/create.php';
        }
    }

    public function update(): void
    {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['career_name'];
            if ($this->careerModel->updateCareer($id, $name)) {
                echo 'asies';
            } else {
                echo 'error';
            }
        } else {
            $career = $this->careerModel->getCareer($id);
            include '../views/careers/update.php';
        }
    }

    public function delete(): void
    {
        $id = $_GET['id'];
        if ($this->careerModel->deleteCareer($id)) {
            echo 'asies';
        } else {
            echo 'error';
        }
    }
}
