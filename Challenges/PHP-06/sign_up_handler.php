<?php

session_start();

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['sign_up'])) {
    redirect('sign_up');
}

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$phoneNumber = trim($_POST['phoneNumber']);
$day = trim($_POST['day']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);
$password = trim($_POST['password']);

// array_merge(array ...$arrays): array
$errors = array_merge(
    validateName($name),
    validateSurname($surname),
    validateEmail($email),
    validateUsername($username),
    validatePhoneNumber($phoneNumber),
    validateDateOfBirth($day, $month, $year),
    validatePassword($password)
);

if (empty($errors)) {
    registerUser($name, $surname, $email, $username, $phoneNumber, $day, $month, $year, $password);
    $_SESSION['success'] = 'Successfully signed up.';
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    redirect('sign_up');
}

$_SESSION['errors'] = $errors;

unset($userData['password']);

$_SESSION['old'] = ['name' => $name, 'surname' => $surname, 'email' => $email, 'username' => $username, 'phoneNumber' => $phoneNumber, 'day' => $day, 'month' => $month, 'year' => $year, 'password' => $password];

redirect('sign_up');
