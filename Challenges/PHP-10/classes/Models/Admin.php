<?php

namespace VehicleRegistration\Classes\Models;

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Query/Query.php';

use VehicleRegistration\Classes\Database\DatabaseHelper;
use VehicleRegistration\Classes\Query\Query;
use VehicleRegistration\Classes\Session\SessionManager;

class Admin
{
    private int $adminId;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $email;
    private string $password;

    public function __construct(string $firstName, string $lastName, string $username, string $email, string $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Setters
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Getters
    public function getAdminId(): int
    {
        return $this->adminId;
    }

    public function getFirstName(): string
    {
        return ucfirst(strtolower($this->firstName));
    }

    public function getLastName(): string
    {
        return ucfirst(strtolower($this->lastName));
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function addAdmin()
    {
        $data = [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ];

        try {
            $db = DatabaseHelper::getConnection();
            $query = new Query($db);

            $query->insert('admin', $data);

            if ($query) {
                SessionManager::set('success', 'Admin added successfully!');
                SessionManager::remove('success');
            } else {
                SessionManager::set('error', 'Failed to add admin.');
                SessionManager::remove('error');
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        DatabaseHelper::closeConnection();
    }

    public static function validatePassword(string $enteredPassword, string $storedHash): bool
    {
        return password_verify($enteredPassword, $storedHash);
    }
}

$admin = new Admin('Sara', 'Gjosheva', 'Sara123', 'sara_gj@gmail.com', 'Sara123');
// $admin->addAdmin();
