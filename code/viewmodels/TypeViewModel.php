<?php
require_once 'models/Type.php';

class TypeViewModel
{
    private $typeModel;

    public function __construct()
    {
        $this->typeModel = new Type();
    }

    public function getTypeList()
    {
        return $this->typeModel->getAll();
    }

    public function getTypeById($id)
    {
        return $this->typeModel->getById($id);
    }

    public function addType($data)
    {
        return $this->typeModel->create($data);
    }

    public function updateType($id, $data)
    {
        return $this->typeModel->update($id, $data);
    }

    public function deleteType($id)
    {
        return $this->typeModel->delete($id);
    }
}
