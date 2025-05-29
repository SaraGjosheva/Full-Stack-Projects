<?php

namespace WebsiteBuilder\Classes\Database;

use WebsiteBuilder\Classes\Query\Query;

use PDO;

class DatabaseHelper
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $db = new Database();
            self::$pdo = $db->getConnection();
        }

        return self::$pdo;
    }

    public static function getQuery(): Query
    {
        return new Query(self::getConnection());
    }
}
