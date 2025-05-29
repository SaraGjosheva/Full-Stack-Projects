<?php

namespace VehicleRegistration\Classes\Models;

use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Redirector\Redirector;

use PDO;
use VehicleRegistration\Classes\Session\SessionManager;

class Vehicle
{
    private int $id;
    private string $vehicleModel;
    private string $vehicleType;
    private string $vehicleChassisNumber;
    private string $vehicleProductionYear;
    private string $registrationNumber;
    private string $fuelType;
    private string $registrationTill;

    public function __construct(string $vehicleModel, string $vehicleType, string $vehicleChassisNumber, string $vehicleProductionYear, string $registrationNumber, string $fuelType, string $registrationTill)
    {
        $this->vehicleModel = $vehicleModel;
        $this->vehicleType = $vehicleType;
        $this->vehicleChassisNumber = $vehicleChassisNumber;
        $this->vehicleProductionYear = $vehicleProductionYear;
        $this->registrationNumber = $registrationNumber;
        $this->fuelType = $fuelType;
        $this->registrationTill = $registrationTill;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setVehicleModel(string $vehicleModel): void
    {
        $this->vehicleModel = $vehicleModel;
    }

    public function setVehicleType(string $vehicleType): void
    {
        $this->vehicleType = $vehicleType;
    }

    public function setVehicleChassisNumber(string $vehicleChassisNumber): void
    {
        $this->vehicleChassisNumber = $vehicleChassisNumber;
    }

    public function setVehicleProductionYear(string $vehicleProductionYear): void
    {
        $this->vehicleProductionYear = $vehicleProductionYear;
    }

    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function setFuelType(string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    public function setRegistrationTill(string $registrationTill): void
    {
        $this->registrationTill = $registrationTill;
    }

    // Getters
    public function getVehicleId(): int
    {
        return $this->id;
    }

    public function getVehicleModel(): string
    {
        return $this->vehicleModel;
    }

    public function getVehicleType(): string
    {
        return $this->vehicleType;
    }

    public function getVehicleChassisNumber(): string
    {
        return $this->vehicleChassisNumber;
    }

    public function getVehicleProductionYear(): string
    {
        return $this->vehicleProductionYear;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    public function getRegistrationTill(): string
    {
        return $this->registrationTill;
    }

    private function getChassis()
    {
        $db = DatabaseHelper::getConnection();
        $query = $db->prepare('SELECT `chassis_number` FROM `vehicle` WHERE `chassis_number`= :chassis');
        $query->bindParam(':chassis', $this->vehicleChassisNumber, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }
    private function getPlate()
    {
        $db = DatabaseHelper::getConnection();
        $query = $db->prepare('SELECT `registration_number` FROM `vehicle` WHERE `registration_number`= :plate');
        $query->bindParam(':plate', $this->registrationNumber, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    public function getRegistrationTillDate()
    {
        $db = DatabaseHelper::getConnection();
        $query = $db->prepare('SELECT `registration_till` FROM `vehicle`');
        $query->execute();
        return $query->fetchAll();
    }

    public function store()
    {
        $vehicleData = [
            'vehicleType' => $this->vehicleType,
            'vehicleChassisNumber' => $this->vehicleChassisNumber,
            'vehicleProductionYear' => $this->vehicleProductionYear,
            'registrationNumber' => $this->registrationNumber,
            'fuelType' => $this->fuelType,
            'registrationTill' => $this->registrationTill,
            'vehicleModel' => $this->vehicleModel
        ];

        $chassisData = $this->getChassis();
        $plateData = $this->getPlate();

        if ($chassisData) {
            SessionManager::set('error8', 'Chassis Number already exist.');
            return Redirector::redirect('../../public/dashboard');
        } elseif ($plateData) {
            SessionManager::set('error9', 'Registration Number already exist.');
            return Redirector::redirect('../../public/dashboard');
        } else {
            $db = DatabaseHelper::getConnection();
            $query = $db->prepare('INSERT INTO `vehicle`(`vehicle_type_id`, `chassis_number`, `production_year`, `registration_number`, `fuel_type_id`, `registration_till`, `vehicle_model_id`) VALUES (:vehicleType,:vehicleChassisNumber,:vehicleProductionYear,:registrationNumber,:fuelType,:registrationTill,:vehicleModel)');
            $query->execute($vehicleData);
            SessionManager::set('success', 'Vehicle added successfully.');
            DatabaseHelper::closeConnection();
        }
    }

    public function update()
    {
        $db = DatabaseHelper::getConnection();
        $vehicleData = [
            'id' => $this->id,
            'vehicleType' => $this->vehicleType,
            'vehicleChassisNumber' => $this->vehicleChassisNumber,
            'vehicleProductionYear' => $this->vehicleProductionYear,
            'registrationNumber' => $this->registrationNumber,
            'fuelType' => $this->fuelType,
            'registrationTill' => $this->registrationTill,
            'vehicleModel' => $this->vehicleModel
        ];
        $query = $db->prepare('UPDATE `vehicle` SET `vehicle_type_id`=:vehicleType,`chassis_number`=:vehicleChassisNumber,`production_year`=:vehicleProductionYear,`registration_number`=:registrationNumber,`fuel_type_id`=:fuelType,`registration_till`=:registrationTill,`vehicle_model_id`=:vehicleModel WHERE id=:id');
        $query->execute($vehicleData);
        $_SESSION['success'] = 'Vehicle updated successfully';
        DatabaseHelper::closeConnection();
    }

    public function delete($id)
    {
        $db = DatabaseHelper::getConnection();
        $query = $db->prepare('DELETE FROM `vehicle` WHERE id=:id');
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delete'] = 'Vehicle deleted successfully';
        DatabaseHelper::closeConnection();
    }

    public function get()
    {
        echo $this->getVehicleChassisNumber();
        echo $this->getRegistrationNumber();
    }
}
