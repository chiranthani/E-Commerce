<?php

namespace App\Config;

use PDO;
use PDOException;

class DatabaseConfig
{
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection == null) {
            try {
                $host = 'localhost';
                $dbname = 'e_commerce';
                $username = 'root';
                $password = '';

                self::$connection = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                    $username,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_PERSISTENT => true, 
                    ]
                );
            } catch (PDOException $e) {
                error_log("Database Connection Error: " . $e->getMessage());
                die("Database connection failed!");
            }
        }
        return self::$connection;
    }
}
