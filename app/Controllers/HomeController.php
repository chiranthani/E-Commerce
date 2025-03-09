<?php

namespace App\Controllers;

use App\Helpers\ResponseHelper;
use PDO;


class HomeController
{


    public function __construct(PDO $db) {}

    /**
     * load home page
     */
    public function loadHome()
    {
        require_once __DIR__ . "/../Views/home.php";
    }
}
