<?php

function redirect(string $location)
{
    header('Location: ' . $location . '.php');
    exit;
}

function uniqueUsername(string $username, string $usersFile = 'users.txt'): bool
{
    if (!file_exists($usersFile)) {
        return true;
    }

    $storedUsers = file_get_contents($usersFile);
    $users = $storedUsers ? explode(PHP_EOL, trim($storedUsers)) : [];

    foreach ($users as $user) {
        if ($user === $username) {
            return false;
        }
    }
    return true;
}

function validateInputRegister(array $userData): array
{
    $errors = [];

    if (empty($userData['firstName']) || !isset($userData['firstName'])) {
        $errors['firstName'] = 'First Name is required.';
    } elseif (strlen($userData['firstName']) < 3 || strlen($userData['firstName']) > 64) {
        $errors['firstName'] = 'First Name must be more then 2 characters and less then 64.';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $userData['firstName'])) {
        $errors['firstName'] = 'First Name must contain only alphabetic characters without numbers or special characters.';
    }

    if (empty($userData['lastName']) || !isset($userData['lastName'])) {
        $errors['lastName'] = 'Last Name is required.';
    } elseif (strlen($userData['lastName']) < 3 || strlen($userData['lastName']) > 64) {
        $errors['lastName'] = 'Last Name must be more then 2 characters and less then 64.';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $userData['lastName'])) {
        $errors['lastName'] = 'Last Name must contain only alphabetic characters without numbers or special characters.';
    }

    if (empty($userData['userName']) || !isset($userData['userName'])) {
        $errors['userName'] = 'Username is required.';
    } elseif (strlen($userData['userName']) < 5 || strlen($userData['userName']) > 64) {
        $errors['userName'] = 'Username must be more then 4 characters and less then 64.';
    } elseif (!uniqueUsername($userData['userName'])) {
        $errors['userName'] = 'Username is already taken.';
    }

    if (empty($userData['telephoneNumber']) || !isset($userData['telephoneNumber'])) {
        $errors['telephoneNumber'] = 'Phone Number is required.';
    } elseif (!preg_match('/^(00|\+)\d{1,3}\d{6,14}$/', $userData['telephoneNumber'])) {
        $errors['telephoneNumber'] = 'Phone Number must start with 00 or + followed by country code and digits.';
    }

    if (empty($userData['password']) || !isset($userData['password'])) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($userData['password']) < 8 || !preg_match('/[A-Z]/', $userData['password']) || !preg_match('/\d/', $userData['password']) || !preg_match('/\W/', $userData['password'])) {
        $errors['password'] = 'Password must be at least 8 characters, should contain at least one uppercase letter, digit and special character.';
    }

    return $errors;
}

function createUsersFolder()
{
    $path = __DIR__ . '/users';

    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

function createUsersFile(array $userData)
{
    $path = __DIR__ . '/users/users.txt';

    if (!file_exists($path)) {
        file_put_contents($path, '');
    }

    file_put_contents($path, $userData['userName'] . PHP_EOL, FILE_APPEND);
}

function createSpecificUserFolder(array $userData)
{
    $firstname = ucfirst(strtolower($userData['firstName']));
    $lastname = ucfirst(strtolower($userData['lastName']));

    $path = __DIR__ . '/users/' . $firstname . '_' . $lastname;

    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    return $path;
}

function createSpecificUserFile(array $userData)
{
    $userFolder = createSpecificUserFolder($userData);
    $filePath = $userFolder . '/' . $userData['userName'] . '.txt';

    if (!file_exists($filePath)) {
        file_put_contents($filePath, '');
    }

    return $filePath;
}

function registerUser(array $userData): void
{
    $firstname = ucfirst(strtolower($userData['firstName']));
    $lastname = ucfirst(strtolower($userData['lastName']));

    $data = $firstname . ',' . $lastname . ',' . $userData['userName'] . ',' . $userData['telephoneNumber'] . ',' . password_hash($userData['password'], PASSWORD_DEFAULT);

    createUsersFolder();
    createUsersFile($userData);

    $userFilePath = createSpecificUserFile($userData);
    file_put_contents($userFilePath, $data, FILE_APPEND);
}
