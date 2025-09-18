<?php

namespace App\Controllers;

use App\Helpers\AuthHelpers;
use App\Core\Database;
use App\Models\Accommodation;

class AccommodationController {
     private $db;
    private $accommodation;

    public function __construct() {
        $dbInstance = new Database();
        $this->db = $dbInstance->getConnection();
        $this->accommodation = new Accommodation($this->db);
    }

    // GET: mostrar formulario (solo admin)
    public function showCreateForm(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        AuthHelpers::requireAdmin();
        require __DIR__ . '/../Views/accommodations/create.php';
    }

    // POST: guardar accommodation (solo admin)
    public function store(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        AuthHelpers::requireAdmin();

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $location = trim($_POST['location'] ?? '');
        $price = doubleval($_POST['price'] ?? 0);
        $state = ($_POST['state'] ?? 'active');

        // validaciones mínimas
        if ($title === '') {
            $_SESSION['error'] = "El título es obligatorio.";
            $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
            header("Location: {$script}?action=accommodation_create");
            exit;
        }

        $model = new Accommodation($this->db);
        $ok = $model->create($title, $description, $location, $price, $state);

        $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
        if ($ok) {
            $_SESSION['success'] = "Accommodation creado con éxito.";
            header("Location: {$script}?action=accommodation_index");
        } else {
            $_SESSION['error'] = "Error al crear accommodation.";
            header("Location: {$script}?action=accommodation_create");
        }
        exit;
    }

    // GET: lista pública
    public function index(){
        $model = new Accommodation($this->db);
        $accommodation = $model->getAllAccommodations();
        require __DIR__ . '/../Views/home.php';
    }
}
