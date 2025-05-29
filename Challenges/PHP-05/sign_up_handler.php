<?php

session_start();

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['sign_up'])) {
    redirect('sign_up');
}

$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);

$errors = validateInputRegister($email, $username, $password);

if (empty($errors)) {
    registerUser($email, $username, $password);
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    redirect('dashboard');
}

$_SESSION['errors'] = $errors;
unset($password);
$_SESSION['old'] = ['email' => $email, 'username' => $username, 'password' => $password];
redirect('sign_up');
