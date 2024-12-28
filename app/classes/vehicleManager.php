<?php
require_once 'vehicleBase.php';
require_once 'vehicleActions.php';
require_once 'fileHandler.php';
class vehicleManager extends vehicleBase implements vehicleActions
{
    use fileHandler;
    public function addVehicle($data)
    {
        $vehicles = $this->readFile();
        $vehicles[] = $data;
        $this->writeFile($vehicles);
    }
    public function editVehicle($id, $data)
    {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeFile($vehicles);
        }
    }
    public function deleteVehicle($id)
    {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->writeFile(array_values($vehicles));
        }
    }
    public function getVehicles()
    {
        return $this->readFile();
    }
    public function getDetails()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
