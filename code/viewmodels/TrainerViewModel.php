<?php
require_once 'models/Trainer.php';

class TrainerViewModel
{
    private $trainerModel;

    public function __construct()
    {
        $this->trainerModel = new Trainer();
    }

    public function getTrainerList()
    {
        return $this->trainerModel->getAll();
    }

    public function getTrainerById($id)
    {
        return $this->trainerModel->getById($id);
    }

    public function addTrainer($data)
    {
        return $this->trainerModel->create($data);
    }

    public function updateTrainer($id, $data)
    {
        return $this->trainerModel->update($id, $data);
    }

    public function deleteTrainer($id)
    {
        return $this->trainerModel->delete($id);
    }
}
