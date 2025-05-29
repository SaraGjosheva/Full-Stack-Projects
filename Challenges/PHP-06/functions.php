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

    return array_filter($lines, function ($line) {
        return strpos($line, ',') !== false;
    });
}


function uniqueEmail(string $email, string $usersFile = 'users.txt'): bool
{
    $storedUsers =  loadFileData($usersFile);

    foreach ($storedUsers as $user) {

        $usersData = explode(',', $user);

        if (isset($usersData) && trim($usersData[2]) === $email) {
            return false;
        }
    }

    return true;
}

function uniqueUsername(string $username, string $usersFile = 'users.txt'): bool
{
    $storedUsers =  loadFileData($usersFile);

    foreach ($storedUsers as $user) {

        $usersData = explode(',', $user);

        if (isset($usersData) && trim($usersData[3]) === $username) {
            return false;
        }
    }

    return true;
}

function validateName(string $name): array
{
    $errors = [];

    if (empty($name) || !isset($name)) {
        $errors['name'] = 'First Name is required.';
    } elseif (strlen($name) < 3 || strlen($name) > 64) {
        $errors['name'] = 'First Name must be more then 2 characters and less then 64.';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $name)) {
        $errors['name'] = 'First Name must contain only alphabetic characters without numbers or special characters.';
    }

    return $errors;
}

function validateSurname(string $surname): array
{
    $errors = [];

    if (empty($surname) || !isset($surname)) {
        $errors['surname'] = 'Last Name is required.';
    } elseif (strlen($surname) < 3 || strlen($surname) > 64) {
        $errors['surname'] = 'Last Name must be more then 2 characters and less then 64.';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $surname)) {
        $errors['surname'] = 'Last Name must contain only alphabetic characters without numbers or special characters.';
    }

    return $errors;
}

function validateEmail(string $email): array
{
    $errors = [];

    if (empty($email) || !isset($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address.';
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]{5,}@/', $email)) {
        $errors['email'] = 'Email must have at least 5 characters before the @ symbol.';
    } elseif (!uniqueEmail($email)) {
        $errors['email'] = 'A user with this email already exists.';
    }

    return $errors;
}

function validateUsername(string $username): array
{
    $errors = [];

    if (empty($username) || !isset($username)) {
        $errors['username'] = 'Username is required.';
    } elseif (strlen($username) < 5 || strlen($username) > 64) {
        $errors['username'] = 'Username must be more then 4 characters and less then 64.';
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $errors['username'] = 'Username can only contain letters and numbers.';
    } elseif (!uniqueUsername($username)) {
        $errors['username'] = 'Username taken.';
    }
    return $errors;
}

function validatePhoneNumber(string $phoneNumber): array
{
    $errors = [];

    if (empty($phoneNumber) || !isset($phoneNumber)) {
        $errors['phoneNumber'] = 'Phone number is required.';
    } elseif (!preg_match('/^\d{6,15}$/', $phoneNumber)) {
        $errors['phoneNumber'] = 'Phone number must contain only numbers and be 6 to 15 digits long.';
    }
    return $errors;
}

function validateDateOfBirth(int|string $day, int|string $month, int|string $year): array
{
    $errors = [];

    if (empty($day) || !isset($day) || empty($month) || !isset($month) || empty($year) || !isset($year)) {
        $errors['dob'] = 'Date of birth is required.';
        return $errors;
    }

    if ($month == 2) {
        if (($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0))) {
            if ($day > 29) {
                $errors['dob'] = 'February has only 29 days in a leap year.';
            }
        } else {
            if ($day > 28) {
                $errors['dob'] = 'February has only 28 days in a non-leap year.';
            }
        }
    } else {
        $days_in_month = [
            1 => 31,
            2 => 28,
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10 => 31,
            11 => 30,
            12 => 31
        ];

        if ($day < 1 || $day > $days_in_month[$month]) {
            $errors['dob'] = 'Invalid day for the selected month.';
        }
    }

    if (!isset($errors['dob']) && !checkdate($month, $day, $year)) {
        $errors['dob'] = 'Invalid date selected.';
    }

    $birthDate = new DateTime("$year-$month-$day");
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;

    if ($age < 18) {
        $errors['dob'] = 'You must be over 18 to join us.';
    }

    return $errors;
}

function validatePassword(string $password): array
{
    $errors = [];

    if (empty($password) || !isset($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/\W/', $password)) {
        $errors['password'] = 'Password must be at least 8 characters, should contain at least one uppercase letter, digit and special character.';
    }

    return $errors;
}

function registerUser(string $name, string $surname, string $email, string $username, int $phoneNumber, string $day, string $month, string $year, string $password, string $usersFile = 'users.txt'): void
{

    // double check for existing username before adding new one
    if (!uniqueUsername($username, $usersFile)) {
        throw new Exception('Username taken.');
    }

    // double check for existing email before adding new one
    if (!uniqueEmail($email, $usersFile)) {
        throw new Exception('A user with this email already exists.');
    }

    // sprintf(string $format, mixed ...$values): string
    $dob = sprintf('%04d-%02d-%02d', $year, $month, $day);

    $data = implode(',', [$name, $surname, $email, $username, $phoneNumber, $dob, password_hash($password, PASSWORD_DEFAULT)]) . PHP_EOL;

    file_put_contents($usersFile, $data, FILE_APPEND);
}
