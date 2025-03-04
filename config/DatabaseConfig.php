<?php

namespace App\Config;

class DatabaseConfig
{
    public static function getDbConfig()
    {
        return [
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'dbname' => 'e_commerce'
        ];
    }
}
