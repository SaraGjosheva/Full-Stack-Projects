<?php

session_start();

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['login'])) {
    redirect('login');
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$errors = [];

if (empty($username) || empty($password)) {
    $errors['message'] = 'The fields are required.';
} elseif (!authenticate($username, $password)) {
    $errors['message'] = 'Wrong username/password combination.';
}

if (empty($errors)) {
    authenticate($username, $password);
    $_SESSION['username'] = $username;
    redirect('dashboard');
}

$_SESSION['errors'] = $errors;
unset($password);
$_SESSION['old'] = ['email' => $email, 'username' => $username, 'password' => $password];
redirect('login');
