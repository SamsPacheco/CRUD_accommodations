<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Database;

class AuthController {
    private $db;

    public function __construct() {
        // crear la conexión PDO
        $dbInstance = new Database();
        $this->db = $dbInstance->getConnection();
    }

    public function register(string $name, string $email, string $password, string $phone, int $role_id = 2): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $user = new User($this->db);
        $ok = $user->register($name, $email, $phone, $password, $role_id);

        $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);

        if ($ok) {
            $_SESSION['success'] = "Usuario registrado con éxito.";
            header("Location: {$script}?action=login");
            exit;
        } else {
            $_SESSION['error'] = "Error al registrar usuario (email puede estar duplicado).";
            header("Location: {$script}?action=register");
            exit;
        }
    }

    public function login(string $email, string $password): void {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $userModel = new User($this->db);
        $user = $userModel->findByEmail($email);

        $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);

        if ($user && password_verify($password, $user['password'])) {
            // elimina campo password antes de guardar en sesión por seguridad
            unset($user['password']);
            $_SESSION['user'] = $user;
            header("Location: {$script}?action=home");
            exit;
        } else {
            $_SESSION['error'] = "Credenciales incorrectas.";
            header("Location: {$script}?action=login");
            exit;
        }
    }

    public function logout(): void {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        $script = htmlspecialchars($_SERVER['SCRIPT_NAME']);
        header("Location: {$script}?action=login");
        exit;
    }
}
