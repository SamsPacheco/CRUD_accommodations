<?php
namespace App\Models;

use PDO;
use App\Core\Database;

class Accommodation {
    private PDO $db;
    private string $table = 'accommodations';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create($title,$description,$location,$price, $state = 'active') {
        $sql = "INSERT INTO {$this->table} (title, description, location, price, state)
                VALUES (:title, :description, :location, :price, :state)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":location", $location);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":state", $state);
        return $stmt->execute();
    }

    public function getAllAccommodations(){
        $sql = "SELECT title, description, location, price, state FROM {$this->table}
                ORDER BY accommodation_id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAccommdationById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE accommdation_id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
