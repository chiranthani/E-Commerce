<?php

namespace App\Models;
use PDO;
use PDOException;

class User
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find(int $id)
    {
        try {
            $query = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user ?: null;
        } catch (PDOException $e) {
            error_log("User Retrieval Failed: " . $e->getMessage());
            return null;
        }
    }

    public function create(array $data)
    {
        try {
            $query = "SELECT id FROM users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':email' => $data['email']]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                return ['success' => false, 'message' => 'Email already exists.'];
            }

            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            $query = "INSERT INTO users (name, email, password, phone_no) VALUES (:name, :email, :password, :phone_no)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':name' => htmlspecialchars($data['name']), 
                ':email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
                ':password' => $hashedPassword, 
                ':phone_no' => htmlspecialchars($data['phone_no'])
            ]);

            return ['success' => true, 'message' => 'User registered successfully.'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Registration failed. Please try again later.'];
        }
    }

}
