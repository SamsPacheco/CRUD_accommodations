<?php
namespace App\Models;

use PDO;
use App\Core\Database;

class Favorites {
    private PDO $db;
    private string $table = 'user_account';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Añadir favorito. Si ya existe, devuelve true igualmente.
    public function addFavorite($userId, $accommodationId){
        try {
            $sql = "INSERT INTO {$this->table} (user_id, accommodation_id) VALUES (:user_id, :accommodation_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":accommodation_id", $accommodationId);
            return $stmt->execute();
        } catch (\PDOException $e) {
            // Si el error es duplicado (clave primaria), consideramos que ya está agregado => true
            $errorCode = $e->errorInfo[1] ?? null;
            //
            if ($errorCode == 1062) return true; // MySQL duplicate entry
            return false;
        }
    }

    // Eliminar favorito
    public function removeFavorite($userId, $accommodationId){
        $sql = "DELETE FROM {$this->table} WHERE user_id = :user_id AND accommodation_id = :accommodation_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":accommodation_id", $accommodationId);
        return $stmt->execute();
    }

    // Listar favoritos (devuelve los datos del accommodations unidos)
    public function getFavoritesByUser($userId){
        $sql = "SELECT a.accommodation_id, a.title, a.description, a.location, a.price, a.state
                FROM accommodations a
                INNER JOIN user_account ua 
                    ON ua.accommodation_id = a.accommodation_id
                WHERE ua.user_id = :user_id
                ORDER BY a.accommodation_id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

       // Comprobar si un alojamiento es favorito del usuario
    public function isFavorite($userId, $accommodationId){
        $sql = "SELECT 1 FROM {$this->table} WHERE user_id = :user_id AND accommodation_id = :accommodation_id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $userId);
        $stmt->bindParam(":accommodation_id", $accommodationId);
        $stmt->execute();
        return (bool)$stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener solo los IDs favoritos (útil para optimizar renderizado)
    public function getFavoriteIds(int $userId){
        $sql = "SELECT accommodation_id FROM {$this->table} WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return array_column($rows, 'accommodations_id');
        return array_column($rows, 'accommodation_id');

    }
}