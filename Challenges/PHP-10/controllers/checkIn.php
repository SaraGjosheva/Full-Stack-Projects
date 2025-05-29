<?php

require_once __DIR__ . '/../config/Autoloader/autoload.php';

use VehicleRegistration\Classes\Redirector\Redirector;
use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Session\SessionManager;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Redirector::redirect('../public/index');
}

$username = trim($_POST['username']);
$enteredPassword = trim($_POST['password']);

$db = DatabaseHelper::getConnection();

$query = $db->prepare('SELECT * FROM `admin` WHERE username=:username OR email=:username');

$query->bindParam(':username', $username, \PDO::PARAM_STR);
$query->execute();
$adminData = $query->fetchAll();

foreach ($adminData as $admin) {

    if ($admin['username'] === $username || $admin['email'] === $username) {
        $storedHashedPassword = $admin['password'];

        if (password_verify($enteredPassword, $storedHashedPassword)) {
            SessionManager::start();
            SessionManager::set('id', $admin['id']);
            DatabaseHelper::closeConnection();
            Redirector::redirect('../public/dashboard');
        } else {
            Redirector::redirect('../public/login');
        }
    }
}
