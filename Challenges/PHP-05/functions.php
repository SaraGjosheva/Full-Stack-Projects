<?php

function redirect(string $location)
{
    header('Location: ' . $location . '.php');
    exit;
}

function loadFileData(string $usersFile = 'users.txt'): array
{
    if (!file_exists($usersFile)) {
        return [];
    }

    $data = file_get_contents($usersFile);

    $lines = $data ? explode(PHP_EOL, trim($data)) : [];

    // strpos(string $haystack, string $needle, int $offset = 0): int|false

    return array_filter($lines, function ($line) {
        return strpos($line, ', ') !== false && strpos($line, '=') !== false;
    });
}

function uniqueUsername(string $username, string $usersFile = 'users.txt'): bool
{
    $storedUsers =  loadFileData($usersFile);

    foreach ($storedUsers as $user) {
        if (strpos($user, ', ') !== false && strpos($user, '=') !== false) {
            list($storedEmail, $storedCredentials) = explode(', ', $user);
            list($storedUsername, $storedPassword) = explode('=', $storedCredentials);
            if ($storedUsername === $username) {
                return false;
            }
        }
    }
    return true;
}

function uniqueEmail(string $email, string $usersFile = 'users.txt'): bool
{
    $storedUsers = loadFileData($usersFile);

    foreach ($storedUsers as $user) {
        list($storedEmail, $storedCredentials) = explode(', ', $user);
        if ($storedEmail === $email) {
            return false;
        }
    }
    return true;
}

function validateInputRegister(string $email, string $username, string $password): array
{
    $errors = [];

    if (empty($email) || !isset($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address.';
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]{5,}@/', $email)) {
        $errors['email'] = 'Email must have at least 5 characters before the @ symbol.';
    } elseif (!uniqueEmail($email)) {
        $errors['email'] = '<span class="text-warning">A user with this email already exists.</span>';
    }

    if (empty($username) || !isset($username)) {
        $errors['username'] = 'Username is required.';
    } elseif (strlen($username) < 5 || strlen($username) > 64) {
        $errors['username'] = 'Username must be more then 4 characters and less then 64.';
    } elseif (!uniqueUsername($username)) {
        $errors['username'] = 'Username taken.';
    }

    if (empty($password) || !isset($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/\W/', $password)) {
        $errors['password'] = 'Password must be at least 8 characters, should contain at least one uppercase letter, digit and special character.';
    }
    return $errors;
}

function registerUser(string $email, string $username, string $password, string $usersFile = 'users.txt'): void
{

    // double check for existing username before adding new one
    if (!uniqueUsername($username, $usersFile)) {
        throw new Exception('Username taken.');
    }

    // double check for existing email before adding new one
    if (!uniqueEmail($email, $usersFile)) {
        throw new Exception('<span class="text-warning fw-bolder">A user with this email already exists.</span>');
    }

    $data = $email . ', ' . $username . '=' . password_hash($password, PASSWORD_DEFAULT) . PHP_EOL;

    file_put_contents($usersFile, $data, FILE_APPEND);
}

function authenticate(string $username, string $password, string $usersFile = 'users.txt'): bool
{
    $storedUsers = loadFileData($usersFile);

    foreach ($storedUsers as $user) {
        list($storedEmail, $storedCredentials) = explode(', ', $user);
        list($storedUsername, $storedPassword) = explode('=', $storedCredentials);

        if ($storedUsername === $username && password_verify($password, $storedPassword)) {
            return true;
        }
    }
    return false;
}

function isLogedIn(): bool
{
    return isset($_SESSION['username']) ? true : false;
}
