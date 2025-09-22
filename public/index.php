<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AccommodationController;
use App\Controllers\AuthController;
use App\Controllers\FavoritesController;

$accommodation = new AccommodationController();
$favoriteController = new FavoritesController();
$action = $_GET['action'] ?? 'login';
$auth = new AuthController();

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // OJO: toma los campos en el orden correcto
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $password = $_POST['password'] ?? '';
            $role_id = isset($_POST['rol_id']) ? (int)$_POST['rol_id'] : 2;

            // Llamada correcta (nota el orden: name, email, password, phone, role_id)
            $auth->register($name, $email, $password, $phone, $role_id);
        } else {
            include __DIR__ . '/../app/Views/auth/register.php';
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "accion login";
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $auth->login($email, $password);
        } else {
            include __DIR__ . '/../app/Views/auth/login.php';
        }
        break;
    
    case 'accommodation_index':
        $accommodation->index();
        break;

    case 'accommodation_create':
        // GET: mostrar form (protegido por controller)
        $accommodation->showCreateForm();
        break;

    case 'accommodation_store':
        // POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accommodation->store();
        }
        break;
        case 'favorites':
    $favoriteController->index();
    break;

    case 'add_favorite':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteController->add();
        }
        break;

    case 'remove_favorite':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteController->remove();
        }
        break;
    case 'logout':
        $auth->logout();
        break;

    case 'home':
        $accommodation->index();
        break;
    
    default:
        header("Location: ?action=login");
        exit;

}
