<?php

namespace WebsiteBuilder\Classes\Database;

require_once __DIR__ . '/../../config/Constants/constants.php';

use PDO;
use PDOException;
use Exception;

class Database
{
    private ?PDO $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed. " . $e->getMessage());
        }
    }

    public function getConnection(): ?PDO
    {
        if ($this->connection === null) {
            throw new Exception("Database connection not established.");
        }
        return $this->connection;
    }

    public function closeConnection(): void
    {
        $this->connection = null;
    }
}
