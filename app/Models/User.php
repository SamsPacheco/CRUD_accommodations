<?php

namespace App\Models;

use PDO;

class User {
    private PDO $db;
    private $table = 'users';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function register($name, $email, $phone, $password, int $rol_id = 1) {
        $sql = "INSERT INTO {$this->table} (name, email, phone, password, rol_id)
                VALUES (:name, :email, :phone, :password, :rol_id)";
        $stmt = $this->db->prepare($sql);
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hash);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":rol_id", $rol_id);

        try {
            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function findByEmail($email){
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
