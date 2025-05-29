<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Models\Vehicle;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Redirector::redirect('../public/index');
}

$id = trim($_POST['id']);
$model = trim($_POST['vehicle_model']);
$type = trim($_POST['vehicle_type']);
$chassisNo = trim($_POST['chassis_number']);
$productionYear = trim($_POST['production_year']);
$registrationNo = trim($_POST['registration_number']);
$fuel = trim($_POST['fuel_type']);
$registrationTill = trim($_POST['registration_till']);

$vehicle = new Vehicle($model, $type, $chassisNo, $productionYear, $registrationNo, $fuel, $registrationTill);

$vehicle->setId($id);
$vehicle->update();

Redirector::redirect('../public/dashboard');
