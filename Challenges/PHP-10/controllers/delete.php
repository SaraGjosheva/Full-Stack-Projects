<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Session\SessionManager;

$id = $_GET['delete'];

$db = DatabaseHelper::getConnection();
$query = $db->prepare('DELETE FROM `vehicle` WHERE id=:id');
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
SessionManager::set('delete', 'Vehicle deleted successfully.');

Redirector::redirect('../public/dashboard');
