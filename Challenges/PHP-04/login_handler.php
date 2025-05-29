<?php

session_start();

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['login'])) {
    redirect('login');
}

$userData = [
    'userName' => trim($_POST['userName']),
    'password' => trim($_POST['password'])
];


$errors = validateInputRegister($userData);

if (empty($errors)) {
    registerUser($userData);
    $_SESSION['userName'] = $userData['userName'];
    redirect('dashboard');
}

$_SESSION['errors'] = $errors;
unset($userData['password']);
$_SESSION['old'] = $userData;
redirect('login');
