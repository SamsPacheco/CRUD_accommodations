<?php

namespace App\Models;

use PDO;

class User {
    private PDO $db;
    private string $table = 'users';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function register(string $name, string $email, string $phone, string $password, int $rol_id = 2): bool {
        $sql = "INSERT INTO {$this->table} (name, email, phone, password, rol_id)
                VALUES (:name, :email, :phone, :password, :rol_id)";
        $stmt = $this->db->prepare($sql);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        try {
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':password' => $hash,
                ':rol_id' => $rol_id
            ]);
        } catch (\PDOException $e) {
            // opcional: error_log($e->getMessage());
            return false;
        }
    }

    public function findByEmail(string $email): array|false {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
