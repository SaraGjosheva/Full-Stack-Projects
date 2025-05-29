<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Session\SessionManager;

SessionManager::start();

$id = $_GET['extend'];

$db = DatabaseHelper::getConnection();
$query = $db->prepare('SELECT `registration_till` FROM `vehicle` WHERE id = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$date = $query->fetch();

if (!$date || !$date['registration_till']) {
    throw new Exception("Invalid date retrieved for the vehicle ID: $id");
}

$extend = strtotime($date['registration_till']) + 31556926;
$extendDate = date("Y/m/d", $extend);

$extends = $db->prepare("UPDATE `vehicle` SET `registration_till` = :extendDate WHERE `id` = :id");
$extends->bindParam(':extendDate', $extendDate, PDO::PARAM_STR);
$extends->bindParam(':id', $id, PDO::PARAM_INT);
$extends->execute();

SessionManager::set('success', 'Vehicle extended successfully.');

Redirector::redirect('../public/dashboard');

// $date2 = date('Y/m/d');
// $date1 = strtotime($date2) + 31556926;
// $diff = abs(strtotime($date2) - $date1);

// $years = floor($diff / (365 * 60 * 60 * 24));
// $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
// $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

// printf("%d years, %d months, %d days\n", $years, $months, $days);

// // var_dump($date1);
// $unixtime = 1307595105;
