<?php
require_once 'models/Region.php';

class RegionViewModel
{
    private $regionModel;

    public function __construct()
    {
        $this->regionModel = new Region();
    }

    public function getRegionList()
    {
        return $this->regionModel->getAll();
    }

    public function getRegionById($id)
    {
        return $this->regionModel->getById($id);
    }

    public function addRegion($data)
    {
        return $this->regionModel->create($data);
    }

    public function updateRegion($id, $data)
    {
        return $this->regionModel->update($id, $data);
    }

    public function deleteRegion($id)
    {
        return $this->regionModel->delete($id);
    }
}
