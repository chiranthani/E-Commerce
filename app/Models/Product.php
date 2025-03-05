<?php

namespace App\Models;
use PDO;
use PDOException;

class Product
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find(int $id)
    {
        try {
            $query = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            return $product ?: null;
        } catch (PDOException $e) {
            error_log("User Retrieval Failed: " . $e->getMessage());
            return null;
        }
    }

    public function getAllProducts()
    {
        try {
            $query = "SELECT * FROM products WHERE is_active = 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (PDOException $e) {
            error_log("Product Retrieval Failed: " . $e->getMessage());
            return [];
        }
    }

    public function create(string $name, float $price, int $stock, bool $isActive = true)
    {
        try {
            $query = "INSERT INTO products (name, price, stock, is_active) VALUES (:name, :price, :stock, :is_active)";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':name' => $name,
                ':price' => $price,
                ':stock' => $stock,
                ':is_active' => (int) $isActive
            ]);
        } catch (PDOException $e) {
            error_log("Product Creation Failed: " . $e->getMessage());
            return false;
        }
    }


    public function delete(int $id)
    {
        try {
            $query = "DELETE FROM products WHERE id = :id";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Product Deletion Failed: " . $e->getMessage());
            return false;
        }
    }
}
