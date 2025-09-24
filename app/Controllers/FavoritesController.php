<?php
namespace App\Controllers;

use App\Models\Favorites;
use App\Helpers\AuthHelpers;
use App\Core\Database;

class FavoritesController {
    private Favorites $model;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->model = new Favorites($db);
    }

    // POST -> añadir favorito
    public function add() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!AuthHelpers::isLogged()) {
            $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
            header("Location: {$script}?action=login");
            exit;
        }
        // Solo usuarios normales (rol_id = 2) pueden añadir favoritos
        if (AuthHelpers::isAdmin()) {
            $_SESSION['error'] = "Los administradores no pueden usar favoritos.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        $user = AuthHelpers::currentUser();
        $user_id = (int)$user['user_id'];
        $accomodation_id = (int)($_POST['accommodation_id'] ?? 0);
        if ($accomodation_id <= 0) {
            $_SESSION['error'] = "Alojamiento inválido.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        // Verificar si el alojamiento ya está en favoritos
        if ($this->model->isFavorite($user_id, $accomodation_id)) {
            $_SESSION['error'] = "Este alojamiento ya está en tus favoritos.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        $ok = $this->model->addFavorite($user_id, $accomodation_id);
        $_SESSION['success'] = $ok ? "Guardado en favoritos." : "No se pudo guardar favorito.";
        header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
        exit;
    }

    // POST -> eliminar favorito
    public function remove(){
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!AuthHelpers::isLogged()) {
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=login");
            exit;
        }
        if (AuthHelpers::isAdmin()) {
            $_SESSION['error'] = "Los administradores no pueden usar favoritos.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        $user = AuthHelpers::currentUser();
        $user_id = (int)$user['user_id'];
        $accomodation_id = (int)($_POST['accomodation_id'] ?? 0);
        if ($accomodation_id <= 0) {
            $_SESSION['error'] = "Alojamiento inválido.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        $ok = $this->model->removeFavorite($user_id, $accomodation_id);
        $_SESSION['success'] = $ok ? "Favorito eliminado." : "No se pudo eliminar favorito.";
        header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
        exit;
    }

    // GET -> lista de favoritos del usuario
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!AuthHelpers::isLogged()) {
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=login");
            exit;
        }
        if (AuthHelpers::isAdmin()) {
            $_SESSION['error'] = "Los administradores no tienen favoritos.";
            header("Location: " . htmlspecialchars($_SERVER['SCRIPT_NAME']) . "?action=home");
            exit;
        }

        $user = AuthHelpers::currentUser();
        $user_id = (int)$user['user_id'];
        $favorites = $this->model->getFavoritesByUser($user_id);

        // La vista esperará $favorites
        require __DIR__ . '/../Views/favorites/index.php';
    }
}
