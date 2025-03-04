<?php

namespace App\Helpers;

class ResponseHelper
{
    /**
     * Send a JSON response.
     */
    public static function jsonResponse(array $data, int $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
