<?php
namespace App\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use PDO;
use Exception;

class UserController
{
    private User $userModel;

    public function __construct(PDO $db)
    {
        $this->userModel = new User($db);
    }

    /**
     * get user details
     */
    public function getUser(int $id): void
    {
        try {
            $user = $this->userModel->find($id);
            if ($user) {
                ResponseHelper::jsonResponse($user, 200);
            } else {
                ResponseHelper::jsonResponse(['error' => 'User Not Found'], 404);
            }
        } catch (Exception $e) {
            error_log("User Retrieval Error: " . $e->getMessage());
            ResponseHelper::jsonResponse(['error' => 'Internal Server Error'], 500);
        }
    }
}