<?php

session_start();

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['register'])) {
    redirect('register');
}

$userData = [
    'firstName' => trim($_POST['firstName']),
    'lastName' => trim($_POST['lastName']),
    'userName' => trim($_POST['userName']),
    'telephoneNumber' => trim($_POST['telephoneNumber']),
    'password' => trim($_POST['password'])
];

$errors = validateInputRegister($userData);

if (empty($errors)) {
    registerUser($userData);
    $_SESSION['userName'] = $userData['userName'];
    $_SESSION['success'] = 'Welcome to our page ' . $userData['userName'] . '!';
    redirect('register');
}

$_SESSION['errors'] = $errors;
unset($userData['password']);
$_SESSION['old'] = $userData;
redirect('register');
