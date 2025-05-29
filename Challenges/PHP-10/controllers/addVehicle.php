<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Models\Vehicle;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();

if ($model == "Default select") {
    SessionManager::set('error1', 'Please select a vehicle model.');
}

if ($type == "Default select") {
    SessionManager::set('error2', 'You must choose a vehicle type.');
}

// if (empty($chassisNo)) {
//     SessionManager::set('error3', 'Please provide the chassis number.');
// }

// if (empty($productionYear)) {
//     SessionManager::set('error4', 'Please provide the production year.');
// }

// if (empty($registrationNo)) {
//     SessionManager::set('error5', 'Please provide the registration number.');
// }

if ($fuel == "Default select") {
    SessionManager::set('error6', 'Please select a fuel type.');
}

// if (empty($registrationTill)) {
//     SessionManager::set('error7', 'Please provide the registration expiry date.');
// }

if (SessionManager::has('error1') || SessionManager::has('error2') || SessionManager::has('error3') || SessionManager::has('error4') || SessionManager::has('error5') || SessionManager::has('error6') || SessionManager::has('error7')) {
    Redirector::redirect('../public/dashboard');
} else {
    $model = trim($_POST['vehicle_model']);
    $type = trim($_POST['vehicle_type']);
    $chassisNo = trim($_POST['chassis_number']);
    $productionYear = trim($_POST['production_year']);
    $registrationNo = trim($_POST['registration_number']);
    $fuel = trim($_POST['fuel_type']);
    $registrationTill = trim($_POST['registration_till']);

    $vehicle = new Vehicle($model, $type, $chassisNo, $productionYear, $registrationNo, $fuel, $registrationTill);

    $vehicle->store();

    Redirector::redirect('../public/dashboard');

    $date1 = $vehicle->getRegistrationTillDate();

    // var_dump(time());
    // var_dump(date('Y/m/d'));
    // var_dump($date1[1]["registration_till"]);

    $date2 = date('Y/m/d');
    $date1 = strtotime($date2) + 2592000;
    $diff = abs(strtotime($date2) - $date1);

    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

    printf("%d years, %d months, %d days\n", $years, $months, $days);

    // var_dump(strtotime($date2));

    Redirector::redirect('../public/dashboard');
}
